<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>.SEHATI - Portal Report.</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('favicon.ico')}}" />

    <link rel="stylesheet" href="{{asset('css/backend_css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/backend_css/bootstrap-responsive.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/backend_css/matrix-login.css')}}" />
    <link href="{{asset('fonts/backend_fonts/css/font-awesome.css')}}" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
<div id="loginbox">
    <form method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <div class="form-actions normal_text"> <h3><img src="{{asset('images/backend_images/logo.png')}}" alt="Logo" /></h3></div>

        <div class="control-group">
            <div class="controls">
                <div class="main_input_box{{ $errors->has('email') ? ' has-error' : '' }}">
                    <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" placeholder="NPK" id="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus />
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                </div>
                @if ($errors->has('email'))
                    <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                @endif
                </div>
            </div>

        <div class="control-group">
            <div class="controls">
                <div class="main_input_box{{ $errors->has('password') ? ' has-error' : '' }}">
                    <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" placeholder="Password" id="password" class="form-control" name="password" required />
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div align="center">
            <button class="btn btn-info" type="submit">Login</button>
        </div>
        <div class="form-actions" align="center">
            Copyright © {{date('Y')}} PT. Prawathiya Karsa Pradiptha

        </div>
    </form>
</div>
<script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{asset('vendors/js/vendor.bundle.addons.js')}}"></script>
</body>

</html>