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

<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4">Manage Appointments</h5>
        <div class="fluid-container">
          <div class="row ticket-card mt-3 pb-2 border-bottom pb-3 mb-3">
            <div class="col-md-1">
              <img class="img-sm rounded-circle mb-4 mb-md-0" src="images/faces/face1.jpg" alt="profile image">
            </div>
            <div class="ticket-details col-md-9">
              <div class="d-flex">
                <p class="text-dark font-weight-semibold mr-2 mb-0 no-wrap">James :</p>
                <p class="text-primary mr-1 mb-0">[#23047]</p>
                <p class="mb-0 ellipsis">Donec rutrum congue leo eget malesuada.</p>
              </div>
              <p class="text-gray ellipsis mb-2">Donec rutrum congue leo eget malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim
                vivamus.
              </p>
              <div class="row text-gray d-md-flex d-none">
                <div class="col-4 d-flex">
                  <small class="mb-0 mr-2 text-muted text-muted">Last responded :</small>
                  <small class="Last-responded mr-2 mb-0 text-muted text-muted">3 hours ago</small>
                </div>
                <div class="col-4 d-flex">
                  <small class="mb-0 mr-2 text-muted text-muted">Due in :</small>
                  <small class="Last-responded mr-2 mb-0 text-muted text-muted">2 Days</small>
                </div>
              </div>
            </div>
            <div class="ticket-actions col-md-2">
              <div class="btn-group dropdown">
                <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Manage
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">
                    <i class="fa fa-reply fa-fw"></i>Quick reply</a>
                  <a class="dropdown-item" href="#">
                    <i class="fa fa-history fa-fw"></i>Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">
                    <i class="fa fa-check text-success fa-fw"></i>Resolve Issue</a>
                  <a class="dropdown-item" href="#">
                    <i class="fa fa-times text-danger fa-fw"></i>Close Issue</a>
                </div>
              </div>
            </div>
          </div>
          <div class="row ticket-card mt-3 pb-2 border-bottom pb-3 mb-3">
            <div class="col-md-1">
              <img class="img-sm rounded-circle mb-4 mb-md-0" src="images/faces/face2.jpg" alt="profile image">
            </div>
            <div class="ticket-details col-md-9">
              <div class="d-flex">
                <p class="text-dark font-weight-semibold mr-2 mb-0 no-wrap">Stella :</p>
                <p class="text-primary mr-1 mb-0">[#23135]</p>
                <p class="mb-0 ellipsis">Curabitur aliquet quam id dui posuere blandit.</p>
              </div>
              <p class="text-gray ellipsis mb-2">Pellentesque in ipsum id orci porta dapibus. Sed porttitor lectus nibh. Curabitur non nulla sit amet
                nisl.
              </p>
              <div class="row text-gray d-md-flex d-none">
                <div class="col-4 d-flex">
                  <small class="mb-0 mr-2 text-muted">Last responded :</small>
                  <small class="Last-responded mr-2 mb-0 text-muted">3 hours ago</small>
                </div>
                <div class="col-4 d-flex">
                  <small class="mb-0 mr-2 text-muted">Due in :</small>
                  <small class="Last-responded mr-2 mb-0 text-muted">2 Days</small>
                </div>
              </div>
            </div>
            <div class="ticket-actions col-md-2">
              <div class="btn-group dropdown">
                <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Manage
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">
                    <i class="fa fa-reply fa-fw"></i>Quick reply</a>
                  <a class="dropdown-item" href="#">
                    <i class="fa fa-history fa-fw"></i>Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">
                    <i class="fa fa-check text-success fa-fw"></i>Resolve Issue</a>
                  <a class="dropdown-item" href="#">
                    <i class="fa fa-times text-danger fa-fw"></i>Close Issue</a>
                </div>
              </div>
            </div>
          </div>
          <div class="row ticket-card mt-3">
            <div class="col-md-1">
              <img class="img-sm rounded-circle mb-4 mb-md-0" src="images/faces/face3.jpg" alt="profile image">
            </div>
            <div class="ticket-details col-md-9">
              <div class="d-flex">
                <p class="text-dark font-weight-semibold mr-2 mb-0 no-wrap">John Doe :</p>
                <p class="text-primary mr-1 mb-0">[#23246]</p>
                <p class="mb-0 ellipsis">Mauris blandit aliquet elit, eget tincidunt nibh pulvinar.</p>
              </div>
              <p class="text-gray ellipsis mb-2">Nulla quis lorem ut libero malesuada feugiat. Proin eget tortor risus. Lorem ipsum dolor sit amet.</p>
              <div class="row text-gray d-md-flex d-none">
                <div class="col-4 d-flex">
                  <small class="mb-0 mr-2 text-muted">Last responded :</small>
                  <small class="Last-responded mr-2 mb-0 text-muted">3 hours ago</small>
                </div>
                <div class="col-4 d-flex">
                  <small class="mb-0 mr-2 text-muted">Due in :</small>
                  <small class="Last-responded mr-2 mb-0 text-muted">2 Days</small>
                </div>
              </div>
            </div>
            <div class="ticket-actions col-md-2">
              <div class="btn-group dropdown">
                <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Manage
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">
                    <i class="fa fa-reply fa-fw"></i>Quick reply</a>
                  <a class="dropdown-item" href="#">
                    <i class="fa fa-history fa-fw"></i>Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">
                    <i class="fa fa-check text-success fa-fw"></i>Resolve Issue</a>
                  <a class="dropdown-item" href="#">
                    <i class="fa fa-times text-danger fa-fw"></i>Close Issue</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection