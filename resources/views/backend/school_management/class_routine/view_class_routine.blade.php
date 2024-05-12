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

<div class="br-mainpanel">

  <div class="container">
    <div class="school-name">
      <h1>School Name</h1>
      <h5>Class Name{{ @$class_routine->class->name }}</h5>
      <h5>Session: {{@$class_routine->session->start_date}} - {{@$class_routine->session->end_date}}</h5>
    </div>
  
    <div class="class-routine">
      <h2>Class Routine</h2>
      <table>

        <thead>
          <tr>
            <th>Day</th>
            <th>9:00 AM</th>
            <th>11:00 AM</th>
            <th>2:00 PM</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>Monday</td>
            <td>Math</td>
            <td>Science</td>
            <td>English</td>
          </tr>

          {{-- <tr>
            <td>Tuesday</td>
            <td>History</td>
            <td>Geography</td>
            <td>Art</td>
          </tr>
          <tr>
            <td>Wednesday</td>
            <td>Math</td>
            <td>Science</td>
            <td>English</td>
          </tr>
          <tr>
            <td>Thursday</td>
            <td>History</td>
            <td>Geography</td>
            <td>Art</td>
          </tr> --}}

        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection