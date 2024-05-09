@extends('user.layouts.master-layout')
@section('head')
<title>Car List</title>
@endsection
@section('main_content')
    <h1>This is Car list</h1>
    @foreach ($cars as $car)
    <form action="{{ route('set.car_booking', $car->id) }}" method="POST">
        @csrf
       <div class="card card-body">
        <p>{{ $car->name }}</p>
        <input type="hidden" name="car_id" value="{{ $car->id }}"/>
        <button type="submit" class="btn btn-success">Booking</button>
       </div>
    </form>
    @endforeach
@endsection