@extends('backend.master')

@section('title', 'Edit About Us')


<link rel="stylesheet" href="{{ URL::asset('css/custom/category.css') }}">

@section('content')

<div class="br-mainpanel">



        <div class="p-2">

            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-gear"></i>
                    <div>
                      <h4>Edit About Us</h4>
                    </div>
                  </div>

               <div class="row">
                    <div class="col-md-12">
                        <h3 style="color: #000; float: left;">
                            About @include('inc.sitename')
                        </h3>
                    </div>

                    <div class="col-md-12">

                        <form action="{{ route('insertAbout') }}" method="post">
                            @csrf
                            @foreach ($about as $ab)
                                <div class="card p-2">
                                    <textarea name="about" id="editor" class="form-control">{{ $ab->aboutData }}</textarea>
                                </div>
                            @endforeach
                                <br>
                            <button class="btn btn-primary float-right">Save Change</button>
                        </form>

                    </div>
               </div>

            </div>

        </div>

</div>
@stop
