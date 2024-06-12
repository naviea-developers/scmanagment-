<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Account\AccountHead;
use App\Models\Account\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PaymentMethodController extends Controller
{
    function index(){
        return view ('Accounts.payment_method.manage');
    }
    function ajaxPaymentMethod(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'name',
        );
        $totalData = PaymentMethod::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = PaymentMethod::query();
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
        if($request->id==0){
            $validator = Validator::make($request->all(),[
                'name'=>'required'
            ]);
        }else{
            $id = $request->id;
            $validator = Validator::make($request->all(),[
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
                $data=new PaymentMethod();
            }
            else{
                $data=PaymentMethod::find($request->id);
            }
            $data->name=$request->name;
            $data->save();
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

           $data=PaymentMethod::find($request->id);

          $html='';

        }

        return response()->json(['html' => $html,'id'=>$data->id,'name'=>$data->name]);
    }
    public function delete(Request $request,$id)
    {
        try{
            DB::beginTransaction();
            $data=PaymentMethod::find($id);
            $data->delete();
            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Payment Method Deleted Successfully'
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
