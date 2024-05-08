@extends('frontend.master')

@section('title')
    Course Details Page
@endsection

@section('body')

<style>
    ul {
        padding: 0px;
    }

    ul li {
        list-style: none;
        padding: 10px 0px;
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

@foreach ($courseDetails as $details)

    <div class="container ">
      <h2 class="blue-heading text-center">{{ $details->subcatId }}</h2>
      <div class="row d-flex justify-content-between mt-5">
        <div class="col-lg-3 col-md-4 col-sm-5 my-3 my-sm-0 ps-5 ps-sm-2">
          <img class="course-image" src="{{ asset('/video') }}/{{ $details->image }}" alt="" height="250" width="250"/>
        </div>
        <div class="col-lg-5 col-md-8 col-sm-7 my-3 my-sm-0 ps-5">
          <h3 class="course-details-title">{{ $details->name }}</h3>
          <p class="course-details-subtitle">by naviea learning</p>
          <p class="course-details">
            {{ $details->short_description }}
          </p>
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
        <div class="col-lg-4 col-sm-4 my-4 text-center">
          <p>Saturday April 21, 2023</p>
          <button class="buy-btn">Buy Now</button>
        </div>
      </div>

      <div class="row">
        <div class="d-flex justify-content-between my-5 gap-md-5 gap-sm-3 gap-2 disFlex">
          <div class="shadow col-md-8 col-sm-9 col-8 px-sm-3 px-2">
            <h4 class="text-center my-2 routine text-border">Course Information</h4>

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
          <div
            class="shadow col-lg-3 col-md-4 col-sm-4 col-4 px-md-4 py-4 d-flex px-sm-3 px-2 me-2 me-sm-0">
            <div class="me-2 me-sm-0">
                <ul>

                    <li>
                        <i class="fa-solid fa-screen-users"></i>
                        250+ learner
                    </li>

                    <li>
                        <i class="fa-solid fa-hand-holding-dollar"></i>
                        250+ learner
                    </li>


                    <li>
                        <i class="fa-solid fa-calendar-days"></i>
                        250+ learner
                    </li>


                    <li>
                        <i class="fa-regular fa-clock"></i>
                        250+ learner
                    </li>


                    <li>
                        <i class="fa-solid fa-arrow-turn-up"></i>
                        250+ learner
                    </li>

                    <li>
                        <i class="fa-solid fa-earth-americas"></i>
                        250+ learner
                    </li>


                </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="shadow p-4">
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
{{--
      <div class="row d-flex my-5">
        <div class="col-7 ps-5">
          <h5 class="routine pb-2">Details of this course</h5>
          <p class="course-details">
            UI refers to the screens, buttons, toggles, icons, and other visual
            elements that you interact with when using a website, app, or other
            electronic device. UX refers to the entire interaction you have with
            a product, including how you feel about the interaction
          </p>
        </div>

        <div class="col-5 d-flex flex-column ps-sm-5">
          <h5 class="routine pb-4 pb-sm-2">সম্পর্কিত কোর্স</h5>
          <p class="course-body-title ">Java Development</p>
          <p class="course-body-title ">Laravel Development</p>
          <p class="course-body-title ">Java Development</p>
          <p class="course-body-title ">Laravel Development</p>
          <p class="course-body-title ">Java Development</p>
          <p class="course-body-title ">Laravel Development</p>
        </div>
      </div> --}}

      <div class="col-5 d-flex flex-column ps-sm-5 mt-5">
        <h5 class="routine">Those who will take classes</h5>
      </div>

      <div class="row d-flex justify-content-center gap-5">
        <div class="card col-md-4 col-6">
          <img src="{{ asset('/') }}frontend/includes/images/card.png" class="card-img-top" alt="" />
          <div class="card-body">
            <h5 class="card-title mt-3" style="line-height: 1px">মালিহা আলী</h5>
            <p class="card-text">DU (7 year Exp)</p>
            <a href="#" class="btn" style="margin-top: -10px">UI Designer</a>
          </div>
        </div>
        <div class="card col-md-4 col-6">
          <img src="{{ asset('/') }}frontend/includes/images/card.png" class="card-img-top" alt="" />
          <div class="card-body">
            <h5 class="card-title mt-3" style="line-height: 1px">মালিহা আলী</h5>
            <p class="card-text">DU (7 year Exp)</p>
            <a href="#" class="btn" style="margin-top: -10px">UI Designer</a>
          </div>
        </div>
        <div class="card col-md-4 col-6">
          <img src="{{ asset('/') }}frontend/includes/images/card.png" class="card-img-top" alt="" />
          <div class="card-body">
            <h5 class="card-title mt-3" style="line-height: 1px">মালিহা আলী</h5>
            <p class="card-text">DU (7 year Exp)</p>
            <a href="#" class="btn" style="margin-top: -10px">UI Designer</a>
          </div>
        </div>
      </div>

      <div class="mt-5">
        <h5 class="routine">What students are saying</h5>
      </div>

      <div class="row d-flex justify-content-center gap-lg-4 gap-md-3 gap-5">
        <div class="card-thumbnail col-3">
          <img
            src="{{ asset('/') }}frontend/includes/images/card.png"
            class="card-img-top"
            alt=""
          />
          <div class="card-body">
            <h5 class="card-title">মালিহা আলী</h5>
            <div class="d-flex" style="font-size: 12px">
              <i class="fa-solid fa-quote-left"></i>
              <p class="card-text text-center">
                It's a simple but effective way to make your UI more visually
                appealing. There's not much to say about this
              </p>
            </div>
          </div>
        </div>
        <div class="card-thumbnail col-3">
          <img
            src="{{ asset('/') }}frontend/includes/images/card.png"
            class="card-img-top"
            alt=""
          />
          <div class="card-body">
            <h5 class="card-title">মালিহা আলী</h5>
            <div class="d-flex" style="font-size: 12px">
              <i class="fa-solid fa-quote-left"></i>
              <p class="card-text text-center">
                It's a simple but effective way to make your UI more visually
                appealing. There's not much to say about this
              </p>
            </div>
          </div>
        </div>
        <div class="card-thumbnail col-3">
          <img
            src="{{ asset('/') }}frontend/includes/images/card.png"
            class="card-img-top"
            alt=""
          />
          <div class="card-body">
            <h5 class="card-title">মালিহা আলী</h5>
            <div class="d-flex" style="font-size: 12px">
              <i class="fa-solid fa-quote-left"></i>
              <p class="card-text text-center">
                It's a simple but effective way to make your UI more visually
                appealing. There's not much to say about this
              </p>
            </div>
          </div>
        </div>
        <div class="card-thumbnail col-3">
          <img
            src="{{ asset('/') }}frontend/includes/images/card.png"
            class="card-img-top"
            alt=""
          />
          <div class="card-body">
            <h5 class="card-title">মালিহা আলী</h5>
            <div class="d-flex" style="font-size: 12px">
              <i class="fa-solid fa-quote-left"></i>
              <p class="card-text text-center">
                It's a simple but effective way to make your UI more visually
                appealing. There's not much to say about this
              </p>
            </div>
          </div>
        </div>
      </div>

      <div></div>

      <div class="">
        <h5 class="routine my-4">Question Ask</h5>
        <p>When does the class start?</p>
        <p>When will the class start?</p>
      </div>
    </div>
  </body>
</html>
@endforeach
@endsection
