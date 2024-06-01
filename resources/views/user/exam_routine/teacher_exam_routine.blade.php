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

                @if ($examSchedules->isNotEmpty())

                <div class="float-right">
                  {{-- <a href="{{ route('teacher.exam_routine.print') }}?examination_id={{ @$examSchedules[0]->examination_id }}" class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"> --}}
                  <a href="{{ route('teacher.exam_routine.print') }}" class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark">
                      <i class="fas fa-print text-primary"></i> Print
                  </a>
                </div>
                
                @php
                  $results = \App\Models\Tp_option::where('option_name', 'theme_option_school_info')->first();
                  $school_info = json_decode($results->option_value);
                @endphp
                <div class="school-name">
                    <h3>{{ @$school_info->school_name }}</h3>

                 @php
                    $examinationNames = [];
                    foreach ($examSchedules as $examSchedule) {
                        $examinationName = $examSchedule->examination->name ?? 'N/A';
                        if (!in_array($examinationName, $examinationNames)) {
                            $examinationNames[] = $examinationName;
                        }
                    }
                    $examinationName = implode(', ', $examinationNames);
                @endphp
                <h5>Examination: {{ $examinationName }}</h5>

                <h2>Exam Routine</h2>
                </div>
                  <div class="class-routine">
                    <table>
                      <thead>
                        <tr style="color: black">
                          <th>Date</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                            $shownDates = [];
                        @endphp
              
                        @php
                            $groupedSchedules = [];
                            foreach ($examSchedules as $routine) {
                                $examDate = date('d,F,Y', strtotime(@$routine->examClass->date));
                                $groupedSchedules[$examDate][] = $routine;
                            }
                        @endphp
              
                        @foreach ($groupedSchedules as $date => $schedules)
                            @php
                                $rowspan = count($schedules);
                            @endphp
                            @foreach ($schedules as $index => $routine)
                                <tr>
                                    @if ($index == 0)
                                        <td rowspan="{{ $rowspan }}">{{ $date }}</td>
                                    @endif
                                    <td>
                                        Class :{{ @$routine->examClass->class->name }},
                                        Subject : {{ @$routine->examClass->subject->name }},
                                        Bulding :{{ @$routine->bulding->name }},
                                        Floor :{{ @$routine->floor->name }},
                                        Room :{{ @$routine->room->name }},
                                        Time :{{ date('h:i A', strtotime(@$routine->examClass->start_time)) }} - {{ date('h:i A', strtotime(@$routine->examClass->end_time)) }}
                                    </td>
                                </tr>
                            @endforeach
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