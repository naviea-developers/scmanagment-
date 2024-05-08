<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Session;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\View;

class cart extends Controller
{
    public function add(Request $req)
    {

        $existingItem = DB::table('cart')
        ->where('type' , $req->type)
        ->where('productid' , $req->id)
        ->where('userId' , session()->get('userId'))
        ->get();



        if (count($existingItem) == 0) {

            $addvendor = DB::table('cart')->insert([
                'userId' => session()->get('userId'),
                'productid' => $req->id,
                'type' => $req->type,
                'quantity' => '1',
                'price' => $req->price,
                'discount' => '',
            ]);

        }else {
            echo "already exist";
        }







        // echo "This Function in under construction";

    }
}
