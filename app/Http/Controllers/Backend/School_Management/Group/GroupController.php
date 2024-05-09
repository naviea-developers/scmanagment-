<?php

namespace App\Http\Controllers\Backend\School_management\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    public function index()
    {
        $data['groups'] = Group::orderBy('id', 'desc')->get();
        return view("Backend.school_management.group.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Backend.school_management.group.create");
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
            $group = New Group;
            $group->name = $request->name;
            $group->save();

            DB::commit();
            return redirect()->route('admin.group.index')->with('message','Group Add Successfully');
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
        $data["group"]= Group::find($id);
        return view("Backend.school_management.group.update",$data);
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
        $group = Group::find($id);
        $group->name = $request->name;
        $group->save();

        DB::commit();
        return redirect()->route('admin.group.index')->with('message','Group Update Successfully');
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

        $group =  Group::find($request->group_id);
        $group->delete();
        return back()->with('message','Group Deleted Successfully');
    }


    public function status($id)
    {
        $group = Group::find($id);
        if($group->status == 0)
        {
            $group->status = 1;
        }elseif($group->status == 1)
        {
            $group->status = 0;
        }
        $group->update();
        return redirect()->route('admin.group.index');
    }
}
