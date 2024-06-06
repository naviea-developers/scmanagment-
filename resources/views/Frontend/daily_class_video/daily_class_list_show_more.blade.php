@foreach (@$classes as $k=>$class)
    @php
        $session = \App\Models\Session::where('is_current', 1)->first();
        $sessionId = $session->id;
        $dailyClasses = \App\Models\DailyClass::where('class_id', $class->id)->where('session_id', $sessionId)->get();
        $teacherAssents = \App\Models\SubjectTeacherAssent::where('class_id', $class->id)->where('session_id', $sessionId)->get();
        $subjects = \App\Models\Subject::where('class_id', $class->id)->get();
    @endphp 
    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
            <!--Start Course Card-->
            <div class="course-card rounded-3 bg-white position-relative overflow-hidden">
                <div class="position-relative">
                    <!--Start Course Image-->
                    <a href="{{ route('frontend.daily_class_video_details',$class->id) }}" class="">
                        <img src="{{ @$class->image_show }}" class="img-fluid w-100 imgdiv" alt="">
                    </a>

                    <div class="course-card_body bg-prussian-blue text-white p-3 top_shadow position-relative">
                        <!--Start Course Title-->
                        <h3 class="course-card__course--title text-uppercase fs-6 mb-0">
                            <a href="{{ route('frontend.daily_class_video_details',$class->id) }}" class="text-decoration-none" style="color: var(--product_text_color)">{{ @$class->name}}</a>
                        </h3>
                        <p class=" text-uppercase fs-6 ebook-title2" style="margin-block: -8px;">
                            <a href="{{ route('frontend.daily_class_video_details',$class->id) }}" class="text-decoration-none" style="color: var(--product_text_color)">{{ @$class->teacher->name}}</a>
                        </p>
                        <!--End Course Title-->
                        <!--Start Course Hints-->

                        <div class="align-items-center d-flex fs-12 justify-content-between pt-1 text-white w-100">

                        {{-- @if ($subjects->count() >0) --}}
                        <div class="course-like d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="22.5" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#f8f9fc" d="M96 0C43 0 0 43 0 96V416c0 53 43 96 96 96H384h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V384c17.7 0 32-14.3 32-32V32c0-17.7-14.3-32-32-32H384 96zm0 384H352v64H96c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16zm16 48H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>
                            <div class="d-block">
                                <div class="reviews fs-12 fw-bold" style="color: var(--product_text_color)">
                                    &nbsp; {{ @$subjects->count() }}
                                </div>
                            </div>
                        </div>
                        {{-- @endif --}}

                        <div class="course-like d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="22.5" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#d6dce6" d="M0 128C0 92.7 28.7 64 64 64H320c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128zM559.1 99.8c10.4 5.6 16.9 16.4 16.9 28.2V384c0 11.8-6.5 22.6-16.9 28.2s-23 5-32.9-1.6l-96-64L416 337.1V320 192 174.9l14.2-9.5 96-64c9.8-6.5 22.4-7.2 32.9-1.6z"/></svg>
                            <div class="d-block">
                                <div class="reviews fs-12 fw-bold" style="color: var(--product_text_color)">
                                    &nbsp; {{ @$dailyClasses->count() }}
                                </div>
                            </div>
                        </div>

                        <!--Start Star Rating-->
                        <div class="star-rating__wrap d-flex align-items-center ">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="22.5" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#f0f2f4" d="M192 96a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm-8 384V352h16V480c0 17.7 14.3 32 32 32s32-14.3 32-32V192h56 64 16c17.7 0 32-14.3 32-32s-14.3-32-32-32H384V64H576V256H384V224H320v48c0 26.5 21.5 48 48 48H592c26.5 0 48-21.5 48-48V48c0-26.5-21.5-48-48-48H368c-26.5 0-48 21.5-48 48v80H243.1 177.1c-33.7 0-64.9 17.7-82.3 46.6l-58.3 97c-9.1 15.1-4.2 34.8 10.9 43.9s34.8 4.2 43.9-10.9L120 256.9V480c0 17.7 14.3 32 32 32s32-14.3 32-32z"/></svg>
                            <div class="d-block">
                                <div class="reviews fs-12 fw-bold" style="color: var(--product_text_color)">
                                    &nbsp; {{ @$teacherAssents->count() }}
                                </div>
                            </div>
                        </div>
                    </div>
                        <!--End Course Hints-->
                    </div>
                    <!--End Course Card Body-->
                </div>

            </div>
            <!--End Course Card-->
    </div>
@endforeach