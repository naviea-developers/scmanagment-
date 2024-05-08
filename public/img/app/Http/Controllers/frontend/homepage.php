<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Session;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\View;

class homepage extends Controller
{
    public function index()
    {
        $air = DB::table('air')->limit(4)->orderBy('id', 'desc')->get();

        $airCity = DB::table('air')
        ->distinct('to')
        ->orderBy('id', 'desc')
        ->limit(10)
        ->get('to');


        $hotelCity = DB::table('hotel')->orderBy('id', 'desc')->limit(10)->get();

        $hotel = DB::table('hotel')
        ->orderBy('id', 'desc')
        ->limit(4)
        ->get();


        $hotelPic=array();


        foreach ($hotel as $h) {

            $hotelGallary = DB::table('hotel_gallery')
            ->where('galleryId' , $h->gallery_id)->orderBy('id', 'desc')
            ->first();

            array_push($hotelPic,$hotelGallary);
        }



        $bus = DB::table('bus')->limit(4)->orderBy('id', 'desc')->get();
        $busCity = DB::table('bus')->orderBy('id', 'desc')
        ->distinct('form')
        ->limit(10)
        ->get('form');


        $brand = DB::table('brand')->limit(6)->orderBy('id', 'desc')->get();

        $car = DB::table('car')->limit(4)->orderBy('id', 'desc')->get();
        $carCity = DB::table('car')->orderBy('id', 'desc')
        ->distinct('to')
        ->limit(10)
        ->get('to');

        $package = DB::table('package')->limit(6)->orderBy('id', 'desc')->get();




        $Sbanner = DB::table('category')->limit(1)
        ->leftJoin('banner' , 'category.id' , 'banner.category')
        ->get();

        $banners = DB::table('category')->skip(1)->limit(2)
        ->leftJoin('banner' , 'category.id' , 'banner.category')
        ->get();


        $AllServiceCity = DB::table('air')
        ->distinct('form')
        ->distinct('to')
        ->orderBy('id', 'desc')
        ->limit(5)
        ->get(['to' , 'form']);

        $AllServiceAir = DB::table('air')->limit(1)->orderBy('id', 'desc')->get();
        $AllServiceBus = DB::table('bus')->limit(1)->orderBy('id', 'desc')->get();
        $AllServiceCar = DB::table('car')->limit(1)->orderBy('id', 'desc')->get();
        $AllServiceHotel = DB::table('hotel')->limit(1)->orderBy('id', 'desc')->get();

        $AllServiceHotelImg = DB::table('hotel_gallery')->limit(1)->orderBy('id', 'desc')->first();


        $coupon = DB::table('coupon')->limit(3)->orderBy('id', 'desc')->get();


        $shopping = DB::table('shopping')->limit(10)->orderBy('id', 'desc')->get();
        $shoppingTag = DB::table('shopping')->limit(10)
        ->orderBy('id', 'desc')
        ->distinct('category')
        ->get(['category']);


        $slider = DB::table('slider')->get();



        return view("frontend.welcome" , compact('air' , 'airCity' , 'hotel' , 'hotelCity' , 'hotelPic' , 'bus' , 'busCity' , 'brand' , 'car' , 'carCity' , 'package' , 'Sbanner' , 'banners' , 'AllServiceCity' , 'AllServiceAir' , 'AllServiceBus', 'AllServiceCar' , 'AllServiceHotel' , 'AllServiceHotelImg' , 'coupon' , 'shopping' , 'shoppingTag' , 'slider'));

    }




    public function signupData(Request $req)
    {

        $addvendor = DB::table('users')->insert([
            'name' => $req->name,
            'phone' => $req->phone,
            'mail' => $req->email,
            'pass' => md5($req->pass),
            'role' => '0',
        ]);

        $userId = DB::table('users')->where('email', $req->email)->where('pass', md5($req->pass))
        ->first();

        if ($addvendor == 1) {
            echo "Added";
        } else {
            echo "Not Ok";
        }
            session(['userId' => $userId->id]);
            session(['userName' => $userId->name]);
            session(['userPhone' => $userId->phone]);
            session(['userRole' => $userId->role]);
            session(['userPic' => $userId->logo]);
            session(['userMail' => $userId->mail]);

        return redirect('/');

    }





    public function homepagelogin(Request $req)
    {

        $user = DB::table('users')
            ->where('mail', $req->phone)
            ->where('pass', md5($req->pass))
            ->first();

        if (!empty($user)) {

            session(['userId' => $user->id]);
            session(['userName' => $user->name]);
            session(['userPhone' => $user->phone]);
            session(['userRole' => $user->role]);
            session(['userPic' => $user->logo]);
            session(['userMail' => $user->mail]);

            return redirect('/');;



        }else {
            return back();
        }



    }


    public function userProfile(){
        $userData = DB::table('users')->get();
        return view('frontend.profile.editprofile',compact('userData'));
    }





}
