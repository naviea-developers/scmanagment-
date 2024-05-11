<?php

namespace App\Http\Controllers\Backend\School_management\Examination;

use App\Http\Controllers\Controller;
use App\Models\Examination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExaminationController extends Controller
{
    public function index()
    {
        $data['exams'] = Examination::orderBy('id', 'desc')->get();
        return view("Backend.school_management.examination.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Backend.school_management.examination.create");
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
            $exam = New Examination();
            $exam->name = $request->name;
            $exam->save();

            DB::commit();
            return redirect()->route('admin.examination.index')->with('message','Examination Add Successfully');
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
        $data["exam"]= Examination::find($id);
        return view("Backend.school_management.examination.update",$data);
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
        $exam = Examination::find($id);
        $exam->name = $request->name;
        $exam->save();

        DB::commit();
        return redirect()->route('admin.examination.index')->with('message','Examination Update Successfully');
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

        $exam =  Examination::find($request->examination_id);
        $exam->delete();
        return back()->with('message','Examination Deleted Successfully');
    }


    public function status($id)
    {
        $exam = Examination::find($id);
        if($exam->status == 0)
        {
            $exam->status = 1;
        }elseif($exam->status == 1)
        {
            $exam->status = 0;
        }
        $exam->update();
        return redirect()->route('admin.examination.index');
    }
}
