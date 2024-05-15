<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .div-one{
            height: auto;
            width: 60%;
            margin: 0 auto;
            background-color: #2a3042;
            color: white;
            text-align: center;
            padding: 40px;
        }
    </style>
</head>
<body>
    @php
    $title = \App\Models\Tp_option::where('option_name', 'theme_option_header')->first();
    @endphp 
<div class="div-one">
    <p>Your Admission form is sumitted, Here is your's username and password</p>
    <p style="text-align: justify">username: {{ $value['email'] }}</p>
    <p style="text-align: justify">password: {{ $value['password'] }}</p>
    <br/>
    <br/>
    <p>Thank you..</p>
    <br>
    <br>
    <hr/>
    <p>&copy; 2023 All Rights Reserved | {{ $title->company_name }} </p>

</div>
</body>
</html>
