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
                <a href="{{ route('teacher.class_routine.print') }}" class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark">
                    <i class="fas fa-print text-primary"></i> Print
                </a>
              </div>

                <div class="school-name">
                    <h3>School Name</h3>
                    {{-- <h6>Class Name: {{ @$admission->class->name ?? '' }}</h6> --}}
                    {{-- <h6>Session: {{ @$admission->session->start_year ?? '' }} - {{ @$admission->session->end_year ?? '' }}</h6>
                    <h6>Sesction: {{ @$admission->section->name }} </h6> --}}
                    <h4>Class Routine</h4>
                </div>
                
                
                  <div class="class-routine">
                    
                    {{-- <table>
                      <thead>
                          <tr style="color: black">
                              <th scope="col">Day</th>
                              @php $prevDurations = []; @endphp
                              @foreach ($class_routine as $data)
                                  @if (!in_array($data->classDuration->name, $prevDurations))
                                      <th scope="col">
                                          {{ $data->classDuration->name }} 
                                          {{ date('h:i A', strtotime($data->classDuration->start_time)) }} - 
                                          {{ date('h:i A', strtotime($data->classDuration->end_time)) }}
                                      </th>
                                      @php $prevDurations[] = $data->classDuration->name; @endphp
                                  @endif
                              @endforeach
                          </tr>
                      </thead>
                      <tbody>
                          @php $prevDay = null; @endphp
                          @foreach ($class_routine as $data)
                              @if ($prevDay != $data->day)
                                  <tr>
                                      <td>{{ $data->day }}</td>
                                      @foreach ($class_routine as $routine)
                                          @if ($routine->day == $data->day)
                                              <td>{{ $routine->subject->name }} <br>
                                                {{ @$routine->class->name }} <br>
                                                {{ @$routine->section->name }} <br>
                                                Room- {{ $routine->room->name }}
                                              </td>
                                          @endif
                                      @endforeach
                                  </tr>
                                  @php $prevDay = $data->day; @endphp
                              @endif
                          @endforeach
                      </tbody>
                  </table> --}}

                  {{-- @php
                    $classRoutinesByDay = [];
                    $classDurations = [];
            
                    foreach ($class_routine as $data) {
                        $classRoutinesByDay[$data->day][$data->classDuration->name] = $data;
                        if (!in_array($data->classDuration->name, $classDurations)) {
                            $classDurations[] = $data->classDuration->name;
                        }
                    }
                  @endphp
            
                  <table>
                      <thead>
                          <tr style="color: black">
                              <th scope="col">Day</th>
                              @foreach ($classDurations as $duration)
                                  <th scope="col">
                                      {{ $duration }} <br>
                                      @php
                                        $durationData = $class_routine->firstWhere('classDuration.name', $duration)->classDuration;
                                      @endphp
                                      {{ date('h:i A', strtotime($durationData->start_time)) }} - 
                                      {{ date('h:i A', strtotime($durationData->end_time)) }}
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
                                              {{ $routines[$duration]->subject->name }} <br>
                                              {{ $routines[$duration]->teacher->name }} <br>
                                              Room- {{ $routines[$duration]->room->name }}
                                          @else
                                              
                                          @endisset
                                      </td>
                                  @endforeach
                              </tr>
                          @endforeach
                      </tbody>
                  </table> --}}

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
                                            Class Name : {{ @$routines[$duration]->class->name }} <br>
                                                {{ @$routines[$duration]->subject->name }} <br>
                                                {{ @$routines[$duration]->teacher->name }} <br>
                                            Room : {{ @$routines[$duration]->room->name }}
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