<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"> -->

<link href="https://fonts.googleapis.com/css2?family=Gabriela" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('css/material-kit.css') }}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('css/demo.css') }}" rel="stylesheet" />
  </head>

  <body class="landing-page sidebar-collapse">
    <nav class="navbar fixed-top navbar-expand-lg bg-white" color-on-scroll="100" id="sectionsNav">
      <div class="container">
        <div class="navbar-translate">
          <a class="navbar-brand" href="{{url('/')}}" style="font-family:'Gabriela', serif;font-weight:400;color:#24a0ed; font-size:30px;">
            Procurement</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="navbar-nav ml-auto">
            <li class='nav-item'>
              <a href="{{ route('login') }}" class='pr-5' style='color:#24a0ed;font-size:20px;'>Log In</a>
           </li>

           <li class='nav-item'>
              <a href="{{ route('register') }}" class='btn btn-info btn-round' type="button" name="button" style='font-weight:bold;font-size:20px;text-transform:capitalize;'>register</a>

            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="page-header header-filter" data-parallax="true" style="background-image: url('images/back.jpg')">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h1 class="title">Your Story Starts With Us.</h1>
            <h4>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</h4>
            <br>
            <a href="{{route('register')}}" class="btn btn-info btn-raised btn-lg">
              Register
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="main main-raised">
      <div class="container">
        <div class="section text-center">
          <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
              <h2 class="title">Let&apos;s talk product</h2>
              <h5 class="description">This is the paragraph where you can write more details about your product. Keep you user engaged by providing meaningful information. Remember that by this time, the user is curious, otherwise he wouldn&apos;t scroll to get here. Add a button if you want the user to see more.</h5>
            </div>
          </div>
          <div class="features">
            <div class="row">
              <div class="col-md-4">
                <div class="info">
                  <div class="icon icon-info">
                    <i class="material-icons">chat</i>
                  </div>
                  <h4 class="info-title">Free Chat</h4>
                  <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="info">
                  <div class="icon icon-success">
                    <i class="material-icons">verified_user</i>
                  </div>
                  <h4 class="info-title">Verified Users</h4>
                  <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="info">
                  <div class="icon icon-danger">
                    <i class="material-icons">fingerprint</i>
                  </div>
                  <h4 class="info-title">Fingerprint</h4>
                  <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="section text-center">
          <h2 class="title">Here is our team</h2>
          <div class="team">
            <div class="row">
              <div class="col-md-4">
                <div class="team-player">
                  <div class="card card-plain">
                    <div class="col-md-6 ml-auto mr-auto">
                      <img src="../assets/img/faces/avatar.jpg" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                    </div>
                    <h4 class="card-title">Gigi Hadid
                      <br>
                      <small class="card-description text-muted">Model</small>
                    </h4>
                    <div class="card-body">
                      <p class="card-description">You can write here details about one of your team members. You can give more details about what they do. Feel free to add some
                        <a href="#">links</a> for people to be able to follow them outside the site.</p>
                    </div>
                    <div class="card-footer justify-content-center">
                      <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-twitter"></i></a>
                      <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-instagram"></i></a>
                      <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-facebook-square"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="team-player">
                  <div class="card card-plain">
                    <div class="col-md-6 ml-auto mr-auto">
                      <img src="../assets/img/faces/christian.jpg" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                    </div>
                    <h4 class="card-title">Christian Louboutin
                      <br>
                      <small class="card-description text-muted">Designer</small>
                    </h4>
                    <div class="card-body">
                      <p class="card-description">You can write here details about one of your team members. You can give more details about what they do. Feel free to add some
                        <a href="#">links</a> for people to be able to follow them outside the site.</p>
                    </div>
                    <div class="card-footer justify-content-center">
                      <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-twitter"></i></a>
                      <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-linkedin"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="team-player">
                  <div class="card card-plain">
                    <div class="col-md-6 ml-auto mr-auto">
                      <img src="../assets/img/faces/kendall.jpg" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                    </div>
                    <h4 class="card-title">Kendall Jenner
                      <br>
                      <small class="card-description text-muted">Model</small>
                    </h4>
                    <div class="card-body">
                      <p class="card-description">You can write here details about one of your team members. You can give more details about what they do. Feel free to add some
                        <a href="#">links</a> for people to be able to follow them outside the site.</p>
                    </div>
                    <div class="card-footer justify-content-center">
                      <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-twitter"></i></a>
                      <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-instagram"></i></a>
                      <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-facebook-square"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="section section-contacts">
          <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
              <h2 class="text-center title">Work with us</h2>
              <h4 class="text-center description">Divide details about your product or agency work into parts. Write a few lines about each one and contact us about any further collaboration. We will responde get back to you in a couple of hours.</h4>
              <form class="contact-form">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Your Name</label>
                      <input type="email" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Your Email</label>
                      <input type="email" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleMessage" class="bmd-label-floating">Your Message</label>
                  <textarea type="email" class="form-control" rows="4" id="exampleMessage"></textarea>
                </div>
                <div class="row">
                  <div class="col-md-4 ml-auto mr-auto text-center">
                    <button class="btn btn-primary btn-raised">
                      Send Message
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer footer-default">
      <div class="container">
        <nav class="float-left">
          <ul>
            <li>
              <a href="https://www.creative-tim.com">
                Creative Tim
              </a>
            </li>
            <li>
              <a href="https://creative-tim.com/presentation">
                About Us
              </a>
            </li>
            <li>
              <a href="http://blog.creative-tim.com">
                Blog
              </a>
            </li>
            <li>
              <a href="https://www.creative-tim.com/license">
                Licenses
              </a>
            </li>
          </ul>
        </nav>
        <div class="copyright float-right">
          &copy;
          <script>
            document.write(new Date().getFullYear())
          </script>, made with <i class="material-icons">favorite</i> by
          <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
        </div>
      </div>
    </footer>
    <!--   Core JS Files   -->
    <!-- <script src="../assets/js/core/jquery.min.js" type="text/javascript"></script> -->
    <!-- <script src="../assets/js/core/popper.min.js" type="text/javascript"></script> -->
    <script src="{{asset('js/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
    <!-- <script src="../assets/js/plugins/moment.min.js"></script> -->
    <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
    <!-- <script src="../assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script> -->
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <!-- <script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script> -->
    <!--  Google Maps Plugin    -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
    <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
    <script src="{{asset('js/material-kit.js')}}" type="text/javascript"></script>
  </body>

  </html>
