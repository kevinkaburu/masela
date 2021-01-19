<!DOCTYPE html>
<html lang="en">
  <head>
      <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-36RN9VXMNM"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-36RN9VXMNM');
</script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="Travel, Itinerary, travel planner, wetu, safaris, safari planner, tripcreator, Itinerary builder">

    <title>SafariPlanner — Create & share simple yet powerful itineraries.</title>

    <!-- Styles -->
     <!-- Styles -->
    <link href="{{ asset('css/page.css')}}" rel="stylesheet">
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">


    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('img/favicon.png')}}">
    <link rel="icon" href="{{ asset('img/favicon.png')}}">
  </head>

  <body>


    <!-- Navbar -->
          <nav class="navbar navbar-expand-lg navbar-dark navbar-stick-dark" data-navbar="fixed">
            <div class="container">

              <div class="navbar-left mr-4">
                <button class="navbar-toggler" type="button"><span class="navbar-toggler-icon"></span></button>
                <a class="navbar-brand" href="{{ route('home') }}">
                  <img class="logo-dark" src="{{ asset('img/apple-touch-icon.png')}}" alt="logo">
                </a>
              </div>

              <section class="navbar-mobile">
                <nav class="nav nav-navbar mr-auto">
                     <a class="nav-link {{ (request()->is('itinerary*')) ? 'active' : '' }}" href="{{ route('itinerary.index') }}">Itinerary Builder</a>
<!--                    <a class="nav-link {{ (request()->is('poster*')) ? 'active' : '' }}" href="{{ route('poster.index') }}">Poster Builder</a>-->
                  <a class="nav-link {{ (request()->is('operator*')) ? 'active' : '' }}" href="{{ route('operator.index') }}">My Profile</a>
                   <a class="nav-link {{ (request()->is('blog*')) ? 'active' : '' }}" href="{{ route('blog.index') }}">Blog</a>
                   <a class="nav-link {{ (request()->is('itinerary/list*')) ? 'active' : '' }}" href="{{ route('itinerary.list') }}"> Itineraries</a>

                </nav>

                <div class="dropdown ml-lg-5">
                  <span class="dropdown-toggle no-caret" data-toggle="dropdown">
                      <?php
                      if (Auth::check()) {
                      $fb_id = Auth::user()->facebook_id;
                      $photo = Auth::user()->profile_photo_url;
                      //large
                      if(isset ($fb_id)){
                     echo '<img class="avatar avatar-xs" src="'.$photo.'" alt="user">';
                      }
                      else{?>
                         <img class="avatar avatar-xs" src="{{ asset('img/avatar/1.jpg')}}" alt="user">
                     
                         <?php
                         
                      }
                      }else{?>
                         <img class="avatar avatar-xs" src="{{ asset('img/avatar/1.jpg')}}" alt="user">
                     <?php
                         }?>
                    
                  </span>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route('operator.index') }}">Profile Settings</a>
                    <a class="dropdown-item" href="#">Inbox</a>
                    <div class="dropdown-divider"></div>
                     <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
         <form id= "logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf</form>
                    
                    
                    
                    
                  </div>
                </div>
              </section>

            </div>
          </nav><!-- /.navbar -->

 <header class="main-header bg-gray">

    </header> 
    <!-- Main Content -->
    <main class="main-content">
 @yield('content')
    </main>


    <!-- Footer -->
    <footer class="footer text-white bg-img bg-fixed" style="background-image: url({{ asset('img/vector/9.jpg')}})" data-overlay="8">
      <div class="container">
        <div class="row">

          <div class="col-6 col-md-4 col-xl-3">
            <h6 class="mb-4"><strong>Company</strong></h6>
            <div class="nav flex-column">
              <a class="nav-link" href="#">About us</a>
              <a class="nav-link" href="{{ route('privacy.index') }}">Privacy</a>
            </div>
          </div>

          <div class="col-6 col-md-4 col-xl-3">
            <h6 class="mb-4"><strong>Product</strong></h6>
            <div class="nav flex-column">
              <a class="nav-link" href="#">Post builder</a>
              <a class="nav-link" href="{{ route('itinerary.index') }}">Itinerary builder</a>
            </div>
          </div>


          <div class="col-6 col-md-4 col-xl-3">
            <h6 class="mb-4"><strong>Community</strong></h6>
            <div class="nav flex-column">
              <a class="nav-link" href="{{ route('blog.index') }}">Blog</a>
              <a class="nav-link" href="#">Forums</a>
            </div>
          </div>

          

          <div class="col-6 col-md-4 col-xl-3">
            <h6 class="mb-4"><strong>Extras</strong></h6>
            <div class="nav flex-column">
              <a class="nav-link" href="#">Podcast</a>
              <a class="nav-link" href="{{ route('itinerary.list') }}">Trips</a>
            </div>
          </div>

        </div>
      </div>

      <hr>

      <div class="container">
        <div class="row">

          <div class="col-md-6 text-center text-md-left">
            <small class="opacity-70">© 2021 SafariPlanner. All rights reserved.</small>
          </div>

          <div class="col-md-6 text-center text-md-right">
            <div class="social">
              <a class="social-facebook" href="#"><i class="fa fa-facebook"></i></a>
              <a class="social-twitter" href="#"><i class="fa fa-twitter"></i></a>
              <a class="social-youtube" href="#"><i class="fa fa-youtube"></i></a>
              <a class="social-instagram" href="#"><i class="fa fa-instagram"></i></a>
            </div>
          </div>

        </div>
      </div>
    </footer><!-- /.footer -->


    
     <!-- Scripts -->
    <script src="{{ asset('js/page.min.js')}}"></script>
    <script src="{{ asset('js/script.js')}}"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 @yield('scripts')
  </body>
</html>
