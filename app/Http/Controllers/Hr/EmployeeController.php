<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use App\Models\Hr\Attendance;
use App\Models\Designation;
use App\Models\Hr\Shift;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Session;

use Redirect;

use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function applyLeave(){

        $employee = DB::table('employee_info')->get();
        // $category = DB::table('category')->get(['cat_id','categoryName']);

        return view('Hr.leave.apply_leave',compact('employee'));
    }
    public function storeLeaveApplication(Request $request){

        DB::table('leave')->insert([
            'empId' => $request->empId,
            'type'  => $request->type,
            'part'  => $request->part,
            'reason' => $request->reason,
            'address' => $request->address,
            'department'=>$request->department,
            'designation'=>$request->designation,
            // 'status' => $request->status,
            'from' => $request->from,
            'to' => $request->to,
            'day' => $request->day
        ]);

        return redirect('/manageLeaveApplications');
    }

    public function manageLeaveApplications(){
        $viewAll = DB::table('leave')->get();
        $employee = DB::table('employee_info')->get();
        return view('Hr.leave.manage',compact('viewAll','employee'));
    }

    public function manageAttendance(){
       // $viewAll =Hrleave::get();
        $employees = User::whereIn('type',[2,8])->get();
        $attendances = Attendance::orderBy('id','desc')->get();
        $designations = Designation::get();
        $shifts = Shift::get();
        return view('Hr.attendance.manage',compact('designations','employees','attendances','shifts'));
    }
    function ajaxManageAttendance(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'users.name',
            2 => 'attendances.dutyDate',
            3 => 'shift.shiftName',
            4 => 'attendances.inTime',
            5 => 'attendances.outTime',
            6 => 'attendances.workingMiniute',
            7 => 'attendances.lateMiniute',
            8 => 'attendances.overtimeMiniute',
            9 => 'attendances.status',
        );
        $totalData = Attendance::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        //dd($request->input('order.0.column'));
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = Attendance::leftJoin('users','attendances.empID','users.id')
                    ->leftJoin('shift','attendances.shiftID','shift.id');
        if(!empty($search)){
 
            $datalist =$datalist->where("users.name","LIKE","%{$search}%")
            ->orwhere("shift.shiftName","LIKE","%{$search}%")
            ->orwhere("attendances.dutyDate","LIKE","%{$search}%")
            ->orwhere("attendances.inTime","LIKE","%{$search}%");
           
        }
        if($request->emp_id){
            $datalist =$datalist->where('attendances.empID',$request->emp_id);
        }
        if($request->designation_id){
            $datalist =$datalist->where('users.designation_id',$request->designation_id);
        }
        $datalist = $datalist->whereBetween('dutyDate', [Carbon::parse($request->from_date)->startOfDay(), Carbon::parse($request->to_date)->endOfDay()]);
        $totalFiltered = $datalist->count();
        $datalist = $datalist->select('attendances.*','users.name as e_name','shift.shiftName as s_name')->offset($start)->limit($limit)->orderBy($order,$dir)->get();
        
 
        $data = array();
        if(!empty($datalist))
        {
             $i = $start == 0 ? 1 : $start+1;
            foreach($datalist as $data_v)
            {
                $nestedData['id'] = $i++;
                $nestedData['e_name'] = $data_v->e_name;
                $nestedData['date'] = $data_v->dutyDate;
                $nestedData['s_name'] = $data_v->s_name;
                $nestedData['in_time'] = date("d-m-Y g:i a",strtotime($data_v->inTime));
                $nestedData['out_time'] = $data_v->outTime !=null ? date("d-m-Y g:i a",strtotime($data_v->outTime)) : '--';
                $nestedData['w_time'] = intval($data_v->workingMiniute/60).' h : '.intval($data_v->workingMiniute%60).' min';
                $nestedData['l_time'] = intval($data_v->lateMiniute/60).' h : '.intval($data_v->lateMiniute%60).' min';
                $nestedData['o_time'] = intval($data_v->overtimeMiniute/60).' h : '.intval($data_v->overtimeMiniute%60).' min';
              
                $nestedData['status'] = $data_v->status;
               
                // $nestedData['options'] = '<a class="btn btn-primary" href="javascript:void(0)" id="bonuspayEdit" data-id="'.$data_v->id.'" data-bs-toggle="modal" data-bs-target="#updateModal"><i class="fa fa-edit"></i></a>';
             
                $nestedData['options'] = '<a title="Delete"  style="margin-left: 10px" class="del_hr_data btn btn-danger" data-id="'.$data_v->id.'"><i class="fa fa-trash"></i></a>';
 
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

    public function attendanceStoreIn(Request $request){
        $validator = Validator::make($request->all(),[
            'empID'=>'required',
            'shiftID'=>'required',
            'dutyDate'=>'required',
            'inTime'=>'required',
        ]);
        if($validator->fails()){
            return response([
                'status' => 0,
                'errors' => $validator->errors()
            ]);
        }
        try{
            DB::beginTransaction();
            $hascheck=Attendance::where('dutyDate', date("Y-m-d", strtotime($request->dutyDate)))->where('empID',$request->empID)->first();


            if(!$hascheck){
                $shift = Shift::find($request->shiftID);
                $shiftstrat_time = Carbon::parse($request->dutyDate.' '.$shift->startTime);
                $emp_in_time = Carbon::parse($request->dutyDate.' '.$request->inTime);
                $eheck_time_diff = $emp_in_time->diff($shiftstrat_time);
                $lateMiniute = 0;
                if($eheck_time_diff->invert > 0){
                    $hour=$emp_in_time->diff($shiftstrat_time)->format('%H');
                    $min=$emp_in_time->diff($shiftstrat_time)->format('%I');
                    $lateMiniute=($hour*60)+$min;
                }


                //
                //return response()->json(['data'=>$emp_in_time->diff($shiftstrat_time),'start'=>$request->inTime,'end'=>$emp_in_time]);
                $data=new Attendance();
                $data->empID=$request->empID;
                $data->shiftID=$request->shiftID;
                $data->dutyDate=$request->dutyDate;
                $data->inTime= Carbon::parse($request->dutyDate.' '.$request->inTime);
                $data->workingMiniute=0;
                $data->lateMiniute=$lateMiniute;
                $data->overtimeMiniute=0;
                if($lateMiniute > 0){
                    $data->status="Late";
                }else{
                    $data->status="Ok";
                }

                $data->save();
            }
            DB::commit();
            return response([
                'status' => 1,
                'success' => 'Save successfully.',
            ]);
        }catch(\Exception $e){
            DB::rollBack();
            return response([
                'status' => 0,
                'data'=>$e->getMessage(),
                'error' => 'Something went Wrong!',
            ]);
        }
    }
    public function attendanceStoreOut(Request $request){
         $validator = Validator::make($request->all(),[
            'empID'=>'required',
            'outTime'=>'required',
            'dutyDate'=>'required',
        ]);
        if($validator->fails()){
            return response([
                'status' => 0,
                'errors' => $validator->errors()
            ]);
        }

        try{
            DB::beginTransaction();
         $hascheck=Attendance::where('dutyDate', date("Y-m-d", strtotime($request->dutyDate)))->where('empID',$request->empID)->first();



            if($hascheck){

                // start find working minutes, late, overTime etc
                $startTime = Carbon::parse($hascheck->inTime);
                $endTime = Carbon::parse($request->dutyDate.' '.$request->outTime);
                // $totalDuration =  $startTime->diff($endTime)->format('%H:%I:%S')." Minutes";
              // return response()->json(['data'=>$startTime->diff($endTime)]);
                $hour=$startTime->diff($endTime)->format('%H');
                $min=$startTime->diff($endTime)->format('%I');

                $totalWorkingMinnute=($hour*60)+$min;

                $shift = $hascheck->shift;
                $shift_startTime = Carbon::parse($request->dutyDate.' '.$shift->startTime);
                $shift_endTime = Carbon::parse($request->dutyDate.' '.$shift->endTime);
                //return response()->json(['data'=>$endTime->diff($shift_endTime)]);
                $eheck_over_time_diff = $endTime->diff($shift_endTime);
                $overtimeMiniute = 0;
                if($eheck_over_time_diff->invert > 0){
                    $hour=$endTime->diff($shift_endTime)->format('%H');
                    $min=$endTime->diff($shift_endTime)->format('%I');
                    $overtimeMiniute=($hour*60)+$min;
                }

                $shift_hour=$shift_startTime->diff($shift_endTime)->format('%H');
                $shift_min=$shift_startTime->diff($shift_endTime)->format('%I');
                $totalShitWorkingMinute = ($shift_hour*60)+$shift_min;
                // find has half leave
                // $hasLeaveCheck=LeaveApplication::where('fromDate',$request->dutyDate)->where('empID',$request->empID)->where('leaveDay','.5')->where('status',1)->first();

                // if($hasLeaveCheck){
                //     $hasToWorkMinutes=4*60;
                // }else{
                //     $hasToWorkMinutes=8*60;
                // }
                // $checkWorkMiniutes=$totalWorkingMinnute-$hasToWorkMinutes;


                //find working minutes, late, overTime etc
                $data=  Attendance::find($hascheck->id);
                $data->empID=$request->empID;
                $data->dutyDate=$request->dutyDate;
                $data->outTime= Carbon::parse($request->dutyDate.' '.$request->outTime);
                $data->workingMiniute=$totalWorkingMinnute;

                if($data->lateMiniute > 0 && $overtimeMiniute > 0){
                    $overtimeMiniute = $overtimeMiniute-$data->lateMiniute;
                    if($overtimeMiniute < 0){
                        $overtimeMiniute = 0;
                    }
                }
                $data->overtimeMiniute=$overtimeMiniute;
                // if($totalShitWorkingMinute > $totalWorkingMinnute){
                //     $data->status="Partial";
                // }else{
                //     if($data->lateMiniute > 0){
                //         $data->status="Late";
                //     }

                // }



                $data->save();


            }

            DB::commit();
            return response([
                'status' => 1,
                'success' => 'Save successfully.',
            ]);
        }catch(\Exception $e){
            DB::rollBack();
            return response([
                'status' => 0,
                'data'=>$e->getMessage(),
                'error' => 'Something went Wrong!',
            ]);
        }
    }


    public function deleteAttendance($id){
      Attendance::where('id',$id)->delete();
        return redirect('/manageAttendance');

    }
   
    public function getDesigName(Request $request)
    {
        $desigName =Designation::where("department_id",$request->deptID)->select('name', 'id')->get();
        return response()->json($desigName);
    }

    public function getEmployeeId(Request $request)
    {
        $empId = Employee::where("designation_id",$request->desigID)->select('employee_id', 'id')->get();
        return response()->json($empId);
    }

//     public function manageShift(){
//         // $employee = DB::table('employee_info')->get();
//         $shift = DB::table('shift')->get();
//         return view('Hr.shiftManage.manage',compact('shift'));
//     }

//     public function shiftManageStore(Request $request){
//         DB::table('shift')->insert([
//             'shiftName' =>$request->shiftName,
//             'startTime'=>$request->startTime,
//             'endTime'=>$request->endTime,
//         ]);

//         return redirect('/manageShift');
//     }

//      public function DeleteShift($id){
//         DB::table('shift')->where('id',$id)->delete();
//         return redirect('/manageShift');

//     }

//     public function editShift(Request $request, $id)
// {
//     $shift = DB::table('shift')->where('id', $id)->first();
//     return response()->json($shift);

// }

//     public function updateShift(Request $request, $id){
//     $id = $request->input('id');
//     $shiftName = $request->input('shiftName');
//     $startTime = $request->input('startTime');
//     $endTime = $request->input('endTime');

//     DB::table('shift')
//         ->where('id', $id)
//         ->update(['shiftName' => $shiftName, 'startTime' => $startTime, 'endTime' => $endTime]);

//         return redirect ('/manageShift')
//             ->with('msg', 'Employee Info updated Successfully');
// }


    public function viewAbsentRollSetup()
    {
        $absent = DB::table('absent')->get();

        return view('Hr.absentRollSetup.viewAbsentRollSetup',compact('absent'));
    }


    public function storeAbsentRollData(Request $request)
    {
        DB::table('absent')->insert([
            'firstAbsentAmount' =>$request->firstAbsentAmount,
            'otherAbsentAmount' =>$request->otherAbsentAmount,
        ]);

        return redirect('/viewAbsentRollSetup');
    }



    public function editAbsentRoll(Request $request, $id)
    {
    $absent = DB::table('absent')->where('id', $id)->first();
    return response()->json($absent);
    }

    public function updateAbsentRoll(Request $request, $id){
    $id = $request->input('id');
    $firstAbsentAmount = $request->input('firstAbsentAmount');
    $otherAbsentAmount = $request->input('otherAbsentAmount');

    DB::table('absent')
        ->where('id', $id)
        ->update(['firstAbsentAmount' => $firstAbsentAmount, 'otherAbsentAmount' => $otherAbsentAmount]);

        return redirect ('/viewAbsentRollSetup')
            ->with('msg', 'Absent Roll updated Successfully');
}

    public function manageAttendanceSorting(Request $req){
        $viewAll = DB::table('leave')->get();
        $employee = DB::table('employee_info')->get();
        $in = DB::table('attendanceIn')->whereBetween('dutyDate', [$req->min , $req->max])->get();
        $out = DB::table('attendanceOut')->get();

        return view('Hr.attendance.loadManageAttendance',compact('viewAll','employee','in','out'));
    }


}
