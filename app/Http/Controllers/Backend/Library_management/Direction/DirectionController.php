<?php

namespace App\Http\Controllers\Backend\Library_management\Direction;

use App\Http\Controllers\Controller;
use App\Models\Direction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DirectionController extends Controller
{
    public function index()
    {
        $data['directions'] = Direction::orderBy('id', 'desc')->get();
        return view("Backend.library_management.direction.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Backend.library_management.direction.create");
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
            $direction = New Direction();
            $direction->name = $request->name;
            $direction->save();

            DB::commit();
            return redirect()->route('admin.direction.index')->with('message','Direction Add Successfully');
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
        $data["direction"]= Direction::find($id);
        return view("Backend.library_management.direction.update",$data);
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
        $direction = Direction::find($id);
        $direction->name = $request->name;
        $direction->save();

        DB::commit();
        return redirect()->route('admin.direction.index')->with('message','Direction Update Successfully');
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

        $direction =  Direction::find($request->direction_id);
        $direction->delete();
        return back()->with('message','Direction Deleted Successfully');
    }


    public function status($id)
    {
        $direction = Direction::find($id);
        if($direction->status == 0)
        {
            $direction->status = 1;
        }elseif($direction->status == 1)
        {
            $direction->status = 0;
        }
        $direction->update();
        return redirect()->route('admin.direction.index');
    }
}
