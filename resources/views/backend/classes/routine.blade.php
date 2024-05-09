@extends('Backend.layouts.layouts')

@section('title', 'Classes')



@section('main_contain')

<div class="br-mainpanel">

        <div class="p-2">

            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-screen-users"></i>
                    <div>
                      <h4>Add Class Routine</h4>
                      <p class="mg-b-0">Create and publish a routine</p>
                    </div>
                  </div>

                <form action="uploadRoutine" method="POST">
                @csrf
                    <div class="col-12">
                        <label for="">Select Class : </label>
                        <select name="class" class="form-select">
                            @foreach ($classList as $cl)
                                <option value="{{ $cl->class_id }}">
                                    {{ $cl->class_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                        <br>
                    <div class="col-12">
                        <label for="">Design Your Routine : </label>
                        <textarea name="routine" id="summernote" cols="30" rows="10"></textarea>
                    </div>

                   <div class="col-12">
                        <button class="btn btn-primary btn-sm" style="margin: 0 auto; display:block;margin-top:20px">Upload Routine</button>
                   </div>

                </form>




            </div>




        </div>




</div>
@stop
