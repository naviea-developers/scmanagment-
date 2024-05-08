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


@endsection

    @section('script')
        <!-- Script files -->
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/swiper-bundle.min.js"></script>
        <script src="js/apps.js"></script>
    @endsection
