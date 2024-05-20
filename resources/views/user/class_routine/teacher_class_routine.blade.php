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
        <div class="col-md-12">
            <div class="row">
                <div class="float-right">
                    <a href="{{ route('user.class_routine.print') }}" class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark">
                        <i class="fas fa-print text-primary"></i> Print
                    </a>
                </div>

                <div class="school-name">
                    <h3>School Name</h3>
                    <h4>Class Routine</h4>
                </div>

                <div class="class-routine">
                    <table>
                        <thead>
                            <tr style="color: black">
                                <th scope="col">Day</th>
                                <th scope="col">Class</th>
                                <th scope="col">Section</th>
                                @php
                                    $durations = $class_routine->groupBy('class_duration_id')->keys();
                                @endphp
                                @foreach ($durations as $durationId)
                                    @php
                                        $duration = $class_routine->firstWhere('class_duration_id', $durationId)->classDuration;
                                    @endphp
                                    <th scope="col">
                                        {{ $duration->name }} 
                                        {{ date('h:i A', strtotime($duration->start_time)) }} - 
                                        {{ date('h:i A', strtotime($duration->end_time)) }}
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @php $prevDay = null; @endphp
                            @foreach ($class_routine->groupBy('day') as $dayName => $dayRoutines)
                                @php
                                    $firstDayRow = true;
                                @endphp
                                @foreach ($dayRoutines->groupBy('class_id') as $classId => $classRoutines)
                                    @php
                                        $class = $classRoutines->first()->class->name;
                                        $firstClassRow = true;
                                    @endphp
                                    @foreach ($classRoutines->groupBy('section_id') as $sectionId => $sectionRoutines)
                                        @php
                                            $section = $sectionRoutines->first()->section->name;
                                            $firstSectionRow = true;
                                        @endphp
                                        @foreach ($sectionRoutines as $routine)
                                            <tr>
                                                @if ($firstDayRow)
                                                    <td rowspan="{{ $dayRoutines->count() }}">{{ $dayName }}</td>
                                                    @php $firstDayRow = false; @endphp
                                                @endif
                                                @if ($firstClassRow)
                                                    <td rowspan="{{ $sectionRoutines->count() }}">{{ $class }}</td>
                                                    @php $firstClassRow = false; @endphp
                                                @endif
                                                @if ($firstSectionRow)
                                                    <td rowspan="{{ $sectionRoutines->count() }}">{{ $section }}</td>
                                                    @php $firstSectionRow = false; @endphp
                                                @endif
                                                @foreach ($class_routine as $routine)
                                                    @if ($routine->day == $dayName)
                                                        <td>{{ $routine->subject->name }} <br>
                                                          {{ $routine->teacher->name }} <br>
                                                          Room- {{ $routine->room->name }}
                                                        </td>
                                                    @endif
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    @endforeach
                                @endforeach
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
