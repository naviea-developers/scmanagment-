<?php

namespace App\Http\Controllers\Backend\School_management\ExamClass;

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

class ExamClassController extends Controller
{
    //--------------Exam------------//

    public function index(){
        $allData=ExamClass::orderBy('id', 'desc')->get();
        return view('Backend.school_management.exam_class.index',compact('allData'));
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

        return view('Backend.school_management.exam_class.create',$data);
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
            $exam_class = new ExamClass();
            $exam_class->examination_id = $request->examination_id;
            $exam_class->class_id = $request->class_id;
            $exam_class->group_id = $request->group_id ?? 0;
            $exam_class->subject_id = $request->subject_id;
            $exam_class->examtype_id = $request->examtype_id;
            $exam_class->marke = $request->marke;
            $exam_class->pass_marke = $request->pass_marke;
            $exam_class->date = $request->date;
            $exam_class->start_time = $request->start_time;
            $exam_class->end_time = $request->end_time;
            $exam_class->save();
            DB::commit();
            return redirect()->route('admin.examclass.index')->with('message','Exam Subjext Add Successfully');
        }catch(\Exception $e){
            DB::rollBack();
            dd($e);
            return back()->with ('error_message', $e->getMessage());
        }
    }

    public function edit($id){
        // dd('hi');
       $data['editData'] =  ExamClass::find($id);
       $data['className']=Classe::where('status', 1)->orderBy('id', 'desc')->get(); 
       $data['subjectName']=Subject::where('status', 1)->orderBy('id', 'desc')->get();
       $data['examinations']=Examination::where('status', 1)->orderBy('id', 'desc')->get();
       $data['buldings'] = Bulding::where('status', 1)->orderBy('id', 'desc')->get();
       $data['rooms'] = Room::where('status', 1)->orderBy('id', 'desc')->get();
       $data['floors'] = Floor::where('status', 1)->orderBy('id', 'desc')->get();
       $data['sessions']=Session::where('status', 1)->orderBy('id', 'desc')->get(); 
       $data['examTypes'] = ExamType::where('status', 1)->orderBy('id','desc')->get();
       $data['groups'] = Group::where('status', 1)->orderBy('id','desc')->get();
        return view('Backend.school_management.exam_class.update',$data);
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
            $exam_class = ExamClass::find($id);
            $exam_class->examination_id = $request->examination_id;
            $exam_class->class_id = $request->class_id;
            $exam_class->group_id = $request->group_id ?? 0;
            $exam_class->subject_id = $request->subject_id;
            $exam_class->examtype_id = $request->examtype_id;
            $exam_class->marke = $request->marke;
            $exam_class->pass_marke = $request->pass_marke;
            $exam_class->date = $request->date;
            $exam_class->start_time = $request->start_time;
            $exam_class->end_time = $request->end_time;
            $exam_class->save();

            DB::commit();
            return redirect()->route('admin.examclass.index')->with('message','Exam Subjext Add Successfully');
        }catch(\Exception $e){
            DB::rollBack();
            dd($e);
            return back()->with ('error_message', $e->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        // dd('hi');
        $exam_class =  ExamClass::find($request->exam_class_id);
        // dd($examschedule);
        $exam_class->delete();
        return back()->with('message','exam Subjext Deleted Successfully');
    }

    public function status($id)
    {
        $exam_class = ExamClass::find($id);
        if($exam_class->status == 0)
        {
            $exam_class->status = 1;
        }elseif($exam_class->status == 1)
        {
            $exam_class->status = 0;
        }
        $exam_class->update();
        return redirect()->route('admin.examclass.index')->with('message','Exam Subjext Status Update Successfully');
    }

   
}
