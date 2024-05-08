@extends('backend.master')

@section('title', 'Our Privacy Policy')


<link rel="stylesheet" href="{{ URL::asset('css/custom/category.css') }}">

@section('content')

<div class="br-mainpanel">



        <div class="p-2">

            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-gear"></i>
                    <div>
                      <h4>View Our Policy</h4>
                    </div>
                  </div>

               <div class="row">
                    <div class="col-md-12">
                        <h3 style="color: #000; float: left;">
                            @include('inc.sitename') Policy
                        </h3>
                        <a href="{{ route('editPolicy') }}" class="btn btn-primary btn-sm float-right">
                            <i class="fa-duotone fa-pen-to-square"></i>
                             Edit
                        </a>
                    </div>

                    <div class="col-md-12">
                        @foreach ($policy as $ab)
                            <div class="card p-2">
                                {!! $ab->policyData !!}
                            </div>
                        @endforeach
                    </div>
               </div>

            </div>


        </div>



</div>
@stop
