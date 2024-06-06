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
                <div class="col-md-12 mt-4">
                    <p class=""><b>Lession: </b> {{ $details->lession->name }}</p>
                    <p class=""><b>Page: </b> {{ $details->page_number }}</p>
                    @if (@$details->home_workpdf)
                      <p><a href="{{ route('frontend.home_work_pdf_download',$details->id) }}">click here to download the PDF file.</a></p>
                    @endif
                    <p class=""><b>Description: </b> {{ $details->details }}</p>
                </div>
            </div>

        </div>
    </di>
</div>

@endsection
