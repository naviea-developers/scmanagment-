<?php

namespace App\Http\Controllers\Frontend\School_management\Admission;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\Admission;
use App\Models\Classe;
use App\Models\Continent;
use App\Models\Country;
use App\Models\FeeManagement;
use App\Models\Group;
use App\Models\SchoolSection;
use App\Models\Session;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdmissionController extends Controller
{
    public function studentAdmission()
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
        return view('Frontend.admission.admission', $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'class_id' => 'required',
            'academic_year_id' => 'required',
            'session_id' => 'required',
            'section_id' => 'required',
            'group_id' => 'required',
            'student_name' => 'required',
            'student_email' => 'required',
            'password' => 'required',

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


            if (Auth::check()) {
                $user = Auth::user();
            } else {
                $user = new User();
                $user->name = $request->student_name;
                $user->email = $request->student_email;
                $user->mobile = $request->student_phone;
                $user->type = 1;
                $user->is_admission = 1;
                $user->password = $request->password;
            
                if ($request->hasFile('image')) {
                    $fileName = rand() . time() . '_student_image.' . request()->image->getClientOriginalExtension();
                    request()->image->move(public_path('upload/users/'), $fileName);
                    $user->image = $fileName;
                }
            
                $user->save();
            }

            $admission = New Admission();
            $admission->user_id = $user->id;
            $admission->class_id = $request->class_id ?? 0;
            // $admission->academic_year_id = $request->academic_year_id ?? 0;
            // $admission->session_id = $request->session_id ?? 0;
            // $admission->section_id = $request->section_id ?? 0;
            $admission->group_id = $request->group_id ?? 0;
            $admission->fee_id = $request->fee_id ?? 0;
            $admission->student_name = $request->student_name;
            $admission->dob = $request->dob;
            $admission->student_phone = $request->student_phone;
            $admission->student_email = $request->student_email;
            $admission->student_nid = $request->student_nid;

            $admission->father_name = $request->father_name;
            $admission->father_occupation = $request->father_occupation;
            $admission->father_phone = $request->father_phone;
            $admission->father_nid = $request->father_nid;

            $admission->mother_name = $request->mother_name;
            $admission->mother_occupation = $request->mother_occupation;
            $admission->mother_phone = $request->mother_phone;

            $admission->yearly_income = $request->yearly_income;

            $admission->image = $user->image;


            $admission->present_continent_id = $request->present_continent_id ?? 0;
            $admission->present_country_id = $request->present_country_id ?? 0;
            $admission->present_state_id = $request->present_state_id ?? 0;
            $admission->present_city_id = $request->present_city_id ?? 0;
            $admission->present_address = $request->present_address;

            $admission->permanent_continent_id = $request->permanent_continent_id ?? 0;
            $admission->permanent_country_id = $request->permanent_country_id ?? 0;
            $admission->permanent_state_id = $request->permanent_state_id ?? 0;
            $admission->permanent_city_id = $request->permanent_city_id ?? 0;
            $admission->parmanent_address = $request->parmanent_address;

            $admission->pre_school = $request->pre_school;
            $admission->pre_school_name = $request->pre_school_name;
            $admission->pre_class_id = $request->pre_class_id ?? 0;
            $admission->pre_roll_number = $request->pre_roll_number;
            $admission->pre_school_address = $request->pre_school_address;

            if ($request->hasFile('certificate')) {
                $fileName = rand() . time() . '_student_certificate.' . request()->certificate->getClientOriginalExtension();
                request()->certificate->move(public_path('upload/certificate/'), $fileName);
                $user->certificate = $fileName;
            }

            $admission->save();


            DB::commit();
            return redirect()->back()->with('message','Admission Add Successfully');
            // return redirect()->route('admin.batch.index')->with('message','Batch Add Successfully');
        }catch(\Exception $e){
            DB::rollBack();
            dd($e);
            return back()->with ('error_message', $e->getMessage());
        }
    }
}
