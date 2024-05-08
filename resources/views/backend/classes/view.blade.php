@extends('backend.master')

@section('title', 'Classes')

<link rel="stylesheet" href="css/custom/class.css">


@section('content')

<div class="br-mainpanel">


      <div class="br-pagetitle" style="margin-top: 130px !important;margin-bottom: -35px !important;">
        <i class="fa-duotone fa-screen-users"></i>
        <div>
          <h4>View All Class</h4>
          <p class="mg-b-0">All Class Details Here</p>
        </div>
      </div>

        <div class="p-5">


                @foreach ($class as $c)
                    <a href="classDetails/{{ $c->batch_id }}" class="classbox">
                        <div class="databox">
                            <h4>{{ $c->batch_name }}</h4>
                            <div>
                                Duration : {{ $c->class_duration }}
                            </div>
                            <div>
                               {{ $c->class_start }}  &nbsp; To  &nbsp; {{ $c->class_end }}
                            </div>
                            <div class="showday">
                               {{ $c->weekly }}
                            </div>
                        </div>
                    </a>
                @endforeach


        </div>



</div>
@stop
