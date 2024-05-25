<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\Cart;
use App\Models\Certificate;
use App\Models\Course;
use App\Models\CourseSave;
use App\Models\EventCart;
use App\Models\EventParticipant;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Package;
use App\Models\Page;
use App\Models\User;
use App\Models\Wishlist;
use App\Models\CourseParticipant;
use App\Models\ApplicationDocument;
use App\Models\ClassDuration;
use App\Models\ClassRoutine;
use App\Models\ClassRoutineItem;
use App\Models\Continent;
use App\Models\StudentApplication;
use App\Models\Ebook;
use App\Models\ExamClass;
use App\Models\ExamSchedule;
use App\Models\HomeWork;
use App\Models\Notice;
use App\Models\SubjectTeacherAssent;
use App\Models\Withdrawal;
use App\Models\ExamResult;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }
    public function dashboard(Request $request)
    {
        $daily = "";
        $monthly = "";
        $yearly = "";





        if($request->filter == 'daily'){
            DB::statement("SET SQL_MODE=''");
            $data['course'] = Course::whereDate('created_at', Carbon::today())->where('teacher_id', auth()->user()->id)->get();
            $data['order'] = Order::whereDate('created_at', Carbon::today())->where('user_id', auth()->user()->id)->get();
            $data['package'] = Order::whereDate('created_at', Carbon::today())->where('order_type', 'coursepackage')->where('user_id', auth()->user()->id)->get();
            $data['event'] = EventCart::whereDate('created_at', Carbon::today())->where('user_id', auth()->user()->id)->get();
            $data['ebook'] = Ebook::whereDate('created_at', Carbon::today())->where('user_id', auth()->user()->id)->get();
            $data['program'] = StudentApplication::whereDate('created_at', Carbon::today())->where('user_id', auth()->user()->id)->where('status','!=', 0)->get();
            $students = CourseParticipant::leftJoin('courses','courses.id','course_participants.course_id')
                            ->where('courses.teacher_id',auth()->user()->id);
            $data['p_students'] = $students->get();
            $data['students'] = $students->groupBy('course_participants.user_id')->get();
        }
        else if($request->filter == 'monthly'){
            DB::statement("SET SQL_MODE=''");
            $data['course'] = Course::whereMonth('created_at', now()->month)->where('teacher_id', auth()->user()->id)->get();
            $data['order'] = Order::whereMonth('created_at', now()->month)->where('user_id', auth()->user()->id)->get();
            $data['package'] = Order::whereMonth('created_at', now()->month)->where('order_type', 'coursepackage')->where('user_id', auth()->user()->id)->get();
            $data['event'] = EventCart::whereMonth('created_at', now()->month)->where('user_id', auth()->user()->id)->get();
            $data['ebook'] = Ebook::whereMonth('created_at', now()->month)->where('user_id', auth()->user()->id)->get();
            $data['program'] = StudentApplication::whereMonth('created_at', now()->month)->where('user_id', auth()->user()->id)->where('status','!=', 0)->get();
            $students = CourseParticipant::leftJoin('courses','courses.id','course_participants.course_id')
                            ->where('courses.teacher_id',auth()->user()->id);
            $data['p_students'] = $students->get();
            $data['students'] = $students->groupBy('course_participants.user_id')->get();
        }
        else if($request->filter == 'yearly'){
            DB::statement("SET SQL_MODE=''");
            $data['course'] = Course::whereYear('created_at', now()->year)->where('teacher_id', auth()->user()->id)->get();
            $data['order'] = Order::whereYear('created_at', now()->year)->where('user_id', auth()->user()->id)->get();
            $data['package'] = Order::whereYear('created_at', now()->year)->where('order_type', 'coursepackage')->where('user_id', auth()->user()->id)->get();
            $data['event'] = EventCart::whereYear('created_at', now()->year)->where('user_id', auth()->user()->id)->get();
            $data['ebook'] = Ebook::whereYear('created_at', now()->year)->where('user_id', auth()->user()->id)->get();
            $data['program'] = StudentApplication::whereYear('created_at', now()->year)->where('user_id', auth()->user()->id)->where('status','!=', 0)->get();
            $students = CourseParticipant::leftJoin('courses','courses.id','course_participants.course_id')
                            ->where('courses.teacher_id',auth()->user()->id);
            $data['p_students'] = $students->get();
            $data['students'] = $students->groupBy('course_participants.user_id')->get();
        }

        else{

            DB::statement("SET SQL_MODE=''");
            $data['course'] = Course::whereDate('created_at', Carbon::today())->where('teacher_id', auth()->user()->id)->get();
            $data['order'] = Order::whereDate('created_at', Carbon::today())->where('user_id', auth()->user()->id)->get();
            $data['package'] = Order::whereDate('created_at', Carbon::today())->where('order_type', 'coursepackage')->where('user_id', auth()->user()->id)->get();
            $data['event'] = EventCart::whereDate('created_at', Carbon::today())->where('user_id', auth()->user()->id)->get();
            $data['ebook'] = Ebook::whereDate('created_at', Carbon::today())->where('user_id', auth()->user()->id)->get();
            $data['program'] = StudentApplication::whereDate('created_at', Carbon::today())->where('user_id', auth()->user()->id)->where('status','!=', 0)->get();
            $students = CourseParticipant::leftJoin('courses','courses.id','course_participants.course_id')
                            ->where('courses.teacher_id',auth()->user()->id);
            $data['p_students'] = $students->get();
            $data['students'] = $students->groupBy('course_participants.user_id')->get();
        }

        $data['daily'] = $daily;
        $data['monthly'] = $monthly;
        $data['yearly'] = $yearly;

        // DB::statement("SET SQL_MODE=''");
        // $data['course'] = Course::where('teacher_id', auth()->user()->id)->get();
        // $data['order'] = Order::where('user_id', auth()->user()->id)->get();
        // $data['event'] = cart::where('user_id', auth()->user()->id)->get();
        // // $data['package'] = Package::where('user_id', auth()->user()->id)->get();


        // $students = CourseParticipant::leftJoin('courses','courses.id','course_participants.course_id')
        //                 ->where('courses.teacher_id',auth()->user()->id);
        // $data['p_students'] = $students->get();
        // $data['students'] = $students->groupBy('course_participants.user_id')->get();
        return view('user.dashboard', $data);
    }
    public function myCourseList()
    {
        // $data['my_orders'] = Cart::where('user_id', auth()->user()->id)->get();
        return view('user.customer.my_course_list');
    }
    public function myOrderList()
    {
        $data['my_orders'] = Cart::where('user_id', auth()->user()->id)->get();
        return view('user.customer.my_order_list', $data);
    }
    public function myOrder()
    {
        $data['orders'] = Order::where('user_id', auth()->user()->id)->where('order_type','courseorder')->orderBy('id','desc')->get();
        
        return view('user.order.index', $data);
    }
    public function myOrderDetails($id)
    {
        $data['orderdetails'] = Order::find($id);
        return view('user.order.details', $data);
    }

    // public function CourseOrderDetails($id)
    // {
    //    $data['orderdetails'] = Order::find($id);
    //    $data['site_setting'] = SiteSetting::first();
    //    return view('Backend.order.courseorder.details', $data);
    // }
    function myOrderPrint($id){
       $data['orderdetails'] = Order::find($id);
    //    $data['site_setting'] = SiteSetting::first();
       return view('user.order.print', $data);
    }

    public function myPackageList()
    {
        $data['my_package'] = Cart::where('user_id', auth()->user()->id)->where('cart_type','packagecart')->get();
        return view('user.customer.my_package_list', $data);
    }

    public function myEventList()
    {
        $data['my_events'] = EventCart::where('user_id', auth()->user()->id)->get();
        return view('user.customer.my_event_list', $data);
    }

    public function studentExamResult()
    {
        $user_id = auth()->user()->id;
        if($user_id){
            $data['student']=$student=Admission::where('user_id',$user_id)->first();
            $data['examResults']=ExamResult::where('student_id',$student->id)
                                            ->where('class_id',$student->class_id)
                                            ->where('section_id',$student->section_id)
                                            ->where('session_id',$student->session_id)
                                            ->where('is_publis','1')
                                            ->orderBy('id', 'desc')->get();
        }
        return view('user.student.result.index',$data);
    }
    public function updateUserPic(Request $request, $id)
    {

        $user = User::find(auth()->user()->id);
        if ($request->new_image){
            $path = public_path("upload/users/".$user->image);
            @unlink($path);
            $fileName = time().'_user_image.'.request()->new_image->getClientOriginalExtension();
            request()->new_image->move(public_path('upload/users'), $fileName);
            $user->image = $fileName;
        }else{
            $user->image = $request->image;
        }
        $user->update();
        return redirect()->back()->with('message', 'Profile Up to date, Thank you.');
    }
    public function editUserInfo($id)
    {
        $data['user'] = User::find($id);
        $data['continents'] = Continent::where('status', 1)->get();
        return view('user.update_profile', $data);
    }
    public function updateUserInfo(Request $request, $id)
    {

        $user = User::find(auth()->user()->id);

        // dd($user->dob);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->gender = $request->gender;
        $user->nid = $request->nid;
        $user->dob = $request->dob;

        $user->qualification = $request->qualification;
        $user->experience = $request->experience;
        $user->language = $request->language;
        $user->country = $request->country;
        $user->continent_id = $request->continent_id;

        $user->address = $request->address;
        $user->institution = $request->institution ?? '';
        $user->designation = $request->designation ?? '';
        $user->description = $request->description;

        // Social URL
        $user->facebook_id = $request->facebook_id;
        $user->twitter_id = $request->twitter_id;
        $user->google_id = $request->google_id;
        $user->instagram_id = $request->instagram_id;

        // Bank Information
        $user->bank_name = $request->bank_name;
        $user->bank_code_ifsc = $request->bank_code_ifsc;
        $user->bank_account_number = $request->bank_account_number;
        $user->bank_ac_holder_name = $request->bank_ac_holder_name;
        $user->paypal_id_num = $request->paypal_id_num;

        $user->update();


        //add certificate file
        if($request->certificates_file){
            foreach( $request->certificates_file as $k=>$value){
                $certificates = new Certificate();
                $certificates->user_id = $user->id;
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
                $certificates = Certificate::find($k);
                $certificates->user_id = $user->id;
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
                $audio = Certificate::find($value);
                @unlink(public_path('upload/certificates/'.$audio->certificates_file));
                $audio->delete();

            }
        }

        return redirect()->route('user.profile')->with('message', 'Profile Up to date, Thank you.');
    }

    public function notification(){
        $data['notifications'] = Notification::where('user_id',auth()->user()->id)->orderBy('id','desc')->paginate(12);
        return view('user.my_notification', $data);

    }

    public function privacy() //all user
    {
        $data['privacy'] = Page::where('template', 'privacy-policy')->first();
        $data['terms_conditions'] = Page::where('template', 'terms-conditions')->first();
        return view('user.privacy_policy', $data);
    }
    public function notice() //all user
    {
        $data['notices'] = Notice::where('status', 1)->get();
        return view('user.notice.notice', $data);
    }
   

    public function wishlist() //coustomer
    {
        $data['saves'] = CourseSave::where('user_id', auth()->user()->id)->get();
        return view('user.customer.my_wishlist', $data);
    }




    // Withdrawal start
    public function manageWithdrawal()
    {
        $data['bank'] = User::find(auth()->user()->id);
        $data['withdrawals'] = Withdrawal::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();
        return view('user.withdrawal.index', $data);
    }
    public function createWithdrawal()
    {
        
        $data['w_fee']= \App\Models\Tp_option::where('option_name', 'commission')->first();
        $data['bank'] = User::find(auth()->user()->id);
        return view('user.withdrawal.create', $data);
    }

    public function storWithdrawal(Request $request)
    {

        $user = User::find(auth()->user()->id);
        // dd($user);
        if($user->current_balance < $request->amount){
            
            return redirect()->back()->with('message','Insufficient balance');
         }
         else{
            $withdrawal = new Withdrawal();
            $withdrawal->user_id = auth()->user()->id;
            $withdrawal->amount =  $request->amount;
            $withdrawal->fee = $request->fee;
            $withdrawal->payment_method = $request->payment_method;
            $withdrawal->note = $request->note;
            $withdrawal->save();
         }

        // $withdrawal = new Withdrawal();
        // $withdrawal->user_id = auth()->user()->id;
        // $withdrawal->amount = $request->amount;
        // $withdrawal->fee = $request->fee;
        // $withdrawal->payment_method = $request->payment_method;
        // $withdrawal->note = $request->note;
        // $withdrawal->save();
        
        return redirect()->route('frontend.manage_withdrawal')->with('message', 'Your order is processing, Thank you.');
    }
    public function editWithdrawal($id)
    {
        $data['w_fee']= \App\Models\Tp_option::where('option_name', 'commission')->first();
        $data['withdrawal'] = Withdrawal::find($id);
        $data['bank'] = User::find(auth()->user()->id);
        return view('user.withdrawal.update', $data);
    }
    public function updateWithdrawal(Request $request, $id)
    {
        // $withdrawal = Withdrawal::find($id);
        // $withdrawal->user_id = auth()->user()->id;
        // $withdrawal->amount = $request->amount;
        // $withdrawal->fee = $request->fee;
        // $withdrawal->payment_method = $request->payment_method;
        // $withdrawal->note = $request->note;
        // $withdrawal->update();

        $user = User::find(auth()->user()->id);
            if($user->current_balance < $request->amount){
                
                return redirect()->back()->with('message','Insufficient balance');
             }
             else{
                $withdrawal = Withdrawal::find($id);
                $withdrawal->user_id = auth()->user()->id;
                $withdrawal->amount = $request->amount;
                $withdrawal->fee = $request->fee;
                $withdrawal->payment_method = $request->payment_method;
                $withdrawal->note = $request->note;
                $withdrawal->update();
             }
        return redirect()->route('frontend.manage_withdrawal')->with('message', 'Your order is processing, Thank you.');
    }

      //continent manage student start
      public function manageSutdent_old(){
       
        $consultant = auth()->user();
        $data['students'] = User::where('continent_id', $consultant->continent_id)
                         ->where('type', 1)
                         ->where('id', '!=', $consultant->id)
                         ->get();
        return view('user.consultants.index', $data);
    }
    public function manageApplication(){
        $consultant = auth()->user();
        $students =  User::where('continent_id', $consultant->continent_id)
        ->where('type', 1)
        ->where('id', '!=', $consultant->id)
        ->get()->pluck('id');
        $data['applications'] = StudentApplication::where('status','!=', 0)->whereIn('user_id',$students)->orderBy('id', 'desc')->get();
        return view('user.consultants.index', $data);
    }
    public function applicationDetails($id){
        $data['s_appliction'] = StudentApplication::find($id);
        return view('user.consultants.application_details', $data);
    }
    public function applicationStatus(Request $request, $id){
        $a_status = StudentApplication::find($id);
        $a_status->status = $request->status;
        $a_status->save();


        //Notification Start
        if($request->status=='1'){
            $admins = User::where('type', 0)->get();
            foreach($admins as $admin){
                $notification=New Notification();
                $notification->relation_id = $a_status->id;
                $notification->text = 'Program Application Processing';
                $notification->user_id = $admin->id;
                $notification->type = 'university';
                $notification->save();
            }

            $consultant = auth()->user();
            $notification=New Notification();
            $notification->relation_id = $a_status->id;
            $notification->text = 'Program Application Processing';
            $notification->user_id = $consultant->id;
            $notification->type = 'university';
            $notification->save();
           

            $notification=New Notification();
            $notification->relation_id = $a_status->id;
            $notification->text = 'Your Application Processing';
            $notification->user_id = $a_status->user_id;
            $notification->type = 'university';
            $notification->save();
        }elseif($request->status=='2'){
            $admins = User::where('type', 0)->get();
            foreach($admins as $admin){
                $notification=New Notification();
                $notification->relation_id = $a_status->id;
                $notification->text = 'Program Application Approved';
                $notification->user_id = $admin->id;
                $notification->type = 'university';
                $notification->save();
            }

            $consultant = auth()->user();
            $notification=New Notification();
            $notification->relation_id = $a_status->id;
            $notification->text = 'Program Application Approved';
            $notification->user_id = $consultant->id;
            $notification->type = 'university';
            $notification->save();
           

            $notification=New Notification();
            $notification->relation_id = $a_status->id;
            $notification->text = 'Your Application Approved';
            $notification->user_id = $a_status->user_id;
            $notification->type = 'university';
            $notification->save();

        }else{
            $admins = User::where('type', 0)->get();
            foreach($admins as $admin){
                $notification=New Notification();
                $notification->relation_id = $a_status->id;
                $notification->text = 'Program Application Cancel';
                $notification->user_id = $admin->id;
                $notification->type = 'university';
                $notification->save();
            }

            $consultant = auth()->user();
            $notification=New Notification();
            $notification->relation_id = $a_status->id;
            $notification->text = 'Program Application Cancel';
            $notification->user_id = $consultant->id;
            $notification->type = 'university';
            $notification->save();
           

            $notification=New Notification();
            $notification->relation_id = $a_status->id;
            $notification->text = 'Your Application Cancel';
            $notification->user_id = $a_status->user_id;
            $notification->type = 'university';
            $notification->save();
            
        }
       //Notification  End
        return redirect()->back()->with('message', 'Application status update successfully. Thank you.');
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



    public function studentDetails($id)
    {
        $data['student'] = User::find($id);
        return view('user.consultants.student_details', $data);
    }
    public function studentDetailsBlank()
    {
        return view('user.consultants.blank_page');
    }
    //continent manage student end









    public function myApplicationOrder()
    {
        $data['orders'] = StudentApplication::where('user_id', auth()->user()->id)->orderBy('id','desc')->get();
        
        $student = auth()->user();
        $data['consultant'] = User::where('continent_id', $student->continent_id)
                         ->where('type', 7)->where('status', 1)
                         ->where('id', '!=', $student->id)
                         ->first();

        return view('user.application_order.index', $data);
    }
    public function myApplicationOrderInvoice($id)
    {
        $data['orderdetails'] = StudentApplication::find($id);
        return view('user.application_order.invoice', $data);
    }

    public function myApplicationOrderDetails($id)
    {
        $data['s_appliction'] = StudentApplication::find($id);
        return view('user.application_order.application_details', $data);
    }

    public function applicationDestroy(Request $request)
    {
        $studentapplication= StudentApplication::find($request->order_id);
        foreach($studentapplication->carts as $cart){
            $cart->delete();
        }
        foreach($studentapplication->educations as $education){
            $education->delete();
        }
        foreach($studentapplication->work_experiences as $work_experience){
            $work_experience->delete();
        }
        foreach($studentapplication->documents as $document){
            @unlink(public_path('upload/application/{$request->order_id}/'.$document->document_file));
            $document->delete();
        }

        foreach($studentapplication->notifications as $notification){
            $notification->delete();
        }
        $studentapplication->delete();
        return back()->with('message','Application Delete Successfully');
    }

    function myApplicationOrderPrint($id){
       $data['orderdetails'] = StudentApplication::find($id);
       return view('user.application_order.print', $data);
    }




    ///School Management 


    public function classRoutine() //for student user
    {
        $user = auth()->user();
        
        if ($user) {
            $data['admission'] = $admission = Admission::where('user_id', $user->id)->first();
            // dd($admission->class->name);
            if ($admission) {
                $data['class_routine'] = $routines = ClassRoutine::where('class_id', $admission->class_id)
                    ->where('session_id', $admission->session_id)
                    ->where('section_id', $admission->section_id)
                    ->get();
                    // ->filter(function ($routine) {
                    //     return $routine->examination && $routine->examination->end_date >= Carbon::now();
                    // });
                    // dd($routines);
            } else {
                
            }
        } else {

        }
        return view('user.class_routine.routine', $data);
    }


    public function teacherClassRoutine()
    {
        $user = auth()->user();
        $data['class_routine'] = ClassRoutine::where('teacher_id', $user->id)
                                ->with(['class', 'section', 'subject', 'room', 'classDuration'])
                                ->get();
                                // dd($data);
        return view('user.class_routine.teacher_class_routine', $data);
    }

    // public function teacherExamRoutine()
    // {
    //     $user = auth()->user();
    //     if ($user) {
    //         $data['teacher'] = $teacher = SubjectTeacherAssent::where('teacher_id', $user->id)->first();
    //         //  dd($teacher);
    //         $data['examRoutine'] = $examSchedule = ExamSchedule::
    //                              orwhere('class_id', $teacher->class_id)
    //                             ->orwhere('section_id', $teacher->section_id)
    //                             ->get()
    //                             ->filter(function ($routine) {
    //                             return $routine->examination && $routine->examination->end_date >= Carbon::now();
    //                             });
       
    //     }
    //     return view('user.exam_routine.teacher_exam_routine', $data);
    // }


    public function teacherExamRoutine()
    {
        $user = auth()->user();
        $teacherAssignments = SubjectTeacherAssent::where('teacher_id', $user->id)->get();
        $classIds = $teacherAssignments->pluck('class_id')->unique();
        $sectionIds = $teacherAssignments->pluck('section_id')->unique();
        $subjectIds = $teacherAssignments->pluck('subject_id')->unique();

        $examSchedules = ExamSchedule::whereIn('class_id', $classIds)
            ->whereIn('section_id', $sectionIds)
            ->whereHas('examClass', function($query) use ($subjectIds) {
                $query->whereIn('subject_id', $subjectIds);
            })->get()
            ->filter(function ($routine) {
                return $routine->examination && $routine->examination->end_date >= Carbon::now();
            });

        $data = [
            'teacher' => $teacherAssignments,
            'examSchedules' => $examSchedules,
        ];

        return view('user.exam_routine.teacher_exam_routine', $data);
    }


    // public function teacherExamRoutinePrint(){

    //     $user = auth()->user();
    //     if ($user) {
    //         $data['teacher'] = $teacher = SubjectTeacherAssent::where('teacher_id', $user->id)->first();
    //         // dd($data);
    //         $data['examRoutine'] = $examSchedule = ExamSchedule::where('class_id', $teacher->class_id)
    //                             ->where('section_id', $teacher->section_id)
    //                             ->get()
    //                             ->filter(function ($routine) {
    //                             return $routine->examination && $routine->examination->end_date >= Carbon::now();
    //                             });
                                
    //     }
    //     return view('user.exam_routine.teacher_exam_routine_print',$data);
    // }


    public function teacherExamRoutinePrint(Request $request){
        $id= $request->input('examination_id');
        $data['examSchedules']= ExamSchedule::where('status','1')->where("examination_id",$id)->get();
        return view('user.exam_routine.teacher_exam_routine_print',$data);
    }









    public function classPrint(){

        $user = auth()->user();
        if ($user) {
            $data['admission'] = $admission = Admission::where('user_id', $user->id)->first();
            // dd($admission);
            if ($admission) {
                $data['class_routine'] = $routines = ClassRoutine::where('class_id', $admission->class_id)
                    ->where('session_id', $admission->session_id)
                    ->where('section_id', $admission->section_id)
                    ->get();
            } else {
                
            }
        } else {

        }

        return view('user.class_routine.view_class_routine_print',$data);
    }


    public function examRoutine() //all user
    {

        $user = auth()->user();
        if ($user) {
            $data['admission'] = $admission = Admission::where('user_id', $user->id)->first();
            $data['examRoutine'] = $examSchedule = ExamSchedule::where('class_id', $admission->class_id)
                                ->where('section_id', $admission->section_id)
                                ->get()
                                ->filter(function ($routine) {
                                return $routine->examination && $routine->examination->end_date >= Carbon::now();
                                });
        }

        return view('user.exam_routine.routine', $data);
    }

   
    public function examPrint(){

        $user = auth()->user();
        if ($user) {
            $data['admission'] = $admission = Admission::where('user_id', $user->id)->first();
            $data['examRoutine'] = $examSchedule = ExamSchedule::where('class_id', $admission->class_id)
                                ->where('section_id', $admission->section_id)
                                ->get()
                                ->filter(function ($routine) {
                                return $routine->examination && $routine->examination->end_date >= Carbon::now();
                                });
        }
        return view('user.exam_routine.view_exam_routine_print',$data);
    }

    public function getAssignTeacherSubject($id){
        $classes = SubjectTeacherAssent::where("class_id",$id)->with('class')->get();
        return $classes;
    }
 

    public function homeWork()
    {
        $user = auth()->user()->id;
        $admission = Admission::where('user_id', $user)->first();
        // $data = $admission->session_id;
        // dd($data);
        $data['home_works'] = HomeWork::where('class_id', $admission->class_id)
                                        ->where('session_id', $admission->session_id)
                                        ->where('status', 1)->get();
        return view('user.student.homework.index', $data);
    }

    public function homeWorkDetails($id)
    {
        $data['details'] = HomeWork::find($id);
        return view('user.student.homework.details', $data);
    }

}
