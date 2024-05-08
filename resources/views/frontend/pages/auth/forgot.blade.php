<!DOCTYPE html>
<html lang="en">
<head>
  <title>Forgot Password</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

  <style>

    body{
        background: #5f617d;
    }

    .box {
        width: 400px;
        height: auto;
        background: #020235;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%,-50%);
        padding: 15px;
        padding-bottom: 65px;
    }

    .box h2 {
        text-align: center;
        color: #fff;
        margin-top: 50px;
    }

    .box input {
        border-radius: 0px;
        margin-top: 10px;
    }

    .box button {
        width: 150px;
    }
  </style>

</head>
<body>

    <div class="box">
        <h2>Forgot Password</h2>
        <form action="/forgotPasswordAction" method="post">
            @csrf
            <input type="text" name="mail" class="form-control mt-3 mb-3" placeholder="Enter Your Mail...">
            <center>
                <button class="btn btn-light btn-sm">Get Code On Mail</button>
            </center>
        </form>
    </div>

</body>
</html>
