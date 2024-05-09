@extends('user.layouts.master-layout')
@section('head')
@section('title','- Dashboard')
<style>

.tigger {
	width: 100%;
	background: var(--seller_frontend_color);
	margin-top: 10px;
	padding: 10px;
	text-align: right;
    border-radius: 5px;
}

.tigger button {
	background: var(--button2_color);
	border: none;
	color: #fff;
	padding: 0px 10px;
	border-radius: 5px;
}


.daily{
    display: block;
}

.monthly , .yearly {
    display: none;
}

.item {
	height: 126px;
	width: calc(25% - 20px);
	background: var(--seller_frontend_color);
	margin: 10px;
	float: left;
	border-radius: 5px;
    padding: 10px;
    cursor: pointer;
}

.item i {
	font-size: 40px;
	display: block;
	text-align: center;
	color: #fff;
}


.item span {
	width: 100%;
	text-align: center;
	font-size: 20px;
	margin-top: 10px;
	color: #fff;
}


@media only screen and (max-width: 960px) {
    .item {
        width: calc(33% - 20px);
    }
}

@media only screen and (max-width: 850px) {
    .item {
        width: calc(50% - 20px);
    }
}

@media only screen and (max-width: 700px) {
    .item {
        width: calc(33% - 20px);
    }
    .tigger {
        text-align: center;
    }
}

@media only screen and (max-width: 550px) {
    .item {
        width: calc(50% - 20px);
    }
}


</style>
@endsection
@section('main_content')




    <div class="dashboard">


        <div class="tigger">
            <div class="row">

                <div class="col-md-6">
                    <form>
                    <div class="d-flex mb-2">
                        <div class="px-2">
                            {{-- <input type="date" onclick="this.showPicker()" id="startDate" class="dateWise form-control" value="{{ $startDate }}" name="start_date"> --}}
                        </div>
                        <div class="">
                            {{-- <input type="date" onclick="this.showPicker()" id="endDate" class="dateWise form-control" value="{{ $endDate }}" name="end_date"> --}}
                        </div>

                        <button type="submit" id="search" style="display: none;"></button>

                    </div>
                    </form>
                </div>

                <div class="col-md-6">
                    {{-- <form> --}}
                        {{-- test --}}
                    <div class="d-flex " style="float:right;">

                        <div class="mx-1">
                            <form>
                            <input type="hidden" class="form-control" name="filter" value="daily">
                            <button>Daily</button>
                            </form>
                        </div>
                        {{-- <div class="" style="margin-top: -3px"> --}}
                        <div class="mx-1">
                            <form>
                            <input type="hidden" class="form-control" name="filter" value="monthly">
                            <button>Monthly</button>
                            </form>
                        </div>
                        <div class="mx-1">
                            <form>
                            <input type="hidden" class="form-control" name="filter" value="yearly">
                            <button>Yearly</button>
                            </form>
                        </div>

                    </div>
                    {{-- <div class="">
                        <button id="day">Daily</button>
                        <button id="month">Monthly</button>
                        <button id="year">Yearly</button>
                    </div> --}}
                    </form>
                </div>
            </div>
        </div>


        @if (auth()->user()->type == 1)
        <div class="daily mt-2 text-center">

            {{-- <div class="item">
                <i class="fa-solid fa-user"></i>
                <span class="text-center">  82 Visitor</span>
            </div> --}}

            {{-- <div class="item">
                <i class="fa-solid fa-user-plus"></i>
                <span >{{ $order->count() }} <br> Total  Trips</span>
            </div> --}}

            @php
            // $sum= floor($total_booking->sum('price'));
            @endphp

            <div class="item">
                <i class="fa-solid fa-layer-group"></i>
                <span >{{ $order->count() }} <br> My Orders</span>
            </div>
            <div class="item">
                <i class="fa-solid fa-layer-group"></i>
                <span >{{ $package->count() }} <br> My Packages</span>
            </div>
            <div class="item">
                <i class="fa-solid fa-layer-group"></i>
                <span >{{ $event->count() }} <br> My Events</span>
            </div>
            <div class="item">
                <i class="fa-solid fa-layer-group"></i>
                <span >{{ $program->count() }} <br> My Programs</span>
            </div>
            {{-- <div class="item">
                <i class="fa-solid fa-layer-group"></i>
                <span >{{ $package->count() }} <br> My Packages</span>
            </div> --}}

            {{-- <div class="item">
                <i class="fa-solid fa-star"></i>
                <span>{{ $review }} <br> Review</span>
            </div> --}}

        </div>
        @elseif (auth()->user()->type == 2)
        <div class="daily mt-2 text-center">

            {{-- <div class="item">
                <i class="fa-solid fa-user"></i>
                <span class="text-center">  82 Visitor</span>
            </div> --}}

            <div class="item">
                <i class="fa-solid fa-user-plus"></i>
                <span >{{ $students->count() }} <br> Total Students</span>
            </div>
            <div class="item">
                <i class="fa-solid fa-user"></i>
                <span >{{ $p_students->count() }} <br> Total Participants</span>
            </div>

            @php
            // $sum= floor($total_booking->sum('price'));
            @endphp

            <div class="item">
                <i class="fa-solid fa-layer-group"></i>
                <span>{{ $course->count() }} <br> My Courses <br> </span>
            </div>

            {{-- <div class="item">
                <i class="fa-solid fa-star"></i>
                <span>{{ $review }} <br> Review</span>
            </div> --}}

        </div>

        @elseif (auth()->user()->type == 5)
        <div class="daily mt-2 text-center">

            {{-- <div class="item">
                <i class="fa-solid fa-user"></i>
                <span class="text-center">  82 Visitor</span>
            </div> --}}

            <div class="item">
                <i class="fa-solid fa-user-plus"></i>
                <span >0<br> Total Students</span>
            </div>
            <div class="item">
                <i class="fa-solid fa-user"></i>
                <span >0 <br> Total Participants</span>
            </div>

            @php
            // $sum= floor($total_booking->sum('price'));
            @endphp

            <div class="item">
                <i class="fa-solid fa-layer-group"></i>
                <span>{{ $ebook->count() }} <br> My E-Book <br> </span>
            </div>

            {{-- <div class="item">
                <i class="fa-solid fa-star"></i>
                <span>{{ $review }} <br> Review</span>
            </div> --}}

        </div>

        @elseif (auth()->user()->type == 6)
        <div class="daily mt-2 text-center">


            <div class="item">
                <i class="fa-solid fa-user-plus"></i>
                <span >0<br> Total Affiliate</span>
            </div>

            <div class="item">
                <i class="fa-solid fa-layer-group"></i>
                <span>0 <br> My Affiliate <br> </span>
            </div>
        </div>
        @endif


        {{-- <div class="monthly mt-2 text-center">

            <div class="item">
                <i class="fa-solid fa-user"></i>
                <span>  1494 Visitor</span>
            </div>

            <div class="item">
                <i class="fa-solid fa-user-plus"></i>
                <span> 0 Booking</span>
            </div>

            <div class="item">
                <i class="fa-solid fa-cart-shopping"></i>
                <span> 0 Sell</span>
            </div>

            <div class="item">
                <i class="fa-solid fa-layer-group"></i>
                <span> 0 Product</span>
            </div>

            <div class="item">
                <i class="fa-solid fa-star"></i>
                <span> 0 Review</span>
            </div>

        </div>

        <div class="yearly mt-2 text-center">


            <div class="item">
                <i class="fa-solid fa-user"></i>
                <span >  15164 Visitor</span>
            </div>

            <div class="item">
                <i class="fa-solid fa-user-plus"></i>
                <span> 4 Booking</span>
            </div>

            <div class="item">
                <i class="fa-solid fa-cart-shopping"></i>
                <span> 0 Sell</span>
            </div>

            <div class="item">
                <i class="fa-solid fa-layer-group"></i>
                <span> 0 Product</span>
            </div>

            <div class="item">
                <i class="fa-solid fa-star"></i>
                <span> 4 Review</span>
            </div>


        </div> --}}

    </div>


@endsection
@section('script')
 <script>
        $('#day').on('click' ,  function(){

            $(this).css('font-weight' , 'bold');
            $('#month').css('font-weight' , 'normal');
            $('#year').css('font-weight' , 'normal');


            $('.daily').css('display' , 'block');
            $('.monthly').css('display' , 'none');
            $('.yearly').css('display' , 'none');
        });
        $('#month').on('click' ,  function(){

            $(this).css('font-weight' , 'bold');
            $('#day').css('font-weight' , 'normal');
            $('#year').css('font-weight' , 'normal');

            $('.daily').css('display' , 'none');
            $('.monthly').css('display' , 'block');
            $('.yearly').css('display' , 'none');
        });
        $('#year').on('click' ,  function(){

            $(this).css('font-weight' , 'bold');
            $('#day').css('font-weight' , 'normal');
            $('#month').css('font-weight' , 'normal');


            $('.daily').css('display' , 'none');
            $('.monthly').css('display' , 'none');
            $('.yearly').css('display' , 'block');
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.dateWise').on('change', function() {
                console.log(this);
                if ($('#startDate').val() !== '' && $('#endDate').val() !== '') {
                    console.log(this);
                    $('#search').click();
                }
            });
        });
    </script>
@endsection
