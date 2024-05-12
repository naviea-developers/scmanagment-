<?php

namespace App\Http\Controllers\Backend\School_management\Admission;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\Admission;
use App\Models\Classe;
use App\Models\FeeManagement;
use App\Models\Group;
use App\Models\SchoolSection;
use App\Models\Session;
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
        return view('Backend.school_management.admission.create', $data);
    }
    public function store(Request $request)
    {
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
        return view("Backend.school_management.admission.update",$data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'class_id' => 'required',

        ]);
        try{
            DB::beginTransaction();
            $admission = Admission::find($id);
            $admission->class_id = $request->class_id;
            $admission->academic_year_id = $request->academic_year_id;
            $admission->session_id = $request->session_id;
            $admission->section_id = $request->section_id;
            $admission->group_id = $request->group_id;
            $admission->save();

            // if ($request->day) {
            //     $batch->batchDay()->delete();
                
            //     foreach ($request->day as $value) {
            //         $b_day = new BatchDay();
            //         $b_day->batch_id = $batch->id;
            //         $b_day->day = $value;
            //         $b_day->save();
            //     }
            // }

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


      //ajax getCountry
    //   public function getGroup($id){
    //     $group = Group::where("class_id",$id)->get();
    //     return $group;
	// }

    public function getGroups($class_id)
    {
        $groups = Group::where('class_id', $class_id)->get();
        $options = '<option value="">Select Group</option>';
        foreach ($groups as $group) {
            $options .= '<option value="' . $group->id . '">' . $group->name . '</option>';
        }
        return response()->json($options);
    }

    public function getSections($class_id)
    {
        $sections = Session::where('class_id', $class_id)->get();
        $options = '<option value="">Select Section</option>';
        foreach ($sections as $section) {
            $options .= '<option value="' . $section->id . '">' . $section->id . '</option>';
        }
        return response()->json($options);
    }






}
