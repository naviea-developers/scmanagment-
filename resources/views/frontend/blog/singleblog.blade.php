@extends('frontend.master')

@section('title')
    Our Blog's
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

<style>

.blogBannger img {
    width: 100%;
    height: 350px;
    border: 2px solid #dedcdc;
    object-fit: cover;
}

.blogTitle {
    font-size: 20px;
    font-weight: bold;
    background: #dedcdc;
    padding: 10px;
    margin-top: 10px;
    border-radius: 5px;
}

.shortDesc {
    font-size: 16px;
    font-weight: normal;
    background: #dedcdc;
    padding: 10px;
    margin-top: 15px;
    border-radius: 5px;
}

.longDesc {
    font-size: 16px;
    font-weight: normal;
    background: #dedcdc;
    padding: 10px;
    margin-top: 15px;
    border-radius: 5px;
}


</style>

@endsection

@section('body')


    <div class="databox">
        <div class="container">
            @foreach ($blog  as $bg)
                <div class="divCard">
                    <div class="blogBannger">
                        <img src="{{ asset('frontend/assets/images/blog/') . '/'.$bg->file }}" alt="">
                    </div>

                    <div class="blogTitle">
                        {{ $bg->title }}
                    </div>

                    <div class="shortDesc">
                        {{ $bg->short_descp }}
                    </div>

                    <div class="longDesc">
                        {{ $bg->long_descp }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection
