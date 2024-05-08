<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Session;

use Redirect;

use Illuminate\Support\Facades\DB;
class user extends Controller
{

    public function addNewUser(){
        return view('backend.user.addNewUser');
    }

    public function insertUser (Request $req) {

        $user = DB::table('user')->insert([
            'name' => $req->name,
            'email' => $req->email,
            'role' => $req->role,
            'pass' => md5($req->pass),
        ]);

        return Redirect::to('/manageUser')
        ->with('msg', 'User Added Successfully');

    }


    public function manageUser() {

        $user = DB::table('user')
        ->get();

        return view('backend.user.manageUser',
        compact('user'));

    }



    public function deleteUser($id) {
        $user = DB::table('user')
        ->where('id' , $id)
        ->delete();

        return Redirect::to('/manageUser')
        ->with('msg', 'User Deleted Successfully');
    }


    public function editUser ($id) {

        $user = DB::table('user')
        ->where('id' , $id)
        ->get();

        return view('backend.user.edituser',
        compact('user'));

    }



    public function updateUserInfo (Request $req) {

        $class = DB::table('user')
        ->where('id', $req->userId)->update(array(
            'name' => $req->username,
            'role' => $req->role,
            'email' => $req->email,
            'phone' => $req->phone,
        ));

        return Redirect::to('/manageUser')
        ->with('msg', 'User Update Successfully');
    }


}
