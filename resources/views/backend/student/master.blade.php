
<!DOCTYPE html>
<html lang="en">
    @if (empty(Session::get('userId')))
    <script>
        window.location = "/admin";
    </script>

@endif

@if (Session::get('userRole') == 'admin')
    <script>
        window.location = "/deshboard";
    </script>

@endif

<head>
    <!-- meta tags -->
    @include('backend.student.include.meta')
    <!-- css links -->
    @include('backend.student.include.css')
</head>

<body class="app sidebar-mini">
    <!-- Navbar-->
    @include('backend.student.include.navbar')
    <!-- Sidebar menu-->
    @include('backend.student.include.sidebar')
    <!-- main content -->
    {{-- @include('backend.student.include.main') --}}
    <main class="app-content">
    @yield('content')
    </main>

    <!-- Essential javascripts for application to work-->
    @include('backend.student.include.js')
</body>

</html>
