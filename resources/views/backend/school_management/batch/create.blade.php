@extends('Backend.layouts.layouts')

@section('title', 'Add New Batch')

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



                <form action="{{ route('admin.batch.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Insert Batch Data</h2>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Select Class : </label>
                                <select class="form-select form-control" name="class_id">
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
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
                                <input type="time" required class="form-control" name="start_time">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>End At : </label>
                                <input type="time" required class="form-control" name="end_time">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Available in week : </label>
                                    <br>

                                <div class="dayinput">
                                    <input type="checkbox" checked id="sat"
                                    name="day[]" value="Sat">
                                    <label for="sat">Saturday</label>
                                </div>
                                <div class="dayinput">
                                    <input type="checkbox" checked id="sun"
                                    name="day[]" value="Sun">
                                    <label for="sun">Sunday</label>
                                </div>
                                <div class="dayinput">
                                    <input type="checkbox" checked id="mon"
                                    name="day[]" value="Mon">
                                    <label for="mon">Monday</label>
                                </div>
                                <div class="dayinput">
                                    <input type="checkbox" checked id="tue"
                                    name="day[]" value="Tue">
                                    <label for="tue">Tuesday</label>
                                </div>
                                <div class="dayinput">
                                    <input type="checkbox" checked id="wed"
                                    name="day[]" value="Wed">
                                    <label for="wed">Wednesday</label>
                                </div>
                                <div class="dayinput">
                                    <input type="checkbox" checked id="thu"
                                    name="day[]" value="Thu">
                                    <label for="thu">Thursday</label>
                                </div>
                                <div class="dayinput">
                                    <input type="checkbox" id="fri" name="day[]" value="Fri">
                                    <label for="fri">Friday</label>
                                </div>

                            </div>
                            <br>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary createClass">Crate New Batch</button>
                    </div>
                </form>


        </div>

    </div>


</div>
@stop