@extends('user.layouts.master-layout')
@section('head')
@section('title','- Class Test Details')

@endsection
@section('main_content')

<div class="passwodBox mb-3" style="background-color: var(--seller_frontend_color);color:var(--seller_text_color)">
    <di class="col-md-12">
        <div class="row">
            <div class="school-name text-center">
                <h3>Class test</h3>
                <h6>Subject: {{ @$details->subject->name ?? '' }}</h6>
                <h6>Date:{{date('d,F,Y',strtotime(@$class_test->date))}}</h6>
                <h6>Class Test Time :{{date('h:i:A',strtotime(@$class_test->class_test_duration))}}</h6>
                {{-- <h6>Session: {{ $details->session->start_year ?? '' }} - {{ $details->session->end_year ?? '' }}</h6> --}}
            </div>
            <hr>
            <div class="class-routine">
                <div class="col-md-12 mt-4">  
                    <p class=""><b>Title: </b> {{  @$details->name }}</p>              
                    <p class=""><b>Lession: </b> {{ $details->lession->name }}</p>
                    <p class=""><b>Page: </b> {{ $details->page_number }}</p>
                    @if (@$details->class_exampdf)
                      <p><a href="{{ route('student.class_test_pdf_download',$details->id) }}">click here to download the PDF file.</a></p>
                    @endif
                    <p class=""><b>Description: </b> {{ $details->details }}</p>
                </div>
            </div>

        </div>
    </di>
</div>

@endsection
