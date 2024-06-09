@extends('Frontend.layouts.master-layout')
@section('title','- Topper Student')
@section('head')
@endsection
@section('main_contend')
@include('Frontend.layouts.parts.header-menu')
<br><br><br><br><br><br><br><br>

<section class="ourteam-section">
    <!-- Toppers -->
    <div class="container">
        <div class="">
            <h3 class="fw-bold mb-3 text-dark-cerulean text-center text-uppercase">Topper Student</h3>
        </div>
        <div class="row">
            @foreach ($toppers as $topper)


            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="our-team" data-toggle="modal" data-id="1" data-target=".bd-example-modal-lg" onclick="ViewDetailsModel(1)">
              <div class="picture">
                <img class="img-fluid" src="{{ @$topper->student->image_show }}">
              </div>
              <div class="team-content">
                <h3 class="name" style="color: var(--text_color)">{{ @$topper->student->student_name }}</h3>
                <h4 class="title" style="color: var(--text_color)">{{ @$topper->examination->name }}-{{ @$topper->academic_year->year }}</h4>
				<h4 class="title" style="color: var(--text_color)">{{ @$topper->class->name }}, GPA: {{ @$topper->result }}</h4>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
</section>

@include('Frontend.layouts.parts.news-letter')

@endsection



