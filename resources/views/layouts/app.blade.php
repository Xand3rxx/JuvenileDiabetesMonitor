<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Juvenile Diabetes Monitor- @yield('title') </title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="{{ asset('custom/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
        <script src="{{ asset('custom/js/jquery.min.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('custom/vendors/css/vendor.bundle.base.css') }}">
        <link rel="stylesheet" href="{{ asset('custom/vendors/css/vendor.bundle.addons.css') }}">
        <!-- endinject -->
        <!-- plugin css for this page -->
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="{{ asset('custom/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('custom/css/sweetalert2.min.css') }}">
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
        <script src="{{ asset('custom/js/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('custom/js/dialog-polyfill.js') }}"></script>
        <script>
            $(document).ready(function (){
                //Initialize bootstrap tooltip plugin
                $('[data-toggle="tooltip"]').tooltip();


            });
        </script>
        <script>
            (function() {
                'use strict';
                $(document).on('click', '.show-modal-example', function(){
                    // $(this).closest('div.item-list').find('.pulse-show');
                    // let msgTitle = $(this).closest('p').find('.msgTitle').text();
                    let msgTitle = $('.msgTitle').html();

                    console.log(msgTitle);
                    showClickHandler();
                });

                $(document).on('click', '.close-modal-example', function(){
                    closeClickHandler();
                });

                var dialog = document.querySelector('#modal-example');
                var closeButton = dialog.querySelector('button');
                var showButton = document.querySelector('.show-modal-example');
                if (! dialog.showModal) {
                    dialogPolyfill.registerDialog(dialog);
                }
                var closeClickHandler = function(event) {
                    dialog.close();
                };
                var showClickHandler = function(event) {
                    dialog.showModal();

                };
                // showButton.addEventListener('click', showClickHandler);
                // closeButton.addEventListener('click', closeClickHandler);
            }());
        </script>
        <!-- End custom js for this page-->
    </body>
</html>
