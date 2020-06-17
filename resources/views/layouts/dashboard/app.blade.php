<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Netflixify</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
   {{-- jquery  --}}
  <script src="{{ asset('dashboard_files/js/jquery-3.3.1.min.js') }}"></script>
    <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_files/css/main.css') }}">
  
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  
  {{-- noty --}}
  <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_files/plugins/noty/noty.css') }}">
  <script src="{{ asset('dashboard_files/plugins/noty/noty.min.js') }}"></script>
    <style>
      label{
        font-weight: bold;
      }
      
      @media only screen and (max-width: 600px) {
        .tile{
        overflow-x: scroll;
      }
      }
  
    </style>

    @stack('styles')
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
  <script src="{{ asset('dashboard_files/js/plugins/select2.min.js') }}"></script>

  {{-- movie--}}
  <script src="{{ asset('dashboard_files/js/custom/movie.js') }}"></script>

  <script>

    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  </script>

  
    @include('dashboard.partials._confirm')
  
    <script>
      $('.select2').select2({
        width: '100%'
      });
    </script>


  </body>
</html>