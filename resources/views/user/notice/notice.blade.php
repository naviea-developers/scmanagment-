@extends('user.layouts.master-layout')
@section('head')
@section('title','- Notice')


@endsection
@section('main_content')

    {{-- success message start --}}
    @if(session()->has('message'))
    <div class="alert alert-success">
    {{-- <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true"></button> --}}
    {{session()->get('message')}}
    </div>
    <script>
        setTimeout(function(){
            $('.alert.alert-success').hide();
        }, 3000);
    </script>
    @endif
    {{-- success message start --}}
    <div class="right_section">
        <div>
            <h4 style="color: black">Notice</h4>
            {{-- <span style="color: white">Confirm Code.</span> --}}
        </div>
    </div>
    <div class="passwodBox mb-3" style="background-color: #07477D; color:white">
        <di class="col-md-12">
            <div class="row">
                @foreach ($notices as $notice)
                    <div class="col-md-4 mt-3">
                        <div class="card card-body" style="height: 100%">
                            <a href="{{ route('frontend.notice_list') }}">
                                <p class="text-center" style="color: black"><b>{{ $notice->noticeType->name }}</b></p>
                                <h5 class="mb-3" style="color: black">Title: {{ $notice->name }}</h5>
                                {{-- <p class="" style="color: black; text-align: justify;"><b>Description:</b> {{ $notice->description }}</p> --}}
                                <p><a href="{{ route('frontend.notice_pdf_download',$notice->id) }}">click here to download the PDF file.</a></p>
                                <p style="color: black"><b>Created at:</b> {{ \Carbon\Carbon::parse($notice->created_at)->isoFormat('Do MMM YYYY') }}</p>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </di>
    </div>
@endsection