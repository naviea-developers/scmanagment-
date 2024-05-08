@extends('backend.master')

@section('title', 'Edit Address')


<link rel="stylesheet" href="{{ URL::asset('css/custom/pathname') }}">

@section('content')

<div class="br-mainpanel">

        <div class="p-3">

            <div class="br-section-wrapper">

                <div class="col-12">
                    <h2>
                        <b>Edit Address</b>
                    </h2>
                </div>

                <form action="/updateAddress" method="post">
                        @csrf
                        @foreach ($address as $ads)

                        <input type="hidden" name="id" value="{{ $ads->id }}">

                        <div class="col-md-12">
                            <label for=""> Address Title </label>
                            <input type="text" class="form-control" name="title" required value="{{ $ads->title }}">
                        </div>
                        <div class="col-md-12 mt-3">
                            <label for=""> Address Data </label>
                           <textarea name="data" id="editor" class="form-control" rows="5" style="resize: none;" required>{!! $ads->addressData !!}</textarea>
                        </div>

                        @endforeach


                    <center class="col-md-12 mt-3">
                        <button class="btn btn-info btn-sm">Add Address</button>
                    </center>

                </form>

            </div>

        </div>



</div>
@stop
