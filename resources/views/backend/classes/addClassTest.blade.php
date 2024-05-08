@extends('backend.master')

@section('title', 'Add Class Test')


<link rel="stylesheet" href="{{ URL::asset('css/custom/pathname') }}">

@section('content')

<div class="br-mainpanel">

        <div class="p-2">

            <div class="br-pagetitle">
                <i class="fa-duotone fa-screen-users"></i>
                <div>
                  <h4>Add Class Test</h4>
                  <p class="mg-b-0">Add Class Test</p>
                </div>
              </div>

            <div class="br-section-wrapper">
                    <a href="{{ route('viewClassTest') }}"
                    class="btn btn-primary btn-sm addclassbtn">
                        Show ClassTest
                    </a>
                    <br>

                <form action="{{ route('storeClassTest') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="row pt-3">
                    <div class="col-md-3">
                        <label for="">Class Name :</label>
                        <select name="classId" id="" class="form-select">
                            @foreach ($classList as $class )
                            <option value="{{ $class->class_name }}">{{ $class->class_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="">Subject Name : </label>
                        <input type="text" name="subjectName" value="{{ $subject->sub }}" class="form-control" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="">Class Test Image : </label>
                        <input type="file" name="image"  class="form-control" >
                    </div>
                    <div class="col-md-3">
                        <label for="">Class Test Duration : </label>
                        <input type="text" name="duration"  class="form-control" >
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <label for="">Details : </label>
                        <input type="text" name="details"  class="form-control" >
                    </div>
                    <button type="submit" class="btn btn-info"
                    style="width:30%;margin:0 ; margin-top:30px;">
                    Add </button>
                </div>

                </form>
            </div>

        </div>

</div>
@stop
