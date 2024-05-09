@extends('Frontend.layouts.master-layout')
@section('title','- University Details')
@section('head')

@endsection
@section('main_contend')
@include('Frontend.layouts.parts.header-menu')

<!-- Main content -->
<br>
<br>
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




<input type="hidden" id="university_id" name="university_id" value="CO13RT58I93">
<input type="hidden" id="student_id" name="student_id" value="">
<!--Start university Preview Header-->

<div class="hero-header text-white position-relative bg-img hero2">
    <div class="bottom-0 end-0 position-absolute start-0 top-0" style="z-index: -1">
        <img src="{{ @$university->banner_image_show }}"
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
                        {{-- <a class="university-preview__play---icon d-inline-block popup-youtube"
                href="{{$university->universitylessons->count() > 0 ? ($university->universitylessons[0]->universitylessonvideos->count() >0 ?  $university->universitylessons[0]->universitylessonvideos[0]->lesson_video : '#') : '#' }}">
                <i data-feather="play-circle" class="university-preview__play---icon d-inline-block"></i>
            </a> --}}
                    </div>
        <!--End Video Icon With Popup Youtube-->
                <div class="row align-items-end">
            <div class="col col-title">
                <h1 class="fw-semi-bold mb-3" style="color: var(--product_text_color)"> {{ @$university->title }} </h1>
                <div class="row g-4 align-items-center">
                    <div class="col-auto">
                        <div class="avatar d-flex align-items-center">
                            <div class="avatar-img me-3">
                            <img src="{{ @$university->image_show }}"
                            alt="">
                            </div>
                            <div class="avatar-text">
                                <div class="avatar-designation text-white-50 mb-1 fw-bold ins_txt">
                                                              </div>
                                <h5 class="h6 avatar-name mb-0">
                                    <a href=""
                                      style="color: var(--product_text_color)">
                                        {{ @$university->name }}
                                    </a>
                                </h5>
                                <h5 class="h6 avatar-name mb-0 mt-1">
                                  
                                  <a href=""
                                      style="color: var(--product_text_color)">
                                      {{ @$university->address }}
                                    </a>
                                </h5>
                            </div>
                        </div>
                    </div>


                    <div class="col-auto">

                    </div>
                </div>
            </div>
            <div class="col-md-auto">
                <div class="align-items-end g-3 justify-content-md-end row mt-3 mt-xl-0">
                    <div class="col-sm-auto">
                        <div class="d-md-flex save-share-wrap">
                            <span class="text-center">


                            </span>
                            <a href="https://www.facuniversity.com/sharer.php?u=https://lead.academy/university-details/CO13RT58I93"
                                target="_blank" title="Facuniversity Share" class="text-center ms-md-3"
                                data-bs-toggle="modal" data-bs-target="#shareModal">
                                <i data-feather="share-2" class="share-icon"></i>
                                <div class="share_txt">Share</div>
                            </a>

                        </div>
                    </div>
                    <input type="hidden" name="university_id"
                        id="university_id_CO13RT58I93"
                        value="CO13RT58I93">
                    <input type="hidden" name="university_name"
                        id="university_name_CO13RT58I93"
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
                        value="assets/uploads/university/Thumb1699870830-f-IBA-MBA-English-thumbnail.html">
                    <input type="hidden" name="is_university_type" id="isuniversity_type" value="0">
                    <input type="hidden" name="affiliator_id" id="affiliator_id" value="">
                    <input type="hidden" name="university_price" id="university_price"
                        value="1050">
                    <input type="hidden" name="student_discount" id="student_discount"
                        value="">

                 {{-- @if ($check_university==0)

                <div class="col-6 col-sm-auto text-center">
                    <div class="price-area d-xl-flex align-items-xl-center justify-content-xl-center text-center text-xl-start">
                        @if(@$university->discount > 0)
                          @if ($university->discounttype=="0")
                            @php
                              $new_price=$university->fee -($university->fee *$university->discount/100);
                            @endphp
                            <div class="purchase-price fs-2">
                                <div class="main-price align-items-center d-flex">
                                    <span class="currency fs-5 fw-semi-bold mt-0"> </span>
                                    <span class="fw-bold ms-1">{{  format_price(@$new_price) }}</span>
                                </div>
                            </div>
                            <div class="product-price ms-2">
                                <del class="prev-price"><span class="hidden position-absolute overflow-hidden">Previous price</span>{{ format_price($university->fee) }}</del>
                            </div>
                          @else
                             @php
                              $new_price=$university->fee - $university->discount;
                            @endphp
                            <div class="purchase-price fs-2">
                                <div class="main-price align-items-center d-flex">
                                    <span class="currency fs-5 fw-semi-bold mt-0"> </span>
                                    <span class="fw-bold ms-1">{{ format_price(@$new_price) }}</span>
                                </div>
                            </div>
                            <div class="product-price ms-2">
                                <del class="prev-price"><span class="hidden position-absolute overflow-hidden">Previous price</span>{{ format_price(@$university->fee) }}</del>
                            </div>
                            @endif
                        @else
                        <div class="purchase-price fs-2">
                            <div class="main-price align-items-center d-flex">
                                <span class="currency fs-5 fw-semi-bold mt-0"> </span>
                                <span class="fw-bold ms-1">{{ format_price(@$university->fee) }}</span>
                            </div>
                        </div>

                        @endif
                     </div>

                    <button type="button"
                    class="btn btn-light btn-lg fw-medium text-navy-blue w-100 adduniversitycart" CarId="{{ @$university->id }}">
                    Add To Cart
                    </button>
                </div>
                @endif --}}





             </div>
            </div>
        </div>
    </div>
