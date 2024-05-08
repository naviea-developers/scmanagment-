<!-- navbar start -->
<style>

    html , body {
        overflow-x: hidden !important;
    }

    .btn-nav{
        color: white;
        font-size: 18px;
        border: none;
        outline: none;
    }
    .btn-nav:hover{
        color: white;
        border: none !important;
        outline: none !important;

    }

    .dropdown-menu {
        background: #000000ad !important;
        margin-top: 7px !important;
    }

    .dropdown:hover .dropdown-menu{
        display: block;
    }
    .dropdown-menu{
        top: 25px;
    }

    .navbar{
        position: sticky;
        top: 0;
        left: 0;
        z-index: 1000;
        width: 100%;
    }

    .hideToggleMenu{
        display: none;
    }

.phoneViewBtns {
    visibility: hidden;
}


#navbarSupportedContent .btn-group {
    position: absolute !important;
    top: 8px !important;
    right: 20px !important;
}

#navbarSupportedContent .dropdown-menu{
	margin-left: -85px;
	margin-top: 10px !important;
	text-align: center;
}


@media only screen and (max-width: 1200px) {
  #navbarSupportedContent {
    margin-left: -30px !important;
  }
}

@media only screen and (max-width: 1100px) {
  #navbarSupportedContent {
    margin-left: -50px !important;
  }

  .login {
    width: 70px;
  }

  .nav-item a {
    padding: 7px 5px !important;
  }
}

.brRedus{
    border-radius: 15px !important;
    transition: 0.3s linear;
}



.navToggleBtn button {
    background: #00AEEF !important;
    border-color: #00AEEF !important;
    height: 30px;
    width: 30px;
    position: relative;
}

.navToggleBtn button i {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%,-50%);
}


.phoneViewBtns button {
    background: #00AEEF !important;
    border-color: #00AEEF !important;
    height: 30px;
    width: 30px;
    position: relative;
}

.phoneViewBtns button i {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%,-50%);
}

@media only screen and (max-width: 991px) {
    .phoneViewBtns{
        visibility: visible;
    }
    .login {
        display: none;
    }

    .navToggleBtn{
        margin-left: 15px !important;
    }

    .navbar {
        padding: 5px 0px !important;
        height: 50px;
        width: calc(100% - 0px) !important;
        margin-left: 0 !important;
    }

    .nav-logo {
        margin-top: 7px !important;
        margin-left: -73px;
        float: left;
        position: absolute !important;
        left: 50% !important;
	    top: -5px;
    }

    .navbar .navbar-nav {
        background: #000000ab !important;
        position: absolute;
        left: 50%;
        width: 70%;
        top: 55px;
        border-radius: 15px;
        transform: translate(-77%,-0%);
        overflow: scroll;
        max-height: 80vh;
    }

    .login2 {
        position: absolute;
        display: block;
        border: none;
        border-radius: 10px;
        padding: 5px !important;
        margin-right: 10px;
        right: 15px;
        top: 0px;
        background: #e4c4c4 !important;
        padding: 7px 5px !important;
        height: 35px !important;
        border-radius: 4px;
    }

    .dropdown-menu.show {
        margin-left: -100px !important;
        margin-top: 18px !important;
        top: 15px;
        left: -60px;
        width: 100px;
        padding: 0;
    }

    #navbarSupportedContent {
        margin-left: 0px !important;
    }

    .regBtnForPhone {
        border-radius: 5px !important;
        padding: 5px;
        position: absolute;
        right: 15px;
        top: 0px;
    }

    .phoneViewBtns {
        position: absolute;
        right: 0px;
    }

    .navToggleBtn {
        position: absolute;
        left: 0;
    }

    #navbarSupportedContent .dropdown-menu {
        margin-left: 0px !important;
    }


    .phoneViewBtns .dropdown-menu.show:last-child {
        margin-left: -100px !important;
        margin-top: 18px !important;
        top: 15px;
        left: -36px;
        width: 193px;
        padding: 0;
    }
}

.btn-group:hover .dropdown-menu{
    display: block !important;
    margin-top: 25px !important;
}



@media only screen and (max-width: 550px) {
    .courseSlider {
        margin-top: 80px !important;
    }
}

@media only screen and (max-width: 420px) {
    .owl-stage {
        margin-left: -30px !important;
    }
    
    .owl-prev {
	    margin-left: -40px !important;
    }
    
    .owl-next {
        margin-right: -20px !important;
    }
}

@media only screen and (max-width: 600px) {
    .nav-logo {
        margin-top: 2px;
        background: red;
        width: calc(100% - 153px);
        left: 128px !important;
        position:relative !important;
    }
    
    .nav-logo img{
        position:absolute;
        left:50%;
        top:0;
        transform: translate(20px,-12px);
    }
}

#navbarSupportedContent {
    margin-left: 20px !important;
}

</style>
@php
    $allcourse = DB::table('category')->get();
    $academicProgram = DB::table('sub_category')->where('category_id','=',8)->get();
    $itcourse = DB::table('sub_category')->where('category_id','=',7)->get();
    $bcs = DB::table('sub_category')->where('category_id','=',13)->get();
    $prof = DB::table('sub_category')->where('category_id','=',10)->get();
@endphp


<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

