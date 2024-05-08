<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/custom/studentsignup.css">
    <link rel="stylesheet" href="../forntend/assets/css/style.css">
    <title>Register</title>
</head>

<body>
    
@include('frontend.includess.header')
@include('frontend.includess.nav')
    

<div class="databox" style="height:110vh;">
    <div class="user-box" style="margin-top:100px;">
        <div class="image">
            <img src="{{asset('img/navieasoft-logo-(1)-(1).png')}}" alt="">
        </div>
            <form action="{{ route('studentSignUp') }}" method="POST">
                @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control">
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
                <label for="">Address</label>
                <input type="text" name="addres" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Class Name</label>
                <select class="form-select" aria-label="Default select example" style="background: #020235;color: #fff;border: none;border-bottom: 1px solid;border-radius: 0;>
                  @foreach($classlist as $cl)
                    <option value="{{ $cl->class_id }}">{{ $cl->class_name }}</option>
                  @endforeach
                </select>
            </div>
                <div class="form-group">
                    <label for="">Institute Name</label>
                    <input type="text" name="institute" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="pass" class="form-control">
                </div>
                <div class="form-group mb-5">
                    <label for="">Confirm Password</label>
                    <input type="text" name="Cpass" class="form-control">
                </div>
        
                <button class="btn btn-sm bg-light">Sign Up</button>
            </form>
            <center >
                Already have an account ? <a href="/StudentLogin">Log In</a>
            </center>
        </div>
    </div>
</div>
    
    
    
    
@include('frontend.includess.footer')
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/jquery/jquery.min.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>



</body>
</html>