</div>
<!--End university Preview Header-->
<!-- Navigation-->
<!-- navbar_top  -->
<div class="bg-dark-cerulean sticky-nav" id="secNavbar">
    <div class="container-lg">
        <ul class="nav" id="navbarResponsive">
            
            @if ($university->admissions_process)
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger overview_txt active" href="#overview">
                    Overview                </a>
            </li>
            @endif

            <li class="nav-item">
                <a class="nav-link js-scroll-trigger prerequisites_txt" href="#programs">Programs</a>
            </li>

            @if ($university->accommodation)
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger lessons_txt" href="#accommodation">
                    Accommodation               </a>
            </li>
            @endif

            @if ($university->admissions_process)
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger lessons_txt" href="#admissions">
                  Admissions               </a>
            </li>
            @endif

            @if ($university->universityFAQ->count() > 0)
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger lessons_txt" href="#faq">
                  FAQ               </a>
            </li>
            @endif

            <li class="nav-item">
                <a class="nav-link js-scroll-trigger lessons_txt" href="#reviews">
                  Reviews              </a>
            </li>

        </ul>
    </div>
</div>

<div class="bg-alice-blue pt-5">
    <div class="container-lg">
        <div class="row">
            <div class="col-md-8 sticky-content">
                <!--Start card-->

@if ($university->about)

                <div class="card border-0 rounded-0 shadow-sm mb-3 page-section" id="overview">

                    <div class="card-body p-4 p-xl-5">
                        <!--Start Section Header-->
                        <div class="row">
                            <div class="col-md-10">
                                <div class="section-header  position-relative ">
                                    <h4 class="h5 about_this_university" style="color: var(--text_color)">
                                         About of University
                                    </h4>
                                </div>

                                <div class="section-header_divider ">
                                </div>
                            </div>
                        </div>
                        <!--End Section Header-->
                        <div style="text-align: justify; color:var(--text_color)" class="text_ellipse2 moreText mt-3">
                            {!! @$university->about !!}
                        </div>
                        <button onclick="showhide()" class=" read_more_txt btn btn-primary" style="color:white"id="toggle"> Read More</button>
                    </div>
                </div>

                <!--End card-->
