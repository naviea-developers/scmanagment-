<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .box {
            height: auto;
            width: 400px;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            box-shadow: 0px 1px 8px 1px #b199998a;
            border-radius: 5px;
            padding: 15px;
            background: #221b25 !important;
            color: #fff !important;
        }

        .box a {
            text-decoration: none;
        }
    </style>
</head>
<body>


    <div class="box">
        <h2><b>Sign in</b></h2>
        <p>Login your account to easily use navieasoft.com service </p>

        <form action="homepagelogin" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Enter your phone number Or Email</label>
                <input type="text" name="phone" class="form-control" id="exampleFormControlInput1">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Enter your password</label>
                <input type="password" name="pass" class="form-control" id="exampleFormControlInput1">
            </div>


            <div class="md-3">
                <a href="">Forget password ?</a>
            </div>
            <br>
            <button class="btn btn-primary btn-sm" style="width: 100%;">
                Sign in
            </button>
        </form>



    </div>


</body>
</html>
