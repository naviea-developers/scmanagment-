<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SocialLoginController extends Controller
{
    protected function setGProvider(): bool
    {
        $social_login =  \App\Models\Tp_option::where('option_name', 'social_login')->first();
        if($social_login){
            $dataObj = json_decode($social_login->option_value);
            if(isset($dataObj->google_client_id) &&  isset($dataObj->google_secret_id)){
                config()->set([
                    'services.' . "google" => [
                        'client_id' => $dataObj->google_client_id,
                        'client_secret' => $dataObj->google_secret_id,
                        'redirect' =>    url('/google/callback'),
                    ],
                ]);

                return true;
            }

        }
        return false;
    }
    protected function setFProvider(): bool
    {
        $social_login =  \App\Models\Tp_option::where('option_name', 'social_login')->first();
        if($social_login){
            $dataObj = json_decode($social_login->option_value);
            if(isset($dataObj->fb_client_id) &&  isset($dataObj->fb_secret_id)){
                config()->set([
                    'services.' . "facebook" => [
                        'client_id' => $dataObj->fb_client_id,
                        'client_secret' => $dataObj->fb_secret_id,
                        'redirect' =>  url('/facebook/callback'),
                    ],
                ]);
                // dd(config());
                return true;
            }

        }
        return false;
    }

    public function redirectToGoogle(Request $request)
    {
        if($this->setGProvider()){

                if($request->login_type){
                    Session::put("login_type", $request->login_type);
                }else{
                    // dd("ss");
                    return back()->with("error","somthing went wrong!");
                }
                //dd(Socialite::driver('google')->redirect());
                return Socialite::driver('google')->redirect();

        }else{
            return "Please Set up Google Social Login";
        }


    }

    public function redirectToFacebook(Request $request)
    {

        if($this->setFProvider()){
            //    dd($this->setFProvider());
            if($request->login_type){
                Session::put("login_type", $request->login_type);
            }else{
                // dd("ss");
                return back()->with("error","somthing went wrong!");
            }
            return Socialite::driver('facebook')->redirect();

        }else{
            return "Please Set up Facebook Social Login";
        }

        // // dd($request->login_type);
        // if($request->login_type){
        //     Session::put("login_type", $request->login_type);
        // }else{
        //     // dd("ss");
        //     return back()->with("error","somthing went wrong!");
        // }

        // return Socialite::driver('facebook')->redirect();
    }

    public function redirectToApple()
    {
        return Socialite::driver('apple')->redirect();
    }
    public function handleFacebookCallback()
    {
        if($this->setFProvider()){
            try {

                $user = Socialite::driver('facebook')->user();
                $login_type = Session::get('login_type');
                $loginuser = User::where('facebook_id', $user->id)->where('type',$login_type)->first();
                Session::pull('login_type');
                //dd($loginuser);
                if($loginuser){
                    if($loginuser->type == 1){
                        Auth::login($loginuser);
                        return redirect()->intended(session()->get('url.intended'));
                        return redirect('/user/profile')->with('success', 'Welcome!');
                    }else if($loginuser->type == 2){
                        Auth::login($loginuser);
                        return redirect()->intended(session()->get('url.intended'));
                        return redirect('/user/profile')->with('success', 'Welcome!');
                    }else if($loginuser->type == 5){
                        Auth::login($loginuser);
                        return redirect()->intended(session()->get('url.intended'));
                        return redirect('/user/profile');
                    }else if($loginuser->type == 6){
                        Auth::login($loginuser);
                        return redirect()->intended(session()->get('url.intended'));
                        return redirect('/user/profile')->with('success', 'Welcome!');
                    }else{
                        return redirect('/register')->with('error', 'Your have already register in our database, Please Try another Facebook account.');
                    }
                }

                    DB::beginTransaction();
                    $my_arr['email'] = $user->email;
                //    dd($my_arr);
                    $validator = Validator::make($my_arr,[
                        // 'email' => 'email:rfc,dns',
                        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

                    ]);
                    if($validator->fails()) {
                        return redirect('register')->withErrors($validator);
                        // dd("hi");
                        dd($validator->errors());
                    }
                    $newUser = New User;
                    $newUser->name=$user->name;
                    $newUser->email=$user->email;
                    $newUser->email_verified_at=date('Y-m-d');
                    $newUser->mobile='';
                    $newUser->password=encrypt('12345678');
                    $newUser->facebook_id=$user->id;
                    $newUser->type = $login_type;
                    $newUser->save();
                    DB::commit();
                    if($login_type== 1){
                        Auth::login($newUser);
                        return redirect()->intended(session()->get('url.intended'));
                        return redirect('/user/profile')->with('success', 'Welcome!');
                    }else if($login_type == 2){
                        Auth::login($newUser);
                        return redirect()->intended(session()->get('url.intended'));
                        return redirect('/user/profile')->with('success', 'Welcome!');
                    }else if($login_type == 5){
                        Auth::login($newUser);
                        return redirect()->intended(session()->get('url.intended'));
                        return redirect('/user/profile')->with('success', 'Welcome!');
                    }else if($login_type == 6){
                        Auth::login($newUser);
                        return redirect()->intended(session()->get('url.intended'));
                        return redirect('/user/profile')->with('success', 'Welcome!');
                    }else{
                        return redirect('/register')->with('error', 'Your mail already register in our database, Please try another Facebook account.');
                    }

            } catch (Exception $e) {
                DB::rollBack();
                // dd($e->getMessage());
                return redirect('register')->with('error', "Something Went Wrong! Please Try Again.");
            }
        }
    }
    public function handleGoogleCallback()
    {
        if($this->setGProvider()){
            try {

                $user = Socialite::driver('google')->user();
                $login_type = Session::get('login_type');
                // $google_type = Session::get('google_type');


                $loginuser = User::where('google_id', $user->id)->where('type',$login_type)->first();
                Session::pull('login_type');
                //dd($loginuser);
                // dd($loginuser->type == 1);
                if($loginuser){
                    if($loginuser->type == 1){
                        Auth::login($loginuser);
                        return redirect()->intended(session()->get('url.intended'));
                        return redirect('/user/profile')->with('success', 'Welcome!');
                    }else if($loginuser->type == 2){
                        Auth::login($loginuser);
                        return redirect()->intended(session()->get('url.intended'));
                        return redirect('/user/profile')->with('success', 'Welcome!');
                    }else if($loginuser->type == 5){
                        Auth::login($loginuser);
                        return redirect()->intended(session()->get('url.intended'));
                        return redirect('/user/profile')->with('success', 'Welcome!');
                    }else if($loginuser->type == 6){
                        Auth::login($loginuser);
                        return redirect()->intended(session()->get('url.intended'));
                        return redirect('/user/profile')->with('success', 'Welcome!');
                    }
                    
                }else{
                    // dd($loginuser->type == 1);
                // if($loginuser->type == 1){
                //     return redirect('/register')->with('error', 'This mail has been Already Reagister in Student Account, Please Try Another Account.');
                // }elseif($loginuser->type == 2){
                //     return redirect('/register')->with('error', 'This mail has been Already Reagister in Teacher Account, Please Try Another Account.');
                // }elseif($loginuser->type == 5){
                //     return redirect('/register')->with('error', 'This mail has been Already Reagister in Seller Account, Please Try Another Account.');
                // }elseif($loginuser->type == 6){
                //     return redirect('/register')->with('error', 'This mail has been Already Reagister in Affileats Account, Please Try Another Account.');
                // }
                    return redirect('/register')->with('error', 'Your mail already register in our database, Please Try another mail.');
                }
            




                    DB::beginTransaction();
                    $my_arr['email'] = $user->email;
                //    dd($my_arr);
                    $validator = Validator::make($my_arr,[
                        // 'email' => 'email:rfc,dns',
                        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

                    ]);
                    if($validator->fails()) {
                    // Session::pull('google_type');
                        return redirect('register')->withErrors($validator);
                        // dd("hi");
                        dd($validator->errors());
                    }
                    //dd("hi");
                    // dd($user);
                    $newUser = New User;
                    $newUser->name=$user->name;
                    $newUser->email=$user->email;
                    $newUser->email_verified_at=date('Y-m-d');
                    $newUser->mobile='';
                    $newUser->password=encrypt('12345678');
                    $newUser->google_id=$user->id;
                    $newUser->type = $login_type;
                    $newUser->save();
                    DB::commit();
                    if($login_type== 1){
                        Auth::login($newUser);
                        return redirect()->intended(session()->get('url.intended'));
                        return redirect('/user/profile')->with('success', 'Welcome!');
                    }else if($login_type == 2){
                        Auth::login($newUser);
                        return redirect()->intended(session()->get('url.intended'));
                        return redirect('/user/profile')->with('success', 'Welcome!');
                    }else if($login_type == 5){
                        Auth::login($newUser);
                        return redirect()->intended(session()->get('url.intended'));
                        return redirect('/user/profile')->with('success', 'Welcome!');
                    }else if($login_type == 6){
                        Auth::login($newUser);
                        return redirect()->intended(session()->get('url.intended'));
                        return redirect('/user/profile')->with('success', 'Welcome!');
                    }




            } catch (Exception $e) {
                DB::rollBack();
                // dd($e->getMessage());
                return redirect('register')->with('error', "Something Went Wrong! Please Try Again.");
            }
        }
    }
    protected function requestTokenGoogle(Request $request){
        //return "hi";
        // Getting the user from socialite using token from google
       // $user = Socialite::driver('google')->stateless()->userFromToken($request->token);

        try {
            $validator = Validator::make($request->all(), [
            'token' => ['required'],
            'device_name' => ['required'],
            'type' => ['required'],
        ]);
        if($validator->fails()) {
             return response()->json([
                'status'=>'no',
                'message' => 'Login faild',
                'data'=>$validator->errors()
            ]);
            // return response()->json($validator->errors());
        }

            $user = Socialite::driver('google')->stateless()->userFromToken($request->token);

            $finduser = User::where('google_id', $user->id)->where('type',$request->type)->first();

            if($finduser){

                Auth::login($finduser);

               return response()->json($this->getUserAndToken($finduser, $request->device_name));

            }else{
                $newUser = New User;
                $newUser->name=$user->name;
                $newUser->email=$user->email;
                $newUser->type=$request->type;
                // $newUser->mobile=123456;
                $newUser->password=Hash::make('123456');
                $newUser->google_id=$user->id;
                 $user->type = 1;
                $newUser->save();

                Auth::login($newUser);

               return response()->json($this->getUserAndToken($newUser, $request->device_name));
            }

        } catch (Exception $e) {
            return response()->json([
                'status'=>'no',
                'des'=> $e->getMessage(),
                'message' => 'login faild',
            ]);
        }


    }
    private function getUserAndToken(User $user, $device_name){
        return
         [
            'message' => 'Login Successful',
            'user'  => new UserResource($user),
            'status'=>'ok',
            'authorization' => [
                'Access-Token' => $user->createToken($device_name)->plainTextToken,
                'type' => 'user',
            ]
        ];
    }

}
