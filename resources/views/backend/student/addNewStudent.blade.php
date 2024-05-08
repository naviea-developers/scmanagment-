@extends('backend.master')

@section('title', 'Add New Student')


<link rel="stylesheet" href="{{ URL::asset('css/custom/addStudent.css') }}">

@section('content')

<div class="br-mainpanel">


        <div class="p-2">

            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-user-plus"></i>
                    <div>
                      <h4>Add New Student</h4>
                    </div>
                  </div>

                <form action="addNewStudentByAdmin" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="col-md-6" style="padding: 0px;">
                                <img class="addStdPp" src="{{ url('/backend/profile_picture/dft/user.png') }}" alt="" id="blah">
                                <input type="file" name="profilePicture"
                                onchange="document.getElementById('blah').src =
                                 window.URL.createObjectURL(this.files[0])"
                                 class="form-control" accept="image/*" required>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 20px">
                        <div class="col-md-6">
                            <label for="">Student Name :  *</label>
                            <input type="text" name="name" id="" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label for="">Father Name : *</label>
                            <input type="text" name="fname" id="" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label for="">Mother Name : *</label>
                            <input type="text" name="mname" id="" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label for="">Class : **</label>
                            <select name="class" id="" class="form-select">
                                @foreach ($classlist as $cl)
                                    <option value="{{ $cl->id }}">{{ $cl->class_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="">Email : *</label>
                            <input type="text" name="email" id="" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label for="">Phone : </label>
                            <input type="text" name="phone" id="" class="form-control">
                        </div>

                        <div class="col-md-12">
                            <label for="">Address : </label>
                            <input type="text" name="adds" id="" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label for="">Login Password * : </label>
                            <input type="text" name="pass" id="" class="form-control" required>
                        </div>

                    </div>
<br><br>
                    <center>
                        <button class="btn btn-primary">
                            <i class="fa-duotone fa-user-plus"></i>
                            Add Student
                        </button>
                    </center>
                </form>

            </div>


        </div>



</div>
@stop
