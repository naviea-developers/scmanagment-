@extends('frontend.master')

@section('title')
    Course Details Page
@endsection

@section('body')

<div class="container">
    <div class="row m-5">
        <h1><b>Our Privacy policy</b></h1>
        <p>{!! $terms->policyData !!}</p>
    </div>
</div>

@endsection