@endif



                <!--Start card-->
                <div class="card border-0 rounded-0 shadow-sm mb-3 page-section" id="programs">

                  <div class="card-body p-4 p-xl-5">
                      <!--Start Section Header-->
                      <div class="row">
                          <div class="col-md-10">
                              <div class="section-header  position-relative ">
                                  <h4 class="h5 about_this_university" style="color: var(--text_color)">
                                    Programs
                                  </h4>
                              </div>

                              <div class="section-header_divider "></div>
                              <a href="{{ route('frontend.university_course_list') }}?university={{ @$university->id }}" class="btn btn-primary mt-3">SHOW SIMILAR PRORGAMS</a>
                          </div>
                      </div>

                     

                  </div>
                </div>
                <!--End card-->





@if ($university->accommodation)
 <!--Start card-->
 <div class="card border-0 rounded-0 shadow-sm mb-3 page-section" id="accommodation">

  <div class="card-body p-4 p-xl-5">
      <!--Start Section Header-->
      <div class="row">
          <div class="col-md-10">
              <div class="section-header  position-relative ">
                  <h4 class="h5 about_this_university" style="color: var(--text_color)">
                    Accommodation
                  </h4>
              </div>

              <div class="section-header_divider ">
              </div>
          </div>
      </div>
      <!--End Section Header-->
      {{-- <div style="text-align: justify; color:var(--text_color)" class=" mt-3">
        {!! @$university->accommodation !!}
      </div> --}}
      

      <div style="text-align: justify; color:var(--text_color)" class="text_ellipse2 moreText2 mt-3">
        {!! @$university->accommodation !!}
      </div>
      <button onclick="showhideT(this)" data-id="2" class=" read_more_txt btn btn-primary" style="color:white"id="toggle2"> Read More</button>
  </div>
</div>


@endif



@if ($university->admissions_process)

                <!--Start card-->
                <div class="card border-0 rounded-0 shadow-sm mb-3 page-section" id="admissions">

                  <div class="card-body p-4 p-xl-5">
                      <!--Start Section Header-->
                      <div class="row">
                          <div class="col-md-10">
                              <div class="section-header  position-relative ">
                                  <h4 class="h5 about_this_university" style="color: var(--text_color)">
                                    Admissions Process 
                                  </h4>
                              </div>

                              <div class="section-header_divider ">
                              </div>
                          </div>
                      </div>
                      <!--End Section Header-->
                      <div style="text-align: justify; color:var(--text_color)" class="text_ellipse2 moreText1 mt-3">
                        {!! @$university->admissions_process !!}
                      </div>
                      <button onclick="showhideT(this)" data-id="1" class=" read_more_txt btn btn-primary" style="color:white"id="toggle1"> Read More</button>
                  </div>
              </div>


@endif



@if ($university->universityFAQ->count() > 0)

                <!--Start card-->
                <div class="card border-0 rounded-0 shadow-sm mb-3 page-section" id="faq">

                  <div class="card-body p-4 p-xl-5">
                      <!--Start Section Header-->
                      <div class="row">
                          <div class="col-md-10">
                              <div class="section-header  position-relative ">
                                  <h4 class="h5 about_this_university" style="color: var(--text_color)">
                                    FAQ
                                  </h4>
                              </div>

                              <div class="section-header_divider ">
                              </div>
                          </div>
                      </div>
                      <!--End Section Header-->
                      
                        <div style="text-align: justify; color:var(--text_color)" class="text_ellipse2 moreText5 mt-3">
                            @foreach ($university->universityFAQ as $item)
                            <div class="question-answers p-2">
                                @if ($item->answer)
                                <div class="questions d-flex mb-4">
                                    <span class="d-md-block d-none" style="min-width:100px"><strong>Question:</strong> </span>
                                    <span class="d-md-none d-block"><strong>Q:</strong> </span>
                                    <strong class="userQuestion hide-class"> {{ @$item->question }}</strong>
                                </div>
                                <div class="answer d-flex">
                                    
                                        <span class="d-md-block d-none" style="min-width:100px"><strong>Answer:</strong> </span>
                                        <span class="d-md-none d-block"><strong>A:</strong> </span>
                                            <div class="d-flex flex-column flex-shrink-1">
                                                
                                                <strong class="reply">{{ @$item->answer }}</strong>
                                            
                                                @php
                                                $title = \App\Models\Tp_option::where('option_name', 'theme_option_header')->first();
                                                @endphp
                                        <span class="author">by {{ $title->company_name }} {{ @$item->updated_at->format('d M Y') }}</span>
                            
                                    </div>
                                    
                                </div>
                                @endif
                            </div>
                            @endforeach
                        </div>

                     
                      {{-- <button onclick="showhideT(this)" data-id="5" class=" read_more_txt btn btn-primary" style="color:white"id="toggle5"> Read More</button> --}}
                  </div>
              </div>


