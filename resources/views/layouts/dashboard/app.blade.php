<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Netflixfy</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_files/css/main.css') }}">

  {{-- jquery  --}}
  <script src="{{ asset('dashboard_files/js/jquery-3.3.1.min.js') }}"></script>
  
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  
  {{-- noty --}}
  <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_files/plugins/noty/noty.css') }}">
  <script src="{{ asset('dashboard_files/plugins/noty/noty.min.js') }}"></script>

  


    <style>
      label{
        font-weight: bold;
      }
    </style>
  </head>
  <body class="app sidebar-mini">

    @include('layouts.dashboard._header')

    @include('layouts.dashboard._aside')
    
    <main class="app-content">
      
      @include('dashboard.partials._sessions')
      
      @yield('content')
      
    </main>
    
   

    <!-- Essential javascripts for application to work-->
  
  <script src="{{ asset('dashboard_files/js/popper.min.js') }}"></script>
  <script src="{{ asset('dashboard_files/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('dashboard_files/js/main.js') }}"></script>
  {{-- select2--}}
  <script src="{{ asset('dashboard_files/plugins/select2/select2.min.js') }}"></script>
  
    @include('dashboard.partials._confirm')
  
    <script>
      $('.select2').select2({
        width: '100%'
      });
    </script>
  </body>
</html>