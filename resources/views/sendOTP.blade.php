<!DOCTYPE html>
<html>
<head>

    <style>
        body{
            padding: 0px;
            margin: 0px;
        }

        img {
            margin-top: 50px;
        }

        .mailCard{
            width: 100%;
            background: #2d2366;
            min-height: 100vh;
            color: #fff;
            text-align: center;
        }

        .mailCard h1 {
            margin: 0px;
            padding: 0px;
        }
        p{
            font-size: 25px;
        }

        h2 {
            font-size: 50px;
        }
    </style>
</head>
<body>

    <div class="mailCard">
        <img src="https://www.logomaker.com/api/main/images/1j+ojVVCOMkX9Wyrexe4hGfN26XYt2wRx1nWtGcvIyYV9wJ6zHl5i...to9vg7IhgB4kdO3U1ON5MwiSJ8WYAdjx1i+incZ9QdEiMhi2kJVg==" alt="">
        <h2>Dear User</h2>
        <p>
            You are receiving this email because we received a password reset request for your account.
        </p>
        <span>Your Code is</span>
        <h1>{{ $otp }}</h1>
        <p>
            If you did not request a password reset, no further action is required.
            <br>
            <br>
            <b>Thanks</b>
        </p>
    </div>

</body>
</html>