@endif

                <!--End card-->







                <!--Start card-->
                <div class="card border-0 rounded-0 shadow-sm mb-3" id="Consultent">
                    <div class="card-body p-4 p-xl-5">
                        <!--Start Section Header-->
                        <div class="section-header mb-4 position-relative" style="color: var(--text_color)">
                            <h4 class="h5 meet_your_instructor_txt"> Meet Your Consultent</h4>
                            <div class="section-header_divider"></div>
                        </div>
                        <!--End Section Header-->
                        <div class="avatar d-flex mb-3">
                            <div class="avatar-img me-3">
                                <img src="{{ @$consultant->image_show }}"
                                    alt="">
                            </div>
                            <div class="avatar-text">
                                <h5 class=" mb-1 fs-6">
                                    <i class="fa fa-solid fa-user"></i> <a href="#"><b>{{ @$consultant->name }}</b></a>
                                    
                                </h5>
                                <h6><i class="fa fa-solid fa-globe"></i>  <b>{{ @$consultant->continents->name }}</b></h6>
                                <h6><i class="fa fa-solid fa-phone"></i> <b>{{ @$consultant->mobile }}</b></h6>
                                <h6><i class="fa fa-solid fa-envelope"></i> <b>{{ @$consultant->email }}</b></h6>
                                {{-- <ul class="list-unstyled" style="color: var(--text_color)">
                                    <li class="mb-1"><i class="fas fa-star text-warning me-1"></i>
                                        {{round(@$course->reviews->avg('ratting'))}} Instructor Rating
                                    </li>
                                    <li class="mb-1"><i class="fas fa-award text-warning me-1"></i>
                                        {{round(@$course->reviews->count('ratting'))}}  Reviews</li>
                                    <li class="mb-1"><i class="fas fa-user-graduate text-warning me-1"></i>{{ $students->count() }} Students</li>
                                    <li class="mb-1"><i class="fas fa-book-open text-warning me-1"></i>
                                        {{ $course->where('teacher_id',$course->teacher_id)->count() }}
                                        Courses</li>
                                </ul> --}}
                            </div>
                        </div>
                        <!-- <div class="text_ellipse2 mb-3">
                                                    </div> -->
                            {{-- <button class="btn btn-warning btn-sm text-white follow_ins_txt">Follow This Consultent</button> --}}
                    </div>
                </div>
                <!--End card-->




            </div>





            <div class="col-md-4 ps-xl-5 sticky-content">
                        @php
                           $com_name = \App\Models\Tp_option::where('option_name', 'theme_option_header')->first();
                           $social_url = \App\Models\Tp_option::where('option_name', 'theme_social_media')->first();
                           $dataObj = json_decode($social_url->option_value);
                        @endphp


                <div class="sidebar-block text-white mb-3 p-4 card card-body" >
                    <div class="card card-body">
                        <a href="{{ route('frontend.university_course_list') }}?university={{ @$university->id }}" class="btn btn-danger">SEE PROGRAMS</a>
                        <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#exampleModal">REQUEST MORE INFO</button>
                    </div>
                </div>












