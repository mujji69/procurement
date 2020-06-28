

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		
		<title></title>
		<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">

		<link rel="stylesheet" href="{{asset('css/util.css')}}">
		<link rel="stylesheet" href="{{asset('css/main.css')}}">

	</head>
	<body>
		<div class="bg">


		<div class="p-t-80">
		<div class="text-center">
			<a href="{{url('/')}}">
			<img src="images/landing/logo.png" alt="">
			</a>
		</div>
		<div class="limiter">
				<div class="container-login100">

					<div class="wrap-login100">

						<form class="login100-form validate-form" method='POST' action="{{route('login')}}">
							@csrf
							<span class="login100-form-title p-b-26">
								Sign In
							</span>
							<span class="login100-form-title p-b-48">
								<i class="zmdi zmdi-font"></i>
							</span>

							<div class="wrap-input100 validate-input" data-validate = "Enter correct email">
								<input class="input100" type="text" name="username">
								<span class="focus-input100" data-placeholder="Username"></span>
							</div>

							<div class="wrap-input100 validate-input" data-validate="Enter correct password">
								<span class="btn-show-pass">
									<i class="fas fa-eye"></i>
								</span>
								<input class="input100" type="password" name="password">
								<span class="focus-input100" data-placeholder="Password"></span>
							</div>

							<div class="custom-control custom-checkbox mb-3">
									 <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
									 <label class="custom-control-label" for="remember" style='color:grey;font-weight: normal;'>Remember Me</label>
							</div>


							<div class="container-login100-form-btn pt-4">
								<div class="wrap-login100-form-btn">
									<div class="login100-form-bgbtn"></div>
									<button class="login100-form-btn">
										Login
									</button>
								</div>
								<div class="pt-4">
									@if (Route::has('password.request'))
			                <a class="btn btn-link" href="{{ route('password.request') }}" style='color:#7aa9f0;' >
			                        {{ __('Forgot Your Password?') }}
			                </a>
			           @endif
								</div>

							</div>

							<div class="text-center p-t-80">
								<span class="txt1">
									Don’t have an account?
								</span>

								<a class="txt2" href="{{ route('register') }}">
									Sign Up
								</a>
							</div>
						</form>
					</div>
				</div>
			</div>

		</div>


		</div>



		 <script src="{{asset('js/userLogin.js')}}">
		 </script>


	</body>
</html>
