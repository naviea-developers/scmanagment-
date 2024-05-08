<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\View;

class packageController extends Controller
{
    public function getPackage() {

        $package = DB::table('package')->orderBy('id' , 'desc')->get();
        return view("backend.package.manage" , compact('package'));

    }


    public function uploadPackage(Request $req) {

        $file= $req->file('logo');
        $filename= date('YHimd').$file->getClientOriginalName();
        $file-> move(public_path('/package'), $filename);
        $data['logo']= $filename;
        $img = 'package/' . $filename;

        $addvendor = DB::table('package')->insert([
            'img' => $img,
            'title' => $req->name,
            'details' => $req->details,
            'location' => $req->location,
            'duration' => $req->duration,
            'date' => $req->date,
            'price' => $req->price,
        ]);

         return redirect('getPackage');

    }


    public function editPackage($id) {

        $package = DB::table('package')
        ->where('id' , $id)->get();
        return view("backend.package.edit" , compact('package'));

    }

    public function updatePackage(Request $req){

        ;

        $package = DB::table('package')->where('id' , $req->id)->first();

        if(!empty($req->file('logo'))){
            $file= $req->file('logo');
            $filename= date('YHimd').$file->getClientOriginalName();
            $file-> move(public_path('/package'), $filename);
            $data['logo']= $filename;
            $img = 'package/' . $filename;
        }else {
            $img = $package->img;
        }



        $addvendor = DB::table('package')->where('id' , $req->id)->update([
            'img' => $img,
            'title' => $req->name,
            'details' => $req->details,
            'location' => $req->location,
            'duration' => $req->duration,
            'date' => $req->date,
            'price' => $req->price,
        ]);

         return redirect('getPackage');

    }


    public function deletePackage($id){
        $package = DB::table('package')
        ->where('id' , $id)->delete();

        return redirect('getPackage');

    }


}
