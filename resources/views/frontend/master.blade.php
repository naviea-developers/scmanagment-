@include('frontend.includess.header')

<body>

@if (\Session::has('msg'))
    <div class="toast show" role="alert" aria-live="assertive"
    aria-atomic="true" style="float: right;float: right; position: fixed; z-index: 100000; background: #fff; top: 10px; right: 10px;">
        <div class="toast-header">
        <img src="img/logo.png" style="height: 25px;weight:25px;"
        class="rounded me-2" alt="...">
        <strong class="me-auto">@include('inc.sitename')</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast"
        aria-label="Close"></button>
        </div>
        <div class="toast-body" style="text-transform: capitalize;">
            {!! \Session::get('msg') !!}
        </div>
    </div>
@endif


  <section class="container-fluid w-100 px-0 mx-0">


    @include('frontend.includess.nav')


      @yield('body')


    @include('frontend.includess.footer')


  </section>




<script>

$('.showToggleMenu').on('click', function(){
    $(this).css('display' , 'none');
    $('.hideToggleMenu').css('display' , 'block');
    $('.navbar-collapse').collapse('show');
});

$('.hideToggleMenu').on('click', function(){
    $(this).css('display' , 'none');
    $('.showToggleMenu').css('display' , 'block');
    $('.navbar-collapse').collapse('hide');
});
</script>

</body>

</html>

