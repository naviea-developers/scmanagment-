<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\View;

class hotel extends Controller
{
    public function getHotel() {

        if(Session::has('userId') && Session::has('userName') && Session::has('userRole') && Session::has('userPic')){

            $hotel = DB::table('hotel')->get();
            return view("backend.booking.hotel.manage" , compact('hotel'));

        }else{
            return view("welcome");
        }

    }


    public function uploadHotel(Request $req){

        $galleryId = date('YHimd');

        $files = $req->file('photos');
        foreach ($files as $i=>$file) {

            $filename= date('YHimd').$file->getClientOriginalName();
            $file-> move(public_path('/hotel'), $filename);
            $img = 'hotel/' . $filename;

             $hotel_gallery = DB::table('hotel_gallery')->insert([
                'galleryId' => $galleryId,
                'src' => $img,
                'time' => now(),
             ]);

        }

        $addvendor = DB::table('hotel')->insert([
            'name' => $req->name,
            'address' => $req->address,
            'gallery_id' => $galleryId,
            'checkin' => $req->checkin,
            'checkout' => $req->checkout,
            'num_of_room' => $req->number_of_room,
            'room_capacity' => $req->room_capacity,
            'type' => $req->type,
            'description' => $req->description,
            'price' => $req->price,
        ]);

        return redirect('getHotel');

    }



    public function getHotelPhotos(Request $req){

        $hotel = DB::table('hotel_gallery')
        ->where('galleryId' , $req->id)
        ->get();

        foreach ($hotel as $i => $hotelphoto) {

            echo "<div class='column'><img src='$hotelphoto->src' onclick='myFunction(this);'></div>";

        }

    }



    public function editHotel($id){

        $hotelinfo = DB::table('hotel')
        ->where('id' , $id)
        ->first(['gallery_id']);

        $hotel = DB::table('hotel')
        ->where('id' , $id)
        ->get();

        $hotel_pic = DB::table('hotel_gallery')
        ->where('galleryId' , $hotelinfo->gallery_id)
        ->get();

        return view("backend.booking.hotel.edit" , compact('hotel' , 'hotel_pic'));

    }


    public function updateHotel(Request $req){

        $galleryId = date('YHimd');

        if(!empty($req->file('photos')))
        {
            $files = $req->file('photos');
            foreach ($files as $i=>$file) {

                $filename= date('YHimd').$file->getClientOriginalName();
                $file-> move(public_path('/hotel'), $filename);
                $img = 'hotel/' . $filename;

                 $hotel_gallery = DB::table('hotel_gallery')->insert([
                    'galleryId' => $galleryId,
                    'src' => $img,
                    'time' => now(),
                 ]);

            }
            // id
            $addvendor = DB::table('hotel')
            ->where('id', $req->id)
            ->update([
                'name' => $req->name,
                'address' => $req->address,
                'gallery_id' => $galleryId,
                'checkin' => $req->checkin,
                'checkout' => $req->checkout,
                'num_of_room' => $req->number_of_room,
                'room_capacity' => $req->room_capacity,
                'type' => $req->type,
                'description' => $req->description,
                'price' => $req->price,
            ]);
        }else{

            $addvendor = DB::table('hotel')
            ->where('id', $req->id)
            ->update([
                'name' => $req->name,
                'address' => $req->address,
                'checkin' => $req->checkin,
                'checkout' => $req->checkout,
                'num_of_room' => $req->number_of_room,
                'room_capacity' => $req->room_capacity,
                'type' => $req->type,
                'description' => $req->description,
                'price' => $req->price,
            ]);

        }




        return redirect('getHotel');

    }



}
