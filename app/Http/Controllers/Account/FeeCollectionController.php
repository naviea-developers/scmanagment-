<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classe;
use App\Models\FeeManagement;
use App\Models\Fee;
use App\Models\Session;
use App\Models\Account\PaymentMethod;
class FeeCollectionController extends Controller
{
    function index(){
        $data['methods']=PaymentMethod::orderBy('id','DESC')->get();
        $data['fee_managements'] = FeeManagement::orderBy('id', 'desc')->get();
        $data['classes'] = Classe::where('status', 1)->get();
        $data['fee_names'] = Fee::where('status', 1)->get();
        $data['sessions'] = Session::where('status', 1)->get();
        //dd("sss");
        return view ('Accounts.fee_collection.index',$data); 
    }
}
