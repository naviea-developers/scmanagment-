<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/custom/signup.css">
    <title>Teacher Signup</title>
</head>
<style>


</style>

<body>

@if (\Session::has('msg'))
        <div class="toast show" role="alert" aria-live="assertive"
        aria-atomic="true" style="float: right;float: right; position: fixed; z-index: 100000; background: #fff; top: 10px; right: 10px;">
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


    
@include('frontend.includess.header')
@include('frontend.includess.nav')
    

<div class="databox" style="height:110vh;">
    <div class="user-box" style="margin-top:100px;">
        <div class="image">
            <img src="{{asset('img/navieasoft-logo-(1)-(1).png')}}" alt="">
        </div>
        <form action="{{ route('addTeacher') }}" method="POST">
            @csrf
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Phone Number</label>
            <input type="text" name="phone" class="form-control">
        {{-- </div>
            <input type="hidden" class="form-control" >
        </div> --}}
        {{-- <div class="form-group">
            <label for="">Institute Name</label>
            <input type="text" class="form-control">
        </div> --}}
        <div class="form-group">
            <label for="">Qualification</label>
            <input type="text" name="edu_deg" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Experience</label>
            <input type="text" name="exp" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Address</label>
            <input type="text" name="address" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="pass" class="form-control">
        </div>
        <div class="form-group mb-5">
            <label for="">Confirm Password</label>
            <input type="password" name="Cpass" class="form-control">
        </div>

        <button class="btn btn-sm bg-light">Sign Up</button>
    </form>
        <center >
            Already have an account ? <a href="/signin">Log In</a>
        </center>
</div>
</div>
    
{{-- @include('frontend.includess.footer') --}}


    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/jquery/jquery.min.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
