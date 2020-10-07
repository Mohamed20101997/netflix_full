<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Netflixify </title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- main bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- fontawesome -->
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('css/vendor.min.css') }}">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,500,700&display=swap" rel="stylesheet">
    <!-- main css -->
        <link rel="stylesheet" href="{{ asset('css/main.min.css') }}">

    <style>

          .fw-900{
              font-weight: 900;
          }
    </style>
</head>
<body>

    @yield('content')

<!-- jquery  -->
<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<!-- bootstrap  -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- vendor js  -->
<script src="{{ asset('js/vendor.min.js') }}"></script>
<!-- main  -->
<script src="{{ asset('js/main.min.js') }}"></script>

<!-- play  -->
<script src="{{ asset('js/playerjs.js') }}"></script>

<!-- custom  -->
<script src="{{ asset('js/custom/movie.js') }}"></script>

<script>

    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  </script>
@stack('scripts')

<script>
    $(document).ready(function(){
        $("#banner .movies").owlCarousel({
            loop:true,
            nav:true,
            items:1,
            dots:false,
        });

        $("#listing .movies").owlCarousel({
            loop:true,
            nav:false,
            stagePadding: 50,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                900:{
                    items:3
                },
                1000:{
                    items:4
                },
            },
            dots:false,
            margin:15,

        });
    });
</script>

</body>
</html>
