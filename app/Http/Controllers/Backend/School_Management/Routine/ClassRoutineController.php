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
use App\Models\SchoolSection;
use App\Models\Tp_option;

class ClassRoutineController extends Controller
{
    public function index(){
        $data['allData']=$allData=ClassRoutine::orderBy('id', 'desc')->get();
        $data['classes']=Classe::orderBy('id', 'asc')->get(); 
        $data['sessions']=Session::orderBy('id', 'desc')->get(); 
        // $data['sections']=SchoolSection::where('class_id',$allData->class_id)->where('status', 1)->orderBy('id', 'asc')->get();
        $data['sections']=SchoolSection::where('status', 1)->orderBy('id', 'asc')->get();

        $data['className']=Classe::where('status', 1)->orderBy('id', 'asc')->get(); 
        $data['sessions']=Session::where('status', 1)->orderBy('id', 'desc')->get(); 
        $data['subjectName']=Subject::where('status', 1)->orderBy('id', 'asc')->get();
        $data['teachers'] = User::where('status', 1)->where('type','2')->orderBy('id', 'asc')->get();
        $data['examinations']=Examination::where('status', 1)->orderBy('id', 'asc')->get();
        $data['buldings'] = Bulding::where('status', 1)->orderBy('id', 'asc')->get();
        $data['rooms'] = Room::where('status', 1)->orderBy('id', 'asc')->get();
        $data['floors'] = Floor::where('status', 1)->orderBy('id', 'asc')->get();
        $data['class_durations'] = ClassDuration::where('status', 1)->orderBy('id', 'asc')->get();
        return view('Backend.school_management.class_routine.manage',$data);
    }


    function ajaxData(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'session_id',
            2 => 'class_id',
            3 => 'sections_id',
            4 => 'subject_id',
            5 => 'teacher_id',
            6 => 'day_id',
            7 => 'status',
        );
        $totalData = ClassRoutine::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        //dd($request->input('order.0.column'));
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = ClassRoutine::query();
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
                $nestedData['id'] = @$data_v->id;
                $nestedData['session_id'] = @$data_v->session->start_year ." - ". $data_v->session->end_year;
                $nestedData['class_id'] = @$data_v->class->name;
                $nestedData['sections_id'] = @$data_v->schoolsection->name;
                $nestedData['subject_id'] = @$data_v->subject->name;
                // $nestedData['section_id'] = $data_v->schoolsection->name;
                $nestedData['teacher_id'] = @$data_v->teacher->name;
                $nestedData['day_id'] = @$data_v->day ?? "";
               
 
                $nestedData['status'] = '';
                if ($data_v->status == 0) {
                    $nestedData['status'] .= '<a href="'.route('admin.routine.status', $data_v->id).'" class="data_status btn btn-sm btn-warning">Inactive</a>';
                } elseif ($data_v->status == 1) {
                    $nestedData['status'] .= '<a href="'.route('admin.routine.status', $data_v->id).'" class="data_status btn btn-sm btn-success">Active</a>';
                }
 
                $nestedData['options'] = '<a class="btn btn-primary data_edit" href="'.route('admin.routine.edit', $data_v->id).'"><i class="fa fa-edit"></i></a>';
             
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

    // public function examDetails(){

    //     return view('Backend.school_management.examschedule.viewExam');
    // }

