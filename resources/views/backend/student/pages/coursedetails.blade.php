@extends('backend.student.master')

@section('content')
<style>
    ul {
        padding: 0px;
    }

    ul li {
        list-style: none;
    }

    ul li i {
        padding-right: 20px;
    }


@media only screen and (max-width: 1000px) {
  .shadow  {
    min-width: 100%;
  }
  .disFlex {
    display: unset !important;
  }

  .container {
    min-width: 100%;
  }

  ul {
    padding-left: 30px;
  }

  .card-thumbnail {
    min-width: 50%;
    padding: 80px;
  }
}



@media only screen and (max-width: 700px) {
    .card-title {
        text-align: center;
    }

    .card-thumbnail {
        width: 50% !important;
        padding: 40px !important;
    }
}



@media only screen and (max-width: 550px) {
    .card {
        width: 100% !important;
        margin-bottom: 20px;
    }

    .card-thumbnail {
        width: 100% !important;
        padding: 40px !important;
    }
}

</style>
    <div class="row mt-5">
      @foreach ($courseDetails as $details)

            <div class="container">
              <h2 class="blue-heading text-center">{{ $details->subcatId }}</h2>
              <div class="row d-flex justify-content-between mt-5" style="background: #fff;">
                <div class="col-lg-3 col-md-4 col-sm-5 my-3 my-sm-0 ps-5 ps-sm-2">
                  <img class="course-image" src="{{ asset('/video') }}/{{ $details->image }}" alt="" height="250" width="250"/>
                </div>
                <div class="col-lg-5 col-md-8 col-sm-7 my-3 my-sm-0 ps-5"  style="background: #fff;">
                  <div style="padding: 20px;">
                    <h3 class="course-details-title">{{ $details->name }}</h3>
                    <p class="course-details-subtitle">by naviea learning</p>
                    <p class="course-details">
                        {{ $details->short_description }}
                    </p>
                  </div>
                  <div class="d-flex gap-5">
                    <div class="">
                      <i class="fa-solid fa-star-sharp" style="color: #de7b06"></i>
                      <i class="fa-solid fa-star-sharp" style="color: #de7b06"></i>
                      <i class="fa-solid fa-star-sharp" style="color: #de7b06"></i>
                      <i class="fa-solid fa-star-sharp" style="color: #de7b06"></i>
                      <i class="fa-solid fa-star-sharp" style="color: #a8a8a8"></i>
                    </div>
                    <p>(20+ reviews)</p>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="shadow col-md-12 col-sm-9 col-8 px-sm-3 px-2"  style="background: #fff;">
                    <h4 class="text-center my-2 routine text-border">Course Information</h4>
                <div class="d-flex justify-content-between my-5 gap-md-5 gap-sm-3 gap-2 disFlex"  style="background: #fff;">

                    <div class="d-flex justify-content-between my-4">
                      <div class="d-flex flex-column gap-3">
                        <h5 class="course-body">Category Name</h5>
                        <p class="course-body">Price</p>
                        <p class="course-body">Time Duration</p>
                        <p class="course-body">Total Days</p>
                        <p class="course-body"></p>
                      </div>
                      <div class="d-flex flex-column gap-3">
                        <p class="course-body">--</p>
                        <p class="course-body">--</p>
                        <p class="course-body">--</p>
                        <p class="course-body">--</p>
                      </div>
                      <div class="d-flex flex-column gap-3">
                        <h5 class="course-body-title">{{ $details->categoryName }}</h5>
                        <p class="course-body">{{ $details->price }}BDT</p>
                        <p class="course-body">{{ $details->course_hour }}</p>
                        <p class="course-body">{{ $details->total_days }}</p>
                      </div>
                    </div>
                  </div>
                <div>
                  <h5 class="routine pb-2">About This Course</h5>
                  <p class="course-details">
                   {{ $details->long_description }}
                  </p>
                  <div class="d-flex gap-4" style="color: #1167b1">
                    <span>
                      <i class="fa-solid fa-circle-plus"></i>
                    </span>
                    <p>see more</p>
                  </div>
                </div>
                <div>
                  <h5 class="routine pb-2">What you learn ?</h5>
                  <p class="course-details">
                    -{!! str_replace("|","<br>-" , $details->feature) !!}
                  </p>
                  <div class="d-flex gap-4" style="color: #1167b1">
                    <span>
                      <i class="fa-solid fa-circle-plus"></i>
                    </span>
                    <p>see more</p>
                  </div>
                </div>
                <div>
                  <h5 class="routine pb-2">Instructors</h5>
                  <p class="course-details">
                   {{ $details->short_description }}
                  </p>
                </div>
              </div>
            </div>
          </body>
        </html>
        @endforeach
    </div>

    <style>

    </style>
    @endsection
