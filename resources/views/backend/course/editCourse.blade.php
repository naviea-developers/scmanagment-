@extends('backend.master')

@section('title', 'Edit Courses')


<link rel="stylesheet" href="#">

@section('content')

<div class="br-mainpanel">

      <div class="br-pagetitle">
        <i class="fa-duotone fa-person-chalkboard"></i>
        <div>
          <h4>Update Courses</h4>
          <p class="mg-b-0">Update Course Information</p>
        </div>
      </div><!-- d-flex -->


        <div class="p-5">
            @foreach ($editData as $data)
            <div class="br-section-wrapper">
                {{-- <h2>Find The Best Teacher </h2> --}}

               <form action="{{route('updateCourse',['id' => $data->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Course Name :</label>
                            <input type="text" name="name" value="{{ $data->name }}" class="form-control" required>
                        </div>

                        <div class="col-md-4">
                            <input type="hidden" name="prev_file" value="{{ $data->image }}">
                            <label for="">Course Video File :
                            <input type="file" name="video" class="form-control"
                         multiple>
                            @if (!empty($data->video))
                            <a href="{{ url('/video') }}/{{ $data->video }}" target="_blank">view previous</a>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <label for="">Course Image : </label>
                            <input type="hidden" name="prev_file" value="{{ $data->image }}">
                            <input type="file" name="image" class="form-control"  multiple>
                            @if (!empty($data->image))
                            <a href="{{ url('/video') }}/{{ $data->video }}" target="_blank">view previous</a>
                            @endif>
                        </div>
                        <div class="col-md-4">
                            <label for="">Price :</label>
                            <input type="text" name="price" value="{{ $data->price }}" class="form-control" required>
                        </div>
                    <div class="col-md-4">
                        <label for="">Course Duration :</label>
                        <input type="datetime" name="course_hour" value="{{ $data->course_hour }}" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label for="">Total Days :</label>
                        <input type="text" name="total_days" value="{{ $data->total_days}}" class="form-control" >
                    </div>
                    <div class="col-md-4">
                        <label for="">Features :</label>
                        <input type="text" name="feature[]" value="{{ $data->feature }}" class="form-control" required>
                    </div>

                    <div class="col-md-4">
                        <label for="">Status :</label>
                        <select name="status" id="" class="form-select">
                            <option value="">------Select-----</option>
                            <option value="1" @if($data->status ==1 )selected @endif>Active</option>
                            <option value="0" @if($data->status ==0 )selected @endif>Inactive</option>
                        </select>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Short Description :</label>
                            <textarea style="resize: none" rows="3" cols="2" name="short_description" class="form-control" required>{{ $data->short_description }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                                <label for="">Long Description :</label>
                                <textarea style="resize: none" rows="10" cols="5" name="long_description" class="form-control" required>{{ $data->long_description }}</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                                <label for="">Course routine</label>
                                <textarea style="resize: none" rows="10" cols="5" id="editor" name="course_routine" class="form-control" required>{!! $data->course_routine !!}</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <button type="submit" class="btn btn-info"
                        style="width:30%;margin:0 auto; margin-top:30px;">
                        Update Course</button>
                    </div>

               </form>


            </div>
            @endforeach

        </div>

<script src="js/custom/addTeacherForClass.js"></script>
</div>
@stop
