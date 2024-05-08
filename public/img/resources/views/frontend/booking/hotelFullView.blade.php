@extends('frontend.master')

@section('title', 'Manage Profile')
<link rel="stylesheet" href="{{ asset('frontend/css/hotelSingleView.css') }}">

@section('content')

<div class="bodyContaint">


    <section class="gallary">

        <div class="container">

            <div class="row top_Tags">
                <div class="col-md-3">
                    <button>Info & Price</button>
                </div>
                <div class="col-md-3">
                    <button>Facalities</button>
                </div>
                <div class="col-md-3">
                    <button>House Ruls</button>
                </div>
                <div class="col-md-3">
                    <button>Reviews</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mainGallary">
                        @foreach ($hotel_photos as $i=>$hps)
                            @if ($i == '0')
                                <div id="showImg">
                                    <img src="{{ asset($hps->src) }}" id="preview">
                                </div>
                            @endif
                            <img src="{{ asset($hps->src) }}" alt="" onclick="showPic('{{ asset($hps->src) }}')">
                        @endforeach
                    </div>
                </div>

                <div class="col-md-6">
                    <iframe
                        style="border:0"
                        loading="lazy"
                        allowfullscreen
                        referrerpolicy="no-referrer-when-downgrade"
                        src="https://www.google.com/maps/embed/v1/place?key=API_KEY
                        &q=Space+Needle,Seattle+WA">
                    </iframe>

                    @foreach ($hotel as $htl)
                        <div class="hotelinfo">
                            <h1><b>{{ $htl->name }}</b></h1>
                            <p>{{ $htl->address }}</p>
                        </div>

                        <center>
                            <a href="" class="btn btn-primary">Book Now</a>
                        </center>

                    @endforeach

                </div>

            </div>
        </div>

    </section>


    <section class="bodyContaint">
        <div class="container">
            @foreach ($hotel as $htl)
                {!! $htl->description !!}
            @endforeach
        </div>
    </section>

    <section class="facilities">
        <div class="container">
            <h2 style="text-align: left;font-weight:bold;">Most popular facilities</h2>
            <div class="listbar">
                <ul>
                    <li>Free WiFi</li>
                    <li>Room service</li>
                    <li>Free parking</li>
                    <li>24-hour front desk</li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="col-12">
                        <h3>Internet</h3>
                        <p>WiFi is available in public areas and is free of charge.</p>
                    </div>
                    <div class="col-12">
                        <h3>Parking</h3>
                        <p>Free private parking is possible on site (reservation is needed).</p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-6">
                            <ul>
                                <li style="list-style:none;"><h3>Services</h3></li>
                                <li>ATM/cash machine on site</li>
                                <li>Luggage storage</li>
                                <li>Currency exchange</li>
                                <li>Laundry</li>
                                <li>24-hour front desk</li>
                                <li>Room service</li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul>
                                <li style="list-style:none;"><h3>General</h3></li>
                                <li>Minimarket on site</li>
                                <li>Air conditioning</li>
                                <li>Soundproof rooms</li>
                                <li>Lift &nbsp; &nbsp; &nbsp;</li>
                                <li>Family rooms</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="rules">
        <div class="container">
            <h3><b>House rules</b></h3>
            <p>Muscat Holiday Resort takes special requests - add in the next step!</p>


            <div class="row">
               @foreach ($hotel as $htl)
                    <div class="col-12 mb-2">
                        <div class="row">
                            <div class="col-2">
                                <b>Check-in  : </b>
                            </div>
                            <div class="col-10">
                                {{ $htl->checkin }}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-2">
                        <div class="row">
                            <div class="col-2">
                                <b>Check-out : </b>
                            </div>
                            <div class="col-10">
                                {{ $htl->checkout }}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-2">
                        <div class="row">
                            <div class="col-2">
                                <b>Cancellation/  prepayment :</b>
                            </div>
                            <div class="col-10">
                                Child policies <br> Children are not allowed <br> Cots and extra beds are not available at this property..
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-2">
                        <div class="row">
                            <div class="col-2">
                                <b>Children and beds  :</b>
                            </div>
                            <div class="col-10">
                                Cancellation and prepayment policies vary according to accommodation type.
Please check what conditions may apply to each option when making your selection.
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-2">
                        <div class="row">
                            <div class="col-2">
                                <b>Age restriction :</b>
                            </div>
                            <div class="col-10">
                                The minimum age for check-in is 18
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-2">
                        <div class="row">
                            <div class="col-2">
                                <b>Pets : </b>
                            </div>
                            <div class="col-10">
                                Pets are not allowed.
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-2">
                        <div class="row">
                            <div class="col-2">
                                <b>Cards accepted at this hote  :</b>
                            </div>
                            <div class="col-10">
                                Muscat Holiday Resort accepts these cards and reserves the right to temporarily hold an amount prior to arrival.
                            </div>
                        </div>
                    </div>
               @endforeach
            </div>

        </div>
    </section>


</div>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script>
    function showPic(e) {
        $('#preview').attr('src',e);
    }
</script>

@stop
