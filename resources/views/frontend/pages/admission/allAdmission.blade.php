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
    .admissionCard {
        border: 1px solid #3CACAE;
        padding: 10px;
        border-radius: 5px;
        height: 160px;
    }

    .admissionCard img {
        margin: 0 auto;
        display: block;
        height: 100px;
    }

    .admissionCard a {
        text-decoration: none;
        color: #000;
    }
</style>

<div class="container">
   <div class="row">
    @foreach ($allAdmission as $i=>$allAc)
    @if ($i > 3)
        @php
            $i = 0;
        @endphp
    @endif
    <div class="col-md-3 p-2">
        <div class="admissionCard">
            <a href="/admissionView/{{ str_replace(" ","-",$allAc->subCategoryName) }}">
            <center>
                <img src="{{ asset('img/homepage_admission_icon/icon'.$i.'.png') }}" alt="">
                {{ $allAc->subCategoryName }}
            </center>
         </a>
        </div>
    </div>
    @endforeach
   </div>
</div>



@endsection
@section('script')
    <!-- Script files -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/swiper-bundle.min.js"></script>
    <script src="js/apps.js"></script>
@endsection
