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
            <div class="modal-body" id="info">

            </div>
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
    <source
    src="{{ $home_content->banner_video_show }}"
    type="video/mp4">
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
                @foreach ($buttons as $button)
                <a href="{{ $button->answer }}" class="btn btn-dark-cerulean btn-lg mb-2" style="color: var(--button2_text_color)">{{ $button->question }}</a>
                @endforeach
            </div>
    </div>
</div>
</header>

<!-- End of Seach by Gellery -->
@isset($gallerys)
<div class="pb-1 pt-4 d-none mt-1 d-lg-block">
    <h3 class="fw-bold mb-0 text-dark-cerulean text-center text-uppercase">{{ $home_content->university_location_title }}</h3>
    <div class="container flex-column p-0 d-flex mt-4">
        
        <section class="mdc-card__supporting-text p-0">
        <section class="d-lg-flex cities-card-top py-3 justify-content-between">
            @foreach (@$gallerys as $k=>$gallery)
                @if ($k< 3)
                    <div class="card w-sm-auto mr-4 mt-1 ml-auto mr-auto mr-md-2 ml-md-0" style="margin-right: 7px;">
                    <div class="embed-responsive embed-responsive-16by9">
                        <img style="height: 225px;width:100%" src="{{ @$gallery->image_show }}" class="card-img-top embed-responsive-item lazyload" alt="">
                    </div>
                    {{-- <a class="stretched-link" style="color:#007bff" href="{{ route('frontend.all_universities_list') }}"> --}}
                    <h3 class=""
                        style="position: absolute;top: 10px;left: 20px;font-size: 1.5rem;color: #fff;font-weight: 600;text-shadow: 1px 2px 10px #202020;">
                        {{ @$gallery->name }}</h3>
                    {{-- </a> --}}
                    </div>
                @endif
            @endforeach
        </section>
        </section>
    </div>
    <div class="container d-flex flex-column mb-5 p-0">
        <section class="mdc-card__supporting-text p-0 ">
        <section class="d-lg-flex cities-card-bottom">
            @foreach ($gallerys as $k=>$gallery)
                @if ($k>2)
                    <div class="card w-sm-auto mr-4 mt-1 ml-auto mr-auto mr-md-2 ml-md-0" style="margin-right: 7px;">
                    <div class="embed-responsive embed-responsive-16by9">
                        <img style="height: 225px;width:100%" src="{{ @$gallery->image_show }}" class="card-img-top embed-responsive-item lazyload" alt="">
                    </div>
                    {{-- <a class="stretched-link" style="color:#007bff" href="{{ route('frontend.all_universities_list') }}"> --}}
                    <h3 class=""
                        style="position: absolute;top: 10px;left: 20px;font-size: 1.5rem;color: #fff;font-weight: 600;text-shadow: 1px 2px 10px #202020;">
                        {{ @$gallery->name }}</h3>
                    {{-- </a> --}}
                    </div>
                @endif
            @endforeach
        </section>
        </section>

    </div>
