<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  
  <!-- Brand Logo -->
  <a href="/admin" class="brand-link">
    <div class="d-flex">
      <img class="mx-auto" src="/dist/img/spm-logo.png" alt="SPM Logo" style="max-width: 150px;">
    </div>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="/dist/img/default.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline d-none">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="/admin/dashboard" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        {{-- @if (auth()->user()->role=="mitra")
        <li class="nav-item">
          <a href="/admin/mylogbook" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>My Logbook</p>
          </a>
        </li>
        @endif --}}
        @if (auth()->user()->role=="admin")
        <li class="nav-item">
          <a href="/admin/book" class="nav-link">
            <i class="nav-icon fa fa-file-contract"></i>
            <p>Data Arsip</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/admin/rack" class="nav-link">
            <i class="nav-icon fa fa-archive"></i>
            <p>Data Rak</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/admin/user" class="nav-link">
            <i class="nav-icon fa fa-user"></i>
            <p>Pengaturan User</p>
          </a>
        </li>
        @endif
        <li class="nav-item d-none">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dropdown <i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="../../index.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v1</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../index2.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v2</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../index3.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v3</p>
              </a>
            </li>
          </ul>
        </li>
       
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
    <div class="d-flex mt-2">

      <a href="/logout" class="btn btn-danger mx-auto">
        Logout
      </a>
    </div>
    

  </div>
  <!-- /.sidebar -->
</aside>