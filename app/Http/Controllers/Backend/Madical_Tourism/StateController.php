<?php

namespace App\Http\Controllers\Backend\Madical_Tourism;

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

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['states'] = State::all();
        return view('Backend.medical_tourism.state.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['continents'] = Continent::all();
        $data['countries'] = Country::all();
        return view('Backend.medical_tourism.state.create', $data);
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
        return view('Backend.medical_tourism.state.update', $data);
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
