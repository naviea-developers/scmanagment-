@extends('backend.student.master')

@section('content')
    <div class="row mt-5">
        @foreach($showNotice as $notice)
         <div class="col-md-4">
            <div class="card p-4">
                <div class="card-title">
                    <h2>{{$notice->notice}}</h2>
                </div>
                <div class="card-text">
                    <p for="" style="font-size:20px;"><b>Title</b> : {{$notice->name}}</p>
                     <h4><label for="">Description :</label></h4>
                    <p style="font-size: 15px;">{{ $notice->description }}</p>
                </div>
            </div>
         </div>
         @endforeach
    </div>
    <style>
        .card{
            background: rgb(220, 220, 235);
        }
    </style>
@endsection
