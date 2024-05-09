@extends('Backend.layouts.layouts') @section('style')
<style>
  #myTab {
    position: absolute;
    left: 50%;
    top: 0;
    transform: translate(-50%, 0px);
    background: #18a6af;
    width: 100%;
    text-align: center;
    padding: 5px;
  }

  #home-tab {
    background: #17a2b8 !important;
    color: #fff !important;
    border: none !important;
  }

  #profile-tab {
    background: #23bf08 !important;
    color: #fff !important;
    border: none !important;
  }

  #contact-tab {
    background: #0866c6 !important;
    color: #fff !important;
    border: none !important;
  }

  #yr-tab {
    background: #6c757d !important;
    color: #fff !important;
    border: none !important;
  }
</style>
@endsection @section('main_contain')
<div class="br-mainpanel">
  {{--
  <div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Dashboard</h4>
      <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
  </div>
  --}}
  <br />
  <div class="br-pagebody">
    <div clas="tabsForReprot" style="position: relative;">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#today" type="button" role="tab" aria-controls="home" aria-selected="true">Today</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#week" type="button" role="tab" aria-controls="profile" aria-selected="false">This Week</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#month" type="button" role="tab" aria-controls="contact" aria-selected="false">This Month</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="yr-tab" data-toggle="tab" data-target="#year" type="button" role="tab" aria-controls="contact" aria-selected="false">This Year</button>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent" style="padding-top: 40px;">
        <div class="tab-pane fade show active" id="today" role="tabpanel" aria-labelledby="home-tab">
          <center>
            <h1 class="mt-2 mb-3">Today's Report</h1>
          </center>
          <div class="row row-sm">
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-danger rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  {{-- <ion-icon name="person-add-outline"></ion-icon> --}}
                  <i class="ion-ios-people tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Visitor
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $today['total_visitor'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>

            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-success rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-android-cart tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                       Total Orders
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $today['total_order'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-primary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="icon ion-grid tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total General Course
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $today['total_general_course'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-secondary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="icon ion-grid tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Master Course
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $today['total_master_course'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>

            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-secondary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="icon ion-grid tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total E-Books
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $today['total_ebook'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>

            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-secondary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="icon ion-grid tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Programs
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $today['total_programs'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>

            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-secondary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="icon ion-grid tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Universities
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $today['total_universities'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>

            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-info rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-person-add tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Customer
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $today['total_customer'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-dark rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-person tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Teacher
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $today['total_teacher'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-danger rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-android-contact tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Speakers
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $today['total_instructor'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>

            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-info rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-android-contact tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Host
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $today['total_host'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-primary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-person-add tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Seller
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $today['total_seller'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-secondary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-person-add tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Affiliate
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $today['total_affiliate'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-info rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="icon ion-clock tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Events
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $today['total_event'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>

            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-primary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="icon ion-earth tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total News & Blog
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $today['total_blog'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-success rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                   <i class="ion-ios-heart tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Subscriber
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $today['total_subscriber'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-secondary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="icon ion-document tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Testimonial
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $today['total_testimonial'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-secondary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-briefcase tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Partners
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $today['total_partner'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-warning rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-paper-airplane tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Media Partner
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $today['total_media_partner'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            {{-- <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-warning rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-briefcase tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Diagnostic
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $today['total_diagnostic'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div> --}}
            {{-- <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-secondary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-checkmark-circled tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Patient Appointment
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $today['total_appointment'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-dark rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-paper-airplane tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Service Booking
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $today['service_booking'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div> --}}

            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-warning rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-star tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Review & Ratings
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $today['total_review'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            {{-- <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-warning rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-ios-heart tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Subscriber
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $today['total_subscriber'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div> --}}
            {{-- <div class="col-sm-6 col-xl-3 mb-3">
                <div class="bg-dark rounded overflow-hidden">
                    <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                        <i class="ion-images tx-60 lh-0 tx-white op-7"></i>
                        <div class="mg-l-20">
                            <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Total Blogs</p>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">{{ $today['total_blog'] }}</p>
                        </div>
                    </div>
                    <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
             </div> --}}
             {{-- <div class="col-sm-6 col-xl-3 mb-3">
                <div class="bg-secondary rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="ion-ios-lightbulb tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Brands
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">{{ $today['total_brands'] }}</p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-primary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-email tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Message
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">0</p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-success rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-person tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Employee
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">0</p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div> --}}


            {{-- <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-info rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-android-notifications tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Notices
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">0</p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div> --}}
            {{-- <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-dark rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-paper-airplane tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Services
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">0</p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-danger rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-briefcase tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Offices
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">0</p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-danger rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-cash tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Employee Salary Data
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">0</p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-success rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-android-walk tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Employee Leave Data
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">0</p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-warning rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-home tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Departments
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">0</p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-warning rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-soup-can-outline tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Stock Out
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">0</p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div> --}}
          </div>
        </div>

        <div class="tab-pane fade" id="week" role="tabpanel" aria-labelledby="profile-tab">
          <center>
            <h1 class="mt-2 mb-3">Weekly Report</h1>
          </center>
          <div class="row row-sm">
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-danger rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-ios-people tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Visitor
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $week['total_visitor'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>

            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-warning rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-android-cart tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Orders
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $week['total_order'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-info rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="icon ion-grid tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total General Course
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $week['total_general_course'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-dark rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="icon ion-grid tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Master Course
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $week['total_master_course'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>

            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-secondary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="icon ion-grid tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total E-Books
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $week['total_ebook'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>

            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-secondary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="icon ion-grid tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Programs
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $week['total_programs'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>

            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-secondary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="icon ion-grid tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Universities
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $week['total_universities'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>

            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-danger rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-person-add tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Customer
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $week['total_customer'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-primary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-person tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Teacher
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $week['total_teacher'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-success rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-android-contact tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Speakers
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $week['total_instructor'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-info rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-android-contact tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Host
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $week['total_host'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-primary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-person-add tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Seller
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $week['total_seller'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-secondary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-person-add tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Affiliate
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $week['total_affiliate'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-info rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="icon ion-clock tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Events
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $week['total_event'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-primary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="icon ion-earth tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total News & Blog
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $week['total_blog'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-success rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                   <i class="ion-ios-heart tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Subscriber
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $week['total_subscriber'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-secondary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="icon ion-document tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Testimonial
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $week['total_testimonial'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-secondary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-briefcase tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Partners
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $week['total_partner'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-warning rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-paper-airplane tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Media Partner
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $week['total_media_partner'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            {{-- <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-warning rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-briefcase tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Diagnostic
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $week['total_diagnostic'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div> --}}
            {{-- <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-secondary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-checkmark-circled tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Patient Appointment
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $week['total_appointment'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-dark rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-paper-airplane tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Service Booking
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $week['service_booking'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div> --}}
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-warning rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-star tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Review & Ratings
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $week['total_review'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            {{-- <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-dark rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-ios-heart tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Subscriber
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $week['total_subscriber'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div> --}}
            {{-- <div class="col-sm-6 col-xl-3 mb-3">
                <div class="bg-dark rounded overflow-hidden">
                    <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                        <i class="ion-images tx-60 lh-0 tx-white op-7"></i>
                        <div class="mg-l-20">
                            <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Total Blogs</p>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">{{ $week['total_blog'] }}</p>
                        </div>
                    </div>
                    <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
             </div> --}}
             {{-- <div class="col-sm-6 col-xl-3 mb-3">
                <div class="bg-secondary rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="ion-ios-lightbulb tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Brands
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">{{ $week['total_brands'] }}</p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-warning rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-email tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Message
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">0</p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-secondary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-person tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Employee
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">0</p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div> --}}


            {{-- <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-primary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-android-notifications tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Notices
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">0</p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div> --}}
            {{-- <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-dark rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-paper-airplane tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Services
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">0</p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-danger rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-briefcase tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Offices
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">0</p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-primary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-cash tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Employee Salary Data
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">0</p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-secondary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-android-walk tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Employee Leave Data
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">0</p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-success rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-home tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Departments
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">0</p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-success rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-soup-can-outline tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Stock Out
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">0</p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div> --}}
          </div>
        </div>

        <div class="tab-pane fade" id="month" role="tabpanel" aria-labelledby="profile-tab">
          <center>
            <h1 class="mt-2 mb-3">Monthly Report</h1>
          </center>
          <div class="row row-sm">
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-danger rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-ios-people tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Visitor
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $month['total_visitor'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>

            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-dark rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-android-cart tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Orders
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $month['total_order'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-info rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="icon ion-grid tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total General Course
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $month['total_general_course'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-secondary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="icon ion-grid tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Master Course
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $month['total_master_course'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-info rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="icon ion-grid tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total E-Books
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $month['total_ebook'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>

              <div class="col-sm-6 col-xl-3 mb-3">
                <div class="bg-secondary rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="icon ion-grid tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Programs
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                        {{ $month['total_programs'] }}
                      </p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </div>
  
              <div class="col-sm-6 col-xl-3 mb-3">
                <div class="bg-secondary rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="icon ion-grid tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Universities
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                        {{ $month['total_universities'] }}
                      </p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </div>

           
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-dark rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-person-add tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Customer
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $month['total_customer'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-danger rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-person tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Teacher
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $month['total_teacher'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-success rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-android-contact tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Speakers
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $month['total_instructor'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-info rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-android-contact tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Host
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $month['total_host'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>

            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-info rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-person-add tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Seller
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $month['total_seller'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-primary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-person-add tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Affiliate
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $month['total_affiliate'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>

            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-info rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="icon ion-clock tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Events
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $month['total_event'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>

            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-primary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="icon ion-earth tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total News & Blog
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $month['total_blog'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-success rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                   <i class="ion-ios-heart tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Subscriber
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $month['total_subscriber'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-secondary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="icon ion-document tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Testimonial
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $month['total_testimonial'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-secondary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-briefcase tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Partners
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $month['total_partner'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-warning rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-paper-airplane tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Media Partner
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $month['total_media_partner'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
           {{-- <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-warning rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-briefcase tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Diagnostic
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $month['total_diagnostic'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div> --}}
            {{-- <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-secondary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-checkmark-circled tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Patient Appointment
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $month['total_appointment'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-dark rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-paper-airplane tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Service Booking
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $month['service_booking'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div> --}}
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-warning rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-star tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Review & Ratings
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $month['total_review'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            {{-- <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-warning rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-ios-heart tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Subscriber
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $month['total_subscriber'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div> --}}
            {{-- <div class="col-sm-6 col-xl-3 mb-3">
                <div class="bg-dark rounded overflow-hidden">
                    <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                        <i class="ion-images tx-60 lh-0 tx-white op-7"></i>
                        <div class="mg-l-20">
                            <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Total Blogs</p>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">{{ $month['total_blog'] }}</p>
                        </div>
                    </div>
                    <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
             </div> --}}
             {{-- <div class="col-sm-6 col-xl-3 mb-3">
                <div class="bg-secondary rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="ion-ios-lightbulb tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Brands
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">{{ $month['total_brands'] }}</p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-primary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-email tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Message
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">0</p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-success rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-person tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Employee
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">0</p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div> --}}


            {{-- <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-info rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-android-notifications tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Notices
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">0</p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div> --}}
            {{-- <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-dark rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-paper-airplane tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Services
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">0</p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-danger rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-briefcase tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Offices
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">0</p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-danger rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-cash tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Employee Salary Data
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">0</p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-success rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-android-walk tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Employee Leave Data
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">0</p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-warning rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-home tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Departments
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">0</p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-warning rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-soup-can-outline tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Stock Out
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">0</p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div> --}}
          </div>
        </div>

        <div class="tab-pane fade" id="year" role="tabpanel" aria-labelledby="profile-tab">
          <center>
            <h1 class="mt-2 mb-3">Yearly Report</h1>
          </center>
          <div class="row row-sm">
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-danger rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-ios-people tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Visitor
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $year['total_visitor'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>

            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-success rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-android-cart tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Order
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $year['total_order'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-primary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="icon ion-grid tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total General Course
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $year['total_general_course'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-info rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="icon ion-grid tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Master Course
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $year['total_master_course'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-primary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="icon ion-grid tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total E-Books
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $year['total_ebook'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>

            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-secondary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="icon ion-grid tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Programs
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $year['total_programs'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>

            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-secondary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="icon ion-grid tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Universities
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $year['total_universities'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>

            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-secondary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-person-add tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Customer
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $year['total_customer'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-dark rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-person tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Teacher
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $year['total_teacher'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-danger rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-android-contact tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Speakers
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $year['total_instructor'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-info rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-android-contact tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Host
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $year['total_host'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-primary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-person-add tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Seller
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $year['total_seller'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-secondary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-person-add tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Affiliate
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $year['total_affiliate'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-info rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="icon ion-clock tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Events
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $year['total_event'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-primary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="icon ion-earth tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total News & Blog
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $year['total_blog'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-success rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                   <i class="ion-ios-heart tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Subscriber
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $year['total_subscriber'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-secondary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="icon ion-document tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Testimonial
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $year['total_testimonial'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-secondary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-briefcase tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Partners
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $year['total_partner'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
             <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-warning rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-paper-airplane tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Media Partner
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $year['total_media_partner'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
           {{--<div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-warning rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-briefcase tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Diagnostic
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $year['total_diagnostic'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div> --}}
            {{-- <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-secondary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-checkmark-circled tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Patient Appointment
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $year['total_appointment'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-dark rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-paper-airplane tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Service Booking
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $year['service_booking'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div> --}}
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-warning rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-star tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Review & Ratings
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $year['total_review'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            {{-- <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-warning rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-ios-heart tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Subscriber
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      {{ $year['total_subscriber'] }}
                    </p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div> --}}
            {{-- <div class="col-sm-6 col-xl-3 mb-3">
                <div class="bg-dark rounded overflow-hidden">
                    <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                        <i class="ion-images tx-60 lh-0 tx-white op-7"></i>
                        <div class="mg-l-20">
                            <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Total Blogs</p>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">{{ $year['total_blog'] }}</p>
                        </div>
                    </div>
                    <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
             </div> --}}
             {{-- <div class="col-sm-6 col-xl-3 mb-3">
                <div class="bg-secondary rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="ion-ios-lightbulb tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Brands
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">{{ $year['total_brands'] }}</p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-primary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-email tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Message
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">0</p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-success rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-person tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Employee
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">0</p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div> --}}


            {{-- <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-info rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-android-notifications tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Notices
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">0</p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div> --}}
            {{-- <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-dark rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-paper-airplane tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Services
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">0</p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-danger rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-briefcase tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Offices
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">0</p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-danger rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-cash tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Employee Salary Data
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">0</p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-success rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-android-walk tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Employee Leave Data
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">0</p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-warning rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-home tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Departments
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">0</p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="bg-warning rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion-soup-can-outline tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                      Total Stock Out
                    </p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">0</p>
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
            </div> --}}
          </div>
        </div>
      </div>
    </div>
    <!-- br-pagebody -->
    <footer class="br-footer">
      <div class="footer-left">
        <div class="mg-b-2">Copyright &copy; 2024. Naviea Soft. All Rights Reserved.</div>
        <div>Attentively and carefully made by Naviea Soft.</div>
      </div>
      <div class="footer-right d-flex align-items-center">
        <span class="tx-uppercase mg-r-10">Share:</span>
        <a target="_blank" class="pd-x-5" href="https://www.facebook.com/sharer/sharer.php?u=http%3A//themepixels.me/bracketplus/intro"><i class="fab fa-facebook tx-20"></i></a>
        <a
          target="_blank"
          class="pd-x-5"
          href="https://twitter.com/home?status=Bracket%20Plus,%20your%20best%20choice%20for%20premium%20quality%20admin%20template%20from%20Bootstrap.%20Get%20it%20now%20at%20http%3A//themepixels.me/bracketplus/intro"
        >
          <i class="fab fa-twitter tx-20"></i>
        </a>
      </div>
    </footer>
  </div>
  <!-- br-mainpanel -->
  @endsection @section('script')
  <script src="{{ asset('public/backend') }}/js/ResizeSensor.js"></script>
  <script src="{{ asset('public/backend') }}/js/dashboard.js"></script>
  @endsection
</div>
