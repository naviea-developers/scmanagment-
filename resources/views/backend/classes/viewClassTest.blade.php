@extends('backend.master')

@section('title', 'All Class Test')


<link rel="stylesheet" href="{{ URL::asset('css/custom/eduStc.css') }}">

@section('content')

<div class="br-mainpanel">

      <div class="br-pagetitle">
        <i class="fa-duotone fa-chalkboard-user"></i>
        <div>
          <h4>View All Class Test</h4>
          <p class="mg-b-0">Manage Class Test</p>
        </div>
      </div>


        <div class="p-5">

            <div class="br-section-wrapper">
                    <a href="{{ route('addClassTest') }}"
                    class="btn btn-primary btn-sm addclassbtn">
                        Add Class Test
                    </a>
                    <br>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Class Name</th>
                        <th scope="col">Subject Name</th>
                        <th scope="col">Class Test Image</th>
                        <th scope="col">Test Duration</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($classTest as $test)
                        <tr>
                            <td>{{$test->id}}</td>
                            <td>{{$test->classId}}</td>
                            <td>{{$test->subjectName}}</td>
                            <td><img src="{{ asset('homework/'.$test->image)}}" height="80" width="80" alt=""></td>
                            <td>{{$test->duration}}</td>
                            <td>{{$test->details}}</td>
                            <td>
                                <a href=""><i class="fa-solid fa-edit btn btn-sm btn-success"></i></a>
                                <a href=""><i class="fa-solid fa-trash btn btn-sm  btn-danger"></i></a>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
</div>
@stop
