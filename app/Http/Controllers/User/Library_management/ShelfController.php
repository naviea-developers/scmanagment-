<?php

namespace App\Http\Controllers\User\Library_management;

use App\Http\Controllers\Controller;
use App\Models\Direction;
use App\Models\Shelf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShelfController extends Controller
{
    public function index()
    {
        $data['shelves'] = Shelf::orderBy('id', 'desc')->get();
        return view("user.library_management.shelf.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['directions'] = Direction::where('status', 1)->get();
        return view("user.library_management.shelf.create", $data);
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
            $shelf = New Shelf();
            $shelf->direction_id = $request->direction_id;
            $shelf->name = $request->name;
            $shelf->number = $request->number;
            $shelf->save();

            DB::commit();
            return redirect()->route('teacher.library_shelf.index')->with('message','Shelf Add Successfully');
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
        $data["shelf"]= Shelf::find($id);
        $data['directions'] = Direction::where('status', 1)->get();
        return view("user.library_management.shelf.update",$data);
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
        $shelf = Shelf::find($id);
        $shelf->direction_id = $request->direction_id;
        $shelf->name = $request->name;
        $shelf->number = $request->number;
        $shelf->save();

        DB::commit();
        return redirect()->route('teacher.library_shelf.index')->with('message','Shelf Update Successfully');
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

        $shelf =  Shelf::find($request->shelf_id);
        $shelf->delete();
        return back()->with('message','Shelf Deleted Successfully');
    }


    public function status($id)
    {
        $shelf = Shelf::find($id);
        if($shelf->status == 0)
        {
            $shelf->status = 1;
        }elseif($shelf->status == 1)
        {
            $shelf->status = 0;
        }
        $shelf->update();
        return redirect()->route('admin.shelf.index');
    }
}
