<?php

namespace App\Http\Controllers\Backend\School_management\Syllabus;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Examination;
use App\Models\Lession;
use App\Models\Session;
use App\Models\Subject;
use App\Models\Syllabus;
use App\Models\Tp_option;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SyllabusController extends Controller
{
    public function index()
    {
        $data['syllabuses'] = Syllabus::orderBy('id', 'asc')->get();
        $data['classes'] = Classe::orderBy('id', 'asc')->get();
        $data['sessions'] = Session::orderBy('id', 'asc')->get();
        $data['examinations'] = Examination::where('exam_priority', 'main')
        // ->where('end_date', Carbon::today())
        ->where('status', 1)
        ->orderBy('id', 'desc')
        ->get();    
        return view("Backend.school_management.syllabus.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['classes']= Classe::where('status', 1)->orderBy('id','asc')->get();
        $data['subjects'] = Subject::where('status', 1)->orderBy('id','desc')->get();
        // $data['examinations'] = Examination::where('status', 1)->orderBy('id', 'desc')->get();        
        $data['examinations'] = Examination::where('exam_priority', 'main')
        // ->where('end_date', Carbon::today())
        ->where('status', 1)
        ->orderBy('id', 'desc')
        ->get();       
        return view("Backend.school_management.syllabus.create",$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      // dd($request->all());
        $request->validate([
            'class_id' => 'required',
            'subject_id' => 'required',
            // 'name' => 'required',

        ]);
        try{
            DB::beginTransaction();
            $syllabus = New Syllabus;
            $syllabus->class_id = $request->class_id ?? 0;
            $syllabus->subject_id = $request->subject_id ?? 0;
            $syllabus->lession_id = $request->lession_id ?? 0;
            $syllabus->examination_id = $request->examination_id ?? 0;
            $syllabus->lession_item = $request->lession_item;
            $syllabus->save();

            DB::commit();
            return redirect()->route('admin.syllabus.index')->with('message','Syllabus Add Successfully');
        }catch(\Exception $e){
            DB::rollBack();
            dd($e);
            return back()->with ('error_message', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     $data["lession"] = $class = Lession::find($id);
    //     $data['classes'] = Classe::where('status', 1)->orderBy('id','asc')->get();
    //     $data['subjects'] = Subject::where('class_id', $class)->where('status', 1)->orderBy('id','desc')->get();
    //     return view("Backend.school_management.lession.update",$data);
    // }


    public function edit(string $id)
    {
       
        $data["syllabus"]= $syllabus = Syllabus::find($id);
    
        $classId = $syllabus->class_id; 
        $subjectId = $syllabus->subject_id; 
    
        $data['classes'] = Classe::where('status', 1)->orderBy('id', 'asc')->get();
        $data['subjects'] = Subject::where('class_id', $classId)->where('status', 1)->orderBy('id', 'desc')->get();
        $data['lessionses'] = Lession::where('subject_id', $subjectId)->where('status', 1)->get();

        $data['examinations'] = Examination::where('exam_priority', 'main')
        // ->where('end_date', Carbon::today())
        ->where('status', 1)
        ->orderBy('id', 'desc')
        ->get();    
    
        return view("Backend.school_management.syllabus.update", $data);
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
       $request->validate([
        'class_id' => 'required',
        'subject_id' => 'required',
        // 'name' => 'required',

    ]);
    try{
        DB::beginTransaction();
        $syllabus = Syllabus::find($id);
        $syllabus->class_id = $request->class_id ?? 0;
        $syllabus->subject_id = $request->subject_id ?? 0;
        $syllabus->lession_id = $request->lession_id ?? 0;
        $syllabus->examination_id = $request->examination_id ?? 0;
        $syllabus->lession_item = $request->lession_item;
        $syllabus->save();

        DB::commit();
        return redirect()->route('admin.syllabus.index')->with('message','Syllabus Update Successfully');
    }catch(\Exception $e){
        DB::rollBack();
       // dd($e);
        return back()->with ('error_message', $e->getMessage());
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {

        $syllabus =  Syllabus::find($request->syllabus_id);
        $syllabus->delete();
        return back()->with('message','Syllabus Deleted Successfully');
    }


    public function status($id)
    {
        $syllabus = Syllabus::find($id);
        if($syllabus->status == 0)
        {
            $syllabus->status = 1;
        }elseif($syllabus->status == 1)
        {
            $syllabus->status = 0;
        }
        $syllabus->update();
        return redirect()->route('admin.syllabus.index')->with('message', 'Syllabus update successfully.');
    }



    public function getSyllabus(Request $request)
    {
        $classId = $request->input('class_id');
        $sessionId = $request->input('session_id');
        // $examId = $request->input('examination_id');
        // return response()->json(['class'=>$classId,'session'=>$sessionId]);
        $data['tpOption'] = Tp_option::where('option_name', 'theme_option_header')->first();
    
        // if ($classId && $sessionId && $examId) {
        //     // Fetch the examinations for the selected session
        //     $examinations = Examination::where('session_id', $sessionId)->pluck('id');
        //     // return response()->json(['examinations'=>$examinations]);
        //     // Fetch the syllabus for the selected class and examinations
        //     $data['syllabus']=$syllabus = Syllabus::where('class_id', $classId)
        //         ->where('examination_id', $examId)
        //         ->whereIn('examination_id', $examinations)
        //         ->get();
        //     // return response()->json(['syllabus'=>$syllabus]);
        // } else
        if ($classId && $sessionId) {
            $examinations = Examination::where('session_id', $sessionId)->pluck('id');
            // return response()->json(['examinations'=>$examinations]);
            // Fetch the syllabus for the selected class and examinations
            $data['syllabus']=$syllabus = Syllabus::where('class_id', $classId)
                ->whereIn('examination_id', $examinations)
                ->get();
        }else {
            $data['syllabus'] = [];
        }
    
        return view('Backend.school_management.syllabus.syllabus_details', $data);
    }
    

}
