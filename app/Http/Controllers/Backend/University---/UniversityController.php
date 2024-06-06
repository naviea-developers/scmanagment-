<?php

namespace App\Http\Controllers\Backend\University;

use App\Http\Controllers\Controller;
use App\Models\AskQuestion;
use App\Models\City;
use App\Models\Continent;
use App\Models\Country;
use App\Models\State;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UniversityController extends Controller
{
    public function index()
    {
        $data['universities'] = University::orderBy('id', 'desc')->get();
        return view("Backend.university.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['continents'] = Continent::all();
        $data['countries'] = Country::all();
        $data['states'] = State::all();
        return view("Backend.university.create",$data);
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
            $university = New University();
            $university->name = $request->name;
            $university->continent_id = $request->continent_id;
            $university->country_id = $request->country_id;
            $university->state_id = $request->state_id;
            $university->city_id = $request->city_id;
            $university->address = $request->address;
            $university->about = $request->about;
            $university->admissions_process = $request->admissions_process;
            $university->accommodation = $request->accommodation;

            if($request->hasFile('image')){
                $fileName = rand().time().'_university_logo.'.request()->image->getClientOriginalExtension();
                request()->image->move(public_path('upload/university/'),$fileName);
                $university->image = $fileName;
            }
            if($request->hasFile('banner_image')){
                $fileName = rand().time().'_university_banner_image.'.request()->banner_image->getClientOriginalExtension();
                request()->banner_image->move(public_path('upload/university/'),$fileName);
                $university->banner_image = $fileName;
            }
            $university->save();



            DB::commit();
            return redirect()->route('admin.university.index')->with('message','University Add Successfully');
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
        $data["university"]= $university = University::find($id);
        $data['continents'] = Continent::all();
        $data['cities'] = City::where('state_id', @$university->state->id)->get();
        $data['states'] = State::where('country_id', @$university->country->id)->get();
        $data['countries'] = Country::where('continent_id', @$university->continent->id)->get();
        $data["university"]=$university;
        return view("Backend.university.update",$data);
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
        $university = University::find($id);
        $university->name = $request->name;
        $university->continent_id = $request->continent_id;
        $university->country_id = $request->country_id;
        $university->state_id = $request->state_id;
        $university->city_id = $request->city_id;
        $university->address = $request->address;
        $university->about = $request->about;
        $university->admissions_process = $request->admissions_process;
        $university->accommodation = $request->accommodation;

        if($request->hasFile('image')){
            @unlink(public_path('upload/university/'.$university->image));
            $fileName = rand().time().'university_logo.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('upload/university/'),$fileName);
            $university->image = $fileName;
        }
        if($request->hasFile('banner_image')){
            @unlink(public_path('upload/university/'.$university->banner_image));
            $fileName = rand().time().'university_banner_image.'.request()->banner_image->getClientOriginalExtension();
            request()->banner_image->move(public_path('upload/university/'),$fileName);
            $university->banner_image = $fileName;
        }
        $university->save();



        DB::commit();
        return redirect()->route('admin.university.index')->with('message','University Update Successfully');
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
        $university =  University::find($request->university_id);
        @unlink(public_path('upload/university/'.$university->image));
        @unlink(public_path('upload/university/'.$university->banner_image));
        $university->delete();
        return back()->with('message','University Deleted Successfully');
    }

   

    public function status($id)
     {
         $university = University::find($id);
         if($university->status == 0)
         {
             $university->status = 1;
         }elseif($university->status == 1)
         {
             $university->status = 0;
         }
         $university->update();
         return redirect()->route('admin.university.index');
     }

     public function universityFAQMAnage()
     {
        $data['faq_questions'] = AskQuestion::where('type', 'university')->orderBy('id', 'desc')->get();
        return view('Backend.university.faq_question', $data);
     }
     public function universityFAQanswer(Request $request, $id)
     {
       $ans = AskQuestion::find($id);
       $ans->answer = $request->answer;
       $ans->save();
       
       return redirect()->back()->with('messahe', 'Answer added successfully, Thank You.');
     }
     public function universityFAQanswerDelete(Request $request)
     {
        $qus = AskQuestion::find($request->university_faq_answer_id);
        $qus->delete();
        return redirect()->back()->with('message', 'University FAQ delete successfully. Thank You.');
     }
}
