<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hr\LeavePart;
use App\User;

use Session;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\DB;

class leavePartController extends Controller
{
    public function view(){
        return view ('Hr.leavePart.manage');
    }
    function ajaxLeavePart(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'levaePartName',
            2 => 'day',
        );
        $totalData = LeavePart::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        //dd($request->input('order.0.column'));
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = LeavePart::query();
        if(!empty($search)){
 
            $datalist =$datalist->where("levaePartName","LIKE","%{$search}%");
           
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
                $nestedData['name'] = $data_v->levaePartName;
              
                $nestedData['day'] = $data_v->day;
               
                $nestedData['options'] = '<a class="btn btn-primary" href="javascript:void(0)" id="leavePartEdit" data-id="'.$data_v->id.'" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-edit"></i></a>';
             
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

    public function store(Request $request){

        date_default_timezone_set('Asia/Dhaka');


       $validator = Validator::make($request->all(),[
              'levaePartName'=>'required',
              'day'=>'required'
        ],[
            'levaePartName.required'=> 'Leave Part Name is required',
            'day.required'=> 'Day is required',
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
                $data=new LeavePart();
            }
            else{
                $data=LeavePart::find($request->id);
            }
            $data->levaePartName=$request->levaePartName;
            $data->day=$request->day;
            $data->save();



            DB::commit();
            if($request->id==0){
                return response([
                    'status' => 1,
                    'success' => 'Leave Part add successfully.',
                ]);
            }else{
                return response([
                    'status' => 1,
                    'success' => 'Leave Part update successfully.',
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

    public function delete(Request $request){
        try{
            DB::beginTransaction();
            $data=LeavePart::find($request->id);
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

        if (!$request->id) {
           $html ='Sorry';
        } else {

           $data=LeavePart::find($request->id);
        }

        return response()->json(['levaePartName' => $data->levaePartName,'leavePartID'=>$data->id,'day'=>$data->day]);
    }
}