<section class="width-100" style="position: fixed;z-index: 10000;width: 100%;">
    <nav class="navbar navbar-expand-lg ps-4 pe-5">
        <div class="container">

            <div class="navToggleBtn" style="margin-left: 0px;">
                <button class="btn btn-light showToggleMenu">
                    <i class="fa-duotone fa-bars"></i>
                </button>
                <button class="btn btn-light hideToggleMenu">
                    <i class="fa-solid fa-xmark-large"></i>
                </button>
            </div>

            <h2 class="nav-text fw-bolder nav-logo" style="margin-top:2px;">
                <a href="/" style="height: 40px;width: 40px;">
                    <img src="{{ asset('/logo.png') }}" style="height: 40px;width: 40px;object-fit: cover;">
                </a>
            </h2>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-4 px-3" style="margin-left: 60px !important;">
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="/">Home</a>
                    </li>

                    <li class="nav-item dropdown show">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Course
                        </a>

                        <ul class="dropdown-menu text-light bg-green">
                            @foreach ($allcourse as $course)
                            <li>
                                <a class="dropdown-item text-light" href="/courseCategory/{{ $course->catId }}">
                                    {{ $course->categoryName }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Academic Programme
                        </a>


                        <ul class="dropdown-menu text-light bg-green">
                            @foreach ($academicProgram as $program)
                            <li>
                                <a class="dropdown-item text-light white" href="/academicPrograms/{{ str_replace(" ","_",$program->subCategoryName) }}">{{ $program->subCategoryName }}</a>
                            </li>
                            @endforeach
                        </ul>

                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            IT
                        </a>


                        <ul class="dropdown-menu text-light bg-green">
                            @foreach ($itcourse as $it)
                            <li>
                                <a class="dropdown-item text-light white" href="/it/{{ str_replace(" ","-",$it->subCategoryName) }}">{{ $it->subCategoryName }}</a>
                            </li>
                            @endforeach
                        </ul>

                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            BCS
                        </a>
                        <ul class="dropdown-menu text-light bg-green">
                            @foreach ($bcs as $bcsd)
                                <li>
                                    <a class="dropdown-item text-light white" href="/bcs/{{ str_replace(" ","-",$bcsd->subCategoryName) }}">{{ $bcsd->subCategoryName }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Professional
                        </a>
                        <ul class="dropdown-menu text-light bg-green">
                            @foreach ($prof as $it)
                            <li>
                                <a class="dropdown-item text-light white" href="/professional/{{ str_replace(" ","-",$it->subCategoryName) }}">{{ $it->subCategoryName }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('aboutPage') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('carrier') }}">Carrier</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('contactus') }}">Contact</a>
                    </li>

                </ul>
                <form class="d-flex gap-3" role="search">
                    {{-- <button type="button" class="btn btn-outline-danger">OR</button> --}}
                    <!-- Example single danger button -->
                    @if(session()->get('userId'))
                        <div class="btn-group">
                            <a href="/cartView" class="btn btn-outline-none bg-none btn-nav"> <i class="fa-solid fa-cart-shopping"></i></a>
                            @if(session()->get('userRole') == 'student')
                            <a href="/stdLogout" class="btn btn-outline-none bg-none btn-nav"><i class="fa-solid fa-right-from-bracket"></i></a>
                            @else
                            <a href="/teacherlogout" class="btn btn-outline-none bg-none btn-nav"><i class="fa-solid fa-right-from-bracket"></i></a>
                            @endif
                        </div>
                    @else
                    <div class="btn-group">
                        <button type="button" class="login dropdown-toggle px-3" data-bs-toggle="dropdown"
                        aria-expanded="false" style="background: #c6e3d4d6 !important">
                        Login
                        </button>
                        <ul class="dropdown-menu bg-green">
                            <li><a class="dropdown-item white" href="/StudentLogin">Student</a></li>
                            <li><a class="dropdown-item white" href="/signin">Teacher</a></li>
                        </ul>
                    </div>
                    <div class="btn-group" style="right: 110px !important;">
                        <button type="button" class="login dropdown-toggle px-3" data-bs-toggle="dropdown"
                        aria-expanded="false" style="background: #c6e3d4d6 !important">
                        Signup
                        </button>
                        <ul class="dropdown-menu bg-green">
                            <li><a class="dropdown-item white" href="/register">Student</a></li>
                            <li><a class="dropdown-item white" href="/teacherSignUp">Teacher</a></li>

                        </ul>
                    </div>
                    @endif
                </form>



            </div>



            <div class="btn-group phoneViewBtns">
                <div class="dropdown">
                    <button type="button" class="login2 dropdown-toggle px-3" data-bs-toggle="dropdown"
                        aria-expanded="false" style="background: #e4c4c4 !important;">
                        <i class="fa-duotone fa-right-to-bracket"></i>
                    </button>
                    <ul class="dropdown-menu bg-green">
                        <li><a class="dropdown-item white" href="/StudentLogin">Student</a></li>
                        <li><a class="dropdown-item white" href="/signin">Teacher</a></li>
                    </ul>
                </div>


                <div class="dropdown">
                    <button type="button" class="login2 dropdown-toggle px-3 regBtnForPhone" data-bs-toggle="dropdown"
                        aria-expanded="true" style="background: #e4c4c4 !important;">
                        <i class="fa-solid fa-user-plus"></i>
                    </button>
                    <ul class="dropdown-menu bg-green">
                        <li><a class="dropdown-item white" href="/teacherSignUp">Teacher</a></li>
                        <li><a class="dropdown-item white" href="/register">Student</a></li>
                    </ul>
                </div>

            </div>

    </nav>
</section>
<br>
<br>

<script>
    $('.showToggleMenu').on('click' , function(){
        $('.navbar').addClass('brRedus');
    });
    $('.hideToggleMenu').on('click' , function(){
        $('.navbar').removeClass('brRedus');
    });
</script>
<!-- navbar end -->
