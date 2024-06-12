<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use App\Models\Account\AccountHead;
use App\Models\Account\AccountTransaction;
use App\Models\Account\BalanceAccount;
use App\Models\Account\PaymentMethod;
use Illuminate\Http\Request;
use App\Models\Hr\Department;
use App\Models\Hr\Employee;
use App\Models\Hr\Bank;
use App\Models\Hr\BankAccount;
use App\Models\Hr\Payroll;
use App\Models\Hr\BonusPay;
use App\Models\Designation;
use App\Models\Hr\EmpBankAccount;
use App\Models\Hr\SalarySheet;
use Carbon\Carbon;
use App\Models\User;

use Session;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class bonuspayController extends Controller
{

    public function calculation(){
        $data['newEmployees']=DB::table('employees')
                              ->join('designations','employees.designation_id','designations.id')
                              ->join('departments','employees.department_id','departments.id')
                              ->where('employees.rejineDate',null)
                              ->select('employees.*','departments.name as deptName','designations.name as desigName')
                              ->orderBy('employees.id','DESC')
                              ->get();

        $data['payrollsetup']=Payroll::first();
        return view ('Hr.bonuspay.bonusCalculationView',$data);
    }
    

    public function view(){
        $data['designations']=Designation::orderBy('id','DESC')->get();
        $data['methods']=PaymentMethod::orderBy('id','DESC')->get();
        return view ('Hr.bonuspay.manage',$data);
    }
    function ajaxBonusPay(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'users.name',
            2 => 'bonus_pays.paidDate',
            3 => 'bonus_pays.occation',
            4 => 'bonus_pays.bonusAmount',
            5 => 'payment_methods.name',
            6 => 'balance_accounts.account_name',
        );
        $totalData = BonusPay::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        //dd($request->input('order.0.column'));
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = BonusPay::leftJoin('users','bonus_pays.empID','users.id')
                    ->leftJoin('payment_methods','bonus_pays.paidMethod','payment_methods.id')
                    ->leftJoin('balance_accounts','bonus_pays.balance_account_id','balance_accounts.id');
        if(!empty($search)){
 
            $datalist =$datalist->where("users.name","LIKE","%{$search}%")
            ->orwhere("bonus_pays.paidDate","LIKE","%{$search}%")
            ->orwhere("bonus_pays.occation","LIKE","%{$search}%")
            ->orwhere("bonus_pays.bonusAmount","LIKE","%{$search}%")
            ->orwhere("payment_methods.name","LIKE","%{$search}%")
            ->orwhere("balance_accounts.account_name","LIKE","%{$search}%");
           
        }
        $totalFiltered = $datalist->count();
        $datalist = $datalist->select('bonus_pays.*','users.name as e_name','payment_methods.name as p_name','balance_accounts.account_name as ac_name')->offset($start)->limit($limit)->orderBy($order,$dir)->get();
        
 
        $data = array();
        if(!empty($datalist))
        {
             $i = $start == 0 ? 1 : $start+1;
            foreach($datalist as $data_v)
            {
                $nestedData['id'] = $i++;
                $nestedData['e_name'] = $data_v->e_name;
                $nestedData['date'] = $data_v->paidDate;
                $nestedData['occation'] = $data_v->occation;
              
                $nestedData['amount'] = round($data_v->bonusAmount,2);
                $nestedData['p_name'] = $data_v->p_name;
                $nestedData['ac_name'] = $data_v->ac_name;
               
                $nestedData['options'] = '<a class="btn btn-primary" href="javascript:void(0)" id="bonuspayEdit" data-id="'.$data_v->id.'" data-bs-toggle="modal" data-bs-target="#updateModal"><i class="fa fa-edit"></i></a>';
             
                $nestedData['options'] .= '<a title="Delete"  style="margin-left: 10px" class="del_hr_data btn btn-danger" data-id="'.$data_v->id.'"><i class="fa fa-trash"></i></a>';
 
                $data[] = $nestedData;
 
            }
        }
        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        );
 
        return json_encode($json_data);
    }
    // public function search(Request $request){

    //     $data['bonuspays']=BonusPay::orderBy('id','DESC')->where('',)->get();
    //     $data['departments']=Department::orderBy('id','DESC')->get();
    //     $data['banks']=Bank::all();
    //     return view ('HRandPayroll.bonuspay.manage',$data);
    // }

    public function search(Request $request){

        if($request->occation=='all'){
            $data['bonuspays']=BonusPay::orderBy('id','DESC')->where('paidDate','LIKE',$request->year.'%')->get();
        }
        else{
            $data['bonuspays']=BonusPay::orderBy('id','DESC')->where('occation', $request->occation)->where('paidDate','LIKE',$request->year.'%')->get();
        }
        //dd($request->all());
        $data['departments']=Department::orderBy('id','DESC')->get();
      
        return view ('Hr.bonuspay.manage',$data);
    }
    function inital_account(){
        $salesHead = AccountHead::where("code",'7003')->first();
        if($salesHead == null){
            $salesHead = new AccountHead;
            $salesHead->title = "Employee Bonus";
            $salesHead->code = '7003';
            $salesHead->sys = 0;
            $salesHead->ac_type = 7;
            $salesHead->note = '';
            $salesHead->status = 1;
            $salesHead->save();

        }

    }
    public function store(Request $request){

        $this->inital_account();
        $validator = Validator::make($request->all(),[
                'desigID'=>'required',
                'empID'=>'required',
                'paidDate'=>'required',
                'occation'=>'required',
                'bonusAmount'=>'required',
                'payment_method'=>'required',
                'account'=>'required',

        ],[
            'desigID.required'=> 'Designation is required',
            'empID.required'=> 'Employee is required',
            'paidDate.required'=> 'Paid Date is required',
            'occation.required'=> 'Occation is required',
            'bonusAmount.required'=> 'Bonus Amount is required',
            'payment_method.required'=> 'Paid Method is required',
            'account.required'=> 'Account is required',
        ]);


            if($validator->fails()){
                return response([
                    'status' => 0,
                    'errors' => $validator->errors()
                ]);
            }
           // return $request->all();
            try{
                DB::beginTransaction();

                if($request->id==0){
                    $BonusPay=new BonusPay();
                }
                else{
                    $BonusPay=BonusPay::find($request->id);
                }
                $BonusPay->reference_no = 'bns-' . date("Ymd") . '-'. date("his");
                // $BonusPay->deptID=$request->deptID;
                $BonusPay->desigID=$request->desigID;
                $BonusPay->empID=$request->empID;
                $BonusPay->paidDate=$request->paidDate;
                $BonusPay->occation=$request->occation;
                $BonusPay->basicSalary=User::where('id',$request->empID)->first()->basic_salary;
                $BonusPay->bonusPercent=Payroll::first()->bonus ?? 0;
                $BonusPay->bonusAmount=$request->bonusAmount;
                $BonusPay->paidMethod=$request->payment_method;

                $BonusPay->balance_account_id=$request->account;

                $BonusPay->save();
                $del_check = AccountTransaction::where('relation_id',$BonusPay->id)->where('relation_with','Bonus')->get();
                if($del_check){
                    foreach($del_check as $del){
                        $del->delete();
                    }

                }

                $balance_account = BalanceAccount::find($request->account);
                $account_transaction = AccountTransaction::where('relation_id',$BonusPay->id)->where('relation_with','Bonus')->where('account_id',$balance_account->account_head_id)->first();
                if($account_transaction == null){
                    $account_transaction = New AccountTransaction;
                }
                $account_transaction->amount = $request->bonusAmount;
                $account_transaction->account_id = $balance_account->account_head_id;
                $account_transaction->type = "debit";
                $account_transaction->sub_type = "Bonus Pay";
                $account_transaction->reason = $BonusPay->reference_no ." Bonus Payment";
                $account_transaction->date = $request->paidDate;
                $account_transaction->relation_id = $BonusPay->id;
                $account_transaction->relation_with = "Bonus";
                $account_transaction->save();

                $cap_head =  AccountHead::where("code",'7003')->first();
                $ex_transaction = AccountTransaction::where('relation_id',$BonusPay->id)->where('relation_with','Bonus')->where('account_id',$cap_head->id)->first();
                if($ex_transaction == null){
                    $ex_transaction = New AccountTransaction;
                }
                $ex_transaction->amount = $request->bonusAmount;
                $ex_transaction->account_id = $cap_head->id;
                $ex_transaction->type = "credit";
                $ex_transaction->sub_type = "Bonus";
                $ex_transaction->reason = $BonusPay->reference_no ." Bonus Payment";
                $ex_transaction->date = $request->paidDate;
                $ex_transaction->relation_id = $BonusPay->id;
                $ex_transaction->relation_with = "Bonus";
                $ex_transaction->save();
                DB::commit();
                if($request->id==0){
                    return response([
                        'status' => 1,
                        'success' => 'Bonus add successfully.',
                    ]);
                }else{
                    return response([
                        'status' => 1,
                        'success' => 'Bonus update successfully.',
                    ]);
                }

            }catch(\Exception $e){
                DB::rollBack();
               // dd($e->getMessage());
                 return response([
                        'status' => 0,
                        'data'=>$e->getMessage(),
                        'error' => 'Something went Wrong!',
                    ]);
            }

        // $notification=array(
        //     'message'=>"Save Success",
        //     'alert-type'=>'success'
        //  );

        //return redirect()->route('bonuspay.view')->with($notification);

    }

    public function delete(Request $request,$id){
        try{
            DB::beginTransaction();
            $data=BonusPay::find($id);
            $del_check = AccountTransaction::where('relation_id',$data->id)->where('relation_with','Bonus')->get();
            if($del_check){
                foreach($del_check as $del){
                    $del->delete();
                }

            }
            $data->delete();
            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Deleted Successfully'
            ]);
        }catch (\Exception $e){
            DB::rollBack();
            return response()->json([
                'status'=>'no',
                'msg'=>$e->getMessage()
            ]);
        }

    }

    public function edit(Request $request){
        $data='';
        if (!$request->id) {
           $html ='Sorry';
        } else {

           $bonuspay=BonusPay::find($request->id);
           $deghtml="";
           
            $emphtml="";
            foreach(User::where('designation_id',$bonuspay->desigID)->get() as $employee){
                $emphtml .= '<option value="'.$employee->id.'">'.$employee->name."</option>";
            }
            $accounts="";

            foreach(BalanceAccount::where('method_id',$bonuspay->paidMethod)->get() as $bank_account){
                $accounts .= '<option value="'.$bank_account->id.'">'.$bank_account->account_name."</option>";
            }


            // $emphtml="";
            // foreach(Employee::where('designation_id',$bonuspay->desigID)->get() as $employee){
            //     $emphtml .= '<option value="'.$employee->id.'">'.$employee->employee_name."</option>";
            // }
            $data = array();
            $data["data"] =$bonuspay;
            $data["emphtml"] =$emphtml;
            $data["deghtml"] =$deghtml;
            $data["accounts"] =$accounts;
            $data["html"] ="";
          $html='';

        }

        return response()->json($data);
    }


}
