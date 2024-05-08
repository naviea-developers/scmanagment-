<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\View;

class bus extends Controller
{
    public function getBus() {

        if(Session::has('userId') && Session::has('userName') && Session::has('userRole') && Session::has('userPic')){
            $bus = DB::table('bus')->get();
            return view("backend.booking.bus.manage" , compact('bus'));
        }else{
            return view("welcome");

        }

    }


    public function uploadBus(Request $req) {

        $file= $req->file('logo');
        $filename= date('YHimd').$file->getClientOriginalName();
        $file-> move(public_path('/bus'), $filename);
        $data['logo']= $filename;
        $img = 'bus/' . $filename;

        $addvendor = DB::table('bus')->insert([
            'name' => $req->name,
            'model' => $req->model,
            'coach' => $req->class,
            'form' => $req->form,
            'to' => $req->to,
            'date' => $req->date,
            'price' => $req->price,
            'description' => $req->description,
            'img' => $img
        ]);

         return redirect('getBus');

     }


     public function deletebus($id){

        $air = DB::table('bus')
        ->where('id' , $id)
        ->delete();

        return redirect('getBus');
    }


}
