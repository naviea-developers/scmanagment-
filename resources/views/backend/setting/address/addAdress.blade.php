@extends('backend.master')

@section('title', 'Add Address')


<link rel="stylesheet" href="{{ URL::asset('css/custom/pathname') }}">

@section('content')

<div class="br-mainpanel">

        <div class="p-3">

            <div class="br-section-wrapper">

                <form action="/uploadAddress" method="post">
                        @csrf
                    <div class="col-md-12">
                        <label for=""> Address Title </label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label for=""> Address Data </label>
                       <textarea name="data" id="editor" class="form-control" rows="5" style="resize: none;"></textarea>
                    </div>


                    <center class="col-md-12 mt-3">
                        <button class="btn btn-info btn-sm">Add Address</button>
                    </center>

                </form>

            </div>

        </div>



</div>
@stop
