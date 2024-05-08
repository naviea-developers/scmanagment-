@extends('frontend.master')

@section('title', 'All Transport')
<link rel="stylesheet" href="{{ asset('frontend/css/category.css') }}">
@section('content')

<div class="bodyContaint">
    <div class="container">
        <div class="row">
            <div class="col-md-4">

                <div class="col-12">
                    <div class="subCatTitle">
                       {{ $NF_transport->count() }} Transport Found
                    </div>
                    <div class="filterBox">
                        <h3>Filters By</h3>
                    </div>
                    <div class="CategoryContent">
                        <ul>
                            @foreach ($allRoots as $cat)
                            <li>
                               <a href="">
                                    <label for="">
                                        <input type="checkbox" name="" id="">
                                        {{ $cat->to }}
                                    </label>
                               </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <center>
                        <button class="btn btn-primary" style="border-radius: 50px;padding: 10px 30px;margin-top: 30px;">Reset filter</button>
                    </center>

                </div>

            </div>
            <div class="col-md-8">


                {{-- <div class="submenu">
                    <ul>
                        <li><a href="">Groceries</a></li>
                    </ul>
                </div> --}}

                <div class="col-12 containtData">

                    @foreach ($transport as $tsp)
                        <div class="cardItem">
                            <a href="{{ URL::to('/viewTransport') }}/{{ $id }}/{{ $tsp->id }}">
                                <img src="{{ asset($tsp->img) }}" alt="">
                                <div class="cartItemDetails">
                                    <h4>{{ $tsp->name }} - <small>{{ $tsp->model }}</small></h4>
                                    <span>Price  : {{ $tsp->price }} ريال </span>
                                    <ul>
                                        <li class="w-100"><button class="w-100">Book Now</button></li>
                                        {{-- <li><button>Add to cart</button></li> --}}
                                    </ul>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>


            </div>
        </div>
    </div>
</div>

@stop
