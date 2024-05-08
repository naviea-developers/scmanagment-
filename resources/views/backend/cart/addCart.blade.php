@extends('backend.master')

@section('title', 'Add Cart')


<link rel="stylesheet" href="#">

@section('content')

<div class="br-mainpanel">

      <div class="br-pagetitle">
        <i class="fa-duotone fa-person-chalkboard"></i>
        <div>
          <h4>Add cart</h4>
          <p class="mg-b-0">Add the information of Cart</p>
        </div>
      </div><!-- d-flex -->


        <div class="p-5">
            <div class="br-section-wrapper">
                <div class="row">
                    @foreach ($course as $course)
                    <div class="col-md-3">
                    <form action="{{ route('storeCart',['id' => $course->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="{{ asset('video/'.$course->image) }}" height="200"  alt="Card image cap">
                                <div class="card-body">
                                <h5 class="card-title">{{ $course->name }}</h5>
                                <p class="card-text">{{ $course->short_description }}</p>
                                <p class="card-text text-dark">BDT {{ $course->price }}tk</p>
                                <button type="submit" class="btn btn-primary">Add To Cart</button>
                                </div>
                            </div>

                    </form>
                </div>
                    @endforeach
                </div>
        </div>

<script src="js/custom/addTeacherForClass.js"></script>
</div>
@stop
