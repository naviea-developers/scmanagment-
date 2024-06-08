@extends('Frontend.layouts.master-layout')
@section('title','- About')
@section('head')

@endsection
@section('main_contend')
@include('Frontend.layouts.parts.header-menu')
<div class="content_search" style="margin-top:70px">
    <link
    href="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/css/ali.css"
    rel="stylesheet">
<!-- <style> -->
<style>
    .brand2-carousel .owl-item {
    padding: 15px 10px;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 5px;
}

.brand2-carousel .owl-item .brand_item {
    display: -webkit-flex;
    display: -moz-flex;
    display: -ms-flex;
    display: -o-flex;
    display: flex;
    height: 100%;
    background: #fff;
    box-shadow: 0 0 15px rgb(0 0 0 / 8%);
    padding: 35px 20px;
    width: 100%;
    align-items: center;
    justify-content: center;
}

.brand2-carousel .owl-item img {
    display: block;
    width: auto;
    max-width: 100%;
}

.brand2-carousel .owl-stage {
    display: -webkit-flex;
    display: -moz-flex;
    display: -ms-flex;
    display: -o-flex;
    display: flex;
}
</style>
<div class="bg-alice-blue about_lead">
    <div class="container">
        <div class="row justify-content-center">
            <div class="text-center about_lead-inner">
                <h2 class="text-capitalize text-center main_title font_open" style="color: var(--header_color)">
                    {{ $about_content->about_text }}</h2>
                    <p class="fs_18 text-center inner_text" style="color: var(--text_color)">
                        {{ $about_content->description1 }}</p>
                <br>

                <div class="iframe_wrapper pt-5">
                                        <!-- <iframe id="iframe" src="https://player.vimeo.com/video/" width="850"
                        height="500" frameborder="0" allowfullscreen allow="autoplay; encrypted-media"></iframe> -->
                                        <!-- <iframe width="850" height="500" src="https://www.youtube.com/embed/"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe> -->
                                        <a style="position: relative;" class="popup-youtube"
                        href="{{ $about_content->video_url }}">
                        <img src="{{ $about_content->video_thumbnail_show }}"
                            class="img-fluid" alt="">
                        <div class="banner-video_icon position-absolute start-50 top-50">
                            <svg xmlns="http://www.w3.org/2000/svg" width="92" height="92" viewBox="0 0 92 92">
                                <g id="Ellipse_2" data-name="Ellipse 2" fill="none" stroke="#fff" stroke-width="3">
                                    <circle cx="46" cy="46" r="46" stroke="none" />
                                    <circle cx="46" cy="46" r="44.5" fill="none" />
                                </g>
                                <g id="Polygon_1" data-name="Polygon 1" transform="translate(63 32) rotate(90)"
                                    fill="none">
                                    <path d="M14.5,0,29,25H0Z" stroke="none" />
                                    <path
                                        d="M 14.5 5.979442596435547 L 5.208076477050781 22 L 23.79192352294922 22 L 14.5 5.979442596435547 M 14.5 0 L 29 25 L 0 25 L 14.5 0 Z"
                                        stroke="none" fill="#fff" />
                                </g>
                            </svg>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mission py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="mission_inner">
                <h2 class="font_open mb-5 text-center main_title mission_txt" style="color: var(--header_color)">{{ $about_content->about_text2 }}</h2>
                <p class="fs_18 inner_text text-center" style="color: var(--text_color)">
                    {{ $about_content->description2 }}</p>
            </div>
        </div>
    </div>
</div>

<div class="bg-alice-blue py-100 mission">
    <div class="container">
        <div class="row justify-content-center">
            <div class="mission_inner">
                <h2 class="font_open mb-3 text-center main_title why_choose_us" style="color: var(--header_color)">
                    {{ $about_content->about_text3 }}</h2>
                <p class="fs_18 inner_text text-center why_choose_short_text" style="color: var(--text_color)">
                    {{ $about_content->description3 }}</p>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="choose_wrapper">
                <div class="row g-4">
                    @foreach ($faqs as $faq)
                    <div class="col-sm-6 col-lg-4 px-22">
                        <div class="choose_inner">
                            <img src="{{ $faq->image_show }}"
                                class="img-fluid w-100" alt="">
                            <!-- <div class="align-items-center d-flex mt-3 choose_text-wrapper">
                                <h4
                                    class="choose_text d-block mb-0 p-3 text-capitalize text-center text-white w-100">
                                                                    </h4>
                            </div> -->
                            <button class="btn btn-primary" style="height:130px;background-color:var(--header_color);border-color:#154679;">
                                <strong style="color: var(--header_text_color)">
                                    {{ $faq->description }}</strong>
                            </button>
                        </div>
                    </div>
                    @endforeach



                </div>
            </div>
        </div>
    </div>
