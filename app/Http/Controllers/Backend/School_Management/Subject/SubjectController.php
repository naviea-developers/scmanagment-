<?php

namespace App\Http\Controllers\Backend\School_Management\Subject;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Group;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    public function index()
    {
        $data['subjects'] = Subject::orderBy('id', 'asc')->get();
        return view("Backend.school_management.subject.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['classes'] = Classe::where('status', 1)->orderBy('id','desc')->get();
        $data['groups'] = Group::where('status', 1)->orderBy('id','desc')->get();
        return view("Backend.school_management.subject.create",$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      // dd($request->all());
        $request->validate([
            'name' => 'required',

        ]);
        try{
            DB::beginTransaction();
            $subject = New Subject;
            $subject->class_id = $request->class_id;
            $subject->name = $request->name;
            $subject->group_id = $request->group_id;

            if($request->hasFile('image')){
                $fileName = rand().time().'_subject_image.'.request()->image->getClientOriginalExtension();
                request()->image->move(public_path('upload/subject/'),$fileName);
                $subject->image = $fileName;
            }
            $subject->save();

            DB::commit();
            return redirect()->route('admin.subject.index')->with('message','Subject Add Successfully');
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
        $data["subject"]= Subject::find($id);
        $data['classes'] = Classe::where('status', 1)->orderBy('id','desc')->get();
        $data['groups'] = Group::where('status', 1)->orderBy('id','desc')->get();
        return view("Backend.school_management.subject.update",$data);
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
        $subject = Subject::find($id);
        $subject->class_id = $request->class_id;
        $subject->name = $request->name;
        $subject->group_id = $request->group_id;
        if($request->hasFile('image')){
            @unlink(public_path('upload/subject/'.$subject->image));
            $fileName = rand().time().'_subject_image.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('upload/subject/'),$fileName);
            $subject->image = $fileName;
        }
        $subject->save();

        DB::commit();
        return redirect()->route('admin.subject.index')->with('message','Subject Update Successfully');
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

        $subject =  Subject::find($request->subject_id);
        $subject->delete();
        return back()->with('message','Subject Deleted Successfully');
    }


    public function status($id)
    {
        $subject = Subject::find($id);
        if($subject->status == 0)
        {
            $subject->status = 1;
        }elseif($subject->status == 1)
        {
            $subject->status = 0;
        }
        $subject->update();
        return redirect()->route('admin.subject.index');
    }
}
