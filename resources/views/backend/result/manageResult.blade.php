@extends('backend.master')

@section('title', 'Manage Result')


<link rel="stylesheet" href="{{ URL::asset('css/custom/eduStc.css') }}">

@section('content')

<div class="br-mainpanel">



        <div class="p-2">

            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-chalkboard-user"></i>
                    <div>
                      <h4>View All Result</h4>
                      <p class="mg-b-0">Manage all Result</p>
                    </div>
                  </div>

                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Exam Name</th>
                        <th scope="col">Class Name</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">view</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ($getData as $data)

                        <tr>
                            <td>{{ $data->examId }}</td>
                            <td>{{ $data->class }}</td>
                            <td>{{ $data->name }}</td>
                            <td>

                                    <a href="/deleteResult/{{ $data->id }}" class="btn btn-light float-left"
                                    style="margin-left:5px;">
                                        <i class="fa-duotone
                                        fa-trash-can"></i>
                            </a>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>

            </div>


        </div>



</div>
@stop
