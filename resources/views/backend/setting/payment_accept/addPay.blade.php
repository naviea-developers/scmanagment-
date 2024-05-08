@extends('backend.master')

@section('title', 'Add Payment Method')


<link rel="stylesheet" href="{{ URL::asset('css/custom/pathname') }}">

@section('content')

<div class="br-mainpanel">

    <div class="p-3">
        <div class="br-section-wrapper">
            <form action="/uploadPaymentMethod" method="post" enctype="multipart/form-data">
                @csrf

                <div class="col-md-12">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title">
                </div>

                <div class="col-md-12">
                    <label for="">Image</label>
                    <input type="file" class="form-control" name="img">
                </div>

                <div class="col-md-12 mt-3">
                    <center>
                        <button class="btn btn-primary btn-sm">Add now</button>
                    </center>
                </div>


            </form>
        </div>
    </div>

</div>
@stop
