<?php

namespace App\Http\Controllers\Backend\School_management\Section;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\SchoolSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SchoolSectionController extends Controller
{
    public function index()
    {
        $data['sections'] = SchoolSection::orderBy('id', 'desc')->get();
        return view("Backend.school_management.section.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['classes'] = Classe::where('status', 1)->get();
        return view("Backend.school_management.section.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      // dd($request->all());
        $request->validate([
            'name' => 'required',
            'class_id' => 'required',

        ]);
        try{
            DB::beginTransaction();
            $section = New SchoolSection;
            $section->class_id = $request->class_id;
            $section->name = $request->name;
            $section->save();

            DB::commit();
            return redirect()->route('admin.school_section.index')->with('message','School Section Add Successfully');
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
        $data["section"]= SchoolSection::find($id);
        $data['classes'] = Classe::where('status', 1)->get();
        return view("Backend.school_management.section.update",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
       $request->validate([
        'name' => 'required',
        'class_id' => 'required',

    ]);
    try{
        DB::beginTransaction();
        $section = SchoolSection::find($id);
        $section->class_id = $request->class_id;
        $section->name = $request->name;
        $section->save();

        DB::commit();
        return redirect()->route('admin.school_section.index')->with('message','School Section Update Successfully');
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

        $section =  SchoolSection::find($request->school_section_id);
        $section->delete();
        return back()->with('message','School Section Deleted Successfully');
    }


    public function status($id)
    {
        $section = SchoolSection::find($id);
        if($section->status == 0)
        {
            $section->status = 1;
        }elseif($section->status == 1)
        {
            $section->status = 0;
        }
        $section->update();
        return redirect()->route('admin.school_section.index');
    }
}
