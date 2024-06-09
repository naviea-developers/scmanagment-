<?php

namespace App\Http\Controllers\Backend\School_management\Alumni;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Mail\UserEmail;
use App\Models\Classe;
use App\Models\FeeManagement;
use App\Models\Session;
use App\Models\User;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function index()
    {
        // $data['alumnis'] = Alumni::all();
        $data['alumnis'] = User::where('is_alumni', 1)->where('type', 9)->get();
        return view('Backend.school_management.alumni.index', $data);
    }
    public function create()
    {
        $data['classes'] = Classe::where('status', 1)->get();
        $data['sessions'] = Session::where('status', 1)->get();
        $data['fees'] = FeeManagement::where('status', 1)->get();
        return view('Backend.school_management.alumni.create', $data);
    }
    public function store(Request $request)
    {
        $alumni = new User();
        $alumni->session_id = $request->session_id ?? 0;
        $alumni->class_id = $request->class_id ?? 0;
        $alumni->reg_fee_id = $request->reg_fee_id ?? 0;
        $alumni->roll_number = $request->roll_number;
        $alumni->name = $request->name;
        $alumni->mobile = $request->mobile;
        $alumni->email = $request->email;
        $alumni->designation = $request->designation;
        $alumni->company_name = $request->company_name;
        $alumni->address = $request->address;
        $alumni->description = $request->description;
        $alumni->type = 9;
        $alumni->is_alumni = 1;
        $alumni->password = 12345678;
        //social links
        $alumni->facebook_id = $request->facebook_id;
        $alumni->twitter_id = $request->twitter_id;
        $alumni->google_id = $request->google_id;
        $alumni->linkedin_id = $request->linkedin_id;

        if($request->hasFile('image')){
            $fileName = rand().time().'_image.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('upload/users/'),$fileName);
            $alumni->image = $fileName;
        }
        $alumni->save();

         // Generate a unique ID in the format TYYYYMMDD(user_id)
         $uniqueId = 'A' . date('Y') . $alumni->id;
         $alumni->unique_id = $uniqueId;
         $alumni->save();


         //user
         $data['name'] = $alumni->name;
         $data['email'] = $alumni->email;
         $data['password'] = 12345678;
         $details['email'] = $alumni->email;
         $details['send_item']= new UserEmail($data);
         dispatch(new \App\Jobs\SendEmailJob($details));
         ///email notification end


        return redirect()->route('admin.alumni.index')->with('message', 'Alumni Added Successfully');
    }
    // public function edit($id)
    // {
    //     $data['alumni'] = $class = User::find($id);
    //     // $data['alumni'] = $class = Alumni::find($id);
    //     $data['classes'] = Classe::where('status', 1)->get();
    //     $data['sessions'] = Session::where('status', 1)->get();
    //     $data['fees'] = FeeManagement::where('class_id', $class->class_id)->where('status', 1)->get();
    //     return view('Backend.school_management.alumni.update', $data);
    // }


    public function edit($id)
{
    $data['alumni'] = $class = User::find($id);
    // $data['alumni'] = $class = Alumni::find($id);
    $data['classes'] = Classe::where('status', 1)->get();
    $data['sessions'] = Session::where('status', 1)->get();
    $data['fees'] = FeeManagement::where('class_id', $class->class_id)
                                  ->where('status', 1)
                                  ->whereHas('fee', function($query) {
                                      $query->where('is_constant', 1);
                                  })
                                  ->get();
    return view('Backend.school_management.alumni.update', $data);
}


    public function update(Request $request, $id)
    {
        $alumni = User::find($id);
        $alumni->session_id = $request->session_id ?? 0;
        $alumni->class_id = $request->class_id ?? 0;
        $alumni->reg_fee_id = $request->reg_fee_id ?? 0;
        $alumni->roll_number = $request->roll_number;
        $alumni->name = $request->name;
        $alumni->mobile = $request->mobile;
        $alumni->email = $request->email;
        $alumni->designation = $request->designation;
        $alumni->company_name = $request->company_name;
        $alumni->address = $request->address;
        $alumni->description = $request->description;
        $alumni->is_alumni = $request->is_alumni;
        //social links
        $alumni->facebook_id = $request->facebook_id;
        $alumni->twitter_id = $request->twitter_id;
        $alumni->google_id = $request->google_id;
        $alumni->linkedin_id = $request->linkedin_id;

        if($request->hasFile('image')){
            @unlink(public_path("upload/users/".$alumni->image));
            $fileName = rand().time().'_image.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('upload/users/'),$fileName);
            $alumni->image = $fileName;
        }
        $alumni->save();
        return redirect()->route('admin.alumni.index')->with('message', 'Alumni Info Update Successfully');
    }

    public function destroy(Request $request)
    {
        $alumni =  User::find($request->alumni_id);
        @unlink(public_path("upload/users/".$alumni->image));
        $alumni->delete();
        return back()->with('message','Alumni Info Deleted Successfully');
    }


    public function status($id)
    {
        $alumni = User::find($id);
        if($alumni->status == 0)
        {
            $alumni->status = 1;
        }elseif($alumni->status == 1)
        {
            $alumni->status = 0;
        }
        $alumni->update();
        return redirect()->route('admin.alumni.index')->with('message', 'Status updated.');
    }

    //Requested Alumni
    public function requestedAlumni()
    {
        $data['alumnis'] = User::where('is_alumni', 0)->where('type', 9)->get();
        return view('Backend.school_management.alumni.request_alumni', $data);
    }
    public function alumniStatus($id)
    {
        $alumni = User::find($id);
        if($alumni->is_alumni == 0)
        {
            $alumni->is_alumni = 1;
        }elseif($alumni->is_alumni == 1)
        {
            $alumni->is_alumni = 0;
        }
        $alumni->update();
        return redirect()->route('admin.alumni.index')->with('message', 'Status updated.');
    }

    function changePassword(Request $request){
        $alumni =  User::find($request->user_id);
        $alumni->password = $request->password;
        $alumni->save();

        //user
        $data['name'] = $alumni->name;
        $data['email'] = $alumni->email;
        $data['password'] = $request->password;
        $details['email'] = $alumni->email;
        $details['send_item']= new UserEmail($data);
        dispatch(new \App\Jobs\SendEmailJob($details));
        ///email notification end

        return redirect()->back()->with('message','Alumni Profile Password Changed Successfully');
    }
   
}
