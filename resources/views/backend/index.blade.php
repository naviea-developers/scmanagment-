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
              <a href="{{ route('admin.school_student.index') }}">
                <div class="bg-success rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="ion-person tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Student
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                        {{ $today['total_student'] }}
                      </p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </a>
            </div>
          
            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.teacher.index') }}">
                <div class="bg-secondary rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="ion-person tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Teacher
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                        {{ $today['total_teachers'] }}
                      </p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </a>
            </div>

            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.staff.index') }}">
                <div class="bg-dark rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="ion-person tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Staff
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                        {{ $today['total_staff'] }}
                      </p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </a>
            </div>

            

            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.class.index') }}">
                <div class="bg-secondary rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="icon ion-grid tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Class
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                        {{ $today['total_class'] }}
                      </p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </a>
            </div>

            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.school_section.index') }}">
                <div class="bg-secondary rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="icon ion-grid tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Section
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                        {{ $today['total_section'] }}
                      </p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </a>
            </div>

           
            
            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.group.index') }}">
                <div class="bg-danger rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="ion-android-contact tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Group
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                        {{ $today['total_group'] }}
                      </p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </a>
            </div>

            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.subject.index') }}">
                <div class="bg-info rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="ion-android-contact tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Subject
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                        {{ $today['total_subject'] }}
                      </p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </a>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.daily_class.index') }}">
                <div class="bg-primary rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="ion-person-add tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Daily Class
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                        {{ $today['total_daily_class'] }}
                      </p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </a>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.book.index') }}">
                <div class="bg-secondary rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="ion-person-add tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Library Book
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                        {{ $today['total_library_book'] }}
                      </p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </a>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.ebook.index') }}">
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
              </a>
            </div>
            
            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.notice.index') }}">
                <div class="bg-dark rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="ion-person tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Notice
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                        {{ $today['total_notice'] }}
                      </p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </a>
            </div>
           
            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.event.index') }}">
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
              </a>
            </div>

            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('blog.index') }}">
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
              </a>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.subscriber.index') }}">
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
              </a>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.manage_testimonial') }}">
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
              </a>
            </div>
            {{-- <div class="col-sm-6 col-xl-3 mb-3">
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
              <a href="{{ route('admin.school_student.index') }}">
                <div class="bg-warning rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="ion-person tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Student
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                        {{ $week['total_student'] }}
                      </p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </a>
            </div>
           
            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.teacher.index') }}">
                <div class="bg-dark rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="ion-person tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Teacher
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                        {{ $week['total_teachers'] }}
                      </p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </a>
            </div>

            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.staff.index') }}">
                <div class="bg-primary rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="ion-person tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Staff
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                        {{ $week['total_staff'] }}
                      </p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </a>
            </div>

           

            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.class.index') }}">
                <div class="bg-secondary rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="icon ion-grid tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Class
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                        {{ $week['total_class'] }}
                      </p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </a>
            </div>

            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.school_section.index') }}">
                <div class="bg-secondary rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="icon ion-grid tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Section
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                        {{ $week['total_section'] }}
                      </p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </a>
            </div>

            
            
            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.group.index') }}">
                <div class="bg-success rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="ion-android-contact tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Group
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                        {{ $week['total_group'] }}
                      </p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </a>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.subject.index') }}">
                <div class="bg-info rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="ion-android-contact tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Subject
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                        {{ $week['total_subject'] }}
                      </p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </a>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.daily_class.index') }}">
                <div class="bg-primary rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="ion-person-add tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Daily Class
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                        {{ $week['total_daily_class'] }}
                      </p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </a>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.book.index') }}">
                <div class="bg-secondary rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="ion-person-add tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Library Book
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                        {{ $week['total_library_book'] }}
                      </p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </a>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.ebook.index') }}">
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
              </a>
            </div>

            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.notice.index') }}">
                <div class="bg-primary rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="ion-person tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Notice
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                        {{ $week['total_notice'] }}
                      </p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </a>
            </div>

            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.event.index') }}">
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
              </a>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('blog.index') }}">
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
              </a>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.subscriber.index') }}">
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
              </a>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.manage_testimonial') }}">
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
              </a>
            </div>
            {{-- <div class="col-sm-6 col-xl-3 mb-3">
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
              <a href="{{ route('admin.school_student.index') }}">
                <div class="bg-dark rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="ion-person tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Student
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                        {{ $month['total_student'] }}
                      </p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </a>
            </div>
           
            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.teacher.index') }}">
                <div class="bg-secondary rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="ion-person tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Teacher
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                        {{ $month['total_teachers'] }}
                      </p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </a>
            </div>

            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.staff.index') }}">
                <div class="bg-danger rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="ion-person tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Staff
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                        {{ $month['total_staff'] }}
                      </p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </a>
            </div>


            

              <div class="col-sm-6 col-xl-3 mb-3">
                <a href="{{ route('admin.class.index') }}">
                  <div class="bg-secondary rounded overflow-hidden">
                    <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                      <i class="icon ion-grid tx-60 lh-0 tx-white op-7"></i>
                      <div class="mg-l-20">
                        <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                          Total Class
                        </p>
                        <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                          {{ $month['total_class'] }}
                        </p>
                      </div>
                    </div>
                    <div id="ch3" class="ht-50 tr-y-1"></div>
                  </div>
                </a>
              </div>
  
              <div class="col-sm-6 col-xl-3 mb-3">
                <a href="{{ route('admin.school_section.index') }}">
                  <div class="bg-secondary rounded overflow-hidden">
                    <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                      <i class="icon ion-grid tx-60 lh-0 tx-white op-7"></i>
                      <div class="mg-l-20">
                        <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                          Total Section
                        </p>
                        <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                          {{ $month['total_section'] }}
                        </p>
                      </div>
                    </div>
                    <div id="ch3" class="ht-50 tr-y-1"></div>
                  </div>
                </a>
              </div>

         
           
            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.group.index') }}">
                <div class="bg-success rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="ion-android-contact tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Group
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                        {{ $month['total_group'] }}
                      </p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </a>
            </div>

            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.subject.index') }}">
                <div class="bg-info rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="ion-android-contact tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Subject
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                        {{ $month['total_subject'] }}
                      </p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </a>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.daily_class.index') }}">
                <div class="bg-info rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="ion-person-add tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Daily Class
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                        {{ $month['total_daily_class'] }}
                      </p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </a>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.book.index') }}">
                <div class="bg-primary rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="ion-person-add tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Library Book
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                        {{ $month['total_library_book'] }}
                      </p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </a>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.ebook.index') }}">
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
              </a>
            </div>

            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.notice.index') }}">
                <div class="bg-danger rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="ion-person tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Notice
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                        {{ $month['total_notice'] }}
                      </p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </a>
            </div>

            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.event.index') }}">
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
              </a>
            </div>

            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('blog.index') }}">
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
              </a>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.subscriber.index') }}">
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
              </a>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.manage_testimonial') }}">
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
              </a>
            </div>
            {{-- <div class="col-sm-6 col-xl-3 mb-3">
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
              <a href="{{ route('admin.school_student.index') }}">
                <div class="bg-success rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="ion-person tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Student
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                        {{ $year['total_student'] }}
                      </p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </a>
            </div>
           
            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.teacher.index') }}">
                <div class="bg-info rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="ion-person tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Teacher
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                        {{ $year['total_teachers'] }}
                      </p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </a>
            </div>

            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.staff.index') }}">
                <div class="bg-dark rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="ion-person tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Staff
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                        {{ $year['total_staff'] }}
                      </p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </a>
            </div>

           

            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.class.index') }}">
                <div class="bg-secondary rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="icon ion-grid tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Class
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                        {{ $year['total_class'] }}
                      </p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </a>
            </div>

            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.school_section.index') }}">
                <div class="bg-secondary rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="icon ion-grid tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Section
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                        {{ $year['total_section'] }}
                      </p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </a>
            </div>

           
            
            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.group.index') }}">
                <div class="bg-danger rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="ion-android-contact tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Group
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                        {{ $year['total_group'] }}
                      </p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </a>
            </div>

            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.subject.index') }}">
                <div class="bg-info rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="ion-android-contact tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Subject
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                        {{ $year['total_subject'] }}
                      </p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </a>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.daily_class.index') }}">
                <div class="bg-primary rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="ion-person-add tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Daily Class
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                        {{ $year['total_daily_class'] }}
                      </p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </a>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.book.index') }}">
                <div class="bg-secondary rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="ion-person-add tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Library Book
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                        {{ $year['total_library_book'] }}
                      </p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </a>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.ebook.index') }}">
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
              </a>
            </div>

            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.notice.index') }}">
                <div class="bg-dark rounded overflow-hidden">
                  <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="ion-person tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Total Notice
                      </p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                        {{ $year['total_notice'] }}
                      </p>
                    </div>
                  </div>
                  <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
              </a>
            </div>
            
            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.event.index') }}">
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
              </a>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('blog.index') }}">
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
              </a>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.subscriber.index') }}">
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
              </a>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <a href="{{ route('admin.manage_testimonial') }}">
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
              </a>
            </div>
            {{-- <div class="col-sm-6 col-xl-3 mb-3">
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
