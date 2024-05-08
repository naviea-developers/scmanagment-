<section>
   <style>
    .bottomLink {
        text-decoration: none;
        color: #fff;
    }

    .bottomLink:hover{
        color: yellowgreen;
    }
    
    .companyName img{
        width: 100px;
        margin-left: 115px;
    }
   </style>

    <!-- Footer -->
    <footer class="text-center footer text-lg-start text-white" style="padding:0px !important;">

<section class="">
<div class="container text-center text-md-start mt-5 w-100">
  <!-- Grid row -->

  <div class="col-md-12">
    <h1 class="text-uppercase companyName fw-bold mb-4">
        <img src="{{ asset('/logo.png') }}">    
    </h1>
  </div>

  @php
    $address = DB::table('address')->get();
  @endphp

  <div class="row mt-3">

    @foreach ($address as $ads)
    <div class="col-md-4 mx-auto mb-4">
        <!-- Content -->
        <h5>{{  $ads->title }}</h5>
        <div>
            {!! $ads->addressData !!}
        </div>

      </div>
    @endforeach



    <!-- Grid column -->
    <div class="col-md-2 mx-auto mb-4">
      <!-- Links -->
      <h6 class="text-uppercase fw-bold mb-4">
        About of Techknowsity
      </h6>
       <ul class="ps-2" style="margin-top: -17px;">
           <li><a href="/policyView" class="bottomLink">Privacy policy</a></li>
           <li><a href="/termsView" class="bottomLink">Term and condition</a></li>
        </ul>
    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-2 mx-auto mb-md-0 mb-4">
      <!-- Links -->
      <h6 class="text-uppercase fw-bold mb-4">Get to know us</h6>
        <ul class="ps-2">
            <li><a href="/getallBlog" class="bottomLink">Blog</a></li>
            <li><a href="/aboutPage" class="bottomLink">About</a></li>
            <li><a href="/contactus" class="bottomLink">Contact</a></li>
        </ul>
    </div>
    <!-- Grid column -->
  </div>
  <!-- Grid row -->
    @include('frontend.includess.copyr')
</div>

</section>
<!-- Section: Links  -->

        @yield('script')
</footer>
<!-- Footer -->
</section>

