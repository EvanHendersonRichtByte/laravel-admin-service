<!DOCTYPE html>
<html lang="en">
<head>

  <title>Servis Kendaraan Online</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="{{ url('bootstrap\images\icons\favicon.ico') }}"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ url('bootstrap\css\bootstrap.min.css') }}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ url('bootstrap\css\font-awesome.min.css') }}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ url('bootstrap\fonts\Linearicons-Free-v1.0.0\icon-font.min.css') }}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ url('bootstrap\vendor\animate\animate.css') }}">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="{{ url('bootstrap\vendor\css-hamburgers\hamburgers.min.css') }}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ url('bootstrap\vendor\animsition/css\animsition.min.css') }}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ url('bootstrap\vendor\select2\select2.min.css') }}">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="{{ url('bootstrap\vendor\daterangepicker\daterangepicker.css') }}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ url('bootstrap\css\util.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ url('bootstrap\css\main.css') }}">
<!--===============================================================================================-->
</head>
<body >
  <!-- style="background-image: url('https://images8.alphacoders.com/380/thumb-1920-380977.jpg'); padding-right: 1200px;" -->
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100 p-t-50 p-b-90">
        <form class="login100-form validate-form flex-sb flex-w" style="margin-top: 30px; background-color: transparent;" method="post" action ="{{url('check_login')}}">
          {{ csrf_field() }}
          <span class="login100-form-title p-b-51" method="post">
            login
          </span>

          
          <div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required">
            <input class="input100" type="text" name="username" placeholder="Username">
            <span class="focus-input100"></span>
          </div>
          
          
          <div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
            <input class="input100" type="password" name="password" placeholder="Password">
            <span class="focus-input100"></span>
          </div>
          
          <div class="flex-sb-m w-full p-t-3 p-b-24">
            <div class="contact100-form-checkbox">
              <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
              <label class="label-checkbox100" for="ckb1">
                Remember me
              </label>
            </div>

            <div>
              <a href="#" class="txt1">
                Forgot?
              </a>
            </div>
          </div>

          <div class="container-login100-form-btn m-t-17">
            <button type="submit" class="login100-form-btn">
              Login
            </button>
          </div>

        </form>
      </div>
    </div>
  </div>
  

  <div id="dropDownSelect1"></div>
  
<!--===============================================================================================-->
  <script src="{{ url('bootstrap\vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
  <script src="{{ url('bootstrap\vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
  <script src="{{ url('bootstrap\vendor/bootstrap/js/popper.js') }}"></script>
  <script src="{{ url('bootstrap\vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
  <script src="{{ url('bootstrap\vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
  <script src="{{ url('bootstrap\vendor/daterangepicker/moment.min.js') }}"></script>
  <script src="{{ url('bootstrap\vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
  <script src="{{ url('bootstrap\vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
  <script src="{{ url('bootstrap\js/main.js') }}"></script>

</body>
</html>