@extends('user.layouts.master-layout')
@section('head')
@section('title','- My Favorite List')

@endsection
@section('main_content')

    

<!-- Main content -->    

<div class="content_search" >
  <div class="bg-alice-blue py-3 py-lg-4">
  <div class="container-lg">

    <div class="right_section">
      <div>
          <h4><b>My Favorite List</b></h4>
      </div>
  </div>
      <!--Start breadcrumb-->

      <!--End breadcrumb-->
      <div class="row mt-3">
          <div class="col-md-12 sticky-content">
              <div id="alldata">
                  <div class="row justify-content-center gx-3 gy-4">
                    
                @foreach ($saves as $save)

                    @if ($save->course->type == 'university')
                        
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 hideClass" id="50">
                        <!--Start Course Card-->
                        <div class="course-card course-card-shadow rounded-6 bg-white position-relative overflow-hidden">
                            <div class="position-relative overflow-hidden bg-prussian-blue">
                                <!-- <div class="position-relative"> -->
                                <!--Start Course Image-->
                                <a href="{{ route('frontend.university_program_details',$save->course->id) }}"
                                    class="course-card_img">
                                    <img src="{{ @$save->course->university->image_show }}" class="img-fluid w-100" alt="">
                                </a>
                                <!--End Course Image-->
                                <!--Start items badge-->
                                <div class="align-items-center top-0 d-flex fs-12 position-absolute px-3 py-2 start-0 text-white w-100 z-index-2">
                                    <span class="badge-new  me-1">
                                        @if ($save->course->coursetype=='1')
                                        Our Top Picks
                                        @elseif ($save->course->coursetype=='2')
                                        Most Popular
                                        @elseif ($save->course->coursetype=='3')
                                        Fastest Admissions
                                        @elseif ($save->course->coursetype=='4')
                                        Highest Rating
                                        @elseif ($save->course->coursetype=='5')
                                        Top Ranked
                                        @else
                                        @endif

                                    </span>
                                    <span class="badge-business" style="color: var(--product_text_color)">
                                        {{ @$save->course->language->name }}
                                    </span>

                                    @php
                                        $is_save = 0;
                                        if(auth()->check()){
                                            $save = \App\Models\CourseSave::where('course_id',$save->course->id)->where('user_id',auth()->user()->id)->first();
                                            if($save){
                                                $is_save = 1;
                                            }
                                        }
                                    @endphp

                                    <a href="javascript:void(0)" @if($is_save == 1) style="color: #00a662;" @endif class="text-center add-save" c_id="{{ $save->course->id }}">
                                        <i class="far fa-bookmark ml-4" style="cursor: pointer;font-size: 30px;"></i>

                                    </a>


                                </div>

                                @if($save->course->discount > 0)
                                <span class="px-0 badge m-3 position-absolute start-0 text-white z-index-2 polygon-shape" style="top:25px">
                                    <span class="d-block fs-13 mb-1" style="color: var(--product_text_color)">
                                        @if ($save->course->discounttype == "0")
                                        Off {{ @$save->course->discount}}%
                                        @else
                                        Off ${{ @$save->course->discount}}
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
                                        <a href="{{ route('frontend.university_program_details',$save->course->id) }}"
                                            class="text-decoration-none" style="color: var(--product_text_color)">{{ @$save->course->name }}</a>
                                    </h3>
                                    <!--End Course Title-->
                                    <div class="course-card__instructor d-flex align-items-center">
                                        <div class="card__instructor--name my-2">
                                            <a class="text-capitalize instructor-name" style="color: var(--product_text_color)"
                                                href="{{ route('frontend.university_program_details',$save->course->id) }}"></a>
                                        </div>
                                    </div>
                                    <!--Start Course Hints-->
                                    <table class="course-card__hints table table-borderless table-sm text-white mb-0">
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
                                                        <div class="course-card__hints--text fs-12 fw-bold" style="color: var(--product_text_color)">{{ @$save->course->university->name }}</div>
                                                    </div>
                                                </td>
                                            </tr>
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
                                                        <div class="course-card__hints--text fs-12 fw-bold" style="color: var(--product_text_color)">{{ @$save->course->department->name }}</div>
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
                                                        <div class="course-card__hints--text fs-12 fw-bold" style="color: var(--product_text_color)">{{ @$save->course->degree->name }}</div>
                                                    </div>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <!--End Course Hints-->
                                    <div class="align-items-center d-flex fs-12 justify-content-between pt-1 text-white w-100">
                                        {{-- <div class="d-flex align-items-center">
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
                                            <div class="course-card__hints--text fs-12 fw-bold" style="color: var(--product_text_color)">{{ $save->course->course_hours }}</div>
                                        </div> --}}
                                        @php
                                        $students =\App\Models\CourseParticipant::leftJoin('courses','courses.id','course_participants.course_id')
                                        ->where('courses.teacher_id',$save->course->teacher_id)->get();
                                    @endphp
                                        {{-- <div class="course-like d-flex align-items-center">
                                            <i class="fas fa-graduation-cap fs-15 me-1 " style="color:#B5C5DB"></i>
                                            <div class="d-block">
                                                <div class="reviews fs-12 fw-bold" style="color: var(--product_text_color)">
                                                    {{ $students->count() }}
                                                </div>
                                            </div>
                                        </div> --}}

                                        <!--Start Star Rating-->
                                    

                                        <div class="course-like d-flex align-items-center">
                                            <i class="fas fa-graduation-cap fs-20 me-1 mt-1"
                                                style="color:#B5C5DB; "></i>
                                            <div class="d-block">
                                                <div class="reviews fs-12 fw-bold" style="color: var(--product_text_color)">{{ $students->count() }}</div>
                                            </div>
                                        </div>


                                        <!--Start Star Rating-->
                                        <div class="star-rating__wrap d-flex align-items-center mt-1">
                                            <i class="fas fa-star me-1 text-warning"
                                                style="color:#B5C5DB"></i>
                                            <div class="d-block">
                                                @php
                                                $avg_round = round($save->course->reviews->avg('ratting'),1);
                                                @endphp
                                                <div class="reviews fs-12 fw-bold" style="color: var(--product_text_color)">{{$avg_round }}</div>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                                <!--End Course Card Body-->

                                <!--Start Course Card Hover Content-->
                                <div class="course-card__hover--content"> <img src="{{ @$save->course->university->image_show }}" class="course-card__hover--content___img">
                                    <!--Start Video Icon With Popup Youtube-->
                                    <a class="course-card__hover--content___icon popup-youtube"
                                        href="{{ $save->course->trailer_video_url }}">
                                        <img src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/img/Playicon.png"
                                            class="img-fluid" alt="">
                                    </a>
                                                                    <!--End Video Icon With Popup Youtube-->

                                    <h3
                                        class="bottom-0 course-card__hover--content___text d-block fs-15 mb-0 position-absolute text-decoration-none text-white">
                                        <a href="{{ route('frontend.university_program_details',$save->course->id) }}"
                                            class="text-decoration-none" style="color: var(--product_text_color)">{{ @$save->course->name }}</a>
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


                                    {{-- <div class="align-items-center d-flex form-check ps-0">
                                        <input name="course_price_type[{{ @$save->course->id }}]" class="me-1 change_cart_val @if(Auth::check()) active @endif" style="width:21px;height:21px" course_id="{{ @$save->course->id }}" id="course_subcribe{{ @$save->course->id }}" type="radio"  @if (Auth::check() == false) disabled @endif>
                                        <label class="form-check-label fw-bold @if (Auth::check() == false) opa-half @endif course_price_cart" for="course_subcribe{{ @$save->course->id }}">Subscription</label>
                                    </div> --}}

                                    <div class="form-check d-flex align-items-center ps-0">
                                        <input course_id="{{ $save->course->id }}" id="course_cart_price{{ $save->course->id }}" class="me-1 active change_cart_val" name="course_price_type[{{ $save->course->id }}]" style="width:21px;height:21px" type="radio" checked>
                                        <label
                                            class="align-items-center d-flex form-check-label fw-bold justify-content-between"
                                            style="width:100%"
                                            for="course_cart_price{{ $save->course->id }}">
                                            <span class="course_price_cart"> Tuition Fee <span class="text-success"></span></span>
                                            <span class="align-items-center d-flex  rounded text-center">


                                                @if($save->course->discount > 0)
                                                    @if ($save->course->discounttype=="0")
                                                        @php
                                                            $new_price=$save->course->tuition_fee -($save->course->tuition_fee *$save->course->discount/100);
                                                        @endphp
                                                        <span class="d-block fs-16 fw-bold me-2 text-success2"> {{ format_price($new_price)}}</span>
                                                        <del class="fs-12 fw-bold text-muted2">{{ format_price($save->course->tuition_fee) }}</del>
                                                    @else
                                                        @php
                                                            $new_price=$save->course->tuition_fee - $save->course->discount;
                                                        @endphp
                                                        <span class="d-block fs-16 fw-bold me-2 text-success2"> {{ format_price($new_price)}}</span>
                                                        <del class="fs-12 fw-bold text-muted2">{{ format_price($save->course->tuition_fee)}}</del>
                                                    @endif
                                                @else
                                                <span class="d-block fs-16 fw-bold me-2 text-success2"> {{format_price(@$save->course->tuition_fee) }}</span>
                                                @endif


                                                {{-- <span class="d-block fs-16 fw-bold me-2 text-success2">BDT{{ $course->discount }}</span> --}}
                                                {{-- <del class="fs-12 fw-bold text-muted2">{{ $course->fee }}</del> --}}
                                            </span>
                                        </label>
                                    </div>




                                    <div class="d-flex justify-content-between align-items-stretch mt-2"
                                        id="course_purchases_CO08MIYUO91">

                                        {{-- <div class="flex-grow-1 me-2 w-sub">
                                            <a href="javascript:void(0);"
                                                class="btn btn-dark-cerulean w-100 btn-cart-2 fs-14 course_cart_price{{ @$save->course->id }}"
                                                id="cart_in_disableCO09ICCG850">
                                                <span class="shopping me-1 shopping_icon position-relative">
                                                    <img src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/img/cart.png"
                                                        style="width: 14px;">
                                                </span>
                                                <span class="text-center w-100 fw-bold fs-13 addcart" CarId="{{ @$save->course->id }}" style="color: var(--button2_text_color)">
                                                    Add To Cart
                                                </span>
                                            </a>
                                            <a style="display: none;" href="{{ route('frontend.subscribe_details') }}"
                                                class="btn btn-dark-cerulean w-100 btn-cart-2 fs-14 course_subcribe{{ @$save->course->id }}"
                                                >
                                                <span class="shopping me-1 shopping_icon position-relative">
                                                    <img src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/img/cart.png"
                                                        style="width: 14px;">
                                                </span>
                                                <span class="text-center w-100 fw-bold fs-13" style="color: var(--button2_text_color)">
                                                    Get Stared
                                                </span>
                                            </a>
                                        </div> --}}

                                        {{-- <div class="flex-grow-1">
                                            <a href="{{ route('frontend.university_program_details',$save->course->id) }}"
                                                class="btn btn-dark-cerulean w-100 btn-details fw-bold fs-13">
                                                <span class="shopping me-1 shopping_icon position-relative">
                                                    <img class="me-1"
                                                        src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/img/details.png"
                                                        style="width: 14px;">
                                                </span>
                                                <span class="text-center w-100 fw-bold fs-13 details_txt" style="color: var(--button2_text_color)">Details</span>
                                            </a>
                                        </div> --}}






                                        <div class="flex-grow-1">
                                            <a href="{{ route('frontend.university_program_details',$save->course->id) }}"
                                                class="btn btn-dark-cerulean w-100 btn-details fw-bold fs-13">
                                                <span class="shopping me-1 shopping_icon position-relative">
                                                    <img class="me-1"
                                                        src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/img/details.png"
                                                        style="width: 14px;">
                                                </span>
                                                <span class="text-center w-100 fw-bold fs-13" style="color: var(--button2_text_color)">Details</span>
                                            </a>
                                        </div>

                                        <div class="flex-grow-1 me-2 w-sub" style="margin-left: 20px">

                                            <a href="{{ route('apply_cart', $save->course->id) }}"
                                                class="btn btn-dark-cerulean w-100 btn-cart-2 fs-14 ">
                                                <span class="shopping me-1 shopping_icon position-relative">
                                                    <img src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/img/cart.png"
                                                        style="width: 14px;">
                                                </span>
                                                <span class="text-center w-100 fw-bold fs-13" style="color: var(--button2_text_color)!important">
                                                    Apply Now
                                                </span>
                                            </a>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    @elseif(($save->course->type == 'course'))
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 hideClass" id="50">
                            <!--Start Course Card-->
                            <div
                                class="course-card course-card-shadow rounded-6 bg-white position-relative overflow-hidden">
                                <div class="position-relative overflow-hidden bg-prussian-blue">
                                    <!--Start Course Image-->
                                    <a href="{{ route('frontend.course.details',$save->course->id) }}"
                                        class="course-card_img">
                                        <img src="{{ $save->course->teacher->image_show ?? ''}}"
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

                                            @if ($save->course->coursetype=='1')
                                            Most Popular
                                            @elseif ($save->course->coursetype=='0')
                                                Free
                                            @else
                                                Govt
                                            @endif

                                            </span>

                                        <span class="badge-business">
                                            @foreach ($save->course ?->courselanguages as $k => $item  )
                                                @if ($k == 0)
                                                    {{ @$item->name}}
                                                @else
                                                    {{ @$item->name}}
                                                @endif
                                            @endforeach
                                        </span>
                                        @php
                                        $is_save = 0;
                                        if(auth()->check()){
                                            $save = \App\Models\CourseSave::where('course_id',$save->course->id)->where('user_id',auth()->user()->id)->first();
                                            if($save){
                                                $is_save = 1;
                                            }
                                        }
                                        @endphp
                                        <a style="text-align:right" href="javascript:void(0)" @if($is_save == 1) style="color: #00a662;" @endif class="text-center add-save" c_id="{{ $save->course->id }}">
                                            <span id="savecourseCO09ICCG850" class="ms-auto">
                                                <img 
                                                src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/img/bookmark-1.png"
                                                class="img-fluid ms-auto " alt="" style="cursor: pointer;">
                                        </span>
                                        </a>
                                        {{-- <span id="savecourseCO09ICCG850" class="ms-auto">
                                                <img onclick="coursesavecheck()"
                                                src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/img/bookmark-1.png"
                                                class="img-fluid ms-auto " alt="" style="cursor: pointer;">
                                        </span> --}}
                                    </div>
                                    @if($save->course->discount > 0)
                                    <span class="px-0 badge m-3 position-absolute start-0 text-white z-index-2 polygon-shape" style="top:25px">
                                        <span class="d-block fs-13 mb-1">
                                            @if ($save->course->discounttype == "0")
                                            Off {{ @$save->course->discount}}%
                                            @else
                                            Off ${{ @$save->course->discount}}
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
                                                <a href="{{ route('frontend.course.details',$save->course->id) }}"
                                                        class="text-decoration-none text-white">{{ $save->course->name }}</a></h3>
                                        <!--End Course Title-->
                                        <div class="course-card__instructor d-flex align-items-center">
                                            <div class="card__instructor--name my-2">
                                                <a class="text-capitalize instructor-name"
                                                    href="{{ route('frontend.course.details',$save->course->id) }}">{{ @$save->course->teacher->name }}</a>
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
                                                            <div class="course-card__hints--text fs-12 fw-bold text-white">{{ $save->course->course_level }}</div>
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
                                                            <div class="course-card__hints--text fs-12 fw-bold text-white">{{ @$save->course->organization_name }}</div>
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
                                                <div class="course-card__hints--text fs-12 fw-bold text-white">{{ @$save->course->course_hours }}</div>
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
                                                    @php
                                                    $avg_round = round($save->course->reviews->avg('ratting'),1);
                                                    @endphp
                                                    <div class="reviews fs-12 fw-bold text-white">{{$avg_round }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Course Card Body-->
                                    <!--Start Course Card Hover Content-->
                                    <div class="course-card__hover--content">
                                        <img src="{{ $save->course->teacher->image_show ?? ''}}"
                                            class="course-card__hover--content___img">
                                        <!--Start Video Icon With Popup Youtube-->
                                        <a class="course-card__hover--content___icon popup-youtube"
                                        href="{{$save->course->courselessons->count() > 0 ? ($save->course->courselessons[0]->courselessonvideos->count() >0 ?  $save->course->courselessons[0]->courselessonvideos[0]->lesson_video : '#') : '#' }}"
                                        autoplay>
                                        <img src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/img/Playicon.png"
                                            class="img-fluid" alt="">
                                    </a>

                                        <!--End Video Icon With Popup Youtube-->
                                        <h3 class="bottom-0 course-card__hover--content___text d-block fs-15 mb-0 position-absolute text-decoration-none text-white">
                                            <!-- <a href=""
                                                class="text-decoration-none text-white">                                                    </a> -->
                                            <a href="{{ route('frontend.course.details',$save->course->id) }}"
                                                class="text-decoration-none text-white">{{ $save->course->name }}
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
                                            <input class="me-1 active" style="width:21px;height:21px" type="radio" checked>
                                            <label
                                                class="align-items-center d-flex form-check-label fw-bold justify-content-between"
                                                style="width:100%"
                                                for="flexRadioDefault2_CO09ICCG850">
                                                <span class="course_price_cart"> Course Price <span class="text-success"></span></span>
                                                <span class="align-items-center d-flex  rounded text-center">


                                                    @if($save->course->discount > 0)
                                                        @if ($save->course->discounttype=="0")
                                                            @php
                                                                $new_price=$save->course->fee -($save->course->fee *$save->course->discount/100);
                                                            @endphp
                                                            <span class="d-block fs-16 fw-bold me-2 text-success2">BDT {{ $new_price}}</span>
                                                            <del class="fs-12 fw-bold text-muted2">{{ $save->course->fee }}</del>
                                                        @else
                                                            @php
                                                                $new_price=$save->course->fee - $save->course->discount;
                                                            @endphp
                                                            <span class="d-block fs-16 fw-bold me-2 text-success2">BDT {{ $new_price}}</span>
                                                            <del class="fs-12 fw-bold text-muted2">{{ $save->course->fee}}</del>
                                                        @endif
                                                    @else
                                                    <span class="d-block fs-16 fw-bold me-2 text-success2">BDT {{ $save->course->fee }}</span>
                                                    @endif


                                                    {{-- <span class="d-block fs-16 fw-bold me-2 text-success2">BDT{{ $save->course->discount }}</span> --}}
                                                    {{-- <del class="fs-12 fw-bold text-muted2">{{ $save->course->fee }}</del> --}}
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
                                                    <span class="text-center w-100 fw-bold fs-13 addcart" CarId="{{ $save->course->id }}">
                                                        Add To Cart
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="flex-grow-1">
                                                <a href="{{ route('frontend.course.details',$save->course->id) }}"
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
                    @endif
                @endforeach

                      {{-- <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 hideClass"
                          id="93">
                          <!--Start Course Card-->
                          <div
                              class="course-card course-card-shadow rounded-6 bg-white position-relative overflow-hidden">
                              <div class="position-relative overflow-hidden bg-prussian-blue">
                                  <!--Start Course Image-->
                                  <a href="course-details/CO13RT58I93.html"
                                      class="course-card_img">
                                      <img src="{{ asset('public/frontend') }}/assets/uploads/course/Thumb1699870830-f-IBA-MBA-English-thumbnail.png"
                                          class="img-fluid w-100" alt="">
                                  </a>
                                  <!--Start items badge-->
                                  <div class="align-items-center top-0 d-flex fs-12 position-absolute px-3 py-2 start-0 text-white w-100 z-index-2">
                                                                              <span class="badge-new me-1">
                                          New                                        </span>
                                                                              <span class="badge-business">
                                          English   
                                                                             </span>

                                        @php
                                        $is_save = 0;
                                        if(auth()->check()){
                                            $save = \App\Models\CourseSave::where('course_id',$save->course->id)->where('user_id',auth()->user()->id)->first();
                                            if($save){
                                                $is_save = 1;
                                            }
                                        }
        
                                    @endphp                              
                                      <span id="savecourseCO13RT58I93" class="ms-auto">
                                        <img onclick="coursesavecheck()"
                                          src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/img/bookmark-1.png"
                                         class="img-fluid ms-auto " alt="" style="cursor: pointer;">
                                     </span>

                                     
                                  </div>
                                                                      <span class="px-0 badge m-3 position-absolute start-0 text-white z-index-2 polygon-shape" style="top:25px">
                                      <!-- <span class="d-block fs-13 mb-1">Off</span>
                                      <span class="fs-15 fw-bold"></span> -->
                                      <span class="d-block fs-13 mb-1">
                                      off 30%</span>
                                  </span>
                                                                      <!--End items badge-->
                                  <!--End Course Image-->
                                  <!--Start Course Card Body-->
                                  <div class="bg-prussian-blue course-card_body course_middle px-3 py-2 text-white py-12">
                                      <!--Start Course Title-->
                                      <h3 class="course-card__course--title  mb-0">
                                          <!-- <a href=""
                                              class="text-decoration-none text-white"></a> -->
                                          <a href=course-details/CO13RT58I93.html
                                                  class="text-decoration-none text-white">English for IBA-MBA Admission Preparation</a>                                        </h3>
                                      <!--End Course Title-->
                                      <div class="course-card__instructor d-flex align-items-center">
                                          <div class="card__instructor--name my-2">
                                              <a class="text-capitalize instructor-name"
                                                  href="instructor-profile-show/F13V9CFYC16421.html">Zawad Hasan Adib</a>
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
                                                          <div
                                                              class="course-card__hints--text fs-12 fw-bold text-white">
                                                              Beginner Level                                                            </div>
                                                      </div>
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td class="ps-0">
                                                      <div class="d-flex align-items-center">
                                                          <div class="course-card__hints--icon me-3">
                                                              <svg id="document" xmlns="http://www.w3.org/2000/svg"
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
                                                          <div class="course-card__hints--text fs-12 fw-bold text-white">
                                                              Lead Academy                                                            </div>
                                                      </div>
                                                  </td>
                                              </tr>
                                              <!-- <tr>
                                                          <td class="ps-0">
                                                              <div class="d-flex align-items-center">
                                                                  <div class="course-card__hints--icon me-2">
                                                                      <svg id="clock_1_" data-name="clock (1)"
                                                                          xmlns="http://www.w3.org/2000/svg" width="16.706"
                                                                          height="16.706" viewBox="0 0 16.706 16.706">
                                                                          <path id="Path_13" data-name="Path 13"
                                                                              d="M8.353,0a8.353,8.353,0,1,0,8.353,8.353A8.363,8.363,0,0,0,8.353,0Zm0,15.662a7.309,7.309,0,1,1,7.309-7.309,7.317,7.317,0,0,1-7.309,7.309Z"
                                                                              fill="#fff" />
                                                                          <path id="Path_14" data-name="Path 14"
                                                                              d="M208.838,83.118h-1.044v5.437l3.285,3.285.738-.738-2.979-2.979Z"
                                                                              transform="translate(-199.963 -79.985)"
                                                                              fill="#fff" />
                                                                      </svg>
                                                                  </div>
                                                                  <div class="course-card__hints--text">
                                                                   5hr 35m                                                                    </div>
                                                              </div>
                                                          </td>
                                                      </tr> -->
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
                                                          transform="translate(-199.963 -79.985)" fill="#B5C5DB" />
                                                  </svg>
                                              </div>
                                              <div class="course-card__hints--text fs-12 fw-bold text-white">
                                                   5 hrs 35 min                                                
                                                  </div>
                                          </div>
                                          <div class="course-like d-flex align-items-center">
                                              <i class="fas fa-graduation-cap fs-15 me-1 " style="color:#B5C5DB"></i>
                                              <div class="d-block">
                                                  <div class="reviews fs-12 fw-bold text-white">
                                                      0    
                                                  </div>
                                              </div>
                                          </div>

                                          <!--Start Star Rating-->
                                          <div class="star-rating__wrap d-flex align-items-center ">
                                              <i class="fas fa-star me-1 text-warning" style="color:#B5C5DB"></i>
                                              <div class="d-block">
                                                  <div class="reviews fs-12 fw-bold text-white">
                                                      0.0                                                    
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>

                                  <!--End Course Card Body-->
                                  <!--Start Course Card Hover Content-->
                                  <div class="course-card__hover--content">
                                      <img src="{{ asset('public/frontend') }}/assets/uploads/course/Hover1699870830-f-IBA-MBA-English-mini-hover.png"
                                          class="course-card__hover--content___img">
                                      <!--Start Video Icon With Popup Youtube-->
                                      
                                      <a class="course-card__hover--content___icon popup-youtube"
                                          href="https://vimeo.com/883927668"
                                          autoplay>
                                          <img src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/img/Playicon.png"
                                              class="img-fluid" alt="">
                                      </a>
                                                                              <!--End Video Icon With Popup Youtube-->

                                      <h3 class="bottom-0 course-card__hover--content___text d-block fs-15 mb-0 position-absolute text-decoration-none text-white">
                                        
                                          <a href=course-details/CO13RT58I93.html
                                                  class="text-decoration-none text-white">English for IBA-MBA Admission Preparation</a>                                        
                                      </h3>
                                  </div>
                              </div>
                              <div class="course-card_footer g-2 px-3 py-12">
                                                                      <!-- before purchase  -->
                                  <!-- add to cart  -->
                                  <input type="hidden" name="course_id"
                                      id="course_id_CO13RT58I93"
                                      value="CO13RT58I93">
                                  <input type="hidden" name="course_name"
                                      id="course_name_CO13RT58I93"
                                      value="English for IBA-MBA Admission Preparation">
                                  <input type="hidden" name="slug"
                                      id="slug_CO13RT58I93"
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
                                      value="{{ asset('public/frontend') }}/assets/uploads/course/Thumb1699870830-f-IBA-MBA-English-thumbnail.png">
                                  <input type="hidden" name="is_course_type" id="iscourse_type" value="0">
                                  
                                  <input type="hidden" name="affiliator_id" id="affiliator_id" value="">
                                  <input type="hidden" name="course_price" id="course_price" value="1050">
                                  <input type="hidden" name="student_discount" id="student_discount" value="">
                                  <!-- add to cart  -->
                                  <div class="d-block">
                                      <div class="align-items-center d-flex form-check ps-0">
                                          <input class="me-1" style="width:21px;height:21px" type="radio"
                                              name="flexRadioDefault1_CO13RT58I93"
                                              id="flexRadioDefault1_CO13RT58I93"
                                              onclick="subscriptionchecedRadio('CO13RT58I93')"
                                              disabled>
                                          <label class="form-check-label fw-bold opa-half course_price_cart"
                                              for="flexRadioDefault1">
                                              Subscription                                            </label>
                                      </div>
                                      <div class="form-check d-flex align-items-center ps-0">
                                          <input class="me-1" style="width:21px;height:21px" type="radio"
                                              name="flexRadioDefault2_CO13RT58I93"
                                              id="flexRadioDefault2_CO13RT58I93"
                                              onclick="coursechecedRadio('CO13RT58I93')"
                                              checked>
                                          <label
                                              class="align-items-center d-flex form-check-label fw-bold justify-content-between"
                                              style="width:100%"
                                              for="flexRadioDefault2_CO13RT58I93">
                                              <span class="course_price_cart">
                                                  Course Price                                                <span class="text-success"></span>
                                              </span>
                                              <span class="align-items-center d-flex  rounded text-center">
                                                  <span class="d-block fs-16 fw-bold me-2 text-success2">BDT
                                                      1,050</span>
                                                                                                      <del
                                                      class="fs-12 fw-bold text-muted2">1,500</del>
                                                                                                  </span>

                                          </label>
                                      </div>
                                      <div class="d-flex justify-content-between align-items-stretch mt-2">
                                          <div class="flex-grow-1 me-2 w-sub">
                                              <a href="javascript:void(0);"
                                                class="btn btn-dark-cerulean w-100 btn-cart-2 fs-14 "
                                                id="cart_in_disableCO13RT58I93">
                                                <span class="shopping me-1 shopping_icon position-relative">
                                                    <img src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/img/cart.png"
                                                        style="width: 14px;">
                                                </span>
                                                                                                    
                                                <span class="text-center w-100 fw-bold fs-13 addTocart"
                                                    onclick="addtocart('CO13RT58I93')"
                                                    id="cart_in_CO13RT58I93">
                                                    Add To Cart                                                    
                                                </span>
                                            </a>
                                          </div>
                                          <div class="flex-grow-1">
                                              <a href=course-details/CO13RT58I93.html class="btn btn-dark-cerulean w-100 btn-details fw-bold fs-13">
                                                  <span class="shopping me-1 shopping_icon position-relative">
                                                      <img class="me-1" src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/img/details.png" style="width: 14px;">
                                                  </span>
                                                  <span class="text-center w-100 fw-bold fs-13">Details</span>
                                              </a>                                            
                                          </div>
                                      </div>                             
                                    </div>                         
                                  </div>
                              <!--End Course Card-->
                          </div>
                      </div> --}}
                     
                



                    </div>
              </div>
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
<!--======== main content close ==========--><!-- Main content -->    




@endsection
