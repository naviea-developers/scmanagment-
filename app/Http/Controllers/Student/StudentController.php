<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Session;

use Redirect;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\User;

class StudentController extends Controller
{
    public function student_profile(){
        
        $user = DB::table('user')
        ->where('user.id',session()->get('userId'))
        ->get();
        
         $userInfo = DB::table('student_infos')
        ->where('userId',session()->get('userId'))
        ->first();

        $stdClass = DB::table('student_infos')->where('userId' , session()->get('userId'))->first();

        if(!empty($stdClass->class)){
            session(['stdClass' => $stdClass->class]);
        }else{
            session(['stdClass' => '']);
        }
        
        

        if(session()->get('userRole') == 'student') {
            
            return view('backend.student.pages.profile',compact('user' , 'userInfo'));
            
        }
        
        if(session()->get('userRole') == 'teacher') {
            
            return redirect('/teacher_profile');
            
        }
        else {
            return redirect('/StudentLogin');
        }
        
    }

    public function teacher_profile(){
        $user = DB::table('user')
        ->where('user.id',session()->get('userId'))
        ->get();
        
         $userInfo = DB::table('teacher_info')
        ->where('userid',session()->get('userId'))
        ->first();

    

        return view('backend.student.pages.profile',compact('user' , 'userInfo'));
    }


    public function classVideo(){
        return view('backend.student.pages.classvideo');
    }
    public function classSchedule(){
        return view('backend.student.pages.classSchedule');
    }

    public function editProfile($id){
        $user = DB::table('user')
        ->leftjoin('student_infos','student_infos.userId','=','user.id')
        ->where('user.id',$id)->limit(1)
        ->get();

        $class = DB::table('classlist')->get();

        return view('backend.student.pages.studentForm',compact('user','class'));
    }


   public function teacherEditProfile($id){
        $user = DB::table('user')
        ->where('user.id',$id)->limit(1)
        ->get();
        
         $userInfo = DB::table('teacher_info')
        ->where('userid',session()->get('userId'))
        ->first();

        return view('backend.student.pages.studentForm',compact('user' , 'userInfo'));
    }
    
    
    public function updateProfileForTeacher (Request $request) {
        
        $user = DB::table('user')
        ->where('id' , session()->get('userId'))
        ->first();
        
        if(!empty($request->file('image'))){
            $image = $request->file('image');
            $extension = date('YmdHi').$image->getClientOriginalName();
            $destination = '/backend/profile_picture';
            $image->move(public_path($destination),$extension);

            session(['userImg' => $extension]);

            DB::table('user')
            ->where('id', session()->get('userId'))->update(array(
                'img' => $extension,
            ));
        }
        else{
            $image = $user->img;
        }
        
        
        
        if(!empty($request->file('coverimg'))){
            $coverimg = $request->file('coverimg');
            $extension = date('YmdHi').$coverimg->getClientOriginalName();
            $destination = '/backend/profile_picture';
            $coverimg->move(public_path($destination),$extension);

            session(['userImg' => $extension]);

            DB::table('user')
            ->where('id', session()->get('userId'))->update(array(
                'coverimg' => $extension,
            ));


        }
        else{
            $coverimg = $user->coverimg;
        }
        
        
        
        $teacher_info = DB::table('teacher_info')
        ->where('userid', session()->get('userId'))
        ->get();
        
        if(!empty($teacher_info)) {
            
            $std = DB::table('teacher_info')
            ->where('userid', session()->get('userId'))->update(array(
                'edu_deg'=>$request->deg,
                'edu_cirti'=>$request->edu_cirti,
                'exp'=>$request->exp,
                'sub'=>$request->sub,
                'nid'=>$request->nid,
            ));
            
        }
        else {
            
            $std = DB::table('teacher_info')->insert(array(
                'userid' => session()->get('userId'),
                'edu_deg'=>$request->institute,
                'edu_cirti'=>$request->roll,
                'exp'=>$request->email,
                'sub'=>$request->phone,
                'nid'=>$request->nid,
            ));
            
        }
        
        
        if(!empty($request->phone) || !empty($request->email)) {
            $std = DB::table('user')
            ->where('id', session()->get('userId'))->update(array(
                'phone'=>$request->phone,
                'email'=>$request->email,
            ));
        }
        
        
         return redirect()->route('teacher_profile');
        
    }


