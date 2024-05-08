<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use Redirect;

use Illuminate\Support\Facades\DB;

class index extends Controller
{
    public function authCheck(Request $req){

        if(session()->has('role' == 'admin')){
            return Redirect::to('/deshboard');
        }else{
            return view('backend.welcome');
        }

    }


    public function reg(Request $req){


        $user = DB::table('user')
        ->where('email' , $req->email)
        ->get();

        if(count($user) > 0){
            return Redirect::back()->with('msg', 'You have already a account');
        }else{
            $addvendor = DB::table('user')->insert([
                'name' => $req->name,
                'pass' => md5($req->pass),
                'role' => $req->role,
                'addres' => $req->add,
                'email' => $req->email,
            ]);


            if($addvendor == '1'){

                $user = DB::table('user')
                ->where('email' , $req->email)
                ->where('pass' , md5($req->pass))
                ->first();

                session(['userId' => $user->id]);
                session(['userName' => $user->name]);
                session(['userEmail' => $user->email]);
                session(['userRole' => $user->role]);
                session(['userImg' => $user->img]);
                session(['status' => $user->status]);


                    return Redirect::to('/deshboard');

            }

        }


    }


    public function login(Request $req){

        $user = DB::table('user')
                ->where('email' , $req->username)
                ->where('pass' , md5($req->pass))
                ->first();

            if(!empty($user)){

                session(['userId' => $user->id]);
                session(['userName' => $user->name]);
                session(['userEmail' => $user->email]);
                session(['userRole' => $user->role]);
                session(['userImg' => $user->img]);
                session(['status' => $user->status]);


                return Redirect::to('/deshboard')
                    ->with('msg', 'Welcome Back  ' . ucwords($user->role));

            }else{
                return Redirect::back()
                ->with('msg', 'Wrong username/password');
            }


    }


    public function logout(){
        Session::flush();

        return Redirect::to('/admin');

    }



    public function deshboard(){
        
        $day1 = \Carbon\Carbon::today()->subDays(1); 
        $day7 = \Carbon\Carbon::today()->subDays(7); 
        $day30 = \Carbon\Carbon::today()->subDays(30); 
        $day365 = \Carbon\Carbon::today()->subDays(365); 
        
        $visitor1 = DB::table('attendance')->where('atdate','>=', $day1)->get();
        $user1 = DB::table('user')->where('created_at','>=', $day1)->get();
        $cart1 = DB::table('cart')->where('created_at','>=', $day1)->get();
        $classes1 = DB::table('classes')->where('created_at','>=', $day1)->get(); 
        $course1 = DB::table('course')->where('created_at','>=', $day1)->get();
        $attendance1 = DB::table('attendance')->where('created_at','>=', $day1)->get();
        
        $teacher1 = DB::table('user')->where('role' , 'teacher')->where('created_at','>=', $day1)->get();
                
        $student1 = DB::table('user')->where('role' , 'student')->where('created_at','>=', $day1)->get();
        
                
                
                
        $visitor7 = DB::table('attendance')->where('atdate','>=', $day7)->get();
        $user7 = DB::table('user')->where('created_at','>=', $day7)->get();
        $cart7 = DB::table('cart')->where('created_at','>=', $day7)->get();
        $classes7 = DB::table('classes')->where('created_at','>=', $day7)->get(); 
        $course7 = DB::table('course')->where('created_at','>=', $day7)->get();
        $attendance7 = DB::table('attendance')->where('created_at','>=', $day7)->get();
        $teacher7 = DB::table('user')->where('role' , 'teacher')->where('created_at','>=', $day7)->get();
                
        $student7 = DB::table('user')->where('role' , 'student')->where('created_at','>=', $day7)->get();        
                
                
                
        $visitor30 = DB::table('attendance')->where('atdate','>=', $day30)->get();
        $user30 = DB::table('user')->where('created_at','>=', $day30)->get();
        $cart30 = DB::table('cart')->where('created_at','>=', $day30)->get();
        $classes30 = DB::table('classes')->where('created_at','>=', $day30)->get(); 
        $course30 = DB::table('course')->where('created_at','>=', $day30)->get();
        $attendance30 = DB::table('attendance')->where('created_at','>=', $day30)->get();
        $teacher30 = DB::table('user')->where('role' , 'teacher')->where('created_at','>=', $day30)->get();
                
        $student30 = DB::table('user')->where('role' , 'student')->where('created_at','>=', $day30)->get();
        
        
        
                
                
        $visitor365 = DB::table('attendance')->where('atdate','>=', $day365)->get();
        $user365 = DB::table('user')->where('created_at','>=', $day365)->get();
        $cart365 = DB::table('cart')->where('created_at','>=', $day365)->get();
        $classes365 = DB::table('classes')->where('created_at','>=', $day365)->get(); 
        $course365 = DB::table('course')->where('created_at','>=', $day365)->get();
        $attendance365 = DB::table('attendance')->where('created_at','>=', $day365)->get();
        $teacher365 = DB::table('user')->where('role' , 'teacher')->where('created_at','>=', $day365)->get();
                
        $student365 = DB::table('user')->where('role' , 'student')->where('created_at','>=', $day365)->get();
        
        
        
        
        return view('backend.deshboard' , compact('visitor1' , 'user1' , 'cart1' , 'classes1' , 'course1' , 'teacher1' , 'student1' , 'attendance1' , 'visitor7' , 'user7' , 'cart7' , 'classes7' , 'course7' , 'teacher7' , 'student7' , 'attendance7' , 'visitor30' , 'user30' , 'cart30' , 'classes30' , 'course30' , 'teacher30' , 'student30' , 'attendance30' , 'visitor365' , 'user365' , 'cart365' , 'classes365' , 'course365' , 'teacher365' , 'student365' , 'attendance365'));
    }


