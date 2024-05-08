@extends('frontend.master')

@section('title')
    Course Details Page
@endsection

@section('body')

<div class="container">
    <div class="row m-5">
        <h1><b>Our Term and condition</b></h1>
        <p>{!! $terms->termsData !!}</p>
    </div>
</div>

@endsection
