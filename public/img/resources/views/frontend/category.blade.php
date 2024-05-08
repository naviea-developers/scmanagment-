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
                       {{ $number_of_product->count() }} Product Found
                    </div>
                    <div class="filterBox">
                        <h3>Filters By</h3>
                    </div>
                    <div class="CategoryContent">
                        <h5>Sub Cetagory</h5>
                        <ul>
                            @foreach ($categoris as $cat)
                            <li>
                               <a href="">
                                    <label for="">
                                        <input type="checkbox" name="" id="">
                                        {{ $cat->category }}
                                        <span>15</span>
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
                        <li><a href="">Women's Fashion</a></li>
                        <li><a href="">Mans Fashion</a></li>
                        <li><a href="">Health & Beauty</a></li>
                        <li><a href="">Babies & Toys</a></li>
                        <li><a href="">Electronic Devices</a></li>
                        <li><a href="">Groceries</a></li>
                    </ul>
                </div>

                <div class="col-12 containtData">

                    @foreach ($shopping as $spp)
                    <div class="cardItem">
                        <a href="single-product/{{ $spp->id }}">
                            <img src="{{ asset($spp->img) }}" alt="">
                            <div class="cartItemDetails">
                                <h4>{{ $spp->title }}</h4>
                                <span>Price  : {{ $spp->price }} ريال </span>
                                <ul>
                                    <li><button>Buy Now</button></li>
                                    <li><button>Ad to cart</button></li>
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
