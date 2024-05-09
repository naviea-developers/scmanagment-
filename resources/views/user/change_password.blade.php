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
            <h4 style="color: var(--seller_text_color)">Security Setting</h4>
            <span style="color: var(--seller_text_color)">Update your Password.</span>
        </div>
    </div>
    <div class="passwodBox mb-3" style="background-color: var(  --seller_frontend_color); color:white">
        <form action="{{ route('user.password_change', auth()->user()->id) }}" method="POST" style="margin-top: 0%">
            @csrf
                {{-- <label for="">Current Password</label>
                <input type="text" id="current_password" name="current_password" required="">
                <hr/> --}}
                <label class="mt-3" for="">New Password</label>
                <input class="mt-3 @error('new_password') is-invalid @enderror" type="text" id="new_password" name="new_password" required="">
                @error('new_password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <label class="mt-3" for="">Confirm Password</label>
                <input class="mt-3" type="text" id="new_password_confirmation" name="new_password_confirmation" required="">

                <button class="mt-3 btn shadow" type="submit"  style="background-color: var( --button2_color); color:white">
                    Update
                </button>
            </div>

        </form>
    </div>
@endsection
