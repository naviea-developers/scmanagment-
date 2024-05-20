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
use App\Models\SchoolSection;

class ExamSchedulesController extends Controller
{
    //--------------Exam------------//

    public function index(){
        $data['allData']=$allData=ExamSchedule::orderBy('id', 'desc')->get();
        $data['examinations']=Examination::orderBy('id', 'desc')->get();
        return view('Backend.school_management.exam_schedule.index',$data);
    }

    public function create(){
        // dd('hi');
        $data['className']=Classe::orderBy('id', 'asc')->get(); 
        $data['subjectName']=Subject::orderBy('id', 'desc')->get();
        $data['examinations']=Examination::orderBy('id', 'desc')->get();
        $data['buldings'] = Bulding::orderBy('id', 'desc')->get();
        $data['rooms'] = Room::orderBy('id', 'desc')->get();
        $data['floors'] = Floor::orderBy('id', 'desc')->get();
        $data['sessions']=Session::orderBy('id', 'desc')->get(); 
        $data['examTypes'] = ExamType::orderBy('id','desc')->get();
        $data['groups'] = Group::orderBy('id','desc')->get();
        $data['examClasss']=ExamClass::orderBy('id', 'desc')->get();
        $data['sections']=SchoolSection::orderBy('id', 'desc')->get();

        return view('Backend.school_management.exam_schedule.create',$data);
    }

 

    public function store(Request $request)
    {
      // dd($request->all());
        $request->validate([
            'class_id' => 'required',
            'examination_id' => 'required',

        ]);
        try{
            DB::beginTransaction();
            $exam_schedule = new ExamSchedule();
            $exam_schedule->examination_id = $request->examination_id ?? 0;
            $exam_schedule->exam_class_id = $request->exam_class_id ?? 0;
            $exam_schedule->class_id = $request->class_id ?? 0;
            $exam_schedule->section_id = $request->section_id ?? 0;
            $exam_schedule->bulding_id = $request->bulding_id ?? 0;
            $exam_schedule->floor_id = $request->floor_id ?? 0;
            $exam_schedule->room_id = $request->room_id ?? 0;
            $exam_schedule->save();
            DB::commit();
            return redirect()->route('admin.examschedule.index')->with('message','Exam Schedule Add Successfully');
        }catch(\Exception $e){
            DB::rollBack();
            dd($e);
            return back()->with ('error_message', $e->getMessage());
        }
    }

    public function edit($id){
        // dd('hi');
       $data['editData']=$editData =  ExamSchedule::find($id);
       $data['className']=Classe::orderBy('id', 'asc')->get(); 
       $data['examClasss']=ExamClass::where("class_id",$editData->class_id)->where('examination_id',$editData->examination_id)->orderBy('id', 'desc')->get();
       $data['sections']=SchoolSection::where('class_id',$editData->class_id)->orderBy('id', 'asc')->get();
       $data['subjectName']=Subject::orderBy('id', 'desc')->get();
       $data['examinations']=Examination::orderBy('id', 'desc')->get();
       $data['buldings'] = Bulding::orderBy('id', 'desc')->get();
       $data['rooms'] = Room::orderBy('id', 'desc')->get();
       $data['floors'] = Floor::orderBy('id', 'desc')->get();
       $data['sessions']=Session::orderBy('id', 'desc')->get(); 
       $data['examTypes'] = ExamType::orderBy('id','desc')->get();
       $data['groups'] = Group::orderBy('id','desc')->get();
        return view('Backend.school_management.exam_schedule.update',$data);
    }

    public function update(Request $request,$id)
    {
    // dd($request->all());
        $request->validate([
            'class_id' => 'required',
            'examination_id' => 'required',

        ]);
        try{
            DB::beginTransaction();
            $exam_schedule = ExamSchedule::find($id);
            $exam_schedule->examination_id = $request->examination_id ?? 0;
            $exam_schedule->exam_class_id = $request->exam_class_id ?? 0;
            $exam_schedule->class_id = $request->class_id ?? 0;
            $exam_schedule->section_id = $request->section_id ?? 0;
            $exam_schedule->bulding_id = $request->bulding_id ?? 0;
            $exam_schedule->floor_id = $request->floor_id ?? 0;
            $exam_schedule->room_id = $request->room_id ?? 0;
            $exam_schedule->save();

            DB::commit();
            return redirect()->route('admin.examschedule.index')->with('message','exam schedule Update Successfully');
        }catch(\Exception $e){
            DB::rollBack();
            dd($e);
            return back()->with ('error_message', $e->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        //  dd('hi');
        $exam_schedule =  ExamSchedule::find($request->exam_schedule_id);
        // dd($examschedule);
        $exam_schedule->delete();
        return back()->with('message','Exam Schedule Deleted Successfully');
    }

    public function status($id)
    {
        $exam_schedule = ExamSchedule::find($id);
        if($exam_schedule->status == 0)
        {
            $exam_schedule->status = 1;
        }elseif($exam_schedule->status == 1)
        {
            $exam_schedule->status = 0;
        }
        $exam_schedule->update();
        return redirect()->route('admin.examschedule.index')->with('message','Exam Schedule Status Update Successfully');
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
    
        // Grouping the classes by class name
        $groupedClasses = $classes->groupBy(function ($item) {
            return $item->class->name;
        });
        
        // Selecting the first class for each group
        $uniqueClasses = $groupedClasses->map(function ($group) {
            return $group->first();
        });
    
        return $uniqueClasses->values();
        
	  } 

  
}
