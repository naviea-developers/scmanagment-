<?php

namespace App\Http\Controllers\Backend\School_management\Bulding;

use App\Http\Controllers\Controller;
use App\Models\Bulding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BuldingController extends Controller
{
    public function index()
    {
        
        return view("Backend.school_management.bulding.manage");
    }
    
    function ajaxData(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'status',
        );
        $totalData = Bulding::count();
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
        return view("Backend.school_management.bulding.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      // dd($request->all());
        
        $validator = Validator::make($request->all(), [
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
            $bulding = New Bulding;
            $bulding->name = $request->name;
            $bulding->save();

            DB::commit();
           
            return response()->json([
                'status'=>'yes',
                'msg'=>'Bulding Add Successfully'
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
       //dd('hi');
        $data["bulding"]= Bulding::find($id);
        $data_view =  view("Backend.school_management.bulding.update",$data)->render();
        return $data_view;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
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
            $bulding = Bulding::find($id);
            $bulding->name = $request->name;
            $bulding->save();

            DB::commit();
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
            $bulding =  Bulding::find($request->bulding_id);
            $bulding->delete();
            
            return response()->json([
                'status'=>'yes',
                'msg'=>'Bulding Deleted Successfully'
            ]);
        }catch(\Exception $e){
            //DB::rollBack();
            return response()->json([
                'status'=>'no',
                'msg'=>$e->getMessage()
            ]);
        }
    }


    // public function status($id)
    // {
    //     $bulding = Bulding::find($id);
    //     if($bulding->status == 0)
    //     {
    //         $bulding->status = 1;
    //     }elseif($bulding->status == 1)
    //     {
    //         $bulding->status = 0;
    //     }
    //     $bulding->update();
    //     return redirect()->route('admin.bulding.index');
    // }

    public function status($id)
    {
        $bulding = Bulding::find($id);
        if ($bulding) {
            if ($bulding->status == 0) {
                $bulding->status = 1;
            } elseif ($bulding->status == 1) {
                $bulding->status = 0;
            }
            $bulding->update();

            return response()->json(['success' => true, 'status' => $bulding->status]);
        }

        return response()->json(['success' => false], 400);
    }
}
