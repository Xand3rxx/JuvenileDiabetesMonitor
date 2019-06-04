
{{-- {{ $user->pluck('user_type')->flatten() }} --}}
{{-- {{ dd($user)}} --}}

@foreach ($user as $item)     
@endforeach 
{{-- {{ $user_type }} --}}
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <div class="nav-link">
        <div class="user-wrapper">
          <div class="profile-image">
              @if ($item->Avatar == '' || $item->Avatar == 'user_avatar.jpg')
              <img src="{{ asset('custom/images/user_avatar.jpg') }}" alt="image">                      
              @else
                <img src="{{ asset('uploads/'.$item->Avatar) }}" alt="image">
              @endif
            {{-- <img src="{{ asset('custom/images/faces/face1.jpg') }}" alt="profile image"> --}}
          </div>
          <div class="text-wrapper">
            <p class="profile-name">{{ $item->First_Name }} {{ $item->Last_Name }}</p>
            <div>
              <small class="designation text-muted">{{ $item->user_type }}</small>
              <span class="status-indicator online"></span>
            </div>
          </div>
        </div>
       
      </div>
    </li>
    @if ($item->user_type == 'Physician')
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/physician') }}">
          <i class="menu-icon mdi mdi-television"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="{{ url('physician-all-patients') }}">
          <i class="menu-icon mdi mdi-account-multiple"></i>
          <span class="menu-title">All Patitents</span>
        </a>
      </li>
  
      
      <li class="nav-item">
        <a class="nav-link" href="{{ url('physician-appointment') }}">
          <i class="menu-icon mdi mdi-clipboard-text"></i>
          <span class="menu-title">Appointment</span>
        </a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="{{ url('physician-settings') }}">
          <i class="menu-icon mdi mdi-settings"></i>
          <span class="menu-title">Settings</span>
        </a>
      </li>
    @else
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/patient') }}">
          <i class="menu-icon mdi mdi-television"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('patient-settings') }}">
          <i class="menu-icon mdi mdi-settings"></i>
          <span class="menu-title">Settings</span>
        </a>
      </li>    
    @endif
    <li class="nav-item">
      <a class="nav-link" href="{{ route('logout') }}">
          <i class="menu-icon mdi mdi-logout"></i>
          <span class="menu-title">Sign Out</span>
        </a>
      </li>
  </ul>
</nav>

