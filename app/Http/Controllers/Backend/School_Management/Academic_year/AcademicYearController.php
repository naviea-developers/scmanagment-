<?php

namespace App\Http\Controllers\Backend\School_management\Academic_year;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AcademicYearController extends Controller
{
    public function index()
    {
        $data['years'] = AcademicYear::orderBy('id', 'desc')->get();
        return view("Backend.school_management.academic_year.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Backend.school_management.academic_year.create");
    }


    public function updateCurrent(Request $request)
    {
        $yearId = $request->input('year_id');
        AcademicYear::query()->update(['is_current' => 0]);
        $year = AcademicYear::find($yearId);
        if ($year) {
            $year->is_current = 1;
            $year->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false], 404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      // dd($request->all());
        $request->validate([
            'year' => 'required',

        ]);
        try{
            DB::beginTransaction();
            AcademicYear::query()->update(['is_current' => 0]);
            $year = New AcademicYear;
            $year->year = $request->year;
            $year->is_current = 1;
            $year->save();

            DB::commit();
            return redirect()->route('admin.academic_year.index')->with('message','Academic Year Add Successfully');
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
        $data["year"]= AcademicYear::find($id);
        return view("Backend.school_management.academic_year.update",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
       $request->validate([
        'year' => 'required',

    ]);
    try{
        DB::beginTransaction();
        $year = AcademicYear::find($id);
        $year->year = $request->year;
        $year->save();

        DB::commit();
        return redirect()->route('admin.academic_year.index')->with('message','Academic Year Update Successfully');
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

        $year =  AcademicYear::find($request->year_id);
        $year->delete();
        return back()->with('message','Academic Year Deleted Successfully');
    }


    public function status($id)
    {
        $year = AcademicYear::find($id);
        if($year->status == 0)
        {
            $year->status = 1;
        }elseif($year->status == 1)
        {
            $year->status = 0;
        }
        $year->update();
        return redirect()->route('admin.academic_year.index');
    }
}
