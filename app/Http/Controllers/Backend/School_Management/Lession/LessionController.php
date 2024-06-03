<?php

namespace App\Http\Controllers\Backend\School_management\Lession;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Lession;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LessionController extends Controller
{
    public function index()
    {
        $data['lessions'] = Lession::orderBy('id', 'asc')->get();
        return view("Backend.school_management.lession.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['classes']= Classe::where('status', 1)->orderBy('id','asc')->get();
        $data['subjects'] = Subject::where('status', 1)->orderBy('id','desc')->get();
        return view("Backend.school_management.lession.create",$data);
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
            'name' => 'required',

        ]);
        try{
            DB::beginTransaction();
            $lession = New Lession;
            $lession->class_id = $request->class_id ?? 0;
            $lession->subject_id = $request->subject_id ?? 0;
            $lession->name = $request->name;
            $lession->save();

            DB::commit();
            return redirect()->route('admin.lession.index')->with('message','Lession Add Successfully');
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
        $lession = Lession::find($id);
        $data["lession"] = $lession;
    
        // Assuming the lesson has a relationship with class and you can access it like this:
        $classId = $lession->class_id; 
    
        // Fetching all active classes
        $data['classes'] = Classe::where('status', 1)->orderBy('id', 'asc')->get();
    
        // Fetching subjects only for the selected class
        $data['subjects'] = Subject::where('class_id', $classId)->where('status', 1)->orderBy('id', 'desc')->get();
    
        return view("Backend.school_management.lession.update", $data);
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
        'name' => 'required',

    ]);
    try{
        DB::beginTransaction();
        $lession = Lession::find($id);
        $lession->class_id = $request->class_id ?? 0;
        $lession->subject_id = $request->subject_id ?? 0;
        $lession->name = $request->name;
        $lession->save();

        DB::commit();
        return redirect()->route('admin.lession.index')->with('message','Lession Update Successfully');
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

        $lession =  Lession::find($request->lession_id);
        $lession->delete();
        return back()->with('message','Lession Deleted Successfully');
    }


    public function status($id)
    {
        $lession = Lession::find($id);
        if($lession->status == 0)
        {
            $lession->status = 1;
        }elseif($lession->status == 1)
        {
            $lession->status = 0;
        }
        $lession->update();
        return redirect()->route('admin.lession.index')->with('message', 'Lession update successfully.');
    }
}
