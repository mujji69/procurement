
  <nav class="navbar navbar-expand-md bg-inverse fixed-top scrolling-navbar">
    <div class="container">
      <a href="index.html" class="navbar-brand"><img src="images/landing/logo.png" alt=""></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <i class="lni-menu"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav w-100">
          <li class="nav-item">
            <a class="nav-link page-scroll" href="{{url('/')}}">Home</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link page-scroll" href="#services">About</a>
          </li>

          <li class="nav-item">
            <a class="nav-link page-scroll" href="#contact">Contact</a>
          </li> -->

        </ul>
        <ul class="navbar-nav mr-auto w-100 justify-content-end">
          <li class="nav-item">
            <a class="nav-link page-scroll" href="{{ route('login') }}">Login</a>
          </li>

          <li class="nav-item">
            <a class="btn btn-singin" href="{{ route('register') }}">Register</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
