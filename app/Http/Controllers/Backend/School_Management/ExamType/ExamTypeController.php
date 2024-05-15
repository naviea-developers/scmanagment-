<?php

namespace App\Http\Controllers\Backend\School_management\ExamType;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamType;
use Illuminate\Support\Facades\DB;
class ExamTypeController extends Controller
{
    public function index()
    {
        $data['examTypes'] = ExamType::orderBy('id','desc')->get();
        return view("Backend.school_management.examtype.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Backend.school_management.examtype.create");
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
            $examtype = New ExamType;
            $examtype->name = $request->name;
            $examtype->save();

            DB::commit();
            return redirect()->route('admin.examtype.index')->with('message','Exam Type Add Successfully');
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
        $data["examtype"]= ExamType::find($id);
        return view("Backend.school_management.examtype.update",$data);
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
        $examtype = ExamType::find($id);
        $examtype->name = $request->name;
        $examtype->save();

        DB::commit();
        return redirect()->route('admin.examtype.index')->with('message','Exam Type Update Successfully');
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

        $examtype =  ExamType::find($request->exam_type_id);
        $examtype->delete();
        return back()->with('message','Exam Type Deleted Successfully');
    }


    public function status($id)
    {
        $examtype = ExamType::find($id);
        if($examtype->status == 0)
        {
            $examtype->status = 1;
        }elseif($examtype->status == 1)
        {
            $examtype->status = 0;
        }
        $examtype->update();
        return redirect()->route('admin.examtype.index')->with('message','Exam Type Status Update Successfully');
    }
}
