@extends('backend.master')

@section('title', 'Add Class')

<link rel="stylesheet" href="css/custom/class.css">

@section('content')

<div class="br-mainpanel">



        <div class="p-5">

            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-screen-users"></i>
                    <div>
                      <h4>Add a Subject</h4>
                      <p class="mg-b-0">Add a new class for your student</p>
                    </div>
                  </div>

                @foreach ($editData as $data )
                <form action="{{ route('updateSubj',['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Select Class : </label>
                            <input type="text" name="className"
                            class="form-control" value="{{ $data->class_name }}" >
                            {{-- <select name="className" id=""
                            class="form-select">
                            <option value="{{ $data->class_name }}"> {{ $data->class_name }}</option>
                                {{-- @foreach ($class as $cl)
                                    <option value="{{ $cl->class_name }}">
                                        {{ $cl->class_name }}
                                    </option>
                                @endforeach
                            </select> --}}
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Subject Image : </label>
                                <input type="hidden" name="prev_file" value="{{ $data->iamge }}">
                                <input type="file" name="image" class="form-control"  multiple>
                                @if (!empty($data->iamge))
                                <a href="{{ url('/backend/subject') }}/{{ $data->iamge }}" target="_blank">view previous</a>
                                @endif>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Subject Name : </label>
                                <input type="text"
                                class="form-control" name="subject" value="{{ $data->subject }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Group Name : </label>

                                <select name="group"
                                class="form-select">
                                    <option value="">-------Select Group--------</option>
                                    <option value="Science" @if($data->group == 'Science') selected @endif >Science</option>
                                    <option value="Arts" @if($data->group == 'Arts') selected @endif >Arts</option>
                                    <option value="Commerce" @if($data->group == 'Commerce') selected @endif >Commerce</option>
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

                @endforeach

        </div>

    </div>


</div>
{{-- <script>
    const ac = document.getElementById("group");
    ac.style.display = "none";

</script> --}}
@stop
