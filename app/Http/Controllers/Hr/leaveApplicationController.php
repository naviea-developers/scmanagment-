<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hr\LeavePart;
use App\Models\Hr\LeaveType;
use App\Models\HrPayroll\LeaveTagline;
use App\Models\Designation;
use App\Models\Hr\Employee;
use App\Models\Hr\LeaveApplication;
use App\Models\User;
use Carbon\Carbon;

use Session;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class leaveApplicationController extends Controller
{
    public function view(){
        $data['leaveApplications']=LeaveApplication::orderBy('id','DESC')->get();
        //$data['empInfo']=Employee::where('id',Auth::user()->empID)->first();
        $data['leaveTypes']=LeaveType::orderBy('id','DESC')->get();
        $data['designations']=Designation::orderBy('id','DESC')->get();
        return view ('Hr.leave.leaveApplication',$data);
    }
    function ajaxLeaveApplication(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'users.name',
            2 => 'leave_types.leaveCode',
            3 => 'leave_parts.levaePartName',
            4 => 'leave_applications.fromDate',
            5 => 'leave_applications.toDate',
            6 => 'leave_applications.leaveDay',
            7 => 'leave_applications.status',
        );
        $totalData = LeaveApplication::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = LeaveApplication::leftjoin('users','users.id','leave_applications.empID')
                    ->leftjoin('leave_types','leave_types.id','leave_applications.leaveTypeID')
                    ->leftjoin('leave_parts','leave_parts.id','leave_applications.leavePartID');
        if(!empty($search)){
            $datalist =$datalist->where("users.name","LIKE","%{$search}%")
            ->orwhere("leave_types.leaveCode","LIKE","%{$search}%")
            ->orwhere("leave_parts.levaePartName","LIKE","%{$search}%")  
            ->orwhere("leave_applications.fromDate","LIKE","%{$search}%")  
            ->orwhere("leave_applications.toDate","LIKE","%{$search}%")  
            ->orwhere("leave_applications.toDate","LIKE","%{$search}%")  
            ->orwhere("leave_applications.leaveDay","LIKE","%{$search}%");  
        }
        $totalFiltered = $datalist->count();
        $datalist = $datalist->select('leave_applications.*','users.name as e_name','leave_types.leaveCode as type_name','leave_parts.levaePartName as part_name')->offset($start)->limit($limit)->orderBy($order,$dir)->get();
        
 
        $data = array();
        if(!empty($datalist))
        {
             $i = $start == 0 ? 1 : $start+1;
            foreach($datalist as $data_v)
            {
                $nestedData['id'] = $i++;
                $nestedData['e_name'] = $data_v->e_name;
                $nestedData['part_name'] = $data_v->part_name;
                $nestedData['type_name'] = $data_v->type_name;
                $nestedData['from_date'] = date('F j, Y',strtotime($data_v->fromDate));
                $nestedData['to_date'] = date('F j, Y',strtotime($data_v->toDate));
                $nestedData['day'] = $data_v->leaveDay;
                $status = '';
                if($data_v->status==0){
                    $status = '<span style="font-weight: bold;">Pending</span>';
                }else if($data_v->status==1){
                    $status = '<span style="font-weight: bold;">Approved</span>';
                
                }else{
                    $status = '<span style="color:red;font-weight: bold;">Reject</span>';
                }
                $nestedData['status'] = $status;   
                
                $nestedData['options'] = '<a class="btn btn-primary leaveApplicationEdit" href="javascript:void(0)" id="leaveApplicationEdit" data-id="'.$data_v->id.'" data-bs-toggle="modal" data-bs-target="#updateModal"><i class="fa fa-edit"></i></a>';
             
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
    

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'empDeptID'=>'required',
            'empDesigID'=>'required',
            'empID'=>'required',
            'leaveTypeID'=>'required',
            'leavePartID'=>'required',
            'fromDate'=>'required',
            'toDate'=>'required',
            'purpose'=>'required',
            'address'=>'required',
            'dcEmpDeptID'=>'required',
            'dcEmpDesigID'=>'required',
            'dcEmpID'=>'required',
        ],[
            'empDeptID.required'=> 'Department is required',
            'empDesigID.required'=> 'Designation is required',
            'empID.required'=> 'Employee is required',
            'leaveTypeID.required'=> 'Department is required',
            'leavePartID.required'=> 'Designation is required',
            'fromDate.required'=> 'Employee is required',
            'toDate.required'=> 'Department is required',
            'purpose.required'=> 'Designation is required',
            'address.required'=> 'Employee is required',
            'dcEmpDeptID.required'=> 'Department is required',
            'dcEmpDesigID.required'=> 'Designation is required',
            'dcEmpID.required'=> 'Employee is required',
        ]);
        if ($validator->fails()) {
            return response([
                'status' => 0,
                'errors' => $validator->errors()
            ]);
        }

        try{
            DB::beginTransaction();

            date_default_timezone_set('Asia/Dhaka');

            $levelPart=LeavePart::where('id',$request->leavePartID)->first();
            // calculate day of leave
            $to =Carbon::createFromFormat('Y-m-d', $request->toDate);
            $from =Carbon::createFromFormat('Y-m-d', $request->fromDate);
            $dateDiff = $to->diffInDays($from);
            $dateDiff+=1;
            $leaveDay=$dateDiff*$levelPart->day;

            $data=new LeaveApplication();
            $data->empDeptID=Department::where('id',$request->empDeptID)->first()->name;
            $data->empDesigID=Designation::where('id',$request->empDesigID)->first()->name;
            $data->empID=$request->empID;
            $data->leaveTypeID=LeaveType::where('id',$request->leaveTypeID)->first()->description;
            $data->leavePartID=$levelPart->levaePartName;
            $data->fromDate=$request->fromDate;
            $data->toDate=$request->toDate;
            $data->purpose=$request->purpose;
            $data->address=$request->address;
            $data->leaveDay=$leaveDay;
            $data->dcEmpDeptID=Department::where('id',$request->dcEmpDeptID)->first()->name;
            $data->dcEmpDesigID=Designation::where('id',$request->dcEmpDesigID)->first()->name;
            $data->dcEmpID=$request->dcEmpID;
            $data->status=0;
            $data->save();
            DB::commit();

            return response([
                        'status' => 1,
                        'success' => 'Save successfully.',
                    ]);

            //return redirect()->route('leaveApplication.view')->with($notification);
        }catch(\Exception $e){
           // dd($e->getMessage());
            DB::rollBack();
            return response([
                        'status' => 0,
                        'data'=>$e->getMessage(),
                        'error' => 'Something went Wrong!',
                    ]);
        }

    }

    public function search(Request $request){
        date_default_timezone_set('Asia/Dhaka');

        $Fromdate=date("Y-m-d", strtotime($request->fDate));
        $Todate=date("Y-m-d", strtotime($request->tDate."+1 day"));

        if($request->leaveType==0){
            $data['leaveApplications']=LeaveApplication::where('fromDate','>=',$Fromdate)->where('toDate','<=',$Todate)->orderBy('id','DESC')->get();
        }
        else{
            $data['leaveApplications']=LeaveApplication::where('fromDate','>=',$Fromdate)->where('toDate','<=',$Todate)->where('leaveTypeID',$request->leaveType)->orderBy('id','DESC')->get();
        }

        // $data['empInfo']=Employee::where('empID',Auth::user()->empID)->first();
        $data['leaveTypes']=LeaveType::orderBy('id','DESC')->get();
        $data['departments']=Department::orderBy('id','DESC')->get();



        return view ('Hr.leave.leaveApplication',$data,['Fromdate'=>$Fromdate,'Todate'=>$Todate]);

    }
    public function update(Request $request){
        //dd($request->all());
        $data=LeaveApplication::find($request->leaveApplicationID);
        if($data){
            $data->status=$request->status;
            $data->save();
        }

        $notification=array(
            'message'=>"Save Success",
            'alert-type'=>'success'
         );

        return redirect()->back()->with($notification);
    }
    public function leavePartID_callByLeaveTYpe(Request $request){

        if (!$request->id) {
           $html ='Sorry';
        } else {

           $leaveParts=DB::table('leave_taglines')
                         ->join('leave_parts','leave_taglines.leavePartID','leave_parts.id')
                         ->where('leave_taglines.leaveTypeID',$request->id)
                         ->select('leave_parts.*')
                         ->get();


           $html='<option>-- Select One --</option>';

            foreach($leaveParts as $leavePart){

                    $html.='<option value="'.$leavePart->id.'">'.$leavePart->levaePartName.'</option>';

            }
        }

        return response()->json(['html' => $html]);
    }
    public function singleView(Request $request){

        if (!$request->id) {
           $html ='Sorry';
        }
        else {

            $leaveApplication=LeaveApplication::where('id',$request->id)->first();

            $viewApplicationData='Name: '.User::where('id',$leaveApplication->empID)->first()->name.'<br/><br/>ID: '.$leaveApplication->empID.'<br/>Designation: '.$leaveApplication->empDesigID.'<br/><br/> Leave Type: '.$leaveApplication->leaveTypeID.'<br/><br/> Leave Part: '.$leaveApplication->leavePartID.'<br/><br/> Day: '.$leaveApplication->leaveDay.'<br/><br/> leave Spend :'.LeaveApplication::where('empID',$leaveApplication->empID)->where('status',1)->where('leaveTypeID',$leaveApplication->leaveTypeID)->sum('leaveDay').'<br/><br/> Start Date :'.date('F j, Y',strtotime($leaveApplication->fromDate)).'<br/><br/> End Date: '.date('F j, Y',strtotime($leaveApplication->toDate)).'<br/><br/> Purpose: '.$leaveApplication->purpose.'<br/><br/><br/>';
        }

        return response()->json(['viewApplicationData' => $viewApplicationData,'leaveApplicationID'=>$request->id]);
    }

}
