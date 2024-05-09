<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ApplicationDocument;
use App\Models\ApplicationEducation;
use App\Models\ApplicationWork;
use App\Models\Cart;
use App\Models\Country;
use App\Models\Course;
use App\Models\StudentApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;
use App\Models\User;
use App\Models\Notification;

class StudentApplicationController extends Controller
{
    function applications(){
        $applications= StudentApplication::where('user_id',auth()->user()->id)->has('carts')->get();
        return view('Frontend.university.applications');
    }
    function generateRandomString($length = 10) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }
    function applyCart(Request $request,$id){
        $course= Course::find($id);
        $application = StudentApplication::where('status',0)->where('user_id',auth()->user()->id)->has('carts')->first();
        if($application == null){
            $application = new StudentApplication;
            $application->user_id = auth()->user()->id;
            $application->application_code = $this->generateRandomString();
            $application->application_fee = $course->consultancy_fee;
            $application->total_fee = $course->consultancy_fee;
            $application->save();
        }else{
            // $application->user_id = auth()->user()->id;
            // $application->application_code = $this->generateRandomString();
            $application->application_fee =  $application->application_fee+$course->consultancy_fee;
            $application->total_fee = $application->total_fee+$course->consultancy_fee;
            $application->save();
        }


        $cart = Cart::where('application_id', $application->id)->where('course_id',$course->id)->first();
        if($cart){
            $application->application_fee =  $application->application_fee-$course->consultancy_fee;
            $application->total_fee = $application->total_fee-$course->consultancy_fee;
            $application->save();
            return back()->with('success','Sorry,This Program already added');
        }
        $cart = new Cart;
        $cart->application_id = $application->id;
        $cart->course_id = $course->id;
        $cart->amount = $course->consultancy_fee;
        $cart->save();
        return redirect()->route('apply_admission', $application->id);
    }
    function applyAdmission($id){
        $application = StudentApplication::find($id);
        if($application == null){
            return redirect('list/all-universities');
        }
        $countries = Country::all();
        return view('Frontend.university.apply',compact('application','countries'));
    }
    function applyCartDelete(Request $request,$id){
        //return $request;
        $application = StudentApplication::find($id);
        $cart = Cart::find($request->prog_id);
        //return $request->prog_id;
        if($cart){
            $application->application_fee =  $application->application_fee-$cart->amount;
            $application->total_fee = $application->total_fee-$cart->amount;
            $application->save();
            $cart->delete();
            $data['code'] = 0;
            $data['msg'] = "program delete Sucessfully!";
            return response()->json($data);
        }else{
            $data['code'] = 0;
            $data['msg'] = "program can not delete";
            return response()->json($data);
        }

    }
    function applicationDetails($id){
        $application = StudentApplication::find($id);

        if($application){
            $data['programs']=[];

            foreach($application->carts as $cart){
                $program=[];
                $program['id'] = $cart->id;
                $program['logo'] = $cart->course->university->image_show;
                $program['url'] = url('courses/details/'.$cart->course?->id);
                $program['user_program_name'] =$cart->course?->name;
                $program['deadline'] = date('M d, Y',strtotime($cart->course->application_deadline));
                $to = \Carbon\Carbon::now();
                $from = \Carbon\Carbon::parse($cart->course->application_deadline);
                $program['days_to_deadline'] =$days = $to->diffInDays($from);
                $program['start_date'] = date('M d, Y',strtotime($cart->course->next_start_date));
                $data['programs'][]= $program;
            }
            $data['code'] = 0;
            $data['msg'] = "program is not found";
            $data['status'] = "Application Started";
            $data['waits_for'] = "no";

            $data['application_fee'] = $application->application_fee;
            $data['total_fee'] = $application->total_fee;

            return response()->json($data);
        }else{
            $data['code'] = -1;
            $data['msg'] = "program is not found";
            return response()->json($data);
        }
    }
    function applicationPersonalInfo(Request $request,$id){


        $application = StudentApplication::find($id);
        if($application){
            $application->email = $request->email;
            $application->phone = $request->phone;
            $application->first_name = $request->first_name;
            $application->middle_name = $request->middle_name;
            $application->last_name = $request->last_name;
            $application->last_name = $request->last_name;
            $application->chinese_name = $request->chinese_name;
            $application->dob = $request->date_of_birth;
            $application->gender = $request->gender;
            $application->hobby = $request->hobbies_interests;
            $application->in_chaina = $request->is_in_china == false ? 0 : 1;
            $application->in_alcoholic = $request->addict_to_alcohol_drugs == false ? 0 : 1;
            $application->native_language = $request->language_native;
            $application->english_level = $request->language_proficiency_english;
            $application->chinese_level = $request->language_proficiency_chinese;
            $application->maritial_status = $request->marital_status;
            $application->nationality = $request->nationality;
            $application->passport_exipre_date = $request->passport_expiration_date;
            $application->passport_number = $request->passport_no;
            $application->birth_place = $request->place_of_birth;
            $application->religion = $request->religion;
            $application->save();
        }

        $data['code'] = 0;
        $data['msg'] = "Personal information Update Successfully";
        return response()->json($data);
    }
    function applicationHomeAddress(Request $request,$id){
       // return $request;
        $application = StudentApplication::find($id);
        if($application){
            $application->home_country = $request->country;
            $application->home_city = $request->city;
            $application->home_district = $request->district;
            $application->home_contact_name = $request->contact;
            $application->home_contact_phone = $request->phone;
            $application->home_street = $request->street;
            $application->home_zipcode = $request->zipcode;
            $application->save();
        }
        $data['code'] = 0;
        $data['msg'] = "Personal information Update Successfully";
        return response()->json($data);
    }
    function applicationPostAddress(Request $request,$id){
        // return $request;
        $application = StudentApplication::find($id);
        if($application){
            $application->current_country = $request->country;
            $application->current_city = $request->city;
            $application->current_district = $request->district;
            $application->current_contact_name = $request->contact;
            $application->current_contact_phone = $request->phone;
            $application->current_street = $request->street;
            $application->current_zipcode = $request->zipcode;
            $application->save();
        }
        $data['code'] = 0;
        $data['msg'] = "Personal information Update Successfully";
        return response()->json($data);
    }
    function applicationEducation(Request $request,$id){
       // return $request;
        $application = StudentApplication::find($id);
        if($request->education_data){
            $old_ids=[];
             foreach( $request->education_data as $k=>$education_data_field){
                if(isset($education_data_field['education_fields']) == false){
                   $old_ids[]= $education_data_field['id'];
                }
            }
            if(count($old_ids) > 0){
                ApplicationEducation::whereNotIn('id',$old_ids)->delete();
            }
            foreach( $request->education_data as $k=>$education_data_field){
                if(isset($education_data_field['education_fields'])){
                    //return $education_data_field['education_fields'][$k];
                    $field = $education_data_field['education_fields'][$k];
                    $studentEducation = new ApplicationEducation;
                    $studentEducation->application_id = $application->id;
                    $studentEducation->user_id = $application->user_id;
                    $studentEducation->country = $field['country'];
                    $studentEducation->gpa_type = $field['gpa'];
                    $studentEducation->major = $field['major'];
                    $studentEducation->end_date = $field['month_finished'];
                    $studentEducation->start_date = $field['month_started'];
                    $studentEducation->school = $field['school'];
                    $studentEducation->save();
                }else{
                    $field=$education_data_field;
                    $studentEducation =  ApplicationEducation::find($field['id']);

                    $studentEducation->country = $field['country'];
                    $studentEducation->gpa_type = $field['gpa'];
                    $studentEducation->major = $field['major'];
                    $studentEducation->end_date = $field['month_finished'];
                    $studentEducation->start_date = $field['month_started'];
                    $studentEducation->school = $field['school'];
                    $studentEducation->save();
                }

            }
        }
        $data['code'] = 0;
        $data['msg'] = "Education information Update Successfully";
        return response()->json($data);
    }
    function applicationWorkExperience(Request $request,$id){
       // return $request;
        $application = StudentApplication::find($id);
        if($request->work_data){
            $old_ids=[];
             foreach( $request->work_data as $k=>$work_data_field){
                if(isset($work_data_field['work_data']) == false){
                   $old_ids[]= $work_data_field['id'];
                }
            }
            if(count($old_ids) > 0){
                ApplicationWork::whereNotIn('id',$old_ids)->delete();
            }
            foreach( $request->work_data as $k=>$work_data_field){
                if(isset($work_data_field['work_data'])){
                    $field = $work_data_field['work_data'][$k];
                    $studentwork = new ApplicationWork;
                    $studentwork->application_id = $application->id;
                    $studentwork->user_id = $application->user_id;
                    $studentwork->company = $field['employer'];
                    $studentwork->job_title = $field['job_title'];
                    $studentwork->end_date = $field['month_finished'];
                    $studentwork->start_date = $field['month_started'];
                    $studentwork->save();
                }else{
                    $field=$work_data_field;
                    $studentwork =  ApplicationWork::find($field['id']);

                    $studentwork->company = $field['employer'];
                    $studentwork->job_title = $field['job_title'];
                    $studentwork->end_date = $field['month_finished'];
                    $studentwork->start_date = $field['month_started'];
                    $studentwork->save();
                }

            }
        }
        $data['code'] = 0;
        $data['msg'] = "Work Experience information Update Successfully";
        return response()->json($data);
    }
    function applicationFamilyFinance(Request $request,$id){
      //  return $request;
        $application = StudentApplication::find($id);
         if($application){
            $application->father_name = $request->family_member_name;
            $application->father_email = $request->family_member_email;
            $application->father_phone = $request->family_member_phone;
            $application->father_nationlity = $request->family_member_nationality;
            $application->father_workplace = $request->family_member_work_employer;
            $application->father_position = $request->family_member_work_position;

            $application->mother_name = $request->family_member1_name;
            $application->mother_email = $request->family_member1_email;
            $application->mother_phone = $request->family_member1_phone;
            $application->mother_nationlity = $request->family_member1_nationality;
            $application->mother_workplace = $request->family_member1_work_employer;
            $application->mother_position = $request->family_member1_work_position;

            $application->guarantor_name = $request->supporter_name;
            $application->guarantor_email = $request->supporter_email;
            $application->guarantor_phone = $request->supporter_phone;
            $application->guarantor_address = $request->supporter_address;
            $application->guarantor_workplace = $request->supporter_company;
            $application->guarantor_work_address = $request->supporter_company_address;
            $application->guarantor_relationship = $request->supporter_relationship;
            $application->guarantor_inter_relation = $request->inlineRadioOptions;
            $application->study_fund = $request->fund;
            $application->scholarship = $request->scholarship;
            $application->emergency_contact_name = $request->emergency_contact_name;
            $application->emergency_contact_phone = $request->emergency_contact_phone;
            $application->emergency_contact_email = $request->emergency_contact_email;
            $application->emergency_contact_address = $request->emergency_contact_address;

            $application->save();
        }
        $data['code'] = 0;
        $data['msg'] = "Family information Update Successfully";
        return response()->json($data);
    }
    function applicationOptionalService(Request $request, $id){
        $application = StudentApplication::find($id);
         if($application){
            $application->service_id = $request->optional_service;
            $application->save();
         }
        $data['code'] = 0;
        $data['msg'] = "Option Service Update Successfully";
        return response()->json($data);
    }
    function applicationAttachmentUpload(Request $request, $id){

        try{
            DB::beginTransaction();
            $application = StudentApplication::find($id);

            $filename=time().'application_file'.'.'. $request->file->getClientOriginalName();
            $request->file->move(public_path('upload/application/'.$application->id), $filename);
            $document = new ApplicationDocument;
            $document->application_id = $application->id;
            $document->user_id = $application->user_id;
            $document->document_name = $request->title;
            $document->document_type = 'fixed';
            $document->document_file = $filename;
            $document->extensions = $request->file->getClientOriginalExtension();
            $document->save();
            DB::commit();
            $data['code'] = 0;
            $data['msg'] = "Image Upload Successfully!";
             return response()->json($data);
        }catch(\Exception $e){
            DB::rollBack();
            $data['code'] = -1;
            $data['msg'] = "Something went wrong";
            return response()->json($data);
        }


    }
    function applicationGetAttachments(Request $request, $id){
        $application = StudentApplication::find($id);
        $documents = ApplicationDocument::where("application_id", $application->id)->get();
        $data['code'] = 0;
        $data['documents'] = $documents;
        $data['msg'] = "Load Successfully!";
        return response()->json($data);
    }
    function attachmentDownload(Request $request, $id){
       // return $request->all();
        $document = ApplicationDocument::find($request->attachment_code);
        $path=asset('public/upload/application/'.$id.'/'.$document->document_file);
        // $mimeType = File::mimeType($path);
         $extension = File::extension($path);

        // $source = file_get_contents($path);
        // $base64 = base64_encode($source);
        // $blob = 'data:'.$mimeType.';base64,'.$base64;



        $data['code'] = 0;
        $data['file_url'] = $path;
        $data['filename'] = $document->document_name.'.'.$extension;
        // $data['blob'] = $blob;
        // $data['type'] = $mimeType;
        $data['msg'] = "Load Successfully!";
        return response()->json($data);
    }
    function attachmentDelete(Request $request, $id){
        $document = ApplicationDocument::find($request->attachment_code);
        $document->delete();
        $data['code'] = 0;

        $data['msg'] = "Delete Successfully!";
        return response()->json($data);
    }


    public function submitAppliction(Request $request, $id)
    {
        $application = StudentApplication::find($id);
        // dd($application);
        if($application){
            $application->status = 1;
            $application->payment_method = $request->payment_method;
            $application->save();

            //Notification Start
            $admins = User::where('type', 0)->get();
            foreach($admins as $admin){
                 $notification=New Notification();
                 $notification->relation_id = $application->id;
                 $notification->text = 'New Application Submited';
                 $notification->user_id = $admin->id;
                 $notification->type = 'university';
                 $notification->save();
             }

             $student = auth()->user();
             if($data['consultant']=$consultant = User::where('continent_id', $student->continent_id)->where('type', 7)->where('status', 1)->where('id', '!=', $student->id)->first()){
            
                $data['consultant']=$consultant = User::where('continent_id', $student->continent_id)
                                ->where('type', 7)->where('status', 1)
                                ->where('id', '!=', $student->id)
                                ->first();

                $notification=New Notification();
                $notification->relation_id = $application->id;
                $notification->text = 'New Application Submited';
                $notification->user_id = $consultant->id;
                $notification->type = 'university';
                $notification->save();
            }

             $notification=New Notification();
             $notification->relation_id = $application->id;
             $notification->text = 'Applay successfully';
             $notification->user_id = auth()->user()->id;
             $notification->type = 'university';
             $notification->save();
           //Notification  End

            return redirect()->route('user.application_order_list')->with('message','Your are successfully submit the appliction form, please wait, we will responce as soon as possible. Thank you.');
           
       }
       $data['code'] = 0;
       $data['msg'] = "Appliction Submit Successfully";
       return response()->json($data);











       
    }
}
