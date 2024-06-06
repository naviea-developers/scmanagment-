<?php

namespace App\Http\Controllers\Backend\School_management\Student;

use App\Http\Controllers\Controller;
use App\Mail\StudentProfileUpdateEmailFromAdmin;
use App\Models\Admission;
use App\Models\StudentInfoUpdate;
use App\Models\Continent;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;

class StudentInfoUpdateController extends Controller
{
    public function index()
    {
        $data['students'] = StudentInfoUpdate::all();
        return view('Backend.school_management.student.update_student.index', $data);
    }
    public function edit($id)
    {
        $data['student'] = StudentInfoUpdate::find($id);
        $data['continents'] = Continent::where('status', 1)->get();
        $data['countries'] = Country::where('status', 1)->get();
        $data['states'] = State::where('status', 1)->get();
        $data['cities'] = City::where('status', 1)->get();
        return view('Backend.school_management.student.update_student.update', $data);
    }

    public function update(Request $request, $id)
    {

        $data = StudentInfoUpdate::find($id);
        $data->status = 1;
        $data->save();

        $user = $data->user_id;

        $student_id = Admission::where('user_id',$user)->pluck('id')->first();
        $user_id = User::where('id',$user)->pluck('id')->first();

        $user = User::find($user_id);
        $user->name = $request->student_name;
        $user->email = $request->student_email;
        $user->mobile = $request->student_phone;
        $user->nid = $request->student_nid;
        $user->dob = $request->dob;
        $user->address = $request->present_address;
        $user->save();

        $student = Admission::find($student_id);
        $student->student_name = $request->student_name;
        $student->dob = $request->dob;
        $student->blood_group = $request->blood_group;
        $student->student_phone = $request->student_phone;
        $student->student_email = $request->student_email;
        $student->student_nid = $request->student_nid;

        $student->father_name = $request->father_name;
        $student->father_occupation = $request->father_occupation;
        $student->father_phone = $request->father_phone;
        $student->father_nid = $request->father_nid;

        $student->mother_name = $request->mother_name;
        $student->mother_occupation = $request->mother_occupation;
        $student->mother_phone = $request->mother_phone;

        $student->yearly_income = $request->yearly_income;



        if($data->image) {
            @unlink(public_path('upload/admission/'.$student->image));
            $student->image = $data->image;
        }

        $student->present_continent_id = $request->present_continent_id ?? 0;
        $student->present_country_id = $request->present_country_id ?? 0;
        $student->present_state_id = $request->present_state_id ?? 0;
        $student->present_city_id = $request->present_city_id ?? 0;
        $student->present_address = $request->present_address;

        $student->permanent_continent_id = $request->permanent_continent_id ?? 0;
        $student->permanent_country_id = $request->permanent_country_id ?? 0;
        $student->permanent_state_id = $request->permanent_state_id ?? 0;
        $student->permanent_city_id = $request->permanent_city_id ?? 0;
        $student->parmanent_address = $request->parmanent_address;
        $student->status = 1;
        $student->update();

        //user
        $data['name'] = $user->name;
        $details['email'] = $user->email;
        $details['send_item']=new StudentProfileUpdateEmailFromAdmin($data);
        dispatch(new \App\Jobs\SendEmailJob($details));
        ///email notification end


        return redirect()->route('admin.student_info_update.index')->with('message', 'Info Update Successfully. Thnak you.');
        // dd($student);
    }




    public function destroy(Request $request)
    {
        $student =  StudentInfoUpdate::find($request->student_id);
        // @unlink(public_path('upload/admission/'.$student->image));
        $student->delete();
        return back()->with('message','Admin Deleted Successfully');
    }
}
