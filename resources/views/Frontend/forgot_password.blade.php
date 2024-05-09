@extends('Frontend.layouts.master-layout')
@section('title','- Forgot Password')
@section('head')

@endsection
@section('main_contend')
<br>
<br>
<br>
<div class="py-5">
    <div class="container-lg">
        <div class="row justify-content-center">
            <div class="col-xl-9">
                <div class="row mx-0 align-items-center border-md rounded-3">
                    <div class="col-md-6 border-end-md p-4 p-sm-5">
                        <h2 class="h3 mb-4 mb-sm-3">
                            Hey there!<br>Welcome back.                        </h2>
                        <div class="mt-sm-2 text-center">
                            Login as                            <strong>
                                <a href="ins-signin.html" class="text-decoration-underline">Instructor</a>                            </strong>
                        </div>
                        <div class="mt-sm-2 mb-sm-4 text-center">
                            Login as                            <strong>
                                <a href="affiliate-signin.html" class="text-decoration-underline">Affiliate</a>                            </strong>
                        </div>
                        <img class="d-block mx-auto img-fluid" src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/img/signin.svg"
                            width="344" alt="Illustartion">
                        <!--<div class="mt-4 mt-sm-5">Don't have an account? <a href="" class="text-decoration-underline">Sign up here</a></div>-->
                    </div>
                    <div class="col-md-6 px-4 pt-2 pb-4 px-sm-5 pb-sm-5 pt-md-5">
                            {{-- success message start --}}
                            @if(session()->has('message'))
                            <div class="alert alert-success">
                            {{session()->get('message')}}
                            </div>
                            <script>
                                setTimeout(function(){
                                    $('.alert.alert-success').hide();
                                }, 3000);
                            </script>
                            @endif
                            {{-- success message start --}}

                    <h4>
                      Forgot Password!
                    </h4>


                        <form action="{{ route('forget.send_mail_f_password') }}" class="myform" id="learner_myform" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label mb-1" for="email">
                                Please enter your email address                            </label>
                            <input class="form-control form-control-lg" name="email" type="text" id="email"
                                placeholder="example@gmail.com" tabindex="1" required="" autofocus>
                        </div>





                        <button class="btn btn-dark-cerulean btn-lg w-100 login_submit" type="submit">
                            Reset Password
                        </button>
                        </form>



                        <!-- <a class="btn btn-outline-dark-cerulean btn-lg w-100 mb-3" href=""><i
                                class="fab fa-facebook me-1"></i>Sign in with Facebook</a> -->



                        <div class="mt-sm-4 text-center">
                            Don't have an account?                            <strong>

                                <a href="{{ route('frontend.register') }}" class="text-decoration-underline">Create an Account</a>                            </strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@include('Frontend.layouts.parts.news-letter')

@endsection
