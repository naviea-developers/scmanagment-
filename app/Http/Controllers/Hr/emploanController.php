<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use App\Models\Account\AccountHead;
use App\Models\Account\AccountTransaction;
use App\Models\Account\BalanceAccount;
use App\Models\Account\PaymentMethod;
use Illuminate\Http\Request;
use App\Models\Hr\Department;
use App\Models\Hr\Designation;
use App\Models\Hr\NewEmployee;
use App\Models\Hr\Bank;
use App\Models\Hr\EmpBankAccount;
use App\Models\Hr\EmpLoan;
use App\Models\Hr\BankAccount;
use App\Models\Hr\Employee;
use App\User;

use Session;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\DB;

class emploanController extends Controller
{
    public function view(){
        $data['emploans']=Employee::join('designations','employees.designation_id','designations.id')
                              ->join('departments','employees.department_id','departments.id')
                              ->where('employees.loan_amount','>',0)
                              ->select('employees.*','departments.name as dept_name','designations.name as desi_name')
                              ->orderBy('employees.id','DESC')
                              ->get();


         $data['methods']=PaymentMethod::orderBy('id','DESC')->get();
        $data['departments']=Department::orderBy('id','DESC')->get();
        return view ('Hr.empLoan.manage',$data);
    }
     function inital_account(){
        $salesHead = AccountHead::where("code",'7004')->first();
        if($salesHead == null){
            $salesHead = new AccountHead;
            $salesHead->title = "Employee Loan";
            $salesHead->code = '7004';
            $salesHead->sys = 0;
            $salesHead->ac_type = 7;
            $salesHead->note = '';
            $salesHead->status = 1;
            $salesHead->save();

        }
        // $salesHead2 = AccountHead::where("code",'8004')->first();
        // if($salesHead2 == null){
        //     $salesHead2 = new AccountHead;
        //     $salesHead2->title = "Loan Return";
        //     $salesHead2->code = '8004';
        //     $salesHead2->sys = 0;
        //     $salesHead2->ac_type = 8;
        //     $salesHead2->note = '';
        //     $salesHead2->status = 1;
        //     $salesHead2->save();

        // }

    }
    public function store(Request $request)
    {
        $this->inital_account();
        $validator = Validator::make($request->all(),[
            'empID'=>'required',
            'deptID'=>'required',
            'desigID'=>'required',
            'amount'=>'required',
            'type'=>'required',
            'payment_method'=>'required',
            'account'=>'required',


        ], [
            'deptID.required'=> 'Department is required',
            'desigID.required'=> 'Designation is required',
            'empID.required'=> 'Employee is required',
            'type.required'=> 'Type is required',
            'amount.required'=> 'Amount is required',
            'payment_method.required'=> 'Method is required',
            'account.required'=> 'Account is required',
        ]);


        if($validator->fails()){
            return response([
                'status' => 0,
                'errors' => $validator->errors()
            ]);
        }
        try{
            DB::beginTransaction();

            if($request->id==0){
                $data=new EmpLoan();
            }
            else{
                $data=EmpLoan::find($request->id);
            }
             $data->reference_no = 'emp-' . date("Ymd") . '-'. date("his");
            $data->empID=$request->empID;
            $data->loan_date=$request->paidDate;
            $data->deptID=$request->deptID;
            $data->desigID=$request->desigID;
            $data->type=$request->type;
            $data->method_id=$request->payment_method;
            $data->amount=$request->amount;
            $data->balance_account_id=$request->account;
            $data->save();
             $employee=Employee::where('id',$request->empID)->first();
            if($request->type=='Loan'){
                $employee->loan_amount=$employee->loan_amount+$request->amount;
            }
            else{
                $employee->loan_amount=$employee->loan_amount-$request->amount;
            }
            $employee->save();

            $del_check = AccountTransaction::where('relation_id',$data->id)->where('relation_with','Employee Loan')->get();
            if($del_check){
                foreach($del_check as $del){
                    $del->delete();
                }

            }
             if($request->type=='Loan'){
                $balance_account = BalanceAccount::find($request->account);
                $account_transaction = AccountTransaction::where('relation_id',$data->id)->where('relation_with','Employee Loan')->where('account_id',$balance_account->account_head_id)->first();
                if($account_transaction == null){
                    $account_transaction = New AccountTransaction;
                }
                $account_transaction->amount = $request->amount;
                $account_transaction->account_id = $balance_account->account_head_id;
                $account_transaction->type = "debit";
                $account_transaction->sub_type = "Employee Loan Pay";
                $account_transaction->reason = $data->reference_no ." Employee Loan Payment";
                $account_transaction->date = $request->paidDate;
                $account_transaction->relation_id = $data->id;
                $account_transaction->relation_with = "Employee Loan";
                $account_transaction->save();

                $cap_head =  AccountHead::where("code",'7004')->first();
                $ex_transaction = AccountTransaction::where('relation_id',$data->id)->where('relation_with','Employee Loan')->where('account_id',$cap_head->id)->first();
                if($ex_transaction == null){
                    $ex_transaction = New AccountTransaction;
                }
                $ex_transaction->amount = $request->amount;
                $ex_transaction->account_id = $cap_head->id;
                $ex_transaction->type = "credit";
                $ex_transaction->sub_type = "Employee Loan";
                $ex_transaction->reason = $data->reference_no ." Employee Loan Payment";
                $ex_transaction->date = $request->paidDate;
                $ex_transaction->relation_id = $data->id;
                $ex_transaction->relation_with = "Employee Loan";
                $ex_transaction->save();
            }else{
                $balance_account = BalanceAccount::find($request->account);
                $account_transaction = AccountTransaction::where('relation_id',$data->id)->where('relation_with','Employee Loan')->where('account_id',$balance_account->account_head_id)->first();
                if($account_transaction == null){
                    $account_transaction = New AccountTransaction;
                }
                $account_transaction->amount = $request->amount;
                $account_transaction->account_id = $balance_account->account_head_id;
                $account_transaction->type = "credit";
                $account_transaction->sub_type = "Employee Loan Return";
                $account_transaction->reason = $data->reference_no ." Employee Loan Return Payment";
                $account_transaction->date = $request->paidDate;
                $account_transaction->relation_id = $data->id;
                $account_transaction->relation_with = "Employee Loan";
                $account_transaction->save();

                $cap_head =  AccountHead::where("code",'7004')->first();
                $ex_transaction = AccountTransaction::where('relation_id',$data->id)->where('relation_with','Employee Loan')->where('account_id',$cap_head->id)->first();
                if($ex_transaction == null){
                    $ex_transaction = New AccountTransaction;
                }
                $ex_transaction->amount = $request->amount;
                $ex_transaction->account_id = $cap_head->id;
                $ex_transaction->type = "debit";
                $ex_transaction->sub_type = "Employee Loan Return";
                $ex_transaction->reason = $data->reference_no ." Employee Loan  Return Payment";
                $ex_transaction->date = $request->paidDate;
                $ex_transaction->relation_id = $data->id;
                $ex_transaction->relation_with = "Employee Loan";
                $ex_transaction->save();
            }
          DB::commit();
          if($request->id==0){
                return response([
                    'status' => 1,
                    'success' => 'Employee Loan add successfully.',
                ]);
            }else{
                return response([
                    'status' => 1,
                    'success' => 'Employee Loan update successfully.',
                ]);
            }
        }catch(\Exception $e){
            DB::rollBack();
            return response([
                'status' => 0,
                'data'=> $e->getMessage(),
                'error' => 'Something went Wrong!',
            ]);
        }

        // $notification=array(
        //     'message'=>"Save Success",
        //     'alert-type'=>'success'
        // );

        // return redirect()->route('emploan.view')->with($notification);
    }

