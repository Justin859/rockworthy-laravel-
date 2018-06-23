@extends('layouts.app')

@section('content')
<br />
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Register</div>
                <div class="card-body">
                    <form class="needs-validation" method="POST" action="{{ route('register') }}" novalidate>
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="col">
                                <label for="name">Name</label>

                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                <div class="invalid-tooltip">
                                    Please enter your name
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="col">
                            <label for="email">E-Mail Address</label>

                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            
                                <div class="invalid-tooltip">
                                    Please enter a valid email address
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="col">
                            <label for="password">Password</label>

                            <input id="password" type="password" class="form-control" name="password" onkeyup="passwordStrength()" onfocusout="passwordMatch()" required>

                                <div class="invalid-tooltip">
                                <strong>Password Must:</strong>
                                    <ul>
                                        <li>contain atleast 1 Uppercase, Lowercase, symbol and digit</li>
                                        <li>have a minimum length of 8</li>
                                    </ul>
                                </div>
                        </div>
                        </div>

                        <div class="form-group">
                        <div class="col">

                            <label for="password-confirm">Confirm Password</label>

                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" onkeyup="passwordMatch()" required>

                                <div class="invalid-tooltip">
                                    Passwords do not match
                                </div>
                        </div>    
                        </div>

                        <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
function passwordMatch() {
    var password = document.getElementById('password');
    var password_confirm = document.getElementById('password-confirm');
    
    if (password_confirm.value !== password.value) {
        password_confirm.setCustomValidity("Password does not match");
    } else {
        password_confirm.setCustomValidity("");
    }
}

function passwordStrength() {
    var password = document.getElementById('password');

    if (password.value.match('^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})')) {
        password.setCustomValidity("");
        console.log("strong");
    } else {
        password.setCustomValidity("Password is not strong enough");
        console.log("weak?");
    }
}
(function() {
  'use strict';
  window.addEventListener('load', function() {
    
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');

    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {

        if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
@endsection
