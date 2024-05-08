@extends('backend.master')

@section('title', 'Add ')


<link rel="stylesheet" href="{{ URL::asset('css/custom/pathname') }}">

@section('content')

<div class="br-mainpanel">

        <div class="p-2">

            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-user"></i>
                    <div>
                      <h4>Add New User</h4>
                      <p class="mg-b-0">Added user can access this platform</p>
                    </div>
                  </div>

                <form action="{{ route('insertUser') }}" method="post">
                        @csrf
                    <div class="col-md-12 mb-2">
                        <label for="">Name * </label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="">Email * </label>
                        <input type="email" name="email" class="form-control">
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="">Role * </label>
                        <select name="role" id="" class="form-select">
                            <option value="admin">Admin</option>
                            <option value="teacher">Teacher</option>
                            <option value="student">Student</option>
                        </select>
                    </div>

                    <div class="col-md-12 mb-2">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Password * </label>
                                <input type="password" name="pass" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="">Confirm Password * </label>
                                <input type="password" class="form-control">
                            </div>
                        </div>
                    </div>

                    <center>
                        <br>
                        <button class="btn btn-primary">Add this user</button>
                    </center>

                </form>

            </div>


        </div>



</div>
@stop
