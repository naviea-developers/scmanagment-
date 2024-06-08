@extends('user.layouts.master-layout')
@section('head')
@section('title', '- Class Routine')
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
        <div class="col-md-12">
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
                    Section: {{ @$admission->section->name }}</p>
                    <h6>Class Routine</h6>
                </div>
                <div class="class-routine">
                    @php
                        $classRoutinesByDay = [];
                        $classDurations = [];

                        foreach ($class_routine as $data) {
                            $classRoutinesByDay[$data->day][$data->classDuration->name] = $data;
                            if (!in_array($data->classDuration, $classDurations)) {
                                $classDurations[] = $data->classDuration;
                            }
                        }

                        // Sort class durations by start time
                        usort($classDurations, function($a, $b) {
                            return strtotime($a->start_time) - strtotime($b->start_time);
                        });
                    @endphp

                    <table class="table table-bordered">
                        <thead>
                            <tr style="color: black">
                                <th scope="col">Day</th>
                                @foreach ($classDurations as $duration)
                                    <th scope="col">
                                        {{ $duration->name }} <br>
                                        {{ date('h:i A', strtotime($duration->start_time)) }} - 
                                        {{ date('h:i A', strtotime($duration->end_time)) }}
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classRoutinesByDay as $day => $routines)
                                <tr>
                                    <td>{{ $day }}</td>
                                    @php
                                        $skip = 0; // Tracks number of cells to skip
                                    @endphp
                                    @foreach ($classDurations as $index => $duration)
                                        @php
                                            if ($skip > 0) {
                                                $skip--;
                                                continue;
                                            }
                                            $currentRoutine = $routines[$duration->name] ?? null;
                                            $colspan = 1;

                                            if ($currentRoutine) {
                                                for ($nextIndex = $index + 1; $nextIndex < count($classDurations); $nextIndex++) {
                                                    $nextDuration = $classDurations[$nextIndex];
                                                    $nextRoutine = $routines[$nextDuration->name] ?? null;

                                                    if ($nextRoutine && 
                                                        $currentRoutine->subject->name === $nextRoutine->subject->name &&
                                                        $currentRoutine->teacher->name === $nextRoutine->teacher->name) {
                                                        $colspan++;
                                                    } else {
                                                        break;
                                                    }
                                                }
                                            }

                                            if ($colspan > 1) {
                                                $skip = $colspan - 1;
                                            }
                                        @endphp

                                        <td colspan="{{ $colspan }}">
                                            @if ($currentRoutine)
                                                {{ $currentRoutine->subject->name }} <br>
                                                {{ $currentRoutine->teacher->name }} <br>
                                                {{ $currentRoutine->room->name }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="passwodBox" style="background-color: #07477D; padding:20px; border:1px; color:white">
        <h5 class="text-center">Class routine not available right now.</h5>
    </div>
@endif
@endsection