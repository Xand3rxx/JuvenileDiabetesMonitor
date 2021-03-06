@extends('layouts.app')
@section('title', 'All Patients')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Patients Table</h4>
  
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>S/N</th>
              <th>Avatar</th>
              <th>Full Name</th>
              <th>Profile</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($patientsBioData as $item)
            <tr class="text-info">
              <td>{{ ++$i }}</td>
                <td class="py-1">
                  @if ($item->Avatar == '' || $item->Avatar == 'user_avatar.jpg')
                    <img src="{{ asset('custom/images/user_avatar.jpg') }}" alt="image">                      
                  @else
                    <img src="{{ asset('uploads/'.$item->Avatar) }}" alt="image">
                  @endif                  
                </td>
            <td><a href="{{ route('patientCarePod', $item->Medical_Record_No) }}">{{ $item->First_Name }} {{ $item->Middle_Name }} {{ $item->Last_Name }}</a></td>
                <td><a href="{{ route('patientCarePod', $item->Medical_Record_No) }}"><i class="mdi mdi-eye"></a></td>
              </tr>
            @endforeach
            
          </tbody>
        </table>
      </div>
    <span id="hideOne"><strong>Showing All Patients</strong></span>
    </div>

  </div>
</div>
@endsection