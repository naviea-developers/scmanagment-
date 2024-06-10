@extends('Frontend.layouts.master-layout')
@section('title','- Alumni List')
@section('head')
@endsection
@section('main_contend')
@include('Frontend.layouts.parts.header-menu')
<br><br><br><br><br><br><br><br>

<section class="ourteam-section">
  <!-- Founder and CEO -->
  <div class="container">
      {{-- <div class="">
          <h3 class="fw-bold mb-3 text-dark-cerulean text-center text-uppercase">{{ $home_content->founder_title }}</h3>
      </div> --}}
      <div class="">
        <h3 class="fw-bold mb-3 text-dark-cerulean text-center text-uppercase">Our Alamni</h3>
    </div>
      <div class="row">
          @foreach ($alumnis as $k=> $alumni)


          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
          <div class="our-team">
              <div  data-toggle="modal" data-target="#alumniModal{{ $k }}">
                  <div class="picture">
                      <img class="img-fluid" src="{{ @$alumni->image_show }}">
                  </div>
                  <div class="team-content">
                      <h3 class="name" style="color: var(--text_color)">{{ @$alumni->name }}</h3>
                      <h4 class="title" style="color: var(--text_color)">{{ @$alumni->designation }}</h4>
                      <h4 class="title" style="color: var(--text_color)">{{ @$alumni->company_name }}</h4>
                  </div>
              </div>
            <ul class="social">
              <li><a href="{{ @$alumni->facebook_id }}" class="fab fa-facebook" aria-hidden="true"></a></li>
              <li><a href="{{ @$alumni->twitter_id }}" class="fab fa-twitter" aria-hidden="true"></a></li>
              <li><a href="{{ @$alumni->google_id }}" class="fab fa-google-plus" aria-hidden="true"></a></li>
              <li><a href="{{ @$alumni->linkedin_id }}" class="fab fa-linkedin" aria-hidden="true"></a></li>
            </ul>
          </div>
        </div>



 
<!-- Modal -->
<div class="modal fade" id="alumniModal{{ $k }}" tabindex="-1" role="dialog" aria-labelledby="alumniModalLabel{{ $k }}" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-header"  style="background: var(--menu_color)">
              <h5 class="modal-title" id="alumniModalLabel{{ $k }}" style="color: white">Alumni Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body " style="background: var(--menu_color)">
              <div class="card" >
                  <div class="card-body text-center">
                      <div class="teacher-details">
                          <img class="img-fluid" src="{{ $alumni->image_show }}" alt="Teacher Image">
                          <h3>{{ $alumni->name }}</h3>
                          <h4>{{ @$alumni->designation }}, {{ @$alumni->company_name }}</h4>
                          <h4>{!! @$alumni->description !!}</h4>
                          <ul class="social">
                              <li><a href="{{ @$alumni->facebook_id }}" target="_blank" class="fab fa-facebook" aria-hidden="true"></a></li>
                              <li><a href="{{ @$alumni->twitter_id }}" target="_blank" class="fab fa-twitter" aria-hidden="true"></a></li>
                              <li><a href="{{ @$alumni->google_id }}" target="_blank" class="fab fa-google-plus" aria-hidden="true"></a></li>
                              <li><a href="{{ @$alumni->linkedin_id }}" target="_blank" class="fab fa-linkedin" aria-hidden="true"></a></li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>




        @endforeach
      </div>
    </div>
</section>

@include('Frontend.layouts.parts.news-letter')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection



