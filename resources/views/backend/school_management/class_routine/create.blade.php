@extends('Backend.layouts.layouts')

@section('title', 'Add Class routine')

@section('style')
<style>
    .select2-container--default .select2-selection--single {
        height: 41px;}
</style>
@endsection
{{-- <link rel="stylesheet" href="css/custom/class.css"> --}}
<link rel="stylesheet" href="{{ asset('public') }}/css/custom/eduStc.css">

@section('main_contain')

<div class="br-mainpanel">



        <div class="p-2">

            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-screen-users"></i>
                    <div>
                      <h4>Add Class Routine</h4>
                      <p class="mg-b-0">Add Class Routine</p>
                    </div>
                </div>

               {{-- validate start  --}}
               @if(count($errors) > 0)
               @foreach($errors->all() as $error)
                   <div class="alert alert-danger">{{ $error }}</div>
               @endforeach
               @endif
               {{-- validate End  --}}

                <form action="{{ route('admin.routine.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="">Session :</label>
                            <select name="session_id" id="" class="form-control form-select select2">
                                <option value="0">Select Session</option>
                                @foreach (@$sessions as $session)
                                    <option value="{{ $session->id }}">{{ @$session->start_year->year }} - {{ @$session->end_year->year }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label>Select Class : </label>
                            <select name="class_id" id="class" class="form-control form-select select2">
                                <option value="0">Select Class</option>
                                @foreach ($className as $class)
                                    <option value="{{ $class->id}}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>

                       
                        <div class="col-sm-3">
                            <label >Sections Name :</label>
                            <select name="section_id"  id="section" class="form-control form-select select2">
                            <option value="0"> Select Class</option>
                            {{-- @foreach ($sections as $section)
                            <option value="{{ $section->id }}">{{ $section->name }}</option>
                            @endforeach --}}
                            </select>
                        </div>
                     

                         <div class="col-md-3">
                            <label>Select Subject : </label>
                            <select name="subject_id" id="subject" class="form-control form-select select2">
                                <option value="0">Select Subject</option>
                                {{-- @foreach ($subjectName as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                @endforeach --}}
                            </select>
                        </div>

                        <div class="col-md-3 mt-3">
                            <label>Select Teacher : </label>
                            <select name="teacher_id" id=""class="form-control form-select select2">
                                <option value="0">Select Teacher</option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 mt-3">
                            <label>Select Rooms : </label>
                            <select name="room_id" id=""class="form-control form-select select2">
                                <option value="0">Select Rooms</option>
                                @foreach ($rooms as $room)
                                    <option value="{{ $room->id }}">{{ $room->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 mt-3">
                            <label>Select Period : </label>
                            <select name="class_duration_id" id=""class="form-control form-select select2">
                                <option value="0">Select period</option>
                                @foreach ($class_durations as $class_duration)
                                    <option value="{{ $class_duration->id }}">{{ $class_duration->name }} ({{date('h:i:A',strtotime($class_duration->start_time))}} - {{date('h:i:A',strtotime($class_duration->end_time))}})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 mt-3">
                            <label>Select Day : </label>
                            <select name="day_id" id=""class="form-control form-select select2">
                                <option value="0">Select Day</option>
                                <option value="1">Saturday</option>
                                <option value="2">Sunday</option>
                                <option value="3">Monday</option>
                                <option value="4">Tuesday</option>
                                <option value="5">Wednesday</option>
                                <option value="6">Thursday</option>
                                <option value="7">Friday</option>
                            </select>
                        </div>
                        
                        {{-- <div class="col-md-3 mt-3">
                            <label for="">Class Type :</label>
                            <select name="class_type" id="" class="form-control form-select">
                                <option value="">Select class type</option>
                                <option value="1">Online</option>
                                <option value="2">Offline</option>
                            </select>
                        </div> --}}
                    </div>
                    
                    <div class="col-md-12 mt-4" >
                        <button type="submit" style="margin-left: -14px;" class="btn btn-primary createClass">
                            Create New Class Routine</button>
                    </div>
                </form>
        </div>

    </div>


</div>
<style>
    .btn-add{
        background-color: #4CAF50 !important; /* Green */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }

    .btn-add:hover{
        background-color: #4CAF50 !important;
        color: white;
    }



</style>

@endsection



