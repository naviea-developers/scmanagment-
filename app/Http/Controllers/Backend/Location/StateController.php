<?php

namespace App\Http\Controllers\Backend\Location;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Continent;
use App\Models\Country;
use App\Models\Lab;
use App\Models\State;
use App\Models\Thana;
use App\Models\Union;
use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['states'] = State::all();
        $data['continents'] = Continent::all();
        $data['countries'] = Country::all();
        return view('Backend.location.state.manage', $data);
    }


    function ajaxData(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'image',
            2 => 'continent_name',
            3 => 'country_name',
            4 => 'name',
            5 => 'status',
        );
        $totalData = State::count();
        $totalFiltered = $totalData;
 
        $limit = $request->input('length');
        $start = $request->input('start');
        //dd($request->input('order.0.column'));
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $datalist = State::query();
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
                $nestedData['continent_name'] = $data_v->continent->name;
                $nestedData['country_name'] = $data_v->country->name;
                $nestedData['name'] = $data_v->name;
                // $nestedData['code'] = $data_v->code;
              
 
                $nestedData['status'] = '';
                if ($data_v->status == 0) {
                    $nestedData['status'] .= '<a href="'.route('admin.state.status', $data_v->id).'" class="data_status btn btn-sm btn-warning">Inactive</a>';
                } elseif ($data_v->status == 1) {
                    $nestedData['status'] .= '<a href="'.route('admin.state.status', $data_v->id).'" class="data_status btn btn-sm btn-success">Active</a>';
                }
 
                $nestedData['options'] = '<a class="btn btn-primary data_edit" href="'.route('state.edit', $data_v->id).'"><i class="fa fa-edit"></i></a>';
             
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
        $data['continents'] = Continent::all();
        $data['countries'] = Country::all();
        return view('Backend.location.state.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $state = new State();
        $state->continent_id = $request->continent_id;
        $state->country_id = $request->country_id;
        $state->name = $request->name;
        if($request->hasFile('image')){
            $fileName = rand().time().'_state_image.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('upload/states/'),$fileName);
            $state->image = $fileName;
        }
        $state->save();
        return redirect()->back()->with('message', 'State Create Successfully, Thank You.');
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
        $data['state'] = $state= State::find($id);
        $data['continents'] = Continent::all();
        $data['countries'] = Country::where('continent_id', $state->continent->id)->get();
        return view('Backend.location.state.update', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $state = State::find($id);
        $state->name = $request->name;
        $state->continent_id = $request->continent_id;
        $state->country_id = $request->country_id;
        if($request->hasFile('image')){
            @unlink(public_path('upload/states/'.$state->image));
            $fileName = rand().time().'_state_image.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('upload/states/'),$fileName);
            $state->image = $fileName;
        }
        $state->update();
        return redirect()->route('state.index')->with('message', 'State Update Successfully, Thank You.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        $state = State::find($request->state_id);
        @unlink(public_path('upload/states/'.$state->image));
        $state->delete();
        return back()->with('message','State Deleted Successfully');
    }

    public function status_toggle($id)
    {
        $state = State::find($id);
        if($state->status == 0)
        {
            $state->status = 1;
        }elseif($state->status == 1)
        {
            $state->status = 0;
        }
        $state->update();
        return redirect()->back()->with('message', 'Status updated');
    }


      //ajax getCountry
      public function getCountry($id){
        $country = Country::where("continent_id",$id)->get();
        return $country;
	}
      //ajax getState
      public function getState($id){
        $state = State::where("country_id",$id)->get();
        return $state;
	}
      //ajax getCity
      public function getCity($id){
        $state = City::where("state_id",$id)->get();
        return $state;
	}
      //ajax getCity
      public function getThana($id){
        $state = Thana::where("city_id",$id)->get();
        return $state;
	}
      //ajax getCity
    public function getUnion($id){
        $state = Union::where("thana_id",$id)->get();
        return $state;
	}
    public function getWord($id){
        $words = Word::where("union_id",$id)->get();
        return $words;
	}
    public function getLab($id){
        $labs = Lab::where("city_id",$id)->get();
        return $labs;
	}





}
