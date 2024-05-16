<?php

namespace App\Http\Controllers\Backend\School_Management\SubjectTeacherAssent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classe;
use App\Models\User;
use App\Models\Session;
use App\Models\SchoolSection;
use App\Models\SubjectTeacherAssent;
use Illuminate\Support\Facades\DB;

class SubjectTeacherAssentController extends Controller
{
    public function index()
    {
        $data['subject_teacher_assents'] = SubjectTeacherAssent::orderBy('id', 'desc')->get();;
        return view("Backend.school_management.subject_teacher_assent.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['teachers'] = User::where('type', 2)->where('status', 1)->get();
        $data['sessions'] = Session::orderBy('id', 'desc')->where('status', 1)->get();
        $data['sections'] = SchoolSection::orderBy('id', 'desc')->where('status', 1)->get();
        $data['classes'] = Classe::orderBy('id', 'desc')->where('status', 1)->get();
        return view("Backend.school_management.subject_teacher_assent.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      // dd($request->all());
        $request->validate([
            'teacher_id' => 'required',
            'class_id' => 'required',

        ]);
        try{
            DB::beginTransaction();
            $subject_teacher_assent = New SubjectTeacherAssent;
            $subject_teacher_assent->teacher_id = $request->teacher_id;
            $subject_teacher_assent->class_id = $request->class_id;
            $subject_teacher_assent->section_id = $request->section_id;
            $subject_teacher_assent->session_id = $request->session_id;
            $subject_teacher_assent->save();

            DB::commit();
            return redirect()->route('admin.subject_teacher_assent.index')->with('message','Class Teacher Assent Add Successfully');
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
    public function edit(string $id)
    {
       // dd('hi');
        $data["subject_teacher_assent"]=$subject_teacher_assent= SubjectTeacherAssent::find($id);
        $data['teachers'] = User::where('type', 2)->where('status', 1)->get();
        $data['sessions'] = Session::orderBy('id', 'desc')->where('status', 1)->get();
        // $data['sections'] = SchoolSection::orderBy('id', 'desc')->where('status', 1)->get();
        $data['sections']=SchoolSection::where('class_id',$subject_teacher_assent->class_id)->where('status', 1)->orderBy('id', 'asc')->get();
        $data['classes'] = Classe::orderBy('id', 'desc')->where('status', 1)->get();
        return view("Backend.school_management.subject_teacher_assent.update",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
       $request->validate([
        'teacher_id' => 'required',
        'class_id' => 'required',

    ]);
    try{
        DB::beginTransaction();
        $subject_teacher_assent = SubjectTeacherAssent::find($id);
        $subject_teacher_assent->teacher_id = $request->teacher_id;
        $subject_teacher_assent->class_id = $request->class_id;
        $subject_teacher_assent->section_id = $request->section_id;
        $subject_teacher_assent->session_id = $request->session_id;
        $subject_teacher_assent->save();

        DB::commit();
        return redirect()->route('admin.subject_teacher_assent.index')->with('message','Class Teacher Assent Update Successfully');
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

        $subject_teacher_assent =  SubjectTeacherAssent::find($request->subject_teacher_assent_id);
        $subject_teacher_assent->delete();
        return back()->with('message','Subject Teacher Assent Deleted Successfully');
    }


    public function status($id)
    {
        $subject_teacher_assent = SubjectTeacherAssent::find($id);
        if($subject_teacher_assent->status == 0)
        {
            $subject_teacher_assent->status = 1;
        }elseif($subject_teacher_assent->status == 1)
        {
            $subject_teacher_assent->status = 0;
        }
        $subject_teacher_assent->update();
        return redirect()->route('admin.subject_teacher_assent.index')->with('message','Class Teacher Assent Status Update Successfully');
    }

}
