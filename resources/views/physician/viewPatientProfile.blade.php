@extends('layouts.app')
@section('title', 'Patient Profile')
@section('content')
@include('partials._messages')
@foreach ($patientProfile as $item)
@endforeach
{{-- <link rel="stylesheet" href="{{ asset('custom/css/bootstrap.min.css') }}"> --}}

<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h3 class="text-primary">Patient Bio-Data</h3>
            <div class="row">
              <div class="col-md-6">
                <p class="text-white bg-dark pl-1">Full Name</p>
                <p class="text-dark font-weight-bold">{{ $item->First_Name}} {{ $item->Middle_Name}} {{ $item->Last_Name}}</p>
                <p class="text-white bg-dark pl-1">Date of Birth</p>
                <p class="text-dark font-weight-bold">
                  <?php 
                    $dob = \Carbon\Carbon::parse($item->Date_of_Birth, 'UTC');
                    echo $dob->isoFormat('MMMM Do YYYY');
                  ?> 
                </p>
                <p class="text-white bg-dark pl-1">Gender</p>
                <p class="text-dark font-weight-bold">{{ $item->Gender}}</p>
                <p class="text-white bg-dark pl-1">Guardian Information</p>
                <p class="text-dark font-weight-bold"><span class="text-warning">Name:</span> {{ $item->Guardian1_Name}}</p>
                <p class="text-dark font-weight-bold"><span class="text-warning">Email:</span> {{ $item->Guardian1_Email}}</p>
                <p class="text-dark font-weight-bold"><span class="text-warning">Mobile No:</span> {{ $item->Guardian1_mobile_No}}</p>
                <p class="text-white bg-dark pl-1">Risk Value</p>
                <p class="text-danger font-weight-bold risk_value">
                  @if ($riskValue < 130)
                      <span id="risk_value">1</span> : Insignificant Risk
                      <div class="progress">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                  @elseif($riskValue > 130 && $riskValue < 160)
                      <span id="risk_value">2</span> : Minor Risk
                      <div class="progress">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                  @elseif($riskValue > 160 && $riskValue < 190)
                      <span id="risk_value">3</span> : Moderate Risk
                      <div class="progress">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                  @elseif($riskValue > 190 && $riskValue < 220)
                      <span id="risk_value">4</span> : Major Risk
                      <div class="progress">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                  @else
                      <span id="risk_value">5</span> : Severe Risk
                      <div class="progress">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                  @endif
                </p>
              </div>
              <div class="col-md-6">
                <style>
                  .center{
                    display: block;
                    margin-left: auto;
                    margin-right: auto;
                    max-width: 50%;
                  }
                </style>
                <div class="col-md-3 center">
                  <div class="profile-image user_wrapper">           
                      @if ($item->Avatar == '' || $item->Avatar == 'user_avatar.jpg')
                      <img src="{{ asset('custom/images/user_avatar.jpg') }}" alt="image">     
                      @else
                        <img style="height: 200px; " src="{{ asset('uploads/'.$item->Avatar) }}" alt="image">
                      @endif
                  </div>
                </div>
                <p class="text-white bg-dark pl-1">Estimated HBA1C</p>
                <p class="text-dark font-weight-bold"> 8</p>
                <p class="text-white bg-dark pl-1">EMR Generated HBA1C</p>
                <p class="text-dark font-weight-bold">9</p>
                <p class="text-danger">There is a significant difference between HBA1C and the EMR estimated HBA1C</p>
              
                     
            </div>  
            </div>
            <div class="col-md-12 text-center">
                <div class="template-demo">
                  <a class="btn btn-outline-success" href="{{ route('patientMessages', $item->Medical_Record_No) }}">Patient Messages</a>
                  <button type="button" class="btn btn-outline-primary schedule">Schedule Appointment</button>
                  <button type="button" class="btn btn-outline-info">Refill History</button>
                  <button type="button" class="btn btn-outline-warning refill">View Medication</button>
                </div>
            </div>     
          </div>
        </div>
      </div>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
              <h4 class="card-title">Glucose Monitoring</h4>
              <canvas id="areaChart" height="150px"></canvas>
            </div>
          </div>
      </div>
      <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
              <div class="card-body">
                <h4 class="card-title">Insulin Monitoring</h4>
                <canvas id="myChart" height="150px"></canvas>
              </div>
            </div>
        </div>
</div>

{{-- Alert Dialog for risk value --}}

<dialog class="mdl-dialog" role="dialog" id="modal-example">
    <div class="mdl-dialog__content">
        <div class="card">
            <div class="card-body riskValue">
              <h3 class="text-danger font-weight-bold text-center">Risk Value Alert</h3>
              <hr>
              <h5 class="card-description">{{ $item->First_Name}} {{ $item->Middle_Name}} {{ $item->Last_Name}}'s risk value is 
                  @if ($riskValue < 130)
                      1
                  @elseif($riskValue > 130 && $riskValue < 160)
                      2
                  @elseif($riskValue > 160 && $riskValue < 190)
                      3
                  @elseif($riskValue > 190 && $riskValue < 220)
                      4 which is a Major risk 
                  @else
                      5 which is a Severe risk
                  @endif
                
                .</h5>
              <h4 class="text-center">Do you want to schedule an appointment?</h4>
              <div class="text-center">
                <button class="btn btn-success mr-2 yes">Yes</button>
                <button class="btn btn-danger close-modal-example">No</button>
              </div>
            </div>
          </div>

          {{--Appointment View--}}
          <div class="card-body d-none appointMent">
              <h3 class="text-primary font-weight-bold text-center">Appointment Scheduler</h3>
              <hr>
          <form class="forms-sample" action="{{ route('PhysicianAppointment') }}" method="POST">
                  {{ csrf_field() }}
              <input class="d-none" name="PatientID" value="{{ $item->Medical_Record_No }}">
              <div class="form-group">
                  <div class="form-group">
                    <label for="Date">Date</label>
                    <div class="input-group date" id="datepicker">
                      <input class="form-control" name="datepicker" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="Time">Time</label>
                    <div class="input-group time"  id="timepicker">
                      <input class="form-control" name="timepicker" />
                    </div>
                  </div>                     
              </div>
              
              <div class="form-group">
                <label for="Appointment_Message">Message</label>
                <textarea class="form-control" name="Appointment_Message" id="Appointment_Message" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-success mr-2">Submit</button>
              <a class="btn btn-light close-modal-example cancel">Cancel</a>
            </form>
          </div>
    </div>
</dialog>


<script>

  $('.yes').click(function(){
    $('.riskValue, .appointMent').toggleClass('d-none');
    // if(!($('.riskValue').hasClass('d-none'))){
    //   $('.appointMent').removeClass('d-none');
    //   $('.riskValue').addClass('d-none');
    // }

  });

  // jquery
  $(function () {

    if (/Mobi/.test(navigator.userAgent)) {
      // if mobile device, use native pickers
      $(".date input").attr("type", "date");
      $(".time input").attr("type", "time");
    } 
    else {
    // if desktop device, use DateTimePicker
    $(".date input").attr("type", "date");
      $(".time input").attr("type", "time");
    }

  });

</script>

<script src="{{ asset('custom/js/chart.js') }}"></script>
<script>
  var ctx = document.getElementById('areaChart');
  var measure = <?php echo json_encode($gluMeasurement); ?>;
  var time = <?php echo json_encode($gluTime); ?>;
  var date = <?php echo json_encode($gluDate); ?>;
  
  var myChart = new Chart(ctx, {
   
      type: 'line',
      data: {
          labels: time,
          datasets: [{
              label: 'Glucose Measurement',
              data: measure,
              backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 1,
              fill: true,
              // fillColor: 'dodgerblue'
          }]
        
      },
      options: {
          scales: {
              xAxes: [{
                // type: 'time',
                // time: {
                //   parser: timeFormat,
                //   // round: 'day'
                //   tooltipFormat: 'll HH:mm'
                // },
                  ticks: {
                      beginAtZero: true,
                      major: {
                        fontStyle: 'bold',
                        fontColor: '#FF0000'
                      }
                  },
                  scaleLabel: {
                    display: true,
                    // labelString: 'Date'
                  }
              }],
              yAxes: [{
						scaleLabel: {
							display: true,
							labelString: 'Glucose'
						}
					}]
          }
      }
  });
  </script>


  <script>
  var ctx = document.getElementById('myChart');
  var insulin = <?php echo json_encode($gluMeasurement1); ?>;
  var time = <?php echo json_encode($gluTime1); ?>;
  var date = <?php echo json_encode($gluDate1); ?>;
  var myChart = new Chart(ctx, {
   
      type: 'line',
      data: {
          labels: time,
          datasets: [{
              label: 'Insulin Measurement',
              data: insulin,
              backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 152, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 132, 192, 1)',
                  'rgba(153, 112, 255, 1)',
                  'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 1,
              fill: false
          }]
        
      },
      options: {
          scales: {
            xAxes: [{
                type: 'time',
                  ticks: {
                      beginAtZero: true,
                      major: {
                        fontStyle: 'bold',
                        fontColor: '#FF0000'
                      }
                  },
                  scaleLabel: {
                    display: true,
                    labelString: 'Date'
                  }
              }],
              yAxes: [{
						scaleLabel: {
							display: true,
							labelString: 'Insulin'
						}
					}]
          }
      }
  });
  </script>

@endsection