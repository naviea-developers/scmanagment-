<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use App\Models\Hr\Shift;
use Illuminate\Http\Request;
use App\User;

use Session;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\DB;

class shiftManageController extends Controller
{
    public function view(){
        $data['shifts']=Shift::orderBy('id','DESC')->get();
        return view ('Hr.shiftManage.manage',$data);
    }
    function ajaxShift(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'shiftName',
            2 => 'startTime',
            2 => 'endTime',
        );
        $totalData = Shift::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = Shift::query();
        if(!empty($search)){
            $datalist =$datalist->where("shiftName","LIKE","%{$search}%")
            ->orwhere("startTime","LIKE","%{$search}%")
            ->orwhere("endTime","LIKE","%{$search}%");  
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
                $nestedData['name'] = $data_v->shiftName;
              
                $nestedData['start_time'] = \Carbon\Carbon::parse($data_v->startTime)->format('h:i a');
                $nestedData['end_time'] = \Carbon\Carbon::parse($data_v->endTime)->format('h:i a');
               
                $nestedData['options'] = '<a class="btn btn-primary" href="javascript:void(0)" id="shiftEdit" data-id="'.$data_v->id.'" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-edit"></i></a>';
             
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
            'shiftName'=>'required',
            'startTime'=>'required',
            'endTime'=>'required'
            ],[
            'shiftName.required'=> 'Shift Name is required',
            'startTime.required'=> 'Start Time is required',
            'endTime.required'=> 'End Time is required',
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
                $data=new Shift();
            }
            else{
                $data=Shift::find($request->id);
            }
            $data->shiftName=$request->shiftName;
            $data->startTime=$request->startTime;
            $data->endTime=$request->endTime;
            $data->save();

            DB::commit();
            if($request->id==0){
                return response([
                    'status' => 1,
                    'success' => 'Shift add successfully.',
                ]);
            }else{
                return response([
                    'status' => 1,
                    'success' => 'Shift update successfully.',
                ]);
            }
        }catch(\Exception $e){
            DB::rollBack();
            return response([
                'status' => 0,
                'error' => 'Something went Wrong!',
            ]);
        }

        //  $notification=array(
        //     'message'=>"Save Success",
        //     'alert-type'=>'success'
        //  );

        // return redirect()->route('shiftManage.view')->with($notification);
    }

    public function delete(Request $request){
        try{
            DB::beginTransaction();
            $data=Shift::find($request->id);
            $data->delete();
            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Deleted Successfully'
            ]);
        }catch(\Exception $e){
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

           $data=Shift::find($request->id);
        }

        return response()->json(['shiftName' => $data->shiftName,'shiftID'=>$data->id,'startTime'=>$data->startTime,'endTime'=>$data->endTime]);
    }
}
