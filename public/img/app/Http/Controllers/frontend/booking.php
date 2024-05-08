<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Session;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\View;

class booking extends Controller
{
    public function booking ($id) {


        if($id == 'bus'){
            $transport = DB::table('bus')->orderBy('id' , 'desc')->get();
            $NF_transport = DB::table('bus')->get(['id']);
            $allRoots = DB::table('bus')->distinct('to')->get('to');
        }
        elseif ($id == 'car') {
            $transport = DB::table('car')->orderBy('id' , 'desc')->get();
            $allRoots = DB::table('car')->distinct('to')->get('to');
            $NF_transport = DB::table('car')->get(['id']);
        }
        elseif ($id == 'air') {
            $transport = DB::table('air')->orderBy('id' , 'desc')->get();
            $allRoots = DB::table('air')->distinct('to')->get('to');
            $NF_transport = DB::table('air')->get(['id']);
        }else {
            return back();
        }


        return view("frontend.booking.manage" , compact('transport' , 'allRoots' , 'NF_transport' , 'id'));

    }


    public function viewTransport($cat , $id){

        // echo $cat;
        // echo $id;

        if($cat == 'bus') {

            $transport = DB::table('bus')
            ->where('id' , $id)
            ->get();

        }
        elseif ($cat == 'car'){

            $transport = DB::table('car')
            ->where('id' , $id)
            ->get();

        }elseif ($cat == 'air')
        {
            $transport = DB::table('air')
            ->where('id' , $id)
            ->get();

        }else {
            return back();
        }


        return view("frontend.booking.singleView" , compact('transport' , 'cat'));


    }


    public function viewPackage($id) {

        $package = DB::table('package')
        ->where('id' , $id)
        ->get();

        return view("frontend.booking.packageVIew" , compact('package'));

    }


    public function viewAllPackage() {

        $package = DB::table('package')->orderBy('id' , 'desc')->get();

        $package_loc = DB::table('package')
        ->distinct('location')
        ->orderBy('id' , 'desc')
        ->get(['location']);

        return view("frontend.booking.viewAllPackage" , compact('package' , 'package_loc'));

    }


    public function viewAllHotel(Request $req) {

        $hotel = DB::table('hotel')->orderBy('id' , 'desc')->get();

        $number_of_hotel = DB::table('hotel')->get(['id']);

        $hotel = DB::table('hotel')
        ->orderBy('id', 'desc')
        ->get();

        $hotelPic=array();


        foreach ($hotel as $h) {

            $hotelGallary = DB::table('hotel_gallery')
            ->where('galleryId' , $h->gallery_id)->orderBy('id', 'desc')
            ->first();

            array_push($hotelPic,$hotelGallary);
        }

        $price_range = DB::table('hotel')->distinct('price')->orderBy('price' , 'asc')->get(['price']);

        $hotelCity = DB::table('hotel')
        ->orderBy('id' , 'desc')->get(['address']);

        return view("frontend.booking.viewhotel" , compact('hotel' , 'hotelCity' , 'number_of_hotel' , 'hotelPic' , 'price_range'));

    }


    public function hotelFullView($id) {


        $hotel = DB::table('hotel')
        ->where('id' , $id)
        ->get();

        $hotel_gallary = DB::table('hotel')
        ->where('id' , $id)
        ->first();

        $hotel_photos = DB::table('hotel_gallery')
        ->where('galleryId' , $hotel_gallary->gallery_id)
        ->limit(5)
        ->get();

        return view("frontend.booking.hotelFullView" , compact('hotel' , 'hotel_photos'));


    }


}