    public function updateProfile(Request $request){

        $user = DB::table('user')->where('id',session()->get('userId'))->first();

        if(!empty($request->file('image'))){
            $image = $request->file('image');
            $extension = date('YmdHi').$image->getClientOriginalName();
            $destination = '/backend/profile_picture';
            $image->move(public_path($destination),$extension);

            session(['userImg' => $extension]);

            DB::table('user')
            ->where('id', session()->get('userId'))->update(array(
                'img' => $extension,
            ));


        }
        else{
            $image = $user->img;
        }


        if(!empty($request->file('coverimg'))){
            $coverimg = $request->file('coverimg');
            $extension = date('YmdHi').$coverimg->getClientOriginalName();
            $destination = '/backend/profile_picture';
            $coverimg->move(public_path($destination),$extension);

            session(['userImg' => $extension]);

            DB::table('user')
            ->where('id', session()->get('userId'))->update(array(
                'coverimg' => $extension,
            ));


        }
        else{
            $coverimg = $user->coverimg;
        }



        $student_info = DB::table('student_infos')
        ->where('userId', session()->get('userId'))
        ->first();

        $student_info_count = DB::table('student_infos')
        ->where('userid', session()->get('userId'))
        ->get();
        
        if(!empty($request->file('birth_certificate'))){

            $file= $request->file('birth_certificate');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $destinationPath = '/backend/birth_certificate';
            $file->move(public_path($destinationPath),$filename);

        }
        else {

            $filename = $student_info->birth_certificate;

        }

        if(count($student_info_count) > 0){

            $std = DB::table('student_infos')
            ->where('userId', session()->get('userId'))->update(array(
                'institute'=>$request->institute,
                'roll'=>$request->roll,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'birth_certificate'=>$filename,
                'class' => $request->class,
                'fatherName' => $request->fatherName,
                'motherName' => $request->motherName,
                'gurdian_phone' => $request->gurdian_phone,
                'gurdian_voter_id' => $request->gurdian_voter_id,
                'status' => $request->status,

            ));
            
        }else {

            DB::table('student_infos')
            ->insert(array(
                'userId' => session()->get('userId'),
                'institute'=>$request->institute,
                'roll'=>$request->roll,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'birth_certificate'=>$request->birth_certificate,
                'class' => $request->class,
                'fatherName' => $request->fatherName,
                'motherName' => $request->motherName,
                'gurdian_phone' => $request->gurdian_phone,
                'gurdian_voter_id' => $request->gurdian_voter_id,
                'status' => $request->status,

            ));

        }

        if(!empty($request->phone)){


                DB::table('user')
                ->where('id', session()->get('userId'))->update(array(
                    'phone' => $request->phone,

                ));


        }

        DB::table('user')
        ->where('id', session()->get('userId'))->update(array(
            'name' => $request->name,
            'addres' => $request->addres,
        ));

         return redirect()->route('student_profile');

    }

    ///-----------------Subjects----------------//

    public function viewSubject(){
        
        $className = DB::table('student_infos')->where('userId', session()->get('userId'))->first();

        $subject = DB::table('allsubject')->where('class_name', $className->class)->get();

        return view('backend.student.pages.viewSubject', compact('subject'));

    }


    public function exam($id){


        $examName = DB::table('exam')
        ->where('title', str_replace("-"," ",$id))
        ->where('className', session()->get('stdClass'))
        ->get();


        return view('backend.student.pages.examView', compact('examName'));
    }

    public function showNoticeStudent($title){

        $showNotice = DB::table('notice')
            ->where('notice', str_replace("-"," ",$title))
            ->get();

        // dd($showNotice);

        return view('backend.student.pages.showNotice',compact('showNotice'));
    }


    public function showStudentResult($title){
        $resultInfo = DB::table('result')
            ->where('studentId', session()->get('userId'))
            ->where('examId',str_replace("-"," ",$title))->get();

        //  echo $resultInfo;

        return view('backend.student.pages.showResult', compact('resultInfo'));

    }
    public function showTitlewiseCourse($title){
        $courseInfo = DB::table('course')
            ->where('subcatId', $title)
            ->get();

        return view('backend.student.pages.iteducation', compact('courseInfo'));

    }
    public function register(){
        $classlist = DB::table('classlist')->get();
        return view('backend.auth.studentSignUp', compact('classlist'));

    }
    public function studentSignUp(Request $request){
        $user = DB::table('user')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => 'student',
            'addres' => $request->addres,
            'pass' =>md5($request->pass),
        ]);

        $userId = DB::table('user')->where('email', $request->email)->where('pass', md5($request->pass))
            ->first();


        $student = DB::table('student_infos')->insert([
            'userId' => $userId->id,
            'class' => $request->class,
            'institute' => $request->institute
        ]);
            session(['userId' => $userId->id]);
            session(['userName' => $userId->name]);
            session(['userEmail' => $userId->email]);
            session(['userRole' => $userId->role]);
            session(['userImg' => $userId->img]);
            session(['status' => $userId->status]);

        return redirect('/student_profile');
    }
    public function StudentLogin(){
        return view('backend.auth.studentLogin');
    }
    public function loginStd(Request $request){
        $user = DB::table('user')
        ->where('email' , $request->email)
        ->where('pass' , md5($request->pass))
        ->first();

    if(!empty($user)){

        session(['userId' => $user->id]);
        session(['userName' => $user->name]);
        session(['userEmail' => $user->email]);
        session(['userRole' => 'student']);
        session(['userImg' => $user->img]);
        session(['status' => $user->status]);


        DB::table('attendance')->insert([
            'userid'=>session()->get('userId'),
            'attime'=>date('H:i:s'),
            'atdate'=>date('Y-m-d')
        ]);


        return Redirect::to('/student_profile')
            ->with('msg', 'Welcome Back  ' . ucwords($user->role));
    }else{
        return Redirect::back()
        ->with('msg', 'Wrong username/password');
    }

    }
    public function stdLogout(){
        DB::table('attendance')->where('userid',session()->get('userId'))->update([
            'exittime'=>date('H:m:s')
        ]);
        Session::flush();
        return redirect('/');
    }


    public function paymentDetails(){

        $paymet = DB::table('payment')
        ->where('userid',session()->get('userId'))
        ->get();

        return view('backend.student.pages.paymentdetails' , compact('paymet'));
    }


    public function addPayment(Request $req) {


        $paymet = DB::table('payment')
        ->where('userid',session()->get('userId'))->get();

        if(count($paymet) > 0){
            $data = DB::table('payment')
            ->where('userid',session()->get('userId'))
            ->update([
                'userid' => session()->get('userId'),
                'cardholder'=> $req->holder,
                'cardnumber'=> $req->number,
                'date'=> $req->month,
                'cvc'=> $req->cvc,
            ]);
        }else{
            $data = DB::table('payment')->insert([
                'userid' => session()->get('userId'),
                'cardholder'=> $req->holder,
                'cardnumber'=> $req->number,
                'date'=> $req->month,
                'cvc'=> $req->cvc,
            ]);
        }

        return back();

    }
    
    
    
    public function setting() {
        
        $user = DB::table('user')
        ->where('id', session()->get('userId'))
        ->first();
        
        return view('backend.student.pages.sttingPageForStudent' , compact('user'));
        
    }
    
    
    public function changeStudentPassword (Request $req) {

        $user = DB::table('user')
        ->where('id', session()->get('userId'))
        ->where('pass', $req->currentPass)
        ->get();
        
        if(count($user) > 0) {
            
            DB::table('user')->where('id',session()->get('userId'))->update([
                'pass'=> md5($req->newpass),
            ]);
            
            return redirect('/student_profile');
            
        }else{
            
            return back()->with('msg', 'Current Password Not Match'); 
        }
        
        
        
    }
    
    
     public function classesForThisTeacher (Request $req) {
        
       $teacherInfo = DB::table('teacher_info')
        ->where('userid',session()->get('userId'))
        ->first();
        
        
        $classBysub = DB::table('allsubject')
        ->where('subject', $teacherInfo->sub)
        ->get();
        
        
        $classList = DB::table('classes')
        ->get();
        
        
        return view('backend.student.pages.classesForTeacher', compact('classBysub' , 'classList'));

        
        
    }


    public function addHomeworkByTeacher(Request $req) {
        
        $teacherInfo = DB::table('teacher_info')
        ->where('userid',session()->get('userId'))
        ->first();
        
        
        $classBysub = DB::table('allsubject')
        ->where('subject', $teacherInfo->sub)
        ->get();
        
        
        $classList = DB::table('classes')
        ->get();
        
        
        $hw = DB::table('homework')->where('teacherId' , session()->get('userId'))
        ->get();
        
        
       return view('backend.student.pages.addHomework', compact('classBysub' , 'classList' , 'hw'));
        
    }
    
    
    
    public function uploadHW (Request $req) {
        
        $data = DB::table('homework')->insert([
            'teacherId' => session()->get('userId'),
            'classId'=> $req->classname,
            'image'=> $req->img,
            'details'=> $req->data,
            'subject'=> $req->subject
        ]);
        
        return redirect('/addHomeworkByTeacher');
        
    }
    
    
    
    

}
