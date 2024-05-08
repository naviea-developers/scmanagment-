@extends('frontend.master')

@section('title', 'Manage Profile')
<link rel="stylesheet" href="{{ asset('frontend/css/category.css') }}">
@section('content')

<div class="bodyContaint">
    <div class="container">
        <div class="row">
            <div class="col-md-4">

                <div class="col-12">
                    <div class="subCatTitle">
                       {{-- {{ $number_of_product->count() }} Product Found --}}
                    </div>
                    <div class="filterBox">
                        <h3>Filters By</h3>
                    </div>
                    <div class="CategoryContent">
                        <h5>Sub Cetagory</h5>
                        <ul>
                            @foreach ($package_loc as $pl)
                            <li>
                               <a href="">
                                    <label for="">
                                        <input type="checkbox" name="" id="">
                                        {{ $pl->location }}
                                        {{-- <span>15</span> --}}
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


                <div class="submenu">
                    <ul>

                        @foreach ($package_loc as $pl)
                            <li><a href="">{{ $pl->location }}</a></li>
                        @endforeach


                    </ul>
                </div>

                <div class="col-12 containtData">

                    @foreach ($package as $pks)
                    <div class="cardItem">
                        <a href="viewPackage/{{ $pks->id }}">
                            <img src="{{ asset($pks->img) }}" alt="">
                            <div class="cartItemDetails">
                                <h4>{{ $pks->title }}</h4>
                                <span>Price  : {{ $pks->price }} ريال </span>
                                <ul>
                                    <li>
                                        <form action="cart" method="post" style="float: left;margin-top: 52px;margin-left: -18px;margin-bottom: -22px;">
                                            @csrf
                                            <input type="hidden" name="type" value="package">
                                            <input type="hidden" name="id" value="{{ $pks->id }}">
                                            <button class="btn btn-success btn_size btn-sm">Book Now</button>
                                        </form>

                                    </li>
                                    <li><button><small>Add to cart</small></button></li>
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
