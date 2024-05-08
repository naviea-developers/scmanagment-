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
                      <h4>Add a Subject</h4>
                      <p class="mg-b-0">Add a new class for your student</p>
                    </div>
                  </div>

                <form action="{{ route('addASubj') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Select Class : </label>
                            <select name="className" id=""
                            class="form-select">
                                @foreach ($class as $cl)
                                    <option value="{{ $cl->class_name }}">
                                        {{ $cl->class_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Subject Image : </label>
                                <input type="file"
                                class="form-control" name="image">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Subject Name : </label>
                                <input type="text"
                                class="form-control" name="subject">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Group Name : </label>
                                <select name="group"
                                class="form-select">
                                <option value="">------Select Option---------</option>
                                    <option value="Science">Science</option>
                                    <option value="Arts">Arts</option>
                                    <option value="Commerce">Commerce</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary
                         createClass">
                            Create New Subject</button>
                    </div>
                </form>


        </div>

    </div>


</div>
{{-- <script>
    const ac = document.getElementById("group");
    ac.style.display = "none";

</script> --}}
@stop
