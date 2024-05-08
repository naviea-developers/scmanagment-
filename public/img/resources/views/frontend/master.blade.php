<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/all.css">

    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
        <title>@yield('title') - @include('frontend.inc.sitename') </title>
        @include('frontend.inc.css')
    </head>
    <body>
       <div class="container"> @include('frontend.inc.header') </div>
            @yield('content')
        @include('frontend.inc.footer')
    </body>
</html>
