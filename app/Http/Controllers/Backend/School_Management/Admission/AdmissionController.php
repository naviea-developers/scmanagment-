<?php

namespace App\Http\Controllers\Backend\School_management\Admission;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\Admission;
use App\Models\AdmissionCertificate;
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
use Illuminate\Support\Facades\DB;

class AdmissionController extends Controller
{
    public function index()
    { 
        $data['admissions'] = Admission::all();
        return view('Backend.school_management.admission.index', $data);
    }
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
        return view('Backend.school_management.admission.create', $data);
    }
    public function store(Request $request)
    {
        $request->validate([
            // 'class_id' => 'required',
            // 'academic_year_id' => 'required',
            // 'session_id' => 'required',
            // 'section_id' => 'required',
            // 'group_id' => 'required',
            // 'student_name' => 'required',
            // 'student_email' => 'required',
            // 'password' => 'required',

        ]);
        try{
            DB::beginTransaction();

            $user = New User();
            $user->name = $request->student_name;
            $user->email = $request->student_email;
            $user->mobile = $request->student_phone;
            $user->type = 1;
            $user->is_admission = 1;
            $user->password = $request->password;
            if($request->hasFile('image')){
                $fileName = rand().time().'_student_image.'.request()->image->getClientOriginalExtension();
                request()->image->move(public_path('upload/users/'),$fileName);
                $user->image = $fileName;
            }
            $user->save();

            $admission = New Admission();
            $admission->user_id = $user->id;
            $admission->class_id = $request->class_id;
            $admission->academic_year_id = $request->academic_year_id;
            $admission->session_id = $request->session_id;
            $admission->section_id = $request->section_id;
            $admission->group_id = $request->group_id;
            $admission->student_name = $request->student_name;
            $admission->age = $request->age;
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
            $admission->present_address = $request->present_address;
            $admission->parmanent_address = $request->parmanent_address;
            $admission->image = $user->image;

            $admission->save();


            DB::commit();
            return redirect()->route('admin.admission.index')->with('message','Admission Add Successfully');
            // return redirect()->route('admin.batch.index')->with('message','Batch Add Successfully');
        }catch(\Exception $e){
            DB::rollBack();
            dd($e);
            return back()->with ('error_message', $e->getMessage());
        }
    }

    public function details(string $id)
    {
       // dd('hi');
        $data["admission"]= Admission::find($id);
        return view("Backend.school_management.admission.details",$data);
    }
    public function edit(string $id)
    {
       // dd('hi');
        $data["admission"]= Admission::find($id);
        $data['classes'] = Classe::where('status', 1)->get();
        $data['academic_years'] = AcademicYear::where('status', 1)->get();
        $data['sessions'] = Session::where('status', 1)->get();
        $data['sections'] = SchoolSection::where('status', 1)->get();
        $data['groups'] = Group::where('status', 1)->get();
        $data['fees'] = FeeManagement::where('status', 1)->get();
        $data['continents'] = Continent::all();
        $data['countries'] = Country::all();
        $data['states'] = State::all();
        $data['cities'] = City::all();
        return view("Backend.school_management.admission.update",$data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'class_id' => 'required',

        ]);
        try{
            DB::beginTransaction();
            $admission = $user =  Admission::find($id);
            $admission->user_id = $user->id;
            $admission->class_id = $request->class_id ?? 0;
            $admission->academic_year_id = $request->academic_year_id ?? 0;
            $admission->session_id = $request->session_id ?? 0;
            $admission->section_id = $request->section_id ?? 0;
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
            return redirect()->route('admin.admission.index')->with('message','Admission Update Successfully');
            // return redirect()->route('admin.batch.index')->with('message','Batch Add Successfully');
        }catch(\Exception $e){
            DB::rollBack();
            dd($e);
            return back()->with ('error_message', $e->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        $admission =  Admission::find($request->admission_id);
        $admission->delete();
        return redirect()->route('admin.admission.index')->with('message','Admission Deleted Successfully');
    }

    public function status($id)
    {
        $admission = Admission::find($id);
        if($admission->status == 0)
        {
            $admission->status = 1;
        }elseif($admission->status == 1)
        {
            $admission->status = 0;
        }
        $admission->update();
        return redirect()->route('admin.admission.index')->with('message', 'Admiddion Status Updated');
    }


      //ajax getGroup
      public function getGroup($id){
        $group = Group::where("class_id",$id)->get();
        return $group;
	  }
      //ajax getFees
      public function getFees($id){
        $fee = FeeManagement::where("class_id",$id)->with('fee')->get();
        return $fee;
	  }



    //   public function getGroups($class_id)
    //   {
    //       $groups = Group::where('class_id', $class_id)->get();
    //       $options = '<option value="">Select Group</option>';
    //       foreach ($groups as $group) {
    //           $options .= '<option value="' . $group->id . '">' . $group->name . '</option>';
    //       }
    //       return response()->json($options);
    //   }
  
    //   public function getSections($class_id)
    //   {
    //       $sections = Section::where('class_id', $class_id)->get();
    //       $options = '<option value="">Select Section</option>';
    //       foreach ($sections as $section) {
    //           $options .= '<option value="' . $section->id . '">' . $section->name . '</option>';
    //       }
    //       return response()->json($options);
    //   }






}
