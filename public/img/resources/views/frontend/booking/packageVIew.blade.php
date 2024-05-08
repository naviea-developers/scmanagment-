@extends('frontend.master')

@section('title', 'Manage Profile')
<link rel="stylesheet" href="{{ asset('frontend/css/singleTrnsportView.css') }}">
@section('content')


<div class="bodyContaint">
    <div class="container">

        <div class="row">
            <div class="col-12 navigation">
                <ul>
                    <li><a href="">Package</a></li>
                    <li>/</li>
                    @foreach ($package as $pack)
                        <li>{{ $pack->title }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-6">
                <div class="imageSecton">
                    @foreach ($package as $pack)
                        <img src="{{ asset($pack->img) }}" alt="">
                    @endforeach
                </div>
            </div>
            <div class="col-md-6">
                <div class="data">
                    @foreach ($package as $pack)
                        <ul>
                            <li> <b>Package Name : </b> {{ $pack->title }} </li>
                            <li> <b>Location : </b> {{ $pack->location }} </li>
                            <li> <b>Duration : </b> {{ $pack->duration }} </li>
                            <li> <b>Event Date : </b> {{ $pack->date }} </li>
                            <li> <b>Package Price : </b> {{ $pack->price }} </li>
                        </ul>
                            <br>
                        <form action="/cart" style="margin-top: -30px;margin-bottom: -10px;" method="post">
                            @csrf
                            <input type="hidden" name="type" value="package">
                            <input type="hidden" name="id" value="{{ $pack->id }}">
                            <center>
                                <button class="btn btn-info btn-sm">Book Now</button>
                            </center>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-12">
                @foreach ($package as $pack)
                    <p>{!! $pack->details !!}</p>
                @endforeach
            </div>

        </div>

    </div>
</div>
@stop
