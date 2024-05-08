<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\View;

class homeController extends Controller
{
    public function getCategory(){

        if(Session::has('userId') && Session::has('userName') && Session::has('userRole') && Session::has('userPic')){

            $totalCategory = DB::table('category')->get(['id']);
            $category = DB::table('category')->limit(10)->get();

            return view("backend.home.category" , compact('category' , 'totalCategory'));

        }else{
            return view("welcome");

        }

    }


    public function catagorylazy(Request $req){
        $loaded = $req->loaded;
        $category = DB::table('category')->skip($req->loaded)->take(10)->get();
        return view("backend.home.categorypaginet" , compact('category' , 'loaded'));
    }




    public function insertCategory(Request $req){
        $file= $req->file('img');
        $filename= date('YHimd').$file->getClientOriginalName();
        $file-> move(public_path('/CategoryImg'), $filename);
        $data['img']= $filename;
        $img = 'CategoryImg/' . $filename;

        $addvendor = DB::table('category')->insert([
            'Priority' => $req->priority,
            'name' => $req->CategoryName,
            'description' => $req->description,
            'img' => $img
        ]);

        return redirect('/category');
    }


    public function editCategory(Request $req){

        $category = DB::table('category')
        ->where('id' , $req->catId)
        ->get();

        return view("backend.home.editCategory" , compact('category'));

    }

    public function updateCategory(Request $req){

        $category = DB::table('category')->where('id' , $req->catId)->get();

        foreach ($category as $key => $catI) {
            $img = $catI->img;
        }

        if($req->file('img')){
            unlink($img);
            $file= $req->file('img');
            $filename= date('YHimd').$file->getClientOriginalName();
            $file-> move(public_path('/CategoryImg'), $filename);
            $data['img']= $filename;
            $img = 'CategoryImg/' . $filename;
        }

        $update = DB::table('category')->where('id', $req->catId)->update(array(
            'Priority' => $req->priority,
            'name' => $req->CategoryName,
            'description' => $req->catDesc,
            'img' => $img,
        ));

        return redirect('/category');

    }

    public function deleteCategory(Request $req){

        $category = DB::table('category')->where('id' , $req->catId)->get();

        foreach ($category as $key => $catI) {
            unlink($catI->img);
        }

        DB::table('category')->where('id', '=' , $req->catId)->delete();

        return redirect('/category');

    }










    public function getSubCategory(Request $req){

        if(Session::has('userId') && Session::has('userName') && Session::has('userRole') && Session::has('userPic')){

            $subcategory = DB::table('subcategory')->limit(10)->get();
            $category = DB::table('category')->get(['id' , 'name']);
            $totalsubcategory = DB::table('subcategory')->get(['id']);

            return view("backend.home.subCategory" , compact('subcategory' , 'category' , 'totalsubcategory'));

        }else{
            return view("welcome");

        }

    }


    public function subcatagorylazy(Request $req){
        $loaded = $req->loaded;
        $subcategory = DB::table('subcategory')->skip($req->loaded)->take(10)->get();
        $category = DB::table('category')->get(['id' , 'name']);
        return view("backend.home.subCategorypaginat" , compact('subcategory' , 'category' , 'loaded'));
    }




    public function addSubCatagory(Request $req){

        if(Session::has('userId') && Session::has('userName') && Session::has('userRole') && Session::has('userPic')){

            $category = DB::table('category')->get();

            return view("backend.home.addSubCategory" , compact('category'));

        }else{
            return view("welcome");

        }

    }



    public function insertSubCategory(Request $req){

        $file= $req->file('img');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('/CategoryImg/SubCategoryImg'), $filename);
        $data['img']= $filename;
        $img = 'CategoryImg/SubCategoryImg/' . $filename;

        $addvendor = DB::table('subcategory')->insert([
            'name' => $req->SubCategoryName,
            'description' => $req->SubcatDesc,
            'mainCategory' => $req->catagoryId,
            'img' => $img
        ]);

