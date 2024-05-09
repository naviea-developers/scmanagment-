<?php

namespace App\Http\Controllers\Backend\Student_Appliction;

use App\Http\Controllers\Controller;
use App\Models\ApplicationDocument;
use App\Models\ApplicationEducation;
use App\Models\Country;
use App\Models\StudentApplication;
use Illuminate\Http\Request;

class StudentApplictionController extends Controller
{
    public function index()
    {
        $data['s_applictions'] = StudentApplication::where('status','!=', 0)->orderBy('id', 'desc')->get();
        return view('Backend.student_appliction.index', $data);
    }
    public function edit($id)
    {
        $data['s_appliction'] = StudentApplication::find($id);
        $data['countries'] = Country::all();
        return view('Backend.student_appliction.edit_personal_info', $data);
    }
    public function update(Request $request, $id)
    {
        $edit_app = StudentApplication::find($id);
        $edit_app->first_name = $request->first_name;
        $edit_app->middle_name = $request->middle_name;
        $edit_app->last_name = $request->last_name;
        $edit_app->chinese_name = $request->chinese_name;
        $edit_app->phone = $request->phone;
        $edit_app->email = $request->email;
        $edit_app->dob = $request->dob;
        $edit_app->birth_place = $request->birth_place;
        $edit_app->passport_number = $request->passport_number;
        $edit_app->passport_exipre_date = $request->passport_exipre_date;
        $edit_app->nationality = $request->nationality;
        $edit_app->religion = $request->religion;
        $edit_app->gender = $request->gender;
        $edit_app->maritial_status = $request->maritial_status;
        $edit_app->in_chaina = $request->in_chaina;
        $edit_app->in_alcoholic = $request->in_alcoholic;
        $edit_app->hobby = $request->hobby;
        $edit_app->native_language = $request->native_language;
        $edit_app->english_level = $request->english_level;
        $edit_app->chinese_level = $request->chinese_level;
        $edit_app->home_country = $request->home_country;
        $edit_app->home_city = $request->home_city;
        $edit_app->home_district = $request->home_district;
        $edit_app->home_street = $request->home_street;
        $edit_app->home_zipcode = $request->home_zipcode;
        $edit_app->home_contact_name = $request->home_contact_name;
        $edit_app->home_contact_phone = $request->home_contact_phone;
        $edit_app->current_country = $request->current_country;
        $edit_app->current_city = $request->current_city;
        $edit_app->current_district = $request->current_district;
        $edit_app->current_street = $request->current_street;
        $edit_app->current_zipcode = $request->current_zipcode;
        $edit_app->current_contact_name = $request->current_contact_name;
        $edit_app->current_contact_phone = $request->current_contact_phone;
        $edit_app->update();

        // dd($request->school);
        // foreach($request->school as $k => $value) {
        //     dd($k);
        //     $education = ApplicationEducation::find($k);
        //     dd($education);
        //     if ($education) {
        //         $education->application_id = $edit_app->id;
        //         $education->school = $value;
        //         $education->major = $request->major[$k];
        //         $education->start_date = $request->start_date[$k];
        //         $education->end_date = $request->end_date[$k];
        //         $education->gpa_type = $request->gpa_type[$k];
        //         $education->update();
        //     }
        // }

        return redirect()->back()->with('message', 'Information update successfully, Thank You.');
    }
    public function editFamily($id)
    {
        $data['s_appliction'] = StudentApplication::find($id);
        return view('Backend.student_appliction.edit_family_info', $data);
    }
    public function familyUpdate(Request $request, $id)
    {
        $edit_app = StudentApplication::find($id);
        $edit_app->father_name = $request->father_name;
        $edit_app->father_nationlity = $request->father_nationlity;
        $edit_app->father_phone = $request->father_phone;
        $edit_app->father_email = $request->father_email;
        $edit_app->father_workplace = $request->father_workplace;
        $edit_app->father_position = $request->father_position;
        $edit_app->mother_name = $request->mother_name;
        $edit_app->mother_nationlity = $request->mother_nationlity;
        $edit_app->mother_phone = $request->mother_phone;
        $edit_app->mother_email = $request->mother_email;
        $edit_app->mother_workplace = $request->mother_workplace;
        $edit_app->mother_position = $request->mother_position;
        $edit_app->guarantor_relationship = $request->guarantor_relationship;
        $edit_app->guarantor_name = $request->guarantor_name;
        $edit_app->guarantor_address = $request->guarantor_address;
        $edit_app->guarantor_phone = $request->guarantor_phone;
        $edit_app->guarantor_email = $request->guarantor_email;
        $edit_app->guarantor_workplace = $request->guarantor_workplace;
        $edit_app->guarantor_work_address = $request->guarantor_work_address;
        $edit_app->study_fund = $request->study_fund;
        $edit_app->emergency_contact_name = $request->emergency_contact_name;
        $edit_app->emergency_contact_phone = $request->emergency_contact_phone;
        $edit_app->emergency_contact_email = $request->emergency_contact_email;
        $edit_app->emergency_contact_address = $request->emergency_contact_address;
        $edit_app->update();
        return redirect()->back()->with('message', 'Information update successfully, Thank You.');
    }
    public function editProgramInfo($id)
    {
        $data['s_appliction'] = StudentApplication::find($id);
        return view('Backend.student_appliction.edit_program_info', $data);
    }
    public function editDocument($id)
    {
        $data['s_appliction'] = StudentApplication::find($id);
        return view('Backend.student_appliction.edit_document_info', $data);
    }

    public function details($id)
    {
        $data['s_appliction'] = StudentApplication::find($id);
        return view('Backend.student_appliction.application_details', $data);
    }


    public function applicationInvoice($id)
    {
        // dd('hi');
        $data['orderdetails'] = StudentApplication::find($id);
        return view('Backend.student_appliction.invoice', $data);
    }
    public function delete(Request $request)
    {
        $s_applictions = StudentApplication::find($request->s_appliction_id);

        foreach($s_applictions->carts as $cart){
            $cart->delete();
        }
        foreach($s_applictions->educations as $education){
            $education->delete();
        }
        foreach($s_applictions->work_experiences as $work_experience){
            $work_experience->delete();
        }
        foreach($s_applictions->documents as $document){
            @unlink(public_path('upload/application/{$request->s_appliction_id}/'.$document->document_file));
            $document->delete();
        }

        foreach($s_applictions->notifications as $notification){
            $notification->delete();
        }
        $s_applictions->delete();
        return redirect()->back()->with('message', 'Student Appliction Deleted Successfully. Thank You.');
    }


    public function applicationFileDownload($id)
    {
        $file = ApplicationDocument::find($id);
    
        if (!$file) {
            abort(404, 'File not found');
        }
    
        $filePath = public_path("upload/application/{$file->application_id}/{$file->document_file}");
    
        if (!file_exists($filePath)) {
            abort(404, 'File not found');
        }
    
        return response()->download($filePath);
    }

    function applicationOrderPrint($id){
        $data['orderdetails'] = StudentApplication::find($id);
        return view('Backend.student_appliction.print', $data);
    }
}
