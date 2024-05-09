@extends('Frontend.layouts.master-layout')
@section('title','- Search Results')
@section('head')

@endsection
@section('main_contend')

    {{-- @if($blogs->isEmpty())
    <p>No blogs found with the specified title.</p>
    @else
    <ul>
        @foreach($blogs as $blog)
            <li>{{ $blog->name }}</li>
        @endforeach
    </ul>
    @endif --}}





    <div class="content_search" style="margin-top:70px">
        <div class="bg-alice-blue py-3 py-lg-4">
        <div class="container-lg">
            <!--Start breadcrumb-->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-uppercase mb-3 mb-lg-4">
                    <!-- <li class="breadcrumb-item"><a href="#">Photo &amp; Video</a></li> -->
                    <!-- <li class="breadcrumb-item"><a href="#">Photography</a></li> -->
                    <!-- <li class="breadcrumb-item active" aria-current="page">The Art Of Filmmaking And Editing</li> -->
                </ol>
            </nav>
            <!--End breadcrumb-->

    
                <div class="col-md-12 sticky-content">
                                                    <!--Start Category Banner-->
                    <div class="category-banner text-white p-4 p-sm-5 mb-4 position-relative overflow-hidden">
                        <div class="bottom-0 end-0 position-absolute start-0 top-0">
                            <img src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/img/category-banner-bg.jpg" alt="" class="img-fluid wh-sm-100">
                        </div>
                        <div class="position-relative">
                            <h2 class="fw-semi-bold all_categories_txt">
                                                                             </h2>
                            <p class="mb-0 cat_shot_txt">
                                </p>
                        </div>
                    </div>
               
                    <div id="alldata">
                        <div class="row justify-content-center gx-3 gy-4">
                            <!-- <input type="hidden" value="" id="category_id"> -->
                            @if($courses->isEmpty())
                            <p>No record found with the specified title.</p>
                            @else
                            @foreach ($courses as $course)
                            <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 hideClass" id="50">
                                <!--Start Course Card-->
                                <div
                                    class="course-card course-card-shadow rounded-6 bg-white position-relative overflow-hidden">
                                    <div class="position-relative overflow-hidden bg-prussian-blue">
                                        <!--Start Course Image-->
                                        <a href="course-details/CO09ICCG850.html"
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
                                            <span class="badge-new me-1"> Most Popular</span>
                                            <span class="badge-business">
                                                @foreach ($course->courselanguages as $k => $item  )
                                                @if ($k == 0)
                                                    {{ $item->name}}
                                                @else
                                                    {{ $item->name}}
                                                @endif
                                                @endforeach
                                            </span>
                                            <span id="savecourseCO09ICCG850" class="ms-auto">
                                                    <img onclick="coursesavecheck()"
                                                    src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/img/bookmark-1.png"
                                                    class="img-fluid ms-auto " alt="" style="cursor: pointer;">
                                            </span>
                                        </div>
                                        <span class="px-0 badge m-3 position-absolute start-0 text-white z-index-2 polygon-shape" style="top:25px">
                                            <span class="d-block fs-13 mb-1">Off {{  @$course->fee - (@$course->fee * (@$course->discount / 100)) }} %</span>
                                        </span>
            
                                        <!--Start Course Card Body-->
                                        <div class="bg-prussian-blue course-card_body course_middle px-3 py-2 text-white py-12">
                                            <!--Start Course Title-->
                                            <h3 class="course-card__course--title  mb-0">
                                                <!-- <a href=""
                                                    class="text-decoration-none text-white"></a> -->
                                                    <a href="{{ route('frontend.course.details',$course->id) }}"
                                                            class="text-decoration-none text-white">{{ $course->name }}</a></h3>
                                            <!--End Course Title-->
                                            <div class="course-card__instructor d-flex align-items-center">
                                                <div class="card__instructor--name my-2">
                                                    <a class="text-capitalize instructor-name"
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
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="bar-custom me-2">
                                                                            <span class="fill"></span>
                                                                            <span></span>
                                                                            <span></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="course-card__hints--text fs-12 fw-bold text-white">{{ $course->course_level }}</div>
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
                                                                <div class="course-card__hints--text fs-12 fw-bold text-white">{{ @$site_setting->company_name }}</div>
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
                                                    <div class="course-card__hints--text fs-12 fw-bold text-white">6 hrs 17 min</div>
                                                </div>
                                                <div class="course-like d-flex align-items-center">
                                                    <i class="fas fa-graduation-cap fs-15 me-1 "
                                                        style="color:#B5C5DB"></i>
                                                    <div class="d-block">
                                                        <div class="reviews fs-12 fw-bold text-white">472</div>
                                                    </div>
                                                </div>
            
                                                <!--Start Star Rating-->
                                                <div class="star-rating__wrap d-flex align-items-center ">
                                                    <i class="fas fa-star me-1 text-warning"
                                                        style="color:#B5C5DB"></i>
                                                    <div class="d-block">
                                                        <div class="reviews fs-12 fw-bold text-white">5.0</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End Course Card Body-->
                                        <!--Start Course Card Hover Content-->
                                        <div class="course-card__hover--content">
                                            <img src="{{ $course->image_show }}"
                                                class="course-card__hover--content___img">
                                            <!--Start Video Icon With Popup Youtube-->
            
                                            <a class="course-card__hover--content___icon popup-youtube"
                                                href="https://vimeo.com/817158035"
                                                autoplay>
                                                <img src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/img/Playicon.png"
                                                    class="img-fluid" alt="">
                                            </a>
                                                                                            <!--End Video Icon With Popup Youtube-->
                                            <h3 class="bottom-0 course-card__hover--content___text d-block fs-15 mb-0 position-absolute text-decoration-none text-white">
                                                <!-- <a href=""
                                                    class="text-decoration-none text-white">                                                    </a> -->
                                                <a href="{{ route('frontend.course.details',$course->id) }}"
                                                    class="text-decoration-none text-white">{{ $course->name }}
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
                                                <input class="me-1" style="width:21px;height:21px" type="radio"
                                                    name="flexRadioDefault1_CO09ICCG850"
                                                    id="flexRadioDefault1_CO09ICCG850"
                                                    onclick="subscriptionchecedRadio('CO09ICCG850')"
                                                    disabled>
                                                <label class="form-check-label fw-bold opa-half course_price_cart" for="flexRadioDefault1">Subscription</label>
                                            </div>
                                            <div class="form-check d-flex align-items-center ps-0">
                                                <input class="me-1" style="width:21px;height:21px" type="radio"
                                                    name="flexRadioDefault2_CO09ICCG850"
                                                    id="flexRadioDefault2_CO09ICCG850"
                                                    onclick="coursechecedRadio('CO09ICCG850')"
                                                    checked>
                                                <label
                                                    class="align-items-center d-flex form-check-label fw-bold justify-content-between"
                                                    style="width:100%"
                                                    for="flexRadioDefault2_CO09ICCG850">
                                                    <span class="course_price_cart"> Course Price <span class="text-success"></span></span>
                                                    <span class="align-items-center d-flex  rounded text-center">
                                                        <span class="d-block fs-16 fw-bold me-2 text-success2">BDT{{ $course->discount }}</span>
                                                             <del class="fs-12 fw-bold text-muted2">{{ $course->fee }}</del>
                                                     </span>
                                                </label>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-stretch mt-2">
                                                <div class="flex-grow-1 me-2 w-sub">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-dark-cerulean w-100 btn-cart-2 fs-14 "
                                                        id="cart_in_disableCO09ICCG850">
                                                        <span class="shopping me-1 shopping_icon position-relative">
                                                            <img src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/img/cart.png"
                                                                style="width: 14px;">
                                                        </span>
                                                        <span class="text-center w-100 fw-bold fs-13 addcart" CarId="{{ $course->id }}">
                                                            Add To Cart
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <a href="{{ route('frontend.course.details',$course->id) }}"
                                                        class="btn btn-dark-cerulean w-100 btn-details fw-bold fs-13">
                                                        <span class="shopping me-1 shopping_icon position-relative">
                                                            <img class="me-1"
                                                                src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/img/details.png"
                                                                style="width: 14px;">
                                                        </span>
                                                        <span class="text-center w-100 fw-bold fs-13">Details</span>
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
                            @endif
                           
                        </div>
                                            {{-- <div class="text-center mt-5">
                            <div id="load75">
                                <button type="button" onClick="all_course_load('75')"
                                    class="btn btn-lg btn-dark-cerulean load browse_more_course_txt" id="75">
                                        Browse more Courses                                <svg class="ms-2" xmlns="http://www.w3.org/2000/svg" width="28.56" height="15.666" viewBox="0 0 28.56 15.666">
                                        <path id="right-arrow_3_" data-name="right-arrow (3)"
                                            d="M20.727,107.5l-1.272,1.272,5.661,5.661H0v1.8H25.116l-5.661,5.661,1.272,1.272,7.833-7.833Z"
                                            transform="translate(0 -107.5)" fill="#fff"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                                        </div> --}}
                </div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript">
    ("use strict");
    function all_course_load(ids) {
        var enterprise_shortname = $("#enterprise_shortname").val();
        $.ajax({
            type: "POST",
            url: base_url + enterprise_shortname + "/load-more-allcourse",
            cache: false,
            data: {
                lastid: ids,
                enterprise_shortname: enterprise_shortname,
                csrf_test_name: CSRF_TOKEN,
            },
            success: function(response) {
                $("#alldata").append(response);
                $("#load" + ids).remove();
                $(".removebuton_" + ids).remove();
                $(".hideClass .course").each(function(index) {
                    var p_course_id = $(this).attr('id');
                    $("#course_subscription_" + p_course_id).first().hide();
                    $('#course_subscription_' + p_course_id).first().removeClass('d-flex');
                });
                $(".popup-youtube").YouTubePopUp();
            },
        });
    }
    </script></div>
   
<!--======== main content close ==========-->







@include('Frontend.layouts.parts.news-letter')
@endsection