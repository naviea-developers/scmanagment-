<?php

namespace App\Http\Controllers\Backend\School_management\ClassDuration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClassDuration;
use Illuminate\Support\Facades\DB;

class ClassDurationController extends Controller
{
    public function index()
    {
        $data['class_durations'] = ClassDuration::orderBy('id', 'asc')->get();
        return view("Backend.school_management.class_duration.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Backend.school_management.class_duration.create");
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
            $class_duration = New ClassDuration;
            $class_duration->name = $request->name;
            $class_duration->start_time = $request->start_time;
            $class_duration->end_time = $request->end_time;
            $class_duration->save();

            DB::commit();
            return redirect()->route('admin.class_duration.index')->with('message','Class Duration Add Successfully');
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
        $data["class_duration"]= ClassDuration::find($id);
        return view("Backend.school_management.class_duration.update",$data);
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
        $class_duration = ClassDuration::find($id);
        $class_duration->name = $request->name;
        $class_duration->start_time = $request->start_time;
        $class_duration->end_time = $request->end_time;
        $class_duration->save();

        DB::commit();
        return redirect()->route('admin.class_duration.index')->with('message','Class Duration Update Successfully');
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

        $class_duration =  ClassDuration::find($request->class_id);
        $class_duration->delete();
        return back()->with('message','Class Duration Deleted Successfully');
    }


    public function status($id)
    {
        $class_duration = ClassDuration::find($id);
        if($class_duration->status == 0)
        {
            $class_duration->status = 1;
        }elseif($class_duration->status == 1)
        {
            $class_duration->status = 0;
        }
        $class_duration->update();
        return redirect()->route('admin.class_duration.index')->with('message','Class Duration Status Update Successfully');
    }
}
