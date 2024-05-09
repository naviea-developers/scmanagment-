@extends('user.layouts.master-layout')
@section('head')
@section('title','- Change Password')


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
            <h4 style="color: white">Security Setting</h4>
            <span style="color: white">Confirm Code.</span>
        </div>
    </div>
    <div class="passwodBox mb-3" style="background-color: #07477D; color:white">
        <form action="{{ route('user.password_confirm',  auth()->user()->id) }}" method="POST" style="margin-top: 0%">
            @csrf
                <label class="mt-3" for="">Confirmation Code</label>
                <input class="mt-3" type="text" id="token" name="token" >
                <p class="vaild_text mt-3">
                    We have sent you an email with confirmation code.
                </p>
                <button class="mt-3 shadow" type="submit" style="background-color: #0f903e; color:white">
                    Confirm
                </button>
            </div>

        </form>
    </div>
@endsection
