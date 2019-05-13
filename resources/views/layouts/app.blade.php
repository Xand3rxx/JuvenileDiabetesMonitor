<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Juvenile Diabetes Monitor- @yield('title') </title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="{{ asset('custom/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('custom/vendors/css/vendor.bundle.base.css') }}">
        <link rel="stylesheet" href="{{ asset('custom/vendors/css/vendor.bundle.addons.css') }}">
        <!-- endinject -->
        <!-- plugin css for this page -->
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="{{ asset('custom/css/style.css') }}">
        <!-- endinject -->
        <link rel="shortcut icon" href="{{ asset('custom/images/favicon.png') }}" />
    </head>

    <body>
        <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('partials._messages')
        @include('partials._navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
        @include('partials._sidebar')
        <div class="main-panel">
            <div class="content-wrapper">                
                @yield('content')    
            </div>        
        @include('partials._footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="{{ asset('custom/vendors/js/vendor.bundle.base.js') }}"></script>
        <script src="{{ asset('custom/vendors/js/vendor.bundle.addons.js') }}"></script>
        <!-- endinject -->
        <!-- Plugin js for this page-->
        <!-- End plugin js for this page-->
        <!-- inject:js -->
        <script src="{{ asset('custom/js/off-canvas.js') }}"></script>
        <script src="{{ asset('custom/js/misc.js') }}"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="{{ asset('custom/js/dashboard.js') }}"></script>
        <!-- End custom js for this page-->
    </body>
</html>