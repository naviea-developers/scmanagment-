<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\View;

class shopping extends Controller
{
    public function getProduct() {

        $shopping = DB::table('shopping')->get();
        return view("backend.shopping.manage" , compact('shopping'));

    }


    public function uploadProduct(Request $req) {

        // shopping
        $galleryId = date('YHimd');

        $file= $req->file('logo');
        $logo= date('YHimd').$file->getClientOriginalName();
        $file-> move(public_path('/shopping'), $logo);
        $data['logo']= $logo;
        $logo = 'shopping/' . $logo;

        $files = $req->file('productImgs');


        foreach ($files as $i=>$file) {
            $filename= date('YHimd').$file->getClientOriginalName();
            $file-> move(public_path('/shopping'), $filename);
            $img = 'shopping/' . $filename;

            DB::table('Product_gallery')->insert([
                'galleryId' => $galleryId,
                'src' => $img,
                'time' => now(),
            ]);


        }

        $addvendor = DB::table('shopping')->insert([
            'title' => $req->name,
            'img' => $logo,
            'imgGallery' => $galleryId,
            'price' => $req->price,
            'brand' => $req->brand,
            'shortdesc' => $req->srtDes,
            'longdesc' => $req->longDsc,
            'tag' => $req->tag,
            'category' => $req->type,
            'qnt' => $req->qnty,
            'delevery_crg' => $req->deliverCharge,
        ]);

        return redirect('getProduct');

    }


    public function editProduct($id) {

        $shopping = DB::table('shopping')
        ->where('id' , $id)
        ->get();

        return view("backend.shopping.edit" , compact('shopping'));
    }

    public function deleteProduct($id) {

        $shopping = DB::table('shopping')
        ->where('id' , $id)
        ->delete();

        return redirect('getProduct');

    }


    public function updateProduct(Request $req) {

           // shopping
           $galleryId = date('YHimd');

           $Oldshopping = DB::table('shopping')
            ->where('id' , $req->id)
            ->first();

           if(!empty($req->file('logo'))){
            $file= $req->file('logo');
            $logo= date('YHimd').$file->getClientOriginalName();
            $file-> move(public_path('/shopping'), $logo);
            $data['logo']= $logo;
            $logo = 'shopping/' . $logo;
           }

           if(!empty($req->file('productImgs'))) {
                $files = $req->file('productImgs');
                foreach ($files as $i=>$file) {
                    $filename= date('YHimd').$file->getClientOriginalName();
                    $file-> move(public_path('/shopping'), $filename);
                    $img = 'shopping/' . $filename;

                    DB::table('Product_gallery')->insert([
                        'galleryId' => $galleryId,
                        'src' => $img,
                        'time' => now(),
                    ]);
                }
           }




           $addvendor = DB::table('shopping')
           ->where('id' , $req->id)->update([
               'title' => $req->name,
               'img' => $Oldshopping->img,
               'imgGallery' => $Oldshopping->imgGallery,
               'price' => $req->price,
               'brand' => $req->brand,
               'shortdesc' => $req->srtDes,
               'longdesc' => $req->longDsc,
               'qnt' => $req->qnty,
               'delevery_crg' => $req->deliverCharge,
           ]);

           return redirect('getProduct');

    }

}
