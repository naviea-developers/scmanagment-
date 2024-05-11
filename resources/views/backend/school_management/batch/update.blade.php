@extends('Backend.layouts.layouts')

@section('title', 'Edit Batch Details')


<link rel="stylesheet" href="{{ URL::asset('css/custom/pathname') }}">

@section('main_contain')

<div class="br-mainpanel">

      <div class="br-pagetitle">
        <i class="fa-duotone fa-screen-users"></i>
        <div>
          <h4>Edit Batch Detailse</h4>
          <p class="mg-b-0">Edit Batch Detailse</p>
        </div>
      </div><!-- d-flex -->


        <div class="p-5">

            <div class="br-section-wrapper">

                <h2>Edit Class Detailse</h2>

                <form action="{{ route('admin.batch.update', $batch->id) }}" method="post">
                    @csrf
                    {{-- @foreach ($ as $class) --}}
                        {{-- <input type="hidden" name="class_id" value="{{ $cl->batch_id }}"> --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Class : </label>
                                    <select class="form-select form-control" name="class_id">
                                        @foreach ($classes as $class)
                                            <option @if ($class->id == $batch->class_id) Selected @endif value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="">Time Duration : </label>
                                <input type="text" name="duration" class="form-control"
                                value="{{ $batch->duration }}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-6">
                                <label for="">Start At : </label>
                                <input type="time" name="start_time" class="form-control"
                                value="{{ $batch->start_time }}">
                            </div>
                            <div class="col-6">
                                <label for="">End At : </label>
                                <input type="time" name="end_time" class="form-control"
                                value="{{ $batch->end_time }}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Available in week : </label>
                                        <br>
                                        <style>
                                        .dayinput {
                                            width: 14.25% !important;
                                            float: left !important;
                                        }
                                        .dayinput label {
                                            margin-left: 7px;
                                            font-size: 15px;
                                        }
                                        </style>
                                    <div class="dayinput">
                                        <input type="checkbox" @if($batch->batchDay->contains('day', 'Sat')) checked @endif id="sat"
                                        name="day[]" value="Sat">
                                        <label for="sat">Saturday</label>
                                    </div>
                                    <div class="dayinput">
                                        <input type="checkbox" @if($batch->batchDay->contains('day', 'Sun')) checked @endif id="sun"
                                        name="day[]" value="Sun">
                                        <label for="sun">Sunday</label>
                                    </div>
                                    <div class="dayinput">
                                        <input type="checkbox" @if($batch->batchDay->contains('day', 'Mon')) checked @endif id="mon"
                                        name="day[]" value="Mon">
                                        <label for="mon">Monday</label>
                                    </div>
                                    <div class="dayinput">
                                        <input type="checkbox" @if($batch->batchDay->contains('day', 'Tue')) checked @endif id="tue"
                                        name="day[]" value="Tue">
                                        <label for="tue">Tuesday</label>
                                    </div>
                                    <div class="dayinput">
                                        <input type="checkbox" @if($batch->batchDay->contains('day', 'Wed')) checked @endif id="wed"
                                        name="day[]" value="Wed">
                                        <label for="wed">Wednesday</label>
                                    </div>
                                    <div class="dayinput">
                                        <input type="checkbox" @if($batch->batchDay->contains('day', 'Thu')) checked @endif  id="thu"
                                        name="day[]" value="Thu">
                                        <label for="thu">Thursday</label>
                                    </div>
                                    <div class="dayinput">
                                        <input type="checkbox" @if($batch->batchDay->contains('day', 'Fri')) checked @endif id="fri"
                                         name="day[]" value="Fri">
                                        <label for="fri">Friday</label>
                                    </div>

                                </div>
                                <br>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-12">
                                <label for="">Edit Routine</label>
                                {{-- @foreach ($class_routine as $cr)
                                    <textarea name="class_routine" id="editor">{!! $cr->class_routine !!}</textarea>
                                @endforeach --}}
                            </div>
                        </div>
                    {{-- @endforeach --}}

                        <br>

                        <center>
                            <button class="btn btn-primary">Upload</button>
                        </center>

                </form>
            </div>


        </div>



</div>
@stop
