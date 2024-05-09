@extends('Backend.layouts.layouts')

@section('title', 'Edit Class Detailse')


<link rel="stylesheet" href="{{ URL::asset('css/custom/pathname') }}">

@section('main_contain')

<div class="br-mainpanel">

      <div class="br-pagetitle">
        <i class="fa-duotone fa-screen-users"></i>
        <div>
          <h4>Edit Class Detailse</h4>
          <p class="mg-b-0">Edit All Class Detailse</p>
        </div>
      </div><!-- d-flex -->


        <div class="p-5">

            <div class="br-section-wrapper">

                <h2>Edit Class Detailse</h2>

                <form action="{{ route('updateClassDetailes') }}" method="post">
                    @csrf
                    @foreach ($classes as $cl)
                        <input type="hidden" name="class_id" value="{{ $cl->batch_id }}">
                        <div class="row">
                            <div class="col-6">
                                <label for="">Class Name : </label>
                                <input type="text" name="bathcName" class="form-control"
                                readonly value="{{ $cl->batch_name }}">
                            </div>
                            <div class="col-6">
                                <label for="">Time Duration : </label>
                                <input type="text" name="duration" class="form-control"
                                value="{{ $cl->class_duration }}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-6">
                                <label for="">Start At : </label>
                                <input type="time" name="startAt" class="form-control"
                                value="{{ $cl->class_start }}">
                            </div>
                            <div class="col-6">
                                <label for="">End At : </label>
                                <input type="time" name="endAt" class="form-control"
                                value="{{ $cl->class_end }}">
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
                                        <input type="checkbox" checked id="sat"
                                        name="week[]" value="Sat">
                                        <label for="sat">Saturday</label>
                                    </div>
                                    <div class="dayinput">
                                        <input type="checkbox" checked id="sun"
                                        name="week[]" value="Sun">
                                        <label for="sun">Sunday</label>
                                    </div>
                                    <div class="dayinput">
                                        <input type="checkbox" checked id="mon"
                                        name="week[]" value="Mon">
                                        <label for="mon">Monday</label>
                                    </div>
                                    <div class="dayinput">
                                        <input type="checkbox" checked id="tue"
                                        name="week[]" value="Tue">
                                        <label for="tue">Tuesday</label>
                                    </div>
                                    <div class="dayinput">
                                        <input type="checkbox" checked id="wed"
                                        name="week[]" value="Wed">
                                        <label for="wed">Wednesday</label>
                                    </div>
                                    <div class="dayinput">
                                        <input type="checkbox" checked id="thu"
                                        name="week[]" value="Thu">
                                        <label for="thu">Thursday</label>
                                    </div>
                                    <div class="dayinput">
                                        <input type="checkbox" id="fri"
                                         name="week[]" value="Fri">
                                        <label for="fri">Friday</label>
                                    </div>

                                </div>
                                <br>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-12">
                                <label for="">Edit Routine</label>
                                @foreach ($class_routine as $cr)
                                    <textarea name="class_routine" id="editor">{!! $cr->class_routine !!}</textarea>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                        <br>

                        <center>
                            <button class="btn btn-primary">Upload</button>
                        </center>

                </form>
            </div>


        </div>



</div>
@stop
