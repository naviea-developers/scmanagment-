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

class ExamSchedulesController extends Controller
{
    //--------------Exam------------//

    public function allExam(){
        $allData=ExamSchedule::orderBy('id', 'desc')->get();
        return view('Backend.school_management.examschedule.manageExam',compact('allData'));
    }

    // public function examDetails(){

    //     return view('Backend.school_management.examschedule.viewExam');
    // }

    public function addExam(){
        $data['className']=Classe::orderBy('id', 'desc')->get(); 
        $data['subjectName']=Subject::orderBy('id', 'desc')->get();
        $data['examinations']=Examination::orderBy('id', 'desc')->get();
        $data['buldings'] = Bulding::orderBy('id', 'desc')->get();
        $data['rooms'] = Room::orderBy('id', 'desc')->get();
        $data['floors'] = Floor::orderBy('id', 'desc')->get();

        return view('Backend.school_management.examschedule.addExam',$data);
    }

 

    public function storeExam(Request $request)
    {
      // dd($request->all());
        $request->validate([
            'class_id' => 'required',
            'examination_id' => 'required',

        ]);
        try{
            DB::beginTransaction();
            $examschedule = new ExamSchedule();
            $examschedule->class_id = $request->class_id;
            $examschedule->examination_id = $request->examination_id;
            $examschedule->save();

            if($request->subject_id){
                foreach( $request->subject_id as $k=>$value){
                    $exam_schedule_item = new ExamScheduleItem();
                    $exam_schedule_item->examschedule_id = $examschedule->id;
                    $exam_schedule_item->subject_id = $value;
                    $exam_schedule_item->date = $request->date[$k];
                    $exam_schedule_item->room_id = $request->room_id[$k];
                    $exam_schedule_item->bulding_id = $request->bulding_id[$k];
                    $exam_schedule_item->floor_id = $request->floor_id[$k];
                    $exam_schedule_item->pass_marke = $request->pass_marke[$k];
                    $exam_schedule_item->fail_marke = $request->fail_marke[$k];
                    $exam_schedule_item->start_time = $request->start_time[$k];
                    $exam_schedule_item->end_time = $request->end_time[$k];
                    $exam_schedule_item->save();
                }
            }


            DB::commit();
            return redirect()->route('allExam')->with('message','Exam Schedule Add Successfully');
        }catch(\Exception $e){
            DB::rollBack();
            dd($e);
            return back()->with ('error_message', $e->getMessage());
        }
    }

    public function examDetails(Request $request){

        $examRoutine =  ExamSchedule::find($request->examschedule_id);
        return view('Backend.school_management.examschedule.viewExam',compact('examRoutine'));
    }

    public function edit($id){
       $data['editData'] =  ExamSchedule::find($id);
       $data['className']=Classe::orderBy('id', 'desc')->get(); 
       $data['subjectName']=Subject::orderBy('id', 'desc')->get();
       $data['examinations']=Examination::orderBy('id', 'desc')->get();
       $data['buldings'] = Bulding::orderBy('id', 'desc')->get();
       $data['rooms'] = Room::orderBy('id', 'desc')->get();
       $data['floors'] = Floor::orderBy('id', 'desc')->get();
        return view('Backend.school_management.examschedule.editExamdetails',$data);
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
            $examschedule = ExamSchedule::find($id);
            $examschedule->class_id = $request->class_id;
            $examschedule->examination_id = $request->examination_id;
            $examschedule->save();

            if($request->subject_id){
                foreach( $request->subject_id as $k=>$value){
                    $exam_schedule_item = new ExamScheduleItem();
                    $exam_schedule_item->examschedule_id = $examschedule->id;
                    $exam_schedule_item->subject_id = $value;
                    $exam_schedule_item->date = $request->date[$k];
                    $exam_schedule_item->room_id = $request->room_id[$k];
                    $exam_schedule_item->bulding_id = $request->bulding_id[$k];
                    $exam_schedule_item->floor_id = $request->floor_id[$k];
                    $exam_schedule_item->pass_marke = $request->pass_marke[$k];
                    $exam_schedule_item->fail_marke = $request->fail_marke[$k];
                    $exam_schedule_item->start_time = $request->start_time[$k];
                    $exam_schedule_item->end_time = $request->end_time[$k];
                    $exam_schedule_item->save();
                }
            }

            if($request->old_subject_id){
                foreach($request->old_subject_id as $k => $value){
                    $exam_schedule_item = ExamScheduleItem::find($k);
                    $exam_schedule_item->examschedule_id = $examschedule->id;
                    $exam_schedule_item->subject_id = $value;
                    $exam_schedule_item->date = $request->old_date[$k];
                    $exam_schedule_item->room_id = $request->old_room_id[$k];
                    $exam_schedule_item->bulding_id = $request->old_bulding_id[$k];
                    $exam_schedule_item->floor_id = $request->old_floor_id[$k];
                    $exam_schedule_item->pass_marke = $request->old_pass_marke[$k];
                    $exam_schedule_item->fail_marke = $request->old_fail_marke[$k];
                    $exam_schedule_item->start_time = $request->old_start_time[$k];
                    $exam_schedule_item->end_time = $request->old_end_time[$k];
                    $exam_schedule_item->save();
                }
            }
    
            if($request->delete_exam_schedule_item){
                foreach($request->delete_exam_schedule_item as $key => $value){
                    $exam_schedule_item = ExamScheduleItem::find($value);
                    $exam_schedule_item->delete();
    
                }
            }
    
             //CourseConten  End



            DB::commit();
            return redirect()->route('allExam')->with('message','Exam Schedule Add Successfully');
        }catch(\Exception $e){
            DB::rollBack();
            dd($e);
            return back()->with ('error_message', $e->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        // dd('hi');
        $examschedule =  ExamSchedule::find($request->examschedule_id);
        // dd($examschedule);
        foreach($examschedule->exam_schedule_items as $exam_schedule_item){
            $exam_schedule_item->delete();
        }

        $examschedule->delete();
        return back()->with('message','exam schedule Deleted Successfully');
    }

    public function print(Request $request,$id){
        // dd('hi');
        $examRoutine =  ExamSchedule::find($id);
        return view('Backend.school_management.examschedule.view_exam_routine_print',compact('examRoutine'));
    }

  
}
