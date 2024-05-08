<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function addCart(){
        $course = DB::table('course')->get();
        return view('backend.cart.addCart',compact('course'));

    }

    public function storeCart($id){
        $course = DB::table('course')->where('id',$id)->first();

        $data = DB::table('cart')->insert([
            'userId' => session()->get('userName'),
            'courseId'=>$course->id,
            'name'=>$course->name,
            'file'=>$course->image,
            'total_price'=>$course->price,
            'quantity'=>1
        ]);

        return redirect()->back();
    }

    public function viewCart(){
        $cartData = DB::table('cart')->get();
        return view('backend.cart.viewCart',compact('cartData'));
    }

}
