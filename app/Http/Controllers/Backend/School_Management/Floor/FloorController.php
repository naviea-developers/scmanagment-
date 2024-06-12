<?php

namespace App\Http\Controllers\Backend\School_management\Floor;

use App\Http\Controllers\Controller;
use App\Models\Bulding;
use App\Models\Floor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FloorController extends Controller
{
    public function index()
    {
        // $data['floors'] = Floor::orderBy('id', 'desc')->get();
        $data['buldings'] = Bulding::where('status', 1)->get();
        return view("Backend.school_management.floor.manage",$data);
        // return view("Backend.school_management.floor.manage");
    }

    function ajaxData(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'bulding_name',
            2 => 'name',
            3 => 'status',
        );
        $totalData = Floor::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        //dd($request->input('order.0.column'));
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = Floor::query();
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
                $nestedData['bulding_name'] = $data_v->bulding->name;
                $nestedData['name'] = $data_v->name;
             
              
 
                $nestedData['status'] = '';
                if ($data_v->status == 0) {
                    $nestedData['status'] .= '<a href="'.route('admin.floor.status', $data_v->id).'" class="data_status btn btn-sm btn-warning">Inactive</a>';
                } elseif ($data_v->status == 1) {
                    $nestedData['status'] .= '<a href="'.route('admin.floor.status', $data_v->id).'" class="data_status btn btn-sm btn-success">Active</a>';
                }

              
                
 
                $nestedData['options'] = '<a class="btn btn-primary data_edit" href="'.route('admin.floor.edit', $data_v->id).'"><i class="fa fa-edit"></i></a>';
             
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
        // $data['buldings'] = Bulding::where('status', 1)->get();
        return view("Backend.school_management.floor.create");
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
      // dd($request->all());
        $validator = Validator::make($request->all(), [
            'bulding_id' => 'required',
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
            $class = New Floor();
            $class->bulding_id = $request->bulding_id;
            $class->name = $request->name;
            $class->save();

            DB::commit();
           
            return response()->json([
                'status'=>'yes',
                'msg'=>'Floor Add Successfully'
            ]);
        }catch(\Exception $e){
            DB::rollBack();
           // dd($e);
           
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
        $data["floor"]= Floor::find($id);
        $data['buldings'] = Bulding::where('status', 1)->get();
        return view("Backend.school_management.floor.update",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'bulding_id' => 'required',
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
            $floor = Floor::find($id);
            $floor->bulding_id = $request->bulding_id;
            $floor->name = $request->name;
            $floor->save();

            DB::commit();
            // return redirect()->route('admin.floor.index')->with('message','Floor Update Successfully');
            return response()->json([
                'status'=>'yes',
                'msg'=>'Bulding Update Successfully'
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
            $floor =  Floor::find($request->floor_id);
            $floor->delete();
            
            return response()->json([
                'status'=>'yes',
                'msg'=>'Floor Deleted Successfully'
            ]);
        }catch(\Exception $e){
            //DB::rollBack();
            return response()->json([
                'status'=>'no',
                'msg'=>$e->getMessage()
            ]);
        }
    }


    public function status($id)
    {
        $floor = Floor::find($id);
        if ($floor) {
            if ($floor->status == 0) {
                $floor->status = 1;
            } elseif ($floor->status == 1) {
                $floor->status = 0;
            }
            $floor->update();
            $statusMessage = $floor->status == 1 ? 'Activated Successfully' : 'Deactivated Successfully';
            return response()->json([
                'status'=>'yes',
                'msg'=>$statusMessage
            ]);
        }

       
        return response()->json([
            'status'=>'no',
            'msg'=>'Floor not found'
        ]);
    }

}
