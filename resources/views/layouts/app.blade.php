<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="/admin/assets/images/favicon.ico">

    <!-- DataTables -->
    <link href="/admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="/admin/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="/admin/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="/admin/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="/admin/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <link href="/admin/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="/admin/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="/admin/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
    <link href="/admin/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link href="/admin/assets/css/custom.css" id="app-style" rel="stylesheet" type="text/css" />

     @stack('css')

</head>
<body data-layout="detached" data-topbar="colored">

    {{-- <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner-chase">
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
            </div>
        </div>
    </div> --}}

<div class="container-fluid">
    <div id="layout-wrapper">

@include('layouts.header')

@include('layouts.sidebar')

@yield('content')
  
    </div>
</div>

      <div class="rightbar-overlay"></div>

      <!-- JAVASCRIPT -->
      <script src="/admin/assets/libs/jquery/jquery.min.js"></script>
      <script src="/admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="/admin/assets/libs/metismenu/metisMenu.min.js"></script>
      <script src="/admin/assets/libs/simplebar/simplebar.min.js"></script>
      <script src="/admin/assets/libs/node-waves/waves.min.js"></script>
  
      <!-- apexcharts -->
      <script src="/admin/assets/libs/apexcharts/apexcharts.min.js"></script>
      <script src="/admin/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
      <!-- jquery.vectormap map -->
      <script src="/admin/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
      <script src="/admin/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js"></script>
  
      <script src="/admin/assets/js/pages/dashboard.init.js"></script>
      
     <script src="/admin/assets/libs/select2/js/select2.min.js"></script>

    <script src="/admin/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/admin/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/admin/assets/js/pages/datatables.init.js"></script>
    <script src="/admin/assets/js/pages/form-advanced.init.js"></script>
    <script src="/admin/assets/js/app.js"></script>

    @include('sweetalert::alert')
    @stack('js')
</body>
</html>
