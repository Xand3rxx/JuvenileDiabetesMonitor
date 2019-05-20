@extends('layouts.app')
@section('title', 'Appointments')
@section('content')

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
                <th>Appointment Time</th> 
              </tr>
            </thead>
            <tbody>
              @if ($totalAppointmentsToday > 0)
                @foreach ($appointmentTable as $item)
                  <tr class="text-info">
                    <td class="font-weight-medium">{{ ++$i }}</td>
                    <td>{{ $item->First_Name }} {{ $item->Middle_Name }} {{ $item->Last_Name }}</td>
                    <td><?php echo date('i:s A', strtotime($item->Appointment_Time)); ?></td>
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

<div class="row">
  <div class="col-lg-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Previous Appointments</h4>
        <div class="table-striped table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>S/N</th>
                <th>Full Name</th>
                <th>Appointment Time</th> 
              </tr>
            </thead>
            <tbody>
             @foreach ($previousAppointmentTable as $item)
                <tr class="text-info">
                  <td class="font-weight-medium">{{ ++$i }}</td>
                  <td>{{ $item->First_Name }} {{ $item->Middle_Name }} {{ $item->Last_Name }}</td>
                  <td><?php echo date('i:s A', strtotime($item->Appointment_Time)); ?></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection