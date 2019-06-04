@extends('layouts.app')
@section('title', 'Physician Dashboard')
@section('content')
@include('partials._messages')
    {{-- <div class="row purchace-popup">
      <div class="col-12">
        <span class="d-block d-md-flex align-items-center">
          <p>Like what you see? Check out our premium version for more.</p>
          <a class="btn ml-auto download-button d-none d-md-block" href="https://github.com/BootstrapDash/StarAdmin-Free-Bootstrap-Admin-Template" target="_blank">Download Free Version</a>
          <a class="btn purchase-button mt-4 mt-md-0" href="https://www.bootstrapdash.com/product/star-admin-pro/" target="_blank">Upgrade To Pro</a>
          <i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>
        </span>
      </div>
    </div> --}}
    <style>
      a{
        color: #212529;
      }
      a:hover{
        text-decoration: none;

      }
    </style>
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
              <div class="card-body">
                <div class="clearfix">
                  <div class="float-left">
                    <i class="mdi mdi-account-location text-info icon-lg"></i>
                  </div>
                  <div class="float-right">
                    <p class="mb-0 text-right">Total Patients</p>
                    <div class="fluid-container">
                    <h3 class="font-weight-medium text-right mb-0"><a href="{{ url('physician-all-patients') }}">{{ $totalPatients }}</a></h3>
                    </div>
                  </div>
                </div>
                <p class="text-muted mt-3 mb-0">
                  <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> Total Number of Patients
                </p>
              </div>
            </div>
          </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
          <div class="card-body">
            <div class="clearfix">
              <div class="float-left">
                <i class="mdi mdi-cube text-danger icon-lg"></i>
              </div>
              <div class="float-right">
                <p class="mb-0 text-right">New Appointments</p>
                <div class="fluid-container">
                  <h3 class="font-weight-medium text-right mb-0"><a href="{{ url('physician-appointment') }}">{{ $totalAppointmentsToday }}</a></h3>
                </div>
              </div>
            </div>
            <p class="text-muted mt-3 mb-0">
              <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Appointments for <?php echo date('d/m/Y'); ?>
            </p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
          <div class="card-body">
            <div class="clearfix">
              <div class="float-left">
                <i class="mdi mdi-receipt text-warning icon-lg"></i>
              </div>
              <div class="float-right">
                <p class="mb-0 text-right">Total Appointments</p>
                <div class="fluid-container">
                  <h3 class="font-weight-medium text-right mb-0"><a href="{{ url('physician-appointment') }}">{{ $totalAppointments }}</a></h3>
                </div>
              </div>
            </div>
            <p class="text-muted mt-3 mb-0">
              <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Total Appointments so far
            </p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
          <div class="card-body">
            <div class="clearfix">
              <div class="float-left">
                <i class="mdi mdi-poll-box text-success icon-lg"></i>
              </div>
              <div class="float-right">
                <p class="mb-0 text-right">Total Physicians</p>
                <div class="fluid-container">
                <h3 class="font-weight-medium text-right mb-0"><a href="{{ url('physician-all-physicians') }}">{{ $totalPhysicians }}</a></h3>
                </div>
              </div>
            </div>
            <p class="text-muted mt-3 mb-0">
              <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Number of registered Physicians
            </p>
          </div>
        </div>
      </div>
    </div>

    
    <div class="row">
      <div class="col-lg-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Patients at risk</h4>
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Full Name</th>
                    <th>Risk Level</th>
                    <th>View</th> 
                  </tr>
                </thead>
                <tbody>              
                      <tr class="text-danger">
                        <td class="font-weight-medium">1</td>
                        <td>Herman Beck </td>
                        <td>4</td>
                        <td><i class="mdi mdi-eye"></i></td>
                        {{-- <td><a href="{{ route('patientCarePod', $item->Medical_Record_No) }}"><i class="mdi mdi-eye"></a></td> --}}
                        <td id="remove_risk"><i class="mdi mdi-close"></i></td> 
                      </tr>    
                      <tr class="text-danger">
                          <td class="font-weight-medium">2</td>
                          <td>Ryan Reynolds </td>
                          <td>2</td>
                          <td><i class="mdi mdi-eye"></i></td>
                          {{-- <td><a href="{{ route('patientCarePod', $item->Medical_Record_No) }}"><i class="mdi mdi-eye"></a></td> --}}
                          <td id="remove_risk"><i class="mdi mdi-close"></i></td> 
                        </tr>  
                        <tr class="text-danger">
                            <td class="font-weight-medium">3</td>
                            <td>Gene Hackman </td>
                            <td>5</td>
                            <td><i class="mdi mdi-eye"></i></td>
                            {{-- <td><a href="{{ route('patientCarePod', $item->Medical_Record_No) }}"><i class="mdi mdi-eye"></a></td> --}}
                            <td id="remove_risk"><i class="mdi mdi-close"></i></td> 
                          </tr> 
                          <tr class="text-danger">
                              <td class="font-weight-medium">4</td>
                              <td>Brad Traversy</td>
                              <td>3</td>
                              <td><i class="mdi mdi-eye"></i></td>
                              {{-- <td><a href="{{ route('patientCarePod', $item->Medical_Record_No) }}"><i class="mdi mdi-eye"></a></td> --}}
                              <td id="remove_risk"><i class="mdi mdi-close"></i></td> 
                            </tr>      
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Today's Appointments</h4>
              <div class="table-striped table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>S/N</th>
                      <th>Full Name</th>
                      <th>Appointment Date</th> 
                      <th>Appointment Time</th> 
                    </tr>
                  </thead>
                  <tbody>
                      @if ($totalAppointmentsToday > 0)
                      @foreach ($appointmentTable as $item)
                        <tr class="text-info">
                          <td class="font-weight-medium">{{ ++$i }}</td>
                          <td>{{ $item->First_Name }} {{ $item->Middle_Name }} {{ $item->Last_Name }}</td>
                          <td>
                              <?php 
                                $date = \Carbon\Carbon::parse($item->Appointment_Date, 'UTC');
                                echo $date->isoFormat('MMMM Do YYYY');
                              ?>
                            </td>
                            <td>
                              <?php 
                                $time = \Carbon\Carbon::parse($item->Appointment_Time, 'UTC');
                                echo $time->isoFormat('h:mm A');
                              ?>
                            </td>
                        </tr>
                      @endforeach
                    @else
                    <tr align="center" style="background-color: #f44336; color: #fff;">
                        <td colspan="5"><strong>Sorry!</strong> No Appointments found for <strong><?php echo date('d-m-Y') ?></strong></td>                      
                      </tr> 
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    <script>
      $(document).on('click', '#remove_risk', function(){
          $(this).closest("tr").remove();
      });
    </script>
  <!-- content-wrapper ends -->
@endsection