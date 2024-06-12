<?php

namespace App\Http\Controllers\Backend\Library_management\Shelf;

use App\Http\Controllers\Controller;
use App\Models\Direction;
use App\Models\Shelf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ShelfController extends Controller
{
    public function index()
    {
        // $data['shelves'] = Shelf::orderBy('id', 'desc')->get();
        $data['directions'] = Direction::where('status', 1)->get();
        return view("Backend.library_management.shelf.manage",$data);
    }
    function ajaxData(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'direction_id',
            2 => 'name',
            3 => 'number',
            4 => 'status',
        );
        $totalData = Shelf::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        //dd($request->input('order.0.column'));
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = Shelf::query();
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
                $nestedData['direction_id'] = @$data_v->direction->name;
                $nestedData['name'] = $data_v->name;
                $nestedData['number'] = $data_v->number;
              
 
                $nestedData['status'] = '';
                if ($data_v->status == 0) {
                    $nestedData['status'] .= '<a href="'.route('admin.shelf.status', $data_v->id).'" class="data_status btn btn-sm btn-warning">Inactive</a>';
                } elseif ($data_v->status == 1) {
                    $nestedData['status'] .= '<a href="'.route('admin.shelf.status', $data_v->id).'" class="data_status btn btn-sm btn-success">Active</a>';
                }
 
                $nestedData['options'] = '<a class="btn btn-primary data_edit" href="'.route('admin.shelf.edit', $data_v->id).'"><i class="fa fa-edit"></i></a>';
             
                $nestedData['options'] .= '<button class="btn text-danger bg-white"  value="'.$data_v->id.'" id="dataDeleteModal"><i class="icon ion-trash-a tx-28"></i></button>';
 
                $data[] = $nestedData;
 
            }
        }
        $json_data = [
            'draw' => intval($request->input('draw')),
            'recordsTotal' => intval($totalData),
            'recordsFiltered' => intval($totalFiltered),
            'data' => $data
        ];
    
        return response()->json($json_data);
    }


    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     $data['directions'] = Direction::where('status', 1)->get();
    //     return view("Backend.library_management.shelf.create", $data);
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      // dd($request->all());
        $validator = Validator::make($request->all(), [
            'direction_id' => 'required',
            'name' => 'required',
            'number' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=>'error',
                'errors'=>$validator->errors()->all()
            ]);
        }
        try{
            DB::beginTransaction();
            $shelf = New Shelf();
            $shelf->direction_id = $request->direction_id;
            $shelf->name = $request->name;
            $shelf->number = $request->number;
            $shelf->save();

            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Shelf Add Successfully'
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
        $data["shelf"]= Shelf::find($id);
        $data['directions'] = Direction::where('status', 1)->get();
        return view("Backend.library_management.shelf.update",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'direction_id' => 'required',
            'name' => 'required',
            'number' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=>'error',
                'errors'=>$validator->errors()->all()
            ]);
        }
        try{
            DB::beginTransaction();
            $shelf = Shelf::find($id);
            $shelf->direction_id = $request->direction_id;
            $shelf->name = $request->name;
            $shelf->number = $request->number;
            $shelf->save();

            DB::commit();
            return response()->json([
                'status'=>'yes',
                'msg'=>'Shelf Update Successfully'
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
     * Remove the specified resource from storage.
     */


    public function destroy(Request $request)
    {
        //dd($request);
        try{
            $shelf =  Shelf::find($request->shelf_id);
            $shelf->delete();
            
            return response()->json([
                'status'=>'yes',
                'msg'=>'Shelf Deleted Successfully'
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
        $shelf = Shelf::find($id);
        if ($shelf) {
            if ($shelf->status == 0) {
                $shelf->status = 1;
            } elseif ($shelf->status == 1) {
                $shelf->status = 0;
            }
            $shelf->update();

            $statusMessage = $shelf->status == 1 ? 'Activated Successfully' : 'Deactivated Successfully';

            return response()->json([
                'status'=>'yes',
                'msg'=>$statusMessage
            ]);
        }

       
        return response()->json([
            'status'=>'no',
            'msg'=>'Shelf not found'
        ]);
    }
}
