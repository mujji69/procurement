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


    <link rel="shortcut icon" href="/images/img/2.png" type="image/png">
       <!-- Bootstrap CSS -->
       <link rel="stylesheet" href="{{asset('css/landing/animate.css')}}">
       <link rel="stylesheet" href="{{asset('css/landing/LineIcons.css')}}">
       <link rel="stylesheet" href="{{asset('css/landing/owl.carousel.css')}}">
       <link rel="stylesheet" href="{{asset('css/landing/owl.theme.css')}}">
       <link rel="stylesheet" href="{{asset('css/landing/magnific-popup.css')}}">
       <link rel="stylesheet" href="{{asset('css/landing/nivo-lightbox.css')}}">
       <link rel="stylesheet" href="{{asset('css/landing/main.css')}}">
       <link rel="stylesheet" href="{{asset('css/landing/responsive.css')}}">

     </head>

     <body>

       <!-- Header Section Start -->
       <header id="home" class="hero-area">
         <div class="overlay">
           <span></span>
           <span></span>
         </div>
         <nav class="navbar navbar-expand-md bg-inverse fixed-top scrolling-navbar">
           <div class="container">
             <a href="index.html" class="navbar-brand"><img src="images/landing/logo.png" alt=""></a>
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
               <i class="lni-menu"></i>
             </button>
             <div class="collapse navbar-collapse" id="navbarCollapse">
               <ul class="navbar-nav w-100">
                 <li class="nav-item">
                   <a class="nav-link page-scroll" href="#home">Home</a>
                 </li>
                 <li class="nav-item">
                   <a class="nav-link page-scroll" href="#services">About</a>
                 </li>

                 <li class="nav-item">
                   <a class="nav-link page-scroll" href="#contact">Contact</a>
                 </li>

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
         <div class="container">
           <div class="row space-100">
             <div class="col-lg-6 col-md-12 col-xs-12">
               <div class="contents">
                 <h2 class="head-title">Your Story Starts With Us</h2>
                 <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                 <div class="header-button">
                   <a href="{{route('register')}}" class="btn btn-border-filled">Register</a>
                   <!-- <a href="https://rebrand.ly/slick-ud" rel="nofollow" target="_blank" class="btn btn-border page-scroll">Learn More</a> -->
                 </div>
               </div>
             </div>
             <!-- <div class="col-lg-6 col-md-12 col-xs-12 p-0">
               <div class="intro-img">
                 <img src="images/landing/intro.png" alt="">
               </div>
             </div> -->
           </div>
         </div>
       </header>
       <!-- Header Section End -->



       <!-- Contact Us Section -->
       <section id="contact" class="section">
         <!-- Container Starts -->
         <div class="container">
           <!-- Start Row -->
           <div class="row">
             <div class="col-lg-12">
               <div class="contact-text section-header text-center">
                 <div>
                   <h2 class="section-title">Get In Touch</h2>

                 </div>
               </div>
             </div>

           </div>
           <!-- End Row -->
           <!-- Start Row -->
           <div class="row">
             <!-- Start Col -->
             <div class="col-lg-6 col-md-12">
             <form id="contactForm">
               <div class="row">
                 <div class="col-md-6">
                   <div class="form-group">
                     <input type="text" class="form-control" id="name" name="name" placeholder="Name" required data-error="Please enter your name">
                     <div class="help-block with-errors"></div>
                   </div>
                 </div>
                 <div class="col-md-6">
                   <div class="form-group">
                     <input type="text" placeholder="Subject" id="msg_subject" class="form-control" name="msg_subject" required data-error="Please enter your subject">
                     <div class="help-block with-errors"></div>
                   </div>
                 </div>
                 <div class="col-md-6">
                   <div class="form-group">
                     <input type="text" class="form-control" id="email" name="email" placeholder="Email" required data-error="Please enter your Email">
                     <div class="help-block with-errors"></div>
                   </div>
                 </div>
                 <div class="col-md-6">
                   <div class="form-group">
                     <input type="text" placeholder="Budget" id="budget" class="form-control" name="budget" required data-error="Please enter your Budget">
                     <div class="help-block with-errors"></div>
                   </div>
                 </div>
                 <div class="col-md-12">
                   <div class="form-group">
                     <textarea class="form-control" id="message"  name="message" placeholder="Write Message" rows="4" data-error="Write your message" required></textarea>
                     <div class="help-block with-errors"></div>
                   </div>
                   <div class="submit-button">
                     <button class="btn btn-common" id="submit" type="submit">Submit</button>
                     <div id="msgSubmit" class="h3 hidden"></div>
                     <div class="clearfix"></div>
                   </div>
                 </div>
               </div>
             </form>
             </div>
             <!-- End Col -->
             <!-- Start Col -->
             <div class="col-lg-1">

             </div>
             <!-- End Col -->
             <!-- Start Col -->
             <div class="col-lg-4 col-md-12">
               <div class="contact-img">
                 <img src="images/landing/contact/01.png" class="img-fluid" alt="">
               </div>
             </div>
             <!-- End Col -->
             <!-- Start Col -->
             <div class="col-lg-1">
             </div>
             <!-- End Col -->

           </div>
           <!-- End Row -->
         </div>
       </section>
       <!-- Contact Us Section End -->

       <!-- Footer Section Start -->
       <footer>
         <!-- Footer Area Start -->
         <section id="footer-Content">
           <div class="container">
             <!-- Start Row -->
             <div class="row">

             <!-- Start Col -->
               <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 col-mb-12">

                 <div class="footer-logo">
                  <img src="images/landing/footer-logo.png" alt="">
                 </div>
               </div>
                <!-- End Col -->
                 <!-- Start Col -->
               <div class="col-lg-2 col-md-6 col-sm-6 col-xs-6 col-mb-12">
                 <div class="widget">
                   <h3 class="block-title">Company</h3>
                   <ul class="menu">
                     <li><a href="#">  - About Us</a></li>
                     <li><a href="#">- Career</a></li>
                     <li><a href="#">- Blog</a></li>
                     <li><a href="#">- Press</a></li>
                   </ul>
                 </div>
               </div>
                <!-- End Col -->
                 <!-- Start Col -->
               <div class="col-lg-2 col-md-6 col-sm-6 col-xs-6 col-mb-12">
                 <div class="widget">
                   <h3 class="block-title">Product</h3>
                   <ul class="menu">
                     <li><a href="#">  - Customer Service</a></li>
                     <li><a href="#">- Enterprise</a></li>
                     <li><a href="#">- Price</a></li>
                     <li><a href="#">- Scurity</a></li>
                     <li><a href="#">- Why SLICK?</a></li>
                   </ul>
                 </div>
               </div>
                <!-- End Col -->
                 <!-- Start Col -->
               <!-- End Col -->
             </div>
             <!-- End Row -->
           </div>
           <!-- Copyright Start  -->

           <div class="copyright">
             <div class="container">
               <!-- Star Row -->
               <div class="row">
                 <div class="col-md-12">
                   <div class="site-info text-center">

                   </div>

                 </div>
                 <!-- End Col -->
               </div>
               <!-- End Row -->
             </div>
           </div>
         <!-- Copyright End -->
         </section>
         <!-- Footer area End -->

       </footer>
       <!-- Footer Section End -->


       <!-- Go To Top Link -->
       <a href="#" class="back-to-top">
         <i class="lni-chevron-up"></i>
       </a>

       <!-- Preloader -->
       <div id="preloader">
         <div class="loader" id="loader-1"></div>
       </div>
       <!-- End Preloader -->

       <!-- jQuery first, then Tether, then Bootstrap JS. -->

       <script src="{{asset('js/landing/owl.carousel.js')}}"></script>
       <script src="{{asset('js/landing/jquery.nav.js')}}"></script>
       <script src="{{asset('js/landing/scrolling-nav.js')}}"></script>
       <script src="{{asset('js/landing/jquery.easing.min.js')}}"></script>
       <script src="{{asset('js/landing/nivo-lightbox.js')}}"></script>
       <script src="{{asset('js/landing/jquery.magnific-popup.min.js')}}"></script>
       <script src="{{asset('js/landing/form-validator.min.js')}}"></script>
       <script src="{{asset('js/landing/contact-form-script.js')}}"></script>
       <script src="{{asset('js/landing/main.js')}}"></script>

     </body>
   </html>
