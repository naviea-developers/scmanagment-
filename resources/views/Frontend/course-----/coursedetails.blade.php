@extends('Frontend.layouts.master-layout')
@section('title','- Course Details')
@section('head')

@endsection
@section('main_contend')
@include('Frontend.layouts.parts.header-menu')

<!-- Main content -->

<div class="content_search" style="margin-top:70px">
    <style>
.preview-accordion .accordion-button::after {
    display: none;
}

/*========== its for feedback reply ==========*/
.media {
    background: #fff;
    box-shadow: 0 3px 10px 0 rgba(#000, 0.1);
    padding: 1rem;

    h2 {
        font-size: 24px;
        font-weight: bold;
    }

    img {
        float: left;
        width: 200px;
        margin-right: 16px;
        border: 1px solid lightgrey;
    }

    &:after {
        content: "";
        display: block;
        clear: both;
    }
}

.media[dir="rtl"] {
    img {
        float: right;
        margin-right: 0;
        margin-left: 16px;
    }
}

.link {
    display: inline-block;
    margin-top: 1rem;
    color: #1d7bb3;
}

.wrapper {
    /*max-width: 800px;*/
    padding-left: 1rem;
    padding-right: 1rem;
}

/*============= close ===========*/
</style>

<input type="hidden" id="course_id" name="course_id" value="CO13RT58I93">
<input type="hidden" id="student_id" name="student_id" value="">
<!--Start Course Preview Header-->

<div class="hero-header text-white position-relative bg-img hero2">
    <div class="bottom-0 end-0 position-absolute start-0 top-0" style="z-index: -1">
        <img src="{{ @$course->teacher->image_show }}"
            alt="" class="img-fluid" style="width: 100%; height: 100%;object-fit: cover">
    </div>
    <div class="container-lg hero-header_wrap position-relative">
        <!--Start Breadcrumb-->
        <!-- <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a
                        href=""
                        class="text-white"></a>
                </li>
                <li class="breadcrumb-item"><a href="javascript:void(0)"
                        class="text-white"></a>
                </li>

            </ol>
        </nav> -->
        <!--End Breadcrumb-->
        <!--Start Video Icon With Popup Youtube-->
        <div class="text-center my-3 my-md-5 ">
                        <a class="course-preview__play---icon d-inline-block popup-youtube"
                href="{{$course->courselessons->count() > 0 ? ($course->courselessons[0]->courselessonvideos->count() >0 ?  $course->courselessons[0]->courselessonvideos[0]->lesson_video : '#') : '#' }}">
                <i data-feather="play-circle" class="course-preview__play---icon d-inline-block"></i>
            </a>
                    </div>
        <!--End Video Icon With Popup Youtube-->
                <div class="row align-items-end">
            <div class="col col-title">
                <h1 class="fw-semi-bold mb-3" style="color: var(--product_text_color)"> {{ @$course->name }} </h1>
                <div class="row g-4 align-items-center">
                    <div class="col-auto">
                        <div class="avatar d-flex align-items-center">
                            <div class="avatar-img me-3">
                            <img src="{{ @$course->teacher->image_show }}"
                            alt="">
                            </div>
                            <div class="avatar-text">
                                <div class="avatar-designation text-white-50 mb-1 fw-bold ins_txt">
                                    Instructor                                </div>
                                <h5 class="h6 avatar-name mb-0">
                                    <a href="javascript:void(0)"
                                      style="color: var(--product_text_color)">
                                        {{ @$course->teacher->name }}
                                    </a>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="">
                            <div class="text-white-50 mb-1 course_level_txt">Course Level</div>
                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    <div class="bar-custom me-2">
                                        <span class="fill"></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                    <span style="color: var(--product_text_color)">{{ @$course->course_level }}</span>
                                 </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-auto">
                        <div class="">
                            <div class="text-white-50 mb-1 duration_txt">
                            Duration                            </div>
                            <div class="d-flex align-items-center">

                                <svg class="course-hints_icon me-1" id="clock_1_" data-name="clock (1)"
                                    xmlns="http://www.w3.org/2000/svg" width="16.706" height="16.706"
                                    viewBox="0 0 16.706 16.706">
                                    <path id="Path_13" data-name="Path 13"
                                        d="M8.353,0a8.353,8.353,0,1,0,8.353,8.353A8.363,8.363,0,0,0,8.353,0Zm0,15.662a7.309,7.309,0,1,1,7.309-7.309,7.317,7.317,0,0,1-7.309,7.309Z"
                                        fill="#fff" />
                                    <path id="Path_14" data-name="Path 14"
                                        d="M208.838,83.118h-1.044v5.437l3.285,3.285.738-.738-2.979-2.979Z"
                                        transform="translate(-199.963 -79.985)" fill="#fff" />
                                </svg>
                                <span style="color: var(--product_text_color)">{{ @$course->course_hours }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="">
                            <div class="text-white-50 mb-1 rating_txt">Rating</div>
                            @php
                            $avg_round = round($course->reviews->avg('ratting'),1);
                            @endphp
                            <div class="text-warning"><i class="fas fa-star"></i>{{ @$avg_round }}</div>
                        </div>
                    </div>

                    @php
                        $students =\App\Models\CourseParticipant::leftJoin('courses','courses.id','course_participants.course_id')
                            ->where('courses.teacher_id',$course->teacher_id)->get();
                    @endphp

                    <div class="col-auto">
                        <div>
                            <div class="text-white-50 mb-1 students_txt">Students</div>
                            <div class="d-flex align-items-center">
                                <i data-feather="user" class="course-hints_icon me-1"></i><span class="" style="color: var(--product_text_color)">{{ $students->count() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-auto">
                <div class="align-items-end g-3 justify-content-md-end row mt-3 mt-xl-0">
                    <div class="col-sm-auto">
                        <div class="d-md-flex save-share-wrap">
                            <span class="text-center">
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
                                    <!-- <i data-feather="bookmark" class="bookmark-icon" style="font-size: 30px;"></i> -->
                                    <i class="far fa-bookmark " style="cursor: pointer;font-size: 30px;"></i>
                                    <div class="save_txt">Save</div>
                                </a>

                            </span>
                            <a href="https://www.facebook.com/sharer.php?u=https://lead.academy/course-details/CO13RT58I93"
                                target="_blank" title="Facebook Share" class="text-center ms-md-3"
                                data-bs-toggle="modal" data-bs-target="#shareModal">
                                <i data-feather="share-2" class="share-icon"></i>
                                <div class="share_txt">Share</div>
                            </a>

                        </div>
                    </div>
                    <input type="hidden" name="course_id"
                        id="course_id_CO13RT58I93"
                        value="CO13RT58I93">
                    <input type="hidden" name="course_name"
                        id="course_name_CO13RT58I93"
                        value="English for IBA-MBA Admission Preparation">
                    <input type="hidden" name="slug" id="slug_CO13RT58I93"
                        value="english-for-iba-mba-admission-preparation">
                    <input type="hidden" name="qty" id="qty" value="1">
                    <input type="hidden" name="price"
                        id="price_CO13RT58I93"
                        value="1050">
                    <input type="hidden" name="old_price"
                        id="old_price_CO13RT58I93"
                        value="1500">
                    <input type="hidden" name="picture"
                        id="picture_CO13RT58I93"
                        value="assets/uploads/course/Thumb1699870830-f-IBA-MBA-English-thumbnail.html">
                    <input type="hidden" name="is_course_type" id="iscourse_type" value="0">
                    <input type="hidden" name="affiliator_id" id="affiliator_id" value="">
                    <input type="hidden" name="course_price" id="course_price"
                        value="1050">
                    <input type="hidden" name="student_discount" id="student_discount" value="">
                    @php
                        $check_course = 0;
                        if(auth()->check()){
                            $save = \App\Models\CourseParticipant::where('course_id',$course->id)->where('user_id',auth()->user()->id)->first();
                            if($save){
                                $check_course = 1;
                            }
                        }
                    @endphp

             @if ($check_course == 0)
                <div class="col-6 col-sm-auto text-center">
                    <div class="price-area d-xl-flex align-items-xl-center justify-content-xl-center text-center text-xl-start">
                        @if($course->discount > 0)
                          @if ($course->discounttype=="0")
                            @php
                              $new_price=$course->fee -($course->fee *$course->discount/100);
                            @endphp
                            <div class="purchase-price fs-2">
                                <div class="main-price align-items-center d-flex">
                                    <span class="currency fs-5 fw-semi-bold mt-0"> </span>
                                    <span class="fw-bold ms-1">{{  format_price(@$new_price) }}</span>
                                </div>
                            </div>
                            <div class="product-price ms-2">
                                <del class="prev-price"><span class="hidden position-absolute overflow-hidden">Previous price</span>{{ format_price($course->fee) }}</del>
                            </div>
                          @else
                             @php
                              $new_price=$course->fee - $course->discount;
                            @endphp
                            <div class="purchase-price fs-2">
                                <div class="main-price align-items-center d-flex">
                                    <span class="currency fs-5 fw-semi-bold mt-0"> </span>
                                    <span class="fw-bold ms-1">{{ format_price(@$new_price) }}</span>
                                </div>
                            </div>
                            <div class="product-price ms-2">
                                <del class="prev-price"><span class="hidden position-absolute overflow-hidden">Previous price</span>{{ format_price($course->fee) }}</del>
                            </div>
                            @endif
                        @else
                        <div class="purchase-price fs-2">
                            <div class="main-price align-items-center d-flex">
                                <span class="currency fs-5 fw-semi-bold mt-0"> </span>
                                <span class="fw-bold ms-1">{{ format_price($course->fee) }}</span>
                            </div>
                        </div>
                        @endif
                    </div>

                        <!-- <button type="button" onclick="addtocart('')"
                            class="btn btn-light btn-lg fw-medium text-navy-blue w-100">Purchase</button> -->
                        <!-- <small class="d-block mt-1">get lifetime access of this course </small> -->
                         <button type="button" class="btn btn-light btn-lg fw-medium text-navy-blue w-100 addcart" CarId="{{ $course->id }}">
                            Add To Cart
                         </button>

                </div>
             @endif



             </div>
            </div>
        </div>
    </div>
</div>
<!--End Course Preview Header-->
<!-- Navigation-->
<!-- navbar_top  -->
<div class="bg-dark-cerulean sticky-nav" id="secNavbar">
    <div class="container-lg">
        <ul class="nav" id="navbarResponsive">
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger overview_txt active" href="#overview">
                    Overview                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger prerequisites_txt" href="#preRequisites">
                    Pre-requisites                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger outcome_txt" href="#learnings">
                    Outcome                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger lessons_txt" href="#lessons">
                    Lessons                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger ins_txt" href="#instructor">
                Instructor                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger review_txt" href="#reviews">
                    Reviews                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger student_work_txt" href="#studentWork">
                    Student Work                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger faq_txt" href="#faq">
                    F.A.Q                </a>
            </li>
            <li class="nav-item ms-auto">
                            </li>
        </ul>
    </div>
</div>
<div class="bg-alice-blue pt-5">
    <div class="container-lg">
        <div class="row">
            <div class="col-md-8 sticky-content">
                <!--Start card-->
                <div class="card border-0 rounded-0 shadow-sm mb-3 page-section" id="overview">
                    <div class="card-body p-4 p-xl-5">
                        <!--Start Section Header-->
                        <div class="section-header mb-4 position-relative">
                            <h4 class="h5 about_this_course" style="color: var(--text_color)">About this Course</h4>
                            <div class="section-header_divider"></div>
                        </div>
                        <!--End Section Header-->
                        <div style="text-align: justify; color:var(--text_color)" class="text_ellipse2 mb-2 moreText">
                            {!! @$course->about !!}
                        </div>
                        <button onclick="showhide()" class=" read_more_txt btn btn-primary" style="color:white"id="toggle"> Read More</button>
                        {{-- <button onclick="showhide()" class="border-0 fw-semi-bold p-0 text-dark-cerulean read_more_txt"
                            id="toggle">
                          Read More
                       </button> --}}
                    </div>
                </div>
                <!--End card-->
                <!--Start Card-->
                <div class="card border-0 rounded-0 shadow-sm mb-3 page-section" id="preRequisites">
                    <div class="card-body p-4 p-xl-5">
                        <!--Start Section Header-->
                        <div class="section-header mb-4 position-relative">
                            <h4 class="h5 prerequisites_txt" style="color: var(--text_color)">
                                Pre Requisites
                            </h4>
                            <div class="section-header_divider"></div>
                        </div>
                        <!--End Section Header-->
                        <div class="row">
                          @foreach (@$course->courserequisites as $courserequisite)
                            <div class="col-sm-6 col-md-6">
                                <p class="benifit-checked" style="color: var(--text_color)"><i class="fas fa-check" style="color: var(--text_color)"> </i>
                                   {{$courserequisite->name}}
                                </p>
                            </div>
                          @endforeach

                         </div>
                    </div>
                </div>

                <!--End card-->
                <!--Start card-->
                <div class="card border-0 rounded-0 shadow-sm mb-3 page-section" id="learnings">
                    <div class="card-body p-4 p-xl-5" style="color: var(--text_color)">
                        <!--Start Section Header-->
                        <div class="section-header mb-4 position-relative">
                            <h4 class="h5 what_will_i_learn_txt">What Will I Learn?</h4>
                            <div class="section-header_divider"></div>
                        </div>
                        <!--End Section Header-->
                        <div class="row">
                            @foreach (@$course->courselearns as $courselearn)
                            <div class="col-sm-6 col-md-6">
                                <p class="benifit-checked"><i class="fas fa-check" style="color: var(--text_color)"></i>{{ @$courselearn->name }}</p>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <!--End card-->
                <!--Start card-->

                <div class="card border-0 rounded-0 shadow-sm mb-3 page-section" id="lessons">
                    <div class="card-body p-4 p-xl-5">
                        @php
                            $i=1;
                            $j=1;
                            $sum=0;
                        @endphp
                        @foreach ($course->courselessons as $courselesson)
                        @php
                            $sum += @$courselesson->courselessonvideos->count();
                        @endphp
                        @endforeach
                        <!--Start Section Header-->
                        <div class="section-header mb-4 position-relative" style="color: var(--text_color)">
                            <h4 class="h5 topics_for_this_course">
                                Topics for this course <span class="h5 float-end">{{ $sum }} Lessons<span>
                            </h4>
                            <div class="section-header_divider"></div>
                        </div>
                        <!--End Section Header-->

                        <div class="accordion course-content_accordion topics-accordion" id="CourseContent">
                            @php
                                $course_count=0;
                            @endphp
                           @foreach ($course->courselessons as $key=>$courselesson)

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="PanelHeadingOne">
                                    <button
                                        class="accordion-button "
                                        type="button" data-bs-toggle="collapse"
                                        data-bs-target="#section_{{ $key }}"
                                        aria-expanded="true"
                                        aria-controls="section_{{ $key }}">
                                        <span>{{ $i++ }}&nbsp;-&nbsp; {{ @$courselesson->capter_name }}</span>
                                        <span class="lesson-time ms-auto"><span>{{ @$courselesson->courselessonvideos->count() }} Lessons</span>&nbsp;•&nbsp;<span>{{ @$courselesson->courselessonvideos->sum('video_time') }} </span></span>
                                    </button>

                                </h2>
                                <div id="section_{{ $key }}" class="accordion-collapse collapse @if( $key == 0)show @endif" aria-labelledby="PanelHeadingOne">
                                    <div class="accordion-body accordion-body py-3 px-4 px-md-0 px-lg-4">
                                        <div class="accordion course-content_accordion--sub" id="accordionPanelsStayOpenExample">
                                            @foreach ($courselesson->courselessonvideos as $courselessonvideo)

                                            <div class="accordion-item border-0">
                                                <div class="d-flex mb-3 mb-md-2 mb-lg-3"><span> {{ $j++ }}.&nbsp;</span>
                                                    <div class="flex-shrink-1 me-3 me-md-2 me-lg-3">
                                                        <i data-feather="play-circle" class="accordion-icon"></i>
                                                    </div>
                                                    <div class="w-100">
                                                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                                            <button
                                                                class="accordion-button fs-13 text-muted fw-normal pt-1 pb-0 px-0 collapsed"
                                                                type="button">
                                                                 <a href="javascript:void(0)" >{{ $courselessonvideo->lesson_name }}</a>

                                                                <span class="course-duration ms-auto">
                                                                    @if($course_count == 0)
                                                                        @if(auth()->check())
                                                                            {{-- here course check --}}
                                                                            @if($check_course == 1)
                                                                                <a href="{{ @$courselessonvideo->lesson_video  }}" class="popup-youtube">Watch Course</a>
                                                                            @else
                                                                                <a href="{{ @$courselessonvideo->lesson_video  }}" class="popup-youtube">Free Preview</a>
                                                                            @endif
                                                                        @else
                                                                            <a href="{{ @$courselessonvideo->lesson_video  }}" class="popup-youtube">Free Preview</a>
                                                                        @endif

                                                                    @else
                                                                        @if(auth()->check())
                                                                            {{-- here course check --}}
                                                                            @if($check_course == 1)
                                                                            <a href="{{ @$courselessonvideo->lesson_video  }}" class="popup-youtube">Watch Course</a>
                                                                            @endif
                                                                        @endif
                                                                    @endif

                                                                {{-- <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#videoModal"> <u> FREE Preview </u> &nbsp; </a> --}}
                                                                {{ @$courselessonvideo->video_time  }}
                                                                {{-- 00:20:03 --}}
                                                                </span>
                                                            </button>
                                                        </h2>
                                                    </div>

                                                </div>
                                            </div>
                                            @php
                                                $course_count++;
                                            @endphp
                                            @endforeach
                                        </div>

                                    </div>
                                </div>
                            </div>
                           @endforeach


                        </div>

                        <!--Start Course Preview Modal -->
                        <div class="course-preview__modal modal" id="coursePreviewModal" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-body text-white p-4" id="courseinfo">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Course Preview Modal -->
                    </div>
                </div>
                <!--End card-->
                <div class="card border-0 rounded-0 shadow-sm mb-3 page-section">
                    <div class="card-body p-4 p-xl-5">
                        <!-- <div class="container-lg"> -->
                        <!-- <div class="card border-0 shadow-sm rounded-0"> -->
                        <div class="section-header mb-4 position-relative">
                            <h4 class="h5 course_content" style="color: var(--text_color)"> Course Contents</h4>
                            <div class="section-header_divider"></div>
                        </div>
                        <div class="row">
                            <div class="mt-2 d-flex col-md-6" style="color: var(--text_color)">
                                <label for="" class="mb-2 mb-md-0 "><i data-feather="clipboard" class="fs-2 m-1"></i>
                                    {{ @$course->courseresourcefiles->count() }} Courses resource files
                                    @if($check_course == 1)
                                    <a href="{{ route('frontend.course_resource_files_download', $course->id) }}" class="btn btn-primary"><i class="fa fa-solid fa-download"></i></a>
                                    @endif
                                  </label>
                            </div>

                            <div class="mt-2 d-flex col-md-6" style="color: var(--text_color)">
                                <label for="" class=" mb-2 mb-md-0 "><i data-feather="package" class="fs-2 m-1"></i>
                                    {{ @$course->courselessonfiles->count() }} Lesson resource files
                                    @if($check_course == 1)
                                    <a href="{{ route('frontend.course_lesson_files_download', $course->id) }}" class="btn btn-primary"><i class="fa fa-solid fa-download"></i></a>
                                    @endif
                                </label>
                            </div>
                            <div class="mt-2 d-flex col-md-6" style="color: var(--text_color)">
                                <label for="" class=" mb-2 mb-md-0 "><i data-feather="briefcase" class="fs-2 m-1"></i>
                                    {{ @$course->coursequizfiles->count() }} Quiz
                                    @if($check_course == 1)
                                    <a href="{{ route('frontend.course_quiz_files_download', $course->id) }}" class="btn btn-primary"><i class="fa fa-solid fa-download"></i></a>
                                    @endif
                                </label>
                            </div>
                            <div class="mt-2 d-flex col-md-6" style="color: var(--text_color)">
                                <label for="" class="mb-2 mb-md-0 "><i data-feather="film" class="fs-2 m-1"></i>
                                    {{ @$course->courseprojectfiles->count() }} Project
                                    @if($check_course == 1)
                                    <a href="{{ route('frontend.course_project_files_download', $course->id) }}" class="btn btn-primary"><i class="fa fa-solid fa-download"></i></a>
                                    @endif
                                </label>
                            </div>
                        </div>
                        <!-- </div> -->
                        <!-- </div> -->
                    </div>
                </div>
                <!--Start card-->
                <div class="card border-0 rounded-0 shadow-sm mb-3" id="instructor">
                    <div class="card-body p-4 p-xl-5">
                        <!--Start Section Header-->
                        <div class="section-header mb-4 position-relative" style="color: var(--text_color)">
                            <h4 class="h5 meet_your_instructor_txt"> Meet Your Instructor</h4>
                            <div class="section-header_divider"></div>
                        </div>
                        <!--End Section Header-->
                        <div class="avatar d-flex mb-3">
                            <div class="avatar-img me-3">
                                <img src="{{ @$course->teacher->image_show }}"
                                    alt="">
                            </div>
                            <div class="avatar-text">
                                <h5 class="instructor-name mb-1 fs-6">
                                    <a href="{{ route('frontend.course.details',$course->id) }}">{{ @$course->teacher->name }}</a>
                                </h5>

                                <ul class="list-unstyled" style="color: var(--text_color)">
                                    <li class="mb-1"><i class="fas fa-star text-warning me-1"></i>
                                        {{round(@$course->reviews->avg('ratting'))}} Instructor Rating
                                    </li>
                                    <li class="mb-1"><i class="fas fa-award text-warning me-1"></i>
                                        {{round(@$course->reviews->count('ratting'))}}  Reviews</li>
                                    <li class="mb-1"><i class="fas fa-user-graduate text-warning me-1"></i>{{ $students->count() }} Students</li>
                                    <li class="mb-1"><i class="fas fa-book-open text-warning me-1"></i>
                                        {{ $course->where('teacher_id',$course->teacher_id)->count() }}
                                        Courses</li>
                                </ul>
                            </div>
                        </div>
                        <!-- <div class="text_ellipse2 mb-3">
                                                    </div> -->
                            <button class="btn btn-warning btn-sm text-white follow_ins_txt"
                            onclick="studentFollowInstructor('F13V9CFYC16421')">Follow This Instructor</button>
                    </div>
                </div>
                <!--End card-->
            </div>

            @php
                $social_url = \App\Models\Tp_option::where('option_name', 'theme_social_media')->first();
                $dataObj = json_decode($social_url->option_value);
                $name = \App\Models\Tp_option::where('option_name', 'theme_option_header')->first();
            @endphp

            <div class="col-md-4 ps-xl-5 sticky-content">
                <div class="sidebar-block text-white mb-3 p-4" style="background: #171725;">
                    <a href="{{ @$dataObj->facebook }}"
                        style="text-decoration: none; color:#FFC107" target="_blank">
                        <!-- Start Section Header -->
                        <div class="section-header mb-4 position-relative">
                            <h4 class="h5">Join {{  @$name->company_name }} Community</h4>
                            <div class="section-header_divider"></div>
                        </div>
                        <!-- End Section Header -->
                        <!-- Start Tags -->
                        <div class="tags">
                            <span class="tag-link text-white text-decoration-none d-inline-block mb-1 px-3 py-2 bg-prussian-blue"><i
                                    class="fab fa-facebook-f"></i>&nbsp;&nbsp;&nbsp;Facebook</span>
                        </div>
                        <!-- End Tags -->
                    </a>
                </div>

                <div class="sidebar-block text-white mb-3 p-4 position-relative">
                    <div class="bottom-0 end-0 overflow-hidden position-absolute start-0 top-0">
                        <img src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/img/sidebar-bg-01.jpg"
                            class="img-fluid" alt="">
                    </div>
                    <!--Start Section Header-->
                    <div class="section-header mb-4 position-relative">
                        <h4 class="h5" style="color: var(--text_color)"> Language </h4>
                        <div class="section-header_divider"></div>
                    </div>
                    <!--End Section Header-->
                    <div class="d-flex align-items-center mb-3 position-relative">
                        <div class="flex-shrink-0">
                        </div>
                        <div class="flex-grow-1 ms-3 text-left">
                            <!-- <a class="text-white"> -->
                                                        <!-- </a> -->

                         <a  style="color: var(--text_color)">
                            @foreach ($course->courselanguages as $k => $item  )
                                @if ($k == 0)
                                    <li>{{ $item->name}}</li>
                                @else
                                    <li>{{ $item->name}}</li>
                                @endif

                            @endforeach
                        </a>
                        </div>
                    </div>

                </div>



                <div class="sidebar-block text-white mb-3 p-4 position-relative overflow-hidden">
                    <div class="bottom-0 end-0 position-absolute start-0 top-0">
                        <img src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/img/sidebar-bg-01.jpg"
                            class="img-fluid" alt="">
                    </div>
                    <!--Start Section Header-->
                    <div class="mb-4 position-relative section-header">
                        <h4 class="h5" style="color: var(--text_color)">Learner Career Outcomes</h4>
                        <div class="section-header_divider"></div>
                    </div>
                    <!--End Section Header-->
                    <ul class="mb-0 ps-4 position-relative">
                        @foreach ($course->coursecareeroutcomes as $coursecareeroutcome)
                        <li class="mb-1"  style="color: var(--text_color)">
                            <!-- <a href="https:" class="text-white" target="_new"> -->
                            <span>{{ @$coursecareeroutcome->name }}</span>
                            <!-- </a> -->
                        </li>
                        @endforeach
                    </ul>

                </div>
                <div class="sidebar-block bg-midnight-express text-white mb-3 p-4">
                    <!--Start Section Header-->
                    <div class="section-header mb-4 position-relative">
                        <h4 class="h5"  style="color: var(--text_color)"> Skills you will gain</h4>
                        <div class="section-header_divider"></div>
                    </div>
                    <!--End Section Header-->
                    <!--Start Tags-->
                    <div class="tags" style="color: var(--text_color)">
                        <!-- <a href="#" class="tag-link text-white text-decoration-none d-inline-block mb-1 px-3 py-2 "> -->
                      @foreach ($course->courseskills as $courseskill)

                         @if ($courseskill->id % 2==0)
                         <span class="tag-link  text-decoration-none d-inline-block mb-1 px-3 py-2 bg-navy-blue" >{{ $courseskill->name }}</span>
                         @else
                         <span class="tag-link  text-decoration-none d-inline-block mb-1 px-3 py-2 bg-endeavour">{{ $courseskill->name }}</span>
                         @endif

                      @endforeach

                    </div>
                    <!--End Tags-->
                </div>
                <!-- <div class="sidebar-block bg-img text-white mb-3 p-4"
                    data-image-src="">
                   <div class="section-header mb-4 position-relative">
                        <h4 class="h5">Related Resources</h4>
                        <div class="section-header_divider"></div>
                    </div>
                                        <ul class="mb-0 ps-4">
                                                <li class="mb-1">
                            <a href="" class="text-white"
                                target="_new"></a>
                        </li>
                                                                    </ul>
                    <?php// } ?>
                </div> -->

            </div>
        </div>
    </div>
</div>



<!--Start Feedback-->
<!--Start Feedback-->
<div class="bg-alice-blue py-4">
    <div class="container-lg">
        <div class="card border-0 shadow-sm rounded-0" id="reviews">
            <div class="card-body p-4">
                <!--Start Section Header-->
                <div class="section-header mb-4 position-relative">
                    <h4 class="h5 student_feedback_txt" style="color: var(--text_color)">Student Feedback</h4>
                    <div class="section-header_divider"></div>
                </div>

                <!--End Section Header-->
                <div class="row">

                    <div class="col-md-4 col-lg-4 text-center">
                        <div class="d-inline-block px-5 py-4 rating-block rounded-3 shadow text-center">
                            <div class="rating-point mb-3 text-center">
                                <h3 class="display-1 fw-light mb-0 fw-semi-bold">{{round(@$course->reviews->avg('ratting'),1)}}</h3>

                        @php
                        $avg_round = floor($course->reviews->avg('ratting'));
                        @endphp

                        <div class="text-warning">
                            @for ($i=1; $i<=@$avg_round; $i++)
                            <i class="fas fa-star"></i>
                            @endfor
                        </div>

                            </div>
                            <div style="color: var(--text_color)"> Course Ratings</div>
                        </div>
                    </div>

                    <div class="col-md-8 col-lg-8">
                        <table class="table table-borderless mb-0 white-space-nowrap">
                        <tbody>
                          @php
                            @$five_count=@$course->reviews?->where('ratting',5)?->count();
                            @$five_percent = @$five_count > 0 ? ((@$five_count/@$course?->reviews?->count()) * 100) : 0;
                           @endphp
                                <tr>
                                    <td width="70%" class="align-middle">
                                        <div class="rating-percent">
                                            <div class="progress">
                                                <div class="progress-bar bg-warning progress-bar-striped"
                                                    role="progressbar"
                                                     style="width: {{ @$five_percent }}%"
                                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>

                                    <td width="10%" class="align-middle">
                                        <div class="rating-quantity">
                                            <i class="fas fa-star text-warning fs-4"></i>
                                            <i class="fas fa-star text-warning fs-4"></i>
                                            <i class="fas fa-star text-warning fs-4"></i>
                                            <i class="fas fa-star text-warning fs-4"></i>
                                            <i class="fas fa-star text-warning fs-4"></i>
                                        </div>
                                    </td>
                                    <td width="20%" class="align-middle">
                                         <div class="user-rating text-muted">{{ round( @$five_percent),1 }}%</div>
                                    </td>
                                </tr>
                                <tr>
                                    @php
                                    @$four_count=@$course->reviews?->where('ratting',4)?->count();
                                    @$four_percent = @$four_count > 0 ? ((@$four_count/@$course?->reviews?->count()) * 100) : 0;
                                   @endphp
                                    <td width="70%" class="align-middle">
                                        <div class="rating-percent">
                                            <div class="progress">
                                                <div class="progress-bar bg-warning progress-bar-striped"
                                                    role="progressbar"
                                                    style="width: {{ @$four_percent  }}%"
                                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="10%" class="align-middle">
                                        <div class="rating-quantity">
                                            <i class="fas fa-star text-warning fs-4"></i>
                                            <i class="fas fa-star text-warning fs-4"></i>
                                            <i class="fas fa-star text-warning fs-4"></i>
                                            <i class="fas fa-star text-warning fs-4"></i>
                                            <i class="fas fa-star fs-4" style="color:#ffe6ad;"></i>
                                        </div>
                                    </td>
                                    <td width="20%" class="align-middle">
                                        <div class="user-rating text-muted">{{ round( @$four_percent),1 }} % </div>
                                    </td>
                                </tr>
                                <tr>
                                    @php
                                    @$three_count=@$course->reviews?->where('ratting',3)?->count();
                                    @$three_percent = @$three_count > 0 ? ((@$three_count/@$course?->reviews?->count()) * 100) : 0;
                                   @endphp
                                    <td width="70%" class="align-middle">
                                        <div class="rating-percent">
                                            <div class="progress">
                                                <div class="progress-bar bg-warning progress-bar-striped"
                                                    role="progressbar"
                                                    style="width: {{ @$three_percent  }}%"
                                                    aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="10%" class="align-middle">
                                        <div class="rating-quantity">
                                            <i class="fas fa-star text-warning fs-4"></i>
                                            <i class="fas fa-star text-warning fs-4"></i>
                                            <i class="fas fa-star text-warning fs-4"></i>
                                            <i class="fas fa-star fs-4" style="color:#ffe6ad;"></i>
                                            <i class="fas fa-star fs-4" style="color:#ffe6ad;"></i>
                                        </div>
                                    </td>
                                    <td width="20%" class="align-middle">
                                        <div class="user-rating text-muted">{{ round( @$three_percent),1 }}%</div>
                                    </td>
                                </tr>
                                <tr>
                                    @php
                                    @$two_count=@$course->reviews?->where('ratting',2)?->count();
                                    @$two_percent = @$two_count > 0 ? ((@$two_count/@$course?->reviews?->count()) * 100) : 0;
                                   @endphp
                                    <td width="70%" class="align-middle">
                                        <div class="rating-percent">
                                            <div class="progress">
                                                <div class="progress-bar bg-warning progress-bar-striped"
                                                    role="progressbar"
                                                    style="width: {{ @$two_percent  }}%"
                                                    aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="10%" class="align-middle">
                                        <div class="rating-quantity">
                                            <i class="fas fa-star text-warning fs-4"></i>
                                            <i class="fas fa-star text-warning fs-4"></i>
                                            <i class="fas fa-star fs-4 " style="color:#ffe6ad;"></i>
                                            <i class="fas fa-star fs-4 " style="color:#ffe6ad;"></i>
                                            <i class="fas fa-star fs-4 " style="color:#ffe6ad;"></i>
                                        </div>
                                    </td>
                                    <td width="20%" class="align-middle">
                                        <div class="user-rating text-muted">{{ round( @$two_percent),1 }}%</div>
                                    </td>
                                </tr>
                                <tr>

                                 @php
                                    @$one_count=@$course->reviews?->where('ratting',1)?->count();
                                    @$one_percent = @$one_count > 0 ? ((@$one_count/@$course?->reviews?->count()) * 100) : 0;
                                   @endphp

                                    <td width="70%" class="align-middle">
                                        <div class="rating-percent">
                                            <div class="progress">
                                                <div class="progress-bar bg-warning progress-bar-striped"
                                                    role="progressbar"
                                                    style="width: {{ @$one_percent  }}%"
                                                    aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="10%" class="align-middle">
                                        <div class="rating-quantity">
                                            <i class="fas fa-star text-warning fs-4" style="color:#ffe6ad;"></i>
                                            <i class="fas fa-star fs-4" style="color:#ffe6ad;"></i>
                                            <i class="fas fa-star fs-4" style="color:#ffe6ad;"></i>
                                            <i class="fas fa-star fs-4" style="color:#ffe6ad;"></i>
                                            <i class="fas fa-star fs-4" style="color:#ffe6ad;"></i>
                                        </div>
                                    </td>
                                    <td width="20%" class="align-middle">
                                        <div class="user-rating text-muted"> {{ round( @$one_percent),1 }}%</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            @foreach ($course->reviews as $review)
            <div class="card-footer bg-white p-4">
                <div class="row">
                    <div class="col-12 col-sm-auto">
                        <div class="avatar d-flex align-items-center">
                            <div class="avatar-img me-3">
                                <img src="{{ @$review->user->image_show }}"
                                    alt="">
                            </div>
                            <div class="avatar-text">
                                <h5 class="avatar-name mb-1">
                                    <a href="javascript:void(0)" style="color: var(--text_color)">{{ @$review->user->name }}</a>
                                </h5>
                                <div class="avatar-designation" style="color: var(--text_color)">{{ $review->created_at->diffForHumans() }}</div>
                                {{-- <div class="avatar-designation" style="color: var(--text_color)"> {{date('h',strtotime(@$review->created_at))}} hours ago</div> --}}

                               @php
                                $avg_round = $review->ratting;
                                @endphp

                                <div>
                                    @for ($i=1; $i<=$avg_round; $i++)
                                     <i class="fas fa-star text-warning"></i>
                                    @endfor
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3 mt-sm-0" style="color: var(--text_color); margin-left:90px">
                        <p>{!! @$review->comment !!}</p>
                    </div>
                    <div class="col-md-12">
                </div>
            </div>
            </div>
            @endforeach

             {{-- validate start  --}}
             @if(count($errors) > 0)
             @foreach($errors->all() as $error)
                 <div class="alert alert-danger">{{ $error }}</div>
             @endforeach
             <script>
                setTimeout(function(){
                    $('.alert.alert-success').hide();
                }, 1000);
            </script>
             @endif
             {{-- validate End  --}}
             @php
             $check_course = 0;
             if(auth()->check()){
                 $save = \App\Models\CourseParticipant::where('course_id',$course->id)->where('user_id',auth()->user()->id)->first();
                 if($save){
                     $check_course = 1;
                 }
             }
             @endphp

          @if ($check_course)
         <form action="{{ route('frontend.review.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-footer bg-white p-4">
                <div class="row">
                    <div class="col-6 col-sm-auto">
                        <div class="avatar d-flex align-items-center">

                            <div class="avatar-text">
                                <div class="rating-input-block">
                                    <input type="hidden" name="ratting" id="input_rating">
                                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                                    <input type="hidden" value="course" name="type"/>
                                    <i data-rating="1" class="fas fa-star fs-4 input-ratting" style="color:#ffe6ad;"></i>
                                    <i data-rating="2" class="fas fa-star fs-4 input-ratting" style="color:#ffe6ad;"></i>
                                    <i data-rating="3" class="fas fa-star fs-4 input-ratting" style="color:#ffe6ad;"></i>
                                    <i data-rating="4" class="fas fa-star fs-4 input-ratting" style="color:#ffe6ad;"></i>
                                    <i data-rating="5" class="fas fa-star fs-4 input-ratting" style="color:#ffe6ad;"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="input-group">
                        <textarea class="bg-white form-control pe-5 box" name="comment" cols="30" rows="2"></textarea>
                        <button class="btn btn-send end-0 position-absolute px-2 rounded-2" type="submit">
                            <svg width="30" height="34" viewBox="0 0 44 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M41.1669 2L20.0835 20.6558" stroke="#A5A5A5" stroke-width="3.83333"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M41.1669 2L27.7502 35.9204L20.0835 20.6562L2.8335 13.8721L41.1669 2Z"
                                    stroke="#A5A5A5" stroke-width="3.83333" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                    {{-- <button type="submit" class="btn btn-sm btn-info mt-2" style="width: 10px; height:10px">Submit Review</button> --}}


                </div>
            </div>
         </form>
         @endif
       </div>

    </div>
</div>


<!--End Feedback-->
<!--Start Student Work-->
<div class="bg-alice-blue py-4" id="studentWork">
    </div>
<!--End Student Work-->

<!--Start F.A.Q-->
<div class="bg-alice-blue py-4" id="faq">
    </div>
<!--End F.A.Q-->




<div class="bg-alice-blue py-3">
    <div class="container-lg"></div>
</div>



<!--End Instructor Course-->


<div class="bg-alice-blue py-3">
    <div class="container-lg">
        <div class="border-0 rounded-0">

            <div class="d-md-flex align-items-center justify-content-between mb-4">
                <!--Start Section Header-->
                <div class="section-header mb-4 position-relative mb-md-0">
                    <h4 class="related_course_txt" style="color: var(--text_color)">Related Courses</h4>
                    <div class="section-header_divider"></div>
                </div>
                <!--End Section Header-->
            </div>

            <div class="row">
                {{-- <div class="viewe-carousel owl-theme"> --}}
                    <!--Start Course Card-->
                    @foreach ($course->relcourses as $rel_course)
                        @php
                            $rel_course = $rel_course->course;
                        @endphp

                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 hideClass" id="50">
                                    <!--Start Course Card-->
                            <div class="course-card course-card-shadow rounded-6 bg-white position-relative overflow-hidden">
                                <div class="position-relative overflow-hidden bg-prussian-blue">
                                    <!-- <div class="position-relative"> -->
                                    <!--Start Course Image-->
                                    <a href="{{ route('frontend.course.details',$rel_course->id) }}"
                                        class="course-card_img">
                                        <img src="{{ @$rel_course->teacher->image_show }}" class="img-fluid w-100" alt="">
                                    </a>
                                    <!--End Course Image-->
                                    <!--Start items badge-->
                                    <div class="align-items-center top-0 d-flex fs-12 position-absolute px-3 py-2 start-0 text-white w-100 z-index-2">
                                        <span class="badge-new  me-1">
                                            @if ($rel_course->coursetype=='1')
                                            Most Popular
                                            @elseif ($rel_course->coursetype=='0')
                                                    Free
                                            @else
                                                Govt
                                            @endif

                                        </span>
                                        <span class="badge-business" style="color: var(--product_text_color)">
                                            @foreach ($rel_course->courselanguages as $k => $item  )
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


                                    </div>

                                    @if($rel_course->discount > 0)
                                    <span class="px-0 badge m-3 position-absolute start-0 text-white z-index-2 polygon-shape" style="top:25px">
                                        <span class="d-block fs-13 mb-1" style="color: var(--product_text_color)">
                                            @if ($rel_course->discounttype == "0")
                                            Off {{ @$rel_course->discount}}%
                                            @else
                                            Off ${{ @$rel_course->discount}}
                                            @endif
                                        </span>

                                    </span>
                                    @endif
                                    <!--End items badge-->
                                    <!-- </div> -->
                                    <!--Start Course Card Body-->
                                    <div class="bg-prussian-blue course-card_body course_middle px-3 py-2 text-white py-12">
                                        <!--Start Course Title-->
                                        <h3 class="course-card__course--title  mb-0">
                                            <a href="{{ route('frontend.course.details',$rel_course->id) }}"
                                                class="text-decoration-none" style="color: var(--product_text_color)">{{ @$rel_course->name }}</a>
                                        </h3>
                                        <!--End Course Title-->
                                        <div class="course-card__instructor d-flex align-items-center">
                                            <div class="card__instructor--name my-2">
                                                <a class="text-capitalize instructor-name" style="color: var(--product_text_color)"
                                                    href="{{ route('frontend.course.details',$rel_course->id) }}">{{ @$rel_course->teacher->name }}</a>
                                            </div>
                                        </div>
                                        <!--Start Course Hints-->
                                        <table class="course-card__hints table table-borderless table-sm text-white mb-0">
                                            <tbody>
                                                <tr>
                                                    <td width="80" class="ps-0">
                                                        <div class="d-flex align-items-center">
                                                            <div class="course-card__hints--icon me-3">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="bar-custom me-2">
                                                                        <span class="fill"></span>
                                                                        <span></span>
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="course-card__hints--text fs-12 fw-bold" style="color: var(--product_text_color)">{{ @$rel_course->course_level }}</div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-0">
                                                        <div class="d-flex align-items-center">
                                                            <div class="course-card__hints--icon me-3">
                                                                <svg id="document" xmlns="http://www.w3.org/2000/svg"
                                                                    width="17.26" height="14.926" viewBox="0 0 17.26 14.926">
                                                                    <path id="Path_148" data-name="Path 148"
                                                                        d="M16.065,17.081H1.2a1.2,1.2,0,0,0-1.2,1.2V28.364a1.2,1.2,0,0,0,1.2,1.2h8.67l-.262,1.6a.69.69,0,0,0,1.041.75l1.871-.985a.393.393,0,0,1,.248,0l1.871.985a.834.834,0,0,0,.388.1.656.656,0,0,0,.387-.123.726.726,0,0,0,.266-.728l-.262-1.6h.651a1.2,1.2,0,0,0,1.2-1.2V18.277A1.2,1.2,0,0,0,16.065,17.081ZM12.64,27.511a2.084,2.084,0,1,1,2.084-2.084A2.086,2.086,0,0,1,12.64,27.511Zm.6,2.5a1.383,1.383,0,0,0-1.2,0l-1.323.7.42-2.565a3.1,3.1,0,0,0,3.007,0l.164,1v.005l.256,1.56Zm2.994-1.651a.173.173,0,0,1-.171.171h-.819l-.187-1.142s0-.009,0-.013a3.108,3.108,0,1,0-4.831,0l0,.013-.187,1.142H1.2a.173.173,0,0,1-.171-.171V18.277a.173.173,0,0,1,.171-.171H16.065a.173.173,0,0,1,.171.171Z"
                                                                        transform="translate(0 -17.081)" fill="#B5C5DB" />
                                                                    <path id="Path_149" data-name="Path 149"
                                                                        d="M43.246,60.243H31.631a.512.512,0,0,0,0,1.025H43.246a.512.512,0,0,0,0-1.025Z"
                                                                        transform="translate(-28.993 -57.295)" fill="#B5C5DB" />
                                                                    <path id="Path_150" data-name="Path 150"
                                                                        d="M36.55,100.911H31.631a.512.512,0,0,0,0,1.025H36.55a.512.512,0,0,0,0-1.025Z"
                                                                        transform="translate(-28.993 -95.184)" fill="#B5C5DB" />
                                                                </svg>
                                                            </div>
                                                            <div class="course-card__hints--text fs-12 fw-bold" style="color: var(--product_text_color)">
                                                                {{ @$rel_course->organization_name }}                                                                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                        <!--End Course Hints-->
                                        <div class="align-items-center d-flex fs-12 justify-content-between pt-1 text-white w-100">
                                            <div class="d-flex align-items-center">
                                                <div class="course-card__hints--icon me-3">
                                                    <svg id="clock_1_" data-name="clock (1)" xmlns="http://www.w3.org/2000/svg"
                                                        width="16.706" height="16.706" viewBox="0 0 16.706 16.706">
                                                        <path id="Path_13" data-name="Path 13"
                                                            d="M8.353,0a8.353,8.353,0,1,0,8.353,8.353A8.363,8.363,0,0,0,8.353,0Zm0,15.662a7.309,7.309,0,1,1,7.309-7.309,7.317,7.317,0,0,1-7.309,7.309Z"
                                                            fill="#B5C5DB" />
                                                        <path id="Path_14" data-name="Path 14"
                                                            d="M208.838,83.118h-1.044v5.437l3.285,3.285.738-.738-2.979-2.979Z"
                                                            transform="translate(-199.963 -79.985)" fill="#B5C5DB" />
                                                    </svg>
                                                </div>
                                                <div class="course-card__hints--text fs-12 fw-bold" style="color: var(--product_text_color)">{{ $rel_course->course_hours }}</div>
                                            </div>
                                            @php
                                            $students =\App\Models\CourseParticipant::leftJoin('courses','courses.id','course_participants.course_id')
                                            ->where('courses.teacher_id',$rel_course->teacher_id)->get();
                                        @endphp
                                            <div class="course-like d-flex align-items-center">
                                                <i class="fas fa-graduation-cap fs-15 me-1 " style="color:#B5C5DB"></i>
                                                <div class="d-block">
                                                    <div class="reviews fs-12 fw-bold" style="color: var(--product_text_color)">
                                                        {{ $students->count() }}
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Start Star Rating-->
                                            <div class="star-rating__wrap d-flex align-items-center ">
                                                <i class="fas fa-star me-1 text-warning" style="color:#B5C5DB"></i>
                                                <div class="d-block">
                                                    @php
                                                    $avg_round = round($course->reviews->avg('ratting'),1);
                                                    @endphp
                                                    <div class="reviews fs-12 fw-bold" style="color: var(--product_text_color)">{{  $avg_round }} </div>
                                                    {{-- <div class="reviews fs-12 fw-bold text-white">0.0 </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Course Card Body-->

                                    <!--Start Course Card Hover Content-->
                                    <div class="course-card__hover--content"> <img src="{{ @$rel_course->teacher->image_show }}" class="course-card__hover--content___img">
                                        <!--Start Video Icon With Popup Youtube-->
                                        <a class="course-card__hover--content___icon popup-youtube"
                                            href="{{$rel_course->courselessons->count() > 0 ? ($rel_course->courselessons[0]->courselessonvideos->count() >0 ?  $rel_course->courselessons[0]->courselessonvideos[0]->lesson_video : '#') : '#' }}" autoplay>
                                            <img src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/img/Playicon.png"
                                                class="img-fluid" alt="">
                                        </a>
                                                                        <!--End Video Icon With Popup Youtube-->

                                        <h3
                                            class="bottom-0 course-card__hover--content___text d-block fs-15 mb-0 position-absolute text-decoration-none text-white">
                                            <a href="{{ route('frontend.course.details',$rel_course->id) }}"
                                                class="text-decoration-none" style="color: var(--product_text_color)">{{ @$rel_course->name }}</a>
                                        </h3>
                                    </div>
                                    <!--End Card Hover Content-->
                                </div>


                                <div class="course-card_footer g-2 px-3 py-12">

                                    <!-- before purchase  -->
                                    <!-- add to cart  -->
                                    <input type="hidden" name="course_id"
                                        id="course_id_CO08MIYUO91"
                                        value="CO08MIYUO91">
                                    <input type="hidden" name="course_name"
                                        id="course_name_CO08MIYUO91"
                                        value="Math for IBA-MBA Admission Preparation">
                                    <input type="hidden" name="slug"
                                        id="slug_CO08MIYUO91"
                                        value="math-for-iba-mba-admission-preparation">
                                    <input type="hidden" name="qty" id="qty" value="1">
                                    <input type="hidden" name="price"
                                        id="price_CO08MIYUO91"
                                        value="1200">
                                    <input type="hidden" name="old_price"
                                        id="old_price_CO08MIYUO91"
                                        value="2000">
                                    <input type="hidden" name="picture"
                                        id="picture_CO08MIYUO91"
                                        value="assets/uploads/course/Thumb1699774136-f-IBA-MBA-Math-thumbnail.html">
                                    <input type="hidden" name="is_course_type" id="iscourse_type" value="0">
                                    <!-- add to cart  -->

                                    <div class="d-block">
                                        <input type="hidden" class="related_course" value="CO08MIYUO91" id="CO08MIYUO91">


                                        <div class="align-items-center d-flex form-check ps-0">
                                            <input name="course_price_type[{{ @$rel_course->id }}]" class="me-1 change_cart_val @if(Auth::check()) active @endif" style="width:21px;height:21px" course_id="{{ @$rel_course->id }}" id="course_subcribe{{ @$rel_course->id }}" type="radio"  @if (Auth::check() == false) disabled @endif>
                                            <label class="form-check-label fw-bold @if (Auth::check() == false) opa-half @endif course_price_cart" for="course_subcribe{{ @$rel_course->id }}">Subscription</label>
                                        </div>

                                        <div class="form-check d-flex align-items-center ps-0">
                                            <input course_id="{{ $rel_course->id }}" id="course_cart_price{{ $rel_course->id }}" class="me-1 active change_cart_val" name="course_price_type[{{ $rel_course->id }}]" style="width:21px;height:21px" type="radio" checked>
                                            <label
                                                class="align-items-center d-flex form-check-label fw-bold justify-content-between"
                                                style="width:100%"
                                                for="course_cart_price{{ $rel_course->id }}">
                                                <span class="course_price_cart" > Course Price <span class="text-success"></span></span>
                                                <span class="align-items-center d-flex  rounded text-center">


                                                    @if($rel_course->discount > 0)
                                                        @if ($rel_course->discounttype=="0")
                                                            @php
                                                                $new_price=$rel_course->fee -($rel_course->fee *$rel_course->discount/100);
                                                            @endphp
                                                            <span class="d-block fs-16 fw-bold me-2 text-success2"> {{ format_price($new_price)}}</span>
                                                            <del class="fs-12 fw-bold text-muted2">{{ format_price($rel_course->fee) }}</del>
                                                        @else
                                                            @php
                                                                $new_price=$rel_course->fee - $rel_course->discount;
                                                            @endphp
                                                            <span class="d-block fs-16 fw-bold me-2 text-success2"> {{ format_price($new_price)}}</span>
                                                            <del class="fs-12 fw-bold text-muted2">{{ format_price($rel_course->fee)}}</del>
                                                        @endif
                                                    @else
                                                    <span class="d-block fs-16 fw-bold me-2 text-success2"> {{format_price(@$rel_course->fee) }}</span>
                                                    @endif


                                                    {{-- <span class="d-block fs-16 fw-bold me-2 text-success2">BDT{{ $course->discount }}</span> --}}
                                                    {{-- <del class="fs-12 fw-bold text-muted2">{{ $course->fee }}</del> --}}
                                                </span>
                                            </label>
                                        </div>




                                        <div class="d-flex justify-content-between align-items-stretch mt-2"
                                            id="course_purchases_CO08MIYUO91">

                                            <div class="flex-grow-1 me-2 w-sub">
                                                <a href="javascript:void(0);"
                                                    class="btn btn-dark-cerulean w-100 btn-cart-2 fs-14 course_cart_price{{ @$rel_course->id }}"
                                                    id="cart_in_disableCO09ICCG850">
                                                    <span class="shopping me-1 shopping_icon position-relative">
                                                        <img src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/img/cart.png"
                                                            style="width: 14px;">
                                                    </span>
                                                    <span class="text-center w-100 fw-bold fs-13 addcart" CarId="{{ @$rel_course->id }}" style="color: var(--button2_text_color)">
                                                        Add To Cart
                                                    </span>
                                                </a>
                                                <a style="display: none;" href="{{ route('frontend.subscribe_details') }}"
                                                    class="btn btn-dark-cerulean w-100 btn-cart-2 fs-14 course_subcribe{{ @$rel_course->id }}"
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

                                            <div class="flex-grow-1">
                                                <a href="{{ route('frontend.course.details',$rel_course->id) }}"
                                                    class="btn btn-dark-cerulean w-100 btn-details fw-bold fs-13">
                                                    <span class="shopping me-1 shopping_icon position-relative">
                                                        <img class="me-1"
                                                            src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/img/details.png"
                                                            style="width: 14px;">
                                                    </span>
                                                    <span class="text-center w-100 fw-bold fs-13 details_txt" style="color: var(--button2_text_color)">Details</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    @endforeach
                {{-- </div> --}}
            </div>
        </div>
    </div>
</div>



<div class="modal share-modal" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 class="mb-3">Share This Course</h5>
                <!--Start Share Link Input-->
                <!--End Share Link Input-->
                <!--Start Social Share-->
                <ul class="socail-share list-unstyled d-flex mb-0 justify-content-center">
                    <li><a href="https://www.facebook.com/sharer.php?u=https://lead.academy/course-details/CO13RT58I93"
                            target="_blank" class="d-block text-center me-3 text-muted">
                            <div class="socail-share_icon facebook"><i class="fab fa-facebook-f"></i></div>Facebook
                        </a></li>
                    <li><a href="https://twitter.com/share?text=English%20for%20IBA-MBA%20Admission%20Preparation%20&amp;url=https://lead.academy/course-details/CO13RT58I93"
                            target="_blank" class="d-block text-center me-3 text-muted">
                            <div class="socail-share_icon twitter"><i class="fab fa-twitter"></i></div>Twitter
                        </a></li>
                    <li><a href="https://api.whatsapp.com/send?text=[English%20for%20IBA-MBA%20Admission%20Preparation]%20[https://lead.academy/course-details/CO13RT58I93]"
                            class="d-block text-center me-3 text-muted" target="_blank" rel="noopener">
                            <div class="socail-share_icon" style="background-color:#37b546;"><i class="fab fa-whatsapp"
                                    style="color:#fff;"></i></div>WhatsApp
                        </a></li>
                    <li><a href="mailto:?subject=English for IBA-MBA Admission Preparation &body=It is not bad to have the achievement of doing an MBA from IBA in your list of achievements after graduation. You can grab the golden opportunity to work in the world&#39;s leading organizations, and take many steps forward in your career if you complete your post-graduation from IBA. We have brought the course “English for IBA-MBA Admission Preparation” to fulfil your dream of doing an MBA in IBA.

                                This course is designed by analyzing the question pattern of IBA of universities for those who want to &#39;prepare&#39; for the day or evening program of IBA-MBA of DU, JU or other universities at the post-graduation or post-graduation level.
                                PLEASE VISIT THIS LINK:  https://lead.academy/course-details/CO13RT58I93"
                            class="d-block text-center me-3 text-muted">
                            <div class="socail-share_icon envelope"><i class="far fa-envelope"></i></div>Email
                        </a></li>
                    <li>
                        <a href="https://www.facebook.com/dialog/send?link=https://lead.academy/course-details/CO13RT58I93&amp;app_id=311161661010577&amp;redirect_uri=https://lead.academy/course-details/CO13RT58I93"
                            target="_blank" class="fbmsg text-capitalize" style="color: #9ea4a9;">
                            <div class="socail-share_icon" style="background-color: #1976d2;"><i style="color: #fff;"
                                    class="fab fa-facebook-messenger"></i></div>Messenger
                        </a>
                        <!-- https://www.facebook.com/dialog/send?link=https%3A%2F%2Flead.academy&app_id=291494419107518&redirect_uri=https%3A%2F%2Fwww.lead.academy -->
                    </li>
                </ul>
                <!--End Social Share-->
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $(".related_hideClass .related_course").each(function(index) {
        var p_course_id = $(this).attr('id');
        $("#course_subscriptions_" + p_course_id).first().hide();
        $('#course_subscriptions_' + p_course_id).first().removeClass('d-flex');
    });
});

function coursechecedRadios(s) {
    if (!$('#flexRadioDefault21_' + s).is('.checked')) {
        $('#flexRadioDefault21_'  + s).addClass('checked');
        $('#flexRadioDefault21_'  + s).prop('checked', true);
        $('#flexRadioDefault21_'  + s).val("1");

        $('#flexRadioDefault11_' + s).val("0");
        $('#flexRadioDefault11_' + s).removeClass('checked');
        $('#flexRadioDefault11_' + s).prop('checked', false);

        $("#course_subscriptions_" + s).hide();
        $('#course_subscriptions_' + s).removeClass('d-flex');
        $('#course_purchases_' + s).addClass('d-flex');
        $("#course_purchases_" + s).show();
    }

}

function subscriptionchecedRadios(s) {
    if (!$('#flexRadioDefault11_' + s).is('.checked')) {
        $('#flexRadioDefault11_' + s).addClass('checked');
        $('#flexRadioDefault11_' + s).prop('checked', true);
        $('#flexRadioDefault11_' + s).val("1");

        $('#flexRadioDefault21_' + s).val("0");
        $('#flexRadioDefault21_' + s).removeClass('checked');
        $('#flexRadioDefault21_' + s).prop('checked', false);
        $("#course_subscriptions_" + s).show();
        $('#course_subscriptions_' + s).addClass('d-flex');
        $('#course_purchases_' + s).removeClass('d-flex');
        $("#course_purchases_" + s).hide();
    }

}


</script>

<script>
$(document).ready(function() {
    function scrollNav() {
        $('a[href^="#"]').click(function() {
            $(".active").removeClass("active");
            $(this).addClass("active");

            $('html, body').stop().animate({
                scrollTop: $($(this).attr('href')).offset().top - 140
            }, 1000);
            return false;
        });
    }
    scrollNav();

    // Read More
    function showhide() {

        // $("#toggle").click(function(){
        $(".moreText").toggleClass("opened");

        var elem = $("#toggle").text();
        if (elem == "Read More") {
            //Stuff to do when btn is in the read more state
            $("#toggle").text("Read Less");
            // $("#text").slideDown();
        } else {
            //Stuff to do when btn is in the read less state
            $("#toggle").text("Read More");
            // $("#text").slideUp();
        }
        // });

    }
    // showhide();


});

// var $secNavbar = $("#secNavbar"),
//     y_pos = $secNavbar.offset().top,
//     height = $secNavbar.height();

// $(document).scroll(function() {
//     var scrollTop = $(this).scrollTop();

//     if (scrollTop > y_pos + height) {
//         $secNavbar.addClass("navbar-fixed").animate({
//             top: "70px"
//         });
//     } else if (scrollTop <= y_pos) {
//         $secNavbar.removeClass("navbar-fixed").clearQueue().animate({
//             top: "-48px"
//         }, 0);
//     }
// });

// function instructorReplyArea(sl) {
//     $(".replyArea-" + sl).removeClass('d-none');
//     $('.replyAreaBtn-' + sl).addClass('d-none');
// }

// function instructorReplySubmit(sl) {
//     var fd = new FormData();

//     var course_id = $("#course_id").val();
//     var instructor_id = $("#student_id").val();
//     var rating_id = $("#rating_id_" + sl).val();
//     var UserId = $('#UserId').val();
//     var reply = $("#reply_" + sl).val();
//     var csrf_test_name = $("[name=csrf_test_name]").val();
//     if (reply == '') {
//         toastrErrorMsg("Empty field not allow");
//         return false;
//     }

//     var inp = document.getElementById("attachment_"+sl);
//         if (inp.files.length >= 1) {
//             var attachmentSize = $("#attachment_" + sl)[0].files[0].size;
//             if (attachmentSize > 1048576) {
//                 toastrErrorMsg("Try to upload file less than 1MB!");
//                 return false;
//             }
//         }

//     fd.append("course_id", course_id);
//     fd.append("instructor_id", instructor_id);
//     fd.append("rating_id", rating_id);
//     fd.append("UserId", UserId);
//     fd.append("reply", reply);
//     fd.append("attachment", $("#attachment_" + sl)[0].files[0]);
//     fd.append("csrf_test_name", CSRF_TOKEN);
//     $.ajax({
//         url: base_url + "instructor-reply-save",
//         type: "POST",
//         data: fd,
//         enctype: "multipart/form-data",
//         processData: false,
//         contentType: false,
//         success: function(r) {
//             // console.log(r);
//             toastrSuccessMsg(r);
//         },
//     });
// }
</script>
</div>
<!--======== main content close ==========-->
{{-- </div> --}}
@include('Frontend.layouts.parts.news-letter')
@endsection





@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>


//Review start
$('.rating-input-block').on('mouseleave',function(){
    let rm = $($('.input-ratting.active')[0]).attr('data-rating');
    // console.log(rm);
    if(rm == undefined){
        rm =0;
    }
    for(let i= 1;i <=rm;i++){
        $('.input-ratting[data-rating="'+i+'"]').addClass('text-warning');
        $('.input-ratting[data-rating="'+i+'"]').removeClass('btn-grey');
    }

    for(let ram = parseInt(rm)+1;ram <= 5;ram++){
        $('.input-ratting[data-rating="'+ram+'"]').removeClass('text-warning');
        $('.input-ratting[data-rating="'+ram+'"]').addClass('btn-grey');
    }

});
$('.rating-input-block').on('mouseenter',function(){
    console.log("over");
});
$('.input-ratting').on('click',function(){

    $('.input-ratting').not(this).removeClass('active');
    if( $(this).hasClass('active')){
        $('#input_rating').val('');
        $(this).removeClass('active');
    }else{
         $('#input_rating').val( $(this).attr('data-rating'));
        $(this).addClass('active');
    }

})
$('.input-ratting').hover(function() {
    for(let i= 1;i <= $(this).attr('data-rating');i++){
        $('.input-ratting[data-rating="'+i+'"]').addClass('text-warning');
        $('.input-ratting[data-rating="'+i+'"]').removeClass('btn-grey');
    }

    for(let ram = parseInt($(this).attr('data-rating'))+1;ram <= 5;ram++){
        $('.input-ratting[data-rating="'+ram+'"]').removeClass('text-warning');
        $('.input-ratting[data-rating="'+ram+'"]').addClass('btn-grey');
    }
});

//Review end

// Subcripe
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
