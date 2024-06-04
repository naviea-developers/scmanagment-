@extends('Frontend.layouts.master-layout')
@section('title','- E-video Details')
@section('head')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-v8FpMN7PZIWiDRfM7czPpOVCKaHcJK4jO3kI+KTO9vMjCExH0EeZ3rAaxiylpDcT" crossorigin="anonymous">

<style>
    /* Additional custom styles */
    .school-name {
      text-align: center;
      margin-bottom: 30px;
    }
    .class-routine {
      margin-bottom: 50px;
    }
    .class-routine table {
      width: 100%;
      border-collapse: collapse;
    }
    .class-routine th, .class-routine td {
      border: 1px solid #ccc;
      padding: 8px;
      text-align: center;
    }
    .class-routine th {
      background-color: #f2f2f2;
    }
  </style>
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

<style>
		
	/* founder and co-funder section */
	.ourteam-section {
		padding-bottom: unset;
	}


	.our-team-title {
		margin-bottom: 15px;
	}
	.our-team-title h2 {
		padding: 0px;
		margin: 0px;
		font-weight: bold;
		border-left: 5px solid var(--header_color);;
		/* border-left: 5px solid #007bff; */
		padding-left: 5px;
		border-radius: 4px;
		font-size: 24px;
	}

	.our-team {
		padding: 30px 0 40px;
		margin-bottom: 30px;
		background-color: #f7f5ec;
		text-align: center;
		overflow: hidden;
		position: relative;
		border: 1px solid var(--header_color);;
		/* border: 1px solid #007bff; */
		border-radius: 8px;
		transition: all 0.4s ease-in 0s;
		cursor: pointer;
	}
	.our-team:hover {
		background: white;
	}
	.our-team .picture {
		display: inline-block;
		height: 130px;
		width: 130px;
		z-index: 1;
		position: relative;
	}

	.our-team .picture::before {
		content: "";
		width: 100%;
		height: 0;
		border-radius: 50%;
		/* background-color: #1369ce; */
		background-color: var(--header_color);
		position: absolute;
		bottom: 135%;
		right: 0;
		left: 0;
		opacity: 0.9;
		transform: scale(3);
		transition: all 0.3s linear 0s;
	}

	.our-team:hover .picture::before {
		height: 100%;
	}

	.our-team .picture::after {
		content: "";
		width: 100%;
		height: 100%;
		border-radius: 50%;
		background-color: var(--header_color);
		/* background-color: #1369ce; */
		position: absolute;
		top: 0;
		left: 0;
		z-index: -1;
	}

	.our-team .picture img {
		width: 100%;
		height: auto;
		border-radius: 50%;
		transform: scale(1);
		transition: all 0.9s ease 0s;
	}

	.our-team:hover .picture img {
		box-shadow: 0 0 0 14px #f7f5ec;
		transform: scale(0.7);
	}

	.our-team .title {
		display: block;
		font-size: 13px;
		color: #4e5052;
		text-transform: capitalize;
	}

	.our-team .social {
		width: 100%;
		padding: 0;
		margin: 0;
		/* background-color: #1369ce; */
		background-color: var(--header_color);
		position: absolute;
		bottom: -100px;
		left: 0;
		transition: all 0.5s ease 0s;
	}

	.our-team:hover .social {
		bottom: 0;
	}

	.our-team .social li {
		display: inline-block;
	}

	.our-team .social li a {
		display: block;
		padding: 10px;
		font-size: 17px;
		color: white;
		transition: all 0.3s ease 0s;
		text-decoration: none;
	}

	.our-team .social li a:hover {
		color: var(--header_color);
		/* color: #1369ce; */
		background-color: #f7f5ec;
	}

	.team-content .name{
		font-size: 18px;
		color: black;
		margin-top: 30px;
	}
	.closeIcon button{
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.closeIcon button span{
		background: #da0b0b;
		padding: 10px;
		border-radius: 50%;
		height: 35px;
		width: 35px;
		position: absolute;
		margin-top: 3px;
		color: white;
		display: flex;
		justify-content: center;
		align-items: center;
	}

</style>

@php
    $session = \App\Models\Session::where('is_current', 1)->first();
    $sessionId = $session->id;
    $classRoutines = \App\Models\ClassRoutine::where('class_id', $class->id)->where('session_id', $sessionId)->get();
    // dd($classRoutines);
    $examinations = \App\Models\Examination::where('session_id', $sessionId)->get();
    // dd($examinations);
    $examSchedules = \App\Models\ExamSchedule::where('class_id', $class->id)
                                            ->whereIn('examination_id', $examinations->pluck('id'))
                                            ->get();
    // dd($examSchedules);
@endphp 


<input type="hidden" id="ebook_id" name="ebook_id" value="CO13RT58I93">
<input type="hidden" id="student_id" name="student_id" value="">
<!--Start ebook Preview Header-->

<div class="hero-header text-white position-relative bg-img hero2">
    <div class="bottom-0 end-0 position-absolute start-0 top-0" style="z-index: -1">
        <img src="{{ @$class->image_show }}"
            alt="" class="img-fluid" style="width: 100%; height: 100%;object-fit: cover">
    </div>
    <div class="container-lg hero-header_wrap position-relative">
        <!--Start Breadcrumb-->
        <!--End Breadcrumb-->
        <!--Start Video Icon With Popup Youtube-->
        <div class="text-center my-3 my-md-5 "></div>
        <!--End Video Icon With Popup Youtube-->
        <div class="row align-items-end">
            <div class="col col-title">
                <h1 class="fw-semi-bold mb-3" style="color: var(--product_text_color)"> {{ @$class->name }} </h1>
                <div class="row g-4 align-items-center">
                    <div class="col-auto">
                        <div class="avatar d-flex align-items-center">
                            <div class="avatar-img me-3">
                            <img src="{{ @$class->teacher->image_show }}"
                            alt="">
                            </div>
                            <div class="avatar-text">
                                <div class="avatar-designation text-white-50 mb-1 fw-bold ins_txt">
                                    By                                </div>
                                <h5 class="h6 avatar-name mb-0">
                                    <a href=""
                                      style="color: var(--product_text_color)">
                                        {{ @$class->teacher->name }}
                                    </a>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto"></div>
                </div>
            </div>
            <div class="col-md-auto">
                <div class="align-items-end g-3 justify-content-md-end row mt-3 mt-xl-0">
                    <div class="col-sm-auto">
                        <div class="d-md-flex save-share-wrap">
                            <span class="text-center"></span>
                            {{-- <a href="https://www.facebook.com/sharer.php?u=https://lead.academy/ebook-details/CO13RT58I93"
                                target="_blank" title="Facebook Share" class="text-center ms-md-3"
                                data-bs-toggle="modal" data-bs-target="#shareModal">
                                <i data-feather="share-2" class="share-icon"></i>
                                <div class="share_txt">Share</div>
                            </a> --}}
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

             </div>
            </div>
        </div>
    </div>
</div>
<!--End ebook Preview Header-->
<!-- Navigation-->
<!-- navbar_top  -->
 

<div class="bg-dark-cerulean sticky-nav" id="secNavbar">
    <div class="container-lg">
        <ul class="nav" id="navbarResponsive">
            @if ($class->count() >0)
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger overview_txt active" href="#overview">Information</a>
                </li>
            @endif

            @if ($class->count() >0)
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger overview_txt" href="#gargent_policy">Gargent Policy</a>
                </li>
            @endif

            @if (@$class->subjects->count() >0)
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger prerequisites_txt" href="#e-class">Subject List</a>
                </li>
            @endif

            @if (@$syllabus->count() >0)
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger lessons_txt" href="#syllabus">Syllabus</a>
                </li>
            @endif
            
            @if (@$class->subjects->count() >0)
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger prerequisites_txt" href="#book-list">Book List</a>
                </li>
            @endif

            @if (@$class->teacherAssents->count() >0)
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger lessons_txt" href="#teacher">Teacher List</a>
                </li>
            @endif

            @if (@$class->examSchedules->count() >0)
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger lessons_txt" href="#exam_list">Exam List</a>
                </li>
            @endif

            @if (@$class->examClasss->count() >0)
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger lessons_txt" href="#exam_type">Exam Type</a>
                </li>
            @endif

            @if (@$classRoutines->count() >0)
            {{-- @if (@$class->ClassRoutines->count() >0) --}}
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger lessons_txt" href="#class_routine">Class Routine</a>
                </li>
            @endif

            {{-- @if (@$class->examSchedules->count() >0) --}}
            @if (@$examSchedules->count() >0)
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger lessons_txt" href="#exam_routine">Exam Routine</a>
                </li>
            @endif
           


        </ul>
    </div>
</div>

<div class="bg-alice-blue pt-5">
    <div class="container-lg">
        <div class="row">
            <div class="col-md-12 sticky-content">
                
                @if ($class->count() >0)
                    <!--Start card-->
                    <div class="card border-0 rounded-0 shadow-sm mb-3 page-section" id="overview">
                        <div class="card-body p-4 p-xl-5">
                            <!--Start Section Header-->
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="section-header  position-relative ">
                                        <h4 class="h5 about_this_ebook" style="color: var(--text_color)">
                                            Information
                                        </h4>
                                    </div>

                                    <div class="section-header_divider ">
                                    </div>
                                </div>
                            </div>
                            <h4 class="h5 about_this_ebook mt-3" style="color: var(--text_color)">
                            {{-- Overview --}}
                            </h4>
                            <!--End Section Header-->
                            <div style="text-align: justify; color:var(--text_color)" class="text_ellipse2 moreText">
                                {!! @$class->details !!}
                            </div>
                            <button onclick="showhide()" class=" read_more_txt btn btn-primary" style="color:white"id="toggle"> Read More</button>

                        </div>
                    </div>
                    <!--End card-->
                @endif

                @if ($class->count() >0)
                    <!--Start card-->
                    <div class="card border-0 rounded-0 shadow-sm mb-3 page-section" id="gargent_policy">
                        <div class="card-body p-4 p-xl-5">
                            <!--Start Section Header-->
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="section-header  position-relative ">
                                        <h4 class="h5 about_this_ebook" style="color: var(--text_color)">
                                            Gargent Policy
                                        </h4>
                                    </div>

                                    <div class="section-header_divider ">
                                    </div>
                                </div>
                            </div>
                            <h4 class="h5 about_this_ebook mt-3" style="color: var(--text_color)">
                            {{-- Overview --}}
                            </h4>
                            <!--End Section Header-->
                            <div style="text-align: justify; color:var(--text_color)" class="text_ellipse2 moreText2">
                                {!! @$class->gargent_policy !!}
                            </div>

                            <div class="col-md-12">
                                <button onclick="showhideT(this)" data-id="2" class="read_more_txt btn btn-primary"  id="toggle2">Read More</button>
                            </div>

                        </div>
                    </div>
                    <!--End card-->
                @endif
      
                @if (@$class->subjects->count() >0)
                    <!--Start card-->
                    <div class="card border-0 rounded-0 shadow-sm mb-3 page-section" id="e-class">
                        <div class="card-body p-4 p-xl-5">
                            <!--Start Section Header-->
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="section-header  position-relative ">
                                        <h4 class="h5 about_this_ebook" style="color: var(--text_color)">
                                            Subject List
                                        </h4>
                                    </div>
                                    <div class="section-header_divider" style="margin-bottom: 21px;"></div>
                                </div>
                            </div>

                            <div style="text-align: justify; color:var(--text_color)" class="text_ellipse2 mb-2 moreText">
                                <div class="container">
                                    <div class="row">
                                    @foreach ( @$class->subjects as $subject)
                                    <div class=" col-sm-6 col-md-3 col-lg-2">
                                        <div class=" mb-3" style="width: 162px;">
                                        <div class="picture ">
                                            <img style="height:200px; width:148px;object-fit: fill" class="img-fluid " src="{{ @$subject->image_show }}">
                                            {{-- <p>{{ @$subject->name }}</p> --}}
                                        </div>
                                        <div class="team-content">
                                            {{-- <h3 class="name">{{ @$subject->name }}</h3> --}}
                                            <h6 class="title" style="text-align: center;">{{ @$subject->name }}</h6>
                                        </div>
                                        </div>
                                    </div>
                                    @endforeach                        
                                    </div>
                                </div>
                            </div>                    

                        </div>
                    </div>
                    <!--Start card-->
                @endif




                @if (@$syllabus->count() >0)
                    <div class="card border-0 rounded-0 shadow-sm mb-3 page-section" id="syllabus">
                        <div class="card-body p-4 p-xl-5">
                            <div class="section-header mb-4 position-relative">
                                <h4 class="h5 about_this_course" style="color: var(--text_color)">Syllabus</h4>
                                <div class="section-header_divider"></div>

                                <style>
                                    /* Additional custom styles */
                                    .school-name {
                                      text-align: center;
                                      margin-bottom: 30px;
                                    }
                                    .class-routine {
                                      margin-bottom: 50px;
                                    }
                                    .class-routine table {
                                      width: 100%;
                                      border-collapse: collapse;
                                    }
                                    .class-routine th, .class-routine td {
                                      border: 1px solid #ccc;
                                      padding: 8px;
                                      text-align: center;
                                    }
                                    .class-routine th {
                                      background-color: #f2f2f2;
                                    }
                                  
                                      .syllabus-container {
                                          margin: 20px;
                                      }
                                      .examination {
                                          border: 1px solid #000;
                                          padding: 10px;
                                          margin-bottom: 20px;
                                      }
                                      .subject {
                                          border: 1px solid #555;
                                          padding: 10px;
                                          margin-bottom: 15px;
                                          margin-left: 20px;
                                      }
                                      .table {
                                          width: 100%;
                                          border-collapse: collapse;
                                          margin-bottom: 15px;
                                      }
                                      .table, .table th, .table td {
                                          border: 1px solid #121212;
                                      }
                                      .table th, .table td {
                                          padding: 8px;
                                          text-align: left;
                                      }
                                </style>
                                  
                                <div class="float-end">
                                    <a href="{{ route('frontend.syllabus_download') }}?class_id={{ @$class->id }}" class="btn btn-secondary"> <i class="fa fa-solid fa-download"></i> Download PDF</a>
                               </div>
                                <br>
                            
                                {{-- <div class="school-name" style="color: #000">
                                <h1 style="margin-left: 80px;"><b>{{ @$tpOption->company_name }}</b></h1>
                                <h5><b>Class Name: {{ @$syllabus[0]->class->name }}</b></h5>
                                <h5><b>Session: {{@$syllabus[0]->examination->session->start_year}} - {{@$syllabus[0]->examination->session->end_year}}</b></h5>
                                <h2><b>Syllabus</b></h2>
                                </div>
                                <hr style="color: black; height:2px"> --}}

                                <div class="class-routine">
                            
                                @php
                                    $displayedExaminations = [];
                                @endphp
                                
                                <div class="syllabus-container">
                                    @foreach ($syllabus as $syllabus_item)
                                        @if (!in_array($syllabus_item->examination->id, $displayedExaminations))
                                            @php
                                                $displayedExaminations[] = $syllabus_item->examination->id;
                                                // Get all syllabus items for the current examination
                                                $relatedSyllabus = $syllabus->where('examination_id', $syllabus_item->examination->id);
                                                $displayedSubjects = [];
                                            @endphp
                                
                                            <div class="">
                                                <h3 class="text-center" style="color: #000"><b>{{ @$syllabus_item->examination->name }}</b></h3>
                                
                                                @foreach ($relatedSyllabus as $related_item)
                                                    @if (!in_array($related_item->subject->id, $displayedSubjects))
                                                        @php
                                                            $displayedSubjects[] = $related_item->subject->id;
                                                            $relatedLessons = $relatedSyllabus->where('subject_id', $related_item->subject->id);
                                                        @endphp
                                
                                                        <div class="">
                                                            <h5 class="text-center" style="color: #000"><b>Subject: {{ @$related_item->subject->name }}</b></h5>
                                
                                                            <table class="table" style="border: 1px solid rgb(13, 10, 10);">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Lesson</th>
                                                                        <th>Lesson Details</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($relatedLessons as $lesson_item)
                                                                        <tr>
                                                                            <td>{{ $lesson_item->lession->name }}</td>
                                                                            <td>{!! $lesson_item->lession_item !!}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        @endif
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                @endif




                @if (@$class->subjects->count() >0)
                    <!--Start card-->
                    <div class="card border-0 rounded-0 shadow-sm mb-3 page-section" id="book-list">
                        <div class="card-body p-4 p-xl-5" style="color: var(--text_color)">
                            <!--Start Section Header-->
                            <div class="section-header mb-4 position-relative">
                                <h4 class="h5 what_will_i_learn_txt">Book List</h4>
                                <div class="section-header_divider"></div>
                            </div>
                            <!--End Section Header-->
                            <div class="row">
                                @php
                                $ungroupedSubjects = $class->subjects->filter(function($subject) {
                                    return empty($subject->group_id); 
                                });
                                @endphp

                                <div class="subject-list">
                                    {{-- <h4>subjects list</h4> --}}
                                    <div class="row">
                                        @foreach ($ungroupedSubjects as $subject)
                                            <div class="col-sm-6 col-md-2">
                                                <ul>
                                                    <li>{{ $subject->name }}</li> 
                                                </ul>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                @foreach ($class->groups as $group)
                                    <div class="col-sm-6 col-md-4">
                                        <ul>
                                            Group Name :- {{ $group->name }}
                                            <ul>
                                                @foreach ($group->subjects as $sub)
                                                    <li>{{ $sub->name }}</li> <!-- Display subject name -->
                                                @endforeach
                                            </ul>
                                        </ul>
                                    </div>
                                @endforeach

                                <!-- Print and Download Buttons -->
                                <div class="col-12 mt-4">
                                    <a href="{{ route('frontend.book_list_download', @$class->id) }}" class="btn btn-secondary">Download</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End card-->
                @endif

                @if (@$class->teacherAssents->count() >0)
                    <!--Start card-->
                    <div class="card border-0 rounded-0 shadow-sm mb-3 page-section" id="teacher">
                        <div class="card-body p-4 p-xl-5">
                            <!--Start Section Header-->
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="section-header  position-relative ">
                                        <h4 class="h5 about_this_ebook" style="color: var(--text_color)">Class Teacher</h4>
                                    </div>
                                    <div class="section-header_divider" style="margin-bottom: 21px;"></div>
                                </div>
                            </div>

                            <div style="text-align: justify; color:var(--text_color)" class="text_ellipse2 mb-2 moreText">
                                <div class="container">
                                    <div class="row">
                                        @foreach ( @$class->teacherAssents as $teacherAssent)
                                            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                                                <div class="our-team" data-toggle="modal" data-id="6" data-target=".bd-example-modal-lg" onclick="ViewDetailsModel(6)">
                                                <div class="picture">
                                                    <img style="height: 131px;" class="img-fluid" src="{{ @$teacherAssent->teacher->image_show }}">
                                                </div>
                                                <div class="team-content">
                                                    <h3 class="name">{{ @$teacherAssent->teacher->name }}</h3>
                                                    <h4 class="title">{{ @$teacherAssent->teacher->user_designation->name }}</h4>
                                                    <h4 class="title">Subject:- {{ @$teacherAssent->subject->name }}</h4>
                                                </div>
                                                <ul class="social">
                                                    <li><a href="{{ @$teacherAssent->teacher->facebook_id }}" class="fab fa-facebook" aria-hidden="true"></a></li>
                                                    <li><a href="{{ @$teacherAssent->teacher->twitter_id }}" class="fab fa-twitter" aria-hidden="true"></a></li>
                                                    <li><a href="{{ @$teacherAssent->teacher->google_id }}" class="fab fa-google-plus" aria-hidden="true"></a></li>
                                                    <li><a href="{{ @$teacherAssent->teacher->instagram_id }}" class="fab fa-linkedin" aria-hidden="true"></a></li>
                                                </ul>
                                                </div>
                                            </div>
                                        @endforeach                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Start card-->
                @endif

                @if (@$class->examSchedules->count() >0)
                    <!--Start card-->
                    <div class="card border-0 rounded-0 shadow-sm mb-3 page-section" id="exam_list">
                        <div class="card-body p-4 p-xl-5" style="color: var(--text_color)">
                            <!--Start Section Header-->
                            <div class="section-header mb-4 position-relative">
                                <h4 class="h5 what_will_i_learn_txt">Exam List</h4>
                                <div class="section-header_divider"></div>
                            </div>
                            <!--End Section Header-->
                            <div class="row">
                                {{-- @foreach ( @$class->examSchedules as $examSchedule)
                                <div class="col-sm-6 col-md-6">
                                    <p class="benifit-checked"><i class="fas fa-check" style="color: var(--text_color)"></i>{{ @$examSchedule->examination->name }}</p>
                                </div>
                                @endforeach --}}
                                @php
                                    $printedExams = [];
                                @endphp

                                @foreach ($class->examSchedules as $examSchedule)
                                    @if (!in_array($examSchedule->examination->name, $printedExams))
                                        <div class="col-sm-6 col-md-6">
                                            <p class="benifit-checked">
                                                <i class="fas fa-check" style="color: var(--text_color)"></i>
                                                {{ $examSchedule->examination->name }}
                                            </p>
                                        </div>
                                        @php
                                            $printedExams[] = $examSchedule->examination->name;
                                        @endphp
                                    @endif
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <!--End card-->
                @endif

                @if (@$class->examClasss->count() >0)
                    <!--Start card-->
                    <div class="card border-0 rounded-0 shadow-sm mb-3 page-section" id="exam_type">
                        <div class="card-body p-4 p-xl-5" style="color: var(--text_color)">
                            <!--Start Section Header-->
                            <div class="section-header mb-4 position-relative">
                                <h4 class="h5 what_will_i_learn_txt">Exam Type</h4>
                                <div class="section-header_divider"></div>
                            </div>
                            <!--End Section Header-->
                            <div class="row">
                                {{-- @foreach ( @$class->examClasss as $examClass)
                                <div class="col-sm-6 col-md-6">
                                    <p class="benifit-checked"><i class="fas fa-check" style="color: var(--text_color)"></i>{{ @$examClass->examtype->name }}</p>
                                </div>
                                @endforeach --}}

                                @php
                                    $printedExamTypes = [];
                                @endphp
                                
                                @foreach ($class->examClasss ?? [] as $examClass)
                                    @php
                                        $examTypeName = $examClass->examtype->name ?? '';
                                    @endphp
                                    @if (!in_array($examTypeName, $printedExamTypes))
                                        <div class="col-sm-6 col-md-6">
                                            <p class="benifit-checked">
                                                <i class="fas fa-check" style="color: var(--text_color)"></i>
                                                {{ $examTypeName }}
                                            </p>
                                        </div>
                                        @php
                                            $printedExamTypes[] = $examTypeName;
                                        @endphp
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!--End card-->
                @endif
               


                    
                {{-- @if (@$class->ClassRoutines->count() >0) --}}
                @if (@$classRoutines->count() >0)
                    <div class="card border-0 rounded-0 shadow-sm mb-3 page-section" id="class_routine">
                        <div class="card-body p-4 p-xl-5">
                            <div class="section-header mb-4 position-relative">
                                <h4 class="h5 about_this_course" style="color: var(--text_color)">Class Routine</h4>
                                <div class="section-header_divider"></div>
                            </div>
                            @php
                                // $class_routine = $class->ClassRoutines;
                                $class_routine = $classRoutines;
                                $classRoutinesBySection = [];
                                $classDurations = [];
                                
                                foreach ($class_routine as $data) {
                                    $sectionId = $data->section_id;
                                    $dayId = $data->day_id; 
                                    $day = $data->day;
                                    $durationName = $data->classDuration->name;
                                
                                    $classRoutinesBySection[$sectionId]['routines'][$dayId][$durationName] = $data;
                                    $classRoutinesBySection[$sectionId]['section'] = $data->section; 
                                
                                    if (!in_array($durationName, $classDurations)) {
                                        $classDurations[] = $durationName;
                                    }
                                }
                                
                                foreach ($classRoutinesBySection as $sectionId => $sectionData) {
                                    ksort($classRoutinesBySection[$sectionId]['routines']);
                                }
                            @endphp
                            
                            <div class="class-routine">
                                @foreach ($classRoutinesBySection as $sectionData)
                                    @php
                                        $section = $sectionData['section'];
                                        $classRoutinesByDay = $sectionData['routines'];
                                    @endphp
                                    <h2>Section : {{ $section->name }}</h2> 
                                    <table>
                                        <thead>
                                            <tr style="color: black">
                                                <th scope="col">Day</th>
                                                @foreach ($classDurations as $duration)
                                                    <th scope="col">
                                                        {{ @$duration }} <br>
                                                        @php
                                                            $durationData = $class_routine->firstWhere('classDuration.name', $duration)->classDuration;
                                                        @endphp
                                                        {{ date('h:i A', strtotime(@$durationData->start_time)) }} - 
                                                        {{ date('h:i A', strtotime(@$durationData->end_time)) }}
                                                    </th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($classRoutinesByDay as $dayId => $routines)
                                                @php
                                                    $dayName = $routines[array_key_first($routines)]->day; 
                                                @endphp
                                                <tr>
                                                    <td>{{ $dayName }}</td>
                                                    @foreach ($classDurations as $duration)
                                                        <td>
                                                            @isset($routines[$duration])
                                                                {{ @$routines[$duration]->subject->name }} <br>
                                                                {{ @$routines[$duration]->teacher->name }} <br>
                                                                {{ @$routines[$duration]->room->name }}
                                                            @else
                                                              -
                                                            @endisset
                                                        </td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <div class="col-12 mt-4">
                                        <a href="{{ route('frontend.class_routine_download') }}?class_id={{ @$class->id }}&section_id={{ @$section->id }}" class="btn btn-secondary">Download</a>
                                    </div>
                                @endforeach
                            </div>
                            
                        
                        </div>
                    </div>
                @endif

              
                {{-- @if (@$class->examSchedules->count() >0) --}}
                @if (@$examSchedules->count() >0)
                    <div class="card border-0 rounded-0 shadow-sm mb-3 page-section" id="exam_routine">
                        <div class="card-body p-4 p-xl-5">
                            <div class="section-header mb-4 position-relative">
                                <h4 class="h5 about_this_course" style="color: var(--text_color)">Exam Routine</h4>
                                <div class="section-header_divider"></div>
                            </div>
                            <div class="class-routine">
                                <table>
                                  <thead>
                                    <tr style="color: black">
                                      <th>Date</th>
                                      <th>Subject</th>
                                      <th>Bulding</th>
                                      <th>Floor</th>
                                      <th>Room</th>
                                      <th>Time</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    {{-- @foreach ($class->examSchedules->filter(function ($routine) { --}}
                                    @foreach ($examSchedules->filter(function ($routine) {
                                        return $routine->examination && $routine->examination->end_date >= Carbon\Carbon::now();
                                        }); as $routine)
                                          <tr>
                                              <td>{{ @$routine->examClass->date }}</td>
                                              <td>{{ @$routine->examClass->subject->name }}</td>
                                              <td>{{ @$routine->bulding->name }}</td>
                                              <td>{{ @$routine->floor->name }}</td>
                                              <td>{{ @$routine->room->name }}</td>
                                              <td>{{ \Carbon\Carbon::parse(@$routine->examClass->start_time)->format('h:iA') }} - {{ \Carbon\Carbon::parse(@$routine->examClass->end_time)->format('h:iA') }}</td>
                                          </tr>
                                    @endforeach
                                  </tbody>
                                </table>
                                <div class="col-12 mt-4">
                                    <a href="{{ route('frontend.exam_routine_download') }}?class_id={{ @$class->id }}" class="btn btn-secondary">Download</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif








                {{-- <div class="modal fade" id="audio_content" tabindex="-1" role="dialog" aria-labelledby="audioModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="audioModalLabel">{{ $ebook->title }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <!-- Embed your audio here -->
                        <audio controls style="width: 100%">
                            <source src="{{ $ebook->content_audio_show }}" type="audio/mp3">
                            Your browser does not support the audio tag.
                        </audio>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    </div>
                </div> --}}
             
                <!--End card-->
            </div>

            {{-- <div class="col-md-3 ps-xl-5 sticky-content">
                        @php
                           $com_name = \App\Models\Tp_option::where('option_name', 'theme_option_header')->first();
                           $social_url = \App\Models\Tp_option::where('option_name', 'theme_social_media')->first();
                           $dataObj = json_decode($social_url->option_value);
                        @endphp
                <div class="sidebar-block text-white mb-3 p-4" style="background: #171725;">
                    <a href="{{ @$dataObj->facebook }}"
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
                                    class="fab fa-facebook-f"></i>&nbsp;&nbsp;&nbsp;Facebook</span>
                        </div>
                        <!-- End Tags -->
                    </a>
                </div>
                <div class="sidebar-block text-white mb-3 p-4 position-relative">
                    <!--End Section Header-->
                    <div class="d-flex align-items-center mb-3 position-relative">
                        <div class="flex-shrink-0">
                        </div>
                        <div class="flex-grow-1 ms-3 text-left">
                         <a  style="color: var(--text_color)">
                        </a>
                        </div>
                    </div>
                </div>

                <div class="sidebar-block text-white mb-3 p-4 position-relative overflow-hidden">
                    <ul class="mb-0 ps-4 position-relative"></ul>
                </div>
            </div> --}}

        </div>

    </div>
</div>



<div class="modal share-modal" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 class="mb-3">Share This ebook</h5>
                <!--Start Share Link Input-->
                <!--End Share Link Input-->
                <!--Start Social Share-->
                <ul class="socail-share list-unstyled d-flex mb-0 justify-content-center">
                    <li><a href="https://www.facebook.com/sharer.php?u=https://lead.academy/ebook-details/CO13RT58I93"
                            target="_blank" class="d-block text-center me-3 text-muted">
                            <div class="socail-share_icon facebook"><i class="fab fa-facebook-f"></i></div>Facebook
                        </a></li>
                    <li><a href="https://twitter.com/share?text=English%20for%20IBA-MBA%20Admission%20Preparation%20&amp;url=https://lead.academy/ebook-details/CO13RT58I93"
                            target="_blank" class="d-block text-center me-3 text-muted">
                            <div class="socail-share_icon twitter"><i class="fab fa-twitter"></i></div>Twitter
                        </a></li>
                    <li><a href="https://api.whatsapp.com/send?text=[English%20for%20IBA-MBA%20Admission%20Preparation]%20[https://lead.academy/ebook-details/CO13RT58I93]"
                            class="d-block text-center me-3 text-muted" target="_blank" rel="noopener">
                            <div class="socail-share_icon" style="background-color:#37b546;"><i class="fab fa-whatsapp"
                                    style="color:#fff;"></i></div>WhatsApp
                        </a></li>
                    <li><a href="mailto:?subject=English for IBA-MBA Admission Preparation &body=It is not bad to have the achievement of doing an MBA from IBA in your list of achievements after graduation. You can grab the golden opportunity to work in the world&#39;s leading organizations, and take many steps forward in your career if you complete your post-graduation from IBA. We have brought the ebook “English for IBA-MBA Admission Preparation” to fulfil your dream of doing an MBA in IBA.

                                This ebook is designed by analyzing the question pattern of IBA of universities for those who want to &#39;prepare&#39; for the day or evening program of IBA-MBA of DU, JU or other universities at the post-graduation or post-graduation level.
                                PLEASE VISIT THIS LINK:  https://lead.academy/ebook-details/CO13RT58I93"
                            class="d-block text-center me-3 text-muted">
                            <div class="socail-share_icon envelope"><i class="far fa-envelope"></i></div>Email
                        </a></li>
                    <li>
                        <a href="https://www.facebook.com/dialog/send?link=https://lead.academy/ebook-details/CO13RT58I93&amp;app_id=311161661010577&amp;redirect_uri=https://lead.academy/ebook-details/CO13RT58I93"
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