</div>

<div class="service_case">
    <div class="container-xl">
        <div class="row justify-content-center">
            <div class="mission_inner">
                <h2 class="font_open mb-5 text-center main_title text-uppercase service_txt" style="color: var(--header_color)">{{ $about_content->about_text4 }}</h2>
            </div>
        </div>
        <div class="g-5 justify-content-center row">
            @foreach ($about_content->packagetaglines as $k=>$packagetagline)
            <div class="col-lg-4 col-sm-6 d-flex">
                <div class="sc_inner position-relative shadow">
                    <div
                        class="align-items-center d-flex justify-content-center mx-auto position-absolute sc_top start-50" >
                        <div class="d-block">
                            <span class="left position-absolute triangle" ></span>
                            <img src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/img/service/bg-1.png"
                                class="position-absolute start-0 top-0" alt="">
                            <span class="position-absolute triangle right"></span>
                        </div>
                        <span class="font_open fs-15 fw-extra-bold position-relative text-white text-center" style="color: var(--header_text_color)">
                            {{ $packagetagline->title }}</span>
                    </div>

                            <ul class="sc_list list-unstyled mb-0">
                                @foreach ($packagetagline->details as $detail)
                                <li class="position-relative d-flex font_open"><span class="bullet"></span>
                                    <span style="color: var(--text_color)">{{ $detail->text }}</span>
                                </li>
                                {{-- <li class="position-relative d-flex font_open"><span class="bullet"></span>
                                    <span>Individual Course purchase</span>
                                </li> --}}
                                @endforeach
                            </ul>


                    <div class="bottom-0 position-absolute sc_img start-50"
                        style="transform: translateX(-50%) translateY(95px)">
                        <img src="{{$packagetagline->icon_show}}"
                            alt="">
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</div>


<link
        href="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/css/owl.carousel.min.css"
        rel="stylesheet">
    <link
        href="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/css/owl.theme.default.min.css"
        rel="stylesheet">
          <link href="#"
        rel="stylesheet">

<style>
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

<div class="container mb-5">
    <div class="row">
        <div class="col col-12 text-center">
            <h2 class="coll_text" style="color: var(--header_color)">{{ $home_content->partner_title }}</h2>

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





<br>
<br>
<br>
<br>

<section class="ourteam-section">
    <!-- Founder and CEO -->
    <div class="container">
        <div class="our-team-title">
            <h2 style="color: var(--text_color)">Founder And CEO</h2>
        </div>
        <div class="row">
            @foreach ($founders as $founder)


            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="our-team" data-toggle="modal" data-id="1" data-target=".bd-example-modal-lg" onclick="ViewDetailsModel(1)">
              <div class="picture">
                <img class="img-fluid" src="{{ @$founder->image_show }}">
              </div>
              <div class="team-content">
                <h3 class="name" style="color: var(--text_color)">{{ @$founder->name }}</h3>
                <h4 class="title" style="color: var(--text_color)">{{ @$founder->designation }}</h4>
              </div>
              <ul class="social">
                <li><a href="{{ @$founder->facebook }}" class="fab fa-facebook" aria-hidden="true"></a></li>
                <li><a href="{{ @$founder->twitter }}" class="fab fa-twitter" aria-hidden="true"></a></li>
                <li><a href="{{ @$founder->google_plus }}" class="fab fa-google-plus" aria-hidden="true"></a></li>
                <li><a href="{{ @$founder->linkedin }}" class="fab fa-linkedin" aria-hidden="true"></a></li>
              </ul>
            </div>
          </div>
          @endforeach
        </div>
      </div>
</section>








</div>
<script src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/js/owl.carousel.min.js"></script>
<script src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/js/main.js"></script>
<!--End Brand Logo-->
</div>
@include('Frontend.layouts.parts.news-letter')

@endsection


