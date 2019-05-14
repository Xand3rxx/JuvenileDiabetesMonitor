@extends('layouts.app')
@section('title', 'Settings')
@section('content')
<div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body">
      <h2 >Manage Profile</h2>
      <form class="form-sample">
        <h4 class="card-description">
          Personal info
        </h4>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">First Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Middle Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Last Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Gender</label>
              <div class="col-sm-9">
                <select class="form-control">
                  <option value="Female">Female</option>
                  <option value="Male">Male</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Date of Birth</label>
              <div class="col-sm-9">
                <input class="form-control" placeholder="dd/mm/yyyy">
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