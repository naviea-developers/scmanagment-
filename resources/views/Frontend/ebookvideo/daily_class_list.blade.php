@extends('Frontend.layouts.master-layout')
@section('title','- E-video')
@section('head')
<style>
    .ebook-title2 a{
        display: block;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        font-weight: 700;
        font-size: 15px;
        letter-spacing: -0.04em;
        line-height: 21px;
        height: 41px;

    }
</style>
@endsection
@section('main_contend')
@include('Frontend.layouts.parts.header-menu')
{{-- <div class="container"> --}}

<div class="content_search" style="margin-top:70px">
    <link href="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/css/blog.css" rel="stylesheet">

<div class="bg-alice-blue py-3 py-lg-4">
    <div class="container-lg p-2 p-md-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <!--Start Category Banner-->
                <div
                    class="category-banner mb-4 position-relative px-4 px-sm-5 py-5 text-center text-white hero-header" style="height:200px!important;">
                    <div class="bottom-0 end-0 overflow-hidden position-absolute start-0 top-0">
                        <img src="{{ @$banner->image_show }}"
                            class="img-fluid wh_sm_100" alt="">
                    </div>
                    <!-- <h2 class="fw-semi-bold my-2 py-5 fs-1">Lead Academy Live</h2> -->
                    <div class="eventPage_heading mx-auto">
                        <h2 class="stydent-name mb-4 text-capitalize position-relative" style="z-index:2; color: var(--header_text_color)">
                            {{ @$banner->title }}
                        </h2>
                        <h6 class="position-relative" style="z-index:2; color: var(--header_text_color)">
                            {!! @$banner->details !!}
                        </h6>
                    </div>
                </div>
                <!--End Category Banner-->
                <div class="row blog_search mb-4 g-3">

                    <div class="col-xl-6 col-md-6">
                        <div class="bg-white border d-block p-3">
                        <Form>
                            <div class="input-group course-search">
                                <input type="text" class="bg-white form-control pe-5 box"
                                    placeholder="Search For E-book" value="{{ $class_name }}" name="class_name" aria-label="Recipient's username" id="search_item">
                                <button class="bg-gray btn end-0 m-1 position-absolute px-2 rounded-2 search-brt"
                                    type="submit" id="searchevent">
                                    <svg width="14" height="13" viewBox="0 0 14 13" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6.74112 10.7266C9.57692 10.7266 11.8758 8.56674 11.8758 5.90242C11.8758 3.2381 9.57692 1.07825 6.74112 1.07825C3.90532 1.07825 1.60645 3.2381 1.60645 5.90242C1.60645 8.56674 3.90532 10.7266 6.74112 10.7266Z"
                                            stroke="#07477D" stroke-width="1.28367" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M13.1592 11.9326L10.3672 9.30945" stroke="#07477D"
                                            stroke-width="1.28367" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>

                                </button>
                            </div>
                        </Form>
                        </div>
                    </div>


                    {{-- <div class="col-xl-6 col-md-6">
                        <div class="bg-white border d-block p-3">
                            <select  class="form-select rounded-0 box" aria-label="Default select example">
                                <option value="0">All Class</option>
                                @foreach ($classLists as $classList)
                                    <option value="{{ $classList->id }}">{{ $classList->name }}</option>
                                 @endforeach
                            </select>
                        </div>
                    </div> --}}

                    <div class="col-xl-6 col-md-6">
                        <div class="bg-white border d-block p-3">
                            <select id="classSelect" class="form-select rounded-0 box" aria-label="Default select example">
                                <option value="0">All Class</option>
                                @foreach ($classLists as $classList)
                                    <option value="{{ $classList->id }}">{{ $classList->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>

        <div class="row g-3 event_cat_ajax-show show-events-data event_relese_ajax-show">

            @foreach (@$classes as $k=>$class)
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
                                    <p class=" text-uppercase fs-6 ebook-title2">
                                        <a href="{{ route('frontend.daily_class_video_details',$class->id) }}" class="text-decoration-none" style="color: var(--product_text_color)">{{ @$class->teacher->name}}</a>
                                    </p>
                                    <!--End Course Title-->
                                    <!--Start Course Hints-->

                                    <div class="align-items-center d-flex fs-12 justify-content-between pt-1 text-white w-100">

                                    {{-- @if ($event->audio->count() >0) --}}
                                    <div class="course-like d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="22.5" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#e2e5e9" d="M192 0C139 0 96 43 96 96V256c0 53 43 96 96 96s96-43 96-96V96c0-53-43-96-96-96zM64 216c0-13.3-10.7-24-24-24s-24 10.7-24 24v40c0 89.1 66.2 162.7 152 174.4V464H120c-13.3 0-24 10.7-24 24s10.7 24 24 24h72 72c13.3 0 24-10.7 24-24s-10.7-24-24-24H216V430.4c85.8-11.7 152-85.3 152-174.4V216c0-13.3-10.7-24-24-24s-24 10.7-24 24v40c0 70.7-57.3 128-128 128s-128-57.3-128-128V216z"/></svg>
                                        <div class="d-block">
                                            <div class="reviews fs-12 fw-bold" style="color: var(--product_text_color)">
                                                &nbsp; 0
                                            </div>
                                        </div>
                                    </div>
                                    {{-- @endif --}}

                                    <div class="course-like d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="22.5" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#d6dce6" d="M0 128C0 92.7 28.7 64 64 64H320c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128zM559.1 99.8c10.4 5.6 16.9 16.4 16.9 28.2V384c0 11.8-6.5 22.6-16.9 28.2s-23 5-32.9-1.6l-96-64L416 337.1V320 192 174.9l14.2-9.5 96-64c9.8-6.5 22.4-7.2 32.9-1.6z"/></svg>
                                        <div class="d-block">
                                            <div class="reviews fs-12 fw-bold" style="color: var(--product_text_color)">
                                                &nbsp; 0
                                                {{-- {{ $event->video->count() }} --}}
                                            </div>
                                        </div>
                                    </div>

                                    <!--Start Star Rating-->
                                    <div class="star-rating__wrap d-flex align-items-center ">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="22.5" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#FFD43B" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"/></svg>
                                        <div class="d-block">
                                            {{-- @php
                                                $avg_round = round($event->reviews->avg('ratting'),1);
                                            @endphp --}}
                                            <div class="reviews fs-12 fw-bold" style="color: var(--product_text_color)">&nbsp; 0
                                                {{-- {{  $avg_round }}  --}}
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
                    @if(@$classes->count() == 0)
                    <div class="text-center">
                        <h2>Data Not Found !</h2>
                    </div>
                    @endif
                </div>

                {{-- @if($ebooks->lastPage() != 1)
                <div class="text-center my-3 loadbutton_filter_off  removebuton_86">
                    <button type="button" class="btn btn-lg btn-dark-cerulean" id="showMoreEvent">
                        Load more                        <svg class="ms-2" xmlns="http://www.w3.org/2000/svg" width="28.56" height="15.666"
                            viewBox="0 0 28.56 15.666">
                            <path id="right-arrow_3_" data-name="right-arrow (3)"
                                d="M20.727,107.5l-1.272,1.272,5.661,5.661H0v1.8H25.116l-5.661,5.661,1.272,1.272,7.833-7.833Z"
                                transform="translate(0 -107.5)" fill="#fff"></path>
                        </svg>
                    </button>
                </div>
                @endif --}}

            </div>
        </div>
    </div>
</div>


<input type="hidden" id="segment_route" value="">
<input type="hidden" id="segment_id" value="">


</div>

{{-- </div> --}}
@include('Frontend.layouts.parts.news-letter')

@endsection


@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.4/axios.min.js"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script>

    $(document).ready(function() {
        $('#classSelect').change(function() {
            var classId = $(this).val();
            if (classId != "0") {
                window.location.href = 'daily-class-video-details/' + classId;
            }
        });
    });

    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

    //Event Relete Show
    $(".on_click_eventrelease").change(function(e){
    e.preventDefault();
    let id = $(this).val();
    let cat_id =$("#event_category").val();
    let s_val = $('#search_item').val();
    console.log(id)
    $.ajax({
        type:'GET',
        url:"{{ url('event-relese-show-ajax') }}/"+id+"?cat_id="+cat_id+'&search='+s_val,
        success:function(data){
        $(".event_relese_ajax-show").html(data);
        }

    });

    });


    $(".on_click_ebook_audio_category").change(function(e){
        console.log(this);
    e.preventDefault();
    let id = $(this).val();
    //var id = document.getElementsByClassName('on_click_eventcategory').value

    console.log(id);
    $.ajax({

        type:'GET',

        url:"{{ url('/ebook-category-video-show-ajax') }}/"+id,

        // data:{id:id},

        success:function(data){
        //  document.getElementById("home-proud-hide").style.visibility = "hidden";
        $(".event_cat_ajax-show").html(data);
        }

    });



    });
</script>

@endsection



