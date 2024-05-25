@extends('Backend.layouts.layouts')

@section('title', 'Add exam Subject')
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
                      <h4>Add Exam Subject</h4>
                      <p class="mg-b-0">Add Exams Subject</p>
                    </div>
                </div>

               {{-- validate start  --}}
               @if(count($errors) > 0)
               @foreach($errors->all() as $error)
                   <div class="alert alert-danger">{{ $error }}</div>
               @endforeach
               @endif
               {{-- validate End  --}}

                <form action="{{ route('admin.examclass.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
    
                        <div class="col-md-3">
                            <label for="">Exam title :</label>
                            <select name="examination_id" id="" class="form-control form-select select2">
                                <option value="0">Select Exam title</option>
                                @foreach (@$examinations as $examination)
                                    <option value="{{ $examination->id }}">{{ $examination->name }}</option>
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

                        <div class="col-md-3">
                            <label for="">Group :</label>
                            <select name="group_id" id="group" class="form-control form-select select2">
                                <option value="0">Select group</option>
                                {{-- @foreach (@$groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
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
                            <label>Select Exam Types : </label>
                            <select name="examtype_id" id=""class="form-control form-select select2">
                                <option value="0">select exam type</option>
                                @foreach ($examTypes as $examType)
                                    <option value="{{ $examType->id }}">{{ $examType->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 mt-3">
                            <label for="">Marke :</label>
                            <input type="number" name="marke" class="form-control">
                        </div>
                        <div class="col-md-3 mt-3">
                            <label for="">Pass Marke :</label>
                            <input type="number" name="pass_marke" class="form-control">
                        </div>
                    
                        <div class="col-md-3 mt-3">
                            <label for="">Date :</label>
                            <input type="date" name="date" class="form-control">
                        </div>
                        <div class="col-md-3 mt-3">
                            <label for="">Start Time :</label>
                            <input type="time" name="start_time" class="form-control">
                        </div>
                        <div class="col-md-3 mt-3">
                            <label for="">End Time :</label>
                            <input type="time" name="end_time" class="form-control">
                        </div>
                    </div>
                    

                    <div class="col-md-12 mt-4" >
                        <button type="submit" style="margin-left: -14px;" class="btn btn-primary createClass">
                            Create New Exam Subject</button>
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




