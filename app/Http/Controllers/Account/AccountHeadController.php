<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account\AccountHead;
use App\Models\Account\PaymentMethod;
use App\Models\Account\AccountSubHead;
use App\Models\Account\AccountTransaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class AccountHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('Accounts.account_head.index');
    }
    function ajaxAccountHead(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'title',
            2 => 'ac_type',
            4 => 'status',
        );
        $totalData = AccountHead::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = AccountHead::query();
        if(!empty($search)){
            $datalist =$datalist->where("title","LIKE","%{$search}%");  
        }
        $totalFiltered = $datalist->count();
        $datalist = $datalist->offset($start)->limit($limit)->orderBy($order,$dir)->get();
        
 
        $data = array();
        if(!empty($datalist))
        {
             $i = $start == 0 ? 1 : $start+1;
            foreach($datalist as $data_v)
            {
                $nestedData['id'] = $i++;
                $nestedData['name'] = $data_v->title;
                $ac_text = "";
                if($data_v->ac_type == 1){
                    $ac_text = "Asset";
                }else if($data_v->ac_type == 2){
                    $ac_text ="Liability";
                }else if($data_v->ac_type == 3){
                    $ac_text = "Equity";
                }else if($data_v->ac_type == 4){
                    $ac_text = "Income";
                }else if($data_v->ac_type == 5){
                    $ac_text = "Expense";

                }else if($data_v->ac_type == 6){
                    $ac_text = "Dirct Expense";

                }else if($data_v->ac_type == 7){
                    $ac_text = "Indirect Expense";
                }
                $nestedData['type'] =$ac_text;
                $balance = \App\Models\Account\AccountTransaction::select(\DB::raw("SUM( IF(type='credit', IFNULL(amount,0), -1*IFNULL(amount,0)) ) as t_amount"))->where('account_id',$data_v->id)->get();
                $nestedData['balance'] =round($balance[0]->t_amount ? $balance[0]->t_amount : 0,2);
                if($data_v->status == 1){
                    $nestedData['status'] ="<div class='badge text-success badge-shadow'>Active</div>";
                }else{
                    $nestedData['status']=  "<div class='badge text-danger badge-shadow'>Inactive</div>";
                }
                $nestedData['options']='';
                if($data_v->sys != 0){
                    $nestedData['options'] .= '<a class="btn btn-primary data_edit" href="'. route('account_head.edit',$data_v->id) .'"><i class="fa fa-edit"></i></a>';
                
                    $nestedData['options'] .= '<a title="Delete"  style="margin-left: 10px" class="del_hr_data btn btn-danger" data-id="'.$data_v->id.'"><i class="fa fa-trash"></i></a>';
                }
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
    function select2Account(Request $request){
        $accounts = AccountHead::select('id', 'title')->where("title", "LIKE", "%$request->value%")->get();
        foreach ($accounts as $account) {
            $data[] = ['id' => $account->id, 'text' => $account->title];
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
        // $accounts_list = AccountHead::where('parent','!=',0)->get();
        // $methods = PaymentMethod::where('status', 1)->get();

        // $sub_heads = AccountSubHead::where('status',1)->where('parent_id',0)->get();
        // dd($accounts_list);
        return view('Accounts.account_head.create');
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
            'title' => 'required',
            'ac_type' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=>'error',
                'errors'=>$validator->errors()->all()
            ]);
        }
        try{
            DB::beginTransaction();
            $data = new AccountHead();
            $data->title = $request->title;
            $data->ac_type = $request->ac_type;
            $data->note = $request->note;

            $data->status = $request->status;
            $data->save();
            if(!empty($request->opening_balance)){
                $account_transaction = New AccountTransaction;
                $account_transaction->amount = $request->opening_balance;
                $account_transaction->account_id = $data->id;
                $account_transaction->type = "credit";
                $account_transaction->sub_type = "Opening Balance";
                $account_transaction->reason = "Opening Balance";
                $account_transaction->date = date('Y-m-d');
                $account_transaction->relation_id = $data->id;
                $account_transaction->save();

                $data->opening_id = $account_transaction->id;
                $data->save();
            }
            DB::commit();
            
            return response()->json([
                'status'=>'yes',
                'msg'=>'Account Head Add Successfully'
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

        $data = AccountHead::findorfail($id);

        return view('Accounts.account_head.edit', compact('data'));
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
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'ac_type' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=>'error',
                'errors'=>$validator->errors()->all()
            ]);
        }
        try{
            DB::beginTransaction();
            $data = AccountHead::find($id);
            $data->title = $request->title;
            $data->ac_type = $request->ac_type;
            $data->note = $request->note;
            $data->status = $request->status;
            $data->save();
            if(!empty($request->opening_balance)){
                $account_transaction =  AccountTransaction::find($data->opening_id);
                if($account_transaction){
                    $account_transaction = New AccountTransaction;
                }


                $account_transaction->amount = $request->opening_balance;
                $account_transaction->account_id = $data->id;
                $account_transaction->type = "credit";
                $account_transaction->sub_type = "Opening Balance";
                $account_transaction->reason = "Opening Balance";
                $account_transaction->date = date('Y-m-d');
                $account_transaction->relation_id = $data->id;
                $account_transaction->save();
                $data->opening_id = $account_transaction->id;
                $data->save();

            }


            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Account Head Updated Successfully'
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
            $data = AccountHead::find($id);
            $account_transaction =  AccountTransaction::find($data->opening_id);
            if($account_transaction){
                $account_transaction->delete();
            }
           
            $data->delete();


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
