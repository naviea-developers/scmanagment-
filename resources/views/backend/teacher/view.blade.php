@extends('backend.master')

@section('title', 'View Teacher')

<link rel="stylesheet" href="{{ URL::asset('css/custom/viewTeacher.css') }}">

@section('content')

<div class="br-mainpanel">

        <div class="p-2">

            <div class="br-pagetitle" style="margin-top: 20px !important;">
                <i class="fa-duotone fa-screen-users"></i>
                <div>
                  <h4>View All Teacher</h4>
                  <p class="mg-b-0">All Teacher Details Here</p>
                </div>
              </div>


            @foreach ($user as $ur)

                <a href="teacherInfo/{{ $ur->userid }}" class="userData">
                    <img src="
                        @if (!empty($ur->img))
                        {{ url('/backend/profile_picture') }}/{{ $ur->img }}
                            @else
                            {{ url('/backend/profile_picture') }}/dft/user.png
                        @endif
                    " alt="">
                    <span class="name">
                       <b> {{ $ur->name }} </b>
                        <br>
                        Subject : {{ $ur->sub }}
                    </span>
                </a>

            @endforeach

        </div>



</div>
@stop
