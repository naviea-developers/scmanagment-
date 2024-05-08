@extends('frontend.master')

@section('title')
    Course Page
@endsection

@section('body')
    <div class="container">
        @foreach ($academicData as $data )
        <div class="text-center justify-content-center d-flex my-3">
        <h3 class="course-title">{{ $data->name }}</h3>
      </div>
      <div class="row d-flex justify-content-between gap-5">
        <div class="col-md-3 col-sm-6 col-12 card m-4 gap-1 card-width">
          <img
          class="card-img-top"
          src=""
          alt="Card image cap"
        />
          <div class="card-body justify-content-start">
            <h3 class="title">
             <b> BDT</b><span class="sub-title"><sub><small>Fee</small></sub></span>
            </h4>
            <h6 class="title">
              <p><span class="sub-title">
              <b>Course Title:</b> <br>
              <b>Course Hour:</b><br>
              <b>Total Days:</b>  Days<br>
              <b>Course Price:</b> </span> BDT
              </p>
            </h6>
            <p class="course-text">
            </p>
            <button class="btnn w-full py-2 fs-5 course-btn">Book Now</button>


          </div>
          <div>
            <p class="text-center mt-2">To know details <a href="">Click here</a></p>
          </div>
        </div>
        {{-- @endforeach --}}
      </div>

      <div class="d-flex justify-content-end my-4">
        <a class="aro-dekho" href="">See More..</a>
        <i
          class="fa-regular fa-arrow-right-long mt-1"
          style="color: #187bcd"
        ></i>
      </div>
      @endforeach
    </div>
@endsection
