<!DOCTYPE html>
<html>
<head>
	<title>UltrasBOT</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link href="{{ asset('public/css/login.css') }}" rel="stylesheet">
</head>
<body>

	<div class="sidenav">
	     <div class="login-main-text">
	        <h2>Application<br> Login Page</h2>
	        <p>Login or register from here to access.</p>
	     </div>
	  </div>
	  <div class="main">
	     <div class="col-md-6 col-sm-12" style="margin-top: -40%">
	        <div class="login-form">
	           <img src="{{'http://localhost/messenger/public/images/main-logo.png'}}">
	           <form method="POST" action="{{ route('login') }}">

	           	@csrf

	              <div class="form-group">

	                 <label>{{ __('E-Mail Address') }}</label>
	                 <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

	                 @error('email')
	                     <span class="invalid-feedback" role="alert">
	                         <strong>{{ $message }}</strong>
	                     </span>
	                 @enderror

	              </div>

	              <div class="form-group">

	                 <label>{{ __('Password') }}</label>

	                 <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

	                 @error('password')
	                     <span class="invalid-feedback" role="alert">
	                         <strong>{{ $message }}</strong>
	                     </span>
	                 @enderror
	                 
	              </div>

	              <button type="submit" id="login" class="btn btn-black">Login</button>
	              <!-- <button type="submit" class="btn btn-secondary">Register</button> -->

	              <p style="margin-left:265px">OR</p>
                  <br />
                  <div class="form-group">
                      <div class="col-md-8 col-md-offset-4 text-center">
                        <a href="{{url('/redirect')}}" class="btn btn-primary">Login with Facebook</a>
                      </div>
                  </div>
                  
	           </form>
	        </div>
	     </div>
	  </div>

</body>
</html>