    public function create(){
        $data['className']=Classe::where('status', 1)->orderBy('id', 'asc')->get(); 
        $data['sessions']=Session::where('status', 1)->orderBy('id', 'desc')->get(); 
        $data['subjectName']=Subject::where('status', 1)->orderBy('id', 'asc')->get();
        $data['teachers'] = User::where('status', 1)->where('type','2')->orderBy('id', 'asc')->get();
        $data['examinations']=Examination::where('status', 1)->orderBy('id', 'asc')->get();
        $data['buldings'] = Bulding::where('status', 1)->orderBy('id', 'asc')->get();
        $data['rooms'] = Room::where('status', 1)->orderBy('id', 'asc')->get();
        $data['floors'] = Floor::where('status', 1)->orderBy('id', 'asc')->get();
        $data['class_durations'] = ClassDuration::where('status', 1)->orderBy('id', 'asc')->get();

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
            $class_routine->session_id = $request->session_id ?? 0;
            $class_routine->class_id = $request->class_id ?? 0;
            $class_routine->section_id = $request->section_id ?? 0;
            $class_routine->subject_id = $request->subject_id ?? 0;
            $class_routine->teacher_id = $request->teacher_id ?? 0;
            $class_routine->room_id = $request->room_id ?? 0;
            $class_routine->class_duration_id = $request->class_duration_id ?? 0;
            $class_routine->day_id = $request->day_id ?? 0;
            // $class_routine->class_type = $request->class_type;
            $class_routine->save();
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
       $data['editData']=$class_routine =  ClassRoutine::find($id);
       $data['sessions']=Session::where('status', 1)->orderBy('id', 'desc')->get(); 
       $data['subjectName']=Subject::where('status', 1)->where('class_id',$class_routine->class_id)->orderBy('id', 'asc')->get();
       $data['sections']=SchoolSection::where('class_id',$class_routine->class_id)->where('status', 1)->orderBy('id', 'asc')->get();
       $data['teachers'] = User::where('status', 1)->where('type','2')->orderBy('id', 'asc')->get();
       $data['className']=Classe::where('status', 1)->orderBy('id', 'asc')->get(); 
    //    $data['subjectName']=Subject::orderBy('id', 'asc')->get();
       $data['examinations']=Examination::where('status', 1)->orderBy('id', 'asc')->get();
       $data['buldings'] = Bulding::where('status', 1)->orderBy('id', 'asc')->get();
       $data['rooms'] = Room::where('status', 1)->orderBy('id', 'asc')->get();
       $data['floors'] = Floor::where('status', 1)->orderBy('id', 'asc')->get();
       $data['class_durations'] = ClassDuration::where('status', 1)->orderBy('id', 'asc')->get();
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
            $class_routine->session_id = $request->session_id ?? 0;
            $class_routine->class_id = $request->class_id ?? 0;
            $class_routine->section_id = $request->section_id ?? 0;
            $class_routine->subject_id = $request->subject_id ?? 0;
            $class_routine->teacher_id = $request->teacher_id ?? 0;
            $class_routine->room_id = $request->room_id ?? 0;
            $class_routine->class_duration_id = $request->class_duration_id ?? 0;
            $class_routine->day_id = $request->day_id ?? 0;
            $class_routine->save();

            // if($request->subject_id){
            //     foreach( $request->subject_id as $k=>$value){
            //         $class_routine_item = new ClassRoutineItem();
            //         $class_routine_item->class_routine_id = $class_routine->id;
            //         $class_routine_item->subject_id = $value;
            //         $class_routine_item->day_id = $request->day_id[$k];
            //         $class_routine_item->room_id = $request->room_id[$k];
            //         $class_routine_item->teacher_id = $request->teacher_id[$k];
            //         // $class_routine_item->bulding_id = $request->bulding_id[$k];
            //         // $class_routine_item->floor_id = $request->floor_id[$k];    
            //         $class_routine_item->class_duration_id = $request->class_duration_id[$k];      
            //         // $class_routine_item->start_time = $request->start_time[$k];
            //         // $class_routine_item->end_time = $request->end_time[$k];
            //         $class_routine_item->save();
            //     }
            // }

            // if($request->old_subject_id){
            //     foreach($request->old_subject_id as $k => $value){
            //         $class_routine_item = ClassRoutineItem::find($k);
            //         $class_routine_item->class_routine_id = $class_routine->id;
            //         $class_routine_item->subject_id = $value;
            //         $class_routine_item->day_id = $request->old_day_id[$k];
            //         $class_routine_item->teacher_id = $request->old_teacher_id[$k];
            //         $class_routine_item->room_id = $request->old_room_id[$k];
            //         // $class_routine_item->bulding_id = $request->old_bulding_id[$k];
            //         // $class_routine_item->floor_id = $request->old_floor_id[$k]; 
            //         $class_routine_item->class_duration_id = $request->old_class_duration_id[$k];              
            //         // $class_routine_item->start_time = $request->old_start_time[$k];
            //         // $class_routine_item->end_time = $request->old_end_time[$k];
            //         $class_routine_item->save();
            //     }
            // }
    
            // if($request->delete_class_routine_item){
            //     foreach($request->delete_class_routine_item as $key => $value){
            //         $class_routine_item = ClassRoutineItem::find($value);
            //         $class_routine_item->delete();
    
            //     }
            // }
    
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
        // foreach($class_routine->class_routine_items as $class_routine_item){
        //     $class_routine_item->delete();
        // }

        $class_routine->delete();
        return back()->with('message','Class Routine Deleted Successfully');
    }

