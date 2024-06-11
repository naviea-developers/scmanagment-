<?php

namespace App\Http\Controllers\Backend\School_management\Class;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassController extends Controller
{
    public function index()
    {
        // $data['classes'] = Classe::all();
        $data['teachers'] = User::where('type', 2)->where('status', 1)->get();
        return view("Backend.school_management.class.manage",$data);
        // return view("Backend.school_management.class.index",$data);
    }

    function ajaxData(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'image',
            2 => 'name',
            3 => 'teacher_name',
            4 => 'status',
        );
        $totalData = Classe::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        //dd($request->input('order.0.column'));
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = Classe::query();
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
                $nestedData['image'] = '<img src="' . $data_v->image_show . '" alt="" width="60px" height="40px">';
                $nestedData['name'] = $data_v->name;
                $nestedData['teacher_name'] = $data_v->teacher->name;
 
                $nestedData['status'] = '';
                if ($data_v->status == 0) {
                    $nestedData['status'] .= '<a href="'.route('admin.class.status', $data_v->id).'" class="data_status btn btn-sm btn-warning">Inactive</a>';
                } elseif ($data_v->status == 1) {
                    $nestedData['status'] .= '<a href="'.route('admin.class.status', $data_v->id).'" class="data_status btn btn-sm btn-success">Active</a>';
                }
 
                $nestedData['options'] = '<a class="btn btn-primary data_edit" href="'.route('admin.class.edit', $data_v->id).'"><i class="fa fa-edit"></i></a>';
             
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
        $data['teachers'] = User::where('type', 2)->where('status', 1)->get();
        return view("Backend.school_management.class.create", $data);
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
            $class = New Classe;
            $class->class_teacher_id = $request->class_teacher_id;
            $class->name = $request->name;
            $class->details = $request->details;
            $class->gargent_policy = $request->gargent_policy;
            $class->daily_class_details = $request->daily_class_details;
            if($request->hasFile('image')){
                $fileName = rand().time().'.'.request()->image->getClientOriginalExtension();
                request()->image->move(public_path('upload/class/'),$fileName);
                $class->image = $fileName;
            }
            $class->save();

            DB::commit();
            return redirect()->route('admin.class.index')->with('message','Class Add Successfully');
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
        $data["class"]= Classe::find($id);
        $data['teachers'] = User::where('type', 2)->where('status', 1)->get();
        return view("Backend.school_management.class.update",$data);
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
        $class = Classe::find($id);
        $class->class_teacher_id = $request->class_teacher_id;
        $class->name = $request->name;
        $class->details = $request->details;
        $class->gargent_policy = $request->gargent_policy;
        $class->daily_class_details = $request->daily_class_details;
        if($request->hasFile('image')){
            @unlink(public_path("upload/class/".$class->image));
            $fileName = rand().time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('upload/class/'),$fileName);
            $class->image = $fileName;
        }
        $class->save();

        DB::commit();
        return redirect()->route('admin.class.index')->with('message','Class Update Successfully');
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

        $class =  Classe::find($request->class_id);
        @unlink(public_path("upload/class/".$class->image));
        $class->delete();
        return back()->with('message','Class Deleted Successfully');
    }


    public function status($id)
    {
        $class = Classe::find($id);
        if($class->status == 0)
        {
            $class->status = 1;
        }elseif($class->status == 1)
        {
            $class->status = 0;
        }
        $class->update();
        return redirect()->route('admin.class.index')->with('message','Class Status Update Successfully');
    }



}
