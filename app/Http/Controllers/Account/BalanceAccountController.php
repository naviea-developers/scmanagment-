<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Account\AccountHead;
use App\Models\Account\AccountTransaction;
use Illuminate\Http\Request;
use App\Models\Account\PaymentMethod;
use App\Models\Account\BalanceAccount;
use Illuminate\Support\Facades\DB;
use Str;
use Illuminate\Support\Facades\Validator;
class BalanceAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['accounts']=AccountHead::orderBy('id','DESC')->get();
        $data['methods'] = PaymentMethod::where('status', 1)->get();
        return view('Accounts.balance_account.index',$data);
    }
    function ajaxBalanceAccount(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'payment_methods.name',
            2 => 'balance_accounts.account_name',
            3 => 'balance_accounts.bank_name',
            4 => 'balance_accounts.branch_name',
            5 => 'balance_accounts.account_number',
            6 => 'balance_accounts.routing_number',
            7 => 'balance_accounts.balance',
            8 => 'balance_accounts.status',
        );
        $totalData = BalanceAccount::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = BalanceAccount::leftJoin('payment_methods','payment_methods.id','balance_accounts.method_id');
        if(!empty($search)){
            $datalist =$datalist->where("payment_methods.name","LIKE","%{$search}%")
            ->orwhere("balance_accounts.account_name","LIKE","%{$search}%")
            ->orwhere("balance_accounts.bank_name","LIKE","%{$search}%")
            ->orwhere("balance_accounts.branch_name","LIKE","%{$search}%")
            ->orwhere("balance_accounts.account_number","LIKE","%{$search}%")
            ->orwhere("balance_accounts.routing_number","LIKE","%{$search}%");  
        }
        $totalFiltered = $datalist->count();
        $datalist = $datalist->select('balance_accounts.*','payment_methods.name as p_name')->offset($start)->limit($limit)->orderBy($order,$dir)->get();
        
 
        $data = array();
        if(!empty($datalist))
        {
             $i = $start == 0 ? 1 : $start+1;
            foreach($datalist as $data_v)
            {
                $nestedData['id'] = $i++;
                $nestedData['m_name'] = $data_v->p_name;
                $nestedData['name'] = $data_v->account_name;
                $nestedData['bank_name'] = $data_v->bank_name;
                $nestedData['branch_name'] = $data_v->branch_name;
                $nestedData['ac_number'] = $data_v->account_number;
                $nestedData['r_number'] = $data_v->routing_number;
                $nestedData['balance'] = round($data_v->balance,2);
                $status = "";
                if($data_v->status == 1){
                    $status =   "<div class='badge bg-success badge-shadow'>Active</div>";
                }else{
                    $status=  "<div class='badge bg-danger badge-shadow'>Inactive</div>";
                }
                $nestedData['status'] =$status;
               
                $nestedData['options']='';
                
                $nestedData['options'] .= '<a class="btn btn-primary data_edit" href="'.url(('balance_account/'.$data_v->id.'/edit')).'" ><i class="fa fa-edit"></i></a>';
            
                // $nestedData['options'] .= '<a title="Delete"  style="margin-left: 10px" class="del_hr_data btn btn-danger" data-id="'.$data_v->id.'"><i class="fa fa-trash"></i></a>';
               
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
    function select2BalanceAccounts(Request $request){
         $accounts = BalanceAccount::select('id', 'account_name')->where('method_id',$request->method_id)->where("account_name", "LIKE", "%$request->value%")->get();
        foreach ($accounts as $account) {
            $data[] = ['id' => $account->id, 'text' => $account->account_name];
        }
        return json_encode($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['accounts']=AccountHead::orderBy('id','DESC')->get();
        $data['methods'] = PaymentMethod::where('status', 1)->get();
        return view('Accounts.balance_account.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'method_id' => 'required',
            'account_name' => 'required',
            'account_head' => 'required',
            'account_number' => 'required',
            'balance' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=>'error',
                'errors'=>$validator->errors()->all()
            ]);
        }
        try{
            DB::beginTransaction();
            $account = new BalanceAccount();
            $account->method_id = $request->method_id;
            $account->account_head_id = $request->account_head;
            $account->account_name = $request->account_name;
            $account->bank_name = $request->bank_name;
            $account->branch_name = $request->branch_name;
            $account->account_number = $request->account_number;
            $account->routing_number = $request->routing_number;
            $account->balance = $request->balance;
            // $account->status = $request->status;
            $account->save();
            if(!empty($request->balance)){
                $account_transaction = New AccountTransaction;
                $account_transaction->amount = $request->balance;
                $account_transaction->account_id = $request->account_head;
                $account_transaction->type = "credit";
                $account_transaction->sub_type = "Opening Balance";
                $account_transaction->reason = "Opening Balance";
                $account_transaction->date = date('Y-m-d');
                $account_transaction->relation_id = $account->id;
                $account_transaction->relation_with = "Opening";
                $account_transaction->save();

            }

            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Balance Account Add Successfully'
            ]);
        }catch(\Exception $e){
            DB::rollBack();
            // dd($e->getMessage());
            return response()->json([
                'status'=>'no',
                'msg'=>$e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = BalanceAccount::findorfail($id);
       // dd($data->account);
        $methods = PaymentMethod::where('status', 1)->get();
        return view('Accounts.balance_account.edit', compact('methods', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $validatedData = $request->validate([
            'method_id' => 'required',
            'account_name' => 'required',
            'account_head' => 'required',
            'account_number' => 'required',
            'balance' => 'required'
        ]);
        $validator = Validator::make($request->all(), [
            'method_id' => 'required',
            'account_name' => 'required',
            'account_head' => 'required',
            'account_number' => 'required',
            'balance' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=>'error',
                'errors'=>$validator->errors()->all()
            ]);
        }
        try{
            DB::beginTransaction();
            $account = BalanceAccount::find($id);
            $account->account_head_id = $request->account_head;
            $account->method_id = $request->method_id;
            $account->account_name = $request->account_name;
            $account->bank_name = $request->bank_name;
            $account->branch_name = $request->branch_name;
            $account->account_number = $request->account_number;
            $account->routing_number = $request->routing_number;
            $account->balance = $request->balance;
            // $account->status = $request->status;
            $account->save();
            if(!empty($request->balance)){
                $account_transaction =  AccountTransaction::where('relation_id',$account->id)->where('relation_with','Bank Account')->where('account_id', $request->account_head)->first();
                if($account_transaction == null){
                    $account_transaction = New AccountTransaction;
                }
                $account_transaction->amount = $request->balance;
                $account_transaction->account_id = $request->account_head;
                $account_transaction->type = "credit";
                $account_transaction->sub_type = "Bank Account";
                $account_transaction->reason = "Opening Balance";
                $account_transaction->date = date('Y-m-d');

                $account_transaction->relation_id = $account->id;
                $account_transaction->relation_with = "Bank Account";
                $account_transaction->save();

                $cap_head = AccountHead::where("code",'9010')->first();
                if($cap_head == null){
                    $cap_head = new AccountHead;
                    $cap_head->code = '9010';
                    $cap_head->title = "Capital Balance";
                    $cap_head->ac_type = 3;
                    $cap_head->note = '';
                    $cap_head->sys = 0;
                    $cap_head->status = 1;
                    $cap_head->save();
                }
                $sc_transaction =  AccountTransaction::where('relation_id',$account->id)->where('relation_with','Bank Account')->where('account_id',$cap_head->id)->first();
                if($sc_transaction == null){
                    $sc_transaction = New AccountTransaction;
                }

                $sc_transaction->amount = $request->balance;
                $sc_transaction->account_id = $cap_head->id;
                $sc_transaction->type = "credit";
                $sc_transaction->sub_type = "Bank Account";
                $sc_transaction->reason = "Opening Balance";
                $sc_transaction->date =  date('Y-m-d');
                $sc_transaction->relation_id = $account->id;
                $sc_transaction->relation_with = "Bank Account";
                $sc_transaction->save();

            }
            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Balance Account Updated Successfully'
            ]);
        }catch(\Exception $e){
            DB::rollBack();
            // dd($e->getMessage());
            return response()->json([
                'status'=>'no',
                'msg'=>$e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            DB::beginTransaction();

            $account = BalanceAccount::find($id);
            $account_transaction =  AccountTransaction::where('relation_id',$account->id)->where('relation_with','Opening')->first();
            if($account_transaction){
                $account_transaction->delete();
            }
            $account->delete();

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
