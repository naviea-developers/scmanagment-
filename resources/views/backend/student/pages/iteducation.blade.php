@extends('backend.student.master')

@section('content')
    <div class="row mt-5">
        {{-- <div class="col-md-2"></div> --}}
    @foreach($courseInfo as $course)
            <div class=" col-md-3" style="margin-right: -46px;">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('video/'.$course->image)}}" height="200" alt="">
                    <div class="card-body">
                      <h5 class="card-title">{{$course->name}}</h5>
                      <p class="card-text">{{$course->short_description}}</p>
                      <p class="card-text text-bold">{{$course->price}}</p>
                      <a href="#" class="btn btn-primary">Enroll Now</a>
                    </div>
                  </div>
            </div>
    @endforeach
</div>

<style>

</style>
@endsection
