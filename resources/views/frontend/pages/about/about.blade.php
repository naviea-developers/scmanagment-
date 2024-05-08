@extends('frontend.master')

@section('title')
    About Page
@endsection

@section('css')
<link rel="icon" href="{{ asset('/') }}frontend/aboutassets/img/icons/Favicon.svg" type="image/gif" sizes="16x16">

<!-- Custom css -->
<link rel="stylesheet" href="{{ asset('/') }}frontend/aboutassets/css/style.css">
<link rel="stylesheet" href="{{ asset('/') }}frontend/aboutassets/css/responsive.css">

<!-- Swiper js -->
<link rel="stylesheet" href="{{ asset('/') }}frontend/aboutassets/css/swiper-bundle.min.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('/') }}frontend/aboutassets/css/all.min.css">
<link rel="stylesheet" href="{{ asset('/') }}frontend/aboutassets/css/fontawesome.min.css">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('/') }}frontend/aboutassets/css/bootstrap.min.css">
@endsection

@section('body')

<style>


@media only screen and (max-width: 768px) {
    iframe{
        margin-top: 255px !important;
    }
    .aboutUs-menu{
        margin-top: 299px;
    }
}
</style>

<!-- About us hero wrapper -->
<section class="about-us-section" style="width:100%;float:left;">
    <div class="container" style="min-width: 100%;padding: 0px;">
        <div class="row">
            <div class="col-md-12">
                <br>
                <br>
                <br>
                <div class="about-us-hero-content py-5">
                    {{-- <h2>About NavieaSoft Ltd</h2>
                    <i class="fa fa-play-circle" aria-hidden="true"></i> --}}
                    <iframe width="100%" height="500" src="https://www.youtube.com/embed/SaQ37662wl0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About us hero wrapper -->

