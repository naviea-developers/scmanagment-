<?php

namespace App\Http\Controllers\Backend\School_management\Examination;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\Examination;
use App\Models\ExamResult;
use App\Models\Session;
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
        $data['academin_years'] = AcademicYear::where('status', 1)->get();
        $data['sessions'] = Session::where('status', 1)->get();
        return view("Backend.school_management.examination.create", $data);
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
            $exam->academin_year_id = $request->academin_year_id;
            $exam->session_id = $request->session_id;
            $exam->name = $request->name;
            $exam->start_date = $request->start_date;
            $exam->end_date = $request->end_date;
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
        $data['academin_years'] = AcademicYear::where('status', 1)->get();
        $data['sessions'] = Session::where('status', 1)->get();
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
        $exam->academin_year_id = $request->academin_year_id;
        $exam->session_id = $request->session_id;
        $exam->name = $request->name;
        $exam->start_date = $request->start_date;
        $exam->end_date = $request->end_date;
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

    public function publish()
    {

        DB::table('examinations')
        ->join('exam_results', 'examinations.id', '=', 'exam_results.examination_id')
        ->where('exam_results.is_publis', '=', 0) 
        ->update(['exam_results.is_publis' => 1]);
        return redirect()->back()->with('message','Exam Results Publish Successfully');

    }


}
