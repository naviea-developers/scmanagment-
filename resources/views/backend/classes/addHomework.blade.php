@extends('Backend.layouts.layouts')

@section('title', 'Add Homework')


<link rel="stylesheet" href="{{ URL::asset('css/custom/pathname') }}">

@section('main_contain')

<div class="br-mainpanel">

      <div class="br-pagetitle">
        <i class="fa-duotone fa-screen-users"></i>
        <div>
          <h4>Add Homework</h4>
          <p class="mg-b-0">Add Daily Homework For Students</p>
        </div>

      </div><!-- d-flex -->


        <div class="p-5">

            <div class="br-section-wrapper">
                <a href="{{ route('getHomework') }}"
                class="btn btn-primary btn-sm addclassbtn">
                    Show Homework
                </a>
                <br>
                <form action="{{ route('storeHomework') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="row">
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
                        <input type="text" name="teacherId" value="{{ $subject->sub }}" class="form-control" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="">Homework Image : </label>
                        <input type="file" name="image"  class="form-control" >
                    </div>
                    <div class="col-md-3">
                        <label for="">About Homework : </label>
                        <input type="text" name="details"  class="form-control" >
                    </div>
                </div>

                <div class="row">
                    <button type="submit" class="btn btn-info"
                    style="width:30%;margin:0 auto; margin-top:30px;">
                    Add Homework</button>
                </div>

                </form>
            </div>


        </div>



</div>
@stop
