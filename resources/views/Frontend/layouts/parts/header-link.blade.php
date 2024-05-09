


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- website favicon -->
    {{-- @php
    $logo = \App\Models\Tp_option::where('option_name', 'theme_logo')->first();
    @endphp
    <link rel="shortcut icon" href="{{@$logo->favicon_show}}" type="image/x-icon"> --}}
    {{-- @section('title')
    {{ $logo->web_title }}
    @endsection  --}}
    <!--Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&amp;family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200&amp;display=swap" rel="stylesheet">

    <!-- <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet"> -->
    <!-- Bootstrap CSS -->
    <link
        href="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/plugins/bootstrap/css/bootstrap.min.css"
        rel="stylesheet">
    <link
        href="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/plugins/fontawesome/css/all.min.css"
        rel="stylesheet">




    <link
        href="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/plugins/typicons.font/src/font/typicons.min.css"
        rel="stylesheet">
    <link
        href="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/plugins/mmenu-light/dist/mmenu-light.css"
        rel="stylesheet">
    <link
        href="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/plugins/OwlCarousel2/css/owl.carousel.min.css"
        rel="stylesheet">
    <link
        href="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/plugins/OwlCarousel2/css/owl.theme.default.min.css"
        rel="stylesheet">
    <link
        href="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/plugins/video-popup/videoPopUp.css"
        rel="stylesheet">
    <link
        href="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/plugins/Magnific-Popup/dist/magnific-popup.css"
        rel="stylesheet">
    <link
        href="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/plugins/sweetalert/sweet-alert.min.css"
        rel="stylesheet">
    <link
        href="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/plugins/scrolling-tabs/dist/jquery.bs4-scrolling-tabs.min.css"
        rel="stylesheet">
    <link
        href="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css"
        rel="stylesheet">
    <link
        href="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/plugins/toastr/toastr.css"
        rel="stylesheet">

    <link
        href="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/plugins/datatables/dataTables.min.css"
        rel="stylesheet">
    <link
        href="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/plugins/datatables/dataTables.bootstrap4.min.css"
        rel="stylesheet">
    <link
        href="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/plugins/datatables/responsive.bootstrap4.min.css"
        rel="stylesheet">
    <link
        href="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/plugins/datatables/buttons.bootstrap4.min.css"
        rel="stylesheet">

    <link
        href="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/css/style.css"
        rel="stylesheet">
    <link
        href="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/css/frontends.css"
        rel="stylesheet">
    <script
        src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/js/virtualpaginate.js">
    </script>
    <link
        href="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/plugins/raty/lib/jquery.raty.css"
        rel="stylesheet">


    <link href="{{ asset('public/frontend') }}/assets/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css"
        rel="stylesheet">
    <link
        href="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css"
        rel="stylesheet">
    <link
        href="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/plugins/select2/dist/css/select2.min.css"
        rel="stylesheet">
    <link rel="stylesheet"
        href="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/css/jquery-ui.css">
    <script
        src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/plugins/jquery/jquery.js">
    </script>
    <script type="text/javascript"
        src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/plugins/bootstrap-3-Typeahead/bootstrap3-typeahead.min.js">
    </script>
    <script
        src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/plugins/Chart.js/chart.min.js">
    </script>

    <!-- ================= its for croping image ================= -->
    {{-- <link rel="stylesheet" href="https://unpkg.com/dropzone%406.0.0-beta.2/dist/dropzone.css" />
    <link href="https://unpkg.com/cropperjs%401.6.1/dist/cropper.css" rel="stylesheet" />
    <script src="https://unpkg.com/dropzone"></script>
    <script src="https://unpkg.com/cropperjs"></script> --}}
    <!-- ============== close croper============= -->



    <title>@yield('title')</title>




