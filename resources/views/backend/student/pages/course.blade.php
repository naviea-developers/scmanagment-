@extends('backend.student.master')

@section('content')
    <div class="row mt-5">
        {{-- <div class="col-md-2"></div> --}}
    @foreach($buyCourse as $course)
        <div class="col-md-3" style="background:#fff;margin: 15px;border-radius: 10px;padding: 15px;">
            <center>
                <a href="/academicProgramView/{{ $course->id }}" style="margin-right: -46px; text-decoration:none; color:black;">
                    <img src="{{ asset('video/'.$course->image)}}"  style="width: 100%;height: 150px;object-fit: cover;">
                    <div class="card-body" style="padding: 15px 0;">
                        <h5 class="card-title">{{$course->name}}</h5>
                        <p class="card-text">{{$course->short_description}}</p>
                    </div>
                </a>
            </center>
        </div>
    @endforeach
    
  @if($buyCourse->count() == 0)
    <center  style="width: 100%;margin-top: 15%;">
        <h1>No Course Purchased !</h1>
        <a href="/coursePage" target="_blank" style="color:#1167b1;">Please purchase course</a>
    </center>
  @endif
    
</div>

<style>

</style>
@endsection
