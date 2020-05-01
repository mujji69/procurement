@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('css/util.css')}}">
<link rel="stylesheet" href="{{asset('css/main.css')}}">

<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Log In
					</span>
				</div>

				<form class="login100-form validate-form" method='POST' action="{{ route('login') }}">
          @csrf
					<div class="wrap-input100 validate-input m-b-26">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" >
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m  p-b-30">

							<input class="" type="checkbox" name="remember" id='remember'>
							<label class="pl-1 pr-4" >
								Remember me
							</label>


						<div>
              @if (Route::has('password.request'))
							<a href="{{ route('password.request') }}" class="txt1 pl-5">
								Forgot Password?
							</a>
              @endif
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button type='submit' class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>


@endsection
