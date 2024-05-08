@extends('frontend.master')

@section('title')
    Home
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
@endsection


@section('body')
    <section class="top-banner">
        <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">
            <div class="carousel-inner">
                @foreach ($banner as $banner)
                    <div class="carousel-item banner active sliderDiv">
                        <div class="row">
                            <div class="col-lg-5 ">
                                <img src="{{ asset('backend/banner/') }}/{{ $banner->image }}" class="d-block w-100"
                                    alt="..." />
                            </div>
                            <div class="col-lg-7 col-md-7 ps-5 d-flex align-items-center">
                                <div class="text-light">
                                    <h3 class="mt-5 text-center">Make Your Career Through Online Education</h3>
                                    <p class="text-center">Complete guideline for 9th to 10th class students</p>
                                    <div class=" mt-5 mb-5 text-center">
                                        <a href="#startLearning"
                                            class="btn btn-light mt-3  col-11 col-md-4 custom-radius color-red fs-19">Start
                                            learning</a>
                                        <br>
                                        <a href="{{ route('coursePage') }}"
                                            class="btn btn-light mt-3  col-11 col-md-4 custom-radius color-red fs-19">See
                                            Course</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="carousel-item banner active">
                <div class="row">
                    <div class="col-lg-5 ">
                        <img
                            src="{{ asset('/') }}frontend/assets/images/banner-image/1st-banner.png"
                            class="d-block w-100"
                            alt="..."
                        />
                    </div>
                    <div class="col-lg-7 col-md-7 ps-5 d-flex align-items-center">
                        <div class="text-light">
                            <h3 class="mt-4-5 text-center">Make Your Career Through Online Education</h3>
                            <p class="text-center">Complete guideline for 9th to 10th class students</p>
                            <div class=" mt-5 mb-5 text-center">
                                <button class="btn btn-light mt-3  col-11 col-md-4 custom-radius color-red fs-19">Start learning</button>
                                <br>
                                <button class="btn btn-light mt-3  col-11 col-md-4 custom-radius color-red fs-19">See Course</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <!-- Slider end -->
    <!-- card start -->

    <section class="round_card">
        <div class="container">
            <div class="gap-3  first-card justify-content-center">
                <div class="card text-danger-emphasis custom-box1" style="margin-top: 10px; background: #d4e4c7;">

                    <div class="card-body  align-items-center flex-column p-5  text-center">
                        <h4 class="card-text">{{ $courses->total }} +</h4>
                        <p>Courses</p>
                    </div>

                </div>
                <div class="card text-info custom-box ms-3 custom-box-inner"  style="background: #d4e4c7;">
                    <div
                        class="card-body align-items-center p-5 flex-column  custom-box-inner text-center color-paste" style="color:#000 !important;">
                        <h4 class="card-text">{{ $students->total }} +</h4>
                        <p>Students</p>
                    </div>
                </div>
                <div class="card  text-danger custom-box ms-3 custom-box-inner"  style="background: #d4e4c7;">
                    <div class="card-body align-items-center flex-column p-5  custom-box-inner text-center">
                        <h4 class="card-text ">{{ $teachers->total }} +</h4>
                        <p>Teachers</p>
                    </div>

                </div>
                <div class="card text-warning ms-3 custom-box1 custom-box-inner" style="overflow: hidden;margin-top: 10px;" >
                    <div class="card-body align-items-center flex-column p-5 text-center color-gold"style="background: #d4e4c7 !important;">
                        <h4 class="card-text">{{ $users->total }} +</h4>
                        <p>Users</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- card end -->
    </div>

    <!-- second card start -->
    <section class="mt-5 w-100 " id="startLearning">
        <div class="row row-cols-1 row-cols-md-2 g-2 p-5 m-5 mx-auto mx-7">
            <div class="col-12 mb-5">
                <h3 class="text-center" style="background: #f8d1d1;padding: 5px;width: 50%;margin: 0 auto;margin-top: -10px;margin-bottom: -20px;border-radius: 5px;">
                    <b>Lead to top class</b>
                </h3>
            </div>


            @foreach ($class1_10 as $i => $item)
                <a href="/academicProgramView/{{ $item->id }}"
                    class="d-flex text-decoration-none  mx-auto  col-11 col-lg-5 border border-2 p-2 rounded-3 justify-content-center align-items-center shadow-lg me-3 mb-3  @if ($i == 0) cardOne @elseif($i == 1) cardTow @elseif($i == 2)  cardThree @elseif($i == 3) cardFour @endif windowHover ">
                    <div class="pt-4 pb-4 w-100">

                        <img class="w-25 m-2 rounded float-start ms-4 d-flex custom25 align-items-center mt-3"
                            src="{{ asset('/video') }}/{{ $item->image }}" alt="Card image" />

                        <div class='mx-auto p-0 p-lg-2 ms-5'>
                            <p class="fs-4 my-1 py-0 fw-bold color-blue">
                                {{ $item->name }}
                            </p>
                            <p class=" my-1 py-0 text-start">{{ $item->short_description }}</p>
                        </div>
                    </div>
                </a>
            @endforeach



    </section>
    <!-- second card end -->

    <!-- Brands start-->


    <section class="mt-5 mb-5 ourbrandDiv" style="margin-top: -70px !important;margin-bottom: 30px !important;float: left;width: 100%;">
        <h2 class="text-center text-bold mb-3" style="background: #f8d1d1;padding: 5px;width: 40%;margin: 0 auto;margin-top: 17px;margin-bottom: -20px;border-radius: 5px;">Our Brand</h2>

        <div class="container">
            <div class="row slick-slider">

                @foreach ($brand as $brnd)
                    <div class="col-md-2 col-3">
                        <img src="{{ asset('backend/brand') }}/{{ $brnd->logo }}" alt="" srcset="">
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <!-- Brands end-->

    <!-- second Banner start -->
    <section>
        <div class="container-fluid px-0">
            <div class="carousel-inner">
                <div class="carousel-item banner2 active">
                    <div class="container">

                        <h5 class="">Learning through live classes is now very easy</h5>

                        <div class="row p-5">

                            <div class="col-md-6 ps-5 align-items-center featuresBtnSection">
                                <div class="text-light mt-5">
                                    <div class="">
                                        <div class="mt-2 mb-5 w-100 ">
                                            <a href="/student_profile" class="btn btn-light mt-3 bg-purple radius-15 w-100">Live and recorded
                                                class</a>
                                            <a href="/student_profile" class="btn btn-light mt-3 bg-purple radius-15 w-100">Weekly Exam</a>
                                            <a href="/student_profile" class="btn btn-light mt-3 bg-purple radius-15 w-100"">Live MCQ exam
                                                Exam</a>
                                        <a href="/student_profile" class="btn btn-light mt-3 bg-purple radius-15 w-100"">Class Note</a>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                            <iframe style="width: 100%;height: 275px;margin-top: 30px;border-radius: 40px;" src="https://www.youtube.com/embed/SaQ37662wl0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item banner">
                    <div class="row">
                        <div class="col-lg-5">
                            <img src="{{ asset('/') }}frontend/assets/images/banner-image/1st-banner.png"
                                class="d-block w-100" alt="..." />
                        </div>
                        <div class="col-lg-7 d-flex align-items-center">
                            <div class="text-light">
                                <h1>Make Your Career Through Online Education</h1>
                                <p>Complete guideline for 9th to 10th class students</p>
                                <div class="d-flex flex-column mt-5  mb-5 w-25">
                                    <button class="btn btn-light mt-3">Start learning</button>
                                    <button class="btn btn-light mt-3">See Course</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- second Banner end -->


    <section class="educationStrages">
        <div class="container">
            <div class="text-center">
                <h3 class="text-center mt-3 color-blue" style="background: #f1d3d3;padding: 5px 0;border-radius: 5px;width: 50%;margin: 0 auto;margin-bottom: 35px;display: block;">
                    প্রাথমিক, মাধ্যমিক ও উচ্চমাধ্যমিকের পড়ালেখা এবং পরীক্ষা প্রস্তুতির পূর্ণাঙ্গ প্রোগ্রাম
                </h3>
                <p style="margin-top:-15px;">
                    বছরজুড়ে দেশসেরা মেন্টরদের লাইভ ক্লাস, লাইভ এক্সাম, ক্লাস নোট, অ্যানিমেটেড ভিডিও-তে A+ প্রস্তুতি নাও
                </p>
            </div>

            <style>
                .accProgCard {
                    height: auto;
                    background: #d6cbcb;
                    margin: 10px;
                    width: calc(20% - 20px);
                    border-radius: 5px;
                    padding: 10px;
                }

                .accProgCard img {
                    width: 100%;
                    height: 150px;
                    object-fit: unset;
                }

                .accProgCard .titl {
                    text-align: center;
                    text-decoration: none;
                    color: #000;
                    margin-top: 10px;
                    background: #6190ff;
                    border-radius: 5px;
                }

                .accProgCard  a{
                    text-decoration: none;
                }
            </style>

           <div class="row">
                @foreach ($accProgCard as $acPb)
                    <div class="accProgCard">
                        <a href="/academicProgramView/{{ $acPb->id }}">
                            <img src="{{ asset('video/').'/'.$acPb->image }}" alt="">
                            <div class="titl">
                                {{ $acPb->name }}
                            </div>
                        </a>
                    </div>
                @endforeach
                
                <center>
                    <a href="http://www.techknowsity.com/academicPrograms/Class%201-10" class="btn btn-primary">See all</a>
                </center>
           </div>

        </div>
    </section>


    <!-- Third card section start -->
    <section class="courseShowCardSection" style="margin-top: -45px;">
        <div class="container">
            <div class="text-center">
                <h3 class="text-center mt-3 color-blue" style="background: #f1d3d3;padding: 5px 0;border-radius: 5px;width: 50%;margin: 0 auto;margin-bottom: 35px;display: block;">
                    Academic Program
                </h3>
            </div>
            <div>
                <div class="card-group p-5">

                    @foreach ($academicProgramforBody as $acPb)
                        <a href="/academicProgramView/{{ $acPb->id }}">
                            <img src="{{ asset('/video').'/'.$acPb->image }}"
                                class="card-img-top mt-4" style="height: 120px;object-fit: cover;">
                            <div class="card-body px-1">
                                <p class="card-text text-primary text-center mb-1 fs-11">{{ $acPb->name }}</p>
                                <p class="card-text text-danger fs-11 text-center">
                                    {{ $acPb->course_hour }}
                                </p>
                            </div>
                        </a>
                    @endforeach


                </div>
            </div>
            <div class="justify-content-between ps-5 pe-5">
                <div>
                    <center>
                        <a href="/academicPrograms/Class 1-10" class="btn btn-primary">See all</a>
                    </center>
                </div>
            </div>
        </div>
    </section>
    <!-- Third card section end -->



    <!-- 4th card section start -->
    <section class="mt-5 mb-5 courseSlider">
    <div class="container">
        <h3 class="text-center color-blue" style="background: #f1d3d3;padding: 5px 0;border-radius: 5px;width: 50%;margin: 0 auto;display:block;margin-top: -86px;">{{ $get_12th_Science->subcatId }}</h3>

        <div class="row ">
            <div class="card-group gap-2 px-5 pt-4 pb-0 owl-carousel owl-theme ">
                @foreach ($science_12th as $course )
                <div class="card item me-md-4" style="border-radius:10px;overflow:hidden;">
                         <img src="{{ asset('/video') }}/{{ $course->image }}" class="
                       " alt="" height="200"  srcset="" style="object-fit: cover;">

                    <div class="card-body bg-light" style="height: 195px;">
                        <div class="d-flex gap-1">
                            <h5 class="card-title" style="text-align: center;width:100%;">
                                <b>{{ substr_replace($course->name, "...", 0) }}</b>
                            </h5>
                        </div>
                        {{-- <p class="card-text text-center">-{!! str_replace("|","<br>-" , $course->feature) !!} </p> --}}
                        <p style="margin: 0;padding:0;text-align: center;width:100%;"> Price : {{ $course->price }}</p>

                        <p class="text-center">To know details
                            <br>
                        <a href="/courseDetails/{{ $course->id }}">Click here</a></p>

                        <center>
                            <a href="/bookNow/{{ $course->id }}" class="btnn w-full py-2 fs-5 text-decoration-none p-4 ">Book Now</a>
                        </center>

                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="container">
            <div class="d-flex justify-content-between ps-5 pe-5">
                <div>
                    <p></p>
                </div>
                <div class="w-100">
                    <center>
                        <a href="/academicPrograms/12th class- Science" class="btn btn-primary">See all</a>
                    </center>
                </div>
            </div>
        </div>

    </div>
    </section>



    <section class="ourClient">
        <h2 class="text-center text-bold mb-3">Our Client</h2>
        <div class="container">
            <div class="row slick-slider">
                @foreach ($brand as $brnd)
                    <div class="col-md-2 col-3">
                        <img src="{{ asset('backend/brand') }}/{{ $brnd->logo }}" alt="" srcset="">
                    </div>
                @endforeach
            </div>
            {{--    <marquee scrollment="20"> --}}

            {{--      <img src="{{ asset('/') }}frontend/assets/images/logo/logo2.png" alt="" srcset=""> --}}
            {{--      <img src="{{ asset('/') }}frontend/assets/images/logo/logo3.png" alt="" srcset=""> --}}
            {{--      <img src="{{ asset('/') }}frontend/assets/images/logo/logo4.png" alt="" srcset=""> --}}
            {{--      <img src="{{ asset('/') }}frontend/assets/images/logo/logo5.png" alt="" srcset=""> --}}
            {{--    </marquee> --}}
        </div>
    </section>
    <!-- our client end-->
    <!-- 5th card section start -->
    <section class="admissionSection">
        <div class="container">
            <div class="text-center">
                <h3 class="mt-7">Complete preparation for Medical, Engineering,University with us.</h3>
                <p class="text-primary mb-5 color-paste">Find Your dream,We are always with you</p>
            </div>


            <style>
                .admissionCard {
                    border: 1px solid #3CACAE;
                    padding: 10px;
                    border-radius: 5px;
                    height: 160px;
                }

                .admissionCard img {
                    margin: 0 auto;
                    display: block;
                    height: 100px;
                }

                .admissionCard a {
                    text-decoration: none;
                    color: #000;
                }


                .admissionSection .seeAllBtn{
                    margin-top: 20px;
                    margin-bottom: 34px;
                }
            </style>


            <div class="row">
                @foreach ($dmcourse as $i=>$dmc)
                    <div class="col-md-3 p-2">
                        <div class="admissionCard">
                         <a href="/admissionView/{{ str_replace(" ","-",$dmc->subCategoryName) }}">
                            <center>
                                <img src="{{ asset('img/homepage_admission_icon/icon'.$i.'.png') }}" alt="">
                                {{ $dmc->subCategoryName }}
                              </center>
                         </a>
                        </div>
                    </div>
                @endforeach

                <div class="row">
                    <center>
                        <a href="/allAdmission" class="btn btn-primary seeAllBtn">See all</a>
                    </center>
                </div>

            </div>


            <div class="container">
                <div class="row  m-auto row-cols-md-3">
                    @foreach($admission as $ad)
                    <div class="col-md-3">

                        <div class="card border-paste rounded-4 mb-2">

                            <div class="card-body" style="height: 205px;">

                                <img src="{{ asset('/video') }}/{{ $ad->image }}"
                                class="card-img-top d-flex inner-image" alt="...">
                                <p class="card-title text-center">{{ $ad->name}}</p>
                                <center>
                                    <a href="/courseDetails/{{ $ad->id }}" style="text-decoration: none;">Details</a>
                                </center>
                            </div>


                        </div>

                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>
    <!-- 5th card section end -->

    <!-- 2nd banner start -->
    <section class="sec_pt_ban">
        <div class="container-fluid px-0">
            <div class="d-block align-items-center info w-100 d-lg-flex  mt-lg-4">

                <div class="mx-auto p-3 p-md-4 mt-lg-5 w-100 text-center">

                    <h1>Search your Course</h1>
                    <p>Build your library for your career and personal growth</p>
                    <a  href="/register"  class="joining-btn px-4 py-2 text-white " style="background-color: #009999; text-decoration: none">Join Here</a>


                </div>
                <div class="w-100 my-md-4 position-relative">

                    <div class="d-flex justify-content-center">
                        <img class="position-absolute  top-0 start-0 translate-middle" src="images/i2global-02 1.png"
                            alt="" srcset="">
                        <img class="ms-4 img-fluid " src="{{ asset('/') }}frontend/assets/images/img01 1.png"
                            alt="" srcset="">
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- 2nd banner end -->
    <!-- Blog start -->
    <section>
        <div class="blogSection">
            <h2 class="text-center">Our Blog</h2>
            <div class="mt-5 d-flex justify-content-center align-items-center">
                <div class="row row-cols-1 row-cols-md-3 g-4 w-75">

                    <div class="blogBgDiv">
                        @foreach ($blog as $blog)
                        <div class="col">
                            <div class="blogheight">
                                <a href="/singleBlog/{{ $blog->bid }}">
                                    <img src="{{ asset('frontend/assets/images/blog/') }}/{{ $blog->file }}" class="card-img-top">
                                </a>
                            </div>
                        </div>
                    @endforeach
                    </div>

                    <div class="w-100 mt-0">
                        <div class="d-flex justify-content-between ps-5 pe-5">
                            <div>
                                <p></p>
                            </div>
                            <div class="seeAllClass w-100 mt-3">
                                <center>
                                    <a href="/getallBlog" class="btn btn-primary">See all</a>
                                </center>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- Blog end -->

    <section class="coverBannerBlogEndSection">
        <div class="container">
            <div class="text-center">
                <img src="{{ asset('backend/banner') }}/{{ $coverBanner->image }}" class="img-fluid" alt="">
            </div>
        </div>
    </section>

    <section class="partnerSection">
        <h2 class="text-center text-bold">Our Partner</h2>
        <div class="container">
            <div class="row slick-slider">
                @foreach ($brand as $brnd)
                    <div class="col-md-2 col-3">
                        <img src="{{ asset('backend/brand') }}/{{ $brnd->logo }}" alt="" srcset="">
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css">
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
            ],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        })


        $(".slick-slider").slick({
            slidesToShow: 5,
            infinite:false,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1500,
            dots: false,
            arrows: false,
           centerMode: true,
            responsive: [{
              breakpoint: 1024,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                // centerMode: true,
        
              }
        
            }, {
              breakpoint: 800,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                
              }
            },  {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
               
              }
            }]
        });

    </script>
@endsection