    public function delete(Request $request){

        $data=EmpLoan::find($request->id);
        $data->delete();

        $notification=array(
                'message'=>"Delete successfull",
                'alert-type'=>'success'
             );

            return redirect()->route('emploan.view');

    }

    public function edit(Request $request){

        if (!$request->id) {
           $html ='Sorry';
        } else {

           $bankaccount=EmpLoan::find($request->id);




          $html='<option>-- Select One --</option>';





           $this_emp=Employee::where('empID',$bankaccount->empID)->first();
           $departments=Department::orderBy('id','DESC')->get();
           $designations=Designation::where('deptID',$this_emp->deptID)->get();


           //department select
          $deptIDbank='<option>-- Select One --</option>';

            foreach($departments as $department){
                if($department->id==$this_emp->deptID){
                    $deptIDbank.='<option value="'.$department->id.'" selected>'.$department->deptName.'</option>';
                }
                else{
                    $deptIDbank.='<option value="'.$department->id.'">'.$department->deptName.'</option>';
                }

            }

            //designation select
            $desigIDbank='<option>-- Select One --</option>';

            foreach($designations as $designation){
                if($designation->id==$this_emp->desigID){
                    $desigIDbank.='<option value="'.$designation->id.'" selected>'.$designation->desigName.'</option>';
                }
                else{
                    $desigIDbank.='<option value="'.$designation->id.'">'.$designation->desigName.'</option>';
                }

            }

            $employees=Employee::where('desigID',$this_emp->desigID)->get();
           $empIDbank='<option>-- Select One --</option>';

            foreach($employees as $employee){

                if($employee->empID==$this_emp->empID){
                    $empIDbank.='<option value="'.$employee->empID.'" selected>'.$employee->empID.'</option>';
                }else{
                    $empIDbank.='<option value="'.$employee->empID.'">'.$employee->empID.'</option>';
                }


            }


        }

       return response()->json(['html' => $html,'empIDbank'=>$empIDbank,'desigIDbank'=>$desigIDbank,'deptIDbank'=>$deptIDbank,'bankaccountID'=>$bankaccount->id,'acName'=>$bankaccount->acName,'branchName'=>$bankaccount->branchName,'acType'=>$bankaccount->acType,'acNumber'=>$bankaccount->acNumber,'routingNumber'=>$bankaccount->routingNumber]);

    }


