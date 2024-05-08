<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\View;

class auth extends Controller
{

    public function index(){

        if(Session::has('userId') && Session::has('userName') && Session::has('userRole') && Session::has('userPic')){

            return view("backend.dashboard");

        }else{
            return view("welcome");

        }

    }



    public function reg(Request $req){

        $file= $req->file('logo');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('/userLogo'), $filename);
        $data['logo']= $filename;
        $logo = 'userLogo/' . $filename;

        $addvendor = DB::table('users')->insert([
            'name' => $req->shopname,
            'logo' => $logo,
            'mail' => $req->username,
            'pass' => $req->password,
            'role' => $req->role,
            'status' => $req->role,
        ]);
        return redirect('/');
    }


    public function login(Request $req){

        $user = DB::table('users')
        ->where('mail' , $req->username)
        ->where('pass' , md5($req->password))
        ->get();

        echo $user;


        if(count($user) == '1'){

            foreach ($user as $key => $u) {

                    session(['userId' => $u->id]);
                    session(['userName' => $u->name]);
                    session(['userRole' => $u->role]);
                    session(['userPic' => $u->logo]);
                    session(['userMail' => $u->mail]);


                if($u->status  == '1'){
                    return redirect('/dashboard');
                }else{
                    return redirect('/panding');
                }

            }

        }else{
            return redirect('/');
        }

    }






    public function logout(){
        Session::flush();
        return redirect('/');
    }
}
