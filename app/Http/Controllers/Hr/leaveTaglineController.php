<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hr\LeavePart;
use App\Models\Hr\LeaveType;
use App\Models\Hr\LeaveTagline;
use App\User;

use Session;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class leaveTaglineController extends Controller
{
   public function view(){
        $data['leaveTaglines']=LeaveTagline::orderBy('id','DESC')
                            ->get();

        $data['leaveTypes']=LeaveType::orderBy('id','DESC')->get();
        $data['leaveParts']=LeavePart::orderBy('id','DESC')->get();
        return view ('Hr.leaveTagline.manage',$data);
    }
    function ajaxleaveTagline(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'leave_types.leaveCode',
            3 => 'leave_parts.levaePartName',
            4 => 'leave_parts.day',
        );
        $totalData = LeaveTagline::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        //dd($request->input('order.0.column'));
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = LeaveTagline::leftjoin('leave_types','leave_types.id','leave_taglines.leaveTypeID')
                                ->leftjoin('leave_parts','leave_parts.id','leave_taglines.leavePartID');
        if(!empty($search)){
 
            $datalist =$datalist->where("leave_types.leaveCode","LIKE","%{$search}%")
            ->orwhere("leave_parts.levaePartName","LIKE","%{$search}%")
            ->orwhere("leave_parts.day","LIKE","%{$search}%");
           
        }
        $totalFiltered = $datalist->count();
        $datalist = $datalist->select('leave_taglines.id','leave_types.leaveCode','leave_types.description','leave_parts.levaePartName','leave_parts.day')->offset($start)->limit($limit)->orderBy($order,$dir)->get();
        
 
        $data = array();
        if(!empty($datalist))
        {
             $i = $start == 0 ? 1 : $start+1;
            foreach($datalist as $data_v)
            {
                $nestedData['id'] = $i++;
                $nestedData['name'] = $data_v->leaveCode;
                $nestedData['description'] = $data_v->description;
                $nestedData['part_name'] = $data_v->levaePartName;
              
                $nestedData['day'] = $data_v->day;
               
                $nestedData['options'] = '<a class="btn btn-primary" href="javascript:void(0)" id="leaveTaglineEdit" data-id="'.$data_v->id.'" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-edit"></i></a>';
             
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
            'leaveTypeID'=>'required',
            'leavePartID'=>'required'
        ],[
            'leaveTypeID.required'=> 'Leave Type is required',
            'leavePartID.required'=> 'Leave Part is required',
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
                // check this tagline already has.
                $hasCheck=LeaveTagline::where('leaveTypeID',$request->leaveTypeID)->where('leavePartID',$request->leavePartID)->first();
                if($hasCheck){
                    return response([
                        'status' => 0,
                        'error' => 'Tagline has already!',
                    ]);
                }

                $data=new LeaveTagline();
            }
            else{
                $hasCheck=LeaveTagline::where('id','!=',$request->id)->where('leaveTypeID',$request->leaveTypeID)->where('leavePartID',$request->leavePartID)->first();
                if($hasCheck){
                    return response([
                        'status' => 0,
                        'error' => 'Tagline has already!',
                    ]);
                }
                $data=LeaveTagline::find($request->id);
            }
            $data->leaveTypeID=$request->leaveTypeID;
            $data->leavePartID=$request->leavePartID;
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
            $data=LeaveTagline::find($id);

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

           $data=LeaveTagline::find($request->id);
           $leaveTypes=LeaveType::orderBy('id','DESC')->get();
           $leaveParts=LeavePart::orderBy('id','DESC')->get();

           // leave type
           $leaveTypeID='';
            foreach($leaveTypes as $leaveType){

                if($leaveType->id==$data->leaveTypeID){
                    $leaveTypeID.='<option value="'.$leaveType->id.'" selected>'.$leaveType->leaveCode.' - '.$leaveType->description.'</option>';
                }
                else{
                   $leaveTypeID.='<option value="'.$leaveType->id.'">'.$leaveType->leaveCode.' - '.$leaveType->description.'</option>';
                }

            }

           // leave part
           $leavePartID='';
            foreach($leaveParts as $leavePart){
                if($leavePart->id==$data->leavePartID){
                    $leavePartID.='<option value="'.$leavePart->id.'" selected>'.$leavePart->levaePartName.' - '.$leavePart->day.'</option>';
                }else{
                   $leavePartID.='<option value="'.$leavePart->id.'">'.$leavePart->levaePartName.' - '.$leavePart->day.'</option>';
                }

            }

        }

        return response()->json(['leavePartID' => $leavePartID,'leaveTaglinID'=>$data->id,'leaveTypeID'=>$leaveTypeID]);
    }
}
