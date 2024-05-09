@extends('Backend.layouts.layouts')

@section('title', 'Classes')

<link rel="stylesheet" href="{{ asset('public') }}/css/custom/class.css">

@section('main_contain')

<div class="br-mainpanel">




        <div class="p-2">

            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-screen-users"></i>
                    <div>
                        <h4>Add a Batch</h4>
                        <p class="mg-b-0">Add a new class for your student</p>
                    </div>
                </div>



                <form action="{{ route('uploadnewClass') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Insert Batch Data</h2>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Select Batch : </label>
                                <select class="form-select form-control" name="bathcName">
                                    @foreach ($classList as $cl)
                                        <option value="{{ $cl->class_name }}">
                                            {{ $cl->class_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Time Duration : </label>
                                <input type="text" required class="form-control" name="duration">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Start At : </label>
                                <input type="time" required class="form-control" name="startAt">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>End At : </label>
                                <input type="time" required class="form-control" name="endAt">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Available in week : </label>
                                    <br>

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
                                    <input type="checkbox" id="fri" name="week[]" value="Fri">
                                    <label for="fri">Friday</label>
                                </div>

                            </div>
                            <br>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary createClass">Crate New Class</button>
                    </div>
                </form>


        </div>

    </div>


</div>
@stop