</div>
@endisset
  <!-- End of Seach by Gellery -->

 <!-- Seach by City -->
 {{-- @isset($homecontentlocations)
    <div class="pb-1 pt-4 d-none mt-1 d-lg-block">
        <h3 class="fw-bold mb-0 text-dark-cerulean text-center text-uppercase">{{ $home_content->university_location_title }}</h3>
        <div class="container flex-column p-0 d-flex mt-4">
            
            <section class="mdc-card__supporting-text p-0">
            <section class="d-lg-flex cities-card-top py-3 justify-content-between">
                @foreach (@$homecontentlocations as $k=>$homecontentlocation)
                @if ($k< 3)
                    @if (@$homecontentlocation->type_loction_id=='1')
                        <div class="card w-sm-auto mr-4 mt-1 ml-auto mr-auto mr-md-2 ml-md-0" style="margin-right: 7px;">
                        <div class="embed-responsive embed-responsive-16by9">
                            <img style="height: 225px;width:100%" src="{{ @$homecontentlocation->continent->image_show }}" class="card-img-top embed-responsive-item lazyload" alt="">
                        </div>
                        <a class="stretched-link" style="color:#007bff" href="{{ route('frontend.all_universities_list') }}?continent={{ @$homecontentlocation->continent->id }}">
                        <h3 class=""
                            style="position: absolute;top: 10px;left: 20px;font-size: 1.5rem;color: #fff;font-weight: 600;text-shadow: 1px 2px 10px #202020;">
                            {{ @$homecontentlocation->continent->name }}</h3>
                        </a>
                        </div>
                    @elseif (@$homecontentlocation->type_loction_id=='2')
                    <div class="card w-sm-auto mr-4 mt-1 ml-auto mr-auto mr-md-2 ml-md-0" style="margin-right: 7px;">
                        <div class="embed-responsive embed-responsive-16by9">
                            <img style="height: 225px;width:100%" src="{{ @$homecontentlocation->country->image_show }}" class="card-img-top embed-responsive-item lazyload" alt="">
                        </div>
                        <a class="stretched-link" style="color:#007bff" href="{{ route('frontend.all_universities_list') }}?continent={{ @$homecontentlocation->country->continent_id }}&country={{ @$homecontentlocation->country->id }}">
                        <h3 class=""
                            style="position: absolute;top: 10px;left: 20px;font-size: 1.5rem;color: #fff;font-weight: 600;text-shadow: 1px 2px 10px #202020;">
                            {{ @$homecontentlocation->country->name }}</h3>
                        </a>
                        </div> 
                    @elseif (@$homecontentlocation->type_loction_id=='3')
                        <div class="card w-sm-auto mr-4 mt-1 ml-auto mr-auto mr-md-2 ml-md-0" style="margin-right: 7px;">
                        <div class="embed-responsive embed-responsive-16by9">
                            <img style="height: 225px;width:100%" src="{{ @$homecontentlocation->state->image_show }}" class="card-img-top embed-responsive-item lazyload" alt="">
                        </div>
                        <a class="stretched-link" style="color:#007bff" href="{{ route('frontend.all_universities_list') }}?continent={{ @$homecontentlocation->state->country->continent_id }}&country={{ @$homecontentlocation->state->country_id }}&state={{ @$homecontentlocation->state->id }}">
                        <h3 class=""
                            style="position: absolute;top: 10px;left: 20px;font-size: 1.5rem;color: #fff;font-weight: 600;text-shadow: 1px 2px 10px #202020;">
                            {{ @$homecontentlocation->state->name }}</h3>
                        </a>
                        </div> 
                    @elseif (@$homecontentlocation->type_loction_id=='4')
                        <div class="card w-sm-auto mr-4 mt-1 ml-auto mr-auto mr-md-2 ml-md-0" style="margin-right: 7px;">
                        <div class="embed-responsive embed-responsive-16by9">
                            <img style="height: 225px;width:100%" src="{{ @$homecontentlocation->city->image_show }}" class="card-img-top embed-responsive-item lazyload" alt="">
                        </div>
                        <a class="stretched-link" style="color:#007bff" href="{{ route('frontend.all_universities_list') }}?continent={{ @$homecontentlocation->city->state->country->continent_id }}&country={{ @$homecontentlocation->city->state->country_id }}&state={{ @$homecontentlocation->city->state->id }}&city={{ @$homecontentlocation->city->id }}">
                        <h3 class=""
                            style="position: absolute;top: 10px;left: 20px;font-size: 1.5rem;color: #fff;font-weight: 600;text-shadow: 1px 2px 10px #202020;">
                            {{ @$homecontentlocation->city->name }}</h3>
                        </a>
                        </div>                   
                    @endif
                @endif
                @endforeach
            </section>
            </section>
        </div>
        <div class="container d-flex flex-column mb-5 p-0">
            <section class="mdc-card__supporting-text p-0 ">
            <section class="d-lg-flex cities-card-bottom">
                @foreach ($homecontentlocations as $k=>$homecontentlocation)
                @if ($k>2)

                    @if (@$homecontentlocation->type_loction_id=='1')
                        <div class="card w-sm-auto mr-4 mt-1 ml-auto mr-auto mr-md-2 ml-md-0" style="margin-right: 7px;">
                        <div class="embed-responsive embed-responsive-16by9">
                            <img style="height: 225px;width:100%" src="{{ @$homecontentlocation->continent->image_show }}" class="card-img-top embed-responsive-item lazyload" alt="">
                        </div>
                        <a class="stretched-link" style="color:#007bff" href="{{ route('frontend.all_universities_list') }}?continent={{ @$homecontentlocation->continent->id }}">
                        <h3 class=""
                            style="position: absolute;top: 10px;left: 20px;font-size: 1.5rem;color: #fff;font-weight: 600;text-shadow: 1px 2px 10px #202020;">
                            {{ @$homecontentlocation->continent->name }}</h3>
                        </a>
                        </div>
                    @elseif (@$homecontentlocation->type_loction_id=='2')
                    <div class="card w-sm-auto mr-4 mt-1 ml-auto mr-auto mr-md-2 ml-md-0" style="margin-right: 7px;">
                        <div class="embed-responsive embed-responsive-16by9">
                            <img style="height: 225px;width:100%" src="{{ @$homecontentlocation->country->image_show }}" class="card-img-top embed-responsive-item lazyload" alt="">
                        </div>
                        <a class="stretched-link" style="color:#007bff" href="{{ route('frontend.all_universities_list') }}?continent={{ @$homecontentlocation->country->continent_id }}&country={{ @$homecontentlocation->country->id }}">
                        <h3 class=""
                            style="position: absolute;top: 10px;left: 20px;font-size: 1.5rem;color: #fff;font-weight: 600;text-shadow: 1px 2px 10px #202020;">
                            {{ @$homecontentlocation->country->name }}</h3>
                        </a>
                        </div> 
                    @elseif (@$homecontentlocation->type_loction_id=='3')
                        <div class="card w-sm-auto mr-4 mt-1 ml-auto mr-auto mr-md-2 ml-md-0" style="margin-right: 7px;">
                        <div class="embed-responsive embed-responsive-16by9">
                            <img style="height: 225px;width:100%" src="{{ @$homecontentlocation->state->image_show }}" class="card-img-top embed-responsive-item lazyload" alt="">
                        </div>
                        <a class="stretched-link" style="color:#007bff" href="{{ route('frontend.all_universities_list') }}?continent={{ @$homecontentlocation->state->country->continent_id }}&country={{ @$homecontentlocation->state->country_id }}&state={{ @$homecontentlocation->state->id }}">
                        <h3 class=""
                            style="position: absolute;top: 10px;left: 20px;font-size: 1.5rem;color: #fff;font-weight: 600;text-shadow: 1px 2px 10px #202020;">
                            {{ @$homecontentlocation->state->name }}</h3>
                        </a>
                        </div> 
                    @elseif (@$homecontentlocation->type_loction_id=='4')
                        <div class="card w-sm-auto mr-4 mt-1 ml-auto mr-auto mr-md-2 ml-md-0" style="margin-right: 7px;">
                        <div class="embed-responsive embed-responsive-16by9">
                            <img style="height: 225px;width:100%" src="{{ @$homecontentlocation->city->image_show }}" class="card-img-top embed-responsive-item lazyload" alt="">
                        </div>
                        <a class="stretched-link" style="color:#007bff" href="{{ route('frontend.all_universities_list') }}?continent={{ @$homecontentlocation->city->state->country->continent_id }}&country={{ @$homecontentlocation->city->state->country_id }}&state={{ @$homecontentlocation->city->state->id }}&city={{ @$homecontentlocation->city->id }}">
                        <h3 class=""
                            style="position: absolute;top: 10px;left: 20px;font-size: 1.5rem;color: #fff;font-weight: 600;text-shadow: 1px 2px 10px #202020;">
                            {{ @$homecontentlocation->city->name }}</h3>
                        </a>
                        </div>                   
                    @endif
                @endif
                @endforeach
            </section>
            </section>
    
        </div>
    </div>
@endisset --}}
  <!-- End of Seach by City -->

  <!-- University showcase -->
  {{-- <div id="uni-showcase" class="uni-showcase container d-flex flex-column mb-1 mt-1">
    <div class="d-lg-flex align-items-lg-center">
      <div class="col-md-4">
        <h3 class="ca-card-title d-block text-center mb-5 mb-lg-0 ">{{ $home_content->university_title }}</h3>
        <div class="d-lg-flex d-none justify-content-center">
          <img src="{{ $home_content->university_image_show }}" alt="University Image" style="height: 300px; width:100%"/>
        </div>
      </div>

      <div class="col-md-8">
       <div class="row d-flex">
        @foreach ($universities as $university)
          <div class="col-md-2 ">
            <div class="unibox" title="{{ $university->name }}">
                <a href="{{ route('frontend.university_details', $university->id) }}"><img
                 class="lazyload" style="height:115px; width: 100px;"  src="{{ $university->image_show }}"></a>
                <p><a href="{{ route('frontend.university_details', $university->id) }}">{{ $university->name }}</a></p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>

    <span class="text-white"><a href="{{ route('frontend.all_universities_list') }}"
        class="ca-button mt-3 w-auto btn btn-txt" style="background-color: red;font-size: 20px;color: white;">View All Universities</a></span>
  </div> --}}
  <!-- End of University Showcase -->


<!--End Main Background Video Header -->
<!--Start Course Content-->
<!-- bg-alice-blue -->
<div class="py-0 pt-lg-220" style="padding-top: 0px !important;">
<div class="container-lg">
<div class="row">
<div class="col-12">
<div class="text-center mb-1">
    <h3 class="fw-bold mb-0 text-dark-cerulean explore_course">{{ $home_content->course_title }}</h3>
