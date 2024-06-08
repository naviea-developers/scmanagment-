@extends('Frontend.layouts.master-layout')

@section('head')
<style>
    /* .gray-background{
        background: #f5f5f5
    } */
    /* .cities-card-top{
        overflow: scroll;
    } */
    .cities-card-top {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        grid-template-rows: 1fr;
        gap: 0px 0px;
        grid-template-areas:
          ". . . ";
      }
    .cities-card-top .card {
      width: 23.5rem;
    }
    .cities-card-top {
        display: block;
    }
    .cities-card-top .card {
    width: 100%;
    }
    .cities-card-top .card{
          min-width: 19em!important;
      }
      
      .ca-card-title {
        font-weight: 700;
        color: #484848;
      }

      p {
        margin-top: 0;
        margin-bottom: 1rem;
      }
    
      
      .uni-showcase * {
        text-align: center;
      }
    
      .uni-showcase a {
        display: inline-block;
        margin-top: 20px;
        font-size: 14px;
      }
    
      .uni-showcase img {
        max-width: 100%;
        height: auto;
      }
    
      .uni-showcase .unibox p {
        display: none;
      }
    
      /* .btn-txt {
        color: #fff !important;
      } */
    
      .btn-txt:hover {
        text-decoration: none;
      }
    
    /* Collabration Text */

    .coll_text {
    padding-top: 50px;
    font-family: 'Times New Roman', Times, serif;
    }

    #counter .logo-holder {
    width: 100%;
    display: block;
    }

    #counter .logo-holder img {
    height: 40px;
    max-width: inherit;
    width: auto;
    float: left;
    margin-right: 15px;
    }

    #counter .logo-holder h3 {
    display: inline-block;
    background: linear-gradient(90deg, #EA7D26 18.98%, #EDAC1F 81.39%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    text-emphasis-color: transparent;
    font-weight: 600;
    padding-top: 15px;
    }

    #counter .logo-holder .justify-content-center {
    display: inline-flex;
    margin-bottom: 5px;
    margin-top: 10px;
    }

    .logo-container ul {
    margin: 0;
    padding: 0;
    list-style: none;
    display: inline-block;
    }

    .logo-container {
    padding: 0px 50px;
    }

    .logo-container .logo-holder {
    background: #fff;
    border-radius: 10px;
    margin: 20px;
    box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.25);
    display: flex;
    height: 120px;
    }

    .logo-container .logo-holder img {
    max-height: 60px;
    max-width: 50%;
    width: auto;
    margin: auto;
    }

    .owl-dots {
    position: absolute;
    bottom: -30px;
    left: 50%;
    -webkit-transform: translate(-50%, 0);
    transform: translate(-50%, 0);
    }

    .owl-dots .owl-dot {
    background: #C4C4C4;
    border-radius: 50%;
    width: 10px;
    height: 10px;
    float: left;
    margin-right: 10px;
    }

    .owl-dots .owl-dot.active {
    background: #494CA2;
    }

    .s_img1,
    .s_img2,
    .s_img3,
    .s_img4 {
    width: 30%;
    }

    .s_text1 {
    background: linear-gradient(90deg, #EA7D26 18.98%, #EDAC1F 81.39%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    text-emphasis-color: transparent;
    font-weight: 600;
    }


    /* Collabration Text */
</style>
@endsection
@section('main_contend')
@include('Frontend.layouts.parts.header-menu')


<div class="modal m-t-40 " id="modal_info">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title modal_ttl"></h6>
                <!-- <button type="button" class="close" data-bs-dismiss="modal">&times;</button> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" id="info"></div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!--End Navbar-->
<input type="hidden" id="popup" value="">
<!--============ its for header file call close =============-->
<!-- Main content -->
<!--Start Main Background Video Header -->
<header class="main-header header-video_bg position-relative overflow-hidden w-100 py-md-5">

    <!--<div class="overlay"></div>-->
    <!--Start Header Background video-->
    <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
        <source src="{{ $home_content->banner_video_show }}"type="video/mp4">
    </video>
    <!--End Header Background video-->
    <div class="container-lg position-relative text-white py-5">
        <div class="text-center pt-5 py-md-5">
                <div class="header-logo mb-5 pt-5">
                    <img src="{{ $home_content->banner_image_show }}" style="height: 120px; width:250px"
                        class="img-fluid" alt="">
                </div>

                <h2 class="fw-medium h3 text-uppercase" style="color: var(--header_text_color)">{!!  $home_content->banner_text  !!}</h2>
                <div class="header-btn l mt-5 text-uppercase" style="letter-spacing: 2px;">
                    {{-- @foreach ($buttons as $button)
                    <a href="{{ $button->answer }}" class="btn btn-dark-cerulean btn-lg mb-2" style="color: var(--button2_text_color)">{{ $button->question }}</a>
                    @endforeach --}}

                    @foreach ($classes as $class)
                    <a href="{{ route('frontend.class_details',@$class->id) }}" class="btn btn-dark-cerulean btn-lg mb-2" style="color: var(--button2_text_color)">{{ $class->name }}</a>
                    @endforeach
                </div>
        </div>
    </div>
</header>

<!-- End  class List -->
@isset($classLists)
<div class="pb-1 pt-4 d-none mt-1 d-lg-block">
    <h3 class="fw-bold mb-0 text-dark-cerulean text-center text-uppercase">{{ $home_content->university_location_title }}</h3>
    <div class="container flex-column p-0 d-flex mt-4">
        
        <section class="mdc-card__supporting-text p-0">
        <section class="d-lg-flex cities-card-top py-3 justify-content-between">
            @foreach (@$classLists as $k=>$classList)
                @if ($k< 3)
                    <div class="card w-sm-auto mr-4 mt-1 ml-auto mr-auto mr-md-2 ml-md-0" style="margin-right: 7px;">
                    <div class="embed-responsive embed-responsive-16by9">
                        <img style="height: 225px;width:100%" src="{{ @$classList->class->image_show }}" class="card-img-top embed-responsive-item lazyload" alt="">
                    </div>
                    <a class="stretched-link" style="color:#007bff" href="{{ route('frontend.class_details',@$classList->class->id) }}">
                    <h3 class=""
                        style="position: absolute;top: 10px;left: 20px;font-size: 1.5rem;color: #fff;font-weight: 600;text-shadow: 1px 2px 10px #202020;">
                        {{ @$classList->class->name }}</h3>
                    </a>
                    </div>
                @endif
            @endforeach
        </section>
        </section>
    </div>
    <div class="container d-flex flex-column mb-5 p-0">
        <section class="mdc-card__supporting-text p-0 ">
        <section class="d-lg-flex cities-card-bottom">
            @foreach ($classLists as $k=>$classList)
                @if ($k>2)
                    <div class="card w-sm-auto mr-4 mt-1 ml-auto mr-auto mr-md-2 ml-md-0" style="margin-right: 7px;">
                    <div class="embed-responsive embed-responsive-16by9">
                        <img style="height: 225px;width:100%" src="{{ @$classList->class->image_show }}" class="card-img-top embed-responsive-item lazyload" alt="">
                    </div>
                    <a class="stretched-link" style="color:#007bff" href="{{ route('frontend.class_details',@$classList->class->id) }}">
                    <h3 class=""
                        style="position: absolute;top: 10px;left: 20px;font-size: 1.5rem;color: #fff;font-weight: 600;text-shadow: 1px 2px 10px #202020;">
                        {{ @$classList->class->name }}</h3>
                    </a>
                    </div>
                @endif
            @endforeach
        </section>
        </section>

    </div>
</div>
@endisset

<div class="text-center mt-0 mb-4 firstbutton">
    <a href="{{ route('frontend.all.class.class_list_show') }}"
    class="btn btn-lg btn-dark-cerulean" style="color: var(--button2_text_color)">
        Class List
        <svg class="ms-2" xmlns="http://www.w3.org/2000/svg" width="28.56" height="15.666"
            viewBox="0 0 28.56 15.666">
            <path id="right-arrow_3_" data-name="right-arrow (3)"
                d="M20.727,107.5l-1.272,1.272,5.661,5.661H0v1.8H25.116l-5.661,5.661,1.272,1.272,7.833-7.833Z"
                transform="translate(0 -107.5)" fill="#fff"></path>
        </svg>
    </a>
</div>
  <!-- End class List -->


  <style>
    .teacher-details img {
        border-radius: 50%;
        max-width: 150px;
        margin-bottom: 20px;
    }
    .teacher-details h3 {
        margin-top: 10px;
        font-size: 24px;
        font-weight: bold;
    }
    .teacher-details h4 {
        font-size: 20px;
        color: rgb(14, 13, 13);
        margin-bottom: 20px;
    }
    .teacher-details .social {
        padding: 0;
        list-style: none;
        display: flex;
        justify-content: center;
    }
    .teacher-details .social li {
        margin: 0 10px;
    }
    .teacher-details .social a {
        color: var(--text_color);
        font-size: 24px;
    }
    .teacher-details .social a:hover {
        color: var(--hover_color);
    }
</style>




  <section class="ourteam-section">
    <!-- Founder and CEO -->
    <div class="container">
        <div class="">
            <h3 class="fw-bold mb-3 text-dark-cerulean text-center text-uppercase">Founder</h3>
        </div>
        <div class="row">
            @foreach ($founders as $k=> $founder)


            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="our-team">
                <div  data-toggle="modal" data-target="#founderModal{{ $k }}">
                    <div class="picture">
                        <img class="img-fluid" src="{{ @$founder->image_show }}">
                    </div>
                    <div class="team-content">
                        <h3 class="name" style="color: var(--text_color)">{{ @$founder->name }}</h3>
                        <h4 class="title" style="color: var(--text_color)">{{ @$founder->designation }}</h4>
                    </div>
                </div>
              <ul class="social">
                <li><a href="{{ @$founder->facebook }}" class="fab fa-facebook" aria-hidden="true"></a></li>
                <li><a href="{{ @$founder->twitter }}" class="fab fa-twitter" aria-hidden="true"></a></li>
                <li><a href="{{ @$founder->google_plus }}" class="fab fa-google-plus" aria-hidden="true"></a></li>
                <li><a href="{{ @$founder->linkedin }}" class="fab fa-linkedin" aria-hidden="true"></a></li>
              </ul>
            </div>
          </div>



   
<!-- Modal -->
<div class="modal fade" id="founderModal{{ $k }}" tabindex="-1" role="dialog" aria-labelledby="founderrModalLabel{{ $k }}" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header"  style="background: var(--menu_color)">
                <h5 class="modal-title" id="founderrModalLabel{{ $k }}" style="color: white">Founder Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body " style="background: var(--menu_color)">
                <div class="card" >
                    <div class="card-body text-center">
                        <div class="teacher-details">
                            <img class="img-fluid" src="{{ $founder->image_show }}" alt="Teacher Image">
                            <h3>{{ $founder->name }}</h3>
                            <h4>{{ @$founder->designation }}</h4>
                            <h4>{!! @$founder->about !!}</h4>
                            <ul class="social">
                                <li><a href="{{ @$founder->facebook }}" target="_blank" class="fab fa-facebook" aria-hidden="true"></a></li>
                                <li><a href="{{ @$founder->twitter }}" target="_blank" class="fab fa-twitter" aria-hidden="true"></a></li>
                                <li><a href="{{ @$founder->google_plus }}" target="_blank" class="fab fa-google-plus" aria-hidden="true"></a></li>
                                <li><a href="{{ @$founder->linkedin }}" target="_blank" class="fab fa-linkedin" aria-hidden="true"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




          @endforeach
        </div>

        {{-- <div class="text-center mt-0 mb-4 firstbutton">
            <a href=""
            class="btn btn-lg btn-dark-cerulean" style="color: var(--button2_text_color)">
                Class List
                <svg class="ms-2" xmlns="http://www.w3.org/2000/svg" width="28.56" height="15.666"
                    viewBox="0 0 28.56 15.666">
                    <path id="right-arrow_3_" data-name="right-arrow (3)"
                        d="M20.727,107.5l-1.272,1.272,5.661,5.661H0v1.8H25.116l-5.661,5.661,1.272,1.272,7.833-7.833Z"
                        transform="translate(0 -107.5)" fill="#fff"></path>
                </svg>
            </a>
        </div> --}}

      </div>
</section>




<!--Start  Blog Content-->
<div class="py-0 mt-3 pt-lg-220" style="padding-top: 0px !important;">
    <div class="container-lg">
        <h3 class="fw-bold mb-3 text-dark-cerulean text-center text-uppercase">Blog</h3>
        <div class="row g-3 blog_cat_ajax-show blog_topic_ajax-show blog_sort_by_ajax-show" id="alldata">
            @foreach ($blogs as $blog)
            <div class="col-xl-3 col-md-6" >
                <!--Start Course Card-->
                <div class="course-card rounded bg-light position-relative overflow-hidden border" style="height: 100%">
                    <!--Start Course Image-->
                    <a href="{{ route('frontend.blog_details', $blog->id) }}" class="course-card_img d-block pt-4 px-4">
                        <img  src="{{ $blog->image_show }}" class="img-fluid rounded-2 w-100" alt="">
                    </a>
                    <!--End Course Image-->
                    <!--Start Course Card Body-->
                    <div class="course-card_body bg-light  p-4 position-relative m-0 rounded-0">
                        <!--Start Course Title-->
                        <div class="badge px-0 mb-2">
                            <a href="" class="fs-14 text-dark-cerulean" style="color: var(--header_color)">{{ $blog->b_category->name ?? '' }}|</a> <a href="blog-topic/index.html" class="fs-14 text-dark-cerulean"></a>
                        </div>
                        <h3 class="course-card__course--title text-capitalize fs-6">
                            <a href="{{ route('frontend.blog_details', $blog->id) }}" class=" text-decoration-none text_ellipse blog_title" style="color: var(--text_color)"> {{ $blog->title }}</a>
                        </h3>
                        <!--End Course Title-->
                        <!--Start Course instructor-->
                        <div class="course-card__instructor mb-3">
                            <div class="course-card__instructor--name text-black-50 text-uppercase fw-medium fs-13 text_ellipse2" style="color: var(--text_color)">{!! $blog->description !!}</div> 
                        </div>
                        <!--End Course instructor-->
                        <div class="row">
                            <div class="col-md-8">
                                <div class="avatar d-flex align-items-center">
                                    <div class="avatar-img blog me-2" style="color: var(--text_color)">
                                        By
                                    </div>
                                    <div class="fs-15 fw-semi-bold text-dark-cerulean" style="color: var(--header_color)">
                                        {{ $blog->author }}
                                    <!--  -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex justify-content-end project-card_icon w-100">
                                    <div class="me-3" id="blog_like" style="color: var(--text_color)">
                                        <i class="me-1 far fa-heart"></i>
                                        {{ $blog->likers->count() }}</div>
                                    <div class="" style="color: var(--text_color)"><i class="me-1 far fa-eye"></i>{{ $blog->views }}</div>
                                </div>
                            </div>
                        </div>
                        <!--Start Course Hints-->
                    </div>
                    <!--End Course Card Body-->
                </div>
                <!--End Course Card-->
            </div>
            @endforeach					
        </div>
    </div>
</div>

<div class="text-center mt-5 firstbutton">
    <a href="{{ route('frontend.blog') }}"
    class="btn btn-lg btn-dark-cerulean" style="color: var(--button2_text_color)">
        More Blog
        <svg class="ms-2" xmlns="http://www.w3.org/2000/svg" width="28.56" height="15.666"
            viewBox="0 0 28.56 15.666">
            <path id="right-arrow_3_" data-name="right-arrow (3)"
                d="M20.727,107.5l-1.272,1.272,5.661,5.661H0v1.8H25.116l-5.661,5.661,1.272,1.272,7.833-7.833Z"
                transform="translate(0 -107.5)" fill="#fff"></path>
        </svg>
    </a>
</div>
<!--End  Blog Content-->

<link href="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/css/owl.carousel.min.css" rel="stylesheet">
<link href="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/css/owl.theme.default.min.css" rel="stylesheet">


<!--start  partner Content-->
    {{-- <div class="container mb-5">
        <div class="row">
            <div class="col col-12 text-center">
                <h2 style="color:var(--text_color)">{{ $home_content->partner_title }}</h2>

                <div class="logo-container collaborate-slider owl-carousel">
                    @foreach ($partners as $partner)
                    <div>
                        <div class="logo-holder">
                            <img src="{{ $partner->image_show }}"
                                alt="">
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div> --}}
<!--end  partner Content-->
<script src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/js/owl.carousel.min.js"></script>
<script src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/js/main.js"></script>


















<section class="ourteam-section">
    <div class="container mt-5">
        <div class="">
            <h3 class="fw-bold mb-3 text-dark-cerulean text-center text-uppercase">Our Teachers</h3>
        </div>
        <div class="row">
            @foreach ($teachers as $k => $teacher)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="our-team">
                    <div  data-toggle="modal" data-target="#teacherModal{{ $k }}">
                    <div class="picture">
                        <img class="img-fluid" src="{{ @$teacher->image_show }}" alt="{{ @$teacher->name }}">
                    </div>
                    <div class="team-content">
                        <h3 class="name" style="color: var(--text_color)">{{ @$teacher->name }}</h3>
                        <h4 class="title" style="color: var(--text_color)">{{ @$teacher->user_designation->name }}</h4>
                    </div>
                </div>
                    <ul class="social">
                        <li><a href="{{ @$teacher->facebook_id }}" target="_blank" class="fab fa-facebook" aria-hidden="true"></a></li>
                        <li><a href="{{ @$teacher->twitter_id }}" target="_blank" class="fab fa-twitter" aria-hidden="true"></a></li>
                        <li><a href="{{ @$teacher->google_id }}" target="_blank" class="fab fa-google-plus" aria-hidden="true"></a></li>
                        <li><a href="{{ @$teacher->instagram_id }}" target="_blank" class="fab fa-linkedin" aria-hidden="true"></a></li>
                    </ul>
                </div>
            </div>

           
<!-- Modal -->
<div class="modal fade" id="teacherModal{{ $k }}" tabindex="-1" role="dialog" aria-labelledby="teacherModalLabel{{ $k }}" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header"  style="background: var(--menu_color)">
                <h5 class="modal-title" id="teacherModalLabel{{ $k }}" style="color: white">Teacher Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="background: var(--menu_color)">
                <div class="card" >
                    <div class="card-body text-center">
                        <div class="teacher-details">
                            <img class="img-fluid" src="{{ $teacher->image_show }}" alt="Teacher Image">
                            <h3>{{ $teacher->name }}</h3>
                            <h4>{{ @$teacher->user_designation->name }}</h4>
                            <h4>{!! @$teacher->description !!}</h4>
                            <ul class="social">
                                <li><a href="{{ @$teacher->facebook_id }}" target="_blank" class="fab fa-facebook" aria-hidden="true"></a></li>
                                <li><a href="{{ @$teacher->twitter_id }}" target="_blank" class="fab fa-twitter" aria-hidden="true"></a></li>
                                <li><a href="{{ @$teacher->google_id }}" target="_blank" class="fab fa-google-plus" aria-hidden="true"></a></li>
                                <li><a href="{{ @$teacher->instagram_id }}" target="_blank" class="fab fa-linkedin" aria-hidden="true"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>







            @endforeach
        </div>

        <div class="text-center mt-0 mb-4 firstbutton">
            <a href="{{ route('frontend.instructor') }}"
               class="btn btn-lg btn-dark-cerulean" style="color: var(--button2_text_color)">
                More Teachers
                <svg class="ms-2" xmlns="http://www.w3.org/2000/svg" width="28.56" height="15.666"
                    viewBox="0 0 28.56 15.666">
                    <path id="right-arrow_3_" data-name="right-arrow (3)"
                          d="M20.727,107.5l-1.272,1.272,5.661,5.661H0v1.8H25.116l-5.661,5.661,1.272,1.272,7.833-7.833Z"
                          transform="translate(0 -107.5)" fill="#fff"></path>
                </svg>
            </a>
        </div>
    </div>
</section>



















<!--Start Counter-->
<div class="counter-content pt-5 pb-4">
    <div class="container-lg">
    <div class="text-center mb-5">
    <h3 class="fw-bold mb-0 text-uppercase" style="color:var( --text_color)">{{ $home_content->counting_title }}</h3>
    </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-6 col-sm-6 col-md-3 mb-4 text-center border-end" style="color: var(--text_color)">
                        <h3 class="fw-bold h1 mb-1"><span class="counter d-inline-block">
                            {{ $home_content->count_num_1 }}</span>
                        </h3>
                        <div>
                            {{ $home_content->count_text_1 }}</div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-3 mb-4 text-center border-end" style="color: var(--text_color)">
                        <h3 class="fw-bold h1 mb-1"><span class="counter d-inline-block">
                            {{ $home_content->count_num_2 }}</span>
                        </h3>
                        <div>
                            {{ $home_content->count_text_2 }}</div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-3 mb-4 text-center border-end" style="color: var(--text_color)">
                        <h3 class="fw-bold h1 mb-1"><span class="counter d-inline-block">
                            {{ $home_content->count_num_3 }}</span>
                        </h3>
                        <div>
                            {{ $home_content->count_text_3 }}</div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-3 mb-4 text-center" style="color: var(--text_color)">
                        <h3 class="fw-bold h1 mb-1"><span class="counter d-inline-block">
                            {{ $home_content->count_num_4 }}</span>
                        </h3>
                        <div>
                            {{ $home_content->count_text_4 }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Counter-->










<section class="ourteam-section">
    <!-- Toppers -->
    <div class="container">
        <div class="">
            <h3 class="fw-bold mb-3 text-dark-cerulean text-center text-uppercase">Topper Student</h3>
        </div>
        <div class="row">
            @foreach ($toppers as $topper)


            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="our-team" data-toggle="modal" data-id="1" data-target=".bd-example-modal-lg" onclick="ViewDetailsModel(1)">
              <div class="picture">
                <img class="img-fluid" src="{{ @$topper->student->image_show }}">
              </div>
              <div class="team-content">
                <h3 class="name" style="color: var(--text_color)">{{ @$topper->student->student_name }}</h3>
                <h4 class="title" style="color: var(--text_color)">{{ @$topper->examination->name }}-{{ @$topper->academic_year->year }}</h4>
				<h4 class="title" style="color: var(--text_color)">{{ @$topper->class->name }}, GPA: {{ @$topper->result }}</h4>
              </div>
            </div>
          </div>
          @endforeach
        </div>

        <div class="text-center mt-0 mb-4 firstbutton">
            <a href="{{ route('frontend.topper_student') }}"
            class="btn btn-lg btn-dark-cerulean" style="color: var(--button2_text_color)">
                More Topper
                <svg class="ms-2" xmlns="http://www.w3.org/2000/svg" width="28.56" height="15.666"
                    viewBox="0 0 28.56 15.666">
                    <path id="right-arrow_3_" data-name="right-arrow (3)"
                        d="M20.727,107.5l-1.272,1.272,5.661,5.661H0v1.8H25.116l-5.661,5.661,1.272,1.272,7.833-7.833Z"
                        transform="translate(0 -107.5)" fill="#fff"></path>
                </svg>
            </a>
        </div>

      </div>
</section>










<!--Start Testimonial-->
<div class="testimonial-content py-5">
    <div class="text-center mb-5">
    <div style="color: var(--text_color)"><h3>{{ $home_content->review_title1 }}</h3></div>
    <h3 class="fw-bold mb-0 learner_saying" style="color: var(--text_color)">{{ $home_content->review_title2 }}</h3>
    </div>
    <div class="container-lg">
        <div class="testimonial-carousel owl-carousel owl-theme">
            @foreach ($testimonials as $k=>$testimonial)
            <div class="testimonial-box rounded-20 p-4 p-md-5 p-lg-4 p-xl-5">
                <div class="">
                    <img src="" alt="" class="img-fluid">
                </div>
                <br>
                <div class="customer-ratting mb-3">
                    @if ($testimonial->star == 1)
                    <i class="fas fa-star"></i>
                    @elseif ($testimonial->star == 2)
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    @elseif ($testimonial->star == 3)
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    @elseif ($testimonial->star == 4)
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    @elseif ($testimonial->star == 5)
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>

                    @endif
                </div>

                <div class="quote-text" style="text-align: justify;">
                    <div class="text_ellipse2 mb-2 moreText-{{ $k }}" style="color: var(--text_color)">{!! $testimonial->comment !!}</div>
                        <button type="button" onclick="readmoreshowhide({{ $k }})"
                        class="border-0 fw-semi-bold p-0 text-dark-cerulean"
                        id="toggle-{{ $k }}">
                        Read More</button>
                </div>


                <div class="avatar d-flex align-items-center mt-4">
                    <div class="avatar-img me-3">
                        <img src="{{ $testimonial->image_show }}" alt="">
                    </div>
                    <div class="avatar-text">
                        <h5 class="avatar-name mb-1" style="color: var(--text_color)">{{ $testimonial->name }}</h5>
                        <div class="avatar-designation" style="color: var(--text_color)">{{ $testimonial->designation }}</div>
                    </div>
                </div>

            </div>
            @endforeach
        </div>
    </div>
</div>
{{-- </div>
</div> --}}
<!--End Testimonial-->



<!--End Pricing Table-->
<div class="mb-5 overflow-hidden position-relative">
    <div class="container-lg">
        <div class="align-items-center bg-alice-blue mx-0 row p-lg-5 p-4 rounded position-relative">
            <div class="col-md-6">
                <h2 class="fs-1 fw-semi-bold mb-4 text-dark-cerulean any_question" style="color: var(--text_color)">{{ $home_content->question_title }}</h2>
                <p class="fs-5" style="color: var(--text_color)">{{ $home_content->ques_short_des }}</p>
                <a href="{{ $home_content->question_button_url }}" target="_blank"
                    class="btn btn-dark-cerulean btn-lg mt-3 need_consultation">{{ $home_content->question_button_text }}</a>
            </div>
            <div class="col-md-6 text-center">
                <img src="{{ $home_content->question_image_show }}"class="img-fluid mt-4 mt-md-0" alt="">
            </div>
        </div>
    </div>
</div>




<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    // var finalEventDt = new Date("2021-11-30 15:37:25").getTime();
    
    // var x = setInterval(function() {
    
    //     var now = new Date().getTime();
    
    //     var delay_total = finalEventDt - now;
    
    //     var days = Math.floor(delay_total / (1000 * 60 * 60 * 24));
    //     var hours = Math.floor((delay_total % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    //     var minutes = Math.floor((delay_total % (1000 * 60 * 60)) / (1000 * 60));
    //     var seconds = Math.floor((delay_total % (1000 * 60)) / 1000);
    
    //     document.getElementById("example").innerHTML = days + "d " + hours + "h " +
    //         minutes + "m " + seconds + "s ";
    
    //     if (delay_total < 0) {
    //         clearInterval(x);
    //         document.getElementById("example").innerHTML = "EXPIRED";
    //     }
    // }, 1000);
    
    
    // Read More
    
    function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
    c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
    return c.substring(name.length, c.length);
    }
    }
    return "";
    }
    
    function checkCookie() {
    var cname = getCookie("cname");
    if (cname != "") {
    alert("Welcome again " + cname);
    } else {
    // cname = prompt("Please enter your name:", "");
    // if (cname != "" && cname != null) {
    // 	setCookie("cname", cname, 365);
    // }
    }
    }
    
    function readmoreshowhide1(sl) {
    $(".moreText-" + sl).toggleClass("opened");
    //var set_lang = $('#set_language').val();
    var elem = $("#toggle-" + sl).text();
    
    
    // alert(elem);
    // return false;
    
    if (elem == "Read More") {
    //Stuff to do when btn is in the read more state
    // $("#toggle-" + sl).text('');
    
    // $("#toggle-" + sl).text('');
    $("#toggle-" + sl).text("Read More");
    $("#text").slideDown();
    
    }else{
    //Stuff to do when btn is in the read less state
    // $("#toggle-" + sl).text("Read More");
    
    // $("#toggle-" + sl).text('');
    
    $("#toggle-" + sl).text("Read Less");
    $("#text").slideUp();
    
    }
    
    }
    
    function readmoreshowhide(sl) {
    $(".moreText-" + sl).toggleClass("opened");
    var set_lang = $('#set_language').val();
    var elem = $("#toggle-" + sl).text();
    if (elem == "আরও পড়ুন") {
    //Stuff to do when btn is in the read more state
    $("#toggle-" + sl).text("সংক্ষিপ্ত করুন");
    $("#text").slideDown();
    } else if (elem == "সংক্ষিপ্ত করুন") {
    //Stuff to do when btn is in the read less state
    $("#toggle-" + sl).text("আরও পড়ুন");
    $("#text").slideUp();
    }else if (elem == "Read More") {
    //Stuff to do when btn is in the read less state
    $("#toggle-" + sl).text("Read Less");
    $("#text").slideUp();
    }else if (elem == "Read Less") {
    //Stuff to do when btn is in the read less state
    $("#toggle-" + sl).text("Read More");
    $("#text").slideUp();
    }else{
    $("#toggle-" + sl).text(set_lang === 'bn' ? "সংক্ষিপ্ত করুন" : "Read Less");
    $("#text").slideUp();
    }
    
    }
    
    
    // showhide(sl);
    </script>
