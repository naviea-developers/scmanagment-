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
}
