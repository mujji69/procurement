<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">


  <title>Admin</title>

  <link rel='stylesheet' href="{{asset('css/app.css')}}">
  <script src="{{asset('js/app.js')}}">

  </script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

   <!-- <link rel='stylesheet' href="{{asset('css/all.css')}}">
   <link rel='stylesheet' href="{{asset('css/all.min.css')}}">
   <link rel='stylesheet' href="{{asset('css/fontawesome.css')}}">  -->


    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"> -->


  <!-- Font Awesome Icons -->
  <!-- <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css"> -->
  <!-- Theme style -->
  <!-- <link rel="stylesheet" href="dist/css/adminlte.min.css"> -->
  <!-- Google Font: Source Sans Pro -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
<style media="screen">
  body{
    background-color: white;

  }
  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

  /* Firefox */
  input[type=number] {
    -moz-appearance: textfield;
  }

</style>
@stack('styles')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('admin')}}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->username }} <span class="caret"></span>
          </a>

          <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown">

              <a class="dropdown-item" href="{{ route('admin.logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  <i class='fas fa-power-off pr-2'></i>Logout
              </a>

              <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </div>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">

      <span class="brand-text font-weight-light">Admin</span>
    </a>



    <!-- Sidebar -->
    <div class="sidebar">


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Tenders
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item has-treeview @if(Request::is('admin/tender') || Request::is('admin/tender/closed') || Request::is('admin/tender/inprogress')) menu-open @endif">
                <a href="" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>
                  View Tenders
                  <i class="right fas fa-angle-left"></i>

                  </p>
                </a>

                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('admin.tender.index') }}" class="nav-link">
                      <i class="fas fa-spinner nav-icon"></i>
                      <p>Active</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('admin.closed') }}" class="nav-link">
                      <i class="fas fa-check nav-icon"></i>
                      <p>Closed</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('admin.inprogress') }}" class="nav-link">
                      <i class="fas fa-tools nav-icon"></i>
                      <p>In Progress</p>
                    </a>
                  </li>

              </ul>

              </li>
              <li class="nav-item">
                <a href="{{ route('admin.tender.create') }}" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Add New Tender</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('formbuilder::forms.index') }}" class="nav-link">
                  <i class="fas fa-file-invoice nav-icon"></i>
                  <p>Form Templates</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('draft') }}" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Draft</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.showInvoices') }}" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Invoices</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <hr style='border:1px solid white'>

            <a href="{{ route('vendors') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Registered Vendors
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <main class="py-4" style='background-color:white;'>
            @yield('content')
        </main>

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<!-- <script src="plugins/jquery/jquery.min.js"></script> -->
<!-- Bootstrap 4 -->
<!-- <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<!-- AdminLTE App -->
<!-- <script src="dist/js/adminlte.min.js"></script> -->
<!-- <script src="{{asset('js/app.js')}}"></script> -->
 <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<!-- datatables -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
   <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
   <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
   <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
   <script src="https://cdn.datatables.net/select/1.3.0/js/select.dataTables.min.js"></script>
   <script>
       $(document).ready(function() {
           $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, { className: 'btn' })
           $('#myTable, #myTable1, #myTable2').DataTable();
           $('#buttonsTable').DataTable({
               dom: 'Bfrtip', //Agar kitne display honey chahiye wala option chahiye toh isko "Bflrtip" krdena
               buttons: [
                   { extend: 'copy', className:'btn-default'},
                   { extend: 'pdf', className: 'btn-danger'},
                   { extend: 'excel', className: 'btn-success'},
                   { extend: 'csv', className: 'btn-success'}
               ]
           });
       });
   </script>
<!-- end -->
@stack('scripts')
</body>
</html>
