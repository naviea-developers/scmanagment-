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
      <a href="{{ route('admin.routine.print',$class_routine->id) }}" class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i class="fas fa-print text-primary"></i> Print</a>
    </div>

    <div class="school-name">
      <h1>School Name</h1>
      <h5>Class Name: {{ @$class_routine->class->name }}</h5>
      <h5>Session: {{@$class_routine->session->start_date}} - {{@$class_routine->session->end_date}}</h5>
    </div>
  
    <div class="class-routine">
      <h2>Class Routine</h2>
      <table>

        <thead>
          <tr>
            <th>Day</th>
            <th>Teacher Name</th>
            <th>Subject Name</th>
            <th>Bulding Name</th>
            <th>Floor Name</th>
            <th>Room Name</th>
            <th>Time</th>
            
          </tr>
        </thead>

        <tbody>
          {{-- @foreach (@$class_routine->class_routine_items as $item)
            <tr>
              <td>{{ $item->day }}</td>
              <td>{{ $item->Teacher->name }}</td>
              <td>{{ $item->subject->name }}</td>
              <td>{{ $item->bulding->name }}</td>
              <td>{{ $item->floor->name }}</td>
              <td>{{ $item->room->name }}</td>
              <td>{{ $item->start_time }} - {{ $item->end_time }}</td>
            </tr>
          @endforeach --}}

          @php
              $dayCounts = $class_routine->class_routine_items->groupBy('day')->map->count();
          @endphp

          @foreach ($class_routine->class_routine_items as $key => $item)
              <tr>
                  @if ($key === 0 || $item->day !== $class_routine->class_routine_items[$key - 1]->day)
                      <td rowspan="{{ $dayCounts[$item->day] }}">{{ $item->day }}</td>
                  @endif
                  <td>{{ $item->Teacher->name }}</td>
                  <td>{{ $item->subject->name }}</td>
                  <td>{{ $item->bulding->name }}</td>
                  <td>{{ $item->floor->name }}</td>
                  <td>{{ $item->room->name }}</td>
                  <td>{{ $item->start_time }} - {{ $item->end_time }}</td>
              </tr>
          @endforeach

          {{-- @foreach ($class_routine->class_routine_items as $key => $item)
          @if ($key === 0 || $item->day !== $class_routine->class_routine_items[$key - 1]->day)
              <tr>
                  <td>{{ $item->day }}</td>
                  <td>{{ $item->Teacher->name }}</td>
                  <td>{{ $item->subject->name }}</td>
                  <td>{{ $item->bulding->name }}</td>
                  <td>{{ $item->floor->name }}</td>
                  <td>{{ $item->room->name }}</td>
                  <td>{{ $item->start_time }} - {{ $item->end_time }}</td>
              </tr>
          @else
              <tr>
                  <td></td>
                  <td>{{ $item->Teacher->name }}</td>
                  <td>{{ $item->subject->name }}</td>
                  <td>{{ $item->bulding->name }}</td>
                  <td>{{ $item->floor->name }}</td>
                  <td>{{ $item->room->name }}</td>
                  <td>{{ $item->start_time }} - {{ $item->end_time }}</td>
              </tr>
          @endif
      @endforeach --}}




        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection