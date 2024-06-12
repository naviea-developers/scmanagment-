<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hr\LeaveType;
use App\User;

use Session;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\DB;

class leaveTypeController extends Controller
{
    public function view(){
        
        return view ('Hr.leaveType.manage');
    }
    function ajaxLeaveType(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'leaveCode',
           
            3 => 'day',
            4 => 'hour',
        );
        $totalData = LeaveType::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        //dd($request->input('order.0.column'));
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = LeaveType::query();
        if(!empty($search)){
 
            $datalist =$datalist->where("leaveCode","LIKE","%{$search}%");
           
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
                $nestedData['name'] = $data_v->leaveCode;
                $nestedData['description'] = $data_v->description;
              
                $nestedData['day'] = $data_v->day;
                $nestedData['hour'] = $data_v->hour;
               
                $nestedData['options'] = '<a class="btn btn-primary" href="javascript:void(0)" id="leaveTypeEdit" data-id="'.$data_v->id.'" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-edit"></i></a>';
             
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
            'leaveCode'=>'required',
            'description'=>'required'
        ],[
            'leaveCode.required'=> 'Leave Code is required',
            'description.required'=> 'Description is required',
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
                $data=new LeaveType();
            }
            else{
                $data=LeaveType::find($request->id);
            }
            $data->leaveCode=$request->leaveCode;
            $data->description=$request->description;
            $data->day=$request->day;
            $data->hour=$request->hour;
            $data->save();

            DB::commit();
            if($request->id==0){
                return response([
                    'status' => 1,
                    'success' => 'Leave Type add successfully.',
                ]);
            }else{
                return response([
                    'status' => 1,
                    'success' => 'Leave Type update successfully.',
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

    public function delete(Request $request,$id){
        try{
            DB::beginTransaction();
            $data=LeaveType::find($id);
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

           $data=LeaveType::find($request->id);
        }

        return response()->json(['leaveCode' => $data->leaveCode,'leaveTypeID'=>$data->id,'description'=>$data->description,'day'=>$data->day,'hour'=>$data->hour]);
    }
}
