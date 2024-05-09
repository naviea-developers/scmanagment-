<?php

namespace App\Http\Controllers\Backend\Currency;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CurrencyController extends Controller
{
    //Currency page load
    public function getCurrencyPageLoad() {

        $datalists = Currency::orderBy("id","desc")->get();

        return view('Backend.currency.index', compact('datalists'));
	}
    function getCurrencyTableData(Request $request) {
        // $search = $request->search;

		// if($request->ajax()){

		// 	if($search != ''){
		// 		$datalist = Currency::where(function ($query) use ($search){
		// 				$query->where('currency_name', 'like', '%'.$search.'%')
		// 					->orWhere('exchange_rate', 'like', '%'.$search.'%');
		// 			})
		// 			->orderBy('id','desc')->paginate(10);
		// 	}else{
		// 		$datalist = Currency::orderBy('id','desc')->paginate(10);
		// 	}

			return view('Backend.currency.create');
			// return view('backend.partials.currency_table', compact('datalist'))->render();
		// }
    }
	//Save data for Currency
    public function saveCurrencyData(Request $request){
       // return $request->all();
		$res = array();

		$currency_name = $request->input('currency_name');
		$currency_icon = $request->input('currency_icon');
		$currency_position = $request->input('currency_position');
		$thousands_separator = $request->input('thousands_separator');
		$decimal_separator = $request->input('decimal_separator');
		$decimal_digit = $request->input('decimal_digit');
		$is_default = $request->input('is_default');
		$exchange_rate = $request->input('exchange_rate');

		$validator_array = array(
			'currency_name' => $request->input('currency_name'),
			'currency_icon' => $request->input('currency_icon'),
			'currency_position' => $request->input('currency_position'),
			'thousands_separator' => $request->input('thousands_separator'),
			'decimal_separator' => $request->input('decimal_separator'),
			'decimal_digit' => $request->input('decimal_digit'),
			'exchange_rate' => $request->input('exchange_rate')
		);

		$validator = Validator::make($validator_array, [
			'currency_name' => 'required',
			'currency_icon' => 'required',
			'currency_position' => 'required',
			'exchange_rate' => 'required'
		]);

		$errors = $validator->errors();

		if($errors->has('currency_name')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('currency_name');
			return response()->json($res);
		}

		if($errors->has('currency_icon')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('currency_icon');
			return response()->json($res);
		}

		if($errors->has('currency_position')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('currency_position');
			return response()->json($res);
		}

		if($errors->has('thousands_separator')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('thousands_separator');
			return response()->json($res);
		}

		if($errors->has('decimal_separator')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('decimal_separator');
			return response()->json($res);
		}

		if($errors->has('decimal_digit')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('decimal_digit');
			return response()->json($res);
		}

		$data = array(
			'currency_name' => $currency_name,
			'currency_icon' => $currency_icon,
			'currency_position' => $currency_position,
			'thousands_separator' => $thousands_separator,
			'decimal_separator' => $decimal_separator,
			'decimal_digit' => $decimal_digit,
			'exchange_rate' => $exchange_rate,
			'is_default' => $is_default ?? 0,
		);

		$id = $request->input('RecordId');

		if($id == ''){
			$response = Currency::create($data);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('New Data Added Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data insert failed');
			}
		}else{
			$response = Currency::where('id', $id)->update($data);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Data Updated Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data update failed');
			}
		}

		// return response()->json($res);
        return redirect()->route('admin.manage_currency')->with('message', 'Currency Create Successfully, Thank you.');
    }
    //Get data for Label by id
    public function getCurrencyById(Request $request){

		$id = $request->id;

		$data = Currency::where('id', $id)->first();

		return response()->json($data);
	}

	//Delete data for Labels
	public function deleteCurrency(Request $request){


        $currency = Currency::find($request->currency_id);
         $currency->delete();
         return redirect()->back()->with('message', 'Currency Delete Successfully, Thank You.');
		// $res = array();

		// $id = $request->id;

		// if($id != ''){
		// 	$response = Currency::where('id', $id)->delete();
		// 	if($response){
		// 		$res['msgType'] = 'success';
		// 		$res['msg'] = __('Data Removed Successfully');
		// 	}else{
		// 		$res['msgType'] = 'error';
		// 		$res['msg'] = __('Data remove failed');
		// 	}
		// }

		// return response()->json($res);
	}

	//Bulk Action for Labels
	public function bulkActionCurrency(Request $request){

		$res = array();

		$idsStr = $request->ids;
		$idsArray = explode(',', $idsStr);

		$BulkAction = $request->BulkAction;

		if($BulkAction == 'delete'){
			$response = Currency::whereIn('id', $idsArray)->delete();
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Data Removed Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data remove failed');
			}
		}

		return response()->json($res);
	}



    public function editCurrency($id)
    {
        $data['currency'] = Currency::find($id);
        return view('Backend.currency.update', $data);
    }

    public function updateCurrency(Request $request, $id)
    {
        $currency = Currency::find($id);
         $currency->currency_name = $request->currency_name;
         $currency->currency_icon = $request->currency_icon;
         $currency->currency_position = $request->currency_position;
         $currency->thousands_separator = $request->thousands_separator;
         $currency->decimal_separator = $request->decimal_separator;
         $currency->decimal_digit = $request->decimal_digit;
         $currency->is_default = $request->is_default;
         $currency->exchange_rate = $request->exchange_rate;
         $currency->Update();
         return redirect()->route('admin.manage_currency')->with('message', 'Currency Update Successfully, Thank you.');
    }
}
