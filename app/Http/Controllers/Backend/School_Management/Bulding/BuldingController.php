<?php

namespace App\Http\Controllers\Backend\School_management\Bulding;

use App\Http\Controllers\Controller;
use App\Models\Bulding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BuldingController extends Controller
{
    public function index()
    {
        $data['buldings'] = Bulding::orderBy('id', 'desc')->get();
        return view("Backend.school_management.bulding.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Backend.school_management.bulding.create");
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
            $bulding = New Bulding;
            $bulding->name = $request->name;
            $bulding->save();

            DB::commit();
            return redirect()->route('admin.bulding.index')->with('message','Bulding Add Successfully');
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
        $data["bulding"]= Bulding::find($id);
        return view("Backend.school_management.bulding.update",$data);
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
        $bulding = Bulding::find($id);
        $bulding->name = $request->name;
        $bulding->save();

        DB::commit();
        return redirect()->route('admin.bulding.index')->with('message','Bulding Update Successfully');
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

        $bulding =  Bulding::find($request->bulding_id);
        $bulding->delete();
        return back()->with('message','Bulding Deleted Successfully');
    }


    public function status($id)
    {
        $bulding = Bulding::find($id);
        if($bulding->status == 0)
        {
            $bulding->status = 1;
        }elseif($bulding->status == 1)
        {
            $bulding->status = 0;
        }
        $bulding->update();
        return redirect()->route('admin.bulding.index');
    }
}