    public function loanLegder(Request $request)
    {
        if (!$request->id) {
           $html ='Sorry';
        } else {

            $employee=DB::table('employees')
                              ->join('designations','employees.designation_id','designations.id')
                              ->join('departments','employees.department_id','departments.id')
                              ->where('employees.id',$request->id)
                              ->select('employees.*','departments.name as deptName','designations.name as desigName')
                              ->first();
            $loans=EmpLoan::where('empID',$request->id)->get();

            $html='<center><strong>Name: '.$employee->employee_name.'<br/>ID: '.$employee->employee_id.'<br/>Department: '.$employee->deptName.'<br/>Designation: '.$employee->desigName.'<br/><br/>'.'</strong></center>';


            $html.='<table id="dataTable" class="table table-striped table-bordered table-responsive" style="width:100%">
                          <thead>
                            <tr>
                              <th>SN.</th>
                              <th>Date</th>
                              <th>Method</th>
                              <th>Bank Account</th>
                              <th>Debit</th>
                              <th>Credit</th>
                              <th>Balance</th>
                              <th>Type</th>
                            </tr>
                          </thead>

                          <tbody>';

                                $debit=0;
                                $credit=0;
                                $balance=0;
                                $indexValue=1;;

                            foreach($loans as $emploan){
                                $dr=0;
                                $cr=0;
                                if( $emploan->type == "Loan"){
                                    $dr=$emploan->amount;
                                    $debit+=$emploan->amount;
                                    $balance=$balance+$debit;
                                }else{
                                    $cr=$emploan->amount;
                                    $credit+=$emploan->amount;
                                    $balance=$balance-$credit;
                                }



                               // return $emploan->method;
                             $html.='<tr><td>'.$indexValue++.'</td><td>'.date('Y-m-d',strtotime($emploan->loan_date)).'</td><td>'.$emploan?->method?->name.'</td><td>'.@$emploan?->bank_account?->account_name.'</td><td>'.auth()->user()->currency_symbol.' '.round($dr,2).'</td><td>'.auth()->user()->currency_symbol.' '.round($cr,2).'</td><td>'.auth()->user()->currency_symbol.' '.$balance.'</td><td>'.$emploan->type.'</td></tr>';

                            }

                    $html.='</tbody></table>';
        }


        return response()->json(['html' => $html]);

    }

    public function empbankaccount(Request $request){

        if (!$request->id) {
           $html ='Sorry';
        } else {

           $Accounts=EmpBankAccount::where('bankID',$request->id)->get();
           $html='<option>-- Select One --</option>';

            foreach($Accounts as $Account){

                    $html.='<option value="'.$Account->id.'">'.$Account->acNumber.'</option>';
            }
        }

        return response()->json(['html' => $html]);
    }


}
