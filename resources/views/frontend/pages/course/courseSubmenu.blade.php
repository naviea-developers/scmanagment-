@extends('frontend.master')

@section('title')
    All Course
@endsection

<style>
    .titlebg {
        width: 100%;
        background: #2fc9ff;
        padding: 10px;
        text-align: center;
        border-radius: 5px;
        font-weight: bold;
        font-size: 22px;
    }

    .courseDiv {
        margin: 10px;
        width: calc(25% - 20px) !important;
        background: #bfeeff;
        height: auto;
        float: left;
        margin-top: 20px;
        text-align: center;
        border-radius: 5px;
        margin-top: 10px !important;
    }

    .banner {
        background-image: linear-gradient( #FF387A 76%,#780070 100%);
        margin-top: -50px;
        height: 300px;
        overflow: hidden;
    }

    .banner img {
        width: 100%;
        object-fit: cover;
    }

    .courseDiv img {
        width: 100%;
        height: 130px;
        margin: 0 auto;
        display: block;
        margin-top: 10px;
        object-fit: cover;
    }

    .courseDiv .title {
        margin-top: 10px;
        font-size: 16px;
    }

    .courseDiv a {
        text-decoration: none;
        color: #000;
    }

    .fet span {
        color: gray;
    }

    .fet {
        padding: 20px 5px;
        height: 120px;
        overflow: hidden;
    }

    .buyBtns {
        width: 100%;
        margin-bottom: 10px;
    }

    .name {
        font-size: 20px;
        margin-top: 10px;
    }



@media only screen and (max-width: 1000px) {
    .container {
        max-width: 100% !important;
    }

  .courseDiv {
    width: calc(33% - 20px) !important;
  }
}
@media only screen and (max-width: 650px) {
  .courseDiv {
    width: calc(50% - 20px) !important;
  }

  .banner img {
    height: 100%;
  }

  .fet {
	padding: 20px 5px;
	height: 45px;
	overflow: hidden;
}
}

</style>

@section('body')

<div class="banner">
    <img src="https://intellipaat.com/blog/wp-content/uploads/2020/12/Online-Computer-Courses-to-Get-a-Job-Big.png" alt="">
</div>


    <div class="container p-5">
        <div class="titlebg mb-3">
            {{ $category->categoryName }} - Course
        </div>

        <div class="row">
            @foreach ($allAdmission as $item)
                <div class="courseDiv">
                    <a href="/academicProgramView/{{ $item->id }}">
                        <img src="{{ asset('video/').'/'.$item->image }}" alt="">
                        <div class="name">
                            <b>{{ $item->name }}</b>
                        </div>
                        <div class="title">
                            Price :  {{ $item->price }}
                        </div>
                        <div class="fet">

                            @php
                                $fts = explode('|' , $item->feature)
                            @endphp

                            @foreach ($fts as $its)
                            <span> - {{ $its }} <br></span>
                            @endforeach

                        </div>
                        <a href="" class="btn btn-primary buyBtns">
                            Buy Now
                        </a>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="row">
            <center>
                <a href="" class="btn btn-primary" style="margin-top: 22px;margin-bottom: -50px;" >See more</a>
            </center>
        </div>

    </div>
@endsection
