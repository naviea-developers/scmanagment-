@extends('Backend.layouts.layouts') @section('style')
<style>
  #myTab {
    position: absolute;
    left: 50%;
    top: 0;
    transform: translate(-50%, 0px);
    background: #18a6af;
    width: 100%;
    text-align: center;
    padding: 5px;
  }

  #home-tab {
    background: #17a2b8 !important;
    color: #fff !important;
    border: none !important;
  }

  #profile-tab {
    background: #23bf08 !important;
    color: #fff !important;
    border: none !important;
  }

  #contact-tab {
    background: #0866c6 !important;
    color: #fff !important;
    border: none !important;
  }

  #yr-tab {
    background: #6c757d !important;
    color: #fff !important;
    border: none !important;
  }
</style>
@endsection @section('main_contain')
<div class="br-mainpanel">
  {{--
  <div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Dashboard</h4>
      <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
  </div>
  --}}
  <br />
  <div class="br-pagebody">
    <div class="" style="min-height: 450px;">
      <H2>Welcom to Admin Panel............</H2>
    </div>
   
    <!-- br-pagebody -->
    <footer class="br-footer">
      <div class="footer-left">
        <div class="mg-b-2">Copyright &copy; 2023. Naviea Soft. All Rights Reserved.</div>
        <div>Attentively and carefully made by Naviea Soft.</div>
      </div>
      <div class="footer-right d-flex align-items-center">
        <span class="tx-uppercase mg-r-10">Share:</span>
        <a target="_blank" class="pd-x-5" href="https://www.facebook.com/sharer/sharer.php?u=http%3A//themepixels.me/bracketplus/intro"><i class="fab fa-facebook tx-20"></i></a>
        <a
          target="_blank"
          class="pd-x-5"
          href="https://twitter.com/home?status=Bracket%20Plus,%20your%20best%20choice%20for%20premium%20quality%20admin%20template%20from%20Bootstrap.%20Get%20it%20now%20at%20http%3A//themepixels.me/bracketplus/intro"
        >
          <i class="fab fa-twitter tx-20"></i>
        </a>
      </div>
    </footer>
  </div>
  <!-- br-mainpanel -->
  @endsection 
  @section('script')
  <script src="{{ asset('public/backend') }}/js/ResizeSensor.js"></script>
  <script src="{{ asset('public/backend') }}/js/dashboard.js"></script>
  @endsection
 