        return redirect('/subCategory');

    }


    public function editSubCategory(Request $req){


        $category = DB::table('category')->get(['id' , 'name']);

        $subcategory = DB::table('subcategory')
        ->where('id' , $req->catId)
        ->get();

        return view("backend.home.editSubCategory" , compact('subcategory' , 'category'));

    }



    public function updateSubCategory(Request $req){

        $category = DB::table('subcategory')->where('id' , $req->catId)->get();

        foreach ($category as $key => $catI) {
            $img = $catI->img;
        }

        if($req->file('img')){
            unlink($img);
            $file= $req->file('img');
            $filename= date('YHimd').$file->getClientOriginalName();
            $file-> move(public_path('/CategoryImg/SubCategoryImg'), $filename);
            $data['img']= $filename;
            $img = '/CategoryImg/SubCategoryImg/' . $filename;
        }


        $update = DB::table('subcategory')->where('id', $req->catId)->update(array(
            'name' => $req->SubCategoryName,
            'description' => $req->SubcatDesc,
            'mainCategory' => $req->catagoryId,
            'img' => $img
        ));

        return redirect('/subCategory');

    }


    public function deleteSubCategory(Request $req){

        $category = DB::table('subcategory')->where('id' , $req->catId)->get();

        foreach ($category as $key => $catI) {
            unlink($catI->img);
        }

        DB::table('subcategory')->where('id', '=' , $req->catId)->delete();

        return redirect('/subCategory');

    }


















    public function brand(Request $req){

        if(Session::has('userId') && Session::has('userName') && Session::has('userRole') && Session::has('userPic')){

            $category = DB::table('category')->get(['id' , 'name']);

            $brand = DB::table('brand')->limit(10)->get();
            $totalbrand = DB::table('brand')->get(['id']);

            return view("backend.home.brand" , compact('brand' , 'category' , 'totalbrand'));

        }else{
            return view("welcome");

        }

    }


    public function brandlazy(Request $req){

        $category = DB::table('category')->get(['id' , 'name']);
        $brand = DB::table('brand')->skip($req->loaded)->take(10)->get();
        $totalbrand = DB::table('brand')->get(['id']);
        return view("backend.home.brandPaginat" , compact('brand' , 'category' , 'totalbrand'));

    }

    public function addBrand(Request $req){

        $category = DB::table('category')->get(['id' , 'name']);

        return view("backend.home.addBrand" , compact('category'));

    }


    public function insertBrand(Request $req){

        $file= $req->file('img');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('/BrandImg'), $filename);
        $data['img']= $filename;
        $img = 'BrandImg/' . $filename;

        $addvendor = DB::table('brand')->insert([
            'name' => $req->brandName,
            'category' => $req->catagoryId,
            'img' => $img
        ]);

        return redirect('/brand');

    }





    public function editBrand(Request $req){

        $category = DB::table('category')->get(['id' , 'name']);

        $brand = DB::table('brand')
        ->where('id' , $req->catId)
        ->get();

        return view("backend.home.editBrand" , compact('brand' , 'category'));

    }



    public function updateBrand(Request $req){

        $brand = DB::table('brand')->where('id' , $req->catId)->get();

        foreach ($brand as $key => $b) {
            $img = $b->img;
        }

        if($req->file('img')){
            unlink($img);
            $file= $req->file('img');
            $filename= date('YHimd').$file->getClientOriginalName();
            $file-> move(public_path('/BrandImg'), $filename);
            $data['img']= $filename;
            $img = 'BrandImg/' . $filename;
        }


        $update = DB::table('brand')->where('id', $req->catId)->update(array(
            'name' => $req->brandName,
            'category' => $req->catagoryId,
            'img' => $img
        ));

        return redirect('/brand');

    }




    public function deleteBrand(Request $req){

        $brand = DB::table('brand')->where('id' , $req->catId)->get();

        foreach ($brand as $key => $b) {
            unlink($b->img);
        }

        DB::table('brand')->where('id', '=' , $req->catId)->delete();

        return redirect('/brand');

    }


    public function slider(){

        $slider = DB::table('slider')->get();

        $category = DB::table('category')->get(['id' , 'name']);

        return view("backend.home.slider.slider" , compact('slider' , 'category'));

    }


    public function addSlider(){

        $slider = DB::table('slider')->get();

        $category = DB::table('category')->get(['id' , 'name']);

        return view("backend.home.slider.addSlider" , compact('slider' , 'category'));

    }


    public function insertSlider(Request $req){

        $file= $req->file('img');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('/slider'), $filename);
        $data['img']= $filename;
        $img = 'slider/' . $filename;

        $addvendor = DB::table('slider')->insert([
            'category' => $req->catagoryId,
            'img' => $img
        ]);

        return redirect('/sliders');

    }



    public function deleteSlider(Request $req){

        $slider = DB::table('slider')->where('id' , $req->slideId)->get();

        foreach ($slider as $key => $s) {
            unlink($s->img);
        }

        DB::table('slider')->where('id', '=' , $req->slideId)->delete();

        return redirect('/sliders');

    }


    public function banners(Request $req){

        $category = DB::table('category')->get();
        $subcategory = DB::table('subcategory')->get();
        $banner = DB::table('banner')->get();

        return view("backend.home.banner.banner" , compact('banner' , 'category' , 'subcategory'));


    }


    public function addBanner(){

        $category = DB::table('category')->get(['id' , 'name']);

        $subcategory = DB::table('subcategory')->get(['id' , 'name']);

        return view("backend.home.banner.addbanner" , compact('subcategory' , 'category'));
    }

    public function insertBanner(Request $req){

        $file= $req->file('img');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('/banner'), $filename);
        $data['img']= $filename;
        $img = 'banner/' . $filename;

        $addvendor = DB::table('banner')->insert([
            'category' => $req->catagoryId,
            'Subcategory' => $req->subCatagoryId,
            'img' => $img
        ]);

        return redirect('/banners');

    }


    public function editBanner(Request $req){

        $banner = DB::table('banner')->where('id' , $req->bannerId)->get();

        $category = DB::table('category')->get(['id' , 'name']);

        $subcategory = DB::table('subcategory')->get(['id' , 'name']);

        return view("backend.home.banner.editbanner" , compact('subcategory' , 'category' , 'banner'));

    }


    public function updateBanner(Request $req){

        $banner = DB::table('banner')->where('id' , $req->bannerID)->get();

        foreach ($banner as $key => $b) {
            $img = $b->img;
        }

        if($req->file('img')){
            unlink($img);
            $file= $req->file('img');
            $filename= date('YHimd').$file->getClientOriginalName();
            $file-> move(public_path('/banner'), $filename);
            $data['img']= $filename;
            $img = 'banner/' . $filename;
        }


        $update = DB::table('banner')->where('id', $req->bannerID)->update(array(
            'category' => $req->catagoryId,
            'Subcategory' => $req->SubcatagoryId,
            'img' => $img
        ));

        return redirect('/banners');

    }


    public function deleteBanner(Request $req){

        $brand = DB::table('banner')->where('id' , $req->bannerId)->get();
        foreach ($brand as $key => $b) {
            unlink($b->img);
        }
        DB::table('banner')->where('id', '=' , $req->bannerId)->delete();
        return redirect('/banners');

    }




    // ads

    public function ads(Request $req){

        $category = DB::table('category')->get();
        $subcategory = DB::table('subcategory')->get();
        $ads = DB::table('ads')->get();

        return view("backend.home.ads.ads" , compact('ads' , 'category' , 'subcategory'));

    }


    public function addAds(Request $req){

        $category = DB::table('category')->get(['id' , 'name']);

        $subcategory = DB::table('subcategory')->get(['id' , 'name']);

        return view("backend.home.ads.addads" , compact('subcategory' , 'category'));

    }

    public function insertAds(Request $req){

        $file= $req->file('img');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('/ads'), $filename);
        $data['img']= $filename;
        $img = 'ads/' . $filename;

        $addvendor = DB::table('ads')->insert([
            'category' => $req->catagoryId,
            'Subcategory' => $req->subCatagoryId,
            'img' => $img
        ]);

        return redirect('/adds');

    }



    public function editAds(Request $req){


        $ads = DB::table('ads')->where('id' , $req->adsId)->get();

        $category = DB::table('category')->get(['id' , 'name']);

        $subcategory = DB::table('subcategory')->get(['id' , 'name']);


        return view("backend.home.ads.editads" , compact('subcategory' , 'category' , 'ads'));

    }

    public function updateAds(Request $req){

        $banner = DB::table('banner')->where('id' , $req->adsId)->get();

        foreach ($banner as $key => $b) {
            $img = $b->img;
        }

        if($req->file('img')){
            unlink($img);
            $file= $req->file('img');
            $filename= date('YHimd').$file->getClientOriginalName();
            $file-> move(public_path('/ads'), $filename);
            $data['img'] = $filename;
            $img = 'ads/' . $filename;
        }


        $update = DB::table('ads')->where('id', $req->bannerID)->update(array(
            'category' => $req->catagoryId,
            'Subcategory' => $req->SubcatagoryId,
            'img' => $img
        ));

        return redirect('/banners');

    }


    public function deleteAds(Request $req){
        $ads = DB::table('ads')->where('id' , $req->adsId)->get();
        foreach ($ads as $key => $ad) {
            unlink($ad->img);
        }
        DB::table('ads')->where('id', '=' , $req->adsId)->delete();
        return redirect('/adds');

    }





    // specialOffer
    public function specialOffer(Request $req){

        $specialoffer = DB::table('specialoffer')->get();

        return view("backend.home.specialoffer.offers" , compact('specialoffer'));

    }


    public function addspecialOffer(Request $req){
        return view('backend.home.specialoffer.addspecialOffer');
    }


    public function insertOffers(Request $req){

        $file= $req->file('img');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('/offers'), $filename);
        $data['img']= $filename;
        $img = 'offers/' . $filename;

        $addvendor = DB::table('specialoffer')->insert([
            'title' => $req->title,
            'priority' => $req->priority,
            'img' => $img,
        ]);

        return redirect('/specialOffer');


    }


    public function editOffers(Request $req){

        $specialoffer = DB::table('specialoffer')->where('id' , $req->offerId)->get();

        return view("backend.home.specialoffer.editOffers" , compact('specialoffer'));

    }


    public function updateOffers(Request $req){

        $specialoffer = DB::table('specialoffer')->where('id' , $req->offerId)->get();

        foreach ($specialoffer as $key => $b) {
            $img = $b->img;
        }

        if($req->file('img')){
            unlink($img);
            $file= $req->file('img');
            $filename= date('YHimd').$file->getClientOriginalName();
            $file-> move(public_path('/offers'), $filename);
            $data['img'] = $filename;
            $img = 'offers/' . $filename;
        }


        $update = DB::table('specialoffer')->where('id', $req->offerId)->update(array(
            'title' => $req->title,
            'priority' => $req->priority,
            'img' => $img,
        ));

        return redirect('/specialOffer');
    }


    public function deleteOffers(Request $req){
        $ads = DB::table('specialoffer')->where('id' , $req->offerId)->get();
        foreach ($ads as $key => $ad) {
            unlink($ad->img);
        }
        DB::table('specialoffer')->where('id', '=' , $req->offerId)->delete();
        return redirect('/specialOffer');



    }








    // specialOfferTagline


    public function specialOfferTagline(Request $req){

        $category = DB::table('category')->get(['id' , 'name']);

        $subcategory = DB::table('subcategory')->get();

        $specialoffer = DB::table('specialoffer')->get();

        $specialoffertagline = DB::table('specialoffertagline')->get();

        return view("backend.home.specialoffertagline.offers" , compact('specialoffer' , 'category' , 'subcategory' , 'specialoffertagline'));



    }



    public function addspecialOfferTagline(Request $req){


        $category = DB::table('category')->get(['id' , 'name']);

        $subcategory = DB::table('subcategory')->get();

        $specialoffer = DB::table('specialoffer')->get();

        return view("backend.home.specialoffertagline.addspecialOffer" , compact('specialoffer' , 'category' , 'subcategory'));


    }


    public function insertOffersTagline(Request $req){

        $file= $req->file('img');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('/offersTagline'), $filename);
        $data['img']= $filename;
        $img = 'offersTagline/' . $filename;

        $addvendor = DB::table('specialoffertagline')->insert([
            'title' => $req->title,
            'category' => $req->category,
            'subcategory' => $req->Subcategory,
            'img' => $img,
        ]);

        return redirect('/specialOfferTagline');


    }


    public function editOffersTagline(Request $req){

        $category = DB::table('category')->get(['id' , 'name']);

        $subcategory = DB::table('subcategory')->get();

        $specialoffer = DB::table('specialoffer')->get();

        $specialoffertagline = DB::table('specialoffertagline')->where('id' , '=' , $req->offerId)->get();

        return view("backend.home.specialoffertagline.editoffers" , compact('specialoffer' , 'category' , 'subcategory' , 'specialoffertagline'));

    }




    public function updateOffersTagline(Request $req){

        $specialoffertagline = DB::table('specialoffertagline')->where('id' , $req->id)->get();

        foreach ($specialoffertagline as $key => $b) {
            $img = $b->img;
        }

        if($req->file('img')){
            unlink($img);
            $file= $req->file('img');
            $filename= date('YHimd').$file->getClientOriginalName();
            $file-> move(public_path('/offersTagline'), $filename);
            $data['img'] = $filename;
            $img = 'offersTagline/' . $filename;
        }


        $update = DB::table('specialoffertagline')->where('id', $req->id)->update(array(
            'title' => $req->title,
            'category' => $req->category,
            'subcategory' => $req->Subcategory,
            'img' => $img,
        ));

        return redirect('/specialOfferTagline');

    }



    public function deleteOffersTagline(Request $req){

        $ads = DB::table('specialoffertagline')->where('id' , $req->offerId)->get();
        foreach ($ads as $key => $ad) {
            unlink($ad->img);
        }
        DB::table('specialoffertagline')->where('id', '=' , $req->offerId)->delete();
        return redirect('/specialoffertagline');

    }


    public function faq(Request $req){

        $faq = DB::table('faq')->get();
        return view("backend.home.faq.getFaq" , compact('faq'));

    }


    public function addfaq(Request $req){

        return view("backend.home.faq.addfaq");

    }




    public function insertFaq(Request $req){

        $addvendor = DB::table('faq')->insert([
            'question' => $req->faqQue,
            'answer' => $req->faqans,
        ]);

        return redirect('/faq');

    }



   public function editFaq(Request $req){

        $editFaq = DB::table('faq')->where('id' , '=' , $req->faqId)->get();

        return view("backend.home.faq.editFaq" , compact('editFaq'));

   }



   public function UpdateFaq(Request $req){

        $update = DB::table('faq')->where('id', $req->id)->update(array(
            'question' => $req->faqQue,
            'answer' => $req->faqans,
        ));

        return redirect('/faq');

   }


   public function deleteFaq(Request $req){

         DB::table('faq')->where('id', '=' , $req->faqId)->delete();
        return redirect('/faq');

   }











   public function about(Request $req){

        $about = DB::table('about')->get();

        return view("backend.home.about.about" , compact('about'));

   }



   public function updateAbout(Request $req){


        $checkabout = DB::table('about')->get();


        if( count($checkabout) > 0 ) {

            $update = DB::table('about')->update(array(
                'about' => $req->aboutUs,
            ));

        }
        else{

            $addvendor = DB::table('about')->insert([
                'about' => $req->aboutUs,
            ]);


        }

        return redirect('/about');
   }



































}
