<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use Redirect;
use Socialite;

use Illuminate\Support\Facades\DB;

class social_login extends Controller
{

    public function socialLogin() {

        return Socialite::driver('google')->redirect();

    }


    public function authRedirect() {

        $user = Socialite::driver('google')->user();

        $userInfo = DB::table('user')
                ->where('email' , $user->email)
                ->first();

        print_r($userInfo);

        if($userInfo->role == 'student') {

            session(['userId' => $userInfo->id]);
            session(['userName' => $userInfo->name]);
            session(['userEmail' => $user->email]);
            session(['userRole' => 'student']);
            session(['userImg' => $userInfo->img]);
            session(['status' => $userInfo->status]);

            return Redirect::to('/viewIndex')
            ->with('msg', 'Welcome Back  ' . ucwords($userInfo->role));

        }

        elseif ($userInfo->role == 'teacher') {

            session(['userId' => $userInfo->id]);
            session(['userName' => $userInfo->name]);
            session(['userEmail' => $userInfo->email]);
            session(['userRole' => 'teacher']);
            session(['userImg' => $userInfo->img]);
            session(['status' => $userInfo->status]);

            return Redirect::to('/deshboard')
                    ->with('msg', 'Welcome Back  ' . ucwords($userInfo->role));

        }

        else {

            session(['userId' => $userInfo->id]);
            session(['userName' => $userInfo->name]);
            session(['userEmail' => $userInfo->email]);
            session(['userRole' => $userInfo->role]);
            session(['userImg' => $userInfo->img]);
            session(['status' => $userInfo->status]);


            return Redirect::to('/deshboard')
                ->with('msg', 'Welcome Back  ' . ucwords($userInfo->role));

        }



    }
}
