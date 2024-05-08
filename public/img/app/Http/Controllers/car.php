<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\View;
class car extends Controller
{
    public function getCar() {

        if(Session::has('userId') && Session::has('userName') && Session::has('userRole') && Session::has('userPic')){
            $car = DB::table('car')->get();
            return view("backend.booking.car.manage" , compact('car'));
        }else{
            return view("welcome");

        }

    }


    public function uploadCar(Request $req){

        $file= $req->file('logo');
        $filename= date('YHimd').$file->getClientOriginalName();
        $file-> move(public_path('/car'), $filename);
        $data['logo']= $filename;
        $img = 'car/' . $filename;

        $addvendor = DB::table('car')->insert([
            'name' => $req->name,
            'model' => $req->model,
            'type' => $req->type,
            'form' => $req->form,
            'to' => $req->to,
            'date' => $req->date,
            'price' => $req->price,
            'description' => $req->description,
            'img' => $img
        ]);

         return redirect('getCar');

    }

    public function deleteCar($id){

        $air = DB::table('car')
        ->where('id' , $id)
        ->delete();

        return redirect('getCar');
    }


}
