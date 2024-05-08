@extends('frontend.master')

@section('title')
    Course Page
@endsection

<style>
    .courseImg {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 10px;
    }
    .card {
        height: 330px !important;
        border-radius: 10px !important;
    }
    .card a{
        text-decoration: none;
        color: #000;
    }

@media only screen and (max-width: 1000px) {
    .container{
        padding: 0px !important;
        max-width: 100% !important;
    }
}

@media only screen and (max-width: 800px) {
   .col-md-3 {
    width: 33% !important;
   }
   .container h1 b {
    width: 90% !important;
   }
}

@media only screen and (max-width: 550px) {
   .col-md-3 {
    width: 50% !important;
   }
}

</style>

@section('body')


<img src="https://www.girlsms.org/uploaded/About/About_Landing_Page/2019-2020_Images_and_Documents/GMS_Studying-145_(1).png" alt="" style="width: 100%;height: 350px;object-fit: cover;margin-top: -50px;">
    <div class="container p-5">
        <h1 style="text-align: center;"><b style=" background: #f1d3d3; width: 50%; display: block; margin: 0 auto; border-radius: 5px; margin-bottom: 32px;">Professional Programs</b></h1>

        @if ($course->count() == 0)
            <center class="p-5">
                <h2>
                    <b style="font-size:50px;">ðŸ˜¥</b> <br>
                    No Programme Available
                </h2>
            </center>
        @endif

        <div class="row">
            @foreach ($course as $crs)
                <div class="col-md-3 p-2">
                    <div class="card" style="height: 300px !important">
                        <a href="/bcsView/{{ $crs->id }}">
                            <img src="{{ asset('/video/').'/'.$crs->image }}" alt="{{ $crs->name }}" class="courseImg">
                            <div class="p-2">
                                <h4>{{ $crs->name }}</h4>
                                <small>{{ $crs->subcatId }}</small>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
