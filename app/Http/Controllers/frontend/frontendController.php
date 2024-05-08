<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Session;
use Redirect;



class frontendController extends Controller
{
    public function indexPage(){
        $banner = DB::table('banner')->limit(2)->get();

        $brand = DB::table('brand')->get();

        $blog = DB::table('blog')->get();

        $allcourse = DB::table('course')
        ->leftJoin('category','category.catid','=','course.catId')
        ->get();

        $courses = DB::table('course')->selectRaw('count(*) as total')->first();

        $students = DB::table('student_infos')->selectRaw('count(*) as total')->first();

        $teachers = DB::table('teacher_info')->selectRaw('count(*) as total')->first();

        $users = DB::table('user')->selectRaw('count(*) as total')->first();

        $singleBanner  = DB::table('banner')->where('id','=','4')->first();

        $coverBanner  = DB::table('banner')->where('title','=','Cover Page')->first();

        $academicProgram = DB::table('sub_category')->where('category_id','=',8)->get();

        $admission = DB::table('course')->where('catId','=',12)->get();

        $class1_10 = DB::table('course')->where('subcatId','=','Class 1-10')->limit(4)->get();

        $get_12th_Science = DB::table('course')
        // ->where('subcatId','=','12th class- Science')
        ->limit(5)
        ->first();

        $science_12th = DB::table('course')
        // ->where('subcatId','=','12th class- Science')
        ->limit(5)
        ->get();

        $dmcourse = DB::table('sub_category')->where('category_id' , '9')->limit(4)->get();


        $academicProgramforBody = DB::table('course')->where('catId','=',8)->limit(8)->orderby('id' , 'desc')->get();


        $accProgCard = DB::table('course')->where('catId' , '8')
        ->distinct()
        ->limit(5)->get();


        return view('frontend.pages.home.home',compact('banner','brand','blog','allcourse',
            'students','teachers','users','courses','singleBanner','coverBanner','academicProgram'
            ,'class1_10','science_12th','get_12th_Science','admission' , 'academicProgramforBody' , 'dmcourse' , 'accProgCard'));




    }

    public function getTitlewiseCourse($id){
        $academicData = DB::table('course')->where('catId',$id)->get();
        // echo $academicData;
        return view('frontend.pages.course.getTitlewiseCourse',compact('academicData'));

    }

    public function coursePage(){
        return view('frontend.pages.course.course');
    }

    public function aboutPage(){

        return view('frontend.pages.about.about');
    }

    public function courseDetails($id){
        $courseDetails = DB::table('course')
        ->join('category','category.catid','=','course.catId')
        ->where('course.id',$id)->get();
        return view('frontend.pages.details.details',compact('courseDetails'));
    }


    public function cartView(){
        $getData = DB::table('cart')
        ->where('status' , '0')
        ->where('userId',session()->get('userId'))->get();
        return view('frontend.cart.cart',compact('getData'));

    }
    
    
    public function usecoupon (Request $req) {
        
            
            $coupon = DB::table('coupon')
            ->where('code',$req->coupon)->first();
        
        
            if($coupon->status = '1') {

                 $getData = DB::table('cart')->where('userId',session()->get('userId'))->get();
                 
                return view('frontend.cart.cart',compact('getData' , 'coupon'));
                
            }else {
                
                return Redirect::back()
                ->with('msg', 'Coupon Expired');
            }

        
    }
    

    public function bookNow($id){
        
        if(session()->get('userId')) {
            
            $course = DB::table('course')->where('id',$id)->first();
            $exist = DB::table('cart')
            ->where('userId', session()->get('userId'))
            ->where('courseId', $course->id)
            ->get();
            
            
            if(count($exist) > 0) {
                
                return Redirect::back()
                ->with('msg', 'Already Added');
                
            }else{
                
                $course = DB::table('course')->where('id',$id)->first();
                $data = DB::table('cart')->insert([
                    'userId' => session()->get('userId'),
                    'courseId'=>$course->id,
                    'name'=>$course->name,
                    'file'=>$course->image,
                    'total_price'=>$course->price,
                    'quantity'=>1
                ]);
                
            }
            
            return redirect('/cartView');
            
        }
        else{
            
            return Redirect::back()
            ->with('msg', 'You are not Logged');
            
        }

    }

    public function deleteCartProduct($id){
        $courseDelete  = DB::table('cart')->where('id',$id)->delete();

        return redirect('/cartView');
    }





    public function getallBlog() {

        $blog  = DB::table('blog')->get();

        return view('frontend.blog.blog',compact('blog'));
    }


    public function singleBlog($id) {

        $blog  = DB::table('blog')->where('bid' , $id)->get();

        return view('frontend.blog.singleblog',compact('blog'));
    }


    public function courseView($id) {

        $course  = DB::table('course')->where('id' , $id)->get();
        return view('frontend.pages.course.courseView',compact('course'));

    }


    public function academicPrograms($id) {
        $course  = DB::table('course')->where('subcatId' , str_replace("_"," ",$id))->get();

        return view('frontend.pages.academicProgram.academicPrograms',compact('course'));
    }

    public function academicProgramView($id) {

        $course  = DB::table('course')->where('id' , $id)->get();

        $class_routine  = DB::table('class_routine')->where('class_id' , $id)->get();


        return view('frontend.pages.academicProgram.academicProgramView',compact('course'));

    }

    public function termsView() {

        $terms  = DB::table('terms')->first();
        return view('frontend.pages.home.terms',compact('terms'));

    }

    public function policyView() {

        $terms  = DB::table('policy')->first();
        return view('frontend.pages.home.policy',compact('terms'));

    }

    public function contactus() {

        return view('frontend.pages.home.contactus');

    }

    public function carrier() {

        return view('frontend.pages.home.carrier');

    }


    public function SendCarrierData(Request $req) {

        if(!empty($req->cv)){
            $file = $req->file('cv');
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $destinationPath = '/backend/cv';
            $file->move(public_path($destinationPath), $fileName);
        }

        $data = DB::table('carrier')->insert([
            'name'=>$req->name,
            'email'=>$req->mail,
            'phone'=>$req->phone,
            'edu'=>$req->edu,
            'cv'=>$fileName,
            'skill'=>$req->skill,
        ]);

        return back();

    }



    public function SendContactData(Request $req) {

        $data = DB::table('contact')->insert([
            'name'=>$req->name,
            'mail'=>$req->mail,
            'phone'=>$req->phone,
            'message'=>$req->message,
        ]);

        return back();

    }


    public function allAdmission () {

        $allAdmission  = DB::table('sub_category')->where('category_id' , '9')->get();
        return view('frontend.pages.admission.allAdmission',compact('allAdmission'));

    }


    public function admissionView($id) {

        $course  = DB::table('course')->where('subcatId' , str_replace("-"," ",$id))->get();
        return view('frontend.pages.admission.AdmissionCourse',compact('course'));

    }


    public function courseCategory($id) {

        $category  = DB::table('category')->where('catId' , $id)->first();

        $allAdmission  = DB::table('course')->where('catId' , $id)->get();

        return view('frontend.pages.course.courseSubmenu',compact('allAdmission' , 'category'));

    }


    public function forgotpassword() {

        return view('frontend.pages.auth.forgot');

    }


    public function forgotPasswordAction(Request $req) {

            $checkUser  = DB::table('user')->where('email' , $req->mail)->first();

            if ($checkUser) {

                $otp = rand(000000,999999);

                session(['otp' => $otp]);

                session(['OTPuserid' => $checkUser->id]);

                Mail::to($req->mail)->send(new SendMail($otp));

                return redirect('/setNewPassword');

            }
            else {
                return redirect()->back();
            }



    }


    public function setNewPasswordAction (Request $req) {

        if(Session::get('otp') == $req->otp) {

            $data = DB::table('user')
            ->where('id' , Session::get('OTPuserid'))
            ->update([
                'pass'=> md5($req->newpass),
            ]);

            return redirect('/');

        }

    }



    public function bcs($id) {
        
        $course  = DB::table('course')->where('subcatId' , str_replace("-"," ",$id))->get();

        return view('frontend.pages.academicProgram.bcs',compact('course'));
    }

    public function bcsView($id) {

        $course  = DB::table('course')->where('id' , $id)->get();

        $class_routine  = DB::table('class_routine')->where('class_id' , $id)->get();


        return view('frontend.pages.academicProgram.bcsView',compact('course'));

    }


    public function it($id) {
        
        $course  = DB::table('course')->where('subcatId' , str_replace("-"," ",$id))->get();

        return view('frontend.pages.academicProgram.it',compact('course'));
    }

    public function itView($id) {

        $course  = DB::table('course')->where('id' , $id)->get();

        $class_routine  = DB::table('class_routine')->where('class_id' , $id)->get();


        return view('frontend.pages.academicProgram.itView',compact('course'));

    }
    
    
    public function professional($id) {
        
        $course  = DB::table('course')->where('subcatId' , str_replace("-"," ",$id))->get();

        return view('frontend.pages.academicProgram.professional',compact('course'));
    }

    public function professionalView($id) {

        $course  = DB::table('course')->where('id' , $id)->get();

        $class_routine  = DB::table('class_routine')->where('class_id' , $id)->get();


        return view('frontend.pages.academicProgram.professionalView',compact('course'));

    }
    
    
    public function checkuot () {
        
         $data = DB::table('cart')
            ->where('userId',session()->get('userId'))
            ->update([
                'status'=> 1,
            ]);
            
        return redirect('/orders');
        
         
    }
    
    
    public function orders () {
        
        $getData  = DB::table('cart')->where('status' , 1)
        ->orwhere('status' , 2)->get();
        
        return view('frontend.cart.checkout',compact('getData'));
        
    }
    
    


}
