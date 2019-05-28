@extends('layouts.app')
@section('title', 'Patient Profile')
@section('content')
@foreach ($patientProfile as $item)
@endforeach
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
                <p class="text-dark"><span class="text-warning">Name:</span> {{ $item->Guardian1_Name}}</p>
                <p class="text-dark"><span class="text-warning">Email:</span> {{ $item->Guardian1_Email}}</p>
                <p class="text-dark"><span class="text-warning">Mobile No:</span> {{ $item->Guardian1_mobile_No}}</p>
                <p class="text-white bg-dark pl-1">Risk Value</p>
                <p class="text-danger">
                  @if ($riskValue < 130)
                      1
                  @elseif($riskValue > 130 && $riskValue < 160)
                      2
                  @elseif($riskValue > 160 && $riskValue < 190)
                      3
                  @elseif($riskValue > 190 && $riskValue < 220)
                      4
                  @else
                      5
                  @endif
                </p>
              </div>
              <div class="col-md-6">
                <div class="col-md-3">
                  <div class="profile-image user_wrapper">
                      @if ($item->Avatar == '' || $item->Avatar == 'user_avatar.jpg')
                      <img src="{{ asset('custom/images/user_avatar.jpg') }}" alt="image">                      
                      @else
                        <img style="height: 255px; " src="{{ asset('uploads/'.$item->Avatar) }}" alt="image">
                      @endif
                  </div>
                </div>
              <div class="col-md-3">
                  <div class="template-demo">
                    <a class="btn btn-outline-success" href="{{ route('patientMessages', $item->Medical_Record_No) }}">Patient Messages</a>
                    <button type="button" class="btn btn-outline-primary">Schedule Appointment</button>
                    <button type="button" class="btn btn-outline-info">Refill History</button>
                    <button type="button" class="btn btn-outline-warning refill">Change Medication</button>
                  </div>
              </div>            
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
{{-- <script src="http://www.chartjs.org/dist/2.7.3/Chart.bundle.js"></script> --}}
<script src="{{ asset('custom/js/chart.js') }}"></script>

{{-- <script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
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
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script> --}}

{{-- <script>
 $(function() {

    'use strict';
    var areaData = {
    labels: ["2013", "2014", "2015", "2016", "2017"],
    datasets: [{
      label: '# of Votes',
      data: [12, 19, 3, 5, 2, 3],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
      borderWidth: 1,
      fill: 'origin', // 0: fill to 'origin'
      fill: '+2', // 1: fill to dataset 3
      fill: 1, // 2: fill to dataset 1
      fill: false, // 3: no fill
      fill: '-2' // 4: fill to dataset 2
    }]
  };

  if ($("#areaChart").length) {
    var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
    var areaChart = new Chart(areaChartCanvas, {
      type: 'line',
      data: areaData,
      options: areaOptions
    });
  }
  });
</script> --}}

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
  var date = <?php echo json_encode($gluDate1)?>;
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