<?php

namespace App\Http\Controllers\Backend\Appearance;

use App\Http\Controllers\Controller;
use App\Models\Tp_option;
use App\Models\PayWith;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class ThemeOptionController extends Controller
{
    function Theme_Option(){
        $data['results'] = Tp_option::where('option_name', 'theme_logo')->first();
        return view("Backend.setting.appearance.theme-options", $data);
    }

    public function saveThemeLogo(Request $request){
        $results = Tp_option::where('option_name', 'theme_logo')->first();
        if($results == null){
            $results = New Tp_option;
        }
        if($request->hasFile('header_logo')){
            @unlink(public_path('upload/site_setting/'.$results->header_image));
            $fileName = time().'_header-logo.'.$request->header_logo->getClientOriginalExtension();
            $request->header_logo->move(public_path('upload/site_setting'), $fileName);

            $results->header_image =$fileName;
        }
        if($request->hasFile('footer_logo')){
            @unlink(public_path('upload/site_setting/'.$results->footer_image));
            $fileName = time().'_footer-logo.'.$request->footer_logo->getClientOriginalExtension();
            $request->footer_logo->move(public_path('upload/site_setting'), $fileName);

            $results->footer_image =$fileName;
        }
        if($request->hasFile('favicon')){
            @unlink(public_path('upload/site_setting/'.$results->favicon));
            $fileName = time().'_favicon.'.$request->favicon->getClientOriginalExtension();
            $request->favicon->move(public_path('upload/site_setting'), $fileName);

            $results->favicon =$fileName;
        }
        $results->option_name ='theme_logo';
        $results->save();
        return redirect()->back();
    }

    function themeOptionHeader(){
        $data['results'] = Tp_option::where('option_name','theme_option_header')->first();
        return view("Backend.setting.appearance.theme-options-header", $data);
    }
	public function saveThemeHeader(Request $request){
		// dd('hi');
        $results = Tp_option::where('option_name', 'theme_option_header')->first();
        if($results == null){
            $results = New Tp_option;
        }
        $results->option_name='theme_option_header';
        $results->company_name=$request->company_name;

        $results->save();
    return redirect()->back();
    }


    function Theme_Option_Footer(){
        $data['results'] = Tp_option::where('option_name','theme_option_footer')->first();
        return view("Backend.setting.appearance.theme-options-footer", $data);
    }

    public function SaveThemeFooter(Request $request){
        $results = Tp_option::where('option_name', 'theme_option_footer')->first();
        if($results == null){
            $results = New Tp_option;
        }
        $results->option_name='theme_option_footer';
        $results->address1=$request->address1;
        $results->address2=$request->address2;
        $results->email1=$request->email1;
        $results->email2=$request->email2;
        $results->license_no=$request->license_no;
        $results->phone1=$request->phone1;
        $results->phone2=$request->phone2;
        $results->copyright=$request->copyright;

        $results->save();
                   // FacilitiyItem start

            if($request->pay_name){
                $pay_image=[];
                foreach($request->file('pay_image') as $k=>$image){
                    $filename=time().$k.'.'.$image->getClientOriginalExtension();
                    $image->move(public_path('upload/pay_image/'), $filename);
                    $pay_image[]=$filename;
                }
                foreach( $request->pay_name as $k=>$value){
                    $paywith = new PayWith();
                    $paywith->tp_option_id = $results->id;
                    $paywith->pay_name = $value;
                    $paywith->pay_image =$pay_image[$k];
                    $paywith->save();
                }
            }

            if($request->old_pay_name){
                foreach($request->old_pay_name as $k => $value){
                    $paywith = PayWith::find($k);
                    $paywith->tp_option_id = $results->id;
                    $paywith->pay_name = $value;

                    if(isset($request->file('old_pay_image')[$k])){
                        @unlink(public_path('upload/pay_image/'.$paywith->pay_image));
                        $filename=time().$k.'.'.$request->file('old_pay_image')[$k]->getClientOriginalExtension();
                        $request->file('old_pay_image')[$k]->move(public_path('upload/pay_image/'), $filename);
                        $paywith->pay_image=$filename;
                    }
                    $paywith->save();
                }
            }

            if($request->delete_facilitiyitem){
                foreach($request->delete_facilitiyitem as $key => $value){
                    $facility = PayWith::find($value);
                    $facility->delete();

                }
            }
        // FacilitiyItem End
    return redirect()->back();
    }

	function ThemeOptionSchoolInfo(){
		$results = Tp_option::where('option_name', 'theme_option_school_info')->first();
        if($results){
            $dataObj = json_decode($results->option_value);
            $data['school_name'] = $dataObj->school_name ?? '';
            $data['phone1'] = $dataObj->phone1 ?? '';
            $data['phone2'] = $dataObj->phone2 ?? '';
			$data['website'] = $dataObj->website ?? '';
            $data['email'] = $dataObj->email ?? '';
			$data['address'] = $dataObj->address ?? '';
			$data['eiin_number'] = $dataObj->eiin_number ?? '';
			$data['school_logo'] = $dataObj->school_logo ?? '';
			$data['principal_signature'] = $dataObj->principal_signature ?? '';
			$data['national_father'] = $dataObj->national_father ?? '';
        }else{
            $data['school_name'] = "";
            $data['phone1'] = "";
            $data['phone2'] = "";
            $data['email'] = "";
			$data['website'] = "";
			$data['address'] = "";
			$data['eiin_number'] = "";
			$data['school_logo'] = "";
			$data['principal_signature'] = "";
			$data['national_father'] = "";
        }
        $dat_a['datalist'] = $data;
        return view('Backend.setting.appearance.theme-options-school-info',$dat_a);
    }

	// public function SaveThemeSchoolInfo(Request $request){
	// 	$res = array();

	// 	$school_name = $request->input('school_name');
	// 	$phone1 = $request->input('phone1');
	// 	$phone2 = $request->input('phone2');
	// 	$email = $request->input('email');
	// 	$website = $request->input('website');
	// 	$address = $request->input('address');
	// 	$school_logo = $request->input('school_logo');

	// 	$validator_array = array(
	// 		'school_name' => $request->input('school_name'),
	// 		'phone1' => $request->input('phone1'),
	// 		'phone2' => $request->input('phone2'),
	// 		'email' => $request->input('email'),
	// 		'website' => $request->input('website'),
	// 		'address' => $request->input('address'),
	// 		'school_logo' => $request->input('school_logo'),
	// 	);

	// 	$validator = Validator::make($validator_array, [
	// 		'school_name' => 'required',
	// 		'phone1' => 'required',
	// 		'phone2' => 'required',
	// 		'email' => 'required',
	// 		'website' => 'required',
	// 		'address' => 'required',
	// 		'school_logo' => 'required',
	// 	]);

	// 	$errors = $validator->errors();

	// 	if($errors->has('school_name')){
	// 		$res['msgType'] = 'error';
	// 		$res['msg'] = $errors->first('school_name');
	// 		return redirect()->back()->with('error-message', $res['msg'])->withInput();

	// 	}

	// 	if($errors->has('phone1')){
	// 		$res['msgType'] = 'error';
	// 		$res['msg'] = $errors->first('phone1');
	// 		return redirect()->back()->with('error-message', $res['msg'])->withInput();
	// 	}

	// 	if($errors->has('phone2')){
	// 		$res['msgType'] = 'error';
	// 		$res['msg'] = $errors->first('phone2');
	// 		return redirect()->back()->with('error-message', $res['msg'])->withInput();
	// 	}

	// 	if($errors->has('email')){
	// 		$res['msgType'] = 'error';
	// 		$res['msg'] = $errors->first('email');
	// 		return redirect()->back()->with('error-message', $res['msg'])->withInput();
	// 	}

	// 	if($errors->has('website')){
	// 		$res['msgType'] = 'error';
	// 		$res['msg'] = $errors->first('website');
	// 		return redirect()->back()->with('error-message', $res['msg'])->withInput();
	// 	}

	// 	if($errors->has('address')){
	// 		$res['msgType'] = 'error';
	// 		$res['msg'] = $errors->first('address');
	// 		return redirect()->back()->with('error-message', $res['msg'])->withInput();
	// 	}


	// 	$option = array(
	// 		'school_name' => $school_name,
	// 		'phone1' => $phone1,
	// 		'phone2' => $phone2,
	// 		'email' => $email,
	// 		'website' => $website,
	// 		'address' => $address,
	// 		'school_logo' => $school_logo,

	// 	);

	// 	$data = array(
	// 		'option_name' => 'theme_option_school_info',
	// 		'option_value' => json_encode($option)
	// 	);

	// 	$gData = Tp_option::where('option_name','theme_option_school_info')->get();
	// 	$id = '';
	// 	foreach ($gData as $row){
	// 		$id = $row['id'];
	// 	}

	// 	if($id == ''){
	// 		$response = Tp_option::create($data);
	// 		if($response){
	// 			$res['msgType'] = 'success';
	// 			$res['msg'] = __('New Data Added Successfully');
	// 		}else{
	// 			$res['msgType'] = 'error';
	// 			$res['msg'] = __('Data insert failed');
	// 		}
	// 	}else{
	// 		$response = Tp_option::where('id', $id)->update($data);
	// 		if($response){
	// 			$res['msgType'] = 'success';
	// 			$res['msg'] = __('Data Updated Successfully');
	// 		}else{
	// 			$res['msgType'] = 'error';
	// 			$res['msg'] = __('Data update failed');
	// 		}
	// 	}

	// 	// return response()->json($res);
	// 	return redirect()->back()->with('message', $res['msg']);
	// }

	public function SaveThemeSchoolInfo(Request $request){
        //dd($request->all());
		$res = array();

		$school_name = $request->input('school_name');
		$phone1 = $request->input('phone1');
		$phone2 = $request->input('phone2');
		$email = $request->input('email');
		$website = $request->input('website');
		$address = $request->input('address');
		$school_logo = $request->input('school_logo');
		$principal_signature = $request->input('principal_signature');
		$national_father = $request->input('national_father');
		$eiin_number = $request->input('eiin_number');

		$gData = Tp_option::where('option_name','theme_option_school_info')->first();
		$id = '';
		if($gData){
			$id = $gData->id;
		}

		$school_logo="";
        if($request->hasFile('school_logo')){
            $fileName = rand().time().'.'.request()->school_logo->getClientOriginalExtension();
            request()->school_logo->move(public_path('upload/school_logo/'),$fileName);
            $school_logo= $fileName;
        }else{
			if($id){
				$dataObj = json_decode($gData->option_value);
				$school_logo=$dataObj->school_logo ?? '';
			}
		}

		$principal_signature="";
        if($request->hasFile('principal_signature')){
            $fileName = rand().time().'.'.request()->principal_signature->getClientOriginalExtension();
            request()->principal_signature->move(public_path('upload/school_logo/principal_signature/'),$fileName);
            $principal_signature= $fileName;
        }else{
			if($id){
				$dataObj = json_decode($gData->option_value);
				$principal_signature=$dataObj->principal_signature ?? '';
			}
		}
		$national_father="";
        if($request->hasFile('national_father')){
            $fileName = rand().time().'.'.request()->national_father->getClientOriginalExtension();
            request()->national_father->move(public_path('upload/school_logo/'),$fileName);
            $national_father= $fileName;
        }else{
			if($id){
				$dataObj = json_decode($gData->option_value);
				$national_father=$dataObj->national_father ?? '';
			}
		}

		$validator_array = array(
			'school_name' => $request->input('school_name'),
			'phone1' => $request->input('phone1'),
			'phone2' => $request->input('phone2'),
			'email' => $request->input('email'),
			'website' => $request->input('website'),
			'address' => $request->input('address'),
			'school_logo' => $request->input('school_logo'),
			'principal_signature' => $request->input('principal_signature'),
			'national_father' => $request->input('national_father'),
			'eiin_number' => $request->input('eiin_number'),
		);

		$validator = Validator::make($validator_array, [
			'school_name' => 'required',
			'phone1' => 'required',
			'phone2' => 'required',
			'email' => 'required',
			'website' => 'required',
			'address' => 'required',
			'eiin_number' => 'required',
			// 'school_logo' => 'required',
		]);

		$errors = $validator->errors();


        if($errors->has('school_name')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('school_name');
			return redirect()->back()->with('error-message', $res['msg'])->withInput();

		}

		if($errors->has('phone1')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('phone1');
			return redirect()->back()->with('error-message', $res['msg'])->withInput();
		}

		if($errors->has('phone2')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('phone2');
			return redirect()->back()->with('error-message', $res['msg'])->withInput();
		}

		if($errors->has('email')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('email');
			return redirect()->back()->with('error-message', $res['msg'])->withInput();
		}

		if($errors->has('website')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('website');
			return redirect()->back()->with('error-message', $res['msg'])->withInput();
		}

		if($errors->has('address')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('address');
			return redirect()->back()->with('error-message', $res['msg'])->withInput();
		}

		if($errors->has('eiin_number')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('eiin_number');
			return redirect()->back()->with('error-message', $res['msg'])->withInput();
		}


		$option = array(
			'school_name' => $school_name,
			'phone1' => $phone1,
			'phone2' => $phone2,
			'email' => $email,
			'website' => $website,
			'address' => $address,
			'eiin_number' => $eiin_number,
			'school_logo' => $school_logo,
			'principal_signature' => $principal_signature,
			'national_father' => $national_father,

		);

		$data = array(
			'option_name' => 'theme_option_school_info',
			'option_value' => json_encode($option)
		);



		if($id == ''){
			$response = Tp_option::create($data);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('New Data Added Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data insert failed');
			}
		}else{
			$response = Tp_option::where('id', $id)->update($data);
              @unlink(public_path("upload/school_logo/".$response->school_logo));
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Data Updated Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data update failed');
			}
		}

		// return response()->json($res);
		return redirect()->back()->with('message', $res['msg']);
    }

    function Theme_Language_Switcher(){
        $data['results'] = Tp_option::where('option_name','theme_language_switcher')->first();
        return view("Backend.setting.appearance.language-switcher", $data);
    }

    public function ThemeOptionsHeader(){
        $results = Tp_option::where('option_name', 'theme-options-header')->first();
        if($results){
            $dataObj = json_decode($results->option_value);
            $data['address'] = $dataObj->address ?? '';
            $data['phone'] = $dataObj->phone ?? '';

        }else{
            $data['address'] = "";
            $data['phone'] = "";
        }
        $dat_a['datalist'] = $data;
        return view('Backend.setting.appearance.theme-options-header',$dat_a);
    }


    public function Theme_Color()
    {
        $results = Tp_option::where('option_name', 'theme_color')->first();
        if($results){
            $dataObj = json_decode($results->option_value);

			$data['header_color'] = $dataObj->header_color ?? '#07477D';
			$data['header_text_color'] = $dataObj->header_text_color ?? '#07477D';
			$data['menu_color'] = $dataObj->menu_color ?? '#212529';
            $data['category_color'] = $dataObj->category_color ?? '#07477D';
			$data['button1_color'] = $dataObj->button1_color ?? '#1bbc9d';
            $data['button1_hover_color'] = $dataObj->button1_hover_color ?? '#1bbc9d';
			$data['button2_color'] = $dataObj->button2_color ?? '#07477D';
            $data['button2_text_color'] = $dataObj->button2_text_color ?? '#07477D';
            $data['button2_border_color'] = $dataObj->button2_border_color ?? '#07477D';
            $data['button2_hover_color'] = $dataObj->button2_hover_color ?? '#0a58ca';
			$data['text_color'] = $dataObj->text_color ?? '#fff';
            $data['product_text_color'] = $dataObj->product_text_color ?? '#fff';
			$data['theme_color'] = $dataObj->theme_color ?? '#1d2939';
            $data['theme_text_color'] = $dataObj->theme_text_color ?? '#adb5bd';
            $data['theme_hover_color'] = $dataObj->theme_hover_color ?? '#18222f';
			$data['package1_color'] = $dataObj->package1_color ?? '#2D3B68';
			$data['package2_color'] = $dataObj->package2_color ?? '#223764';
			$data['footer_color'] = $dataObj->footer_color ?? '#07477D';
            $data['footer_text_color'] = $dataObj->footer_text_color ?? '#fff';
			$data['footer_news_color'] = $dataObj->footer_news_color ?? '#25171c';
            $data['currency_background_color'] = $dataObj->currency_background_color ?? '#07477D';
            $data['currency_frontend_color'] = $dataObj->currency_frontend_color ?? '#07477D';

            $data['seller_background_color'] = $dataObj->seller_background_color ?? '#25171c';
            $data['seller_frontend_color'] = $dataObj->seller_frontend_color ?? '#25171c';
            $data['seller_text_color'] = $dataObj->seller_text_color ?? '#25171c';
        }else{
			$data['header_color'] = '#07477D';
			$data['header_text_color'] = '#07477D';
			$data['menu_color'] = '#212529';
            $data['category_color'] = '#07477D';
			$data['button1_color'] = '#1bbc9d';
            $data['button1_hover_color'] = '#1bbc9d';
			$data['button2_color'] = '#07477D';
            $data['button2_hover_color'] = '#0a58ca';
            $data['button2_text_color'] = '#07477D';
            $data['button2_border_color'] = '#07477D';
			$data['text_color'] = '#fff';
            $data['product_text_color'] = '#fff';
			$data['theme_color'] = '#1d2939';
            $data['theme_text_color'] = '#adb5bd';
            $data['theme_hover_color'] = '#18222f';
			$data['package1_color'] = '#2D3B68';
			$data['package2_color'] = '#223764';
			$data['footer_color'] = '#07477D';
            $data['footer_text_color'] = '#fff';
			$data['footer_news_color'] = '#25171c';

            $data['currency_background_color'] = '#07477D';
            $data['currency_frontend_color'] = '#07477D';

            $data['seller_background_color'] = '#25171c';
            $data['seller_frontend_color'] = '#25171c';
            $data['seller_text_color'] = '#25171c';
		}
        $dat_a['datalist'] = $data;
        // return view('Backend.setting.appearance.themeoption',$dat_a);
        return view('Backend.setting.appearance.themeoption',$dat_a);

    }


     public function SaveThemeColor(Request $request){
        //dd($request->product_text_color);
		$res = array();

		$header_color = $request->input('header_color');
		$header_text_color = $request->input('header_text_color');
		$menu_color = $request->input('menu_color');
        $category_color = $request->input('category_color');
        $text_color = $request->input('text_color');
        $product_text_color = $request->input('product_text_color');
        $button1_color = $request->input('button1_color');
        $button1_hover_color = $request->input('button1_hover_color');
        $button2_color = $request->input('button2_color');
        $button2_hover_color = $request->input('button2_hover_color');
        $button2_border_color = $request->input('button2_border_color');
        $button2_text_color = $request->input('button2_text_color');
        $theme_color = $request->input('theme_color');
        $theme_text_color = $request->input('theme_text_color');
        $theme_hover_color = $request->input('theme_hover_color');
        $package1_color = $request->input('package1_color');
        $package2_color = $request->input('package2_color');
        $footer_color = $request->input('footer_color');
        $footer_text_color = $request->input('footer_text_color');
        $footer_news_color = $request->input('footer_news_color');

        $currency_background_color = $request->input('currency_background_color');
        $currency_frontend_color = $request->input('currency_frontend_color');

        $seller_background_color = $request->input('seller_background_color');
        $seller_frontend_color = $request->input('seller_frontend_color');
        $seller_text_color = $request->input('seller_text_color');

		$validator_array = array(
			'header_color' => $request->input('header_color'),
			'header_text_color' => $request->input('header_text_color'),
			'menu_color' => $request->input('menu_color'),
            'category_color' => $request->input('category_color'),
            'text_color' => $request->input('text_color'),
            'product_text_color' => $request->input('product_text_color'),
            'button1_color' => $request->input('button1_color'),
            'button1_hover_color' => $request->input('button1_hover_color'),
            'button2_color' => $request->input('button2_color'),
            'button2_hover_color' => $request->input('button2_hover_color'),
            'button2_text_color' => $request->input('button2_text_color'),
            'button2_border_color' => $request->input('button2_border_color'),
            'theme_color' => $request->input('theme_color'),
            'theme_text_color' => $request->input('theme_text_color'),
            'theme_hover_color' => $request->input('theme_hover_color'),
            'package1_color' => $request->input('package1_color'),
            'package2_color' => $request->input('package2_color'),
            'footer_color' => $request->input('footer_color'),
            'footer_text_color' => $request->input('footer_text_color'),
            'footer_news_color' => $request->input('footer_news_color'),

            'currency_frontend_color' => $request->input('currency_frontend_color'),
            'currency_background_color' => $request->input('currency_background_color'),

            'seller_background_color' => $request->input('seller_background_color'),
            'seller_frontend_color' => $request->input('seller_frontend_color'),
            'seller_text_color' => $request->input('seller_text_color'),
		);

		$validator = Validator::make($validator_array, [
			'header_color' => 'required',
			'header_text_color' => 'required',
			'menu_color' => 'required',
            'category_color' => 'required',
            'text_color' => 'required',
            'product_text_color' => 'required',
            'button1_color' => 'required',
            'button1_hover_color' => 'required',
            'button2_color' => 'required',
            'button2_hover_color' => 'required',
            'button2_border_color' => 'required',
            'button2_text_color' => 'required',
            'theme_color' => 'required',
            'theme_text_color' => 'required',
            'theme_hover_color' => 'required',
            'package1_color' => 'required',
            'package2_color' => 'required',
            'footer_color' => 'required',
            'footer_text_color' => 'required',
            'footer_news_color' => 'required',

            'currency_background_color' => 'required',
            'currency_frontend_color' => 'required',

            'seller_background_color' => 'required',
            'seller_frontend_color' => 'required',
            'seller_text_color' => 'required',
		]);

		$errors = $validator->errors();

		if($errors->has('header_color')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('header_color');
			return response()->json($res);
		}

		if($errors->has('header_text_color')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('header_text_color');
			return response()->json($res);
		}

		if($errors->has('menu_color')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('menu_color');
			return response()->json($res);
		}

        if($errors->has('currency_background_color')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('currency_background_color');
			return response()->json($res);
		}

        if($errors->has('currency_frontend_color')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('currency_frontend_color');
			return response()->json($res);
		}

        if($errors->has('category_color')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('category_color');
			return response()->json($res);
		}

        if($errors->has('text_color')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('text_color');
			return response()->json($res);
		}

        if($errors->has('product_text_color')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('product_text_color');
			return response()->json($res);
		}

        if($errors->has('button1_color')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('button1_color');
			return response()->json($res);
		}
        if($errors->has('button2_hover_color')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('button2_hover_color');
			return response()->json($res);
		}
        if($errors->has('button1_hover_color')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('button1_hover_color');
			return response()->json($res);
		}
        if($errors->has('button2_color')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('button2_color');
			return response()->json($res);
		}
        if($errors->has('button2_text_color')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('button2_text_color');
			return response()->json($res);
		}
        if($errors->has('button2_border_color')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('button2_border_color');
			return response()->json($res);
		}
        if($errors->has('theme_color')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('theme_color');
			return response()->json($res);
		}
        if($errors->has('theme_text_color')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('theme_text_color');
			return response()->json($res);
		}
        if($errors->has('theme_hover_color')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('theme_hover_color');
			return response()->json($res);
		}
        if($errors->has('package1_color')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('package1_color');
			return response()->json($res);
		}
        if($errors->has('package2_color')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('package2_color');
			return response()->json($res);
		}
        if($errors->has('footer_color')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('footer_color');
			return response()->json($res);
		}
        if($errors->has('footer_text_color')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('footer_text_color');
			return response()->json($res);
		}
        if($errors->has('footer_news_color')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('footer_news_color');
			return response()->json($res);
		}



        if($errors->has('seller_background_color')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('seller_background_color');
			return response()->json($res);
		}
        if($errors->has('seller_frontend_color')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('seller_frontend_color');
			return response()->json($res);
		}
        if($errors->has('seller_text_color')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('seller_text_color');
			return response()->json($res);
		}

		$option = array(
			'header_color' => $header_color,
			'header_text_color' => $header_text_color,
			'menu_color' => $menu_color,
            'category_color' => $category_color,
            'text_color' => $text_color,
            'product_text_color' => $product_text_color,
            'button1_color' => $button1_color,
            'button1_hover_color' => $button1_hover_color,
            'button2_color' => $button2_color,
            'button2_hover_color' => $button2_hover_color,
            'button2_text_color' => $button2_text_color,
            'button2_border_color' => $button2_border_color,
            'theme_color' => $theme_color,
            'theme_text_color' => $theme_text_color,
            'theme_hover_color' => $theme_hover_color,
            'package1_color' => $package1_color,
            'package2_color' => $package2_color,
            'footer_color' => $footer_color,
            'footer_text_color' => $footer_text_color,
            'footer_news_color' => $footer_news_color,
            'currency_background_color' => $currency_background_color,
            'currency_frontend_color' => $currency_frontend_color,

            'seller_background_color' => $seller_background_color,
            'seller_frontend_color' => $seller_frontend_color,
            'seller_text_color' => $seller_text_color,
		);

		$data = array(
			'option_name' => 'theme_color',
			'option_value' => json_encode($option)
		);

		$gData = Tp_option::where('option_name', 'theme_color')->get();
		$id = '';
		foreach ($gData as $row){
			$id = $row['id'];
		}

		if($id == ''){
			$response = Tp_option::create($data);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('New Data Added Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data insert failed');
			}
		}else{
			$response = Tp_option::where('id', $id)->update($data);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Data Updated Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data update failed');
			}
		}

		// return response()->json($res);
		return redirect()->back()->with('message', $res['msg']);
    }

    function Theme_Social_Media(){
        $results = Tp_option::where('option_name', 'theme_social_media')->first();
        if($results){
            $dataObj = json_decode($results->option_value);
            $data['facebook'] = $dataObj->facebook ?? '';
            $data['twitter'] = $dataObj->twitter ?? '';
            $data['instagram'] = $dataObj->instagram ?? '';
            $data['youtube'] = $dataObj->youtube ?? '';
        }else{
            $data['facebook'] = "";
            $data['twitter'] = "";
            $data['instagram'] = "";
            $data['youtube'] = "";
        }
        $dat_a['datalist'] = $data;
        return view('Backend.setting.appearance.social_media',$dat_a);
    }

    public function SaveThemeSocialMedia(Request $request){
                //dd($request->all());
		$res = array();

		$facebook = $request->input('facebook');
		$twitter = $request->input('twitter');
		$instagram = $request->input('instagram');
        $youtube = $request->input('youtube');

		$validator_array = array(
			'facebook' => $request->input('facebook'),
			'twitter' => $request->input('twitter'),
			'instagram' => $request->input('instagram'),
            'youtube' => $request->input('youtube'),
		);

		$validator = Validator::make($validator_array, [
			'facebook' => 'required',
			'twitter' => 'required',
			'instagram' => 'required',
            'youtube' => 'required',
		]);

		$errors = $validator->errors();

		if($errors->has('facebook')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('facebook');
			return redirect()->back()->with('error-message', $res['msg'])->withInput();

		}

		if($errors->has('twitter')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('twitter');
			return redirect()->back()->with('error-message', $res['msg'])->withInput();
		}

		if($errors->has('instagram')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('instagram');
			return redirect()->back()->with('error-message', $res['msg'])->withInput();
		}

        if($errors->has('youtube')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('youtube');
			return redirect()->back()->with('error-message', $res['msg'])->withInput();
		}


		$option = array(
			'facebook' => $facebook,
			'twitter' => $twitter,
			'instagram' => $instagram,
            'youtube' => $youtube,

		);

		$data = array(
			'option_name' => 'theme_social_media',
			'option_value' => json_encode($option)
		);

		$gData = Tp_option::where('option_name','theme_social_media')->get();
		$id = '';
		foreach ($gData as $row){
			$id = $row['id'];
		}

		if($id == ''){
			$response = Tp_option::create($data);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('New Data Added Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data insert failed');
			}
		}else{
			$response = Tp_option::where('id', $id)->update($data);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Data Updated Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data update failed');
			}
		}

		// return response()->json($res);
		return redirect()->back()->with('message', $res['msg']);
    }

    function ThemeOptionsSeo(){
        $results = Tp_option::where('option_name', 'theme_options_seo')->first();
		//dd($results);
		    if($results){
                $dataObj = json_decode($results->option_value);
				// dd($dataObj->og_keywords);
                $data['og_title'] = $dataObj->og_title ?? [];
                $data['og_keywords'] = $dataObj->og_keywords ?? [];
                $data['og_description'] = $dataObj->og_description ?? '';
                $data['og_image'] = $dataObj->og_image ?? '';
            }else{
                $data['og_title'] = "";
                $data['og_keywords'] = "";
                $data['og_description'] = "";
                $data['og_image'] = "";
            }
			//dd($data);
            $dat_a['datalist'] = $data;
            return view('Backend.setting.appearance.theme-options-seo',$dat_a);
    }

    public function ThemeOptionsSeoSave(Request $request){
        //dd($request->all());
		$res = array();

		$og_title = $request->input('og_title');
		$og_keywords = $request->input('og_keywords');
		$og_description = $request->input('og_description');
        // $og_image = $request->input('og_image');

		$gData = Tp_option::where('option_name','theme_options_seo')->first();
		$id = '';
		if($gData){
			$id = $gData->id;
		}

		$og_image="";
        if($request->hasFile('og_image')){
            $fileName = rand().time().'.'.request()->og_image->getClientOriginalExtension();
            request()->og_image->move(public_path('upload/seo/'),$fileName);
            $og_image= $fileName;
        }else{
			if($id){
				$dataObj = json_decode($gData->option_value);
				$og_image=$dataObj->og_image ?? '';
			}
		}

		$validator_array = array(
			'og_title' => $request->input('og_title'),
			'og_keywords' => $request->input('og_keywords'),
			'og_description' => $request->input('og_description'),
            'og_image' => $og_image,
		);

		$validator = Validator::make($validator_array, [
			'og_title' => 'required',
			'og_keywords' => 'required',
			'og_description' => 'required',

		]);

		$errors = $validator->errors();

		if($errors->has('og_title')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('og_title');
			return redirect()->back()->with('error-message', $res['msg'])->withInput();
		}

		if($errors->has('og_keywords')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('og_keywords');
			return redirect()->back()->with('error-message', $res['msg'])->withInput();
		}

		if($errors->has('og_description')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('og_description');
			return redirect()->back()->with('error-message', $res['msg'])->withInput();
		}




		$option = array(
			'og_title' => $og_title,
			'og_keywords' => $og_keywords,
			'og_description' => $og_description,
            'og_image' => $og_image,

		);

		$data = array(
			'option_name' => 'theme_options_seo',
			'option_value' => json_encode($option)
		);



		if($id == ''){
			$response = Tp_option::create($data);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('New Data Added Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data insert failed');
			}
		}else{
			$response = Tp_option::where('id', $id)->update($data);
              @unlink(public_path("upload/seo/".$response->og_image));
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Data Updated Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data update failed');
			}
		}

		// return response()->json($res);
		return redirect()->back()->with('message', $res['msg']);
    }


	function ThemeOptionsSocialLogin()
	{
		$results = Tp_option::where('option_name', 'social_login')->first();
		if($results){
			$dataObj = json_decode($results->option_value);
			$data['google_client_id'] = $dataObj->google_client_id ?? '';
			$data['google_secret_id'] = $dataObj->google_secret_id ?? '';
			// $data['google_re_uri'] = $dataObj->google_re_uri ?? '';

			$data['fb_client_id'] = $dataObj->fb_client_id ?? '';
			$data['fb_secret_id'] = $dataObj->fb_secret_id ?? '';
			// $data['fb_re_uri'] = $dataObj->fb_re_uri ?? '';

		}else{
			$data['fb_client_id'] = "";
			$data['fb_secret_id'] = "";
			// $data['fb_re_uri'] = "";

			$data['google_client_id'] = "";
			$data['google_secret_id'] = "";
			// $data['google_re_uri'] = "";
		}
		$dat_a['datalist'] = $data;
		return view('Backend.setting.appearance.theme-options-social-login',$dat_a);
	}
	function ThemeOptionsSocialLoginSave(Request $request)
	{
		$res = array();

		$google_app_id = $request->input('google_client_id');
		$google_secret_id = $request->input('google_secret_id');
		// $google_re_uri = $request->input('google_re_uri');

		$fb_client_id = $request->input('fb_client_id');
		$fb_secret_id = $request->input('fb_secret_id');
		// $fb_re_uri = $request->input('fb_re_uri');

		$validator_array = array(
			'google_client_id' => $request->input('google_client_id'),
			'google_secret_id' => $request->input('google_secret_id'),
			// 'google_re_uri' => $request->input('google_re_uri'),

			'fb_client_id' => $request->input('fb_client_id'),
			'fb_secret_id' => $request->input('fb_secret_id'),
			// 'fb_re_uri' => $request->input('fb_re_uri'),
		);

		$validator = Validator::make($validator_array, [
			'google_client_id' => 'required',
			'google_secret_id' => 'required',
			// 'google_re_uri' => 'required',

			'fb_client_id' => 'required',
			'fb_secret_id' => 'required',
			// 'fb_re_uri' => 'required',
		]);

		$errors = $validator->errors();

		if($errors->has('google_client_id')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('google_client_id');
			return redirect()->back()->with('error-message', $res['msg'])->withInput();
		}
		if($errors->has('google_secret_id')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('google_secret_id');
			return redirect()->back()->with('error-message', $res['msg'])->withInput();
		}
		// if($errors->has('google_re_uri')){
		// 	$res['msgType'] = 'error';
		// 	$res['msg'] = $errors->first('google_re_uri');
		// 	return redirect()->back()->with('error-message', $res['msg'])->withInput();
		// }

		if($errors->has('fb_client_id')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('fb_client_id');
			return redirect()->back()->with('error-message', $res['msg'])->withInput();
		}
		if($errors->has('fb_secret_id')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('fb_secret_id');
			return redirect()->back()->with('error-message', $res['msg'])->withInput();
		}
		// if($errors->has('fb_re_uri')){
		// 	$res['msgType'] = 'error';
		// 	$res['msg'] = $errors->first('fb_re_uri');
		// 	return redirect()->back()->with('error-message', $res['msg'])->withInput();
		// }

		$option = array(
			'google_client_id' => $google_app_id,
			'google_secret_id' => $google_secret_id,
			// 'google_re_uri' => $google_re_uri,

			'fb_client_id' => $fb_client_id,
			'fb_secret_id' => $fb_secret_id,
			// 'fb_re_uri' => $fb_re_uri,

		);

		$data = array(
			'option_name' => 'social_login',
			'option_value' => json_encode($option)
		);

		$gData = Tp_option::where('option_name','social_login')->get();
		// dd($data);
		$id = '';
		foreach ($gData as $row){
			$id = $row['id'];
		}

		if($id == ''){
			$response = Tp_option::create($data);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('New Data Added Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data insert failed');
			}
		}else{
			$response = Tp_option::where('id', $id)->update($data);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Data Updated Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data update failed');
			}
		}
		return redirect()->back()->with('message', $res['msg']);
		// return response()->json($res);
	}


    function ThemePaymentGateway()
	{
		$results = Tp_option::where('option_name', 'payment_gateway')->first();
		if($results){
			$dataObj = json_decode($results->option_value);
			$data['stripe_publice_key'] = $dataObj->stripe_publice_key ?? '';
			$data['stripe_secret_key'] = $dataObj->stripe_secret_key ?? '';
			$data['stripe_currency'] = $dataObj->stripe_currency ?? '';
            $data['stripe_icon'] = $dataObj->stripe_icon ?? '';
            $data['stripe_status'] = $dataObj->stripe_status ?? '';

			$data['paypal_client_id'] = $dataObj->paypal_client_id ?? '';
			$data['paypal_secret_key'] = $dataObj->paypal_secret_key ?? '';
			$data['paypal_currency'] = $dataObj->paypal_currency ?? '';
            $data['paypal_icon'] = $dataObj->paypal_icon ?? '';
            $data['sand_box_mode'] = $dataObj->sand_box_mode ?? '';
            $data['paypal_status'] = $dataObj->paypal_status ?? '';

		}else{
			$data['stripe_publice_key'] = "";
			$data['stripe_secret_key'] = "";
			$data['stripe_currency'] = "";
            $data['stripe_icon'] = "";
            $data['stripe_status'] = "";

			$data['paypal_client_id'] = "";
			$data['paypal_secret_key'] = "";
			$data['paypal_currency'] = "";
            $data['paypal_icon'] = "";
            $data['sand_box_mode'] = "";
            $data['paypal_status'] = "";
		}
		$dat_a['datalist'] = $data;
		return view('Backend.setting.appearance.paymentgateway',$dat_a);
	}

    function ThemePaymentGatewaySave(Request $request)
	{
        $gData = Tp_option::where('option_name','payment_gateway')->first();
		// dd($gData);
		$id = '';
		if($gData){
			$id = $gData->id;
		}
		$res = array();

		$stripe_publice_key = $request->input('stripe_publice_key');
		$stripe_secret_key = $request->input('stripe_secret_key');
		$stripe_currency = $request->input('stripe_currency');

        // if(isset($request->stripe_icon)){
        if($request->hasFile('stripe_icon')){
            // @unlink(public_path("upload/paymentgateway/".));
            $fileName = rand().time().'.'.request()->stripe_icon->getClientOriginalExtension();
            request()->stripe_icon->move(public_path('upload/paymentgateway/'),$fileName);
            $stripe_icon= $fileName;
        }else{
            if($id){
                $dataObj = json_decode($gData->option_value);
                $stripe_icon=$dataObj->stripe_icon ?? '';
            }else{
                $stripe_icon='';
            }

        }


        // $stripe_icon = $request->input('stripe_icon');

        if(isset($request->stripe_status)){
         $stripe_status = $request->input('stripe_status');
        }else{
         $stripe_status = '0';
        }

		$paypal_client_id = $request->input('paypal_client_id');
		$paypal_secret_key = $request->input('paypal_secret_key');
		$paypal_currency = $request->input('paypal_currency');

        // if(isset($request->paypal_icon)){
        if($request->hasFile('paypal_icon')){
            $fileName = rand().time().'.'.request()->paypal_icon->getClientOriginalExtension();
            request()->paypal_icon->move(public_path('upload/paymentgateway/'),$fileName);
            $paypal_icon= $fileName;
        }else{
            if($id){
                $dataObj = json_decode($gData->option_value);
                $paypal_icon=$dataObj->paypal_icon ?? '';
            }else{
                $paypal_icon='';
            }

        }

        // $paypal_icon = $request->input('paypal_icon');

        if(isset($request->sand_box_mode)){
         $sand_box_mode = $request->input('sand_box_mode');
        }else{
         $sand_box_mode = '0';
        }

        if(isset($request->paypal_status)){
         $paypal_status = $request->input('paypal_status');
        }else{
         $paypal_status = '0';
        }



		$option = array(
			'stripe_publice_key' => $stripe_publice_key ?? "",
			'stripe_secret_key' => $stripe_secret_key ?? "",
			'stripe_currency' => $stripe_currency ?? "",
            'stripe_icon' => $stripe_icon ?? "",
            'stripe_status' => $stripe_status ?? 0,

			'paypal_client_id' => $paypal_client_id ?? "",
			'paypal_secret_key' => $paypal_secret_key ?? "",
			'paypal_currency' => $paypal_currency ?? "",
            'paypal_icon' => $paypal_icon ?? "",
            'sand_box_mode' => $sand_box_mode ?? 0,
            'paypal_status' => $paypal_status ?? 0,

		);

		$data = array(
			'option_name' => 'payment_gateway',
			'option_value' => json_encode($option)
		);



		if($id == ''){
			// dd($data);
			$response = Tp_option::create($data);
			if($response){
				return redirect()->back()->with('message', __('New Data Added Successfully'));
			}else{
				return redirect()->back()->with('error-message', __('Data insert failed'));

			}
		}else{
			$response = Tp_option::where('id', $id)->update($data);
			if($response){
				return redirect()->back()->with('message', __('Data Updated Successfully'));
			}else{
				return redirect()->back()->with('error-message', __('Data update failed'));
			}
		}

		// return response()->json($res);
	}



    function ThemeCustomCss(){

		$results = Tp_option::where('option_name', 'theme_custom_css')->first();
		if($results){
			$dataObj = json_decode($results->option_value);
			$data['custom_headre_css'] = $dataObj->custom_headre_css ?? '';
		}else{
			$data['custom_headre_css'] = "";
		}
		$dat_a['datalist'] = $data;
		return view('Backend.setting.appearance.theme-options-custom_css',$dat_a);
    }
	function SaveThemeCustomCss(Request $request)
	{
		//dd($request->all());
		$res = array();

		$custom_headre_css = $request->input('custom_headre_css');

		// $validator_array = array(
		// 	'custom_headre_css' => $request->input('custom_headre_css'),
		// );

		// $validator = Validator::make($validator_array, [
		// 	'custom_headre_css' => 'required',
		// ]);

		// $errors = $validator->errors();

		// if($errors->has('custom_headre_css')){
		// 	$res['msgType'] = 'error';
		// 	$res['msg'] = $errors->first('custom_headre_css');
		// 	return response()->json($res);
		// }

		$option = array(
			'custom_headre_css' => $custom_headre_css,

		);

		$data = array(
			'option_name' => 'theme_custom_css',
			'option_value' => json_encode($option)
		);

		$gData = Tp_option::where('option_name','theme_custom_css')->get();
		// dd($data);
		$id = '';
		foreach ($gData as $row){
			$id = $row['id'];
		}

		if($id == ''){
			$response = Tp_option::create($data);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('New Data Added Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data insert failed');
			}
		}else{
			$response = Tp_option::where('id', $id)->update($data);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Data Updated Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data update failed');
			}
		}

        return redirect()->back()->with('message', $res['msg']);
		// return response()->json($res);
	}
    function ThemeCustomHtml(){

		$results = Tp_option::where('option_name', 'theme_custom_html')->first();
		if($results){
			$dataObj = json_decode($results->option_value);
			$data['custom_headre_html'] = $dataObj->custom_headre_html ?? '';
			$data['custom_body_html'] = $dataObj->custom_body_html ?? '';
			$data['custom_footer_html'] = $dataObj->custom_footer_html ?? '';
		}else{
			$data['custom_headre_html'] = "";
			$data['custom_body_html'] = "";
			$data['custom_footer_html'] = "";
		}
		$dat_a['datalist'] = $data;
		return view('Backend.setting.appearance.theme-options-custom_html',$dat_a);
    }
	function SaveThemeCustomHtml(Request $request)
	{
		//dd($request->all());
		$res = array();

		$custom_headre_html = $request->input('custom_headre_html');
		$custom_body_html = $request->input('custom_body_html');
		$custom_footer_html = $request->input('custom_footer_html');

		// $validator_array = array(
		// 	'custom_headre_html' => $request->input('custom_headre_html'),
		// 	'custom_body_html' => $request->input('custom_body_html'),
		// 	'custom_footer_html' => $request->input('custom_footer_html'),
		// );

		// $validator = Validator::make($validator_array, [
		// 	'custom_headre_html' => 'required',
		// 	'custom_body_html' => 'required',
		// 	'custom_footer_html' => 'required',
		// ]);

		// $errors = $validator->errors();

		// if($errors->has('custom_headre_html')){
		// 	$res['msgType'] = 'error';
		// 	$res['msg'] = $errors->first('custom_headre_html');
		// 	return response()->json($res);
		// }
		// if($errors->has('custom_body_html')){
		// 	$res['msgType'] = 'error';
		// 	$res['msg'] = $errors->first('custom_body_html');
		// 	return response()->json($res);
		// }
		// if($errors->has('custom_footer_html')){
		// 	$res['msgType'] = 'error';
		// 	$res['msg'] = $errors->first('custom_footer_html');
		// 	return response()->json($res);
		// }

		$option = array(
			'custom_headre_html' => $custom_headre_html,
			'custom_body_html' => $custom_body_html,
			'custom_footer_html' => $custom_footer_html,

		);

		$data = array(
			'option_name' => 'theme_custom_html',
			'option_value' => json_encode($option)
		);

		$gData = Tp_option::where('option_name','theme_custom_html')->get();
		// dd($data);
		$id = '';
		foreach ($gData as $row){
			$id = $row['id'];
		}

		if($id == ''){
			$response = Tp_option::create($data);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('New Data Added Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data insert failed');
			}
		}else{
			$response = Tp_option::where('id', $id)->update($data);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Data Updated Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data update failed');
			}
		}

        return redirect()->back()->with('message', $res['msg']);
		// return response()->json($res);
	}

    function ThemeCustomJs(){
		$results = Tp_option::where('option_name', 'theme_custom_js')->first();
		if($results){
			$dataObj = json_decode($results->option_value);
			$data['custom_head_js'] = $dataObj->custom_head_js ?? '';
			$data['custom_body_js'] = $dataObj->custom_body_js ?? '';
			$data['custom_footer_js'] = $dataObj->custom_footer_js ?? '';
		}else{
			$data['custom_head_js'] = "";
			$data['custom_body_js'] = "";
			$data['custom_footer_js'] = "";
		}
		$dat_a['datalist'] = $data;
        return view("Backend.setting.appearance.theme-options-custom_js", $dat_a);
    }
	function SaveThemeCustomJs(Request $request)
	{
		$res = array();

		$custom_head_js = $request->input('custom_head_js');
		$custom_body_js = $request->input('custom_body_js');
		$custom_footer_js = $request->input('custom_footer_js');

		// $validator_array = array(
		// 	'custom_js' => $request->input('custom_js'),
		// 	'custom_body_js' => $request->input('custom_body_js'),
		// 	'custom_footer_js' => $request->input('custom_footer_js'),
		// );

		// $validator = Validator::make($validator_array, [
		// 	'custom_head_js' => 'required',
		// 	'custom_body_js' => 'required',
		// 	'custom_footer_js' => 'required',
		// ]);

		// $errors = $validator->errors();

		// if($errors->has('custom_js')){
		// 	$res['msgType'] = 'error';
		// 	$res['msg'] = $errors->first('custom_head_js');
		// 	return response()->json($res);
		// }
		// if($errors->has('custom_js')){
		// 	$res['msgType'] = 'error';
		// 	$res['msg'] = $errors->first('custom_body_js');
		// 	return response()->json($res);
		// }
		// if($errors->has('custom_js')){
		// 	$res['msgType'] = 'error';
		// 	$res['msg'] = $errors->first('custom_footer_js');
		// 	return response()->json($res);
		// }

		$option = array(
			'custom_head_js' => $custom_head_js,
			'custom_body_js' => $custom_body_js,
			'custom_footer_js' => $custom_footer_js,

		);

		$data = array(
			'option_name' => 'theme_custom_js',
			'option_value' => json_encode($option)
		);

		$gData = Tp_option::where('option_name','theme_custom_js')->get();
		// dd($data);
		$id = '';
		foreach ($gData as $row){
			$id = $row['id'];
		}

		if($id == ''){
			$response = Tp_option::create($data);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('New Data Added Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data insert failed');
			}
		}else{
			$response = Tp_option::where('id', $id)->update($data);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Data Updated Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data update failed');
			}
		}

		return redirect()->back()->with('message', $res['msg']);
		// return response()->json($res);
	}
    function ThemeGoogleMaps(){
		$results = Tp_option::where('option_name', 'google_maps_address')->first();
		if($results){
			$dataObj = json_decode($results->option_value);
			$data['g_location'] = $dataObj->g_location ?? '';
			$data['status'] = $dataObj->status ?? '';
		}else{
			$data['g_location'] = "";
			$data['status'] = "";
		}
		$dat_a['datalist'] = $data;
        return view("Backend.setting.appearance.theme-options-google-map", $dat_a);
    }
	function ThemeGoogleMapsSave(Request $request)
	{
		$res = array();

		$g_location = $request->input('g_location');
		$status = $request->input('status');

		$validator_array = array(
			'g_location' => $request->input('g_location'),
			'status' => $request->input('status'),
		);

		$validator = Validator::make($validator_array, [
			'g_location' => 'required',
			'status' => 'required',
		]);

		$errors = $validator->errors();

		if($errors->has('g_location')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('g_location');
			return redirect()->back()->with('error-message', $res['msg'])->withInput();
		}
		if($errors->has('status')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('status');
			return redirect()->back()->with('error-message', $res['msg'])->withInput();
		}

		$option = array(
			'g_location' => $g_location,
			'status' => $status,

		);

		$data = array(
			'option_name' => 'google_maps_address',
			'option_value' => json_encode($option)
		);

		$gData = Tp_option::where('option_name','google_maps_address')->get();
		// dd($data);
		$id = '';
		foreach ($gData as $row){
			$id = $row['id'];
		}

		if($id == ''){
			$response = Tp_option::create($data);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('New Data Added Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data insert failed');
			}
		}else{
			$response = Tp_option::where('id', $id)->update($data);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Data Updated Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data update failed');
			}
		}
		return redirect()->back()->with('message', $res['msg']);
		// return response()->json($res);
	}




}