<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Have a Question?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('frontend.question') }}" method="POST">
            @csrf
            <input type="hidden" name="type" value="university"/>
            <input type="hidden" name="university_id" value="{{ $university->id }}"/>
            <div class="modal-body">
                <label class="title">Name</label>
                <br>
                <input type="text" name="name" class="form-control col-md-12" required/>
                <br>
                <label class="title">Email</label>
                <br>
                <input type="email" name="email" class="form-control col-md-12" required/>
                <br>
                <label class="title">Your Question</label>
                <br>
                <textarea type="text" name="question" rows="5" class="form-control col-md-12" required></textarea>
                <br>
                {{-- <label class="title">Message</label>
                <br>
                <textarea type="text" name="message" rows="5" class="form-control col-md-12" required></textarea> --}}
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Ask Question</button>
            </div>
        </form>
      </div>
    </div>
  </div>














                <div class="sidebar-block text-white mb-3 p-4" style="background: #171725;">
                    <a href="{{ @$dataObj->facuniversity }}"
                        style="text-decoration: none; color:#FFC107" target="_blank">
                        <!-- Start Section Header -->

                        <div class="section-header mb-4 position-relative">
                            <h4 class="h5">Join {{ $com_name->company_name }} Community</h4>
                            <div class="section-header_divider"></div>
                        </div>
                        <!-- End Section Header -->
                        <!-- Start Tags -->
                        <div class="tags">
                            <span class="tag-link text-white text-decoration-none d-inline-block mb-1 px-3 py-2 bg-prussian-blue"><i
                                    class="fab fa-facuniversity-f"></i>&nbsp;&nbsp;&nbsp;Facuniversity</span>
                        </div>
                        <!-- End Tags -->
                    </a>
                </div>
                
            </div>


           

        </div>
























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
                              <h3 class="display-1 fw-light mb-0 fw-semi-bold">{{round(@$university->reviews->avg('ratting'),1)}}</h3>

                      @php
                      $avg_round = floor($university->reviews->avg('ratting'));
                      @endphp

                      <div class="text-warning">
                          @for ($i=1; $i<=@$avg_round; $i++)
                          <i class="fas fa-star"></i>
                          @endfor
                      </div>

                          </div>
                          <div style="color: var(--text_color)"> University Ratings</div>
                      </div>
                  </div>

                  <div class="col-md-8 col-lg-8">
                      <table class="table table-borderless mb-0 white-space-nowrap">
                      <tbody>
                        @php
                          @$five_count=@$university->reviews?->where('ratting',5)?->count();
                          @$five_percent = @$five_count > 0 ? ((@$five_count/@$university?->reviews?->count()) * 100) : 0;
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
                                  @$four_percent = @$four_count > 0 ? ((@$four_count/@$university?->reviews?->count()) * 100) : 0;
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
                                  @$three_count=@$university->reviews?->where('ratting',3)?->count();
                                  @$three_percent = @$three_count > 0 ? ((@$three_count/@$university?->reviews?->count()) * 100) : 0;
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
                                  @$two_count=@$university->reviews?->where('ratting',2)?->count();
                                  @$two_percent = @$two_count > 0 ? ((@$two_count/@$university?->reviews?->count()) * 100) : 0;
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
                                  @$one_count=@$university->reviews?->where('ratting',1)?->count();
                                  @$one_percent = @$one_count > 0 ? ((@$one_count/@$university?->reviews?->count()) * 100) : 0;
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

          @foreach ($university->reviews as $review)
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
           {{-- @php
           $check_course = 0;
           if(auth()->check()){
               $save = \App\Models\EbookParticipant::where('ebook_id',$ebook->id)->where('user_id',auth()->user()->id)->first();
               if($save){
                   $check_course = 1;
               }
           }
           @endphp --}}

        {{-- @if ($check_course) --}}
       <form action="{{ route('frontend.review.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="card-footer bg-white p-4">
              <div class="row">
                  <div class="col-6 col-sm-auto">
                      <div class="avatar d-flex align-items-center">
                          <div class="avatar-text">
                              <div class="rating-input-block">
                                  <input type="hidden" name="ratting" id="input_rating">
                                  <input type="hidden" name="university_id" value="{{ $university->id }}">
                                  <input type="hidden" value="university" name="type"/>
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
       {{-- @endif --}}
     </div>

  </div>
