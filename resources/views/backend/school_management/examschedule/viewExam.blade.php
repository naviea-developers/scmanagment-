@extends('Backend.layouts.layouts')

@section('title','Exam Details')


{{-- <link rel="stylesheet" href="{{ URL::asset('css/custom/eduStc.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('public') }}/css/custom/eduStc.css">

@section('main_contain')

<div class="br-mainpanel">

        <div class="p-2">
            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-chalkboard-user"></i>
                    <div>
                      <h4>View Exam Details</h4>
                    </div>
                  </div>

                    <a href="/allExam"
                    class="btn btn-primary btn-sm addclassbtn">
                        Back To All Exam
                    </a>
                    <br>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Subject Name</th>
                        <th scope="col">Exam Date</th>
                        <th scope="col">Duration</th>
                        {{-- <th scope="col">Action</th> --}}
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($examRoutine->exam_schedule_items as  $routine)
                        <tr>
                            <td>{{$routine->subject->name}}</td>
                            <td>{{$routine->date}}</td>
                            <td>{{$routine->start_time}}-{{$routine->end_time}}</td>
                            <td>
                                {{-- <a href="edit/{{$routine->id}}" class="btn btn-success"><i class="fa-solid fa-edit"></i></a> --}}
                                {{-- <a href="{{ route('editExam',$routine->id) }}" class="btn btn-success"><i class="fa-solid fa-edit"></i></a> --}}
                                {{-- <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</div>
@stop
