@extends('Frontend.layouts.master-layout')
@section('title','- E-video Details')
@section('head')
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
@endsection
@section('main_contend')
@include('Frontend.layouts.parts.header-menu')

@php
    $session = \App\Models\Session::where('is_current', 1)->first();
    $sessionId = $session->id;
    $dailyClasses = \App\Models\DailyClass::where('class_id', $class->id)->where('session_id', $sessionId)->paginate(10);
@endphp 

<!-- Main content -->

<div class="content_search" style="margin-top:70px">

<input type="hidden" id="ebook_id" name="ebook_id" value="CO13RT58I93">
<input type="hidden" id="student_id" name="student_id" value="">
<!--Start ebook Preview Header-->

<div class="hero-header text-white position-relative bg-img hero2">
    <div class="bottom-0 end-0 position-absolute start-0 top-0" style="z-index: -1">
        <img src="{{ @$class->image_show }}" alt="" class="img-fluid" style="width: 100%; height: 100%;object-fit: cover">
    </div>
    <div class="container-lg hero-header_wrap position-relative">

        <!--End Video Icon With Popup Youtube-->
        <div class="row align-items-end">
            <div class="col col-title">
                <h1 class="fw-semi-bold mb-3" style="color: var(--product_text_color)"> {{ @$class->name }} </h1>
                <div class="row g-4 align-items-center">
                    <div class="col-auto">
                        <div class="avatar d-flex align-items-center">
                            <div class="avatar-img me-3"> <img src="{{ @$class->teacher->image_show }}" alt=""></div>
                            <div class="avatar-text">
                                <div class="avatar-designation text-white-50 mb-1 fw-bold ins_txt">Class Teacher</div>
                                <h5 class="h6 avatar-name mb-0">
                                    <a href="" style="color: var(--product_text_color)">{{ @$class->teacher->name }}</a>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto"> </div>
                </div>
            </div>
            {{-- <div class="col-md-auto">
                <div class="align-items-end g-3 justify-content-md-end row mt-3 mt-xl-0">
                    <div class="col-sm-auto">
                        <div class="d-md-flex save-share-wrap">
                            <span class="text-center"></span>
                            <a href="https://www.facebook.com/sharer.php?u=https://lead.academy/ebook-details/CO13RT58I93"
                                target="_blank" title="Facebook Share" class="text-center ms-md-3"
                                data-bs-toggle="modal" data-bs-target="#shareModal">
                                <i data-feather="share-2" class="share-icon"></i>
                                <div class="share_txt">Share</div>
                            </a>
                        </div>
                    </div>
                    <input type="hidden" name="ebook_id"
                        id="ebook_id_CO13RT58I93"
                        value="CO13RT58I93">
                    <input type="hidden" name="ebook_name"
                        id="ebook_name_CO13RT58I93"
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
                        value="assets/uploads/ebook/Thumb1699870830-f-IBA-MBA-English-thumbnail.html">
                    <input type="hidden" name="is_ebook_type" id="isebook_type" value="0">
                    <input type="hidden" name="affiliator_id" id="affiliator_id" value="">
                    <input type="hidden" name="ebook_price" id="ebook_price"
                        value="1050">
                    <input type="hidden" name="student_discount" id="student_discount"
                        value="">

                 @if ($check_ebook==0)
                <div class="col-6 col-sm-auto text-center">
                    <div class="price-area d-xl-flex align-items-xl-center justify-content-xl-center text-center text-xl-start">
                        @if(@$ebook->discount > 0)
                          @if ($ebook->discounttype=="0")
                            @php
                              $new_price=$ebook->fee -($ebook->fee *$ebook->discount/100);
                            @endphp
                            <div class="purchase-price fs-2">
                                <div class="main-price align-items-center d-flex">
                                    <span class="currency fs-5 fw-semi-bold mt-0"> </span>
                                    <span class="fw-bold ms-1">{{  format_price(@$new_price) }}</span>
                                </div>
                            </div>
                            <div class="product-price ms-2">
                                <del class="prev-price"><span class="hidden position-absolute overflow-hidden">Previous price</span>{{ format_price($ebook->fee) }}</del>
                            </div>
                          @else
                             @php
                              $new_price=$ebook->fee - $ebook->discount;
                            @endphp
                            <div class="purchase-price fs-2">
                                <div class="main-price align-items-center d-flex">
                                    <span class="currency fs-5 fw-semi-bold mt-0"> </span>
                                    <span class="fw-bold ms-1">{{ format_price(@$new_price) }}</span>
                                </div>
                            </div>
                            <div class="product-price ms-2">
                                <del class="prev-price"><span class="hidden position-absolute overflow-hidden">Previous price</span>{{ format_price(@$ebook->fee) }}</del>
                            </div>
                            @endif
                        @else
                        <div class="purchase-price fs-2">
                            <div class="main-price align-items-center d-flex">
                                <span class="currency fs-5 fw-semi-bold mt-0"> </span>
                                <span class="fw-bold ms-1">{{ format_price(@$ebook->fee) }}</span>
                            </div>
                        </div>

                        @endif
                     </div>

                    <button type="button"
                    class="btn btn-light btn-lg fw-medium text-navy-blue w-100 addebookcart" CarId="{{ @$ebook->id }}">
                    Add To Cart
                    </button>
                </div>
                @endif
             </div>
            </div> --}}
        </div>
    </div>
