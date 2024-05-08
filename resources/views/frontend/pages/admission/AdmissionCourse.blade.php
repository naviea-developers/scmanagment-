@extends('frontend.master')

@section('title')
    Course Page
@endsection

<style>
    .courseImg {
        width: 100%;
        height: 200px;
        object-fit: contain;
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


</style>

@section('body')


<img src="https://cdn.dnaindia.com/sites/default/files/styles/full/public/2018/06/05/689803-admission-fyjc-100717.jpg" alt="" style="width: 100%;height: 350px;object-fit: cover;margin-top: -50px;">
    <div class="container p-5">
        <h1 style="text-align: center;"><b style=" background: #f1d3d3; width: 50%; display: block; margin: 0 auto; border-radius: 5px; margin-bottom: 32px;">Admission Courses</b></h1>

        @if ($course->count() == 0)
            <center class="p-5">
                <h2>
                    <b style="font-size:50px;">😥</b> <br>
                    No Courses Available
                </h2>
            </center>
        @endif

        <div class="row" style="background: #d6cbcb;">
            @foreach ($course as $crs)
                <div class="col-md-3 p-2">
                    <div class="card" style="height: 300px !important">
                        <a href="/academicProgramView/{{ $crs->id }}">
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
