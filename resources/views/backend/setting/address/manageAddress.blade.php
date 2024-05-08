@extends('backend.master')

@section('title', 'Manage Address')


<link rel="stylesheet" href="{{ URL::asset('css/custom/pathname') }}">

@section('content')

<div class="br-mainpanel">


        <div class="p-3">

            <div class="br-section-wrapper p-3">

                <div class="row">
                    <div class="col-6">
                       <h1>
                        <b> Manage Address </b>
                       </h1>
                    </div>
                    <div class="col-6" style="text-align: right;">
                        <a href="/addAddress" class="btn btn-primary">
                            Add new Address
                        </a>
                    </div>
                </div>

                @foreach ($address as $ads)


                <div class="card p-3 mt-2">
                    <div class="col-md-12" style="text-align: right;">
                        <a href="/editAddress/{{ $ads->id }}">
                            <i class="fa-duotone fa-pen-to-square"></i>
                        </a>
                        &nbsp;
                        <a href="/deleteAddress/{{ $ads->id }}">
                            <i class="fa-duotone fa-trash-can"></i>
                        </a>
                    </div>
                    <h2>
                        <b>
                            {{ $ads->title }}
                        </b>
                    </h2>

                    <p>
                        {!! $ads->addressData !!}
                    </p>

                </div>


                @endforeach

            </div>


        </div>



</div>
@stop
