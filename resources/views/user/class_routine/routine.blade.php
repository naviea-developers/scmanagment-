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


    {{-- <div class="right_section">
        <div>
            <h4 style="color: black">Class Routine</h4>
            <span style="color: white">Confirm Code.</span>
        </div>
    </div> --}}
    <div class="passwodBox mb-3" style="background-color: #07477D; color:white">
        <di class="col-md-12">
            <div class="row">

                {{-- <div class="item">
                    <i class="fa-solid fa-user"></i>
                    <span class="text-center">  Class {{ $admission->class->name }}</span>
                </div> --}}
                <div class="school-name">
                    <h3>School Name</h3>
                    <h6>Class Name: {{ $admission->class->name ?? '' }}</h6>
                    <h6>Session: {{ $admission->session->start_year->year ?? '' }} - {{ $admission->session->end_year->year ?? '' }}</h6>
                    <h6>Class Type: 
                        @if ($class_routine->isNotEmpty())
                            @if ($class_routine[0]->class_type == '1')
                                Online
                            @elseif ($class_routine[0]->class_type == '2')
                                Offline
                            @endif
                        @endif
                    </h6>
                    <h4>Class Routine</h4>
                </div>
                
                
                  <div class="class-routine">
                    
                    <table>
                      <thead style="color: black">
                        <tr>
                          <th>Day</th>
                            @foreach ($class_durations as $class_duration)
                                <th>{{ $class_duration->name }} ({{ date('h:i:A', strtotime($class_duration->start_time)) }} - {{ date('h:i:A', strtotime($class_duration->end_time)) }})</th>
                            @endforeach
                        </tr>
                      </thead>
                      <tbody>
                        {{-- @php
                            $dayCounts = $class_routine[0]->class_routine_items->groupBy('day')->map->count();
                        @endphp
                        @foreach (@$class_routine[0]->class_routine_items as $key => $item)
                          <tr>
                            @if ($key === 0 || $item->day !== $class_routine[0]->class_routine_items[$key - 1]->day)
                              <td rowspan="{{ $dayCounts[$item->day] }}">{{ @$item->day }}</td>
                            @endif
                              <td>{{ @$item->Teacher->name }} <br> {{ @$item->subject->name }} {{ @$item->room->name }}</td>
                          </tr>
                        @endforeach  --}}
                      </tbody>
                    </table>
                  </div>
            </div>
        </di>
    </div>
@endsection