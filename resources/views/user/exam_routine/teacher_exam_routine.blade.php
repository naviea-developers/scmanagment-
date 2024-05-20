@extends('user.layouts.master-layout')
@section('head')
@section('title','- Exam Routine')


@endsection
@section('main_content')
<link rel="stylesheet" href="{{ asset('public') }}/css/custom/eduStc.css">
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


    {{-- <div class="right_section">
        <div>
            <h4 style="color: black">Exam Routine</h4>
        </div>
    </div> --}}
    <div class="passwodBox mb-3" style="background-color: #07477D; color:white">
        <di class="col-md-12">
            <div class="row">

                {{-- <div class="item">
                    <i class="fa-solid fa-user"></i>
                    <span class="text-center">  Class {{ $admission->class->name }}</span>
                </div> --}}

                @if ($examRoutine->isNotEmpty())

                <div class="float-right">
                  <a href="{{ route('teacher.exam_routine.print') }}" class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark">
                      <i class="fas fa-print text-primary"></i> Print
                  </a>
              </div>




                  <div class="school-name">
                      <h3>School Name</h3>
                      <h6>Class Name: {{ $teacher->class->name ?? '' }}</h6>
                      {{-- <h6>Session: {{ $admission->session->start_year ?? '' }} - {{ $admission->session->end_year ?? '' }}</h6> --}}
                    
                      @foreach ($examRoutine as $routine)
                          <h5>Examination: {{ $routine->examination ? $routine->examination->name : 'N/A' }}</h5>
                      @endforeach
                      <h4>Exam Routine</h4>
                  </div>
                  
                  
                  <div class="class-routine">
                    <table>
                      <thead>
                        <tr style="color: black">
                          <th>Date</th>
                          <th>Subject</th>
                          <th>Bulding</th>
                          <th>Floor</th>
                          <th>Room</th>
                          <th>Time</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($examRoutine as $routine)
                              <tr>
                                  <td>{{ @$routine->examClass->date }}</td>
                                  <td>{{ @$routine->examClass->subject->name }}</td>
                                  <td>{{ @$routine->bulding->name }}</td>
                                  <td>{{ @$routine->floor->name }}</td>
                                  <td>{{ @$routine->room->name }}</td>
                                  <td>{{ \Carbon\Carbon::parse(@$routine->examClass->start_time)->format('h:iA') }} - {{ \Carbon\Carbon::parse(@$routine->examClass->end_time)->format('h:iA') }}</td>
                              </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                @else
                    <h5 class="text-center">Exam routine not available right now.</h5>
                @endif


            </div>
        </di>
    </div>
@endsection