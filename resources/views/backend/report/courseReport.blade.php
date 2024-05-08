@extends('backend.master')

@section('title', 'All Course')


<link rel="stylesheet" href="{{ URL::asset('css/custom/eduStc.css') }}">

@section('content')

<div class="br-mainpanel">

      <div class="br-pagetitle">
        <i class="fa-duotone fa-chalkboard-user"></i>
        <div>
          <h4>View All Courses</h4>
          <p class="mg-b-0">Manage all Course for student</p>
        </div>
      </div>


        <div class="p-5">

            <div class="br-section-wrapper" style="overflow: hidden; overflow-x: auto">
                    <a href="{{ route('addCourse') }}"
                    class="btn btn-primary btn-sm addclassbtn">
                        Add Course
                    </a>
                    <br>
                <table class="table">
                    <thead>
                      <tr>
                        {{-- <th scope="col">Course Category</th> --}}
                        <th scope="col">Course Name</th>
                        <th scope="col">Course File</th>
                        <th scope="col">Image</th>
                        <th scope="col">Course Details</th>
                        <th scope="col">Course Price </th>
                        <th scope="col">Course Duration</th>
                        <th scope="col">Total Days</th>
                        <th scope="col">Features</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ($totalcourse as $course)
                        <tr>
                            {{-- <td>{{$course->categoryName}}</td> --}}
                            <td>{{$course->name}}</td>
                            {{-- <td><img src="{{ asset('video/'.$course->video)}}" height="100" width="100" alt=""></td> --}}
                            <td><video height="100"  width="100" controls>
                                <source src="{{ asset('video/'.$course->video)}}" type="video/mp4">
                            </video></td>
                            <td><img src="{{ asset('video/'.$course->image)}}" alt="" height="100" width="100"></td>
                            <td>{{$course->short_description}}</td>
                            <td>{{$course->price}}</td>
                            <td>{{$course->course_hour}}</td>
                            <td>{{$course->total_days}}</td>
                            <td>{{$course->feature}}</td>
                            <td>{{ $course->status }}</td>
                            <td>
                                <a href="editCourse/{{$course->id}}"><i class="fa-solid fa-edit btn btn-sm btn-success"></i></a>
                                <a href="deleteCourse/{{ $course->id }}"><i class="fa-solid fa-trash btn btn-sm  btn-danger"></i></a>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>

            </div>

        </div>
</div>

@stop
