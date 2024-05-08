<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\View;

class couponController extends Controller
{
   public function getCoupon(Request $req){

    $coupon = DB::table('coupon')->get();

    return view("backend.coupon.manage" , compact('coupon'));

   }


   public function uploadCoupon(Request $req){

        $addvendor = DB::table('coupon')->insert([
            'title' => $req->title,
            'code' => $req->code,
            'type' => $req->type,
            'amount' => $req->amount,
        ]);

        return redirect('getCoupon');
   }

   public function editCoupon(){
        return back();
   }


   public function deleteCoupon($id) {

        $coupon = DB::table('coupon')
        ->where('id' , $id)
        ->delete();

        return redirect('getCoupon');

   }

}