    public function editprofile($id) {

        $user = DB::table('user')
        ->where('id',$id)
        ->get();

        $teacher_info = DB::table('teacher_info')
        ->where('userid',$id)
        ->get();

        return view('backend.editprofile', compact('user' , 'teacher_info'));

    }


    public function UpdateAdminPage(Request $req){

        $user = DB::table('user')
        ->where('id', session()->get('userId'))
        ->first();

        if(!empty($req->file('profilePicture'))) {

            $file= $req->file('profilePicture');
            $pp = date('YmdHi').$file->getClientOriginalName();
            $destinationPath = '/backend/profile_picture';
            $file->move(public_path($destinationPath),$pp);

            session(['userImg' => $pp]);


        }else {
            $pp = $user->img;
        }
        
        if(!empty($req->pass)){
            $pass = md5($req->pass);
        }else{
            $pass = $user->pass;
        }


        $class = DB::table('user')
        ->where('id', session()->get('userId'))->update(array(
            'img' => $pp,
            'name' => $req->username,
            'email' => $req->email,
            'addres' => $req->address,
            'phone' => $req->phone,
            'pass' => $pass,
        ));



        $teacher_info = DB::table('teacher_info')
        ->where('userid', session()->get('userId'))
        ->first();
        $teacher_info_count = DB::table('teacher_info')
        ->where('userid', session()->get('userId'))
        ->get();


        if(session()->get('userRole') == 'teacher') {

            if(!empty($req->file('edu_certifi'))){

                $file= $req->file('edu_certifi');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $destinationPath = '/backend/education_certificate';
                $file->move(public_path($destinationPath),$filename);

            }
            else {

                $filename = $teacher_info->edu_cirti;

            }


            if(count($teacher_info_count) > 0){

                $ti = DB::table('teacher_info')
                ->where('userid', session()->get('userId'))->update(array(
                    'edu_deg' => $req->degree,
                    'edu_cirti' => $filename,
                    'exp' => $req->exp,
                    'sub' => $req->subject_exp,
                ));

            }else {

                $addvendor = DB::table('teacher_info')->insert([
                    'userid' => session()->get('userId'),
                    'edu_deg' => $req->degree,
                    'edu_cirti' => $filename,
                    'exp' => $req->exp,
                    'sub' => $req->subject_exp,
                ]);

            }

        }


        return redirect()->back();

    }


    public function loginPage(){
        return view('backend.loginPage');
    }


}
