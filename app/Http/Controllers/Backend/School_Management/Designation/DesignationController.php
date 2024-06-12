<?php

namespace App\Http\Controllers\Backend\School_management\Designation;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DesignationController extends Controller
{
    // niaz
    public function index()
    {
        $data['designations'] = Designation::all();
        return view("Backend.school_management.designation.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Backend.school_management.designation.create");
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
            $designation = New Designation;
            $designation->name = $request->name;
            $designation->position = $request->position;
            $designation->save();

            DB::commit();
            return redirect()->route('admin.designation.index')->with('message','Designation Add Successfully');
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
        $data["designation"]= Designation::find($id);
        return view("Backend.school_management.designation.update",$data);
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
        $designation = Designation::find($id);
        $designation->name = $request->name;
        $designation->position = $request->position;
        $designation->save();

        DB::commit();
        return redirect()->route('admin.designation.index')->with('message','Designation Update Successfully');
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

        $designation =  Designation::find($request->designation_id);
        $designation->delete();
        return back()->with('message','Designation Deleted Successfully');
    }


    public function status($id)
    {
        $designation = Designation::find($id);
        if($designation->status == 0)
        {
            $designation->status = 1;
        }elseif($designation->status == 1)
        {
            $designation->status = 0;
        }
        $designation->update();
        return redirect()->route('admin.designation.index');
    }
}
