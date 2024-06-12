<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Account\AccountHead;
use App\Models\Account\ExpenseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ExpenseCategoryController extends Controller
{
    function index(){
        return view ('Accounts.expense_category.index');
    }
    function ajaxExpenseCategory(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'type',
        );
        $totalData = ExpenseCategory::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = ExpenseCategory::query();
        if(!empty($search)){
            $datalist =$datalist->where("name","LIKE","%{$search}%");  
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
                $nestedData['name'] = $data_v->name;
                $type = "";
                if($data_v->type == 1){
                    $type = "Dirct Expense";

                }else if($data_v->ac_type == 2){
                    $type = "Indirect Expense";
                }else{
                    $type = '--';
                }
                $nestedData['type'] =$type;
               
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

    function init_account(){
        $d_Ex = AccountHead::where("code",'6000')->first();
        if($d_Ex == null){
            $d_Ex = new AccountHead;
            $d_Ex->title = "Direct Expense";
            $d_Ex->code = '6000';
            $d_Ex->sys = 0;
            $d_Ex->ac_type = 6;
            $d_Ex->note = '';
            $d_Ex->status = 1;
            $d_Ex->save();
        }
        $d_Ex = AccountHead::where("code",'7000')->first();
        if($d_Ex == null){
            $d_Ex = new AccountHead;
            $d_Ex->title = "Indirect Expense";
            $d_Ex->code = '7000';
            $d_Ex->sys = 0;
            $d_Ex->ac_type =7;
            $d_Ex->note = '';
            $d_Ex->status = 1;
            $d_Ex->save();
        }
    }

    function store(Request $request){
        if($request->id==0){
            $validator = Validator::make($request->all(),[
                'expense_type'=>'required',
                'name'=>'required'
            ]);
        }else{
            $id = $request->id;
            $validator = Validator::make($request->all(),[
                'expense_type'=>'required',
                'name'=>'required'
            ]);
        }
        if($validator->fails()){
            return response([
                'status' => 0,
                'errors' => $validator->errors()
            ]);
        }
        try{
            DB::beginTransaction();
            if($request->id==0){
                $data=new ExpenseCategory();
            }
            else{
                $data=ExpenseCategory::find($request->id);
            }
            $data->name=$request->name;
            $data->type=$request->expense_type;
            $data->save();

            $cap_head =  AccountHead::where('expense_id',$data->id)->first();
            if($cap_head == null){
                $cap_head = new AccountHead;
            }
            $cap_head->code = '';
            $cap_head->title = $request->name;
            $cap_head->ac_type = $request->expense_type == 1 ? 6 : 7;
            $cap_head->note = '';
            $cap_head->sys = 0;
            $cap_head->parent = 0;
            $cap_head->expense_id = $data->id;
            $cap_head->status = 1;
            $cap_head->save();
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
                'error' => 'Something went Wrong!',
            ]);
        }
    }
    public function edit(Request $request)
    {
        if (!$request->id) {
           $html ='Sorry';
        } else {

           $data=ExpenseCategory::find($request->id);

          $html='';

        }

        return response()->json(['html' => $html,'id'=>$data->id,'name'=>$data->name,'code'=>$data->code,'type'=>$data->type]);
    }
    public function delete(Request $request,$id)
    {
        try{
            DB::beginTransaction();
            $data=ExpenseCategory::find($id);
            $cap_head =  AccountHead::where('expense_id',$data->id)->first();
            $cap_head->delete();
            $data->delete();
            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Expense Category Deleted Successfully'
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
