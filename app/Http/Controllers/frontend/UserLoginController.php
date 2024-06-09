<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ChangePassword;
use App\Mail\ForgotPasswordEmail;
use App\Mail\EmailVerification;
use App\Mail\EmailVerificationCustom;
use App\Models\User;
use App\Models\Useraccess;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;


class UserLoginController extends Controller
{

    public function userRegister(Request $request)
    {
       // dd($request->all());

        $verified_email = User::where('email',$request->email)->where('email_verified_at',null)->first();
        if($verified_email){
            // $token= $this->generateRandomString(16);
            // $verified_email->email_verify_token = $token;
            // $verified_email->update();

            // $data['user'] = $verified_email;
            // $data['token'] = $token;

            // $details['email'] = $request->email;
            // $details['send_item'] = new EmailVerificationCustom($data);
            // dispatch(new \App\Jobs\SendEmailJob($details));

            // return redirect('/sign-in')->with('success', 'You are register successfully. Now you can login!');
            return redirect('/sign-in')->with('error', 'This mail have already register, Please try another mail.');
            // return redirect('/sign-in')->with('error', 'Email not verified. Please Verify your email!');
        }
        $validator = Validator::make($request->all(),[

            // 'email' => 'email:rfc,dns',
            'email' =>['required', 'string', 'email', 'max:255', 'unique:users'],
            'type' =>'required',
            'password' =>  [
                'required',
                'string',
                'min:8',             // must be at least 10 characters in length
                // 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
            ],
        ]);
        if($validator->fails()) {
            return back()->withErrors($validator)->withInput();
            // dd($validator->errors());
        }
        // dd($request);

        // try{
        //     DB::beginTransaction();


        $user = new User();
        $user->name = $request->name ?? '';
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->password =$request->password;

        $user->gender = $request->gender;

        $user->session_id = $request->session_id ?? 0;
        $user->class_id = $request->class_id ?? 0;
        $user->reg_fee_id = $request->reg_fee_id ?? 0;
        $user->roll_number = $request->roll_number;

        $user->qualification = $request->qualification ?? '';
        $user->experience = $request->experience ?? '';
        $user->language = $request->language ?? '';
        $user->country = $request->country ?? '';

        $user->continent_id = $request->continent_id ?? 0;
        if($request->consultant_status=='0'){
            $user->status = $request->consultant_status;
        }

        $user->address = $request->address ?? '';
        $user->type = $request->type;
        $user->is_alumni = 0;
        $user->save();

        // Generate a unique ID in the format TYYYYMMDD(user_id)
        $uniqueId = 'A' . date('Y') . $user->id;
        $user->unique_id = $uniqueId;
        $user->save();

        return redirect('/sign-in')->with('success', 'You are successfully Registered. Now You can login. Thank You.');

      

    }



