@extends('frontend.master')

@section('title', 'Manage Profile')
<link rel="stylesheet" href="{{ asset('frontend/css/singleTrnsportView.css') }}">
@section('content')


<div class="bodyContaint">
    <div class="container">

        <div class="row">
            <div class="col-12 navigation">
                <ul>
                    <li><a href="{{ URL::to('/booking') }}/{{ $cat }}">{{ $cat }}</a></li>
                    <li>/</li>
                    @foreach ($transport as $trns)
                        <li>{{ $trns->name }} - {{ $trns->model }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-6">
                <div class="imageSecton">
                    @foreach ($transport as $trns)
                        <img src="{{ asset($trns->img) }}" alt="">
                    @endforeach
                </div>
            </div>
            <div class="col-md-6">
                <div class="data">
                    @foreach ($transport as $trns)
                        <ul>
                            <li>{{ $trns->name }} - {{ $trns->model }}</li>

                            @if (isset($trns->class) OR isset($trns->type) )
                                <li><b>Type/Class :</b>
                                @if (isset($trns->class))
                                    {{ $trns->class }}
                                @endif
                                @if (isset($trns->type))
                                    {{ $trns->type }}
                                @endif
                            @endif


                            </li>
                            <li><b>Location :</b> {{ $trns->form }} - {{ $trns->to }}</li>

                            <li><b>Date :</b> {{ $trns->date }}</li>

                            @if (isset($trns->coach))
                                <li><b>Coach :</b> {{ $trns->coach }}</li>
                            @endif

                            @if (isset($trns->start_at))
                                <li><b>Time :</b> {{ $trns->start_at }} - {{ $trns->end_at }}</li>
                                <li><b>Cost :</b> {{ $trns->price }}</li>
                            @endif


                        </ul>
                        <center>
                            <button class="btn btn-info btn-sm">Book Now</button>
                        </center>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-12">
                @foreach ($transport as $trns)
                    <p>{!! $trns->description !!}</p>
                @endforeach
            </div>

        </div>

    </div>
</div>
@stop
