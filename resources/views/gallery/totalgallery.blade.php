@extends('backend.master')

@section('title', 'Add Images')


<link rel="stylesheet" href="#">

@section('content')

    <div class="br-mainpanel">




        <div class="p-2">



            <div class="br-section-wrapper"  style="overflow: hidden; overflow-x:auto">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-person-chalkboard"></i>
                    <div>
                        <h4>Add Images</h4>
                        <p class="mg-b-0">Add Images in Gallery</p>
                    </div>
                </div>
                <a href="/showImages" class="btn btn-primary mb-3">Show All</a>
                @foreach ($images as $img)
                <div class="row">
                    <div class="col-md-12 text-center bg-secondary text-white">
                            <h3>{{ $img->title }}</h3>
                    </div>
                    </div>


                <!-- Gallery -->

                    @php

                    $imgs = explode('|' , $img->image);

                @endphp
                   @foreach ($imgs as $i=>$img)

                                <img src="{{ asset('image/') .'/'. $img }}"
                                class=" shadow-1-strong rounded mb-4 mt-4" alt="Boat on Calm Water" width="12%" style="margin-left:12px"/>

                    @endforeach
                <!-- Gallery -->
                @endforeach
            </div>
            </div>

        </div>


    </div>
@stop
