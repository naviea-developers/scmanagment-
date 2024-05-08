@extends('backend.master')

@section('title', 'Edit Privacy Policy')


<link rel="stylesheet" href="{{ URL::asset('css/custom/category.css') }}">

@section('content')

<div class="br-mainpanel">



        <div class="p-2">

            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-gear"></i>
                    <div>
                      <h4>Edit Our Policy</h4>
                    </div>
                  </div>

               <div class="row">
                    <div class="col-md-12">
                        <h3 style="color: #000; float: left;">
                            Edit @include('inc.sitename') Policy
                        </h3>
                        <a href="{{ route('editPolicy') }}" class="btn btn-primary btn-sm float-right">
                            <i class="fa-duotone fa-pen-to-square"></i>
                             Edit
                        </a>
                    </div>

                    <div class="col-md-12">
                        @php
                            $data = '';
                        @endphp
                        @foreach ($policy as $ab)
                            @php
                                $data = $ab->policyData;
                            @endphp
                        @endforeach

                        <form action="{{ route('insertPolicy') }}" method="post">
                            @csrf
                            <div class="card p-2">
                                <textarea name="policy" id="editor" class="form-control" cols="30" rows="10">
                                    {{ $data }}
                                </textarea>
                            </div>
                            <br>

                            <button class="btn btn-success float-right">
                                SaveChange
                            </button>
                        </form>
                    </div>
               </div>

            </div>


        </div>



</div>
@stop
