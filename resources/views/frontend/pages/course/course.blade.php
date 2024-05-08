@extends('frontend.master')

@section('title')
    Course Page
@endsection

<style>
    .card-img-top {
        height: 200px;
    }
    .course-title {
        width: 50%;
        float: left;
        background: #2fc9ff;
        padding: 5px;
        margin-top: 15px;
        border-radius: 5px;
    }
</style>

@section('body')


    <img src="https://www.wmc.ac.uk/images/banners/Virtual-Open-Day/University_Level_Courses_banner.jpg" alt="" style="width: 100%;height: 500px;object-fit: cover;margin-top: -50px;">


    <div class="container" style="padding-top: 0px !important;">
      @php
        $category = DB::table('category')->get();
      @endphp


      @foreach ($category as $item)
      <div class="text-center justify-content-center d-flex my-3">
        <h3 class="course-title">
            {{ $item->categoryName  }}
        </h3>
      </div>
      {{-- <button class="btnn w-full py-2 fs-5 course-btn">Book Now</button> --}}

      <div class="row" style="background: #d6cbcb;">
        {{-- card-group gap-4 px-5 pt-4 pb-0 --}}



        @php
          $courses = DB::table('course')->where('catId', $item->catId)->get();
        @endphp

        @if ($courses->count() == 0)
        <center>
            <h1>😥</h1>
            <h3> No Course Available For {{ $item->categoryName }}</h3>
        </center>
        @endif

        @foreach ($courses as $course)
        <div class="col-md-3 p-0">
          <div class="card m-2">
                <img class="card-img-top" style="object-fit: cover;height: 150px;"
            src="{{ asset('/') }}video/{{ $course->image }}"
            {{-- src = "{{ asset('/video')}}/{{$course->image}}" --}}
            alt="Card image cap"
            />
            <div class="card-body justify-content-start text-center">
                <h5 class="title">
                    {{ substr_replace($course->name, "...", 15) }}
                </h5>

                {{-- <h6 class="title" style="font-size: 90%">
                    <p><span class="sub-title">
                    <b>Course Hour:</b> {{ $course->course_hour }} <br>
                    <b>Total Days:</b> {{ $course->total_days}} Days<br>
                    <b>Course Price:</b> {{ $course->price}}</span> BDT
                    </p>
                </h6> --}}
                <b><h5>{{ $course->price }} BDT</h5></b>


                <a href="/bookNow/{{ $course->id }}" class="btn btn-primary btn-sm" style="text-decoration: none;">Book Now</a>
            </div>
            <div>
                {{-- <p class="sub-text">
                To View More Details <a href="#" class="aro-dekho">See More</a>
                </p> --}}
                <p class="text-center mt-2">To know details <a href="/courseView/{{ $course->id }}">Click here</a></p>
            </div>
          </div>
        </div>
        @endforeach
      </div>


      @endforeach
    </div>
@endsection
