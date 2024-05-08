@extends('backend.master')

@section('title', 'Terms of Service')


<link rel="stylesheet" href="{{ URL::asset('css/custom/category.css') }}">

@section('content')

<div class="br-mainpanel">



        <div class="p-5">

            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-gear"></i>
                    <div>
                      <h4>View Our Policy</h4>
                    </div>
                  </div>

               <div class="row">
                    <div class="col-md-12">

                        <h3 style="color: #000; float: left;">
                            @include('inc.sitename') Terms of Service
                        </h3>
                        <a href="{{ route('editTerms') }}" class="btn btn-primary btn-sm float-right">
                            <i class="fa-duotone fa-pen-to-square"></i>
                             Edit
                        </a>
                    </div>

                    <div class="col-md-12">
                        @php
                            $data = '';
                        @endphp
                        @foreach ($terms as $ab)
                            @php
                                $data = $ab->termsData;
                            @endphp
                        @endforeach

                            <form action="{{ route('insertTrams') }}" method="post">
                                @csrf
                                <div class="card p-2">
                                    <textarea name="trmsData" id="editor" class="form-control">{!! $data !!}</textarea>
                                </div>
                                    <br>
                                <button type="submit" class="btn btn-success float-right">
                                    Save Change
                                </button>

                            </form>
                    </div>
               </div>

            </div>


        </div>



</div>
@stop
