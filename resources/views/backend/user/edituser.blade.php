@extends('backend.master')

@section('title', 'Edit User')


<link rel="stylesheet" href="{{ URL::asset('css/custom/pathname') }}">

@section('content')

<div class="br-mainpanel">

      <div class="br-pagetitle">
        <i class="fa-duotone fa-user"></i>
        <div>
          <h4>Edit User Basic Information</h4>
        </div>
      </div><!-- d-flex -->


        <div class="p-5">

            <div class="br-section-wrapper">


                <form action="{{ route('updateUserInfo') }}" method="post">
                    @csrf
                    @foreach ($user as $ur)
                    <input type="hidden" name="userId" value="{{ $ur->id }}">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">Name :-</label>
                                <input type="text" name="username" class="form-control" value="{{ $ur->name }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Role :-</label>
                                <select name="role" class="form-select">
                                    <option value="{{ $ur->role }}" style="text-transform: capitalize;color:blue;" selected>{{ $ur->role }}</option>
                                    <option value="admin">Admin</option>
                                    <option value="teacher">Teacher</option>
                                    <option value="student">Student</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Phone :-</label>
                                <input type="text" name="phone" class="form-control" value="{{ $ur->phone }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">E-mail :-</label>
                                <input type="text" name="email" class="form-control" value="{{ $ur->email }}">
                            </div>

                        </div>
                    @endforeach

                    <center>
                        <button class="btn btn-primary">Update User Info</button>
                    </center>

                </form>


            </div>


        </div>



</div>
@stop
