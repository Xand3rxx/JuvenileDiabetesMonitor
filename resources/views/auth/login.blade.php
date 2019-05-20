
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Juvenile Diabetes Monitor: Login</title>
  <!-- plugins:css -->
  <script src="{{ asset('custom/js/jquery.min.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('custom/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('custom/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('custom/vendors/css/vendor.bundle.addons.css') }}">
  <link rel="stylesheet" href="{{ asset('custom/css/sweetalert2.min.css') }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('custom/css/style.css') }}">
  <!-- endinje-->
  <link rel="shortcut icon" href="{{ asset('custom/images/favicon.png') }}" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
              <form action="{{ route('authLogin') }}" method="post">
                  {{ csrf_field() }}
                  @include('partials._messages')
                <div class="form-group">
                  <label class="label">Email</label>
                  <div class="input-group">
                    <input type="email" name="user_email" id="user_email" class="form-control" placeholder="johndoe@mail.com">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="label">Password</label>
                  <div class="input-group">
                    <input type="password" name="user_password" id="user_password"class="form-control" placeholder="*********">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary submit-btn btn-block">Login</button>
                </div>
                {{-- <div class="form-group d-flex justify-content-between">
                  <div class="form-check form-check-flat mt-0">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" checked> Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="text-small forgot-password text-black">Forgot Password</a>
                </div>
                <div class="form-group">
                  <button class="btn btn-block g-login">
                    <img class="mr-3" {{ asset('custom/images/file-icons/icon-google.svg') }}" alt="">Log in with Google</button>
                </div> --}}
                <div class="text-small font-weight-semibold text-center">Not a member ?</div>
                <div class="text-block text-center my-3">                 
                  <a href="{{ route('registerPatient') }}" class="text-black text-small">Create Patient account</a> |
                  <a href="{{ route('registerPhysician') }}" class="text-black text-small">Create Physician account</a>
                </div>
              </form>
            </div>
            {{-- <ul class="auth-footer">
              <li>
                <a href="#">Conditions</a>
              </li>
              <li>
                <a href="#">Help</a>
              </li>
              <li>
                <a href="#">Terms</a>
              </li>
            </ul> --}}
            <p class="footer-text text-center">copyright © <?php echo date('Y'); ?> Juvenile Diabetes Monitor. All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset('custom/vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('custom/vendors/js/vendor.bundle.addons.js') }}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{ asset('custom/js/off-canvas.js') }}"></script>
  <script src="{{ asset('custom/js/misc.js') }}"></script>
  <script src="{{ asset('custom/js/sweetalert2.min.js') }}"></script>
  <!-- endinject -->
</body>

</html>