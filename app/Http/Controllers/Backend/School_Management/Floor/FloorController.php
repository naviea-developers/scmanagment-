<?php

namespace App\Http\Controllers\Backend\School_management\Floor;

use App\Http\Controllers\Controller;
use App\Models\Bulding;
use App\Models\Floor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FloorController extends Controller
{
    public function index()
    {
        $data['floors'] = Floor::orderBy('id', 'desc')->get();
        return view("Backend.school_management.floor.index",$data);
    }

    function ajaxData(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'status',
        );
        $totalData = Floor::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        //dd($request->input('order.0.column'));
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = Bulding::query();
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
                $nestedData['name'] = $data_v->name;
              
 
                $nestedData['status'] = '';
                // if ($data_v->status == 0) {
                //     $nestedData['status'] .= '<a href="'.route('admin.bulding.status', $data_v->id).'" class="btn btn-sm btn-warning">Inactive</a>';
                // } elseif ($data_v->status == 1) {
                //     $nestedData['status'] .= '<a href="'.route('admin.bulding.status', $data_v->id).'" class="btn btn-sm btn-success">Active</a>';
                // }

                if ($data_v->status == 0) {
                    $nestedData['status'] .= '<a href="javascript:void(0)" data-id="'.$data_v->id.'" class="btn btn-sm btn-warning change-status">Inactive</a>';
                } elseif ($data_v->status == 1) {
                    $nestedData['status'] .= '<a href="javascript:void(0)" data-id="'.$data_v->id.'" class="btn btn-sm btn-success change-status">Active</a>';
                }
                
 
                $nestedData['options'] = '<a class="btn btn-primary data_edit" href="'.route('admin.bulding.edit', $data_v->id).'"><i class="fa fa-edit"></i></a>';
             
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
        return view("Backend.school_management.floor.create", $data);
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
            $class = New Floor();
            $class->bulding_id = $request->bulding_id;
            $class->name = $request->name;
            $class->save();

            DB::commit();
            return redirect()->route('admin.floor.index')->with('message','Floor Add Successfully');
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
       $request->validate([
        'name' => 'required',

    ]);
    try{
        DB::beginTransaction();
        $floor = Floor::find($id);
        $floor->bulding_id = $request->bulding_id;
        $floor->name = $request->name;
        $floor->save();

        DB::commit();
        return redirect()->route('admin.floor.index')->with('message','Floor Update Successfully');
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

        $floor =  Floor::find($request->floor_id);
        $floor->delete();
        return back()->with('message','Floor Deleted Successfully');
    }


    public function status($id)
    {
        $floor = Floor::find($id);
        if($floor->status == 0)
        {
            $floor->status = 1;
        }elseif($floor->status == 1)
        {
            $floor->status = 0;
        }
        $floor->update();
        return redirect()->route('admin.floor.index');
    }
}
