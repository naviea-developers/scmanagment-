@extends('Backend.layouts.layouts')

@section('title', 'Edit Exams')


<link rel="stylesheet" href="#">

@section('content')

<div class="br-mainpanel">



        <div class="p-2">

            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-person-chalkboard"></i>
                    <div>
                      <h4>Update exam</h4>
                      <p class="mg-b-0">Update exam Information</p>
                    </div>
                  </div>

                @foreach ($editData as $data)
               <form action="{{route('update',['id' => $data->className])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Title :</label>
                            <input type="text" name="title" readonly value="{{$data->title}}" class="form-control">
                            <input type="hidden" name="id" value="{{$data->id}}" class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label for="">Class Name :</label>
                            <input type="text" name="className" readonly value="{{$data->className}}" class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label for="">Subject Name :</label>
                            <input type="text" name="subjectName" value="{{$data->subjectName}}" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="">Date :</label>
                            <input type="text" name="date" value="{{$data->date}}" class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label for="">Start At :</label>
                            <input type="time" name="startAt" value="{{$data->startAt}}" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="">End At :</label>
                            <input type="time" name="endAt" value="{{$data->endAt}}" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <button type="submit" class="btn btn-info"
                        style="width:30%;margin:0 auto; margin-top:30px;">
                        Update Exam Routine</button>
                    </div>

               </form>
               @endforeach

            </div>


        </div>

<script src="js/custom/addTeacherForClass.js"></script>
</div>
@stop
