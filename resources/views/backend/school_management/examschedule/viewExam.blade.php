@extends('Backend.layouts.layouts')
@section('style')
<style>
  /* Additional custom styles */
  .school-name {
    text-align: center;
    margin-bottom: 30px;
  }
  .class-routine {
    margin-bottom: 50px;
  }
  .class-routine table {
    width: 100%;
    border-collapse: collapse;
  }
  .class-routine th, .class-routine td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: center;
  }
  .class-routine th {
    background-color: #f2f2f2;
  }
</style>
@endsection
@section('title','Exam Details')
{{-- <link rel="stylesheet" href="{{ URL::asset('css/custom/eduStc.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('public') }}/css/custom/eduStc.css">

@section('main_contain')
<br>
<div class="br-mainpanel">

  <div class="container">

    <div class="float-end">
      <a href="{{ route('admin.exam.print',$examRoutine->id) }}" class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i class="fas fa-print text-primary"></i> Print</a>
    </div>

    <div class="school-name">
      <h1>School Name</h1>
      <h5>Class Name: {{ @$examRoutine->class->name }}</h5>
      <h5>Examination: {{@$examRoutine->examination->name}}</h5>
    </div>
  
    <div class="class-routine">
      <h2>Exam Routine</h2>
      <table>

        <thead>
          <tr>
            <th>Subject Name</th>
            <th>Bulding Name</th>
            <th>Floor Name</th>
            <th>Room Name</th>
            <th>Pass Marke</th>
            <th>Fail Marke</th>
            <th>Time</th>
            
          </tr>
        </thead>

        <tbody>
          @foreach ($examRoutine->exam_schedule_items as  $routine)
            <tr>
              <td>{{ $routine->subject->name }}</td>
              <td>{{ $routine->bulding->name }}</td>
              <td>{{ $routine->floor->name }}</td>
              <td>{{ $routine->room->name }}</td>
              <td>{{ $routine->pass_marke }}</td>
              <td>{{ $routine->fail_marke }}</td>
              <td>{{ $routine->start_time }} - {{ $routine->end_time }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>














{{-- 
        <div class="p-2">
            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-chalkboard-user"></i>
                    <div>
                      <h4>View Exam Routine Details</h4>
                    </div>
                  </div>

                    <a href="{{ route('allExam') }}"
                    class="btn btn-primary btn-sm addclassbtn">
                        Back To All Exam Routine
                    </a>
                    <br>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Subject Name</th>
                        <th scope="col">Exam Date</th>
                        <th scope="col">Duration</th>
                    
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($examRoutine->exam_schedule_items as  $routine)
                        <tr>
                            <td>{{$routine->subject->name}}</td>
                            <td>{{$routine->date}}</td>
                            <td>{{$routine->start_time}}-{{$routine->end_time}}</td>
                            <td>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> --}}
</div>

@endsection
