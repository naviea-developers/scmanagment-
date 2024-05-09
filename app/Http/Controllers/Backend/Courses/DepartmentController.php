<?php

namespace App\Http\Controllers\Backend\Courses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Department;

class DepartmentController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['departments'] = Department::orderBy('id', 'desc')->get();
        return view("Backend.courses.department.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Backend.courses.department.create");
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

        $department = new Department();
        $department->name = $request->name;
        // $department->link = "https://" . preg_replace('#^https?://#', '',$request->link);

        // if($request->hasFile('image')){
        //     $fileName = rand().time().'.'.request()->image->getClientOriginalExtension();
        //     request()->image->move(public_path('upload/department/'),$fileName);
        //     $department->image = $fileName;
        // }

        $department->save();
        return redirect()->route('admin.department.index')->with('message','department Add Successfully');
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
        $data["department"]= Department::find($id);
        return view("Backend.courses.department.update",$data);
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

        $department =Department::find($id);
        $department->name = $request->name;
        $department->status = $request->status;
        // $department->link = "https://" . preg_replace('#^https?://#', '',$request->link);

        // if($request->hasFile('image')){
        //     @unlink(public_path("upload/department/".$department->image));
        //     $fileName = rand().time().'.'.request()->image->getClientOriginalExtension();
        //     request()->image->move(public_path('upload/department/'),$fileName);
        //     $department->image = $fileName;
        // }

        $department->save();
        return redirect()->route('admin.department.index')->with('message','department Update Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $department= Department::find($request->department_id);
        // $path = public_path("upload/department/".$department->image);
        // @unlink($path);

        $department->delete();
        return redirect()->route('admin.department.index');
    }


    public function status($id)
    {
        $department = Department::find($id);
        if($department->status == 0)
        {
            $department->status = 1;
        }elseif($department->status == 1)
        {
            $department->status = 0;
        }
        $department->update();
        return redirect()->route('admin.department.index');
    }
}