</div>
<!--======== main content close ==========-->

@include('Frontend.layouts.parts.news-letter')

@endsection


@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.4/axios.min.js"></script>
<script>

 $(".course_price_cart").change(function(e){
    // $(".course_price_cart").click(function(e){
    e.preventDefault();
    let id = $(this).val();
    console.log(id);

  });

$.ajaxSetup({

headers: {

    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

}

});

//Home Sub Category
$(".home_on_click_subcategory").click(function(e){
  e.preventDefault();
  var id = $(this).attr('home_subcat_id');
  $.ajax({

    type:'GET',

     url:"{{ url('home_course-subcategory-show-ajax') }}/"+id,

    // data:{id:id},

    success:function(data){
    //  document.getElementById("home-proud-hide").style.visibility = "hidden";
      $(".home_course_subcat_ajax-show").html(data);
    }

  });



});
$('.change_cart_val').on('change',function(){
    console.log(this.id);
    if(this.id == "course_subcribe"+$(this).attr('course_id')){
        $('.course_subcribe'+$(this).attr('course_id')).show();
        $('.course_cart_price'+$(this).attr('course_id')).hide();
    }else{
        $('.course_subcribe'+$(this).attr('course_id')).hide();
        $('.course_cart_price'+$(this).attr('course_id')).show();
    }
    //if($(th)
});
</script>













@endsection



