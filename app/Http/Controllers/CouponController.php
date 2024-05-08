<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


class CouponController extends Controller
{
    public function totalCoupon(){

        $coupon = DB::table('coupon')->get();
        return view('backend.coupon.totalcoupon',compact('coupon'));
    }

    public function addCoupon(){
        return view('backend.coupon.addcoupon');
    }
    public function storeCoupon(Request $request){

        $coupon = DB::table('coupon')->insert(array([
            'code' => $request->code,
            'discount' => $request->discount,
            'type' => $request->type,
            'status' => $request->status

        ]));

        return redirect()->route('totalCoupon');

    }

    public function editCoupon($id){
        $editCoupon = DB::table('coupon')->where('id',$id)->get();

        return view('backend.coupon.editcoupon', compact('editCoupon'));
    }

    public function updateCoupon(Request $request , $id){

        DB::table('coupon')->where('id', $id)->update([
            'code' => $request->code,
            'discount' => $request->discount,
            'type' => $request->type,
            'status' => $request->status
        ]);

        return redirect()->route('totalCoupon');

    }
    public function deleteCoupon($id){
        DB::table('coupon')->where('id', $id)->delete();

        return redirect()->route('totalCoupon');
    }
}
