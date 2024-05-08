@extends('backend.master')

@section('title', 'Add Class')

<link rel="stylesheet" href="css/custom/class.css">

@section('content')

<div class="br-mainpanel">


        <div class="p-2">

            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-screen-users"></i>
                    <div>
                      <h4>Add a Class</h4>
                      <p class="mg-b-0">Add a new class for your student</p>
                    </div>
                  </div>

                <form action="{{ route('addAClass') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Class Name : </label>
                                <input type="text" class="form-control" name="className">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary createClass">
                            Create New Class</button>
                    </div>
                </form>


        </div>

    </div>


</div>
@stop
