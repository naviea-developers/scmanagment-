@extends('backend.master')

@section('title', 'Total Student\'s')


<link rel="stylesheet" href="{{ URL::asset('css/custom/allStudent.css') }}">

@section('content')

<div class="br-mainpanel">

      <div class="br-pagetitle" style="margin-top:100px !important;">
        <i class="fa-duotone fa-book-open-reader"></i>
        <div>
          <h4>View All Student</h4>
          <p class="mg-b-0">All Student Details Here</p>
        </div>
      </div>

        <div class="p-5">
            @foreach ($user as $ui)
                <a href="/studentInfo/{{ $ui->id }}" class="classbox">
                    <img src="{{ url('/backend/profile_picture') }}/@if(!empty($ui->img)){{ $ui->img }}@else/dft/user.png
                    @endif" alt="">
                    <span class="stName">{{ $ui->name }}</span>
                    <span class="stclass">{{$ui->class}}</span>
                </a>
            @endforeach
        </div>

</div>
@stop

