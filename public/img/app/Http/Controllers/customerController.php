<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class customerController extends Controller
{
    public function orders(Request $req){

        return view("customer.order.order");

    }
}
