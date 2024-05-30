<?php

namespace App\Http\Controllers\Backend\School_management\Admit;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\Classe;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdmitController extends Controller
{
    public function index()
    {
        $data['classes'] = Classe::all();
        return view("Backend.school_management.admit_card.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['students'] = Admission::where('is_new', 0)->where('status', 1)->get();
        $data['classes'] = Classe::where('status', 1)->get();
        $data['groups'] = Group::where('status', 1)->get();
        return view("Backend.school_management.admit_card.create", $data);
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
        return view("Backend.school_management.admit_card.update",$data);
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
