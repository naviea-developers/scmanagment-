<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Session;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\View;

class category extends Controller
{

    public function ShopCategory(){

        $number_of_product = DB::table('shopping')->get();

        $shopping = DB::table('shopping')
        ->orderBy('id', 'desc')->get();

        $categoris = DB::table('shopping')->orderBy('id' , 'desc')->get(['category']);

        return view("frontend.category" , compact('shopping' , 'number_of_product' , 'categoris'));

    }


    public function singleproduct ($id) {

        $product = DB::table('shopping')
        ->where('id' , $id)->get();

        $imgId = DB::table('shopping')
        ->where('id' , $id)->first(['imgGallery']);


        $productGallary = DB::table('product_gallery')
        ->where('galleryId' , $imgId->imgGallery)->get();

        $related_product = DB::table('shopping')
        ->distinct('category')
        ->limit(4)
        ->orderBy('id' , 'desc')->get();


        return view("frontend.singleProduct" , compact('product' , 'productGallary' , 'related_product'));

    }

}
