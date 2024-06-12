@extends('inc.master')

@section('head')

<title>Add Late Roll</title>
<style>
    /* label{
        font-size: 1.2rem;
    } */
</style>
@endsection

@section('content')

<div class="br-mainpanel">
<div class="br-pagetitle">
    <div class="br-section-wrapper" style="width:100%">

            <div class="text-center">
                    <h1 class="">Add Late Roll</h1>
                    <br>
                </div>

                <form action="{{route('storeLateRoll')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 my-2">
                            <label for="">Late Day</label>
                           <input type="number" name="late" placeholder="Late Day" class="form-control"  value="{{old('late'
                            )}}">
                           @error('late')
                           <span class="text-danger">{{$message}}</span>
                           @enderror
                        </div>
                       <div class="col-md-4 my-2">
                            <label for="">Absent Count  </label>
                           <input type="number" name="absent" placeholder="Absent Count " class="form-control"  value="{{old('absent'
                            )}}">
                           @error('absent')
                           <span class="text-danger">{{$message}}</span>
                           @enderror
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">
                            Create New Late Roll</button>
                        </div>
                    </div>

                </form>


    </div>
</div>
@stop

