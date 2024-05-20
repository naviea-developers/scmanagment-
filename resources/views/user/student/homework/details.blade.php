@extends('user.layouts.master-layout')
@section('head')
@section('title','- Homework Details')

@endsection
@section('main_content')



<div class="passwodBox mb-3" style="background-color: #07477D; color:white">
    <di class="col-md-12">
        <div class="row">
            <div class="school-name text-center">
                <h3>Home Work</h3>
                <h6>Class: {{ @$details->class->name ?? '' }}</h6>
                <h6>Subject: {{ @$details->subject->name ?? '' }}</h6>
                {{-- <h6>Session: {{ $details->session->start_year ?? '' }} - {{ $details->session->end_year ?? '' }}</h6> --}}
            </div>
            <hr>
            <div class="class-routine">
                <div class="col-md-12 text-center">

                @php
                $file = $details->image_show; // assuming $details->file contains the file path
                $fileExtension = pathinfo($file, PATHINFO_EXTENSION);
                @endphp
                
                @if(in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                    <img src="{{ asset($file) }}" alt="description" style="width: 400px; height:100%"/>
                @elseif($fileExtension == 'pdf')
                    <embed src="{{ asset($file) }}" type="application/pdf" width="100%" height="600px"/>
                @endif

                </div>
                <div class="col-md-12 mt-4">
                    <p class=""><b>Description: </b> {{ $details->details }}</p>
                </div>
            </div>

        </div>
    </di>
</div>





@endsection