</div>
<div class="d-sm-flex text-center">
    <div class="dropdown category-dropdown mb-3 mb-sm-0 me-sm-2">
        <button class="btn btn-dark-cerulean btn-shadow dropdown-toggle all_category" type="button"
            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            All Category
         </button>
        <ul class="dropdown-menu animate slideIn" aria-labelledby="dropdownMenuButton1">

            @foreach ( $categories as $categorie )
            <li>
                <a class="dropdown-item" href="javascript:void(0)"
                    onclick="get_explorecourse('dynamic', '', '')">
                </a>
                <a class="dropdown-item" cat_id="{{ $categorie->id }}" href="{{ route('courses.category',$categorie->id) }}">{{ $categorie->name }} </a>
            </li>
            @endforeach
        </ul>

    </div>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs course-tabs border-0" role="tablist" style="display: none">
        <li class="nav-item">
            <a class="nav-link active home_on_click_subcategory" href="#tab_2" role="tab" data-bs-toggle="tab" home_subcat_id="popular">
            Most Popular
        </a>
        </li>
        <li class="nav-item">
            <a class="nav-link home_on_click_subcategory" href="#tab_2" role="tab" data-bs-toggle="tab" home_subcat_id="newest">
            Newest
        </a>
        </li>
        @foreach ($sub_categorys as $sub_category)
        <li class="nav-item">
            <a class="nav-link home_on_click_subcategory" href="javascript void(0)" role="tab" data-bs-toggle="tab" home_subcat_id="{{ $sub_category->id }}">
               {{ $sub_category->name }}
            </a>
        </li>
        @endforeach

    </ul>
</div>
<!--Start Course Search-->
<form action="{{ route('home.head_search') }}" method="GET">
<div class="course-search input-group mb-4 mt-3">
    <input type="text" class="form-control bg-white  " placeholder="Search For Course"
        aria-label="Recipient's username" name="search" value="{{ $search }}" aria-describedby="button-addon2" id="search_input">
    <button class="btn btn-dark-cerulean btn-shadow" type="submit" id="button-addon2"
        onclick="typeahead_explore_search()">
        <svg id="search_4_" data-name="search (4)" xmlns="http://www.w3.org/2000/svg" width="24.894"
            height="24.894" viewBox="0 0 24.894 24.894">
            <g id="Group_16" data-name="Group 16" transform="translate(3.743 5.396)">
                <g id="Group_15" data-name="Group 15">
                    <path id="Path_5" data-name="Path 5"
                        d="M80.108,111.245a.919.919,0,0,0-1.3,0,6.286,6.286,0,0,0-1.8,5.1.92.92,0,0,0,.914.828c.031,0,.062,0,.092,0a.92.92,0,0,0,.824-1.007,4.453,4.453,0,0,1,1.268-3.612A.919.919,0,0,0,80.108,111.245Z"
                        transform="translate(-76.978 -110.976)" fill="#fff" />
                </g>
            </g>
            <g id="Group_18" data-name="Group 18">
                <g id="Group_17" data-name="Group 17">
                    <path id="Path_6" data-name="Path 6"
                        d="M10.516,0A10.516,10.516,0,1,0,21.032,10.516,10.528,10.528,0,0,0,10.516,0Zm0,19.192a8.676,8.676,0,1,1,8.676-8.676A8.686,8.686,0,0,1,10.516,19.192Z"
                        fill="#fff" />
                </g>
            </g>
            <g id="Group_20" data-name="Group 20" transform="translate(16.371 16.371)">
                <g id="Group_19" data-name="Group 19">
                    <path id="Path_7" data-name="Path 7"
                        d="M344.962,343.663l-6.684-6.684a.92.92,0,0,0-1.3,1.3l6.684,6.684a.92.92,0,0,0,1.3-1.3Z"
                        transform="translate(-336.709 -336.71)" fill="#fff" />
                </g>
            </g>
        </svg>
    </button>
