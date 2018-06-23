<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <title>Admin</title>
  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Admin</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">+ Add User</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
        Logout
      </a>
      </li>
    </ul>  
    <form id="logout-form" class="form-inline my-2 my-lg-0" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
  </div>
</nav>
<br />
<div class="container-fuild">
  <div class="row">
    <div class="col col-md-3">
      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-link active" href="#v-pills-home" role="tab" aria-selected="false">Home</a>
        <a class="nav-link" id="v-pills-profile-tab" href="#0" role="tab" aria-selected="false">Events</a>
        <a class="nav-link" id="v-pills-messages-tab" href="#0" role="tab" aria-selected="false">Blog</a>
        <a class="nav-link" id="v-pills-settings-tab" href="#0" role="tab" aria-selected="false">Users</a>
      </div>
    </div>
    <div class="col col-md-9">
      @yield('content')
    </div>
    </div>
  </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('vendor/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bower_components/bootstrap/assets/js/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  </body>
</html>