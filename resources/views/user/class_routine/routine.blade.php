@extends('user.layouts.master-layout')
@section('head')
@section('title','- Class Routine')


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
            <h4 style="color: black">Class Routine</h4>
            {{-- <span style="color: white">Confirm Code.</span> --}}
        </div>
    </div>
    <div class="passwodBox mb-3" style="background-color: #07477D; color:white">
        <di class="col-md-12">
            <div class="row">

                <div class="item">
                    <i class="fa-solid fa-user"></i>
                    <span class="text-center">  Class {{ $admission->class->name }}</span>
                </div>
                {{-- @foreach ($notices as $notice)
                <div class="col-md-4">
                    <div class="card card-body" style="height: 100%">
                        <p class="text-center" style="color: black"><b>
                            @if ($notice->type == 'daily')
                                Daily Notice
                            @elseif ($notice->type == 'monthly')
                                Monthly Notice
                            @elseif ($notice->type == 'yearly')
                                Yearly Notice
                            @elseif ($notice->type == 'instant')
                                Istant Notice
                            @endif
                        </b></p>
                        <h5 class="mb-3" style="color: black">Title: {{ $notice->name }}</h5>
                        <p class="" style="color: black; text-align: justify;"><b>Description:</b> {{ $notice->description }}</p>
                        <p style="color: black"><b>Created at:</b> {{ \Carbon\Carbon::parse($notice->created_at)->isoFormat('Do MMM YYYY') }}</p>
                    </div>
                </div>
                @endforeach --}}
            </div>
        </di>
    </div>
@endsection