</div>
<!--End Feedback-->










{{-- @if ($university->city->university->count() > 0)
    

<div class="col-12 pl-lg-0 pr-lg-0">
  <div class="col p-0">
      <article id="admissions-related-programs" style="margin-bottom: 0;">
          <section class="mdc-card__supporting-text p-0 p-md-3">
              <h3 class="ca-card-title mt-5">Other Universities in {{ @$university->city->name }}</h3>

              <section class="d-lg-flex ">
                  @foreach ($university->city->university->take(3) as $varsity)
                  <div class="col-md-4 col-12 p-0">
                      <div class="card w-sm-auto mr-2 pb-2 mt-1 mb-1 ml-auto mr-auto mr-md-2 ml-md-0">
                          <div class="card-body d-flex pl-2 pr-2 pb-2">
                              <div class="p-0 col-lg-3">
                                  
                                  <img class="" style="width: 60px;height: 60px; background: #fff;padding: 5px;" src="{{ @$varsity->image_show }}" alt="{{ @$varsity->name }}">
                                  
                              </div>
                              <div class="p-0 col-9">
                                  <div class="d-flex justify-content-between">
                                      <div class="justify-content-start w-100 col-7 p-0">
                                          <h3 class="ca-card-title p-0 m-0 ca-card-title-three-lines w-100">
                                              {{ @$varsity->name }}

                                          </h3>

                                      </div>
                                      <div class="col-5 p-0 d-flex align-items-center ">
                                      </div>
                                  </div>
                              </div>

                              <a href="{{ route('frontend.university_details', $varsity->id) }}" class="stretched-link"> </a>


                          </div>
                      </div>
                  </div>
                  @endforeach
                  
                 

                  


              </section>
              
          </section>
      </article>
  </div>
</div>


@endif --}}











    </div>
</div>

<div class="bg-alice-blue py-3">
    <div class="container-lg">
        <div class="border-0 rounded-0">

            <div class="d-md-flex align-items-center justify-content-between mb-4">
                <!--Start Section Header-->
                <div class="section-header mb-4 position-relative mb-md-0">
                    <h4 class="related_course_txt" style="color: var(--text_color)">Related Blog</h4>
                    <div class="section-header_divider"></div>
                </div>
                <!--End Section Header-->
            </div>
          



<div class="row">
            @foreach ($university->blogs as $blog)
							
						
						<div class="col-xl-4 col-md-6" >
							<!--Start Course Card-->
							<div class="course-card rounded bg-white position-relative overflow-hidden shadow-none border">
								<!--Start Course Image-->
								<a href="{{ route('frontend.blog_details', $blog->id) }}" class="course-card_img d-block pt-4 px-4">
									<img src="{{ $blog->image_show }}" class="img-fluid rounded-2 w-100" alt="">
								</a>
								<!--End Course Image-->
								<!--Start Course Card Body-->
								<div class="course-card_body bg-prussian-blue p-4 position-relative m-0 rounded-0 bg-white">
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
</div>

