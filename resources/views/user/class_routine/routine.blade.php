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

    <div class="passwodBox mb-3" style="background-color:var(--seller_frontend_color); color:var(--seller_text_color)">
        <di class="col-md-12">
            <div class="row">

              <div class="float-right">
                <a href="{{ route('user.class_routine.print') }}" class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark">
                    <i class="fas fa-print text-primary"></i> Print
                </a>
              </div>

                  @php
                      $results = \App\Models\Tp_option::where('option_name', 'theme_option_school_info')->first();
                      $school_info = json_decode($results->option_value);
                  @endphp
                  <div class="school-name">
                    <h4>{{ @$school_info->school_name }}</h4>                       
                      <p>Class Name: {{ @$admission->class->name ?? '' }} <br>
                        {{-- Session: {{ @$admission->session->start_year ?? '' }} - {{ @$admission->session->end_year ?? '' }} <br> --}}
                        {{-- Session: {{ @$session->start_year ?? '' }} - {{ @$session->end_year ?? '' }} <br> --}}
                        Sesction: {{ @$admission->section->name }} 
                      <h6>Class Routine</h6>
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
  <div class="passwodBox" style="background-color: var(--seller_frontend_color); padding:20px; border:1px; color:var(--seller_text_color)">
    <h5 class="text-center">Class routine not available right now.</h5>
  </div>
@endif
@endsection