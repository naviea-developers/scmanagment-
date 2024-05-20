<?php

namespace App\Http\Controllers\Backend\School_management\ExamRoutine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamSchedule;
use App\Models\Examination;

class ExamRoutineController extends Controller
{

    public function index(){
        $data['examinations']=Examination::orderBy('id', 'desc')->get();
        return view('Backend.school_management.exam_routine.index',$data);
    }
    

     //ajax get Exam Schedule Routine
     public function getExamRoutine($id){
        $data['examSchedules']= ExamSchedule::where("examination_id",$id)->get();
        return view('Backend.school_management.exam_routine.view_exam_routine',$data);
	}  

    public function print(Request $request){
        //  dd('hi');
        // $class_routine =  ClassRoutine::find($id);
        // return view('Backend.school_management.class_routine.view_class_routine_print',compact('class_routine'));

        $id= $request->input('examination_id');
        $data['examSchedules']= ExamSchedule::where("examination_id",$id)->get();
        // $sectionId = $request->input('section_id');
        // $sessionId = $request->input('session_id');
        // $data['class_routine']=$class_routine = ExamSchedule::where('class_id',$classId)->where('section_id', $sectionId)->where('session_id', $sessionId)->get();

        // if( $classId && $sessionId &&  $sectionId){
        //     $data['class_routine']=$class_routine = ExamSchedule::where('class_id',$classId)->where('section_id', $sectionId)->where('session_id', $sessionId)->get();
        // }elseif($classId && $sessionId){
        //     $data['class_routine']=$class_routine = ExamSchedule::where('class_id',$classId)->where('session_id', $sessionId)->get();
        // }
        return view('Backend.school_management.exam_routine.view_exam_routine_print',$data);
    }
}
