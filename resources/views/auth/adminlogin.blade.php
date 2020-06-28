<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Admin</title>

    <!-- Bootstrap core CSS -->
    <!-- <link href="../../dist/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Custom styles for this template -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    <link href="{{asset('css/admin_login.css')}}" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" method="POST" action="{{ route('adminlogin') }}">
      @csrf
      <img class="mb-4" src="{{asset('images/unauthorized-person.png')}}" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="text" id="inputEmail" class="form-control" placeholder="Username" name='username' required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" name='password' required>
      <!-- <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div> -->
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

    </form>
  </body>
</html>
