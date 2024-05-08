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
    .databox {
        width: 100%;
        float: left;
        padding: 50px 0;
    }
    .divCard{
        width: calc(33% - 20px);
        border: 1px solid #ccc;
        float: left;
        margin: 10px;
        border-radius: 10px;
        overflow: hidden;
    }

    .divCard a{
        text-decoration: none;
    }

    .footer {
        float: left;
        width: 100%;
    }

    .blogImg {
        overflow: hidden;
    }

    .blogImg img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .blogTitle {
        font-size: 20px;
        font-weight: bold;
        color: #000;
        padding: 5px;
    }

    .blogContaint {
        font-size: 15px;
        color: #000;
        padding: 5px;
        margin-top: -10px;
        height: 70px;
        margin-bottom: 20px;
        overflow: hidden;
    }


@media only screen and (max-width: 750px) {
  .databox .container {
    min-width: 100% !important;
  }
}


@media only screen and (max-width: 650px) {
  .divCard {
    	width: calc(50% - 20px);
    }
}


@media only screen and (max-width: 500px) {
  .divCard {
    	width: calc(100% - 20px);
    }
}

</style>

@endsection

@section('body')

<img src="http://www.edunext.co/wp-content/uploads/2022/12/Blog-banner-women-in-tech.png" alt="" style="width: 100%;height: 350px;object-fit: cover;margin-top: -50px;">

    <div class="databox">

        <center>
            <h2  style=" background: #f1d3d3; width: 50%; display: block; margin: 0 auto; border-radius: 5px; margin-bottom: 32px;">More Blog's</h2>
        </center>

        <div class="container">
            @foreach ($blog  as $bg)
                <div class="divCard">
                    <a href="/singleBlog/{{ $bg->bid }}">

                        <div class="blogImg">
                            <img src="{{ asset('frontend/assets/images/blog/') .'/'.$bg->file }}" alt="">
                        </div>
                        <div class="blogTitle">{{ $bg->title }}</div>
                        <div class="blogContaint">{!! $bg->short_descp !!}</div>

                    </a>
                </div>
            @endforeach
        </div>
    </div>


@endsection
