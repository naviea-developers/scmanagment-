<?php

namespace App\Http\Controllers\Backend\School_management\Routine;

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
use App\Models\ClassRoutine;
use App\Models\ClassRoutineItem;
use App\Models\User;
use App\Models\ClassDuration;
use App\Models\Session;

class ClassRoutineController extends Controller
{
    public function index(){
        $allData=ClassRoutine::orderBy('id', 'desc')->get();
        return view('Backend.school_management.class_routine.index',compact('allData'));
    }

    // public function examDetails(){

    //     return view('Backend.school_management.examschedule.viewExam');
    // }

    public function create(){
        $data['className']=Classe::orderBy('id', 'desc')->get(); 
        $data['sessions']=Session::orderBy('id', 'desc')->get(); 
        $data['subjectName']=Subject::orderBy('id', 'desc')->get();
        $data['teachers'] = User::where('type','2')->orderBy('id', 'desc')->get();
        $data['examinations']=Examination::orderBy('id', 'desc')->get();
        $data['buldings'] = Bulding::orderBy('id', 'desc')->get();
        $data['rooms'] = Room::orderBy('id', 'desc')->get();
        $data['floors'] = Floor::orderBy('id', 'desc')->get();
        $data['class_durations'] = ClassDuration::orderBy('id', 'asc')->get();

        return view('Backend.school_management.class_routine.create',$data);
    }

 

    public function store(Request $request)
    {
    //    dd($request->all());
        $request->validate([
            'class_id' => 'required',
            'session_id' => 'required',
            'day_id' => 'required',

        ]);
        try{
            DB::beginTransaction();
            $class_routine = new ClassRoutine();
            $class_routine->class_id = $request->class_id;
            $class_routine->session_id = $request->session_id;
            $class_routine->class_type = $request->class_type;
            $class_routine->save();

            if($request->subject_id){
                foreach( $request->subject_id as $k=>$value){
                    $class_routine_item = new ClassRoutineItem();
                    $class_routine_item->class_routine_id = $class_routine->id;
                    $class_routine_item->subject_id = $value;
                    $class_routine_item->day_id = $request->day_id[$k];
                    $class_routine_item->room_id = $request->room_id[$k];
                    $class_routine_item->teacher_id = $request->teacher_id[$k];
                    $class_routine_item->bulding_id = $request->bulding_id[$k];
                    $class_routine_item->floor_id = $request->floor_id[$k];  
                    $class_routine_item->class_duration_id = $request->class_duration_id[$k];       
                    // $class_routine_item->start_time = $request->start_time[$k];
                    // $class_routine_item->end_time = $request->end_time[$k];
                    $class_routine_item->save();
                }
            }

            // if($request->day_id){
            //     foreach($request->day_id as $k=>$value){
            //         $class_routine_day= New ClassRoutineDay();
            //         $class_routine_day->class_routine_id=$class_routine->id;
            //         $class_routine_day->day_id = $value;
            //         $class_routine_day->save();
    
            //         foreach($request->subject_id[$k] as $i=>$data){
            //             $class_routine_item= New ClassRoutineItem;
            //             $class_routine_item->class_routine_day=$class_routine_day->id;
            //             $class_routine_item->subject_id=$data;
            //             $class_routine_item->teacher_id=$request->teacher_id[$k][$i];
            //             $class_routine_item->room_id=$request->room_id[$k][$i];
            //             $class_routine_item->class_duration_id=$request->class_duration_id[$k][$i];
            //             $class_routine_item->save();
            //         }
            //     }
            // }


            DB::commit();
            return redirect()->route('admin.routine.index')->with('message','Class Routine Add Successfully');
        }catch(\Exception $e){
            DB::rollBack();
            dd($e);
            return back()->with ('error_message', $e->getMessage());
        }
    }

    public function examDetails(Request $request){

        $examRoutine =  ExamSchedule::find($request->examschedule_id);
        return view('Backend.school_management.class_routine.viewExam',compact('examRoutine'));
    }

