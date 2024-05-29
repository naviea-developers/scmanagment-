@extends('Frontend.layouts.master-layout')
@section('title','- All Class list')
@section('head')

@endsection
@section('main_contend')
@include('Frontend.layouts.parts.header-menu')
<div class="pb-1 pt-4 mt-5 d-none mt-1 d-lg-block">
    <h3 class="fw-bold mb-0 text-dark-cerulean text-center text-uppercase">{{ $home_content->university_location_title }}</h3>
    <div class="container flex-column p-0 d-flex mt-4">
        <section class="mdc-card__supporting-text p-0">
        <section class="d-lg-flex cities-card-top py-3 justify-content-between">
            <div class="row">
                @foreach (@$classLists as $k=>$class)
                <div class="col-md-3 mt-3">
                    <div class="card w-sm-auto mr-4 mt-1 ml-auto mr-auto mr-md-2 ml-md-0" style="margin-right: 7px;">
                        <div class="embed-responsive embed-responsive-16by9">
                            <img style="height: 225px;width:100%" src="{{ @$class->image_show }}" class="card-img-top embed-responsive-item lazyload" alt="">
                        </div>
                        <a class="stretched-link" style="color:#007bff" href="{{ route('frontend.class_details',@$class->id) }}">
                        <h3 class=""
                            style="position: absolute;top: 10px;left: 20px;font-size: 1.5rem;color: #fff;font-weight: 600;text-shadow: 1px 2px 10px #202020;">
                            {{ @$class->name }}</h3>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        </section>
    </div>
    {{-- <div class="container d-flex flex-column mb-5 p-0">
        <section class="mdc-card__supporting-text p-0 ">
        <section class="d-lg-flex cities-card-bottom">
            @foreach ($classLists as $k=>$class)
                @if ($k>2)
                    <div class="card w-sm-auto mr-4 mt-1 ml-auto mr-auto mr-md-2 ml-md-0" style="margin-right: 7px;">
                    <div class="embed-responsive embed-responsive-16by9">
                        <img style="height: 225px;width:100%" src="{{ @$class->image_show }}" class="card-img-top embed-responsive-item lazyload" alt="">
                    </div>
                    <a class="stretched-link" style="color:#007bff" href="{{ route('frontend.class_details',@$class->id) }}">
                    <h3 class=""
                        style="position: absolute;top: 10px;left: 20px;font-size: 1.5rem;color: #fff;font-weight: 600;text-shadow: 1px 2px 10px #202020;">
                        {{ @$class->name }}</h3>
                    </a>
                    </div>
                @endif
            @endforeach
        </section>
        </section>

    </div> --}}
</div>
@include('Frontend.layouts.parts.news-letter')
@endsection



