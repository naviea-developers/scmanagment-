<?php

namespace App\Http\Controllers\Backend\School_management\ExamRoutine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamSchedule;
use App\Models\Examination;
use App\Models\Tp_option;

class ExamRoutineController extends Controller
{

    public function index(){
        $data['examinations']=Examination::where('status','1')->orderBy('id', 'desc')->get();
        return view('Backend.school_management.exam_routine.index',$data);
    }
    

     //ajax get Exam Schedule Routine
     public function getExamRoutine($id){
        $data['tpOption'] =Tp_option::where('option_name', 'theme_option_header')->first();
        $data['examSchedules']= ExamSchedule::where('status','1')->where("examination_id",$id)->get();
        return view('Backend.school_management.exam_routine.view_exam_routine',$data);
	}  

    public function print(Request $request){
        $id= $request->input('examination_id');
        $data['tpOption'] =Tp_option::where('option_name', 'theme_option_header')->first();
        $data['examSchedules']= ExamSchedule::where('status','1')->where("examination_id",$id)->get();
        return view('Backend.school_management.exam_routine.view_exam_routine_print',$data);
    }
}
