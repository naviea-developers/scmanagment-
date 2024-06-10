<?php

namespace App\Http\Controllers\Backend\School_management\Room;

use App\Http\Controllers\Controller;
use App\Models\Bulding;
use App\Models\Floor;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RoomController extends Controller
{
    public function index()
    {
        // $data['rooms'] = Room::orderBy('id', 'desc')->get();
        // return view("Backend.school_management.room.index",$data);

        $data['buldings'] = Bulding::where('status', 1)->get();
        $data['floors'] = Floor::where('status', 1)->get();
        return view("Backend.school_management.room.manage", $data);
    }


    function ajaxData(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'bulding_id',
            2 => 'floor_id',
            3 => 'name',
            4 => 'status',
        );
        $totalData = Room::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        //dd($request->input('order.0.column'));
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = Room::query();
        if(!empty($search)){
 
            $datalist =$datalist->where("name","LIKE","%{$search}%");
           
        }
        
        $totalFiltered = $datalist->count();
         $datalist = $datalist->offset($start)->limit($limit)->orderBy($order,$dir)->get();
        
 
        $data = array();
        if(!empty($datalist))
        {
             $i = $start == 0 ? 1 : $start+1;
            foreach($datalist as $data_v)
            {
                $nestedData['id'] = $data_v->id;
                $nestedData['bulding_id'] = @$data_v->bulding->name;
                $nestedData['floor_id'] = @$data_v->floor->name;
                $nestedData['name'] = $data_v->name;
              
 
                $nestedData['status'] = '';
                if ($data_v->status == 0) {
                    $nestedData['status'] .= '<a href="'.route('admin.room.status', $data_v->id).'" class="data_status btn btn-sm btn-warning">Inactive</a>';
                } elseif ($data_v->status == 1) {
                    $nestedData['status'] .= '<a href="'.route('admin.room.status', $data_v->id).'" class="data_status btn btn-sm btn-success">Active</a>';
                }
 
                $nestedData['options'] = '<a class="btn btn-primary data_edit" href="'.route('admin.room.edit', $data_v->id).'"><i class="fa fa-edit"></i></a>';
             
                $nestedData['options'] .= '<button class="btn text-danger bg-white"  value="'.$data_v->id.'" id="dataDeleteModal"><i class="icon ion-trash-a tx-28"></i></button>';
 
                $data[] = $nestedData;
 
            }
        }
        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        );
 
        return json_encode($json_data);
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
        $validator = Validator::make($request->all(), [
            'bulding_id' => 'required',
            'floor_id' => 'required',
            'name' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=>'error',
                'errors'=>$validator->errors()->all()
            ]);
        }
        try{
            DB::beginTransaction();
            $room = New Room();
            $room->bulding_id = $request->bulding_id;
            $room->floor_id = $request->floor_id;
            $room->name = $request->name;
            $room->save();

            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Room Add Successfully'
            ]);
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json([
                'status'=>'no',
                'msg'=>$e->getMessage()
            ]);
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
        $validator = Validator::make($request->all(), [
            'bulding_id' => 'required',
            'floor_id' => 'required',
            'name' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=>'error',
                'errors'=>$validator->errors()->all()
            ]);
        }
        try{
            DB::beginTransaction();
            $room = Room::find($id);
            $room->bulding_id = $request->bulding_id;
            $room->floor_id = $request->floor_id;
            $room->name = $request->name;
            $room->save();

            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Room Update Successfully'
            ]);
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json([
                'status'=>'no',
                'msg'=>$e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //dd($request);
        try{
            $room =  Room::find($request->room_id);
            $room->delete();

            return response()->json([
                'status'=>'yes',
                'msg'=>'Room Deleted Successfully'
            ]);
        }catch(\Exception $e){
            // DB::rollBack();
            return response()->json([
                'status'=>'no',
                'msg'=>$e->getMessage()
            ]);
        }
    }

    public function status($id)
    {
        $room = Room::find($id);
        if ($room) {
            if ($room->status == 0) {
                $room->status = 1;
            } elseif ($room->status == 1) {
                $room->status = 0;
            }
            $room->update();

            $statusMessage = $room->status == 1 ? 'Activated Successfully' : 'Deactivated Successfully';

            return response()->json([
                'status'=>'yes',
                'msg'=>$statusMessage
            ]);
        }

        return response()->json([
            'status'=>'no',
            'msg'=>'Room not found'
        ]);
    }
}
