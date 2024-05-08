<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/custom/studentlogin.css">
    <title>Login - LMS</title>
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.3.0/css/all.css">
</head>

<body>
@include('frontend.includess.header')
@include('frontend.includess.nav')
    

<div class="databox" style="height:110vh;">
    <div class="user-box" style="margin-top:100px;">
        <div class="row">
            <div class="col-md-6">
                {{-- <img src="{{asset('img/teacher.png')}}" alt=""> --}}
                <div class="overlay">
                    <div class="text-content">
                        <h1>Welcome to <br>E-learning Navieasoft</h1>
                        <p>Your heart is slightly larger than the average human heart, but that's because you're a
                            teacher.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="Formoverlay">
                    <div class="image">
                        <img src="{{ asset('img/navieasoft-logo-(1)-(1).png') }}" alt="">
                    </div>
                    <form action="{{ route('loginStd') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="pass" class="form-control">
                            </div>
                        </div>
                        <button class="btn btn-sm bg-light">Log In</button>
                    </form>
                    <p><a href="/forgotpassword" class="link-warning" style="text-decoration: none;">Forgot Password?</a></p>

                    <center style="">
                        Don't have account ? <a href="/register">Create account</a>
                            <br>

                        <div class="socialLoginBtn">
                            <h5>login with</h5>
                            <a href="/socialLogin" class="g">
                                <i class="fa-brands fa-google"></i>
                            </a>
                            <a href="/socialLogin" class="f">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                            <a href="/socialLogin" class="l">
                                <i class="fa-brands fa-linkedin"></i>
                            </a>
                        </div>

                    </center>
                </div>
            </div>
    </div>
</div>



    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/jquery/jquery.min.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
