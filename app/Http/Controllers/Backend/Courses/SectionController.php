<?php

namespace App\Http\Controllers\Backend\Courses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;

class SectionController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['sections'] = Section::orderBy('id', 'desc')->get();
        return view("Backend.courses.section.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Backend.courses.section.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //dd($request->all());
         $request->validate([

            'name' => 'required',
            // 'link' => 'required',
            // 'image' => 'required',
        ]);

        $section = new Section();
        $section->name = $request->name;
        // $section->link = "https://" . preg_replace('#^https?://#', '',$request->link);

        // if($request->hasFile('image')){
        //     $fileName = rand().time().'.'.request()->image->getClientOriginalExtension();
        //     request()->image->move(public_path('upload/section/'),$fileName);
        //     $section->image = $fileName;
        // }

        $section->save();
        return redirect()->route('admin.section.index')->with('message','section Add Successfully');
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
        $data["section"]= Section::find($id);
        return view("Backend.courses.section.update",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            // 'link' => 'required',
        ]);

        $section =Section::find($id);
        $section->name = $request->name;
        $section->status = $request->status;
        // $section->link = "https://" . preg_replace('#^https?://#', '',$request->link);

        // if($request->hasFile('image')){
        //     @unlink(public_path("upload/section/".$section->image));
        //     $fileName = rand().time().'.'.request()->image->getClientOriginalExtension();
        //     request()->image->move(public_path('upload/section/'),$fileName);
        //     $section->image = $fileName;
        // }

        $section->save();
        return redirect()->route('admin.section.index')->with('message','section Update Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $section= Section::find($request->section_id);
        // $path = public_path("upload/section/".$section->image);
        // @unlink($path);

        $section->delete();
        return redirect()->route('admin.section.index');
    }


    public function status($id)
    {
        $section = Section::find($id);
        if($section->status == 0)
        {
            $section->status = 1;
        }elseif($section->status == 1)
        {
            $section->status = 0;
        }
        $section->update();
        return redirect()->route('admin.section.index');
    }
}
