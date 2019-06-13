@extends('layouts.app')
@section('title', 'Settings')
@section('content')
@include('partials._messages')
@foreach ($collection as $item)
@endforeach
<div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body">
      <h2 >Manage Profile</h2>
      <form class="form-sample" action="{{ route('update-physician') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

        <h4 class="card-description">
          Personal info
        </h4>
        <div class="row">
            <input type="text" name="Physician_ID" value="{{ $item->Physician_ID }}" class="form-control d-none">
            <input type="text" name="id" value="{{ $item->id }}" class="form-control d-none">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">First Name</label>
              <div class="col-sm-9">
              <input type="text" name="First_Name" value="{{ $item->First_Name }}" class="form-control">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Middle Name</label>
              <div class="col-sm-9">
                <input type="text" name="Middle_Name" value="{{ $item->Middle_Name }}" class="form-control">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Last Name</label>
              <div class="col-sm-9">
                <input type="text" name="Last_Name" value="{{ $item->Last_Name }}" class="form-control">
              </div>
            </div>
          </div>
          <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Phone No.</label>
                <div class="col-sm-9">
                  <input type="text" name="Mobile_No" value="{{ $item->Mobile_No }}" class="form-control">
                </div>
              </div>
            </div>
        </div>
        
        <div class="row">
            
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Gender</label>
              <div class="col-sm-9">
                <select class="form-control" name="Gender">
                  <option value="Female">Female</option>
                  <option value="Male">Male</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Upload Avatar</label>
              <div class="col-sm-9">
                {{-- <input class="form-control"> --}}
                <input style="border: 0px;" name="Avatar" type="file" value="{{ $item->Avatar }}" id="Avatar" data-sn="1" class="form-control file-upload-info" accept="image/*">
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <button class="btn btn-primary submit-btn btn-block">Update Profile</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection