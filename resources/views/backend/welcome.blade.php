<!DOCTYPE html>
<html>
    <head>
        @include('backend.inc.css')
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title> Reolands - @yield('title') </title>
    </head>

    <body>
        @include('backend.inc.sidebar')
        @include('backend.inc.head')

        <div class="p-2">
            @yield('content')
        </div>

        @include('backend.inc.js')
    </body>
</html>
