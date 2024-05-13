<?php

namespace App\Http\Controllers\Backend\School_management\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AcademicYear;
use App\Models\Admission;
use App\Models\AdmissionCertificate;
use App\Models\Certificate;
use App\Models\Classe;
use App\Models\Student;
use App\Models\Continent;
use App\Models\Country;
use App\Models\FeeManagement;
use App\Models\Group;
use App\Models\SchoolSection;
use App\Models\Session;
use App\Models\State;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function create()
    {
        $data['classes'] = Classe::where('status', 1)->get();
        $data['academic_years'] = AcademicYear::where('status', 1)->get();
        $data['sessions'] = Session::where('status', 1)->get();
        $data['sections'] = SchoolSection::where('status', 1)->get();
        $data['groups'] = Group::where('status', 1)->get();
        $data['fees'] = FeeManagement::where('status', 1)->get();
        $data['continents'] = Continent::all();
        $data['countries'] = Country::all();
        $data['states'] = State::all();
        return view('Backend.school_management.student.create', $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            // 'class_id' => 'required',
            // 'academic_year_id' => 'required',
            // 'session_id' => 'required',
            // 'section_id' => 'required',
            // 'group_id' => 'required',
            // 'student_name' => 'required',
            // 'student_email' => 'required',
            // // 'password' => 'required',

        ]);
        try{
            DB::beginTransaction();

            // $user = New User();
            // $user->name = $request->student_name;
            // $user->email = $request->student_email;
            // $user->mobile = $request->student_phone;
            // $user->type = 1;
            // $user->is_admission = 1;
            // $user->password = $request->password;
            // if($request->hasFile('image')){
            //     $fileName = rand().time().'_student_image.'.request()->image->getClientOriginalExtension();
            //     request()->image->move(public_path('upload/users/'),$fileName);
            //     $user->image = $fileName;
            // }
            // $user->save();


            // if (Auth::check()) {
            //     $user = Auth::user();
            // } else {
            //     $user = new User();
            //     $user->name = $request->student_name;
            //     $user->email = $request->student_email;
            //     $user->mobile = $request->student_phone;
            //     $user->type = 1;
            //     $user->is_admission = 1;
            //     $user->password = $request->password;
            
            //     $user->save();
            // }

           $student = New Student();
            //$student->user_id = $user->id;
           $student->class_id = $request->class_id ?? 0;
            //$student->academic_year_id = $request->academic_year_id ?? 0;
            //$student->session_id = $request->session_id ?? 0;
            //$student->section_id = $request->section_id ?? 0;
           $student->group_id = $request->group_id ?? 0;
           $student->fee_id = $request->fee_id ?? 0;
           $student->student_name = $request->student_name;
           $student->dob = $request->dob;
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

            if ($request->hasFile('image')) {
                $fileName = rand() . time() . '_student_image.' . request()->image->getClientOriginalExtension();
                request()->image->move(public_path('upload/admission/'), $fileName);
               $student->image = $fileName;
            }

            //$student->image = $user->image;

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

           $student->pre_school = $request->pre_school;
           $student->pre_school_name = $request->pre_school_name;
           $student->pre_class_id = $request->pre_class_id ?? 0;
           $student->pre_roll_number = $request->pre_roll_number;
           $student->pre_school_address = $request->pre_school_address;

           $student->save();



        //add certificate file
        if($request->certificates_file){
            foreach( $request->certificates_file as $k=>$value){
                $certificates = new AdmissionCertificate();
                $certificates->user_id = $user->id;
                $certificates->admission_id =$student->id;
                $certificates->certificates_name = $request->certificates_name[$k];
                $filename=$request->certificates_name[$k].'-'.$user->name.'_certificat_file'.'.'.$value->getClientOriginalExtension();
                $value->move(public_path('upload/certificates/'), $filename);
                $certificates->certificates_file=$filename;
                $certificates->extension = $value->getClientOriginalExtension();
                $certificates->save();
            }
        }

         //Update certificate file
        // if($request->old_certificates_name){
        //     foreach($request->old_certificates_name as $k => $value){
        //         $certificates = Certificate::find($k);
        //         $certificates->user_id = $user->id;
        //         $certificates->admission_id =$student->id;
        //         $certificates->certificates_name = $value;

        //         if(isset($request->file('old_certificates_file')[$k])){
        //             @unlink(public_path('upload/certificates/'.$certificates->certificates_file));
        //             $filename=$request->old_certificates_name[$k].'-'.$user->name.'_certificat_file'.'.'.$request->file('old_certificates_file')[$k]->getClientOriginalExtension();
        //             $request->file('old_certificates_file')[$k]->move(public_path('upload/certificates/'), $filename);
        //             $certificates->certificates_file=$filename;
        //             $certificates->extension = $request->file('old_certificates_file')[$k]->getClientOriginalExtension();
        //         }

        //         $certificates->update();
        //     }
        // }

        //delete certificate file
        // if($request->delete_certificates_file){
        //     foreach($request->delete_certificates_file as $k => $value){
        //         $audio = Certificate::find($value);
        //         @unlink(public_path('upload/certificates/'.$audio->certificates_file));
        //         $audio->delete();

        //     }
        // }



            DB::commit();
            return redirect()->back()->with('message','Admission Add Successfully');
            // return redirect()->route('admin.batch.index')->with('message','Batch Add Successfully');
        }catch(\Exception $e){
            DB::rollBack();
            dd($e);
            return back()->with ('error_message', $e->getMessage());
        }
    }

    public function details($id)
    {
        $data['details'] = Admission::find($id);
        return view('Frontend.admission.admission_details', $data);
    }
}