    public function userSignin(Request $request)
    {

        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        $user = User::where('email', $request->email)->first();
        // if(!isset($user->email_verified_at)){
            // $token= $this->generateRandomString(10);
            // $user->email_verify_token = $token;
            // $user->update();

            // $data['user'] = $user;
            // $data['token'] = $token;

            // $details['email'] = $request->email;
            // $details['send_item'] = new EmailVerificationCustom($data);
            // dd("test");
            // dispatch(new \App\Jobs\SendEmailJob($details));
            // Mail::to($request->email)->send($details['send_item']);
        //     return redirect('/sign-in')->with('error', 'Please Verify your email first!');
        // }


        if($user)
        {
            $remember_me = $request->has('remember_me') ? true : false;
            if($user->type == 1 || $user->type == 2 || $user->type == 3 || $user->type == 4 || $user->type == 5 || $user->type == 6 || $user->type == 7 || $user->type == 8 || $user->type == 9){
                if(auth()->attempt(['email'=>$request->email,'password'=>$request->password],$remember_me)){
                    $UserIP=$_SERVER['REMOTE_ADDR'];
                    $browser_address=$_SERVER['HTTP_USER_AGENT'];
                    $timeDate= date("Y-m-d h:i:sa");
                    $user_access = Useraccess::where('user_id',auth()->user()->id)->where('ip_address',$UserIP)->where('browser_address',$browser_address)->first();
                    

                    if($user_access){
                        $user_access->date = Carbon::now();
                        $user_access->save();
                       
                        if(session()->has('login_pre_url') && session()->has('login_pre_url') != url('sign-in')){
                            return redirect(session()->get('login_pre_url'));
                        }else{
                            return redirect('/user/profile');
                        }
                        
                    }else{
                        $user_access_list = Useraccess::where('user_id',auth()->user()->id)->get();
                        if($user_access_list->count() >= 3){
                            $user_access_old = $user_access_list[0];
                            $user_access_old->delete();
                            Useraccess::insert(['user_id'=>auth()->user()->id,'ip_address'=>$UserIP,'browser_address'=>$browser_address,'date'=>$timeDate]);
                        }else{
                            Useraccess::insert(['user_id'=>auth()->user()->id,'ip_address'=>$UserIP,'browser_address'=>$browser_address,'date'=>$timeDate]);
                        }
                        if(session()->has('login_pre_url') && session()->has('login_pre_url') != url('sign-in')){
                            return redirect(session()->get('login_pre_url'));
                        }else{
                            return redirect('/user/profile');
                        }
                    }

                    // if($user_access){
                    //     $user_access->date = Carbon::now();
                    //     $user_access->save();
                    //     return redirect('/user/profile');
                    // }else{
                    //     $user_access_list = Useraccess::where('user_id',auth()->user()->id)->get();
                    //     if($user_access_list->count() >= 3){
                    //         $user_access_old = $user_access_list[0];
                    //         $user_access_old->delete();
                    //         Useraccess::insert(['user_id'=>auth()->user()->id,'ip_address'=>$UserIP,'browser_address'=>$browser_address,'date'=>$timeDate]);
                    //     }else{
                    //         Useraccess::insert(['user_id'=>auth()->user()->id,'ip_address'=>$UserIP,'browser_address'=>$browser_address,'date'=>$timeDate]);
                    //     }
                    //     return redirect('/user/profile');
                    // }
                
                    //dd(session()->get('url.intended'));
                   // dd(session()->get('url.intended') == url('sign-in'));
                    // if(session()->get('url.intended') == url('sign-in')){
                        // return redirect('/user/profile');
                    // }
                    // return redirect()->intended(session()->get('url.intended'));
                }
             }
            }

        return back()->with('error', 'Your email or password is incorrect.');
    }

    function generateRandomString($length = 10) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }

    public function getUserChangePassword()
    {
        $password = User::find(auth()->user()->id);
        return view('user.change_password', compact('password'));
    }

    public function setChangePassword(Request $request, $id)
    {
        $request->validate([
            // 'current_password' => 'required',
            // 'new_password' => 'required|min:8|confirmed',
            'new_password' =>  [
                'required',
                'string',
                'min:8',
                'confirmed',             // must be at least 10 characters in length
                // 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
            ]
        ]);

        $user = User::find($id);

        $data = [];
        $token= $this->generateRandomString(6);

        $user->change_token = $token;
        $user->change_date = date("Y-m-d H:i:s");
        $user->update();

        $data['user'] = $user;
        $data['token'] = $token;
        $details['email'] = $user->email;
        $details['send_item']=new ChangePassword($data);
        dispatch(new \App\Jobs\SendEmailJob($details));

        Session::put('new_password', $request->new_password);
        // if ($user->type == 5) {
            return redirect()->route('user.password_confirm', $user->id);
        // }

    }

    public function getConfirmPassword($id){
        $user = User::find($id);
        // if ($user->type == 5) {
            return view('user.change_password_code', compact('user'));
        // }
    }

    public function confirmChangePassword(Request $request, $id){
        if(isset($request->token)){
            $user= User::find($id);
            if($request->token == $user->change_token){
                $date1 =  date("Y-m-d H:i:s");
                $t1 = strtotime( $date1);
                $t2 = strtotime( $user->change_date );
                $diff =  $t1  - $t2;
                $hours = $diff / ( 60 * 60 );

                // dd($hours);
                if($hours <= 1){
                    $user->password = Session::get('new_password');
                    $user->update();
                    Session::pull('new_password');
                    // if($user->type == 5){
                        return redirect()->route('user.password', $user->id)->with('message', 'Password change successfully!');
                    // }
                }

            }else{
                return redirect()->back()->with('message', 'Password confirmation code does not match, Try again!');
            }
        }else{
            return redirect()->back()->with('message', 'Try again. Thank You.');
        }
    }

    public function userLogout()
    {
        auth()->logout();
       return redirect('/');
    }




