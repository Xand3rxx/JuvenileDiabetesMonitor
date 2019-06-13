
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Juvenile Diabetes Monitor: Register Patient</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('custom/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('custom/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('custom/vendors/css/vendor.bundle.addons.css') }}">
  <link rel="stylesheet" href="{{ asset('custom/css/sweetalert2.min.css') }}">
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
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-8 mx-auto">
            
            <h2 class="text-center mb-4">Register Patient</h2>
            <div class="auto-form-wrapper">
            <form action="{{ route('newPatient') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    @include('partials._messages')
    {{-- <div class="text-center"> --}}
                  <div class="row">
                      
                      <div class="form-group">
                        <div class="input-group">
                          <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" value="{{ old('first_name') }}">
                          <div class="input-group-append">
                            <span class="input-group-text">
                              <i class="mdi mdi-check-circle-outline"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group">
                          <input type="text" name="middle_name" id="middle_name" class="form-control" placeholder="Middle Name" value="{{ old('middle_name') }}"">
                          <div class="input-group-append">
                            <span class="input-group-text">
                              <i class="mdi mdi-check-circle-outline"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group">
                          <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" value="{{ old('last_name') }}">
                          <div class="input-group-append">
                            <span class="input-group-text">
                              <i class="mdi mdi-check-circle-outline"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                      
                        <div class="form-group">
                            <div class="input-group">
                              <input type="email" name="user_email" id="user_email" class="form-control" placeholder="johndoe@mail.com" value="{{ old('email') }}">
                              <div class="input-group-append">
                                <span class="input-group-text">
                                  <i class="mdi mdi-check-circle-outline"></i>
                                </span>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group">
                              <input type="password" class="form-control" placeholder="Password" name="user_password" id="user_password" value="{{ old('user_password') }}">
                              <div class="input-group-append">
                                <span class="input-group-text">
                                  <i class="mdi mdi-check-circle-outline"></i>
                                </span>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                              <div class="input-group">
                                <input type="date" name="dob" id="dob" class="form-control" placeholder="" value="{{ old('dob') }}">
                                <div class="input-group-append">
                                  <span class="input-group-text">
                                    <i class="mdi mdi-check-circle-outline"></i>
                                  </span>
                                </div>
                              </div>
                            </div>  
                            <div class="form-group">
                                <div class="input-group">
                                  <input type="text" name="guardian1_name" id="guardian1_name" class="form-control" placeholder="Guardian 1 Name" value="{{ old('guardian1_name') }}">
                                  <div class="input-group-append">
                                    <span class="input-group-text">
                                      <i class="mdi mdi-check-circle-outline"></i>
                                    </span>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                  <div class="input-group">
                                    <input type="email" name="guardian1_email" id="guardian1_email" class="form-control" placeholder="guardian1@gmail.com" value="{{ old('guardian1_email') }}">
                                    <div class="input-group-append">
                                      <span class="input-group-text">
                                        <i class="mdi mdi-check-circle-outline"></i>
                                      </span>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                      <input type="tel" name="guardian1_mobile_no" id="guardian1_mobile_no" class="form-control" placeholder="Guardian 1 Mobile No." value="{{ old('guardian1_mobile_no') }}">
                                      <div class="input-group-append">
                                        <span class="input-group-text">
                                          <i class="mdi mdi-check-circle-outline"></i>
                                        </span>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="input-group">
                                      <input type="text" name="guardian2_name" id="guardian2_name" class="form-control" placeholder="Guardian 2 Name" value="{{ old('guardian2_name') }}">
                                      <div class="input-group-append">
                                        <span class="input-group-text">
                                          <i class="mdi mdi-check-circle-outline"></i>
                                        </span>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="input-group">
                                      <input type="email" name="guardian2_email" id="guardian2_email" class="form-control" placeholder="guardian2@gmail.com" value="{{ old('guardian2_email') }}">
                                      <div class="input-group-append">
                                        <span class="input-group-text">
                                          <i class="mdi mdi-check-circle-outline"></i>
                                        </span>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="input-group">
                                      <input type="text" name="guardian2_mobile_no" id="guardian2_mobile_no" class="form-control" placeholder="Guardian 2 Mobile No." value="{{ old('guardian2_mobile_no') }}">
                                      <div class="input-group-append">
                                        <span class="input-group-text">
                                          <i class="mdi mdi-check-circle-outline"></i>
                                        </span>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="input-group">
                                      <input type="text" name="medical_record_no" id="medical_record_no" class="form-control" placeholder="Medical Record Number" value="{{ old('medical_record_no') }}">
                                      <div class="input-group-append">
                                        <span class="input-group-text">
                                          <i class="mdi mdi-check-circle-outline"></i>
                                        </span>
                                      </div>
                                    </div>
                                  </div>
                            <div class="form-group col-md-3">
                                <div class="input-group">                
                                  <select class="form-control" name="physician_ID" id="physician_ID">
                                    <option value="">Select Physician...</option>
                                    @foreach ($Physician as $item)
                                      <option value="{{ $item->Physician_ID }}">{{ $item->First_Name }} {{ $item->Last_Name }}</option>                    
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                              <div class="form-group col-md-3">
                                  <div class="input-group">
                                      <select class="form-control" name="gender" id="gender">
                                        <option value="">Select Gender...</option>
                                        <option value="Female">Female</option>
                                        <option value="Male">Male</option>                              
                                      </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="input-group col-xs-12">
                                        {{-- <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image"> --}}
                                      {{-- <input type="file" name="avatar" accept="image/*" class="file-upload-default"  class="form-control file-upload-info"> --}}
                                        {{-- <span class="input-group-append">
                                          <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                                        </span> --}}
                  <input style="border: 0px;" name="avatar" type="file" value="{{ old('avatar') }}" id="avatar" data-sn="1" class="form-control file-upload-info" accept="image/*">
            
                                      </div>
                                    </div>
                    </div>
                  
                  
            

                <div class="form-group">
                  <button class="btn btn-primary submit-btn btn-block">Register</button>
                </div>
                <div class="text-block text-center my-3">
                  <span class="text-small font-weight-semibold">Already have and account ?</span>
                <a href="{{ route('login') }}" class="text-black text-small">Login</a>
                </div>
              </form>
            </div>
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