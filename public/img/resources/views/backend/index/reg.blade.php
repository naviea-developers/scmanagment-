<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style>
        body {
  margin: 0;
  padding: 0;
  background-color: #e9ecff;
  height: 100vh;
}
#login .container #login-row #login-column #login-box {
    margin-top: 120px;
    max-width: 600px;
    height: auto;
    background-color: #fff5f5;
    box-shadow: 0px 0px 10px -1px #9c9c9c80;
    border-radius: 5px;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -35px;
}
    </style>

</head>
<body>

    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="/reg" method="post" enctype="multipart/form-data">
                            @csrf
                            <h3 class="text-center text-info">Registration</h3>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="shopname" class="text-info">Shop Name :</label><br>
                                    <input type="text" name="shopname" id="shopname" class="form-control" required placeholder="ex : Amazon">
                                </div>
                                <div class="form-group">
                                    <label for="logo" class="text-info">Logo :</label><br>
                                    <input type="file" name="logo" id="logo" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="logo" class="text-info">Account Type : </label><br>
                                    <select name="role" id="" class="form-control" required>
                                        <option selected disabled>Select Your Account Type</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Vendor</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="username" class="text-info">Email :</label><br>
                                    <input type="email" name="username" id="username" class="form-control" required placeholder="example@gmail.com">
                                </div>
                                <div class="form-group">
                                    <label for="password" class="text-info">Password :</label><br>
                                    <input type="password" name="password" id="password" class="form-control" required placeholder="********">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <a href="">Forgot password</a>
                                 </div>
                                 <div id="register-link" class="text-right">
                                     <a href="/" class="text-info">Login</a>
                                 </div>
                            </div>
                            <br>
                            <div class="col-12">
                                <button class="btn btn-primary">
                                    Registration Now
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<br>
<br>
<br>
<br>
<br>
</body>
</html>
