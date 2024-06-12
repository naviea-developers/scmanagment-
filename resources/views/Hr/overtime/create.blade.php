@extends('inc.master')

@section('head')

<title>Add OverTime</title>
<style>
    label{
        /* font-size: 1.2rem; */
    }
</style>
@endsection


@section('content')

<div class="br-mainpanel">
<div class="br-pagetitle">
    <div class="br-section-wrapper" style="width:100%">

            <div class="text-center">
                    <h1 class="">Add Over Time</h1>
                    <br>
                </div>

                <form action="{{route('storeOvertime')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 my-2">
                            <label for="">Unit Hour  </label>
                           <input type="number" name="hour" placeholder="Unit Hour " class="form-control" step="any" value="{{old('hour'
                            )}}">
                           @error('hour')
                           <span class="text-danger">{{$message}}</span>
                           @enderror
                        </div>
                       <div class="col-md-4 my-2">
                            <label for="">Amount For Unit Hour (%) </label>
                           <input type="number" name="amount" placeholder="Amount For Unit Hour(Percent)" class="form-control" step="any" value="{{old('amount'
                            )}}">
                           @error('amount')
                           <span class="text-danger">{{$message}}</span>
                           @enderror
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">
                            Create New Over Time</button>
                        </div>
                    </div>

                </form>


    </div>
</div>
@stop