//Forget Password section start here

public function forgotPassword()
{
    return view('Frontend.forgot_password');
}




public function sentMailforgotPassword(Request $request)
{
    $user = User::where('email', $request->email)->first();

    if($user)
    {
        $token= $this->generateRandomString();
        $user->forget_token = $token;
        $user->forget_date = date("Y-m-d H:i:s");
        $user->update();
        // $user = $request->email;
        $send_mail = $user->email;
        $data['id']= $user->id;
        $data['token'] = $token;
        $details['email'] =  $send_mail;
        //dd(new ForgotPasswordEmail($data));
    //    dd($send_mail);
        $details['send_item']=new ForgotPasswordEmail($data);
        dispatch(new \App\Jobs\SendEmailJob($details));
        //Artisan::call('queue:listen');
        //Mail::to($send_mail)->send(new ForgotPasswordEmail($data));
        return redirect()->back()->with('message', 'Check your email and reset your Password, Thank You.');
    }else{
        return back();
    }
}

public function emailForgotPassword(Request $request,$id)
{
    //dd('hi');
    if(isset($request->token)){
        $data['user'] =$user= User::find($id);
        if($request->token == $user->forget_token){
            $date1 =  date("Y-m-d H:i:s");
            $t1 = strtotime( $date1);
            $t2 = strtotime( $user->forget_date );
            $diff =  $t1  - $t2;
            $hours = $diff / ( 60 * 60 );
            if($hours <= 1){
                return view('Frontend.reset_forgot_password',$data);
            }else{
                return redirect('/forgot-password')->with('message', 'Your token time is over, please resubmit your requset, Thank you.');//eamil send foget link
            }
           // dd($user);

        }else{
            return redirect('/forgot-password')->with('message', 'Your token is not match, please resubmit again, Thank You.');//eamil send foget link
        }
        //dd($id);

    }else{
        return redirect('/forgot-password')->with('message', 'Please resubmit your email, and reset your password. Thank You.');
    }
}


public function resetForgotPassword(Request $request, $id)
{
    $request->validate([
        'password' => 'required|min:8|confirmed',
    ]);
    $user = User::find($id);
    $user->password = $request->password;
    $user->update();
     return redirect('/sign-in')->with('message', 'Your password is updated, Now you can login, Thank You.');

}

//Forget Password section end here

//Forget Password section Start here Admin
public function adminForgotPassword()
{
    return view('auth.forgot_password');
}

public function emailAdminForgotPassword(Request $request,$id)
{
    //dd('hi');
    if(isset($request->token)){
        $data['user'] =$user= User::find($id);
        if($request->token == $user->forget_token){
            $date1 =  date("Y-m-d H:i:s");
            $t1 = strtotime( $date1);
            $t2 = strtotime( $user->forget_date );
            $diff =  $t1  - $t2;
            $hours = $diff / ( 60 * 60 );
            if($hours <= 1){
                return view('auth.reset_forgot_password',$data);
            }else{
                return redirect('/admin-forgot-password')->with('message', 'Your token time is over, please resubmit your requset, Thank you.');//eamil send foget link
            }
           // dd($user);

        }else{
            return redirect('/admin-forgot-password')->with('message', 'Your token is not match, please resubmit again, Thank You.');//eamil send foget link
        }
        //dd($id);

    }else{
        return redirect('/admin-forgot-password')->with('message', 'Please resubmit your email, and reset your password. Thank You.');
    }
}


public function resetAdminForgotPassword(Request $request, $id)
{
    //dd('id');
    $request->validate([
        'password' => 'required|min:8|confirmed',
    ]);
    $user = User::find($id);
    $user->password = $request->password;
    $user->update();

     return redirect('/login')->with('message', 'Your password is updated, Now you can login, Thank You.');

}

//Forget Password section End here Admin

}