    public function details(Request $request,$id){
        // dd('hi');
        $data['class_routine']=$class_routine =  ClassRoutine::find($id);
        $data['class_durations'] = ClassDuration::orderBy('id', 'asc')->get();
        return view('Backend.school_management.class_routine.view_class_routine',$data);
    }

    public function print(Request $request){
        //  dd('hi');
        // $class_routine =  ClassRoutine::find($id);
        // return view('Backend.school_management.class_routine.view_class_routine_print',compact('class_routine'));

        $classId = $request->input('class_id');
        $sectionId = $request->input('section_id');
        $sessionId = $request->input('session_id');

        if( $classId && $sessionId &&  $sectionId){
            $data['tpOption'] =Tp_option::where('option_name', 'theme_option_header')->first();
            $data['class_routine']=$class_routine = ClassRoutine::where('class_id',$classId)
                                                                ->where('section_id', $sectionId)
                                                                ->where('session_id', $sessionId)
                                                                ->orderBy('day_id','asc')
                                                                ->orderBy('class_duration_id', 'asc')
                                                                ->get();
        }elseif($classId && $sessionId){
            $data['tpOption'] =Tp_option::where('option_name', 'theme_option_header')->first();
            $data['class_routine']=$class_routine = ClassRoutine::where('class_id',$classId)
                                                                 ->where('session_id', $sessionId)
                                                                 ->orderBy('day_id','asc')
                                                                 ->orderBy('class_duration_id', 'asc')
                                                                 ->get();
        }
        return view('Backend.school_management.class_routine.view_class_routine_print',$data);
    }



    // public function getClassRoutine(Request $request)
    // {
    //     $classId = $request->input('class_id');
    //     $sectionId = $request->input('section_id');
    //     $sessionId = $request->input('session_id');
    //     // return response()->json(['sessionId' => $sessionId,'classId' => $classId,'sectionId' => $sectionId]);
    //     if( $classId && $sessionId &&  $sectionId){
    //         $data['class_routine']=$class_routine = ClassRoutine::where('class_id',$classId)->where('section_id', $sectionId)->where('session_id', $sessionId)->orderBy('day_id','asc')->get();
    //     }elseif($classId && $sessionId){
    //         $data['class_routine']=$class_routine = ClassRoutine::where('class_id',$classId)->where('session_id', $sessionId)->orderBy('day_id','asc')->get();
    //     }
    //     return view('Backend.school_management.class_routine.view_class_routine',$data);
    //     // return response()->json(['routine' => $routine]);
    // }


    public function getClassRoutine(Request $request)
    {
        $classId = $request->input('class_id');
        $sectionId = $request->input('section_id');
        $sessionId = $request->input('session_id');
        if( $classId && $sessionId &&  $sectionId){
            $data['tpOption'] =Tp_option::where('option_name', 'theme_option_header')->first();
            $data['class_routine']=$class_routine = ClassRoutine::where('class_id',$classId)
                                                                ->where('section_id', $sectionId)
                                                                ->where('session_id', $sessionId)
                                                                ->orderBy('day_id','asc')
                                                                ->orderBy('class_duration_id', 'asc')
                                                                ->get();
        }elseif($classId && $sessionId){
            $data['tpOption'] =Tp_option::where('option_name', 'theme_option_header')->first();
            $data['class_routine']=$class_routine = ClassRoutine::where('class_id',$classId)
                                                                ->where('session_id', $sessionId)
                                                                ->orderBy('day_id','asc')
                                                                ->orderBy('class_duration_id', 'asc')
                                                                ->get();
        }
        return view('Backend.school_management.class_routine.view_class_routine',$data);
    }


    




}
