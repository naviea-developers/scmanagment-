<?php

namespace App\Http\Controllers\Backend\Madical_Tourism;

use App\Http\Controllers\Controller;
use App\Models\Continent;
use Illuminate\Http\Request;

class ContinentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['continents'] = Continent::all();
        return view('Backend.location.continent.manage', $data);
    }

    function ajaxData(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'image',
            2 => 'name',
            3 => 'status',
        );
        $totalData = Continent::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        //dd($request->input('order.0.column'));
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = Continent::query();
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
                $nestedData['image'] = '<img src="' . $data_v->image_show . '" alt="Image" width="50" height="50">';
                $nestedData['name'] = $data_v->name;
              
 
                $nestedData['status'] = '';
                if ($data_v->status == 0) {
                    $nestedData['status'] .= '<a href="'.route('admin.continent.status', $data_v->id).'" class="data_status btn btn-sm btn-warning">Inactive</a>';
                } elseif ($data_v->status == 1) {
                    $nestedData['status'] .= '<a href="'.route('admin.continent.status', $data_v->id).'" class="data_status btn btn-sm btn-success">Active</a>';
                }
 
                $nestedData['options'] = '<a class="btn btn-primary data_edit" href="'.route('continent.edit', $data_v->id).'"><i class="fa fa-edit"></i></a>';
             
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
    public function create()
    {
        return view('Backend.medical_tourism.continent.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $continent = new Continent();
        $continent->name = $request->name;
        if($request->hasFile('image')){
            $fileName = rand().time().'_continent_image.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('upload/continents/'),$fileName);
            $continent->image = $fileName;
        }
        $continent->save();
        return redirect()->back()->with('message', 'Continent Create Successfully, Thank You.');
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
        $data['continent'] = Continent::find($id);
        return view('Backend.medical_tourism.continent.update', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $continent = Continent::find($id);
        $continent->name = $request->name;
        if($request->hasFile('image')){
            @unlink(public_path('upload/continent/'.$continent->image));
            $fileName = rand().time().'_continent_image.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('upload/continents/'),$fileName);
            $continent->image = $fileName;
        }
        $continent->update();
        return redirect()->route('continent.index')->with('message', 'Continent Update Successfully, Thank You.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        $continent = Continent::find($request->continent_id);
        @unlink(public_path('upload/continents/'.$continent->image));
        $continent->delete();
        return back()->with('message','Continent Deleted Successfully');
    }

    public function status_toggle($id)
    {
        $continent = Continent::find($id);
        if($continent->status == 0)
        {
            $continent->status = 1;
        }elseif($continent->status == 1)
        {
            $continent->status = 0;
        }
        $continent->update();
        return redirect()->back()->with('message', 'Status updated');
    }
}
