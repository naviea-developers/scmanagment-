@extends('user.layouts.master-layout')
@section('head')
@section('title','- Class Routine')


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


@if ($class_routine->isNotEmpty())

    <div class="passwodBox mb-3" style="background-color: #07477D; color:white">
        <di class="col-md-12">
            <div class="row">

              <div class="float-right">
                <a href="{{ route('user.class_routine.print') }}" class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark">
                    <i class="fas fa-print text-primary"></i> Print
                </a>
              </div>

                <div class="school-name">
                    <h3>{{ @$tpOption->company_name }}</h3>
                    <h6>Class Name: {{ @$admission->class->name ?? '' }}</h6>
                    <h6>Session: {{ @$admission->session->start_year ?? '' }} - {{ @$admission->session->end_year ?? '' }}</h6>
                    <h6>Sesction: {{ @$admission->section->name }} </h6>
                    <h4>Class Routine</h4>
                </div>
                
                  <div class="class-routine">
                    @php
                        $classRoutinesByDay = [];
                        $classDurations = [];
                
                        foreach ($class_routine as $data) {
                            $classRoutinesByDay[$data->day][$data->classDuration->name] = $data;
                            if (!in_array($data->classDuration->name, $classDurations)) {
                                $classDurations[] = $data->classDuration->name;
                            }
                        }
                
                        // Sort class durations
                        sort($classDurations);
                    @endphp
                
                    <table>
                        <thead>
                            <tr style="color: black">
                                <th scope="col">Day</th>
                                @foreach ($classDurations as $duration)
                                    <th scope="col">
                                        {{ @$duration }} <br>
                                        @php
                                            $durationData = $class_routine->firstWhere('classDuration.name', $duration)->classDuration;
                                        @endphp
                                        {{ date('h:i A', strtotime(@$durationData->start_time)) }} - 
                                        {{ date('h:i A', strtotime(@$durationData->end_time)) }}
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classRoutinesByDay as $day => $routines)
                                <tr>
                                    <td>{{ $day }}</td>
                                    @foreach ($classDurations as $duration)
                                        <td>
                                            @isset($routines[$duration])
                                                {{ @$routines[$duration]->subject->name }} <br>
                                                {{ @$routines[$duration]->teacher->name }} <br>
                                                {{ @$routines[$duration]->room->name }}
                                            @else
                                                -
                                            @endisset
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </div>
            </div>
        </di>
    </div>

@else
<div class="passwodBox" style="background-color: #07477D; padding:20px; border:1px; color:white">
  <h5 class="text-center">Class routine not available right now.</h5>
</div>
@endif
@endsection