@extends('backend.master')

@section('title', 'About Us')


<link rel="stylesheet" href="{{ URL::asset('css/custom/category.css') }}">

@section('content')

<div class="br-mainpanel">

        <div class="p-2">

            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-gear"></i>
                    <div>
                      <h4>View About Us</h4>
                    </div>
                </div>

               <div class="row">
                    <div class="col-md-12">
                        <h3 style="color: #000; float: left;">
                            About @include('inc.sitename')
                        </h3>
                        <a href="{{ route('editAbout') }}" class="btn btn-primary btn-sm float-right">
                            <i class="fa-duotone fa-pen-to-square"></i>
                             Edit
                        </a>
                    </div>

                    <div class="col-md-12">
                        @foreach ($about as $ab)
                            <div class="card p-2">
                                {!! $ab->aboutData !!}
                            </div>
                        @endforeach
                    </div>
               </div>

            </div>


        </div>



</div>
@stop
