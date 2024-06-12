<?php

namespace App\Http\Controllers\Backend\School_management\ExamSchedules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ExamSchedule;
use App\Models\Classe;
use App\Models\Subject;
use App\Models\Examination;
use App\Models\ExamScheduleItem;
use App\Models\Bulding;
use App\Models\Room;
use App\Models\Floor;
use App\Models\Session;
use App\Models\ExamType;
use App\Models\Group;
use App\Models\ExamClass;
use App\Models\Lession;
use App\Models\SchoolSection;
use Illuminate\Support\Facades\Validator;

class ExamSchedulesController extends Controller
{
    //--------------Exam------------//

    public function index(){
        $data['allData']=$allData=ExamSchedule::orderBy('id', 'desc')->get();
        // $data['examinations']=Examination::orderBy('id', 'desc')->get();

        $data['className']=Classe::where('status', 1)->orderBy('id', 'asc')->get(); 
        $data['subjectName']=Subject::where('status', 1)->orderBy('id', 'desc')->get();
        $data['examinations']=Examination::where('status', 1)->orderBy('id', 'desc')->get();
        $data['buldings'] = Bulding::where('status', 1)->orderBy('id', 'desc')->get();
        $data['rooms'] = Room::where('status', 1)->orderBy('id', 'desc')->get();
        $data['floors'] = Floor::where('status', 1)->orderBy('id', 'desc')->get();
        $data['sessions']=Session::where('status', 1)->orderBy('id', 'desc')->get(); 
        $data['examTypes'] = ExamType::where('status', 1)->orderBy('id','desc')->get();
        $data['groups'] = Group::where('status', 1)->orderBy('id','desc')->get();
        $data['examClasss']=ExamClass::where('status', 1)->orderBy('id', 'desc')->get();
        $data['sections']=SchoolSection::where('status', 1)->orderBy('id', 'desc')->get();
        return view('Backend.school_management.exam_schedule.manage',$data);
    }

    function ajaxData(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'examination_id',
            2 => 'class_id',
            3 => 'subject_id',
            4 => 'bulding_id',
            5 => 'floor_id',
            6 => 'room_id',
            7 => 'status',
        );
        $totalData = ExamSchedule::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        //dd($request->input('order.0.column'));
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = ExamSchedule::query();
        if(!empty($search)){
 
            $datalist =$datalist->where("class_id","LIKE","%{$search}%");
           
        }
        
        $totalFiltered = $datalist->count();
         $datalist = $datalist->offset($start)->limit($limit)->orderBy($order,$dir)->get();
        
 
        $data = array();
        if(!empty($datalist))
        {
             $i = $start == 0 ? 1 : $start+1;
            foreach($datalist as $data_v)
            {
                $nestedData['id'] = $data_v->id;
                $nestedData['examination_id'] = $data_v->examination->name;
                $nestedData['class_id'] = $data_v->class->name;
                $nestedData['subject_id'] = $data_v->examClass->subject->name;
                // $nestedData['section_id'] = $data_v->schoolsection->name;
                $nestedData['bulding_id'] = $data_v->bulding->name;
                $nestedData['floor_id'] = $data_v->floor->name;
                $nestedData['room_id'] = $data_v->room->name;
               
 
                $nestedData['status'] = '';
                if ($data_v->status == 0) {
                    $nestedData['status'] .= '<a href="'.route('admin.examschedule.status', $data_v->id).'" class="data_status btn btn-sm btn-warning">Inactive</a>';
                } elseif ($data_v->status == 1) {
                    $nestedData['status'] .= '<a href="'.route('admin.examschedule.status', $data_v->id).'" class="data_status btn btn-sm btn-success">Active</a>';
                }
 
                $nestedData['options'] = '<a class="btn btn-primary data_edit" href="'.route('admin.examschedule.edit', $data_v->id).'"><i class="fa fa-edit"></i></a>';
             
                $nestedData['options'] .= '<button class="btn text-danger bg-white"  value="'.$data_v->id.'" id="dataDeleteModal"><i class="icon ion-trash-a tx-28"></i></button>';
 
                $data[] = $nestedData;
 
            }
        }
        $json_data = [
            'draw' => intval($request->input('draw')),
            'recordsTotal' => intval($totalData),
            'recordsFiltered' => intval($totalFiltered),
            'data' => $data
        ];
    
