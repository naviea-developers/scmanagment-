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
        return view('Backend.medical_tourism.continent.index', $data);
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
