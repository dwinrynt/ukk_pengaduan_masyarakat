<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Dashboard</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- plugins:css -->
        <link rel="stylesheet" href="{{ asset('skydash/vendors/feather/feather.css') }}">
        <link rel="stylesheet" href="{{ asset('skydash/vendors/ti-icons/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('skydash/vendors/css/vendor.bundle.base.css') }}">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="{{ asset('skydash/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('skydash/js/select.dataTables.min.css') }}">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="{{ asset('skydash/css/vertical-layout-light/style.css') }}">
        <!-- endinject -->
        <link rel="shortcut icon" href="{{ asset('skydash/images/favicon.png') }}" />
        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
        {{-- bootstrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div class="container-scroller">
            {{-- navbar --}}
            @include('partials.front-navbar')
            {{-- content --}}
            <div class="container-fluid page-body-wrapper">
                @include('partials.aside')
                <div class="main-panel">
                    <div class="content-wrapper">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

        <!-- plugins:js -->
        <script src="{{ asset('skydash/vendors/js/vendor.bundle.base.js') }}"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="{{ asset('skydash/vendors/chart.js/Chart.min.js') }}"></script>
        <script src="{{ asset('skydash/vendors/datatables.net/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('skydash/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
        <script src="{{ asset('skydash/js/dataTables.select.min.js') }}"></script>

        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="{{ asset('skydash/js/off-canvas.js') }}"></script>
        <script src="{{ asset('skydash/js/hoverable-collapse.js') }}"></script>
        <script src="{{ asset('skydash/js/template.js') }}"></script>
        <script src="{{ asset('skydash/js/settings.js') }}"></script>
        <script src="{{ asset('skydash/js/todolist.js') }}"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="{{ asset('skydash/js/dashboard.js') }}"></script>
        <script src="{{ asset('skydash/js/Chart.roundedBarCharts.js') }}"></script>
        <!-- End custom js for this page-->
    </body>
</html>
