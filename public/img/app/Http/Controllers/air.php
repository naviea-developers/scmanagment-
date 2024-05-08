<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\View;

class air extends Controller
{
    public function get() {

        if(Session::has('userId') && Session::has('userName') && Session::has('userRole') && Session::has('userPic')){
            $air = DB::table('air')->get();
            return view("backend.booking.air.manage" , compact('air'));
        }else{
            return view("welcome");

        }

    }


    public function uploadAir(Request $req) {

       $file= $req->file('logo');
       $filename= date('YHimd').$file->getClientOriginalName();
       $file-> move(public_path('/air'), $filename);
       $data['logo']= $filename;
       $img = 'air/' . $filename;

       $addvendor = DB::table('air')->insert([
           'name' => $req->name,
           'model' => $req->model,
           'class' => $req->class,
           'form' => $req->form,
           'to' => $req->to,
           'date' => $req->date,
           'start_at' => $req->takeoff,
           'end_at' => $req->landing,
           'price' => $req->price,
           'description' => $req->description,
           'img' => $img
       ]);

        return redirect('getAir');

    }


    public function deleteAir($id){

        $air = DB::table('air')
        ->where('id' , $id)
        ->delete();

        return redirect('getAir');
    }


}
