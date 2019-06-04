@extends('layouts.app')
@section('title', 'Patient Messages')
@section('content')
@foreach ($patientProfile as $profile)
    
@endforeach

<div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
            
          <h5 class="card-title mb-4">Manage Messages</h5>
          <div class="fluid-container">
            @if ($messageCount > 0)
            @foreach ($patientMessage as $item)
            <div class="row ticket-card mt-3 pb-2 border-bottom pb-3 mb-3">
                <div class="col-md-1">
                    @if ($profile->Avatar == '' || $profile->Avatar == 'user_avatar.jpg')
                    <img class="img-sm rounded-circle mb-4 mb-md-0" src="{{ asset('custom/images/user_avatar.jpg') }}" alt="image">                      
                    @else
                      <img class="img-sm rounded-circle mb-4 mb-md-0" src="{{ asset('uploads/'.$profile->Avatar) }}" alt="image">
                    @endif
                  {{-- <img class="img-sm rounded-circle mb-4 mb-md-0" src="images/faces/face1.jpg" alt="profile image"> --}}
                </div>
                <div class="ticket-details col-md-9">
                  <div class="d-flex">
                    <p class="text-dark font-weight-semibold mr-2 mb-0 no-wrap">{{ $profile->First_Name}} {{ $profile->Last_Name }}:</p>
                  <p class="text-primary mr-1 mb-0 msgTitle" data-title="{{ $item->Message_Title }}">{{ $item->Message_Title }}</p>
                    {{-- <p class="mb-0 ellipsis">Donec rutrum congue leo eget malesuada.</p> --}}
                  </div>
                  <p class="text-gray ellipsis mb-2" data-toggle="tooltip" data-placement="bottom" title="{{ $item->Message_Body }}">{{ $item->Message_Body }}
                  </p>
                  <div class="row text-gray d-md-flex d-none">
                      <div class="col-4 d-flex">
                        <small class="mb-0 mr-2 text-muted text-muted">Recieved :</small>
                        <small class="Last-responded mr-2 mb-0 text-muted text-muted">
                          <?php
                            $time = \Carbon\Carbon::parse($item->SentDate, 'UTC');
                            echo $time->isoFormat('MMMM Do YYYY, h:mm:ssa');
                          ?>  
                        </small>
                      </div>
                      <div class="col-4 d-flex">
                        <small class="mb-0 mr-1 text-muted text-muted">Replied :</small>
                        <small class="Last-responded mr-2 mb-0 text-muted text-muted">
                          @if ($item->Message_Body == 1)
                              Yes
                          @else
                              No
                          @endif
                        </small>
                      </div>
                    </div>
                  
                </div>
                <div class="ticket-actions col-md-2">
                  {{-- <div class="btn-group"> --}}
                    <button type="button" class="btn btn-success btn-sm show-modal-example" >
                        <i class="fa fa-reply fa-fw"></i>Reply
                    </button>                   
                  {{-- </div> --}}
                </div>
              </div>
            @endforeach
            @else
              <p class="text-danger font-weight-semibold mr-2 mb-0 no-wrap"> Sorry! No messages from {{ $profile->First_Name}} {{ $profile->Last_Name }}</p>
            @endif
           
          </div>
        </div>
      </div>
    </div>
  </div>

  <dialog class="mdl-dialog" role="dialog" id="modal-example">
      <div class="mdl-dialog__content">
          <div class="card">
              <div class="card-body">
                {{-- <h4 class="card-title">Default form</h4>
                <p class="card-description">
                  Basic form layout
                </p> --}}
                <form class="forms-sample">
                  <div class="form-group">
                    <label for="Message_Title">Title</label>
                  <input type="text" class="form-control" name="Message_Title" id="Message_Title" value="">
                  </div>
                  <div class="form-group">
                    <label for="Message_Body">Message</label>
                    <textarea class="form-control" name="Message_Body" id="Message_Body" rows="4"></textarea>
                  </div>
                  <button type="submit" class="btn btn-success mr-2">Submit</button>
                  <button class="btn btn-light close-modal-example">Cancel</button>
                </form>
              </div>
            </div>
      </div>
      {{-- <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
          <button type="button" class="mdl-button">Close</button>
          <button type="button" class="mdl-button" disabled>Inactive action</button>
      </div> --}}
  </dialog>

 
  
@endsection