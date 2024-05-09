@extends('Frontend.layouts.master-layout')
@section('title','- Refund Policy')
@section('head')

@endsection
@section('main_contend')
@include('Frontend.layouts.parts.header-menu')




<div class="content_search" style="margin-top:70px">
    <div class="py-5">
            <div class="container-lg">
                <div class="row justify-content-center">
                    <div class="col-xl-12">
                        <div class="row mx-0 align-items-center border-md rounded-3">
                            <div class="col-md-10 p-4 p-sm-5">
                                <h2 class="h3 mb-4 mb-sm-5">{{ $content->title }}</h2>
                                {!! $content->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div></div>
<!--======== main content close ==========-->


@include('Frontend.layouts.parts.news-letter')

@endsection