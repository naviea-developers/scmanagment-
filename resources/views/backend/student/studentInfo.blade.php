@extends('backend.master')

@section('title', 'Student Info')


<link rel="stylesheet" href="{{ URL::asset('css/custom/studentInfo.css') }}">

@section('content')

<div class="br-mainpanel">

      <div class="br-pagetitle">
        <i class="fa-duotone fa-book-open-reader"></i>
        <div>
          <h4>View Student Info</h4>
          <p class="mg-b-0">Student All Details Here</p>
        </div>
      </div><!-- d-flex -->


        <div class="p-5">

            <div class="br-section-wrapper">

                @foreach ($user as $ur)

                    <div class="row">

                            <div class="col-md-12 UserPhoto" style="margin-bottom: 20px">
                                <img src="{{ url('/backend/profile_picture') }}/@if (!empty($ur->img)){{ $ur->img }}@else/dft/user.png
                                @endif" alt="">
                            </div>


                            <div class="col-md-12">
                                <span class="Name"> <b>Name :</b> {{ $ur->name }}</span>
                            </div>

                            <div class="col-md-6">
                                <span class="Name"> <b>Father Name :</b> {{ $ur->fatherName }}</span>
                            </div>

                            <div class="col-md-6">
                                <span class="Name"> <b>Mother Name :</b> {{ $ur->motherName }}</span>
                            </div>
                            <div class="col-md-6">
                                <span class="Name"> <b>Class :</b> {{ $ur->batch_name }}</span>
                            </div>
                            <div class="col-md-6">
                                <span class="Name"> <b>Address :</b> {{ $ur->addres }}</span>
                            </div>
                            <div class="col-md-6">
                                <span class="Name"> <b>Class Duration :</b>
                                    {{ $ur->class_duration }}</span>
                            </div>
                            <div class="col-md-6">
                                <span class="Name"> <b>Weekly Class Day:</b> <br>
                                    {{ $ur->weekly }}</span>
                            </div>

                            <div class="col-md-12">
                                <span class="Name"> Class Routine</span>
                                {!! $ur->class_routine !!}
                            </div>





                    </div>

                @endforeach

            </div>


        </div>



</div>
@stop
