<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">

    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Hello, world!</h1>

    @yield('content')

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('vendor/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bower_components/bootstrap/assets/js/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  </body>
</html>