        return response()->json($json_data);
    }

    public function create(){
        // dd('hi');
        $data['className']=Classe::where('status', 1)->orderBy('id', 'asc')->get(); 
        $data['subjectName']=Subject::where('status', 1)->orderBy('id', 'desc')->get();
        $data['examinations']=Examination::where('status', 1)->orderBy('id', 'desc')->get();
        $data['buldings'] = Bulding::where('status', 1)->orderBy('id', 'desc')->get();
        $data['rooms'] = Room::where('status', 1)->orderBy('id', 'desc')->get();
        $data['floors'] = Floor::where('status', 1)->orderBy('id', 'desc')->get();
        $data['sessions']=Session::where('status', 1)->orderBy('id', 'desc')->get(); 
        $data['examTypes'] = ExamType::where('status', 1)->orderBy('id','desc')->get();
        $data['groups'] = Group::where('status', 1)->orderBy('id','desc')->get();
        $data['examClasss']=ExamClass::where('status', 1)->orderBy('id', 'desc')->get();
        $data['sections']=SchoolSection::where('status', 1)->orderBy('id', 'desc')->get();

        return view('Backend.school_management.exam_schedule.create',$data);
    }



    public function store(Request $request)
    {
      // dd($request->all());
        
        $validator = Validator::make($request->all(), [
            'class_id' => 'required',
            'examination_id' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=>'error',
                'errors'=>$validator->errors()->all()
            ]);
        }
        try{
            DB::beginTransaction();
            $exam_schedule = new ExamSchedule();
            $exam_schedule->examination_id = $request->examination_id ?? 0;
            $exam_schedule->exam_class_id = $request->exam_class_id ?? 0;
            $exam_schedule->class_id = $request->class_id ?? 0;
            // $exam_schedule->section_id = $request->section_id ?? 0;
            $exam_schedule->bulding_id = $request->bulding_id ?? 0;
            $exam_schedule->floor_id = $request->floor_id ?? 0;
            $exam_schedule->room_id = $request->room_id ?? 0;
            $exam_schedule->save();

            DB::commit();
           
            return response()->json([
                'status'=>'yes',
                'msg'=>'Exam Schedule Add Successfully'
            ]);
        }catch(\Exception $e){
            DB::rollBack();
           // dd($e);
           
            return response()->json([
                'status'=>'no',
                'msg'=>$e->getMessage()
            ]);
        }
    }

    public function edit($id){
        // dd('hi');
       $data['editData']=$editData =  ExamSchedule::find($id);
       $data['className']=Classe::where('id',$editData->class_id)->where('status', 1)->orderBy('id', 'asc')->get(); 
       $data['examClasss']=ExamClass::where("class_id",$editData->class_id)->where('examination_id',$editData->examination_id)->where('status', 1)->orderBy('id', 'desc')->get();
       $data['subjectName']=Subject::where('status', 1)->orderBy('id', 'desc')->get();
    //    $data['examinations']=Examination::where("id",$editData->examination_id)->where('status', 1)->orderBy('id', 'desc')->get();
       $data['examinations']=Examination::where('status', 1)->orderBy('id', 'desc')->get();
       $data['buldings'] = Bulding::where('status', 1)->orderBy('id', 'desc')->get();
       $data['rooms'] = Room::where('status', 1)->orderBy('id', 'desc')->get();
       $data['floors'] = Floor::where('status', 1)->orderBy('id', 'desc')->get();

       $data['sections']=SchoolSection::where('status', 1)->where('class_id',$editData->class_id)->orderBy('id', 'asc')->get();
       $data['sessions']=Session::where('status', 1)->orderBy('id', 'desc')->get(); 
       $data['examTypes'] = ExamType::where('status', 1)->orderBy('id','desc')->get();
       $data['groups'] = Group::where('status', 1)->orderBy('id','desc')->get();
        return view('Backend.school_management.exam_schedule.update',$data);
    }


    public function update(Request $request, string $id)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'class_id' => 'required',
            'examination_id' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=>'error',
                'errors'=>$validator->errors()->all()
            ]);
        }
        try{
            DB::beginTransaction();
            $exam_schedule = ExamSchedule::find($id);
            $exam_schedule->examination_id = $request->examination_id ?? 0;
            $exam_schedule->exam_class_id = $request->exam_class_id ?? 0;
            $exam_schedule->class_id = $request->class_id ?? 0;
            // $exam_schedule->section_id = $request->section_id ?? 0;
            $exam_schedule->bulding_id = $request->bulding_id ?? 0;
            $exam_schedule->floor_id = $request->floor_id ?? 0;
            $exam_schedule->room_id = $request->room_id ?? 0;
            $exam_schedule->save();

            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Exam Schedule Update Successfully'
            ]);
            
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json([
                'status'=>'no',
                'msg'=>$e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //dd($request);
        try{
            $exam_schedule =  ExamSchedule::find($request->exam_schedule_id);
            $exam_schedule->delete();
            
            return response()->json([
                'status'=>'yes',
                'msg'=>'Exam Schedule Deleted Successfully'
            ]);
        }catch(\Exception $e){
            //DB::rollBack();
            return response()->json([
                'status'=>'no',
                'msg'=>$e->getMessage()
            ]);
        }
    }

    public function status($id)
    {
        $exam_schedule = ExamSchedule::find($id);
        if ($exam_schedule) {
            if ($exam_schedule->status == 0) {
                $exam_schedule->status = 1;
            } elseif ($exam_schedule->status == 1) {
                $exam_schedule->status = 0;
            }
            $exam_schedule->update();

            $statusMessage = $exam_schedule->status == 1 ? 'Activated Successfully' : 'Deactivated Successfully';

            return response()->json([
                'status'=>'yes',
                'msg'=>$statusMessage
            ]);
        }

       
        return response()->json([
            'status'=>'no',
            'msg'=>'Exam Schedule not found'
        ]);
    }

    //ajax get Floor
    public function getFloor($id){
        $bulding = Floor::where("bulding_id",$id)->get();
        return $bulding;
	}

    //ajax get Room
    public function getRoom($id){
        $room = Room::where("floor_id",$id)->get();
        return $room;
	  }

    //ajax get subject
    public function getSubject($id){
        $subject = Subject::where("class_id",$id)->get();
        return $subject;
    }
    //ajax get Lession
    public function getLession($id){
        $lession = Lession::where("subject_id",$id)->get();
        return $lession;
	}  


    //ajax get exam Class Subject
    public function examClassSubject($examinationId,$classExamId){
        // $subject = ExamClass::where("class_id",$id)->with('subject')->get();
        $subject = ExamClass::where("class_id",$classExamId)->where('examination_id',$examinationId)->with('subject')->get();
        return $subject;
	  }

    //ajax get ExaminatioClass
    public function getExaminationClass($id){
        // $class = ExamClass::where("examination_id",$id)->with('class')->get();
        // return $class;
        $classes = ExamClass::where("examination_id", $id)->with('class')->get();
    
        $groupedClasses = $classes->groupBy(function ($item) {
            return $item->class->name;
        });
        
        $uniqueClasses = $groupedClasses->map(function ($group) {
            return $group->first();
        });
    
        return $uniqueClasses->values();
        
	  } 

  
}
