<?php

namespace App\Http\Controllers\Backend\School_management\Admit;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\Classe;
use App\Models\Examination;
use App\Models\Group;
use App\Models\SchoolSection;
use App\Models\User;
use App\Models\ExamSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdmitController extends Controller
{
    // public function index()
    // {
    //     $data['classes'] = Classe::all();
    //     return view("Backend.school_management.admit_card.index",$data);
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['students'] = Admission::where('is_new', 0)->where('status', 1)->get();
        $data['classes'] = Classe::where('status', 1)->get();
        $data['sections'] = SchoolSection::where('status', 1)->get();
        $data['groups'] = Group::where('status', 1)->get();
        $data['examinations'] = Examination::where('status', 1)->where('end_date', '>=', Carbon::today())->get();
        return view("Backend.school_management.admit_card.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'class_id' => 'required|exists:classes,id',
        //     'group_id' => 'required|exists:groups,id',
        //     'examination_id' => 'required|exists:examinations,id',
        //     'student_id' => 'nullable|exists:students,id',
        // ]);

        $examination = Examination::findOrFail($request->examination_id);

        // $data['admission'] = $admission = Admission::where('user_id', $user->id)->first();  

        if ($request->filled('student_id')) {
            $student = Admission::findOrFail($request->student_id);

            $data['examRoutine']=$examRoutine = ExamSchedule::where('class_id', $student->class_id)
            ->where('section_id', $student->section_id)
            ->where('examination_id', $request->examination_id)
            ->get();
            return view('Backend.school_management.admit_card.admit', compact('student', 'examination','examRoutine'));
        } else {
            $query = Admission::where('is_new',0)->where('class_id', $request->class_id);
            $examRoutineQuery = ExamSchedule::where('class_id', $request->class_id);

            if ($request->filled('section_id')) {
                $query->where('section_id', $request->section_id);
                $examRoutineQuery->where('section_id', $request->section_id);
            }
            if ($request->filled('group_id')) {
                $query->where('group_id', $request->group_id);
            }

            if ($request->filled('examination_id')) {
                $examRoutineQuery->where('examination_id', $request->examination_id);
            }

            $students = $query->get();
            $examRoutine = $examRoutineQuery->get();

            return view('Backend.school_management.admit_card.admit_all', compact('students', 'examination','examRoutine'));
        }
    }

    public function show($student_id, $examination_id)
    {
        $student = Admission::findOrFail($student_id);
        $examination = Examination::findOrFail($examination_id);

        return view('Backend.school_management.admit_card.admit', compact('students', 'examination'));
    }

    // public function show(Request $request, $examination_id)
    // {
    //     $examination = Examination::findOrFail($examination_id);
    //     $students = Admission::whereIn('id', $request->students)->get();
    //     // dd($students);
    //     return view('Backend.school_management.admit_card.admit', compact('students', 'examination'));
    // }

 



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       // dd('hi');
        $data["class"]= Classe::find($id);
        $data['teachers'] = User::where('type', 2)->where('status', 1)->get();
        return view("Backend.school_management.admit_card.update",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
       $request->validate([
        'name' => 'required',

    ]);
    try{
        DB::beginTransaction();
        $class = Classe::find($id);
        $class->class_teacher_id = $request->class_teacher_id;
        $class->name = $request->name;
        $class->details = $request->details;
        $class->gargent_policy = $request->gargent_policy;
        if($request->hasFile('image')){
            @unlink(public_path("upload/class/".$class->image));
            $fileName = rand().time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('upload/class/'),$fileName);
            $class->image = $fileName;
        }
        $class->save();

        DB::commit();
        return redirect()->route('admin.class.index')->with('message','Class Update Successfully');
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

        $class =  Classe::find($request->class_id);
        @unlink(public_path("upload/class/".$class->image));
        $class->delete();
        return back()->with('message','Class Deleted Successfully');
    }


    public function status($id)
    {
        $class = Classe::find($id);
        if($class->status == 0)
        {
            $class->status = 1;
        }elseif($class->status == 1)
        {
            $class->status = 0;
        }
        $class->update();
        return redirect()->route('admin.class.index')->with('message','Class Status Update Successfully');
    }
}
