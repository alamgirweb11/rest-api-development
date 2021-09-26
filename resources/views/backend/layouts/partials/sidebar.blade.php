<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/home') }}">
      <div class="sidebar-brand-icon">
        <img src="{{ asset('backend/img/logo/logo2.png') }}">
      </div>
      <div class="sidebar-brand-text mx-3">RuangAdmin</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
      <a class="nav-link" href="{{ url('/home') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
      Features
    </div>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
        aria-expanded="true" aria-controls="collapseBootstrap">
        <i class="far fa-fw fa-window-maximize"></i>
        <span>Dropdown</span>
      </a>
      <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="#">Users</a>
          <a class="collapse-item" href="#">Role</a>
          <a class="collapse-item" href="#">Dropdowns</a>
          <a class="collapse-item" href="#">Modals</a>
        </div>
      </div>
    </li>

    <hr class="sidebar-divider"> 
    <div class="sidebar-heading">
      Role Permission
    </div>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('users') }}">
        <i class="fas fa-users"></i>
        <span>Users</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="fas fa-user-lock"></i>
        <span>Role</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="fa fa-lock"></i>
        <span>Permission</span>
      </a>
    </li>
    {{-- <hr class="sidebar-divider">
    <div class="version" id="version-ruangadmin"></div> --}}
  </ul>