@extends('inc.master')

@section('head')

<title>Edit Absent</title>
<style>
    /* label{
        font-size: 1.2rem;
    } */
</style>
@endsection

@section('content')

<div class="br-mainpanel">
<div class="br-pagetitle">

    <div class="br-section-wrapper style="width:100%">

            <div class="text-center mb-4">
                    <h1 class="">Edit Absent</h1>
                    <br>
                </div>
                <!-- <h2>Add Notice</h2> -->
               <form action="{{route('updateAbsent',$p->id)}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 my-2">
                            <label for="">First Absent Amount (%) </label>
                           <input type="number" name="first" value="{{$p->first}}" class="form-control" step="any">
                           @error('first')
                           <span class="text-danger">{{$message}}</span>
                           @enderror
                        </div>
                       <div class="col-md-4 my-2">
                            <label for="">Other Absent Amount (%) </label>
                           <input type="number" name="other" value="{{$p->other}}" class="form-control" step="any">
                           @error('other')
                           <span class="text-danger">{{$message}}</span>
                           @enderror
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary ">
                            Update Absent</button>
                        </div>
                    </div>

                </form>
        <!-- </div> -->

    </div>
</div>
@stop