</div>
<!--End ebook Preview Header-->
<!-- Navigation-->
<!-- navbar_top  -->
<div class="bg-dark-cerulean sticky-nav" id="secNavbar">
    <div class="container-lg">
        <ul class="nav" id="navbarResponsive">
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger overview_txt active" href="#overview"> Class Overview </a>
            </li>
            @if (@$dailyClasses->count() >0)
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger lessons_txt" href="#video">Video</a>
                </li>
            @endif
        </ul>
    </div>
</div>

<div class="bg-alice-blue pt-5">
    <div class="container-lg">
        <div class="row">
            <div class="col-md-12 sticky-content">
                <!--Start card-->
                <div class="card border-0 rounded-0 shadow-sm mb-3 page-section" id="overview">

                    <div class="card-body p-4 p-xl-5">
                        <!--Start Section Header-->
                        <div class="row">
                            <div class="col-md-10">
                                <div class="section-header  position-relative ">
                                    <h4 class="h5 about_this_ebook" style="color: var(--text_color)">Overview</h4>
                                </div>
                                <div class="section-header_divider "></div>
                            </div>
                            {{-- <div class="col-md-2">
                                <a class="btn btn-primary"  data-toggle="modal" data-target="#audio_content"><i class="fa fa-solid fa-microphone"></i> &nbsp; Play</a>
                            </div> --}}
                        </div>
                        {{-- <div class="section-header mb-4 position-relative">
                            <h4 class="h5 about_this_ebook" style="color: var(--text_color)">
                                Short Description
                            </h4>
                            <div class="section-header_divider"></div>
                        </div> --}}

                        {{-- <h4 class="h5 about_this_ebook mt-3" style="color: var(--text_color)">
                           Overview
                        </h4> --}}
                        <!--End Section Header-->
                        <div style="text-align: justify; color:var(--text_color)" class="text_ellipse2 moreText mt-2"> {!! @$class->daily_class_details !!}</div>
                        <button onclick="showhide()" class=" read_more_txt btn btn-primary" style="color:white"id="toggle"> Read More</button>
                    </div>
                </div>

                <!--End card-->

                    <!--Start card-->
                   @if (@$dailyClasses->count() >0)
                        <div class="card border-0 rounded-0 shadow-sm mb-3 page-section" id="video">
                            <div class="card-body p-4 p-xl-5">
                                <div class="text-center"><h4 class=""> <b>Class Video List!</b></h4></div>

                                <div class="col-md-12 mt-5 mb-5" style="border: 1px solid; padding: 10px">
                                    <div class="row">
                                    <div class="col-md-4">
                                        <label class=" form-control-label"><b>Subject Video Search:</b></label>
                                        <select class="form-control form-select" name="subject_id" id="subjectid">
                                            <option value="">Select Subject</option>
                                            @foreach (@$class->subjects as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class=" form-control-label"><b>Form Date:</b></label>
                                        <input type="date"  class="form-control" name="form_date" id="form_date">
                                    </div>
                                    <div class="col-md-4">
                                        <label class=" form-control-label"><b>To Date:</b></label>
                                        <input type="date"  class="form-control" name="to_date" id="to_date">
                                    </div>
                                    </div>
                                </div>
                            
                                <!--End Section Header-->
                                <div class="accordion course-content_accordion topics-accordion" id="CourseContent">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="PanelHeadingOne"></h2>
                                        <div id="section_1" class="accordion-collapse collapse show" aria-labelledby="PanelHeadingOne">
                                            <div class="accordion-body accordion-body py-3 px-4 px-md-0 px-lg-4 ">


                                                <div class="accordion course-content_accordion--sub get-daily-class-search-video_show daily-class-video-show-more" id="accordionPanelsStayOpenExample">
                                                    @foreach ($dailyClasses as $k=> $item)
                                                        <div class="accordion-item border-0">
                                                            <div class="d-flex mb-3 mb-md-2 mb-lg-3">
                                                                <span> &nbsp;</span>
                                                                <div class="flex-shrink-1 me-3 me-md-2 me-lg-3">
                                                                    <i data-feather="play-circle" class="accordion-icon"></i>
                                                                </div>
                                                                <div class="w-100">
                                                                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                                                        <button class="accordion-button fs-13 text-muted fw-normal pt-1 pb-0 px-0 collapsed" type="button">

                                                                            <a href="javascript:void(0)">
                                                                                Teacher Name :{{ @$item->teacher->name }},
                                                                                Subject :{{ @$item->subject->name }},
                                                                                Lession :{{ @$item->lession->name }},
                                                                                Page Number :{{ @$item->page_number }}
                                                                            </a>
                                                                            <span class="course-duration ms-auto">
                                                                                @if (@$item->sub_banner=='1')
                                                                                    <a  data-toggle="modal" data-target="#videoModal{{ $k }}"><u> Play</u> &nbsp;</a>
                                                                                @elseif (@$item->sub_banner=='2')
                                                                                    <a class="course-card__hover--content___icon popup-youtube"  href="{{ @$item->video_url }}" autoplay><u style="margin-left: 893px;"> Play</u> &nbsp;</a>
                                                                                @endif                               
                                                                            </span>
                                                                        </button>
                                                                    </h2>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="videoModal{{ $k }}" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h5 class="modal-title" id="videoModalLabel">{{ $item->name }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                <!-- Embed your video here -->
                                                                
                                                                <video controls height="350px" width="460px">
                                                                    <source src="{{ $item->video_show }}" type="video/mp4" autoplay >
                                                                </video>
                                                                </div>
                                                                <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>

                                                    @endforeach
                                                </div>
                                                
                                                @if($dailyClasses->lastPage() != 1)
                                                    <div class="text-center mt-5">
                                                        <div id="load75">
                                                            <button type="button" id="showMore" onClick="all_course_load('75')"
                                                                class="btn btn-lg btn-dark-cerulean load browse_more_course_txt">
                                                                    Show more <svg class="ms-2" xmlns="http://www.w3.org/2000/svg" width="28.56" height="15.666" viewBox="0 0 28.56 15.666">
                                                                    <path id="right-arrow_3_" data-name="right-arrow (3)"
                                                                        d="M20.727,107.5l-1.272,1.272,5.661,5.661H0v1.8H25.116l-5.661,5.661,1.272,1.272,7.833-7.833Z"
                                                                        transform="translate(0 -107.5)" fill="#fff">
                                                                    </path>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
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
                   @endif
                    <!--End card-->

                <!--End card-->
            </div>
        </div>

        <!--Start Feedback-->
        {{-- <div class="bg-alice-blue py-4">
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
                                        <h3 class="display-1 fw-light mb-0 fw-semi-bold">{{round(@$ebook->reviews->avg('ratting'),1)}}</h3>

                                @php
                                $avg_round = floor($ebook->reviews->avg('ratting'));
                                @endphp

                                <div class="text-warning">
                                    @for ($i=1; $i<=@$avg_round; $i++)
                                    <i class="fas fa-star"></i>
                                    @endfor
                                </div>

                                    </div>
                                    <div style="color: var(--text_color)"> E-Book Ratings</div>
                                </div>
                            </div>

                            <div class="col-md-8 col-lg-8">
                                <table class="table table-borderless mb-0 white-space-nowrap">
                                <tbody>
                                @php
                                    @$five_count=@$ebook->reviews?->where('ratting',5)?->count();
                                    @$five_percent = @$five_count > 0 ? ((@$five_count/@$ebook?->reviews?->count()) * 100) : 0;
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
                                            @$four_count=@$ebook->reviews?->where('ratting',4)?->count();
                                            @$four_percent = @$four_count > 0 ? ((@$four_count/@$ebook?->reviews?->count()) * 100) : 0;
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
                                            @$three_count=@$ebook->reviews?->where('ratting',3)?->count();
                                            @$three_percent = @$three_count > 0 ? ((@$three_count/@$ebook?->reviews?->count()) * 100) : 0;
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
                                            @$two_count=@$ebook->reviews?->where('ratting',2)?->count();
                                            @$two_percent = @$two_count > 0 ? ((@$two_count/@$ebook?->reviews?->count()) * 100) : 0;
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
                                            @$one_count=@$ebook->reviews?->where('ratting',1)?->count();
                                            @$one_percent = @$one_count > 0 ? ((@$one_count/@$ebook?->reviews?->count()) * 100) : 0;
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

                    @foreach ($ebook->reviews as $review)
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

                    @php
                    $check_course = 0;
                    if(auth()->check()){
                        $save = \App\Models\EbookParticipant::where('ebook_id',$ebook->id)->where('user_id',auth()->user()->id)->first();
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
                                            <input type="hidden" name="ebook_id" value="{{ $ebook->id }}">
                                            <input type="hidden" value="ebook" name="type"/>
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
                        


                        </div>
                    </div>
                </form>
                @endif
            </div>

            </div>
        </div> --}}
        <!--End Feedback-->

    </div>
</div>



<!-- Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        $(".related_hideClass .related_ebook").each(function(index) {
            var p_ebook_id = $(this).attr('id');
            $("#ebook_subscriptions_" + p_ebook_id).first().hide();
            $('#ebook_subscriptions_' + p_ebook_id).first().removeClass('d-flex');
        });
    });

    function ebookchecedRadios(s) {
        if (!$('#flexRadioDefault21_' + s).is('.checked')) {
            $('#flexRadioDefault21_'  + s).addClass('checked');
            $('#flexRadioDefault21_'  + s).prop('checked', true);
            $('#flexRadioDefault21_'  + s).val("1");

            $('#flexRadioDefault11_' + s).val("0");
            $('#flexRadioDefault11_' + s).removeClass('checked');
            $('#flexRadioDefault11_' + s).prop('checked', false);

            $("#ebook_subscriptions_" + s).hide();
            $('#ebook_subscriptions_' + s).removeClass('d-flex');
            $('#ebook_purchases_' + s).addClass('d-flex');
            $("#ebook_purchases_" + s).show();
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
            $("#ebook_subscriptions_" + s).show();
            $('#ebook_subscriptions_' + s).addClass('d-flex');
            $('#ebook_purchases_' + s).removeClass('d-flex');
            $("#ebook_purchases_" + s).hide();
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

    var curPageNum = "{{ $dailyClasses->currentPage() }}";
     var lastPage = "{{ $dailyClasses->lastPage() }}";
     let pageN=curPageNum;
   // console.log(department);
    $('#showMore').on('click',function(){
       // console.log(searchval);
        if(parseInt(lastPage) > parseInt(curPageNum)){
            pageN=parseInt(curPageNum)+1;
            let url = '{{ url("get-daily-class-video-show-more") }}?page=' + pageN + '&class_id={{ $class->id }}';
            // let url = '{{ url("get-daily-class-video-show-more") }}' +"?page="+pageN;
            axios.get(url)
            .then(res => {
                // console.log(res);
                curPageNum=parseInt(curPageNum)+1;

                $('.daily-class-video-show-more').append(res.data);
                if(parseInt(lastPage) == parseInt(curPageNum)){
                    $(this).parent().hide();
                }

            });
        }else{
            $(this).parent().hide();
        }

    });

    $(document).ready(function() {
       
        $('#subjectid,#form_date, #to_date').change(function() {
            dailyClassSearchVideo();
        });

        function dailyClassSearchVideo() {
            var subjectId = $('#subjectid').val();
            var classId = {{ $class->id }};
            var formDate = $('#form_date').val();
            var toDate = $('#to_date').val();
            // console.log(subjectId,form_date,to_date)
            console.log(classId);

                $.ajax({
                    url: "{{ route('get.daily_class_video_search') }}",
                    type: 'GET',
                    data: { subject_id: subjectId,form_date: formDate, to_date: toDate,class_id:classId},
                    success: function(response) {
                        console.log(response);
                        $(".get-daily-class-search-video_show").html(response);
                    }
                });
            
        }
    });
</script>



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
    if(this.id == "ebook_subcribe"+$(this).attr('ebook_id')){
        $('.ebook_subcribe'+$(this).attr('ebook_id')).show();
        $('.ebook_cart_price'+$(this).attr('ebook_id')).hide();
    }else{
        $('.ebook_subcribe'+$(this).attr('ebook_id')).hide();
        $('.ebook_cart_price'+$(this).attr('ebook_id')).show();
    }
    //if($(th)
});

</script>

@endsection
