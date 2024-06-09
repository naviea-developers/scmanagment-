<?php

namespace App\Http\Controllers\Frontend\School_management\Admission;

use App\Http\Controllers\Controller;
use App\Mail\AdmissionEmail;
use App\Models\AcademicYear;
use App\Models\Admission;
use App\Models\AdmissionCertificate;
use App\Models\Certificate;
use App\Models\City;
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
use Mpdf\Mpdf;

class AdmissionController extends Controller
{
    public function studentAdmission()
    {
        $data['classes'] = Classe::where('status', 1)->get();
        $data['academic_years'] = AcademicYear::where('status', 1)->get();
        $data['sessions'] = Session::where('status', 1)->get();
        $data['sections'] = SchoolSection::where('status', 1)->get();
        $data['groups'] = Group::where('status', 1)->get();
        // $data['fees'] = FeeManagement::where('status', 1)->get();
        $data['continents'] = Continent::all();
        $data['countries'] = Country::all();
        $data['states'] = State::all();
        return view('Frontend.admission.admission', $data);
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

            // if (Auth::check()) {
            //     $user = Auth::user();
            // } else {
                $user = new User();
                $user->name = $request->student_name;
                $user->email = $request->student_email;
                $user->mobile = $request->student_phone;
                $user->gender = $request->gender;
                $user->type = 1;
                $user->is_admission = 1;
                $user->password = $request->password;
            
                $user->save();
            // }

            $admission = New Admission();
            $admission->user_id = $user->id;
            $admission->class_id = $request->class_id ?? 0;
            $admission->academic_year_id = $request->academic_year_id ?? 0;
            $admission->session_id = $request->session_id ?? 0;
            // $admission->section_id = $request->section_id ?? 0;
            $admission->group_id = $request->group_id ?? 0;
            $admission->fee_id = $request->fee_id ?? 0;

            // dd($admission);

            $existingStudentsRoll = Admission::where('class_id', $admission->class_id)
                                            ->where('academic_year_id', $admission->academic_year_id)
                                            ->where('session_id', $admission->session_id)
                                            ->orderBy('roll_number', 'desc')
                                            ->first();

            if ($existingStudentsRoll) {
            $roll_number = $existingStudentsRoll->roll_number;
            if ($roll_number === null || $roll_number == 0) {
            $rollNumber = 1;
            } else {
            $rollNumber = $roll_number + 1;
            }
            } else {
            $rollNumber = 1;
            }

            $admission->roll_number = $rollNumber;

            // dd($admission);

            $currentYear = date('Y');
            $studentsId=$currentYear.$request->class_id.str_pad($admission->roll_number, 3, '0', STR_PAD_LEFT); 
            $admission->student_id_number = $studentsId;

            $admission->student_name = $request->student_name;
            $admission->dob = $request->dob;
            $admission->blood_group = $request->blood_group;
            $admission->student_phone = $request->student_phone;
            $admission->student_email = $request->student_email;
            $admission->student_nid = $request->student_nid;
            $admission->gender = $request->gender;

            $admission->father_name = $request->father_name;
            $admission->father_occupation = $request->father_occupation;
            $admission->father_phone = $request->father_phone;
            $admission->father_nid = $request->father_nid;

            $admission->mother_name = $request->mother_name;
            $admission->mother_occupation = $request->mother_occupation;
            $admission->mother_phone = $request->mother_phone;

            $admission->yearly_income = $request->yearly_income;

            if ($request->hasFile('image')) {
                $fileName = rand() . time() . '_student_image.' . request()->image->getClientOriginalExtension();
                request()->image->move(public_path('upload/admission/'), $fileName);
                $admission->image = $fileName;
            }


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

            $admission->is_new = $request->is_new ?? 0;

            $admission->pre_school = $request->pre_school ?? 0;
            $admission->pre_school_name = $request->pre_school_name;
            $admission->pre_class_id = $request->pre_class_id ?? 0;
            $admission->pre_roll_number = $request->pre_roll_number;
            $admission->pre_school_address = $request->pre_school_address;

            $admission->save();

            // Generate a unique ID in the format TYYYYMMDD(user_id)

            $user->unique_id = $admission->student_id_number;
            $user->save();










        //add certificate file
        if($request->certificates_file){
            foreach( $request->certificates_file as $k=>$value){
                $certificates = new AdmissionCertificate();
                $certificates->user_id = $user->id;
                $certificates->admission_id = $admission->id;
                $certificates->certificates_name = $request->certificates_name[$k];
                $filename=$request->certificates_name[$k].'-'.$user->name.'_certificat_file'.'.'.$value->getClientOriginalExtension();
                $value->move(public_path('upload/certificates/'), $filename);
                $certificates->certificates_file=$filename;
                $certificates->extension = $value->getClientOriginalExtension();
                $certificates->save();
            }
        }



            //email notification start
            //admin
            // $admin = User::where('type', 0)->first();
            // $data2['order'] = $order;
            // $details2['email'] = $admin->email;
            // $details2['send_item']=new Admission($data2);
            // dispatch(new \App\Jobs\SendEmailJob($details2));

            //user
            $data['email'] = $user->email;
            $data['password'] = $request->password;
            $details['email'] = $user->email;
            $details['send_item']=new AdmissionEmail($data);
            dispatch(new \App\Jobs\SendEmailJob($details));
            ///email notification end







            DB::commit();
            // return redirect()->back()->with('message','Admission Add Successfully');
            return redirect()->route('frontend.student_admission.details', $admission->id)->with('message','Admission Form Submited Successfully');
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


    public function edit($id)
    {
        $data['admission'] = $class = Admission::find($id);
        $data['classes'] = Classe::where('status', 1)->get();
        $data['academic_years'] = AcademicYear::where('status', 1)->get();
        $data['sessions'] = Session::where('status', 1)->get();
        $data['sections'] = SchoolSection::where('status', 1)->get();
        $data['groups'] = Group::where('status', 1)->get();
        // $data['fees'] = FeeManagement::where('status', 1)->get();
        $data['fees'] = FeeManagement::where('class_id', $class->class_id)
                                        ->where('status', 1)
                                        ->whereHas('fee', function($query) {
                                            $query->where('is_constant', 2);
                                        })
                                        ->get();
        $data['continents'] = Continent::all();
        $data['countries'] = Country::all();
        $data['states'] = State::all();
        $data['cities'] = City::all();
        return view('Frontend.admission.update_admission', $data);
    }


    public function update(Request $request, $id)
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

            $admission =$user = Admission::find($id);
            $admission->user_id = $user->user_id;
            $admission->class_id = $request->class_id ?? 0;
            $admission->academic_year_id = $request->academic_year_id ?? 0;
            $admission->session_id = $request->session_id ?? 0;
            // $admission->section_id = $request->section_id ?? 0;
            $admission->group_id = $request->group_id ?? 0;
            $admission->fee_id = $request->fee_id ?? 0;
            $admission->student_name = $request->student_name;
            $admission->dob = $request->dob;
            $admission->blood_group = $request->blood_group;
            $admission->student_phone = $request->student_phone;
            $admission->student_email = $request->student_email;
            $admission->student_nid = $request->student_nid;
            $admission->gender = $request->gender;

            $admission->father_name = $request->father_name;
            $admission->father_occupation = $request->father_occupation;
            $admission->father_phone = $request->father_phone;
            $admission->father_nid = $request->father_nid;

            $admission->mother_name = $request->mother_name;
            $admission->mother_occupation = $request->mother_occupation;
            $admission->mother_phone = $request->mother_phone;

            $admission->yearly_income = $request->yearly_income;

            if ($request->hasFile('image')) {
                $fileName = rand() . time() . '_student_image.' . request()->image->getClientOriginalExtension();
                request()->image->move(public_path('upload/admission/'), $fileName);
                $admission->image = $fileName;
            }

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

            $admission->save();

            $user = User::find($admission->user_id);
            $user->name = $request->student_name;
            $user->email = $request->student_email;
            $user->mobile = $request->student_phone;
            $user->dob = $request->dob;
            $user->gender = $request->gender;
            $user->nid = $request->student_nid;
            $user->save();



             //add certificate file
        if($request->certificates_file){
            foreach( $request->certificates_file as $k=>$value){
                $certificates = new AdmissionCertificate();
                $certificates->user_id = $user->id;
                $certificates->admission_id = $admission->id;
                $certificates->certificates_name = $request->certificates_name[$k];
                $filename=$request->certificates_name[$k].'-'.$user->name.'_certificat_file'.'.'.$value->getClientOriginalExtension();
                $value->move(public_path('upload/certificates/'), $filename);
                $certificates->certificates_file=$filename;
                $certificates->extension = $value->getClientOriginalExtension();
                $certificates->save();
            }
        }

         //Update certificate file
        if($request->old_certificates_name){
            foreach($request->old_certificates_name as $k => $value){
                $certificates = AdmissionCertificate::find($k);
                $certificates->user_id = $user->id;
                $certificates->admission_id = $admission->id;
                $certificates->certificates_name = $value;

                if(isset($request->file('old_certificates_file')[$k])){
                    @unlink(public_path('upload/certificates/'.$certificates->certificates_file));
                    $filename=$request->old_certificates_name[$k].'-'.$user->name.'_certificat_file'.'.'.$request->file('old_certificates_file')[$k]->getClientOriginalExtension();
                    $request->file('old_certificates_file')[$k]->move(public_path('upload/certificates/'), $filename);
                    $certificates->certificates_file=$filename;
                    $certificates->extension = $request->file('old_certificates_file')[$k]->getClientOriginalExtension();
                }

                $certificates->update();
            }
        }

        //delete certificate file
        if($request->delete_certificates_file){
            foreach($request->delete_certificates_file as $k => $value){
                $audio = AdmissionCertificate::find($value);
                @unlink(public_path('upload/certificates/'.$audio->certificates_file));
                $audio->delete();

            }
        }



            DB::commit();
            // return redirect()->back()->with('message','Admission Add Successfully');
            return redirect()->route('frontend.student_admission.details', $admission->id)->with('message','Admission Form Updated Successfully');
        }catch(\Exception $e){
            DB::rollBack();
            dd($e);
            return back()->with ('error_message', $e->getMessage());
        }
    }

    public function print($id)
    {
        $data['details'] = Admission::find($id);
        return view('Frontend.admission.admission_print', $data);
    }


    public function download($id)
    {
        $data['details'] = Admission::find($id);
        $html = view('Frontend.admission.admission_download', $data);
        $mpdf = new Mpdf([
            'mode' => 'UTF-8',
            'margin_left' => 5,
            'margin_right' => 5,
            'margin_top' => 5,
            'margin_bottom' => 0,
            'margin_header' => 0,
            'margin_footer' => 0,
        ]);

        //For Multilanguage Start
        $mpdf->autoScriptToLang = true;
        $mpdf->baseScript = 1;
        $mpdf->autoLangToFont = true;
        $mpdf->autoVietnamese = true;
        $mpdf->autoArabic = true;

        //For Multilanguage End
        $mpdf->setAutoTopMargin = 'stretch';
        $mpdf->setAutoBottomMargin = 'stretch';
        $mpdf->writeHTML($html);
        $name = 'admission_download_form' . date('Y-m-d i:h:s');
        $mpdf->Output($name.'.pdf', 'D');
    }

    


}
