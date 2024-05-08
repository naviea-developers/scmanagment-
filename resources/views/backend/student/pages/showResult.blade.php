@extends('backend.student.master')

@section('content')
    <div class="row" style="margin-top:100px">
        @foreach($resultInfo as $result)
         <div class="col-md-12">
            <div class="card p-4">
                <div class="card-title text-center">
                    <h2>{{$result->examId}}</h2>
                </div>
                <div class="card-text">
                    <td>Subject Name :</td>
                    <td>{{$result->subjectId}}</td>
                    <br>
                    <td>Total Marks :</td>
                    <td>{{$result->obtainedMarks}}</td>
                    {{-- <label for="" style="float: left">Subject Name :</label>
                    <p style="font-size:20px;">{{$result->subjectId}}</p>
                    <label for="" style="float: left">Total Marks :</label>
                    <p style="font-size:20px;">{{$result->obtainedMarks}}</p> --}}
                    {{-- <h4><label for="">Subject Name :</label></h4>
                    <p style="font-size:20px;">{{$notice->name}}</p>
                     <h4><label for="">Description :</label></h4>
                    <p style="font-size: 15px;">{{ $notice->description }}</p> --}}
                </div>
            </div>
         </div>
         @endforeach
        <div class="col-md-2"></div>
    </div>
    <style>
       .card-text{
        font-size: 20px;
       }
    </style>
@endsection
