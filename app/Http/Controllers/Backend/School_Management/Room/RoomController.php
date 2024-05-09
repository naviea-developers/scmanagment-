<?php

namespace App\Http\Controllers\Backend\School_management\Room;

use App\Http\Controllers\Controller;
use App\Models\Bulding;
use App\Models\Floor;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    public function index()
    {
        $data['rooms'] = Room::orderBy('id', 'desc')->get();
        return view("Backend.school_management.room.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['buldings'] = Bulding::where('status', 1)->get();
        $data['floors'] = Floor::where('status', 1)->get();
        return view("Backend.school_management.room.create", $data);
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
            $room = New Room();
            $room->bulding_id = $request->bulding_id;
            $room->floor_id = $request->floor_id;
            $room->name = $request->name;
            $room->save();

            DB::commit();
            return redirect()->route('admin.room.index')->with('message','Room Add Successfully');
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
        $data["room"]= Room::find($id);
        $data['buldings'] = Bulding::where('status', 1)->get();
        $data['floors'] = Floor::where('status', 1)->get();
        return view("Backend.school_management.room.update",$data);
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
        $room = Room::find($id);
        $room->bulding_id = $request->bulding_id;
        $room->floor_id = $request->floor_id;
        $room->name = $request->name;
        $room->save();

        DB::commit();
        return redirect()->route('admin.room.index')->with('message','Room Update Successfully');
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

        $room =  Room::find($request->class_id);
        $room->delete();
        return back()->with('message','Room Deleted Successfully');
    }


    public function status($id)
    {
        $room = Room::find($id);
        if($room->status == 0)
        {
            $room->status = 1;
        }elseif($room->status == 1)
        {
            $room->status = 0;
        }
        $room->update();
        return redirect()->route('admin.room.index');
    }
}
