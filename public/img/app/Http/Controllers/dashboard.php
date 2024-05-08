<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\View;

class dashboard extends Controller
{
    public function dashboard(){

        if(Session::has('userId') && Session::has('userName') && Session::has('userRole') && Session::has('userPic')){

            return view("backend.dashboard");

        }else{
            return redirect('/');
        }


    }
}
