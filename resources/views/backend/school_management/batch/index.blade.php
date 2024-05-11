@extends('Backend.layouts.layouts')

@section('title', 'All Batchs')

<link rel="stylesheet" href="{{ asset('public') }}/css/custom/class.css">


@section('main_contain')

<div class="br-mainpanel">
      <div class="br-pagetitle" style="margin-top: 72px !important;margin-bottom: -35px !important;">
      {{-- <div class="br-pagetitle" style="margin-left: 354px!important;text-align: center;"> --}}
        <i class="fa-duotone fa-screen-users"></i>
        <div>
          <h4>View All Batchs</h4>
          <p class="mg-b-0">All Batch Details Here</p>
        </div>
      </div>

        <div class="p-5">


                @foreach ($batchs as $batch)
                    <a href="{{ route('admin.batch.details', $batch->id) }}" class="classbox">
                        <div class="databox">
                            <h4>{{ @$batch->class->name }}</h4>
                            <div>
                                Duration : {{ $batch->duration }}
                            </div>
                            <div>
                              {{ date('h:iA', strtotime($batch->start_time)) }} &nbsp; To &nbsp; {{ date('h:iA', strtotime($batch->end_time)) }}
                            </div>
                            <div class="showday">
                              @foreach (@$batch->batchDay as $d)
                              {{ @$d->day }},
                              @endforeach
                               
                            </div>
                        </div>
                    </a>
                @endforeach


        </div>



</div>
@stop