<div class="modal share-modal" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 class="mb-3">Share This university</h5>
                <!--Start Share Link Input-->
                <!--End Share Link Input-->
                <!--Start Social Share-->
                <ul class="socail-share list-unstyled d-flex mb-0 justify-content-center">
                    <li><a href="https://www.facuniversity.com/sharer.php?u=https://lead.academy/university-details/CO13RT58I93"
                            target="_blank" class="d-block text-center me-3 text-muted">
                            <div class="socail-share_icon facuniversity"><i class="fab fa-facuniversity-f"></i></div>Facuniversity
                        </a></li>
                    <li><a href="https://twitter.com/share?text=English%20for%20IBA-MBA%20Admission%20Preparation%20&amp;url=https://lead.academy/university-details/CO13RT58I93"
                            target="_blank" class="d-block text-center me-3 text-muted">
                            <div class="socail-share_icon twitter"><i class="fab fa-twitter"></i></div>Twitter
                        </a></li>
                    <li><a href="https://api.whatsapp.com/send?text=[English%20for%20IBA-MBA%20Admission%20Preparation]%20[https://lead.academy/university-details/CO13RT58I93]"
                            class="d-block text-center me-3 text-muted" target="_blank" rel="noopener">
                            <div class="socail-share_icon" style="background-color:#37b546;"><i class="fab fa-whatsapp"
                                    style="color:#fff;"></i></div>WhatsApp
                        </a></li>
                    <li><a href="mailto:?subject=English for IBA-MBA Admission Preparation &body=It is not bad to have the achievement of doing an MBA from IBA in your list of achievements after graduation. You can grab the golden opportunity to work in the world&#39;s leading organizations, and take many steps forward in your career if you complete your post-graduation from IBA. We have brought the university “English for IBA-MBA Admission Preparation” to fulfil your dream of doing an MBA in IBA.

                                This university is designed by analyzing the question pattern of IBA of universities for those who want to &#39;prepare&#39; for the day or evening program of IBA-MBA of DU, JU or other universities at the post-graduation or post-graduation level.
                                PLEASE VISIT THIS LINK:  https://lead.academy/university-details/CO13RT58I93"
                            class="d-block text-center me-3 text-muted">
                            <div class="socail-share_icon envelope"><i class="far fa-envelope"></i></div>Email
                        </a></li>
                    <li>
                        <a href="https://www.facuniversity.com/dialog/send?link=https://lead.academy/university-details/CO13RT58I93&amp;app_id=311161661010577&amp;redirect_uri=https://lead.academy/university-details/CO13RT58I93"
                            target="_blank" class="fbmsg text-capitalize" style="color: #9ea4a9;">
                            <div class="socail-share_icon" style="background-color: #1976d2;"><i style="color: #fff;"
                                    class="fab fa-facuniversity-messenger"></i></div>Messenger
                        </a>
                        <!-- https://www.facuniversity.com/dialog/send?link=https%3A%2F%2Flead.academy&app_id=291494419107518&redirect_uri=https%3A%2F%2Fwww.lead.academy -->
                    </li>
                </ul>
                <!--End Social Share-->
            </div>
        </div>
    </div>
</div>







  <!-- Bootstrap JS and Popper.js -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>




















<script>
$(document).ready(function() {
    $(".related_hideClass .related_university").each(function(index) {
        var p_university_id = $(this).attr('id');
        $("#university_subscriptions_" + p_university_id).first().hide();
        $('#university_subscriptions_' + p_university_id).first().removeClass('d-flex');
    });
});

function universitychecedRadios(s) {
    if (!$('#flexRadioDefault21_' + s).is('.checked')) {
        $('#flexRadioDefault21_'  + s).addClass('checked');
        $('#flexRadioDefault21_'  + s).prop('checked', true);
        $('#flexRadioDefault21_'  + s).val("1");

        $('#flexRadioDefault11_' + s).val("0");
        $('#flexRadioDefault11_' + s).removeClass('checked');
        $('#flexRadioDefault11_' + s).prop('checked', false);

        $("#university_subscriptions_" + s).hide();
        $('#university_subscriptions_' + s).removeClass('d-flex');
        $('#university_purchases_' + s).addClass('d-flex');
        $("#university_purchases_" + s).show();
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
        $("#university_subscriptions_" + s).show();
        $('#university_subscriptions_' + s).addClass('d-flex');
        $('#university_purchases_' + s).removeClass('d-flex');
        $("#university_purchases_" + s).hide();
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

//     var university_id = $("#university_id").val();
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

//     fd.append("university_id", university_id);
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
    if(this.id == "university_subcribe"+$(this).attr('university_id')){
        $('.university_subcribe'+$(this).attr('university_id')).show();
        $('.university_cart_price'+$(this).attr('university_id')).hide();
    }else{
        $('.university_subcribe'+$(this).attr('university_id')).hide();
        $('.university_cart_price'+$(this).attr('university_id')).show();
    }
    //if($(th)
});



</script>

@endsection
