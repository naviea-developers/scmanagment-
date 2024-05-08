@extends('backend.student.master')

@section('title','Exam Details')


<link rel="stylesheet" href="{{ URL::asset('css/custom/eduStc.css') }}">

@section('content')
    <div class="row">
        <div class="col-md-6">
        <div class="p-5">
                <table class="table table-striped ">
                    <thead class="thead bg-primary text-white">
                      <tr>
                        <th scope="col">Subject Name</th>
                        <th scope="col">Exam Date</th>
                        <th scope="col">Duration</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($examName as  $exam)
                        <tr>
                            <td>{{$exam->subjectName}}</td>
                            <td>{{$exam->date}}</td>
                            <td>{{$exam->startAt}}-{{$exam->endAt}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</div>

@stop
