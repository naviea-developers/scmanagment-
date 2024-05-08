@extends('frontend.master')

@section('title', 'Manage Profile')
<link rel="stylesheet" href="{{ asset('frontend/css/singleproductview.css') }}">
@section('content')


<div class="bodyContaint">
    <div class="container">
         <div class="topSection">


             <div class="row">
                 <div class="col-md-4">
                     <div class="slider">

                        @foreach ($productGallary as $pg)
                          <div class="mySlides">
                            <img src="{{ asset($pg->src) }}" style="width:100%">
                          </div>
                        @endforeach

                        <div class="row">
                        @foreach ($productGallary as $i=>$pg)
                        <div class="column">
                            <img class="demo cursor"
                            src="{{ asset($pg->src) }}" style="width:100%"
                            onclick="currentSlide({{ $i + 1 }})">
                        </div>
                        @endforeach
                        </div>
                     </div>
                 </div>

                 <div class="col-md-4">
                     <div class="details">
                        @foreach ($product as $pdt)

                         <h4>{{ $pdt->title }}</h4>
                         <ul>
                             <li>
                                 <ul>
                                     <li>
                                         <i class="fa-duotone fa-star"></i>
                                     </li>
                                     <li>
                                         <i class="fa-duotone fa-star"></i>
                                     </li>
                                     <li>
                                         <i class="fa-duotone fa-star"></i>
                                     </li>
                                     <li>
                                         <i class="fa-duotone fa-star"></i>
                                     </li>
                                     <li>
                                         <i class="fa-duotone fa-star"></i>
                                     </li>
                                 </ul>
                             </li>
                             <li>&nbsp;&nbsp;&nbsp;</li>
                             <li>
                                 <span> {{ $pdt->rating }} Ratings</span>
                             </li>
                         </ul>
                         <br>
                         <p>
                             Brand:  {{ $pdt->brand }} , {{ $pdt->category }}
                         </p>
                     </div>

                     <div class="cartSection">
                         <b>ريال : </b>
                         {{-- <s>{{ $pdt->price }}</s> use this if using discount --}}
                         {{ $pdt->price }}
                     </div>

                     <div class="quantity">
                         <label for="">Quantity</label>
                         <div class="row">
                             <div class="col-2">
                                <button class="btn btn-light" onclick="removeNOP()">-</button>
                             </div>
                             <div class="col-4">
                                 <input type="text" readonly class="form-control" min="1" value="1" style="text-align: center;" id="nop">
                                 <input type="hidden" value="{{ $pdt->price }}" id="price">
                             </div>
                             <div class="col-2">
                                 <button class="btn btn-light" onclick="addNOP()">+</button>
                             </div>
                         </div>

                         Total Price : <br> <input type="text" id="totalPrice" readonly value="{{ $pdt->price }}">

                         <div class="row" style="float: left;margin-top: 10px;width: 100%;">
                             <div class="col-md-6">
                                 <form action="" method="post">
                                    <input type="hidden" name="cartId" value="{{ $pdt->id }}">
                                    <button class="btn btn-primary btn-sm">Buy Now</button>
                                 </form>
                             </div>
                             <div class="col-md-6">
                                 <form action="">
                                    <input type="hidden" name="cartId" value="{{ $pdt->id }}">
                                    <button class="btn btn-info btn-sm">Ad to cart</button>
                                 </form>
                             </div>
                         </div>

                        @endforeach
                     </div>
                 </div>

                 <div class="col-md-4">
                     <div class="delivery">
                         <div class="row" style="padding-bottom: 10px;">
                             <div class="col-md-6">
                                 Delivery
                             </div>
                             <div class="col-md-6">
                                 <i class="fa-duotone fa-info"></i>
                             </div>
                         </div>
                         <br>
                         <div class="row" style="margin-top: -30px;">
                             <div class="col-md-2">
                                 <i class="fa-duotone fa-location-dot deliverLocIcon"></i>
                             </div>
                             <div class="col-md-7">
                                 Mohakhli , Dhaka , Bangladesh
                             </div>
                             <div class="col-md-3">
                                 Change
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-md-2">
                                 <i class="fa-duotone fa-person-carry-box deliverLocIcon"></i>
                             </div>
                             <div class="col-md-7">
                                Standard Delivery <br> <small style="color: darkcyan;">3 -4 days</small>
                             </div>
                             <div class="col-md-3">
                                 ৳ 100
                             </div>
                         </div>
                         <div class="row" style="padding-bottom: 10px;">
                             <div class="col-md-2">
                                 <i class="fa-duotone fa-money-bill-1-wave deliverLocIcon"></i>
                             </div>
                             <div class="col-md-7">
                                Cash on Delivery
                             </div>
                             <div class="col-md-3">
                                 Available
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-md-6">
                                 Service
                             </div>
                         </div>
                         <div class="row" style="padding-bottom: 10px;">
                             <div class="col-md-2">
                                 <i class="fa-duotone fa-timer deliverLocIcon"></i>
                             </div>
                             <div class="col-md-7">
                                7 Day return
                             </div>
                             <div class="col-md-3">

                             </div>
                         </div>
                         <div class="row" style="padding-bottom: 10px;">
                             <div class="col-md-2">
                                 <i class="fa-duotone fa-shield-slash deliverLocIcon"></i>
                             </div>
                             <div class="col-md-7">
                                 Warranty Not Available
                             </div>
                             <div class="col-md-3">

                             </div>
                         </div>

                         <div class="row">
                             <div class="col-md-6">
                                 Sold by
                             </div>
                         </div>
                         <div class="row" style="padding-bottom: 10px;">
                             <div class="col-md-2">
                                 <i class="fa-duotone fa-timer"></i>
                             </div>
                             <div class="col-md-7">
                                Day Night Deal
                             </div>
                             <div class="col-md-3">
                                 <a href="">Chat</a>
                             </div>
                         </div>

                     </div>
                 </div>
             </div>
         </div>

         <div class="detailSection">
            @foreach ($product as $pdts)
             <div class="card text-center">
                {{ $pdts->shortdesc }}
             </div>
             <br>
             <div class="card">
                  {!! $pdts->longdesc  !!}
             </div>
             @endforeach
         </div>
    </div>

    <div class="moreProducts mb-5">
     <div class="container">
         <div class="row">

            @foreach ($related_product as $rtdpdt)
            <div class="col-3">
                <a href="{{  URL::to('single-product' , $rtdpdt->id) }}">
                    <img src="{{ asset($rtdpdt->img) }}" alt="" style="height: 150px;object-fit:cover;">
                    <br>

                    <div class="cartBtns">
                        <span>{{ $rtdpdt->title }}</span>
                        <span>Price : {{ $rtdpdt->price }} ريال </span>

                        <button class="btn btn-info btn-sm">Buy Now</button>
                        <button class="btn btn-primary btn-sm">Add to Cart</button>
                    </div>
                </a>
            </div>
            @endforeach



         </div>
     </div>
    </div>

 </div>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

 <script>
     let slideIndex = 1;
     showSlides(slideIndex);

     function plusSlides(n) {
       showSlides(slideIndex += n);
     }

     function currentSlide(n) {
       showSlides(slideIndex = n);
     }

     function showSlides(n) {
       let i;
       let slides = document.getElementsByClassName("mySlides");
       let dots = document.getElementsByClassName("demo");
       let captionText = document.getElementById("caption");
       if (n > slides.length) {slideIndex = 1}
       if (n < 1) {slideIndex = slides.length}
       for (i = 0; i < slides.length; i++) {
         slides[i].style.display = "none";
       }
       for (i = 0; i < dots.length; i++) {
         dots[i].className = dots[i].className.replace(" active", "");
       }
       slides[slideIndex-1].style.display = "block";
       dots[slideIndex-1].className += " active";
       captionText.innerHTML = dots[slideIndex-1].alt;
     }


     function addNOP() {
         var nop = parseInt($('#nop').val());
         var price = parseInt($('#price').val());
         var Tprice = parseInt($('#totalPrice').val());
         $('#nop').val(nop + 1);
         $('#totalPrice').val(Tprice + price);


     }

     function removeNOP() {
         var nop = parseInt($('#nop').val());
         var price = parseInt($('#price').val());
         var Tprice = parseInt($('#totalPrice').val());
         if(nop > 1){
             $('#nop').val(nop - 1);
             $('#totalPrice').val(Tprice - price);
         }
     }

    //  totalPrice


     </script>
@stop
