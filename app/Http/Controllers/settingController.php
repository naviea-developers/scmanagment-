<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use Redirect;

use Illuminate\Support\Facades\DB;

class settingController extends Controller
{


    public function viewAbout () {

        $about = DB::table('about')
        ->get();
        return view('backend.setting.about', compact('about'));

    }


    public function editAbout () {

        $about = DB::table('about')
        ->get();
        return view('backend.setting.editAbout', compact('about'));

    }


    public function insertAbout (Request $req) {

        $about = DB::table('about')
        ->get();

        if(count($about) > 0){
            $old = DB::table('about')->delete();
        }

        $user = DB::table('about')->insert([
            'aboutData' => $req->about,
            'created_at' => now(),
        ]);

        return Redirect::to('/viewAbout')
        ->with('msg', 'About Added Successfully');

    }


    public function viewPolicy() {

        $policy = DB::table('policy')
        ->get();
        return view('backend.setting.policy', compact('policy'));

    }


    public function editPolicy() {

        $policy = DB::table('policy')->get();
        return view('backend.setting.editPolicy', compact('policy'));

    }


    public function insertPolicy(Request $req) {

        $about = DB::table('policy')
        ->get();

        if(count($about) > 0){
            $old = DB::table('policy')->delete();
        }

        $user = DB::table('policy')->insert([
            'policyData' => $req->policy,
            'created_at' => now(),
        ]);

        return Redirect::to('/viewPolicy')
        ->with('msg', 'Policy Added Successfully');

    }


    public function terms() {

        $terms = DB::table('terms')
        ->get();
        return view('backend.setting.terms', compact('terms'));

    }

    public function editTerms() {

        $terms = DB::table('terms')
        ->get();
        return view('backend.setting.editTerms', compact('terms'));

    }


    public function insertTrams(Request $req) {

        $about = DB::table('terms')
        ->get();

        if(count($about) > 0){
            $old = DB::table('terms')->delete();
        }

        $user = DB::table('terms')->insert([
            'termsData' => $req->trmsData,
            'created_at' => now(),
        ]);

        return Redirect::to('/terms')
        ->with('msg', 'Terms of Service Added Successfully');

    }



    public function address() {

        $address = DB::table('address')
        ->get();
        return view('backend.setting.address.manageAddress', compact('address'));

    }

    public function addAddress() {

        return view('backend.setting.address.addAdress');

    }

    public function uploadAddress(Request $req) {

        $user = DB::table('address')->insert([
            'title' => $req->title,
            'addressData' => $req->data,
            'created_at' => now(),
        ]);

        return redirect('/address');

    }


    public function editAddress ($id) {

        $address = DB::table('address')
        ->where('id' , $id)
        ->get();
        return view('backend.setting.address.edit', compact('address'));

    }


    public function deleteAddress ($id) {

        $address = DB::table('address')
        ->where('id' , $id)
        ->delete();

        return redirect('/address');

    }


    public function updateAddress (Request $req) {

        $user = DB::table('address')
        ->where('id' , $req->id)
        ->update([
            'title' => $req->title,
            'addressData' => $req->data,
            'created_at' => now(),
        ]);

    }



    public function paymentAccept() {

        $payment_accept = DB::table('payment_accept')
        ->get();
        return view('backend.setting.payment_accept.manage', compact('payment_accept'));

    }


    public function addPaymentMethod() {

        return view('backend.setting.payment_accept.addPay');

    }


    public function uploadPaymentMethod(Request $req) {


        $file= $req->file('img');
        $filename = date('YmdHi').$file->getClientOriginalName();
        $destinationPath = '/payment_method';
        $file->move(public_path($destinationPath),$filename);

        $user = DB::table('payment_accept')->insert([
            'title' => $req->title,
            'src' => $filename,
            'created_at' => now(),
        ]);

        return redirect('/paymentAccept');

    }


    public function deletePaymentMethod ($id) {


        $address = DB::table('payment_accept')
        ->where('id' , $id)
        ->delete();

        return redirect('/paymentAccept');
    }



}
