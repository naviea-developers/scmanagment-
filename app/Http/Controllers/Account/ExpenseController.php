<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Account\AccountHead;
use App\Models\Account\AccountTransaction;
use App\Models\Account\BalanceAccount;
use App\Models\Account\Expense;
use App\Models\Account\ExpenseCategory;
use App\Models\Account\PaymentMethod;
use App\Models\Hr\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
class ExpenseController extends Controller
{
    function index(){
        // $data['expenses']=Expense::orderBy('id','DESC')->get();
        $data['categories']=ExpenseCategory::orderBy('id','DESC')->get();
        $data['methods']=PaymentMethod::orderBy('id','DESC')->get();
        return view ('Accounts.expense.index',$data);
    }
    function ajaxExpense(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'payment_methods.name',
            2 => 'expenses.reason',
            3 => 'expenses.amount',
            4 => 'expenses.date',
            5 => 'payment_methods.name',
            6 => 'balance_accounts.account_name',
        );
        $totalData = Expense::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = Expense::leftJoin('expense_categories','expense_categories.id','expenses.category_id')
        ->leftJoin('payment_methods','payment_methods.id','expenses.method_id')
        ->leftJoin('balance_accounts','balance_accounts.id','expenses.balance_account_id');
        if(!empty($search)){
            $datalist =$datalist->where("expense_categories.name","LIKE","%{$search}%")
            ->orwhere("payment_methods.name","LIKE","%{$search}%")  
            ->orwhere("balance_accounts.name","LIKE","%{$search}%")  
            ->orwhere("expenses.reason","LIKE","%{$search}%") 
            ->orwhere("expenses.amount","LIKE","%{$search}%")  
            ->orwhere("expenses.date","LIKE","%{$search}%");  
        }
        $totalFiltered = $datalist->count();
        $datalist = $datalist->select('expenses.*','expense_categories.name as cat_name','payment_methods.name as p_name','balance_accounts.account_name as ac_name')->offset($start)->limit($limit)->orderBy($order,$dir)->get();
        
 
        $data = array();
        if(!empty($datalist))
        {
             $i = $start == 0 ? 1 : $start+1;
            foreach($datalist as $data_v)
            {
                $nestedData['id'] = $i++;
                $nestedData['cat_name'] = $data_v->cat_name;
                $nestedData['p_name'] = $data_v->p_name;
                $nestedData['ac_name'] = $data_v->ac_name;
                $nestedData['reason'] = $data_v->reason;
                $nestedData['date'] = date('Y-m-d',strtotime($data_v->date));
                $nestedData['amount'] = round($data_v->amount,2);
               
               
                $nestedData['options']='';
                
                $nestedData['options'] .= '<a class="btn btn-primary data_edit_e" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#updateModal" data-id="'.$data_v->id.'"><i class="fa fa-edit"></i></a>';
            
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
    function store(Request $request){

        $validator = Validator::make($request->all(),[
            'reason'=>'required',
            'category'=>'required',
            'date'=>'required',
            'amount'=>'required',
            'payment_method'=>'required',
            'account'=>'required',

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
                $data=new Expense();
            }
            else{
                $data=Expense::find($request->id);
            }
            $data->reference_no = 'ex-' . date("Ymd") . '-'. date("his");
            $data->category_id=$request->category;
            $data->reason=$request->reason;
            $data->amount=$request->amount;
            $data->date=$request->date;
            $data->method_id=$request->payment_method;
            $data->balance_account_id=$request->account;
            $data->save();

            $balance_account = BalanceAccount::find($request->account);
            //return $balance_account;
            $account_transaction = AccountTransaction::where('relation_id',$data->id)->where('relation_with','Expense')->where('account_id',$balance_account->account_head_id)->first();
            if($account_transaction == null){
                $account_transaction = New AccountTransaction;
            }

            // $account_transaction->amount = $request->amount;
            // $account_transaction->account_id = $balance_account->account_head_id;
            // $account_transaction->type = "debit";
            // $account_transaction->sub_type = "Expense";
            // $account_transaction->reason =  $data->reference_no ." Expense Payment";
            // $account_transaction->date =$request->date;
            // // $account_transaction->created_by = 0;
            // $account_transaction->relation_id =$data->id;
            // // $account_transaction->payment_id = 0;
            // // $account_transaction->note = $request->note;
            // // $account_transaction->transfer_transaction_id = 0;
            // $account_transaction->save();
            // $data->transaction_id = $account_transaction->id;
            // $data->save();


            // $account_transaction = New AccountTransaction;
            $account_transaction->amount = $request->amount;
            $account_transaction->account_id = $balance_account->account_head_id;
            $account_transaction->type = "debit";
            $account_transaction->sub_type = "Expense";
            $account_transaction->reason = $data->reference_no ." Expense Payment";
            $account_transaction->date = date('Y-m-d');
            $account_transaction->relation_id = $data->id;
            $account_transaction->relation_with = "Expense";
            $account_transaction->save();

            $cap_head =  AccountHead::where('expense_id',$request->category)->first();
            $ex_transaction = AccountTransaction::where('relation_id',$data->id)->where('relation_with','Expense')->where('account_id',$cap_head->id)->first();
            if($ex_transaction == null){
                $ex_transaction = New AccountTransaction;
            }
            $ex_transaction->amount = $request->amount;
            $ex_transaction->account_id = $cap_head->id;
            $ex_transaction->type = "credit";
            $ex_transaction->sub_type = "Expense";
            $ex_transaction->reason = $data->reference_no ." Expense Payment";
            $ex_transaction->date = date('Y-m-d');
            $ex_transaction->relation_id = $data->id;
            $ex_transaction->relation_with = "Expense";
            $ex_transaction->save();
            DB::commit();
            if($request->id==0){
                return response([
                    'status' => 1,
                    'success' => 'Save successfully.',
                ]);
            }else{
                return response([
                    'status' => 1,
                    'success' => 'Update successfully.',
                ]);
            }
        }catch(\Exception $e){
            DB::rollBack();
            return response([
                'status' => 0,
                'data' => $e->getMessage(),
                'error' => 'Something went Wrong!',
            ]);
        }
    }
     public function edit(Request $request)
    {
        if (!$request->id) {
            $html ='Sorry';
        } else {
            $data=Expense::find($request->id);
            $html='';
        }
        return response()->json(['html' => $html,'id'=>$data->id,'reason'=>$data->reason,'date'=>date("Y-m-d",strtotime($data->date)),'amount'=>$data->amount,'method'=>$data->method_id,'account_name'=>$data->balance_account->account_name,'account_id'=>$data->balance_account_id,'category'=>$data->category_id]);
    }
    public function delete(Request $request,$id)
    {
        try{
            DB::beginTransaction();

            $data=Expense::find($id);
            $data->delete();
            $account_transaction = AccountTransaction::where('relation_id',$data->id)->first();
            if($account_transaction){
                $account_transaction->delete();
            }

            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Account Head Deleted Successfully'
            ]);
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json([
                'status'=>'no',
                'msg'=>$e->getMessage()
            ]);
        }
        
    }
}
