@extends('Frontend.layouts.master-layout')
@section('title','- Event Details')
@section('head')

@endsection
@section('main_contend')
{{-- @include('Frontend.layouts.parts.header-menu') --}}

    <div class="content_search" style="margin-top:70px">
        <link
        href="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/css/blog.css"
        rel="stylesheet">
    <div class="bg-alice-blue pt-5">
        <div class="container-xl">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text_bluish-black fw-semi-bold">Home </a></li>
                            <!-- <li class="breadcrumb-item text_bluish-black fw-semi-bold" aria-current="page">Live</li> -->
                            <li class="breadcrumb-item active" aria-current="page">@if(@$event->release_id=='0' ) Passed Event @elseif(@$event->release_id=='1' )  Upcoming Event @else Live Event @endif</li>
                        </ol>
                    </nav>
                    <h4 class="fs-4 fw-bold my-4" style="color: var(--text_color)">{{ $event->name }}</h4>

                    <div class="d-xl-flex">
                        <h6 class="fw-semi-bold text_bluish-black mb-0">{{date('d F Y',strtotime($event->startdate))}}</h6>
                        <span class="d-none d-xl-block mx-4 middle_border"></span>
                        <h6 class="fw-semi-bold text_bluish-black mb-0">{{ $event->location }}</h6>
                    </div>
                    <div class="d-block my-4">
                        <img src="{{ $event->host->image_show ?? ''}}"
                            class="img-fluid" alt="">
                    </div>
                    <div class="d-flex flex-wrap justify-content-xl-between mb-4" style="color: var(--header_text_color)">
                        <div
                            class="d-block neat_block px-5 py-3 rounded-1 my-1 me-2 me-xl-0 text-center font_open">
                            <div class="fs-6 fw-semi-bold mb-2 title">Speakers</div>
                            {{-- <div class="fs-6 fw-bold">12</div> --}}
                            <div class="fs-6 fw-bold">
                                {{ $event->eventschedules->groupBy('instrutor_id')->count() }}
                            </div>
                        </div>
                        <div
                            class="d-block neat_block px-5 py-3 rounded-1 my-1 me-2 me-xl-0 text-center font_open">
                            <div class="fs-6 fw-semi-bold mb-2 title">Sessions</div>
                            <div class="fs-6 fw-bold">{{ $event->eventschedules->count() }}</div>
                        </div>
                        <div
                            class="d-block neat_block px-5 py-3 rounded-1 my-1 me-2 me-xl-0 text-center font_open">
                            <div class="fs-6 fw-semi-bold mb-2 title">Days</div>
                            <div class="fs-6 fw-bold">{{ $event->eventschedules->count() }}</div>
                        </div>
                        <div
                            class="d-block neat_block px-5 py-3 rounded-1 my-1 me-2 me-xl-0 text-center font_open">
                            <div class="fs-6 fw-semi-bold mb-2 title">Recording</div>
                            <div class="fs-6 fw-bold">@if (@$event->recording==0) No @else Yes  @endif
                        </div>
                        </div>
                        <div
                            class="d-block neat_block px-5 py-3 rounded-1 my-1 me-2 me-xl-0 text-center font_open">
                            <div class="fs-6 fw-semi-bold mb-2 title">Language</div>
                            <div class="fs-6 fw-bold">
                                @if (@$event->language_id=='0' ) Bangla @else English @endif
                            </div>
                        </div>
                    </div>


                    <div class="align-items-center d-md-flex justify-content-between mb-4 pass_block p-3 p-lg-5 rounded-1" style="color: var(--header_text_color)">
                        <div class="fs-5 fw-bold text-uppercase mb-3 mb-md-0">Get Event Pass!</div>
                        <div class="align-items-center d-flex justify-content-between">

                            <input type="hidden" name="course_id"
                                id="course_id_LEO094W9R9"
                                value="LEO094W9R9">
                            <input type="hidden" name="course_name"
                                id="course_name_LEO094W9R9"
                                value="Web Development with Mern Stack">
                            <input type="hidden" name="slug"
                                id="slug_LEO094W9R9"
                                value="">
                            <input type="hidden" name="qty" id="qty" value="1">
                            <input type="hidden" name="price"
                                id="price_LEO094W9R9"
                                value="0">
                            <input type="hidden" name="old_price"
                                id="old_price_LEO094W9R9"
                                value="0">
                            <input type="hidden" name="picture"
                                id="picture_LEO094W9R9"
                                value="assets/uploads/course/1699527091-f-Live-class-thumb.png">
                            <input type="hidden" name="is_course_type" id="iscourse_type" value="4">
                                             <input type="hidden" id="course_type" value="4">

                            <h5 class="px-5 p-2"><b> {{ format_price(@$event->fee)}}</b></h5>

                    </div>
                    </div>

                     <input type="hidden" value="2023-11-19 21:00" id="event_countdowntime" name="event_countdowntime">

                    <div
                        class="align-items-center d-md-flex justify-content-between neat_block px-5 py-4 rounded-1 text-center text-md-start" style="color: var(--header_text_color)">
                        <div class="fs-5 fw-bold text-uppercase">Events will start in </div>
                        <div class="fs-6 fw-bold">
                            <div id="timer" class="align-items-center d-flex">
                                <div id="days" class="mx-2 fs-2 text-center w-25"></div>
                                <div id="hours" class="mx-2 fs-2 text-center w-25"></div>
                                <div id="minutes" class="mx-2 fs-2 text-center w-25"></div>
                                <div id="seconds" class="mx-2 fs-2 text-center w-25"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--Start About Event -->
    <div class="bg-alice-blue pt-5">
        <div class="container-xl">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <!--Start Section Header-->
                           <!--Start card-->
                <div class="card border-0 rounded-0 shadow-sm mb-3 page-section" id="overview">
                    <div class="card-body p-4 p-xl-5">
                        <!--Start Section Header-->
                        <div class="section-header mb-4 position-relative">
                            <h4 class="h5 about_this_course" style="color: var(--text_color)">About this Course</h4>
                            <div class="section-header_divider"></div>
                        </div>
                        <!--End Section Header-->
                        <div style="text-align: justify;" class="text_ellipse2 mb-2 moreText">
                            {!! @$event->about !!}
                        </div>
                        <button onclick="showhide()" class="bg-white border-0 fw-semi-bold p-0 text-dark-cerulean read_more_txt"
                            id="toggle">
                          Read More
                       </button>
                    </div>
                </div>
                 </div>
            </div>
        </div>
    </div>
    <!--End About Event -->

    <!--Start What will Learn -->
    <div class="bg-alice-blue pt-5" style="color: var(--text_color)">
        <div class="container-xl">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <!--Start Section Header-->

                    <div class="section-header mb-4">
                        <h5 class="fw-semi-bold">What will You Learn</h5>
                        <div class="section-header_divider"></div>
                    </div>
                    <!--End Section Header-->
                    <div class="card border-0 rounded-0 shadow-sm">
                        <div class="card-body p-3 p-sm-4">
                            <ul class="list-unstyled mb-0">
                                @foreach ($event->courselearns as $courselearn)
                                 <li class="my-1">
                                    <svg width="21" height="22" viewBox="0 0 21 22" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect x="0.447754" y="0.99292" width="20.28" height="20.28" rx="5.63335"
                                            fill="#07477D" />
                                        <rect x="0.447754" y="0.99292" width="20.28" height="20.28" rx="5.63335"
                                            fill="url(#paint0_radial_1_3)" fill-opacity="0.7" />
                                        <path d="M6.08105 10.5549L9.17135 13.6116L15.0944 7.75293" stroke="white"
                                            stroke-width="2.028" stroke-linecap="round" stroke-linejoin="round" />
                                        <defs>
                                            <radialGradient id="paint0_radial_1_3" cx="0" cy="0" r="1"
                                                gradientUnits="userSpaceOnUse"
                                                gradientTransform="translate(6.93072 4.98244) rotate(55.9679) scale(15.4451)">
                                                <stop stop-color="white" />
                                                <stop offset="0.697917" stop-color="white" stop-opacity="0" />
                                                <stop offset="1" stop-color="white" stop-opacity="0" />
                                            </radialGradient>
                                        </defs>
                                    </svg>
                                    <span class="ms-2">{{ @$courselearn->name }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End What will Learn -->

    <!--Start Requirements -->
    <div class="bg-alice-blue pt-5" style="color: var(--text_color)">
        <div class="container-xl">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <!--Start Section Header-->
                    <div class="section-header mb-4">
                        <h5 class="fw-semi-bold">Requirement</h5>
                        <div class="section-header_divider"></div>
                    </div>
                    <!--End Section Header-->
                    <div class="card border-0 rounded-0 shadow-sm">
                        <div class="card-body p-3 p-sm-4">

                            <ul class="list-unstyled mb-0">
                                @foreach ($event->courserequisites as $courserequisite)
                                <li class="my-1">
                                    <svg width="21" height="22" viewBox="0 0 21 22" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect x="0.447754" y="0.99292" width="20.28" height="20.28" rx="5.63335"
                                            fill="#07477D" />
                                        <rect x="0.447754" y="0.99292" width="20.28" height="20.28" rx="5.63335"
                                            fill="url(#paint0_radial_1_3)" fill-opacity="0.7" />
                                        <path d="M6.08105 10.5549L9.17135 13.6116L15.0944 7.75293" stroke="white"
                                            stroke-width="2.028" stroke-linecap="round" stroke-linejoin="round" />
                                        <defs>
                                            <radialGradient id="paint0_radial_1_3" cx="0" cy="0" r="1"
                                                gradientUnits="userSpaceOnUse"
                                                gradientTransform="translate(6.93072 4.98244) rotate(55.9679) scale(15.4451)">
                                                <stop stop-color="white" />
                                                <stop offset="0.697917" stop-color="white" stop-opacity="0" />
                                                <stop offset="1" stop-color="white" stop-opacity="0" />
                                            </radialGradient>
                                        </defs>
                                    </svg>
                                    <span class="ms-2"> {{ @$courserequisite->name }}</span>
                                </li>
                                @endforeach
                             </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Requirements -->

    <!--Start Requirements -->
    <div class="bg-alice-blue pt-5" style="color: var(--text_color)">
        <div class="container-xl">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-header mb-4">
                        <h5 class="fw-semi-bold">Host</h5>
                        <div class="section-header_divider"></div>
                    </div>
                     @php
                    // $student =\App\Models\EventCart::leftJoin('events','events.id','event_carts.event_id')
                    //         ->where('events.host_id');
                    //         $p_students = $student->get();
                    //         $students = $student->groupBy('event_carts.user_id')->get();
                   @endphp
                    <div class="bg-white d-block shadow-sm p-5 event_comment-block mb-4 ">
                        <div class="d-flex justify-content-between mb-4">
                            <div class="d-flex align-items-center">
                                <div class="img-user width_55p">
                                    <img src="{{ @$event->host->image_show }}"
                                        class="rounded-circle img-fluid" alt="">
                                </div>
                                <div class="ms-3">
                                    <h6 class="fs-5 fw-semi-bold mb-1">{{ @$event->host->name }}</h6>
                                    <p class="fs-15 mb-2 text-muted">{{ @$event->host->designation }}</p>
                                    <div class="d-xl-flex">
                                        <h6 class="fw-semi-bold text_bluish-black mb-0">
                                            {{ $event->where('host_id',$event->host_id)->count() }}
                                            Courses</h6>
                                        {{-- <span class="d-none d-xl-block mx-3 middle_border"></span>
                                        <h6 class="fw-semi-bold text_bluish-black mb-0">

                                          Students</h6> --}}

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="font_open fs-5 text-muted mb-0 text_ellipse2 moreText-F036AFG5S8034">
                            {!! @$event->host->description !!}
                         </div>
                        <button onclick="instredmoreshowhide('F036AFG5S8034')"
                            class="bg-white border-0 fw-semi-bold p-0 text-dark-cerulean"
                            id="toggle-F036AFG5S8034">Read More</button>
                   </div>

                    <div class="section-header mb-4">
                        <h5 class="fw-semi-bold">About Instructor/Speaker</h5>
                        <div class="section-header_divider"></div>
                    </div>

                     @foreach ($event->eventschedules as $eventschedule)
                    {{-- @foreach ($eventschedule->instrutor as $instrut)  --}}


                    <div class="bg-white d-block shadow-sm p-5 event_comment-block mb-4">
                        <div class="d-flex align-items-center mb-4">
                            <div class="img-user width_55p">
                            <img src="{{ @$eventschedule->instrutor->image_show }}"
                                    class="rounded-circle img-fluid" alt="">

                            </div>

                        <div class="ms-3">
                                <h6 class="fs-5 fw-semi-bold mb-1">{{ @$eventschedule->instrutor->name }}</h6>
                                <p class="fs-15 mb-2 text-muted">{{ @$eventschedule->instrutor->designation }}.</p>
                                <div class="d-xl-flex">
                                    <h6 class="fw-semi-bold text_bluish-black mb-0">
                                        {{ $eventschedule->where('instrutor_id',$eventschedule->instrutor_id)->count() }}
                                          Courses</h6>
                                    {{-- <span class="d-none d-xl-block mx-3 middle_border"></span>
                                    <h6 class="fw-semi-bold text_bluish-black mb-0">0 Students</h6> --}}
                                    <!-- <span class="d-none d-xl-block mx-3 middle_border"></span>
                                        <h6 class="fw-semi-bold text_bluish-black mb-0">875 Reviews</h6>
                                        <span class="d-none d-xl-block mx-3 middle_border"></span>
                                        <h6 class="fw-semi-bold text_bluish-black mb-0">576 Rating</h6> -->
                                </div>
                        </div>
                     </div>
                    <div class="font_open fs-5 text-muted mb-0 text_ellipse2 moreText-341">
                        {!! @$eventschedule->instrutor->description !!}
                    </div>
                    <button onclick="instredmoreshowhide('341')" class="bg-white border-0 fw-semi-bold p-0 text-dark-cerulean" id="toggle-341">
                        Read More
                    </button>
                </div>
                 {{-- @endforeach --}}
                @endforeach

            </div>
            </div>
        </div>
    </div>

    <div class="bg-alice-blue py-5" style="color: var(--text_color)">
        <div class="container-xl">
            <div class="justify-content-center row">
                <div class="col-lg-8">
                    <div class="section-header mb-4">
                        <h5 class="fw-semi-bold">Event Schedule</h5>
                        <div class="section-header_divider"></div>
                    </div>
                    <div class="row g-3">
                        @php  $i=1; @endphp
                       @foreach ($event->eventschedules as $eventschedule)
                        <div class="col-lg-12">
                          <div class="d-block my-0.5">
                                <div
                                    class="align-items-center bg-white border-dc rounded-1 d-sm-flex fs-6 fw-bold px-3 py-2 text-dark-cerulean">
                                    <div class="d-block me-5 cLast br-dc">
                                        @if ($eventschedule->day_id=='1')
                                          Day 1
                                        @elseif ($eventschedule->day_id=='2')
                                           Day 2
                                        @elseif ($eventschedule->day_id=='3')
                                            Day 3
                                        @elseif ($eventschedule->day_id=='4')
                                            Day 4
                                        @elseif ($eventschedule->day_id=='5')
                                            Day 5
                                        @elseif ($eventschedule->day_id=='6')
                                            Day 6
                                        @elseif ($eventschedule->day_id=='7')
                                            Day 7
                                        @elseif ($eventschedule->day_id=='8')
                                            Day 8
                                        @elseif ($eventschedule->day_id=='9')
                                            Day 9
                                        @elseif ($eventschedule->day_id=='10')
                                            Day 10
                                        @elseif ($eventschedule->day_id=='11')
                                            Day 11
                                        @elseif ($eventschedule->day_id=='12')
                                            Day 12
                                        @elseif ($eventschedule->day_id=='13')
                                            Day 13
                                        @elseif ($eventschedule->day_id=='14')
                                            Day 14
                                        @elseif ($eventschedule->day_id=='15')
                                            Day 15
                                        @elseif ($eventschedule->day_id=='16')
                                            Day 16
                                        @elseif ($eventschedule->day_id=='17')
                                            Day 17
                                        @elseif ($eventschedule->day_id=='18')
                                            Day 18
                                        @elseif ($eventschedule->day_id=='19')
                                            Day 19
                                        @elseif ($eventschedule->day_id=='20')
                                            Day 20
                                        @elseif ($eventschedule->day_id=='21')
                                            Day 21
                                        @elseif ($eventschedule->day_id=='22')
                                            Day 22
                                        @elseif ($eventschedule->day_id=='23')
                                            Day 23
                                        @elseif ($eventschedule->day_id=='24')
                                            Day 24
                                        @elseif ($eventschedule->day_id=='25')
                                            Day 25
                                        @elseif ($eventschedule->day_id=='26')
                                            Day 26
                                        @elseif ($eventschedule->day_id=='27')
                                            Day 27
                                        @elseif ($eventschedule->day_id=='28')
                                            Day 28
                                        @elseif ($eventschedule->day_id=='29')
                                            Day 29
                                        @elseif ($eventschedule->day_id=='30')
                                            Day 30
                                        @elseif ($eventschedule->day_id=='31')
                                            Day 31
                                        @endif
                                    </div>

                                    <div class="d-block">{{date('d,F,Y',strtotime(@$eventschedule->scheduledate))}}</div>
                                </div>
                               <div class="border-dc fs-6 fw-bold px-3 py-2">
                                    <div class="d-sm-flex align-items-center mb-1">
                                        <div class="d-block me-5 cLast br-dc">

                                            {{date('h:i A',strtotime(@$eventschedule->startdate))}}-{{date('h:i A',strtotime($eventschedule->enddate))}}
                                         </div>
                                        <div class="d-block">{!! @$eventschedule->schedulename !!} : Class {{ $i++ }}</div>
                                    </div>
                                    <div class="d-block fw-light text-muted">{{ @$eventschedule->instrutor->name }}</div>
                                </div>
                          </div>

                        </div>
                       @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-alice-blue py-5" style="color: var(--text_color)">
        <div class="container-xl">
            <div class="justify-content-center row">
                <div class="col-lg-8">
                    <div class="section-header mb-4">
                        <h5 class="fw-semi-bold">Leave a Comment</h5>
                        <div class="section-header_divider"></div>
                    </div>
                  <form action="{{ route('event.details.massage') }}" method="post">
                    @csrf
                    <div class="input-group">
                        <textarea class="bg-white form-control pe-5 box" name="details" cols="30" rows="2"></textarea>
                        <input type="hidden" name="event_id" value="{{ $event->id }}"/>
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
                </form>
                    <div class="load-comments"></div>

                </div>
            </div>
        </div>
    </div>



    <script
        src="../application/modules/frontend/views/themes/default/assets/js/countdown.js">
    </script>

    <script>
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


    $(document).ready(function() {
        $("#commentSubmits").on('click', function() {


            var enterprise_shortname = $("#enterprise_shortname").val();
            var enterprise_id = $("#enterprise_id").val();
            var user_id = $("#user_id").val();
            var user_type = $("#user_type").val();
            var comments = $("#commenteditor").val();
            var course_id = "LEO094W9R9";
            var comment_type = 3;
            if (user_id == '') {
                toastr.error("Please Login First!");
                return false;
            }

            $.ajax({
                url: base_url + enterprise_shortname + "/comment-save",
                type: "POST",
                data: {
                    csrf_test_name: CSRF_TOKEN,
                    user_id: user_id,
                    user_type: user_type,
                    project_id: course_id,
                    enterprise_id: enterprise_id,
                    comments: comments,
                    comment_type: comment_type,
                },
                success: function(r) {
                    $("#commenteditor").val('');
                    console.log(r);
                    toastr.success(r);
                    loadcomments();
                },
            });

        });
        loadcomments();
    });

    function loadcomments() {

        var project_id = "LEO094W9R9";
        $.ajax({
            url: base_url + enterprise_shortname + "/loadcomments",
            type: "POST",
            data: {
                csrf_test_name: CSRF_TOKEN,
                // user_id: user_id,
                // user_type: user_type,
                enterprise_id: enterprise_id,
                project_id: project_id,
                comment_type: 3
            },
            success: function(r) {
                console.log(r);
                $(".load-comments").html(r);
            },
        });
    }


    // Read More
    function instredmoreshowhide(sl) {

        // $("#toggle").click(function(){
        $(".moreText-" + sl).toggleClass("opened");

        var elem = $("#toggle-" + sl).text();
        if (elem == "Read More") {
            //Stuff to do when btn is in the read more state
            $("#toggle-" + sl).text("Read Less");
            // $("#text").slideDown();
        } else {
            //Stuff to do when btn is in the read less state
            $("#toggle-" + sl).text("Read More");
            // $("#text").slideUp();
        }
        // });

    }
    </script>
    </div>

@endsection



@section('script')

{{-- <script src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/js/countdown.js"></script> --}}
<script>
	function makeTimer() {


		var countdowntime = "{{ date('d F Y H:i:s',strtotime($event->eventstarttime)) }}";


		var endTime = new Date(countdowntime);
		endTime = (Date.parse(endTime) / 1000);

		var now = new Date();
		now = (Date.parse(now) / 1000);

		if(now < endTime){

			var timeLeft = endTime - now;

			var days = Math.floor(timeLeft / 86400);
			var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
			var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
			var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

			if (hours < "10") {
				hours = "0" + hours;
			}
			if (minutes < "10") {
				minutes = "0" + minutes;
			}
			if (seconds < "10") {
				seconds = "0" + seconds;
			}

			$("#days").html(days + "<p class='timeText fs-6 mb-0'>Days</p>");
			$("#hours").html(hours + "<p class='timeText fs-6 mb-0'>Hours</p>");
			$("#minutes").html(minutes + "<p class='timeText fs-6 mb-0'>Mins</p>");
			if(days == '0' && hours == '00' && minutes == '00' &&  seconds == '01'){
				$("#seconds").html("00" + "<p class='timeText fs-6 mb-0'>Sec</p>");
			}else{
				$("#seconds").html(seconds + "<p class='timeText fs-6 mb-0'>Sec</p>");
			}
		}

	}
	setInterval(function () {
		makeTimer();

	}, 1000);
	</script>
@endsection

