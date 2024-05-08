<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LMS - Admin</title>

    @include('inc.links')

    <link rel="stylesheet" href="css/custom/index.css">

</head>
<body>

    @if (\Session::has('msg'))
    <div class="toast show" data-bs-autohide="true" role="alert" aria-live="assertive"
    aria-atomic="true" style="float: right">
        <div class="toast-header">
        <img src="img/logo.png" style="height: 25px;weight:25px;"
        class="rounded me-2" alt="...">
        <strong class="me-auto">@include('inc.sitename')</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast"
        aria-label="Close"></button>
        </div>
        <div class="toast-body" style="text-transform: capitalize;">
            {!! \Session::get('msg') !!}
        </div>
    </div>
@endif
    <div class="adminPanelLogin">
        <h2 class="mb-3">Welcome</h2>
        <div class="formgroup">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="">
                        <i class="fa-solid fa-user"></i> Username :
                    </label>
                    <input type="text" name="username" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">
                        <i class="fa-duotone fa-lock"></i> Password :
                    </label>
                    <input type="text" name="pass" class="form-control">
                </div>

                <button class="btn btn-primary">
                    Login  <i class="fa-solid fa-right-to-bracket"></i>
                </button>
            </form>

            <div class="bottomGroup">
                <a href="/forgotpassword"><i class="fa-duotone fa-lock-hashtag"></i>  Forget password</a>

                <hr>

                <center>
                    Not yet a member? <a href="/signup">Sign Up</a>
                </center>

            </div>
            <center>
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



</body>
</html>