</div>
</form>
<!--End Course Search-->
<!-- Tab panes -->
<div class="tab-content mt-2" style="display: none">
    <div role="tabpanel" class="tab-pane fade show tabidload active" id="tab_1">
        <!-- gx-3 gy-4 justify-content-center row -->
        <div class="">
            <div class="row justify-content-center gx-3 gy-4 loadexplorecourse home_course_subcat_ajax-show" id="alldata">

                @foreach ($courses as $course)
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 hideClass" id="50">
                    <!--Start Course Card-->
                    <div
                        class="course-card course-card-shadow rounded-6 bg-white position-relative overflow-hidden">
                        <div class="position-relative overflow-hidden bg-prussian-blue">
                            <!--Start Course Image-->
                            <a href="{{ route('frontend.course.details',$course->id) }}"
                                class="course-card_img">
                                <img src="{{ $course->teacher->image_show ?? ''}}"
                                    class="img-fluid w-100" alt="">
                            </a>
                            <!--End Course Image-->
                            <div
                                class="align-items-center top-0 d-flex fs-12 position-absolute px-3 py-2 start-0 text-white w-100 z-index-2">
                                <input type="hidden" value="CO09ICCG850"
                                    id="course_id">
                                <input type="hidden" value="" id="student_id">
                                <input type="hidden" value="" id="user_type">
                                <span class="badge-new me-1">

                                    @if ($course->coursetype=='1')
                                    Most Popular
                                    @elseif ($course->coursetype=='0')
                                         Free
                                    @else
                                        Govt
                                    @endif

                                    </span>

                                <span class="badge-business" style="color: var(--product_text_color)">
                                    @foreach ($course->courselanguages as $k => $item  )
                                        @if ($k == 0)
                                            {{ $item->name}}
                                        @else
                                            {{ $item->name}}
                                        @endif
                                    @endforeach
                                </span>

                            @php
                                $is_save = 0;
                                if(auth()->check()){
                                    $save = \App\Models\CourseSave::where('course_id',$course->id)->where('user_id',auth()->user()->id)->first();
                                    if($save){
                                        $is_save = 1;
                                    }
                                }
                            @endphp

                            <a href="javascript:void(0)" @if($is_save == 1) style="color: #00a662;" @endif class="text-center add-save" c_id="{{ $course->id }}">
                                <i class="far fa-bookmark ml-4" style="cursor: pointer;font-size: 30px;"></i>

                            </a>

                                {{-- <span  class="ms-auto">
                                        <img src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/img/bookmark-1.png"
                                        class="img-fluid ms-auto " alt="" style="cursor: pointer;">
                                </span> --}}
                            </div>
                            @if($course->discount > 0)
                            <span class="px-0 badge m-3 position-absolute start-0 z-index-2 polygon-shape" style="top:25px; color: var(--product_text_color)">
                                <span class="d-block fs-13 mb-1">
                                    @if ($course->discounttype == "0")
                                    Off {{ @$course->discount}}%
                                    @else
                                      Off ${{ @$course->discount}}
                                    @endif
                                </span>

                            </span>
                            @endif

                            <!--Start Course Card Body-->
                            <div class="bg-prussian-blue course-card_body course_middle px-3 py-2 text-white py-12">
                                <!--Start Course Title-->
                                <h3 class="course-card__course--title  mb-0">
                                    <!-- <a href=""
                                        class="text-decoration-none text-white"></a> -->
                                        <a href="{{ route('frontend.course.details',$course->id) }}"
                                                class="text-decoration-none" style="color: var(--product_text_color)">{{ $course->name }}</a></h3>
                                <!--End Course Title-->
                                <div class="course-card__instructor d-flex align-items-center">
                                    <div class="card__instructor--name my-2">
                                        <a class="text-capitalize instructor-name" style="color: var(--product_text_color)"
                                            href="{{ route('frontend.course.details',$course->id) }}">{{ @$course->teacher->name }}</a>
                                    </div>
                                </div>
                                <!--Start Course Hints-->
                                <table
                                    class="course-card__hints table table-borderless table-sm text-white mb-0">
                                    <tbody>
                                        <tr>
                                            <td width="80" class="ps-0">
                                                <div class="d-flex align-items-center">
                                                    <div class="course-card__hints--icon me-3">
                                                        <div class="d-flex align-items-center" >
                                                            <div class="bar-custom me-2">
                                                                <span class="fill"></span>
                                                                <span></span>
                                                                <span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="course-card__hints--text fs-12 fw-bold" style="color: var(--product_text_color)">{{ $course->course_level }}</div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="ps-0">
                                                <div class="d-flex align-items-center">
                                                    <div class="course-card__hints--icon me-3">
                                                        <svg id="document"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            width="17.26" height="14.926"
                                                            viewBox="0 0 17.26 14.926">
                                                            <path id="Path_148" data-name="Path 148"
                                                                d="M16.065,17.081H1.2a1.2,1.2,0,0,0-1.2,1.2V28.364a1.2,1.2,0,0,0,1.2,1.2h8.67l-.262,1.6a.69.69,0,0,0,1.041.75l1.871-.985a.393.393,0,0,1,.248,0l1.871.985a.834.834,0,0,0,.388.1.656.656,0,0,0,.387-.123.726.726,0,0,0,.266-.728l-.262-1.6h.651a1.2,1.2,0,0,0,1.2-1.2V18.277A1.2,1.2,0,0,0,16.065,17.081ZM12.64,27.511a2.084,2.084,0,1,1,2.084-2.084A2.086,2.086,0,0,1,12.64,27.511Zm.6,2.5a1.383,1.383,0,0,0-1.2,0l-1.323.7.42-2.565a3.1,3.1,0,0,0,3.007,0l.164,1v.005l.256,1.56Zm2.994-1.651a.173.173,0,0,1-.171.171h-.819l-.187-1.142s0-.009,0-.013a3.108,3.108,0,1,0-4.831,0l0,.013-.187,1.142H1.2a.173.173,0,0,1-.171-.171V18.277a.173.173,0,0,1,.171-.171H16.065a.173.173,0,0,1,.171.171Z"
                                                                transform="translate(0 -17.081)"
                                                                fill="#B5C5DB" />
                                                            <path id="Path_149" data-name="Path 149"
                                                                d="M43.246,60.243H31.631a.512.512,0,0,0,0,1.025H43.246a.512.512,0,0,0,0-1.025Z"
                                                                transform="translate(-28.993 -57.295)"
                                                                fill="#B5C5DB" />
                                                            <path id="Path_150" data-name="Path 150"
                                                                d="M36.55,100.911H31.631a.512.512,0,0,0,0,1.025H36.55a.512.512,0,0,0,0-1.025Z"
                                                                transform="translate(-28.993 -95.184)"
                                                                fill="#B5C5DB" />
                                                        </svg>
                                                    </div>
                                                    <div class="course-card__hints--text fs-12 fw-bold" style="color: var(--product_text_color)">{{ @$course->organization_name }}</div>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                                <!--End Course Hints-->
                                <div
                                    class="align-items-center d-flex fs-12 justify-content-between pt-1 text-white w-100">
                                    <div class="d-flex align-items-center">
                                        <div class="course-card__hints--icon me-3">
                                            <svg id="clock_1_" data-name="clock (1)"
                                                xmlns="http://www.w3.org/2000/svg" width="16.706"
                                                height="16.706" viewBox="0 0 16.706 16.706">
                                                <path id="Path_13" data-name="Path 13"
                                                    d="M8.353,0a8.353,8.353,0,1,0,8.353,8.353A8.363,8.363,0,0,0,8.353,0Zm0,15.662a7.309,7.309,0,1,1,7.309-7.309,7.317,7.317,0,0,1-7.309,7.309Z"
                                                    fill="#B5C5DB" />
                                                <path id="Path_14" data-name="Path 14"
                                                    d="M208.838,83.118h-1.044v5.437l3.285,3.285.738-.738-2.979-2.979Z"
                                                    transform="translate(-199.963 -79.985)"
                                                    fill="#B5C5DB" />
                                            </svg>
                                        </div>
                                        <div class="course-card__hints--text fs-12 fw-bold" style="color: var(--product_text_color)">{{ @$course->course_hours }}</div>
                                    </div>
                                    @php
                                    $students =\App\Models\CourseParticipant::leftJoin('courses','courses.id','course_participants.course_id')
                                        ->where('courses.teacher_id',$course->teacher_id)->get();
                                    @endphp
                                    <div class="course-like d-flex align-items-center">
                                        <i class="fas fa-graduation-cap fs-15 me-1 "
                                            style="color:#B5C5DB"></i>
                                        <div class="d-block">
                                            <div class="reviews fs-12 fw-bold" style="color: var(--product_text_color)">{{ $students->count() }}</div>
                                        </div>
                                    </div>

                                    <!--Start Star Rating-->
                                    <div class="star-rating__wrap d-flex align-items-center ">
                                        <i class="fas fa-star me-1 text-warning"
                                            style="color:#B5C5DB"></i>
                                        <div class="d-block">
                                            @php
                                            $avg_round = round($course->reviews->avg('ratting'),1);
                                            @endphp
                                            <div class="reviews fs-12 fw-bold" style="color: var(--product_text_color)">{{$avg_round }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End Course Card Body-->
                            <!--Start Course Card Hover Content-->
                            <div class="course-card__hover--content">
                                <img src="{{ $course->teacher->image_show ?? ''}}"
                                    class="course-card__hover--content___img">
                                <!--Start Video Icon With Popup Youtube-->
                                <a class="course-card__hover--content___icon popup-youtube"
                                href="{{$course->courselessons->count() > 0 ? ($course->courselessons[0]->courselessonvideos->count() >0 ?  $course->courselessons[0]->courselessonvideos[0]->lesson_video : '#') : '#' }}"
                                autoplay>
                                <img src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/img/Playicon.png"
                                    class="img-fluid" alt="">
                               </a>

                                <!--End Video Icon With Popup Youtube-->
                                <h3 class="bottom-0 course-card__hover--content___text d-block fs-15 mb-0 position-absolute text-decoration-none text-white">
                                    <!-- <a href=""
                                        class="text-decoration-none text-white">                                                    </a> -->
                                    <a href="{{ route('frontend.course.details',$course->id) }}"
                                        class="text-decoration-none" style="color: var(--product_text_color)">{{ $course->name }}
                                    </a>
                                </h3>
                            </div>
                        </div>
                        <div class="course-card_footer g-2 px-3 py-12">
                        <!-- before purchase  -->
                            <!-- add to cart  -->
                            <input type="hidden" name="course_id" id="course_id_CO09ICCG850" value="CO09ICCG850">
                            <input type="hidden" name="course_name" id="course_name_CO09ICCG850" value="Fast Track Spoken English &amp; Fluency">
                            <input type="hidden" name="slug" id="slug_CO09ICCG850" value="fast-track-spoken-english-&amp;-fluency">
                            <input type="hidden" name="qty" id="qty" value="1">
                            <input type="hidden" name="price" id="price_CO09ICCG850" value="1200">
                            <input type="hidden" name="old_price" id="old_price_CO09ICCG850" value="2000">
                            <input type="hidden" name="picture" id="picture_CO09ICCG850" value="{{ asset('public/frontend') }}/assets/uploads/course/Thumb1681378103-f-Spoken-English-Mini-thumb.png">
                            <input type="hidden" name="is_course_type" id="iscourse_type" value="0">
                            <input type="hidden" name="affiliator_id" id="affiliator_id" value="">
                            <input type="hidden" name="course_price" id="course_price" value="1200">
                            <input type="hidden" name="student_discount" id="student_discount" value="">
                            <!-- add to cart  -->
                            <div class="d-block">

                                <div class="align-items-center d-flex form-check ps-0">
                                    <input name="course_price_type[{{ $course->id }}]" class="me-1 change_cart_val @if(Auth::check()) active @endif" style="width:21px;height:21px" course_id="{{ $course->id }}" id="course_subcribe{{ $course->id }}" type="radio"  @if (Auth::check() == false) disabled @endif>
                                    <label class="form-check-label fw-bold @if (Auth::check() == false) opa-half @endif course_price_cart" for="course_subcribe{{ $course->id }}">Subscription</label>
                                </div>

                                <div class="form-check d-flex align-items-center ps-0">
                                    <input course_id="{{ $course->id }}" id="course_cart_price{{ $course->id }}" class="me-1 active change_cart_val" name="course_price_type[{{ $course->id }}]" style="width:21px;height:21px" type="radio" checked>
                                    <label
                                        class="align-items-center d-flex form-check-label fw-bold justify-content-between"
                                        style="width:100%"
                                        for="course_cart_price{{ $course->id }}">
                                        <span class="course_price_cart" > Course Price <span class="text-success"></span></span>
                                        <span class="align-items-center d-flex  rounded text-center">


                                            @if($course->discount > 0)
                                                @if ($course->discounttype=="0")
                                                    @php
                                                        $new_price=$course->fee -($course->fee *$course->discount/100);
                                                    @endphp
                                                    <span class="d-block fs-16 fw-bold me-2 text-success2"> {{ format_price($new_price)}}</span>
                                                    <del class="fs-12 fw-bold text-muted2">{{ format_price($course->fee) }}</del>
                                                @else
                                                    @php
                                                        $new_price=$course->fee - $course->discount;
                                                    @endphp
                                                    <span class="d-block fs-16 fw-bold me-2 text-success2"> {{ format_price($new_price)}}</span>
                                                    <del class="fs-12 fw-bold text-muted2">{{ format_price($course->fee)}}</del>
                                                @endif
                                            @else
                                            <span class="d-block fs-16 fw-bold me-2 text-success2"> {{ format_price($course->fee) }}</span>
                                            @endif


                                            {{-- <span class="d-block fs-16 fw-bold me-2 text-success2">BDT{{ $course->discount }}</span> --}}
                                            {{-- <del class="fs-12 fw-bold text-muted2">{{ $course->fee }}</del> --}}
                                         </span>
                                    </label>
                                </div>

                                <div class="d-flex justify-content-between align-items-stretch mt-2">

                                  @php
                                    $check_course = 0;
                                    if(auth()->check()){
                                        $save = \App\Models\CourseParticipant::where('course_id',$course->id)->where('user_id',auth()->user()->id)->first();
                                        if($save){
                                            $check_course = 1;
                                        }
                                    }
                                  @endphp
                                @if ($check_course==0)
                                    <div class="flex-grow-1 me-2 w-sub">
                                        <a href="javascript:void(0);"
                                            class="btn btn-dark-cerulean w-100 btn-cart-2 fs-14 course_cart_price{{ $course->id }}">
                                            <span class="shopping me-1 shopping_icon position-relative">
                                                <img src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/img/cart.png"
                                                    style="width: 14px;">
                                            </span>
                                            <span class="text-center w-100 fw-bold fs-13 addcart" CarId="{{ $course->id }}" style="color: var(--button2_text_color)!important">
                                                Add To Cart
                                            </span>
                                        </a>
                                        <a style="display: none;" href="{{ route('frontend.subscribe_details') }}"
                                            class="btn btn-dark-cerulean w-100 btn-cart-2 fs-14 course_subcribe{{ $course->id }}"
                                            >
                                            <span class="shopping me-1 shopping_icon position-relative">
                                                <img src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/img/cart.png"
                                                    style="width: 14px;">
                                            </span>
                                            <span class="text-center w-100 fw-bold fs-13" style="color: var(--button2_text_color)">
                                                Get Stared
                                            </span>
                                        </a>
                                    </div>
                                    @endif
                                    <div class="flex-grow-1">
                                        <a href="{{ route('frontend.course.details',$course->id) }}"
                                            class="btn btn-dark-cerulean w-100 btn-details fw-bold fs-13">
                                            <span class="shopping me-1 shopping_icon position-relative">
                                                <img class="me-1"
                                                    src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/img/details.png"
                                                    style="width: 14px;">
                                            </span>
                                            <span class="text-center w-100 fw-bold fs-13" style="color: var(--button2_text_color)">Details</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--Start End Card Hover Content-->
                    </div>
                    <!--End Course Card-->
                </div>
                @endforeach

                @if($courses->count() == 0)
                <div class="text-center">
                    <h2>Data Not Found !</h2>
                </div>
                @endif
            </div>

        </div>
    </div>
</div>
<input type="hidden" id="course_type" value="popular">
<input type="hidden" id="category_id" value="">

<div class="text-center mt-5 firstbutton">
     <a href="{{ route('frontend.all.course.show') }}"
     class="btn btn-lg btn-dark-cerulean" style="color: var(--button2_text_color)">
           Browse more Courses
        <svg class="ms-2" xmlns="http://www.w3.org/2000/svg" width="28.56" height="15.666"
            viewBox="0 0 28.56 15.666">
            <path id="right-arrow_3_" data-name="right-arrow (3)"
                d="M20.727,107.5l-1.272,1.272,5.661,5.661H0v1.8H25.116l-5.661,5.661,1.272,1.272,7.833-7.833Z"
                transform="translate(0 -107.5)" fill="#fff"></path>
        </svg>
    </a>
</div>

</div>
</div>
</div>
</div>
<!--End Course Content-->


<link href="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/css/owl.carousel.min.css" rel="stylesheet">
<link href="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/css/owl.theme.default.min.css" rel="stylesheet">
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
                {{-- <div>
                    <div class="logo-holder">
                        <img src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/img/v11_1310.png"
                            alt="">
                    </div>
                </div>

                <div>
                    <div class="logo-holder">
                        <img src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/img/v11_1311.png"
                            alt="" style="max-width: 100%;">
                    </div>
                </div>
                <div>
                    <div class="logo-holder">
                        <img src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/img/6.svg"
                            alt="" style="max-width: 100%;">
                    </div>
                </div> --}}

            </div>

        </div>
    </div>
</div>
<script
src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/js/owl.carousel.min.js">
</script>
<script src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/js/main.js">
</script>

<!--End Brand Logo-->
<div class="bg-white py-5">
<div class="container-lg">
<div class="row mt-5">
<div class="col-lg-6 mb-5 pe-xl-5">
<h3 class="fw-bold mb-5 text-center text-lg-start text-uppercase" style="color:var(--text_color)">{!! $home_content->learn_title !!}</h3>
{{-- <a href="allcourse/index.html"> --}}
    <img src="{{ $home_content->learn_image_show }}" style="height: 375px; width:540px;"
        class="img-fluid" alt="">
{{-- </a> --}}
</div>
<div class="col-lg-6">

<div class="row g-3">
    <!-- d-flex -->
    @foreach ($learn_texts as $learn_text)
        <div class="col-12 col-sm-6 text-center d-flex">
            <div class="shadow p-4 bg-alice-blue w-100">
                <div class="icon mb-3">
                    <a href="{{ url('/') }}" class="text-dark d-block">
                        <img src="" class="img-fluid" alt="">
                    </a>
                </div>
                <h4 class="h5 fw-bold">
                    <a href="{{ $learn_text->url }}"  target="_blank"   class="text-center" style="color:var(--text_color)">
                        {{ $learn_text->title }}</a>
                </h4>
                <p class="mb-0" style="color:var(--text_color)">{{ $learn_text->description }}</p>
            </div>
        </div>
    @endforeach



</div>
</div>
</div>
</div>
</div>
<div class="brand-logo-content bg-alice-blue py-5">
<div class="container-lg">
<div class="text-center mb-5">
<h3 class="fw-bold mb-0" style="color:var(--text_color)">{{ $home_content->client_title }}</h3>
</div>
<div class="collaborate2-carousel owl-carousel text-center">
    @foreach ($clients as $client)
        <div class="brand_item">
            <a href="{{ $client->link }}"
                        target="_blank" >
                        <!-- <object data="" width="100%" height="100%"  ></object> -->
                <img src="{{ $client->image_show }}" alt="">
            </a>
        </div>
    @endforeach



        {{-- <div class="brand_item">
            <a href="https://tedxgulshan.com/"
                target="_blank" >
                                    <!-- <object data="" width="100%" height="100%"  ></object> -->
                                    <img src="{{ asset('public/frontend') }}/assets/uploads/features/2022-03-08/4b286bac54b3ea0d0a99e2783e8add8d.svg" alt="">
                    </a>
        </div>
        <div class="brand_item">
            <a href="https://www.trtworld.com/author/Ashfaq Zaman"
                target="_blank" >
                                    <!-- <object data="" width="100%" height="100%"  ></object> -->
                        <img src="{{ asset('public/frontend') }}/assets/uploads/features/2022-03-08/d7fa085bdf8e653e993352ddd30496d2.svg" alt="">
                    </a>
        </div>
        <div class="brand_item">
            <a href="https://www.thedailystar.net/star-youth/news/ashfaq-zamans-journey-lead-1731610"
                target="_blank" >
                        <!-- <object data="" width="100%" height="100%"  ></object> -->
                        <img src="{{ asset('public/frontend') }}/assets/uploads/features/2022-03-08/8189a8ac99e2fccd1820c160fd9582ad.svg" alt="">
                    </a>
        </div>
        <div class="brand_item">
            <a href="https://cniasia.news/"
                target="_blank" >
                                    <!-- <object data="" width="100%" height="100%"  ></object> -->
                        <img src="{{ asset('public/frontend') }}/assets/uploads/features/2022-03-08/bbf12e8b1b873902677e4db681d104fe.svg" alt="">
                    </a>
        </div> --}}



    </div>
</div>
</div>


<!--End Brand Logo-->

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
<!--Start Testimonial-->
<div class="testimonial-content py-5">
<div class="text-center mb-5">
<div style="color: var(--text_color)">{{ $home_content->review_title1 }}</div>
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
</div>
</div>
<!--End Testimonial-->
<!--Start Pricing Table-->
{{-- <div class="pricing-content py-5">
<div class="container-lg">
<div class="text-center mb-5">
<h3 class="fw-bold mb-1 ready_to_start" style="color: var(--text_color)">{{ $home_content->package_title }}</h3>
<!-- <div class="">Save 30% an annual plan.we support bKASH/ Nagad for an individual<br> annual plan only.Any
Question ? <a href="#">Contact Us</a></div> -->
</div>
<div class="row justify-content-center">
<div class="col-xxl-10">
<div class="pricing-container">
    <div class="pricing-switcher">
        <div class="fieldset d-inline-flex position-relative">
            <input type="radio" name="duration-1" value="monthly" id="monthly-1" checked>
            <label for="monthly-1" class="monthly">Monthly</label>
            <input type="radio" name="duration-1" value="yearly" id="yearly-1">
            <label for="yearly-1" class="yearly">Yearly</label>
            <span class="switch position-absolute"></span>
        </div>
    </div>
    @php
    $freePackage = \App\Models\BusinessPackages::where('type_name', 'free')->first();
    @endphp

    <ul class="bounce-invert d-flex g-3 justify-content-center list-unstyled mb-0 mt-5 pricing-list row">
        <li class="col-sm-6 col-md-6 col-lg-4 d-flex">
            <ul class="pricing-wrappers list-unstyled pricing-features  text-start">
                <li class="d-flex flex-wrap h-100 align-content-between">
                    <header class="pricing-header text-center pt-5 pb-4 w-100">
                        <h2 class="mb-0" style="color: var(--header_text_color)">{{ @$freePackage->text }}</h2>
                        <div class="price">
                            <span class="value fw-semi-bold" style="color: var(--header_text_color)">
                                {{ @$freePackage->name }}</span>
                        </div>
                    </header>
                    <div class="pricing-body w-100">
                        <ul class="list-unstyled pricing-features px-5 text-start" style="color: var(--header_text_color)">
                            @foreach ($freePackage->options as $k=>$item)
                            <li>
                                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="12.574"
                                    height="9.234" viewBox="0 0 12.574 9.234">
                                    <path id="Path_8" data-name="Path 8"
                                        d="M12.389,68.182a.629.629,0,0,0-.889,0L3.968,75.714l-2.9-2.9a.629.629,0,0,0-.889.889l3.34,3.34a.629.629,0,0,0,.889,0l7.977-7.977A.629.629,0,0,0,12.389,68.182Z"
                                        transform="translate(0 -67.997)" fill="var(--header_text_color)"></path>
                                </svg>
                                    {{ $item->title }}
                            </li>
                            @endforeach

                        </ul>
                    </div>

                    @if (Auth::check())
                    <footer class="pricing-footer w-100">
                        <a class="select d-inline-flex justify-content-center align-items-center"
                            href="">
                            <div class="btn-icon d-flex align-items-center justify-content-center me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15.793" height="15.793"
                                    viewBox="0 0 15.793 15.793">
                                    <path id="Path_357" data-name="Path 357"
                                        d="M15.3,1.922,13.87.491a1.679,1.679,0,0,0-2.372,0L.851,11.139a.471.471,0,0,0-.128.243L.008,15.246a.463.463,0,0,0,.539.539l3.864-.716a.471.471,0,0,0,.243-.128L15.3,4.294A1.676,1.676,0,0,0,15.3,1.922ZM1.04,14.753l.433-2.338,1.9,1.9Zm3.287-.792L1.833,11.466l9.106-9.107,2.494,2.494ZM14.647,3.639l-.56.56L11.593,1.705l.56-.56a.752.752,0,0,1,1.063,0l1.431,1.431A.751.751,0,0,1,14.647,3.639Z"
                                        transform="translate(0 0)" fill="#fff"></path>
                                </svg>
                            </div>
                            Already Enrolled
                        </a>
                    </footer>
                    @else
                    <footer class="pricing-footer w-100">
                        <a class="select d-inline-flex justify-content-center align-items-center" style="color: var(--header_color)"
                            href="{{ route('frontend.register') }}">
                            <div class="btn-icon d-flex align-items-center justify-content-center me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15.793" height="15.793"
                                    viewBox="0 0 15.793 15.793">
                                    <path id="Path_357" data-name="Path 357"
                                        d="M15.3,1.922,13.87.491a1.679,1.679,0,0,0-2.372,0L.851,11.139a.471.471,0,0,0-.128.243L.008,15.246a.463.463,0,0,0,.539.539l3.864-.716a.471.471,0,0,0,.243-.128L15.3,4.294A1.676,1.676,0,0,0,15.3,1.922ZM1.04,14.753l.433-2.338,1.9,1.9Zm3.287-.792L1.833,11.466l9.106-9.107,2.494,2.494ZM14.647,3.639l-.56.56L11.593,1.705l.56-.56a.752.752,0,0,1,1.063,0l1.431,1.431A.751.751,0,0,1,14.647,3.639Z"
                                        transform="translate(0 0)" fill="#fff"></path>
                                </svg>
                            </div>
                            Enroll
                        </a>
                    </footer>
                    @endif





                </li>
            </ul>
        </li>
        <li class="col-sm-6 col-md-6 col-lg-4 exclusive d-flex">
            <ul class="pricing-wrapper list-unstyled position-relative " style="width: 100%;">
                @php
                $monthlyPackage = \App\Models\BusinessPackages::where('type_name', 'monthly')->first();
                @endphp

                <li data-type="monthly" class="is-visible d-flex flex-wrap h-100 align-content-between">
                    <header class="pricing-header text-center pt-5 pb-4 w-100">
                        <h2 style="color: var(--header_text_color)">{{ @$monthlyPackage->name }}</h2>
                            <div class="price" >
                            <span class="currency fs-5 fw-bold mt-0" style="color: var(--header_text_color);"></span>
                            <span
                                class="fw-bold value" style="width:77%;color: var(--header_text_color);font-size: 2.5rem;">{{ format_price(@$monthlyPackage->price) }}</span>
                            <span
                                class="duration fw-bold text-lowercase" style="width:23%;color: var(--header_text_color); word-wrap: break-word;">Month</span>
                        </div>
                        <!-- <p class="mb-0"></p> -->
                    </header>
                    <div class="pricing-body w-100">
                        <ul class="list-unstyled pricing-features px-5 text-start" style="width:100%;color: var(--header_text_color)">
                            @foreach ($monthlyPackage->options as $k=>$item)
                            <li>
                                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="12.574"
                                    height="9.234" viewBox="0 0 12.574 9.234">
                                    <path id="Path_8" data-name="Path 8"
                                        d="M12.389,68.182a.629.629,0,0,0-.889,0L3.968,75.714l-2.9-2.9a.629.629,0,0,0-.889.889l3.34,3.34a.629.629,0,0,0,.889,0l7.977-7.977A.629.629,0,0,0,12.389,68.182Z"
                                        transform="translate(0 -67.997)" fill="var(--header_text_color)"></path>
                                </svg>
                                    {{ $item->title }}
                            </li>
                            @endforeach


                        </ul>
                    </div>
                    <footer class="pricing-footer w-100">
                        <a class="select d-inline-flex justify-content-center align-items-center" style="color: var(--header_color)"
                            href="{{ route('frontend.subscribe_details') }}">
                            <div class="btn-icon d-flex align-items-center justify-content-center me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15.793" height="15.793"
                                    viewBox="0 0 15.793 15.793">
                                    <path id="Path_357" data-name="Path 357"
                                        d="M15.3,1.922,13.87.491a1.679,1.679,0,0,0-2.372,0L.851,11.139a.471.471,0,0,0-.128.243L.008,15.246a.463.463,0,0,0,.539.539l3.864-.716a.471.471,0,0,0,.243-.128L15.3,4.294A1.676,1.676,0,0,0,15.3,1.922ZM1.04,14.753l.433-2.338,1.9,1.9Zm3.287-.792L1.833,11.466l9.106-9.107,2.494,2.494ZM14.647,3.639l-.56.56L11.593,1.705l.56-.56a.752.752,0,0,1,1.063,0l1.431,1.431A.751.751,0,0,1,14.647,3.639Z"
                                        transform="translate(0 0)" fill="#fff"></path>
                                </svg>
                            </div>
                            Subscribe
                        </a>
                    </footer>
                </li>

                @php
                $yearlyPackage = \App\Models\BusinessPackages::where('type_name', 'yearly')->first();
                @endphp

                <li data-type="yearly" class="is-hidden d-flex flex-wrap h-100 align-content-between">
                    <h6 class=" p-2 position-absolute rounded-pill start-50 text-capitalize text-center translate-middle w-sub">
                        {{ @$yearlyPackage->text }}
                    </h6>
                        <header class="pricing-header text-center pt-5 pb-4 w-100">
                        <h2 >{{ @$yearlyPackage->name }}</h2>
                        <h6 class="mx-auto p-2 rounded text-capitalize text-center text-warning w-sub" style="background-color: #15243a;">
                            Before :
                            <del>{{ format_price(@$yearlyPackage->price) }}</del>/
                            year
                        </h6>
                        <!-- <span>End Time <p id="example"></p></span> -->
                             <div class=" price">
                            <span class="currency fs-5 fw-bold mt-0" style="color: var(--header_text_color)"></span>
                            <span
                                class="fw-bold value" style="color: var(--header_text_color); font-size: 2.5rem;">{{ format_price(@$yearlyPackage->discount) }}</span>
                            <span
                                class="duration fw-bold text-lowercase text-white" style="color: var(--header_text_color); word-wrap: break-word;">YR</span>
                        </div>
                        <!-- <p class="mb-0">Per Month / billed Monthly</p> -->
                    </header>
                    <div class="pricing-body w-100">
                        <ul class="list-unstyled pricing-features px-5 text-start" style="color: var(--header_text_color)">
                            @foreach ($yearlyPackage->options as $k=>$item)
                            <li>
                                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="12.574"
                                    height="9.234" viewBox="0 0 12.574 9.234">
                                    <path id="Path_8" data-name="Path 8"
                                        d="M12.389,68.182a.629.629,0,0,0-.889,0L3.968,75.714l-2.9-2.9a.629.629,0,0,0-.889.889l3.34,3.34a.629.629,0,0,0,.889,0l7.977-7.977A.629.629,0,0,0,12.389,68.182Z"
                                        transform="translate(0 -67.997)" fill="var(--header_text_color)"></path>
                                </svg>
                                    {{ $item->title }}
                            </li>
                            @endforeach

                        </ul>
                    </div>
                    <footer class="pricing-footer w-100">
                      
                        <a class="select d-inline-flex justify-content-center align-items-center" style="color: var(--header_color)"
                            href="javascript:void(0)">
                            <div class="btn-icon d-flex align-items-center justify-content-center me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15.793" height="15.793"
                                    viewBox="0 0 15.793 15.793">
                                    <path id="Path_357" data-name="Path 357"
                                        d="M15.3,1.922,13.87.491a1.679,1.679,0,0,0-2.372,0L.851,11.139a.471.471,0,0,0-.128.243L.008,15.246a.463.463,0,0,0,.539.539l3.864-.716a.471.471,0,0,0,.243-.128L15.3,4.294A1.676,1.676,0,0,0,15.3,1.922ZM1.04,14.753l.433-2.338,1.9,1.9Zm3.287-.792L1.833,11.466l9.106-9.107,2.494,2.494ZM14.647,3.639l-.56.56L11.593,1.705l.56-.56a.752.752,0,0,1,1.063,0l1.431,1.431A.751.751,0,0,1,14.647,3.639Z"
                                        transform="translate(0 0)" fill="#fff"></path>
                                </svg>
                            </div>Subscribe
                        </a>
                    </footer>
                </li>


            </ul>
        </li>
        @php
        $enterprisePackage = \App\Models\BusinessPackages::where('type_name', 'enterprise')->first();
        @endphp
        <li class="col-sm-8 col-md-7 col-lg-4 d-flex">
            <ul class="pricing-wrappers list-unstyled position-relative ">
                <li class="d-flex flex-wrap h-100 align-content-between">
                    <header class="pricing-header text-center pt-5 pb-4 w-100">

                        <!-- <div class="price">
                            <span class="currency fw-medium">$</span>
                            <span class="value fw-semi-bold">90</span>
                            <span class="duration">mo</span>
                        </div> -->
                        <div class="price">
                            <span class="fs-1 fw-bold lh-md2" style="color: var(--header_text_color)">{{ @$enterprisePackage->name }}</span>
                        </div>
                    </header>

                    <div class="pricing-body w-100">
                        <ul class="list-unstyled pricing-features px-5 text-start" style="color: var(--header_text_color)">
                            @foreach ($enterprisePackage->options as $k=>$item)
                            <li>
                                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="12.574"
                                    height="9.234" viewBox="0 0 12.574 9.234">
                                    <path id="Path_8" data-name="Path 8"
                                        d="M12.389,68.182a.629.629,0,0,0-.889,0L3.968,75.714l-2.9-2.9a.629.629,0,0,0-.889.889l3.34,3.34a.629.629,0,0,0,.889,0l7.977-7.977A.629.629,0,0,0,12.389,68.182Z"
                                        transform="translate(0 -67.997)" fill="var(--header_text_color)"></path>
                                </svg>
                                    {{ $item->title }}
                            </li>
                            @endforeach

                        </ul>
                    </div>
                    <footer class="pricing-footer w-100">
                        <a class="select d-inline-flex justify-content-center align-items-center" style="color: var(--header_color)"
                            href="{{ route('frontend.contact') }}">
                            <div class="btn-icon d-flex align-items-center justify-content-center me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15.793" height="15.793"
                                    viewBox="0 0 15.793 15.793">
                                    <path id="Path_357" data-name="Path 357"
                                        d="M15.3,1.922,13.87.491a1.679,1.679,0,0,0-2.372,0L.851,11.139a.471.471,0,0,0-.128.243L.008,15.246a.463.463,0,0,0,.539.539l3.864-.716a.471.471,0,0,0,.243-.128L15.3,4.294A1.676,1.676,0,0,0,15.3,1.922ZM1.04,14.753l.433-2.338,1.9,1.9Zm3.287-.792L1.833,11.466l9.106-9.107,2.494,2.494ZM14.647,3.639l-.56.56L11.593,1.705l.56-.56a.752.752,0,0,1,1.063,0l1.431,1.431A.751.751,0,0,1,14.647,3.639Z"
                                        transform="translate(0 0)" fill="#fff"></path>
                                </svg>
                            </div>
                            Contact Us</a>
                    </footer>
                </li>
            </ul>
        </li>
    </ul>
</div>
</div>
</div>
<div class="text-center mt-5">{{ $home_content->package_text }}<br>
<a href="{{ $home_content->package_btn_url }}" class="contact_us">{{ $home_content->package_btn }}</a>
</div>
</div>
</div> --}}

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
<!-- <img src="https://lead.academy/{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default" class='img-fluid' alt=""> -->
<img src="{{ $home_content->question_image_show }}"
    class="img-fluid mt-4 mt-md-0" alt="">
</div>
</div>
</div>
</div>




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
</script></div>
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



