@extends('backend.master')

@section('title', 'Class Details')

<link rel="stylesheet" href="{{ URL::asset('css/custom/class.css') }}">
@section('content')

<div class="br-mainpanel">



        <div class="p-2">

            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-screen-users"></i>
                    <div>
                      <h4>View Class Details</h4>
                      <p class="mg-b-0">All Class Details Here</p>
                    </div>
                  </div>

                <div class="classDetails">

                    @foreach ($classes as $cl)

                        <div class="col-12">

                            <a href="/editClassDetailse/{{ $cl->batch_id }}"
                            class="btn btn-primary btn-sm editBtn">
                                <i class="fa-duotone fa-pen-to-square"></i> Edit Batch Data
                            </a>
                            <a href="/deleteClassDetailse/{{ $cl->batch_id }}"
                                class="btn btn-danger btn-sm editBtn">
                                <i class="fa-duotone fa-trash"></i> Delete Batch
                            </a>

                        </div>

                        <div class="col-12">
                            <div class="className">
                                {{ $cl->batch_name }}
                            </div>
                        </div>

                        <div class="col-12">
                           <div class="row">
                                <div class="col-6">
                                    Total Student : 100
                                </div>
                                <div class="col-6 text-right">
                                    Class Duration : {{ $cl->class_duration }}
                                </div>
                           </div>
                        </div>

                        <div class="col-12">
                            <div class="classWeek">
                                Class Day : <b>{{ $cl->weekly }}</b>
                            </div>
                        </div>

                        <div class="col-12">

                            <div class="routineTable">
                                @foreach ($class_routine as $cr)
                                    {!! $cr->class_routine !!}
                                @endforeach
                            </div>

                        </div>

                    @endforeach
                </div>

            </div>


        </div>



</div>
@stop
