      <!-- Copyright -->

<style>

/*@media only screen and (max-width: 500px) {*/
/*    .copyrightSection .col-md-4 h5 {*/
/*        margin-left: -25px !important;*/
/*    }*/
/*    .payimg {*/
/*        margin-left: -10px !important;*/
/*    }*/
/*}*/

.socialLink a {
	padding: 5px;
	border: 1px solid #fff;
	height: 25px;
	width: 25px;
	display: inline-block;
	border-radius: 5px;
	font-size: 15px;
	position: relative;
}

.socialLink a i{
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%,-50%);
}

.socialLink a:hover{
    background: #f1d3d3;
    border-color: #f1d3d3;
    color: blue;
}


@media only screen and (max-width: 767px) {
    
    .copyrightSection .float-start{
        min-width: 100% !important;
    }
    
    .copyrightSection .float-start img {
        width: auto !important;
        margin: 0 !important;
    }
    
}

@media only screen and (max-width: 500px) {
    .copyrightSection .float-start{
        min-width: 100% !important;
        margin-left: -70px;
    }
}

</style>

      <div class="px-0 copyrightSection">
        <div class="align-items-center float-start" style="width:500px;">
            <div class="row">
                <div class="col-md-4">
                    <H5>We accept</H5>
                </div>
                <div class="col-md-8">

                    @php
                        $pay = DB::table('payment_accept')->get();
                    @endphp

                    @foreach ($pay as $py)
                        <img src="{{ asset('payment_method/').'/'.$py->src }}" style="width: 240px;object-fit: fill;border-radius: 5px;height: 30px;margin-left: -50px;" class="payimg" title="{{ $py->title }}">
                    @endforeach


                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="float-end socialLink">
                    {{-- <img src="{{ asset('/') }}frontend/assets/images/icons/facebook.svg" alt="" class="me-2 w-30">
                    <img src="{{ asset('/') }}frontend/assets/images/icons/google.svg" alt="" class="me-2 w-30">
                    <img src="{{ asset('/') }}frontend/assets/images/icons/linkedin.svg" alt="" class="me-2 w-30">
                    <img src="{{ asset('/') }}frontend/assets/images/icons/twitter.svg" alt="" class="me-2 w-30"> --}}

                    <a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="https://twitter.com/" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                    <a href="https://linkedin.com/" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                    <a href="https://youtube/" target="_blank"><i class="fa-brands fa-youtube"></i></a>

                </div>
            </div>
        </div>

       </div>
       <div class="text-center p-3 ">
         <p style="margin-bottom: -40px;"> {{ date("Y") }} navieasoft Technologies Limited</p>
       </div>
       <!-- Copyright -->