    public function edit($id){
       $data['editData'] =  ClassRoutine::find($id);
       $data['sessions']=Session::orderBy('id', 'desc')->get(); 
       $data['teachers'] = User::where('type','2')->orderBy('id', 'desc')->get();
       $data['className']=Classe::orderBy('id', 'desc')->get(); 
       $data['subjectName']=Subject::orderBy('id', 'desc')->get();
       $data['examinations']=Examination::orderBy('id', 'desc')->get();
       $data['buldings'] = Bulding::orderBy('id', 'desc')->get();
       $data['rooms'] = Room::orderBy('id', 'desc')->get();
       $data['floors'] = Floor::orderBy('id', 'desc')->get();
       $data['class_durations'] = ClassDuration::orderBy('id', 'asc')->get();
       return view('Backend.school_management.class_routine.update',$data);
    }

    public function update(Request $request,$id)
    {
    // dd($request->all());
        $request->validate([
            'class_id' => 'required',
            'session_id' => 'required',
            // 'day_id' => 'required',

        ]);
        try{
            DB::beginTransaction();
            $class_routine = ClassRoutine::find($id);
            $class_routine->class_id = $request->class_id;
            $class_routine->session_id = $request->session_id;
            $class_routine->class_type = $request->class_type;
            $class_routine->save();

            if($request->subject_id){
                foreach( $request->subject_id as $k=>$value){
                    $class_routine_item = new ClassRoutineItem();
                    $class_routine_item->class_routine_id = $class_routine->id;
                    $class_routine_item->subject_id = $value;
                    $class_routine_item->day_id = $request->day_id[$k];
                    $class_routine_item->room_id = $request->room_id[$k];
                    $class_routine_item->teacher_id = $request->teacher_id[$k];
                    $class_routine_item->bulding_id = $request->bulding_id[$k];
                    $class_routine_item->floor_id = $request->floor_id[$k];    
                    $class_routine_item->class_duration_id = $request->class_duration_id[$k];      
                    // $class_routine_item->start_time = $request->start_time[$k];
                    // $class_routine_item->end_time = $request->end_time[$k];
                    $class_routine_item->save();
                }
            }

            if($request->old_subject_id){
                foreach($request->old_subject_id as $k => $value){
                    $class_routine_item = ClassRoutineItem::find($k);
                    $class_routine_item->class_routine_id = $class_routine->id;
                    $class_routine_item->subject_id = $value;
                    $class_routine_item->day_id = $request->old_day_id[$k];
                    $class_routine_item->teacher_id = $request->old_teacher_id[$k];
                    $class_routine_item->room_id = $request->old_room_id[$k];
                    $class_routine_item->bulding_id = $request->old_bulding_id[$k];
                    $class_routine_item->floor_id = $request->old_floor_id[$k]; 
                    $class_routine_item->class_duration_id = $request->old_class_duration_id[$k];              
                    // $class_routine_item->start_time = $request->old_start_time[$k];
                    // $class_routine_item->end_time = $request->old_end_time[$k];
                    $class_routine_item->save();
                }
            }
    
            if($request->delete_class_routine_item){
                foreach($request->delete_class_routine_item as $key => $value){
                    $class_routine_item = ClassRoutineItem::find($value);
                    $class_routine_item->delete();
    
                }
            }
    
             //CourseConten  End



            DB::commit();
            return redirect()->route('admin.routine.index')->with('message','Exam Schedule Add Successfully');
        }catch(\Exception $e){
            DB::rollBack();
            dd($e);
            return back()->with ('error_message', $e->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        // dd('hi');
        $class_routine =  ClassRoutine::find($request->class_routine_id);
        // dd($examschedule);
        foreach($class_routine->class_routine_items as $class_routine_item){
            $class_routine_item->delete();
        }

        $class_routine->delete();
        return back()->with('message','Class Routine Deleted Successfully');
    }

    public function details(Request $request,$id){
        // dd('hi');
        $data['class_routine']=$class_routine =  ClassRoutine::find($id);
        $data['class_durations'] = ClassDuration::orderBy('id', 'asc')->get();
        return view('Backend.school_management.class_routine.view_class_routine',$data);
    }

    public function print(Request $request,$id){
        // dd('hi');
        $class_routine =  ClassRoutine::find($id);
        return view('Backend.school_management.class_routine.view_class_routine_print',compact('class_routine'));
    }




}
