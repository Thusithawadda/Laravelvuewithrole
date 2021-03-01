<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.jqueryui.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/scroller/2.0.3/css/scroller.jqueryui.min.css">
</head>
<body class="sidebar-mini" style="height: 100vh;">
<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="user-panel d-none d-sm-inline-block">
        <div class="image">
          <img src="{{ asset('img/avator.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
      </li> -->
    </ul>
    @auth
    <ul class="navbar-nav" style="margin-left:8px;">
        <spam>{{ auth()->user()->last_name }} </spam>
    </ul>
    @endauth


<!-- Right navbar links -->
    @auth
    <ul class="navbar-nav ml-auto">
        <a href="{{ url('/logout') }}" class="nav-link">
          <p>
            <i class="nav-icon fas fa-power-off"></i>
            Logout
          </p>
        </a>
    </ul>
    @endauth
  </nav>
  <!-- /.navbar -->


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
    <div class="image">
      <img src="{{ asset('img/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    </div>
      <span class="brand-text font-weight-light">Admin</span>
    </a>
    @auth
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ url('/home') }}" class="nav-link">
              <i class="nav-icon fas fa-chalkboard"></i>
              <p>
                  Dashboard
              </p>
            </a>
          </li>
            <li class="nav-item">
                <a href="{{ route('employee.index')  }}" class="nav-link">
                    <i class="nav-icon fas fa-tasks"></i>
                    <p>
                        Employee Management
                    </p>
                </a>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-solar-panel"></i>
                    <p>
                        System Management
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('country.index') }}" class="nav-link">
                            <i class="fas fa-flag nav-icon"></i>
                            <p>Country</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('state.index') }}" class="nav-link">
                            <i class="fas fa-sign nav-icon"></i>
                            <p>State</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('city.index') }}" class="nav-link">
                            <i class="fas fa-city nav-icon"></i>
                            <p>City</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('department.index') }}" class="nav-link">
                            <i class="fas fa-building nav-icon"></i>
                            <p>Department</p>
                        </a>
                    </li>
                </ul>
            </li>
          <li class="nav-item has-treeview">
                <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-cogs"></i>
                    <p>
                        User Management
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('user.index') }}" class="nav-link">
                            <i class="fas fa-users-cog nav-icon"></i>
                            <p>Users</p>
                        </a>
                    </li>
                    @role('admin')
                        <li class="nav-item">
                            <a href="{{ route('role.index') }}" class="nav-link">
                                <i class="fas fa-bomb nav-icon"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('permission.index') }}" class="nav-link">
                                <i class="fas fa-bomb nav-icon"></i>
                                <p>Permissions</p>
                            </a>
                        </li>
                    @endrole
                </ul>
          </li>
            <li class="nav-item">
                <a href="{{ route('userGetPassword') }}" class="nav-link">
                    <i class="fas fa-lock nav-icon"></i>
                    <p>Change Password</p>
                </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    @endauth
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 273px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
              <li class="breadcrumb-item active">@yield('title')</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid">
          @include('partials.alert')
          @yield('content')
        </div>
    </div>
    <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->
  <!-- /.control-sidebar -->
<div id="sidebar-overlay"></div></div>
<!-- ./wrapper -->
@yield('footer')
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.js"></script>


</body>
</html>
