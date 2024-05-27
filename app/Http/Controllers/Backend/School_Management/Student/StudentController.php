<?php

namespace App\Http\Controllers\Backend\School_management\Student;

use App\Http\Controllers\Controller;
use App\Mail\AdmissionEmail;
use Illuminate\Http\Request;

use App\Models\AcademicYear;
use App\Models\Admission;
use App\Models\AdmissionCertificate;
use App\Models\Certificate;
use App\Models\City;
use App\Models\Classe;
use App\Models\Student;
use App\Models\Continent;
use App\Models\Country;
use App\Models\FeeManagement;
use App\Models\Group;
use App\Models\SchoolSection;
use App\Models\Section;
use App\Models\Session;
use App\Models\State;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{

    public function index()
    { 
        $data['admissions'] = Admission::all();
        $data['classes'] = Classe::where('status', 1)->get();
        $data['academic_years'] = AcademicYear::where('status', 1)->get();
        $data['sessions'] = Session::where('status', 1)->get();
        $data['sections'] = SchoolSection::where('status', 1)->get();
        $data['groups'] = Group::where('status', 1)->get();
        return view('Backend.school_management.student.index', $data);
    }




    function getStudentByAjax(Request $request){
       // dd($request->all());
        $columns = array(
           0 => 'id',
           1 => 'roll_number',
           2 => 'image',
           3 => 'student_name',
           4 => 'class_id',
           5 => 'academic_year_id',
           6 => 'session_id',
           7 => 'section_id',
           8 => 'group_id',
           9 => 'status',
           10 => 'options',
           11 => 'student_id_number',
       );
       $totalData = Admission::count();
       $totalFiltered = $totalData;

       $limit = $request->input('length');
       $start = $request->input('start');
       //dd($request->input('order.0.column'));
       $order = $columns[$request->input('order.0.column')];
       $dir = $request->input('order.0.dir');
       $search = $request->input('search.value');
       $students = Admission::where('is_new',0);
       if(!empty($search)){

           $students =$students->where("student_name","LIKE","%{$search}%");
          
       }
        if($request->academic_year_id !=''){
                $students =$students->where("academic_year_id",$request->academic_year_id);
        }
        if($request->session_id !=''){
            $students =$students->where("session_id",$request->session_id);
        }
        if($request->class_id !=''){
            $students =$students->where("class_id",$request->class_id);
        }
        if($request->group_id !=''){
            $students =$students->where("group_id",$request->group_id);
        }
        if($request->section_id !=''){
            $students =$students->where("section_id",$request->section_id);
        }
        if($request->roll_number !=''){
            $students =$students->where("roll_number",$request->roll_number);
        }

        $students = $students->offset($start)->limit($limit)->orderBy($order,$dir)->get();
       $totalFiltered = $students->count();

       $data = array();
       if(!empty($students))
       {
            $i = $start == 0 ? 1 : $start+1;
           foreach($students as $student)
           {
               $nestedData['id'] = $i++;
               $nestedData['student_id_number'] = $student->student_id_number;
               $nestedData['roll_number'] = $student->roll_number;
               $nestedData['image'] = '<img src="'.$student->image_show.'" style="height:50px;width:50px;">';
               $nestedData['student_name'] = $student->student_name;
               $nestedData['academic_year_id'] = $student->academic_year?->year;
               $nestedData['session_id'] = $student->session?->start_year ." - ". $student->session?->end_year;
               $nestedData['class_id'] = $student->class?->name;
               $nestedData['section_id'] = $student->section?->name;
               $nestedData['group_id'] = $student->group?->name;

               $nestedData['status'] = '';
               if ($student->status == 0) {
                   $nestedData['status'] .= '<a href="'.route('admin.school_student.status', $student->id).'" class="btn btn-sm btn-warning">Inactive</a>';
               } elseif ($student->status == 1) {
                   $nestedData['status'] .= '<a href="'.route('admin.school_student.status', $student->id).'" class="btn btn-sm btn-success">Active</a>';
               }

               $nestedData['options'] = '<a class="btn btn-primary data_edit" href="'.route('admin.school_student.edit',$student->id).'"><i class="fa fa-edit"></i></a>';
            
               $nestedData['options'] .= '<a href="#" style="margin-left: 10px" value="{{$student->id}}" id="dataDeleteModal" class="del_data btn btn-danger"><i class="fa fa-trash"></i></a>';

               $data[] = $nestedData;

           }
       }
       $json_data = array(
           "draw"            => intval($request->input('draw')),
           "recordsTotal"    => intval($totalData),
           "recordsFiltered" => intval($totalFiltered),
           "data"            => $data
       );

       return json_encode($json_data);
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

            // if (Auth::check()) {
            //     $user = Auth::user();
            // } else {
                $user = new User();
                $user->name = $request->student_name;
                $user->email = $request->student_email;
                $user->mobile = $request->student_phone;
                $user->type = 1;
                $user->is_admission = 1;
                $user->password = $request->password;
            
                $user->save();
            // }

            $student = New Admission();
            $student->user_id = $user->id;
            $student->class_id = $request->class_id ?? 0;
            $student->academic_year_id = $request->academic_year_id ?? 0;
            $student->session_id = $request->session_id ?? 0;
            $student->section_id = $request->section_id ?? 0;
            $student->group_id = $request->group_id ?? 0;
            $student->fee_id = $request->fee_id ?? 0;

            $existingStudentsRoll = Admission::where('class_id', $student->class_id)
                                            ->where('academic_year_id', $student->academic_year_id)
                                            ->where('session_id', $student->session_id)
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
            $student->roll_number = $rollNumber;
           
            $currentYear = date('Y');
            $studentsId=$currentYear.$request->class_id.str_pad($student->roll_number, 3, '0', STR_PAD_LEFT); 
            $student->student_id_number = $studentsId;

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

            $student->is_new = $request->is_new ?? 0;

            $student->pre_school = $request->pre_school ?? 0;
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
                $certificates->admission_id = $student->id;
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
            return redirect()->route('admin.school_student.index')->with('message','Student Add Successfully.');
        }catch(\Exception $e){
            DB::rollBack();
            dd($e);
            return back()->with ('error_message', $e->getMessage());
        }
    }

    public function details($id)
    {
        $data['details'] = Admission::find($id);
        return view('Backend.school_management.student.details', $data);
    }


    public function edit($id)
    {
        $data["admission"]=$admission= Admission::find($id);
        $data['classes'] = Classe::where('status', 1)->get();
        $data['academic_years'] = AcademicYear::where('status', 1)->get();
        $data['sessions'] = Session::where('status', 1)->get();
        // $data['sections'] = SchoolSection::where('status', 1)->get();
        $data['sections'] = SchoolSection::where('class_id',$admission->class_id)->where('status', 1)->get();
        $data['groups'] = Group::where('class_id',$admission->class_id)->where('status', 1)->get();
        $data['fees'] = FeeManagement::where('class_id',$admission->class_id)->where('status', 1)->get();
        $data['continents'] = Continent::all();
        $data['countries'] = Country::where('continent_id',$admission->present_continent_id)->get();
        $data['states'] = State::where('country_id',$admission->present_country_id)->get();
        $data['cities'] = City::where('state_id',$admission->present_state_id)->get();
        $data['permanent_countries'] = Country::where('continent_id',$admission->permanent_continent_id)->get();
        $data['permanent_states'] = State::where('country_id',$admission->permanent_country_id)->get();
        $data['permanent_cities'] = City::where('state_id',$admission->permanent_state_id)->get();
        return view('Backend.school_management.student.update', $data);
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
            $student = Admission::find($id);
            $student->user_id = $student->user_id;
            $student->class_id = $request->class_id ?? 0;

            // $currentYear = date('Y');
            // $studentsId=$currentYear.$request->class_id.str_pad($student->roll_number, 3, '0', STR_PAD_LEFT); 
            // $student->student_id_number = $studentsId;

            // dd($student);
            $student->academic_year_id = $request->academic_year_id ?? 0;
            $student->session_id = $request->session_id ?? 0;
            $student->section_id = $request->section_id ?? 0;
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

           
           $student->is_new = $request->is_new ?? 0;

           $student->pre_school = $request->pre_school ?? 0;

           $student->pre_school_name = $request->pre_school_name;
           $student->pre_class_id = $request->pre_class_id ?? 0;
           $student->pre_roll_number = $request->pre_roll_number;
           $student->pre_school_address = $request->pre_school_address;

           $student->save();

        //    $user = User::find($student->user_id);
        //    $user->name = $request->student_name;
        //    $user->email = $request->student_email;
        //    $user->mobile = $request->student_phone;
        //    $user->dob = $request->dob;
        //    $user->nid = $request->student_nid;
        //    $user->save();



             //add certificate file
        if($request->certificates_file){
            foreach( $request->certificates_file as $k=>$value){
                $certificates = new AdmissionCertificate();
                $certificates->user_id = $student->id;
                $certificates->admission_id =$student->id;
                $certificates->certificates_name = $request->certificates_name[$k];
                $filename=$request->certificates_name[$k].'-'.$student->name.'_certificat_file'.'.'.$value->getClientOriginalExtension();
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
                $certificates->user_id = $student->id;
                $certificates->admission_id =$student->id;
                $certificates->certificates_name = $value;

                if(isset($request->file('old_certificates_file')[$k])){
                    @unlink(public_path('upload/certificates/'.$certificates->certificates_file));
                    $filename=$request->old_certificates_name[$k].'-'.$student->name.'_certificat_file'.'.'.$request->file('old_certificates_file')[$k]->getClientOriginalExtension();
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
            return redirect()->route('admin.school_student.index')->with('message','Student info update successfully.');
        }catch(\Exception $e){
            DB::rollBack();
            dd($e);
            return back()->with ('error_message', $e->getMessage());
        }
    }


    public function destroy(Request $request,$id)
    {

        // dd($request->student_id);
        $student =  Admission::find($request->student_id);
        @unlink(public_path('upload/admission/'.$student->image));
            foreach($student->certificate as $item){
                @$item->delete();
            }
        
        $student->delete();
        return redirect()->route('admin.school_student.index')->with('message','Student Profile Deleted Successfully');
    }

    public function status($id)
    {
        $student = Admission::find($id);
        if($student->status == 0)
        {
            $student->status = 1;
        }elseif($student->status == 1)
        {
            $student->status = 0;
        }
        $student->update();
        return redirect()->route('admin.school_student.index')->with('message', 'Student Status Updated');
    }

    // public function print($id)
    // {
    //     $data['details'] = Admission::find($id);
    //     return view('Frontend.admission.admission_print', $data);
    // }


    // public function download($id)
    // {
    //     $data['details'] = Admission::find($id);
    //     $html = view('Frontend.admission.admission_download', $data);
    //     $mpdf = new Mpdf([
    //         'mode' => 'UTF-8',
    //         'margin_left' => 5,
    //         'margin_right' => 5,
    //         'margin_top' => 5,
    //         'margin_bottom' => 0,
    //         'margin_header' => 0,
    //         'margin_footer' => 0,
    //     ]);

    //     //For Multilanguage Start
    //     $mpdf->autoScriptToLang = true;
    //     $mpdf->baseScript = 1;
    //     $mpdf->autoLangToFont = true;
    //     $mpdf->autoVietnamese = true;
    //     $mpdf->autoArabic = true;

    //     //For Multilanguage End
    //     $mpdf->setAutoTopMargin = 'stretch';
    //     $mpdf->setAutoBottomMargin = 'stretch';
    //     $mpdf->writeHTML($html);
    //     $name = 'admission_download_form' . date('Y-m-d i:h:s');
    //     $mpdf->Output($name.'.pdf', 'D');
    // }

    public function getSearchStudent(Request $request)
    {
        $academicYearId = $request->input('academic_year_id');
        $sessionId = $request->input('session_id');
        $classId = $request->input('class_id');
        $sectionId = $request->input('section_id');
    
        // return response()->json(['academicYearId' => $academicYearId,'sessionId' => $sessionId,'classId' => $classId,'sectionId' => $sectionId]);
       
        $studentsQuery = Student::query();

        if ($academicYearId) {
            $studentsQuery->where('academic_year_id', $academicYearId);
        }
    
        if ($sessionId) {
            $studentsQuery->where('session_id', $sessionId);
        }
    
        if ($classId) {
            $studentsQuery->where('class_id', $classId);
        }
    
        if ($sectionId) {
            $studentsQuery->where('section_id', $sectionId);
        }
    
        $data['admissions']=$students = $studentsQuery->get();

        return view('Backend.school_management.student.get-search-student',$data);
        
        // return response()->json($students);
    }











}