<!-- About us menus -->
<section class="aboutUs-menu" style="float: left;width:100%;">
    <div class="container"  style="min-width: 100%;padding: 0px;">
        <div class="row">
            <div class="col-md-12">
                <div class="about-us-navigation " id="AboutUsNavbar">
                    <ul>
                        <li><a href="#about-us">About Us</a></li>
                        <li><a href="#our-team">Our Team</a></li>
                        {{-- <li><a href="#explore">Explore NavieaSoft</a></li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About us menus -->

<!-- About Us Content -->
<section>
    <div class="container" id="about-us">
        <div class="row">
            <div class="col-md-12">
                <div class="about-us-content" >
                    <div class="about-us-content-title text-center py-5">
                        <h2>About Us</h2>
                        <p>Our vision is to create technology that makes life better for everyone, everywhere — every person, every organization, and every community around the globe. This motivates us — inspires us — to do what we do. To make what we make. To invent, and to reinvent. To engineer experiences that amaze. We won’t stop pushing ahead, because you won’t stop pushing ahead. You’re reinventing how you work. How you play. How you live. With our technology, you’ll reinvent your world.</p>
                        <p class="font-weight-bold">This is our calling. This is a new NavieaSoft. <br>
                            Keep reinventing.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Us Content -->

<!-- About us big tilte with backgorund -->
<section class="about-us-big-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="about-us-big text-center">
                    <h2>Executive Leadership</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About us big tilte with backgorund -->



<!-- Our Team || Profile card section -->
<section class="ourteam-section" id="our-team">

    <!-- Founder and CEO -->
    <div class="container">
        <div class="our-team-title">
            <h2>Founder And CEO</h2>
        </div>
        <div class="row">
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="our-team" data-toggle="modal" data-target=".bd-example-modal-lg">
              <div class="picture">
                <img class="img-fluid" src="{{ asset('/') }}frontend/aboutassets/img/people/1.webp">
              </div>
              <div class="team-content">
                <h3 class="name">Michele Miller</h3>
                <h4 class="title">Web Developer</h4>
              </div>
              <ul class="social">
                <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-facebook" aria-hidden="true"></a></li>
                <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-twitter" aria-hidden="true"></a></li>
                <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-google-plus" aria-hidden="true"></a></li>
                <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-linkedin" aria-hidden="true"></a></li>
              </ul>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="our-team">
              <div class="picture">
                <img class="img-fluid" src="{{ asset('/') }}frontend/aboutassets/img/people/2.webp">
              </div>
              <div class="team-content">
                <h3 class="name">Michele Miller</h3>
                <h4 class="title">Web Developer</h4>
              </div>
              <ul class="social">
                <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-facebook" aria-hidden="true"></a></li>
                <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-twitter" aria-hidden="true"></a></li>
                <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-google-plus" aria-hidden="true"></a></li>
                <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-linkedin" aria-hidden="true"></a></li>
              </ul>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="our-team">
              <div class="picture">
                <img class="img-fluid" src="{{ asset('/') }}frontend/aboutassets/img/people/3.webp">
              </div>
              <div class="team-content">
                <h3 class="name">Michele Miller</h3>
                <h4 class="title">Web Developer</h4>
              </div>
              <ul class="social">
                <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-facebook" aria-hidden="true"></a></li>
                <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-twitter" aria-hidden="true"></a></li>
                <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-google-plus" aria-hidden="true"></a></li>
                <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-linkedin" aria-hidden="true"></a></li>
              </ul>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="our-team">
              <div class="picture">
                <img class="img-fluid" src="{{ asset('/') }}frontend/aboutassets/img/people/4.webp">
              </div>
              <div class="team-content">
                <h3 class="name">Michele Miller</h3>
                <h4 class="title">Web Developer</h4>
              </div>
              <ul class="social">
                <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-facebook" aria-hidden="true"></a></li>
                <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-twitter" aria-hidden="true"></a></li>
                <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-google-plus" aria-hidden="true"></a></li>
                <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-linkedin" aria-hidden="true"></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <!-- Co-Founder -->
      <div class="container">
          <div class="our-team-title">
              <h2>Co-Founder</h2>
          </div>
          <div class="row">
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
              <div class="our-team" data-toggle="modal" data-target=".bd-example-modal-lg">
                <div class="picture">
                  <img class="img-fluid" src="{{ asset('/') }}frontend/aboutassets/img/people/1.webp">
                </div>
                <div class="team-content">
                  <h3 class="name">Michele Miller</h3>
                  <h4 class="title">Web Developer</h4>
                </div>
                <ul class="social">
                  <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-facebook" aria-hidden="true"></a></li>
                  <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-twitter" aria-hidden="true"></a></li>
                  <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-google-plus" aria-hidden="true"></a></li>
                  <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-linkedin" aria-hidden="true"></a></li>
                </ul>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
              <div class="our-team">
                <div class="picture">
                  <img class="img-fluid" src="{{ asset('/') }}frontend/aboutassets/img/people/2.webp">
                </div>
                <div class="team-content">
                  <h3 class="name">Michele Miller</h3>
                  <h4 class="title">Web Developer</h4>
                </div>
                <ul class="social">
                  <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-facebook" aria-hidden="true"></a></li>
                  <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-twitter" aria-hidden="true"></a></li>
                  <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-google-plus" aria-hidden="true"></a></li>
                  <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-linkedin" aria-hidden="true"></a></li>
                </ul>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
              <div class="our-team">
                <div class="picture">
                  <img class="img-fluid" src="{{ asset('/') }}frontend/aboutassets/img/people/3.webp">
                </div>
                <div class="team-content">
                  <h3 class="name">Michele Miller</h3>
                  <h4 class="title">Web Developer</h4>
                </div>
                <ul class="social">
                  <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-facebook" aria-hidden="true"></a></li>
                  <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-twitter" aria-hidden="true"></a></li>
                  <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-google-plus" aria-hidden="true"></a></li>
                  <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-linkedin" aria-hidden="true"></a></li>
                </ul>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
              <div class="our-team">
                <div class="picture">
                  <img class="img-fluid" src="{{ asset('/') }}frontend/aboutassets/img/people/4.webp">
                </div>
                <div class="team-content">
                  <h3 class="name">Michele Miller</h3>
                  <h4 class="title">Web Developer</h4>
                </div>
                <ul class="social">
                  <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-facebook" aria-hidden="true"></a></li>
                  <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-twitter" aria-hidden="true"></a></li>
                  <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-google-plus" aria-hidden="true"></a></li>
                  <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-linkedin" aria-hidden="true"></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Shareholders -->
        <div class="container">
            <div class="our-team-title">
                <h2>Shareholders</h2>
            </div>
            <div class="row">
              <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="our-team" data-toggle="modal" data-target=".bd-example-modal-lg">
                  <div class="picture">
                    <img class="img-fluid" src="{{ asset('/') }}frontend/aboutassets/img/people/1.webp">
                  </div>
                  <div class="team-content">
                    <h3 class="name">Michele Miller</h3>
                    <h4 class="title">Web Developer</h4>
                  </div>
                  <ul class="social">
                    <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-facebook" aria-hidden="true"></a></li>
                    <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-twitter" aria-hidden="true"></a></li>
                    <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-google-plus" aria-hidden="true"></a></li>
                    <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-linkedin" aria-hidden="true"></a></li>
                  </ul>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="our-team">
                  <div class="picture">
                    <img class="img-fluid" src="{{ asset('/') }}frontend/aboutassets/img/people/2.webp">
                  </div>
                  <div class="team-content">
                    <h3 class="name">Michele Miller</h3>
                    <h4 class="title">Web Developer</h4>
                  </div>
                  <ul class="social">
                    <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-facebook" aria-hidden="true"></a></li>
                    <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-twitter" aria-hidden="true"></a></li>
                    <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-google-plus" aria-hidden="true"></a></li>
                    <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-linkedin" aria-hidden="true"></a></li>
                  </ul>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="our-team">
                  <div class="picture">
                    <img class="img-fluid" src="{{ asset('/') }}frontend/aboutassets/img/people/3.webp">
                  </div>
                  <div class="team-content">
                    <h3 class="name">Michele Miller</h3>
                    <h4 class="title">Web Developer</h4>
                  </div>
                  <ul class="social">
                    <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-facebook" aria-hidden="true"></a></li>
                    <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-twitter" aria-hidden="true"></a></li>
                    <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-google-plus" aria-hidden="true"></a></li>
                    <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-linkedin" aria-hidden="true"></a></li>
                  </ul>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="our-team">
                  <div class="picture">
                    <img class="img-fluid" src="{{ asset('/') }}frontend/aboutassets/img/people/4.webp">
                  </div>
                  <div class="team-content">
                    <h3 class="name">Michele Miller</h3>
                    <h4 class="title">Web Developer</h4>
                  </div>
                  <ul class="social">
                    <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-facebook" aria-hidden="true"></a></li>
                    <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-twitter" aria-hidden="true"></a></li>
                    <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-google-plus" aria-hidden="true"></a></li>
                    <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-linkedin" aria-hidden="true"></a></li>
                  </ul>
                </div>
              </div>
            </div>
        </div>

        <!-- Developement Team -->
        <div class="container">
            <div class="our-team-title">
                <h2>Developement Team</h2>
            </div>
            <div class="row">
              <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="our-team" data-toggle="modal" data-target=".bd-example-modal-lg">
                  <div class="picture">
                    <img class="img-fluid" src="{{ asset('/') }}frontend/aboutassets/img/people/1.webp">
                  </div>
                  <div class="team-content">
                    <h3 class="name">Michele Miller</h3>
                    <h4 class="title">Web Developer</h4>
                  </div>
                  <ul class="social">
                    <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-facebook" aria-hidden="true"></a></li>
                    <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-twitter" aria-hidden="true"></a></li>
                    <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-google-plus" aria-hidden="true"></a></li>
                    <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-linkedin" aria-hidden="true"></a></li>
                  </ul>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="our-team">
                  <div class="picture">
                    <img class="img-fluid" src="{{ asset('/') }}frontend/aboutassets/img/people/2.webp">
                  </div>
                  <div class="team-content">
                    <h3 class="name">Michele Miller</h3>
                    <h4 class="title">Web Developer</h4>
                  </div>
                  <ul class="social">
                    <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-facebook" aria-hidden="true"></a></li>
                    <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-twitter" aria-hidden="true"></a></li>
                    <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-google-plus" aria-hidden="true"></a></li>
                    <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-linkedin" aria-hidden="true"></a></li>
                  </ul>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="our-team">
                  <div class="picture">
                    <img class="img-fluid" src="{{ asset('/') }}frontend/aboutassets/img/people/3.webp">
                  </div>
                  <div class="team-content">
                    <h3 class="name">Michele Miller</h3>
                    <h4 class="title">Web Developer</h4>
                  </div>
                  <ul class="social">
                    <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-facebook" aria-hidden="true"></a></li>
                    <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-twitter" aria-hidden="true"></a></li>
                    <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-google-plus" aria-hidden="true"></a></li>
                    <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-linkedin" aria-hidden="true"></a></li>
                  </ul>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="our-team">
                  <div class="picture">
                    <img class="img-fluid" src="{{ asset('/') }}frontend/aboutassets/img/people/4.webp">
                  </div>
                  <div class="team-content">
                    <h3 class="name">Michele Miller</h3>
                    <h4 class="title">Web Developer</h4>
                  </div>
                  <ul class="social">
                    <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-facebook" aria-hidden="true"></a></li>
                    <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-twitter" aria-hidden="true"></a></li>
                    <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-google-plus" aria-hidden="true"></a></li>
                    <li><a href="https://www.facebook.com/navieasoft/" class="fa fa-linkedin" aria-hidden="true"></a></li>
                  </ul>
                </div>
              </div>
            </div>
        </div>
</section>
<!-- Our Team || Profile card section -->

<!-- Card modal -->
<!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content ">
        <div class="closeIcon text-right">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
            <!-- Main card details -->
            <div class="card-details-wrapper">

                <!-- Hero -->
                <div class="card-details-hero">
                    <div class="card-details-profile">
                        <img src="{{ asset('/') }}frontend/aboutassets/img/people/1.webp" width="100%" alt="">
                    </div>
                    <div class="card-details-content-area">
                        <h2>Daniyel Mathew</h2>
                        <p>Chif Executive Manager</p>
                    </div>
                </div>

                <!-- Content Area -->
                <div class="card-details-content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis id enim dolorem quidem quo explicabo cum rem officiis commodi provident.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis id enim dolorem quidem quo explicabo cum rem officiis commodi provident.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis id enim dolorem quidem quo explicabo cum rem officiis commodi provident.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis id enim dolorem quidem quo explicabo cum rem officiis commodi provident.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis id enim dolorem quidem quo explicabo cum rem officiis commodi provident.</p>
                </div>
            </div>
            <!-- Main card details -->
      </div>
    </div>
  </div>
<!-- Card modal -->


<!-- Explore Blog -->
{{-- <section class="explore-section">
    <div class="container"  id="explore">
        <div class="row">
            <div class="col-md-12">

                <!-- Explore blog title -->
                <div class="explore-blog-title">
                    <h2>Explore Our Latest Blog</h2>
                </div>

                <div class="about-us-blog-wrapper">

                    <!-- about us items -->
                    <a class="about-blog-a" href="{{ route('singleabout') }}">
                        <div class="about-us-box">
                            <div class="about-us-blog-featured-image">
                                <img src="{{ asset('/') }}frontend/aboutassets/img/people/03.webp" alt="">
                            </div>
                            <div class="about-us-box-content">
                                <h2>The Garage by NavieaSoft</h2>
                                <p>Discover stories about about innovation, reinvention and how technology is changing the world.</p>
                                <button>Read More</button>
                            </div>
                        </div>
                    </a>
                    <!-- about us items -->
                    <a class="about-blog-a" href="{{ route('singleabout') }}">
                        <div class="about-us-box">
                            <div class="about-us-blog-featured-image">
                                <img src="{{ asset('/') }}frontend/aboutassets/img/people/02.webp" alt="">
                            </div>
                            <div class="about-us-box-content">
                                <h2>The Garage by NavieaSoft</h2>
                                <p>Discover stories about about innovation, reinvention and how technology is changing the world.</p>
                                <button>Read More</button>
                            </div>
                        </div>
                    </a>
                    <!-- about us items -->
                    <a class="about-blog-a" href="{{ route('singleabout') }}">
                        <div class="about-us-box">
                            <div class="about-us-blog-featured-image">
                                <img src="{{ asset('/') }}frontend/aboutassets/img/people/01.webp" alt="">
                            </div>
                            <div class="about-us-box-content">
                                <h2>The Garage by NavieaSoft</h2>
                                <p>Discover stories about about innovation, reinvention and how technology is changing the world.</p>
                                <button>Read More</button>
                            </div>
                        </div>
                    </a>

                </div>
                <div class="about-us-blog-wrapper">

                    <!-- about us items -->
                    <a class="about-blog-a" href="{{ route('singleabout') }}">
                        <div class="about-us-box">
                            <div class="about-us-blog-featured-image">
                                <img src="{{ asset('/') }}frontend/aboutassets/img/people/03.webp" alt="">
                            </div>
                            <div class="about-us-box-content">
                                <h2>The Garage by NavieaSoft</h2>
                                <p>Discover stories about about innovation, reinvention and how technology is changing the world.</p>
                                <button>Read More</button>
                            </div>
                        </div>
                    </a>
                    <!-- about us items -->
                    <a class="about-blog-a" href="{{ route('singleabout') }}">
                        <div class="about-us-box">
                            <div class="about-us-blog-featured-image">
                                <img src="{{ asset('/') }}frontend/aboutassets/img/people/02.webp" alt="">
                            </div>
                            <div class="about-us-box-content">
                                <h2>The Garage by NavieaSoft</h2>
                                <p>Discover stories about about innovation, reinvention and how technology is changing the world.</p>
                                <button>Read More</button>
                            </div>
                        </div>
                    </a>
                    <!-- about us items -->
                    <a class="about-blog-a" href="{{ route('singleabout') }}">
                        <div class="about-us-box">
                            <div class="about-us-blog-featured-image">
                                <img src="{{ asset('/') }}frontend/aboutassets/img/people/01.webp" alt="">
                            </div>
                            <div class="about-us-box-content">
                                <h2>The Garage by NavieaSoft</h2>
                                <p>Discover stories about about innovation, reinvention and how technology is changing the world.</p>
                                <button>Read More</button>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- Explore Blog -->

@endsection

    @section('script')
        <!-- Script files -->
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/swiper-bundle.min.js"></script>
        <script src="js/apps.js"></script>
    @endsection
