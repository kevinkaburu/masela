<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-SDQ0G14XX3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-SDQ0G14XX3');
</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Masela - Buy & sell Land safely.</title> 
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">  
    <link rel="stylesheet" href="{{ asset('css/libs/swiper.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/libs/dropzone.css')}}">
    <link rel="stylesheet" href="{{ asset('css/libs/material-components-web.min.css')}}">  
    <link rel="stylesheet" href="{{ asset('css/style.css')}}"> 
    <link rel="stylesheet" href="{{ asset('css/skins/green.css')}}"> 
    <link rel="stylesheet" href="{{ asset('css/responsive.css')}}">    
</head>
<body class="mdc-theme--background"> 
    <div class="spinner-wrapper" id="preloader">
        <div class="spinner-container">
            <div class="spinner-outer">
                <div class="spinner">
                    <div class="left mask">
                        <div class="plane"></div>  
                    </div>            
                    <div class="top mask">
                        <div class="plane"></div>
                    </div>
                    <div class="right mask">
                        <div class="plane"></div>  
                    </div>            
                    <div class="triangle">
                        <div class="triangle-plane"></div> 
                    </div>
                    <div class="top-left mask">
                        <div class="plane"></div>
                    </div>
                    <div class="top-right mask">
                        <div class="plane"></div>
                    </div>            
                </div>
                <p class="spinner-text">Masela</p> 
            </div>
        </div>
    </div> 
    
    <aside class="mdc-drawer mdc-drawer--modal sidenav">
        <div class="row end-xs middle-xs py-1 px-3">
            <button id="sidenav-close" class="mdc-icon-button material-icons warn-color">close</button> 
        </div>
        <hr class="mdc-list-divider m-0">
        <div class="mdc-drawer__content"> 
            <div class="vertical-menu">
                <div>
                     <?php
                      if (Auth::check()) {?>
                    
                          <a href="{{ route('home.index') }}" class="mdc-button">
                              <span class="mdc-button__ripple"></span>
                        <span class="mdc-button__label">Home</span> 
                              
                      
                          <?php
                          
                      }else{?>
                          <a href="{{ route('welcome') }}" class="mdc-button">
                              <span class="mdc-button__ripple"></span>
                        <span class="mdc-button__label">Property Listing</span> 

                              <?php
                      
                      }
                      ?>
                   
                        
                    </a> 
                </div>  
                <div> 
                    <a href="{{ route('property.new') }}" class="mdc-button">
                        <span class="mdc-button__ripple"></span>
                        <span class="mdc-button__label">submit property</span> 
                    </a> 
                </div> 
                <div>
                    <a href="{{ url('/legal') }}" class="mdc-button">
                        <span class="mdc-button__ripple"></span>
                        <span class="mdc-button__label">Legal Services</span> 
                    </a> 
                </div> 
                <div>
                    <a href="{{ route('pricing') }}" class="mdc-button">
                        <span class="mdc-button__ripple"></span>
                        <span class="mdc-button__label">Pricing</span> 
                    </a> 
                </div> 
<!--                <div>
                    <a href="faq.html" class="mdc-button">
                        <span class="mdc-button__ripple"></span>
                        <span class="mdc-button__label">FAQS</span> 
                    </a> 
                </div> -->
                <div>
                    <a href="{{ route('blog.index') }}" class="mdc-button">
                        <span class="mdc-button__ripple"></span>
                        <span class="mdc-button__label">Blog</span> 
                    </a> 
                </div> 
            </div>  
        </div>
        <hr class="mdc-list-divider m-0">
        <div class="row center-xs middle-xs py-3">
<!--           middle icons/menu-->
        </div>  
    </aside>
    <div class="mdc-drawer-scrim sidenav-scrim"></div>  
    <header class="toolbar-1">  
        <div id="top-toolbar" class="mdc-top-app-bar"> 
            <div class="theme-container row between-xs middle-xs h-100">
                <div class="row start-xs middle-xs">  
                    <button id="sidenav-toggle" class="mdc-button mdc-ripple-surface d-md-none d-lg-none d-xl-none">
                        <span class="mdc-button__ripple"></span>
                        <i class="material-icons">menu</i>
                    </button>
                    <div class="row start-xs middle-xs fw-500 d-none d-md-flex d-lg-flex d-xl-flex"> 
                        
                        <span class="d-flex center-xs middle-xs item">
                            <i class="material-icons mat-icon-sm">mail</i>  
                            <span class="px-1">info@masela.co.ke</span>
                        </span>  
                    </div>       
                </div> 
                <div class="row start-xs middle-xs d-none d-lg-flex d-xl-flex">
<!--               middle icons/menus-->
                   
                </div>  
                <div class="row end-xs middle-xs">
                           <?php
                      if (Auth::check()) {
                      $fb_id = Auth::user()->facebook_id;
                      $photo = Auth::user()->profile_photo_url;
                      $name = Auth::user()->name;
                      $email  =Auth::user()->email;
                      ?>
                       <div class="mdc-menu-surface--anchor"> 
                        <button class="mdc-button mdc-ripple-surface"> 
                            <span class="mdc-button__ripple"></span>
                            <i class="material-icons mdc-button__icon mx-1">person</i>
                            <span class="mdc-button__label">account</span>
                            <i class="material-icons mdc-button__icon m-0">arrow_drop_down</i>
                        </button> 
                        <div class="mdc-menu mdc-menu-surface user-menu">
                            <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical" tabindex="-1">
                                <li class="user-info row start-xs middle-xs">  
                                      <?php
                      if(isset ($fb_id)){
                     echo '<img src="'.$photo.'" alt="user-image" width="50">';
                      }
                      else{?>
                         <img src="{{ asset('images/others/user.jpg')}}" alt="user-image" width="50">
                         <?php
                         
                      }
                      ?>
                                    
                                    <p class="m-0">{{$name}} <br> <small><i>{{$email}}</i></small></p>
                                </li>
                                <li role="separator" class="mdc-list-divider m-0"></li> 
                                <li>
                                    <a href="{{ route('property.new') }}" class="mdc-list-item" role="menuitem">
                                        <i class="material-icons mat-icon-sm text-muted">add_circle</i> 
                                        <span class="mdc-list-item__text px-3">Submit Property</span>
                                    </a> 
                                </li>
                                <li>
                                    <?php
                                    $UserAgent =  App\Models\UserAgent::where('user_id', Auth::user()->id)->first();
                                    if($UserAgent){
                      $agent = App\Models\Agent::where('agent_id', $UserAgent->agent_id)->first();
                      $uri = str_replace(" ", "-", $agent->name);
        $uri = str_replace("/", "-", $uri);
        $agenturl = "/property/view/agent/".$uri . "-" . $agent->agent_id."/";
                                    }else{
                                       $agenturl = "/"; 
                                    }
                     
                      ?>
                                  <a href="{{ $agenturl }}" class="mdc-list-item" role="menuitem">
                                        <i class="material-icons mat-icon-sm text-muted">home</i> 
                                        <span class="mdc-list-item__text px-3">My Properties</span>
                                    </a>
                                </li>
                               
                                
                                <li>
                                    <a href="{{ route('profile.update') }}" class="mdc-list-item" role="menuitem">
                                        <i class="material-icons mat-icon-sm text-muted">edit</i> 
                                        <span class="mdc-list-item__text px-3">Edit Profile</span>
                                    </a>
                                </li>
                                
                                <li role="separator" class="mdc-list-divider m-0"></li>
                                <li>
                                    
                                    <a class="mdc-list-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="material-icons mat-icon-sm text-muted">power_settings_new</i> 
                                        <span class="mdc-list-item__text px-3">Sign Out</span></a>
         <form id= "logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf</form>
                                    
                                    
                                    
                                    
                                    
<!--                                    <a href="login.html" class="mdc-list-item" role="menuitem">
                                        <i class="material-icons mat-icon-sm text-muted">power_settings_new</i> 
                                        <span class="mdc-list-item__text px-3">Sign Out</span>
                                    </a>-->
                                </li> 
                            </ul>
                        </div> 
                    </div> 
                      
                      
                      
                    <?php
                      }else{
                          ?>
                    <div class="row middle-xs"> 
                    <a href="{{ url('/login') }}" class="mdc-button mdc-button d-none d-sm-flex d-md-flex d-lg-flex d-xl-flex">
                        <span class="mdc-button__ripple"></span>
                        <span class="mdc-button__label">Login</span> 
                    </a> 
                </div>  
                      
                         <?php
                      }
                         ?>
                    
                   
                    
                         <?php
                      if (Auth::check()) {
                      $fb_id = Auth::user()->facebook_id;
                      $photo = Auth::user()->profile_photo_url;
                      $name = Auth::user()->name;
                      $email  =Auth::user()->email;
                      ?>
                   
                    <?php
                      }else{
                          ?>
                      
                          <div class="row middle-xs"> 
                    <a href="{{ url('/register') }}" class="mdc-button mdc-button d-none d-sm-flex d-md-flex d-lg-flex d-xl-flex">
                        <span class="mdc-button__ripple"></span>
                        <span class="mdc-button__label">Signup</span> 
                    </a> 
                </div>  
                    
                          <?php
                          }
                         ?>
                    
                </div> 
            </div> 
        </div>  
        <div id="main-toolbar" class="mdc-elevation--z2">
            <div class="theme-container row between-xs middle-xs h-100"> 
                <a class="logo" href="{{ url('/') }}"> 
<!--                    logo goes in here-->

<img src="{{ asset('favicon.ico')}}" alt="MASELA">
                </a>  
                <div class="horizontal-menu d-none d-md-flex d-lg-flex d-xl-flex">  
                    <div>
                         <?php
                      if (Auth::check()) {?>
                    
                          <a href="{{ route('home.index') }}" class="mdc-button">
                              <span class="mdc-button__ripple"></span>
                            <span class="mdc-button__label">Home</span> 
                              
                      
                          <?php
                          
                      }else{?>
                          <a href="{{ route('welcome') }}" class="mdc-button">
                              <span class="mdc-button__ripple"></span>
                            <span class="mdc-button__label">Property Listing</span> 

                              <?php
                      
                      }
                      ?>
                       
                            
                        </a> 
                    </div>  
                     
                   
                    <div>
                        <a href="{{ url('/legal') }}" class="mdc-button">
                            <span class="mdc-button__ripple"></span>
                            <span class="mdc-button__label">Legal Services</span> 
                        </a> 
                    </div> 
                    <div>
                        <a href="{{ route('pricing') }}" class="mdc-button">
                            <span class="mdc-button__ripple"></span>
                            <span class="mdc-button__label">Pricing</span> 
                        </a> 
                    </div> 
<!--                    <div>
                    <a href="faq.html" class="mdc-button">
                        <span class="mdc-button__ripple"></span>
                        <span class="mdc-button__label">FAQS</span> 
                    </a> 
                </div> -->
                    
                     <div>
                        <a href="{{ route('blog.index') }}" class="mdc-button">
                            <span class="mdc-button__ripple"></span>
                            <span class="mdc-button__label">Blog</span> 
                        </a> 
                    </div>  


                    
                </div>
                <div class="row middle-xs"> 
                    <a href="{{ route('property.new') }}" class="mdc-button mdc-button--raised d-none d-sm-flex d-md-flex d-lg-flex d-xl-flex">
                        <span class="mdc-button__ripple"></span>
                        <span class="mdc-button__label">submit property</span> 
                    </a> 
                </div>  
            </div>
        </div> 
    </header>  
 <main class="content-offset-to-top">
<!--<main>-->
         @yield('carousel')
        
         @yield('main')
        
    </main> 
    <footer>  
        <div class="px-3">
            <div class="theme-container"> 
                <div class="py-5 content"> 
                    <div class="row between-xs"> 
                        <div class="col-xs-12 col-sm-5 col-md-4 p-0"> 
                            
                            <p class="row middle-xs mt-1">
                                <i class="material-icons primary-color">call</i> 
                                <span class="mx-2">+2547 000 000 000</span>
                            </p>
                            <p class="row middle-xs mt-1"> 
                                <i class="material-icons primary-color">mail_outline</i> 
                                <span class="mx-2">admin@vinuru.com</span>
                            </p>
                            <p class="row middle-xs mt-1"> 
                                <i class="material-icons primary-color">schedule</i> 
                                <span class="mx-2">24/7</span>
                            </p> 
                            
                        </div> 
                        <div class="col-xs-12 col-sm-5 col-md-3 p-0 feedback"> 
                            <div class="row start-xs middle-xs desc">
                                <a href="https://www.facebook.com/" target="blank" class="social-icon">
                                    <svg class="material-icons mat-icon-lg" viewBox="0 0 24 24">
                                        <path d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M18,5H15.5A3.5,3.5 0 0,0 12,8.5V11H10V14H12V21H15V14H18V11H15V9A1,1 0 0,1 16,8H18V5Z" />
                                    </svg>
                                </a>
                                <a href="https://twitter.com/" target="blank" class="social-icon">
                                    <svg class="material-icons mat-icon-lg" viewBox="0 0 24 24">
                                        <path d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M17.71,9.33C18.19,8.93 18.75,8.45 19,7.92C18.59,8.13 18.1,8.26 17.56,8.33C18.06,7.97 18.47,7.5 18.68,6.86C18.16,7.14 17.63,7.38 16.97,7.5C15.42,5.63 11.71,7.15 12.37,9.95C9.76,9.79 8.17,8.61 6.85,7.16C6.1,8.38 6.75,10.23 7.64,10.74C7.18,10.71 6.83,10.57 6.5,10.41C6.54,11.95 7.39,12.69 8.58,13.09C8.22,13.16 7.82,13.18 7.44,13.12C7.81,14.19 8.58,14.86 9.9,15C9,15.76 7.34,16.29 6,16.08C7.15,16.81 8.46,17.39 10.28,17.31C14.69,17.11 17.64,13.95 17.71,9.33Z" />
                                    </svg> 
                                </a>
                                <a href="https://www.linkedin.com/" target="blank" class="social-icon"> 
                                    <svg class="material-icons mat-icon-lg" viewBox="0 0 24 24">
                                        <path d="M19,3A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3H19M18.5,18.5V13.2A3.26,3.26 0 0,0 15.24,9.94C14.39,9.94 13.4,10.46 12.92,11.24V10.13H10.13V18.5H12.92V13.57C12.92,12.8 13.54,12.17 14.31,12.17A1.4,1.4 0 0,1 15.71,13.57V18.5H18.5M6.88,8.56A1.68,1.68 0 0,0 8.56,6.88C8.56,5.95 7.81,5.19 6.88,5.19A1.69,1.69 0 0,0 5.19,6.88C5.19,7.81 5.95,8.56 6.88,8.56M8.27,18.5V10.13H5.5V18.5H8.27Z" />
                                    </svg>
                                </a>
                                <a href="https://plus.google.com/" target="blank" class="social-icon"> 
                                    <svg class="material-icons mat-icon-lg" viewBox="0 0 24 24">
                                        <path d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M19.5,12H18V10.5H17V12H15.5V13H17V14.5H18V13H19.5V12M9.65,11.36V12.9H12.22C12.09,13.54 11.45,14.83 9.65,14.83C8.11,14.83 6.89,13.54 6.89,12C6.89,10.46 8.11,9.17 9.65,9.17C10.55,9.17 11.13,9.56 11.45,9.88L12.67,8.72C11.9,7.95 10.87,7.5 9.65,7.5C7.14,7.5 5.15,9.5 5.15,12C5.15,14.5 7.14,16.5 9.65,16.5C12.22,16.5 13.96,14.7 13.96,12.13C13.96,11.81 13.96,11.61 13.89,11.36H9.65Z" />
                                    </svg>
                                </a>
                            </div>  
                        </div> 
                        <div class="col-xs-12 col-md-4 p-0 location"> 
                            
                        <h2 class="uppercase">Subscribe our Newsletter</h2>
                        <p class="desc mb-1">Stay up to date with the latest land information.</p>
                    
                        <form action="javascript:void(0);" class="subscribe-form row col-xs-12 col-md-12" id="newsletter_email_form">
                        <input type="text" placeholder="Your email address..." name="newsletter_email" class="subscribe-input"> 
                        <button type="button" class="mdc-button mdc-button--raised subscribe-btn newsleter-submit">
                            <span class="mdc-button__ripple"></span>
                            <span class="mdc-button__label">Subscribe</span> 
                        </button>
                    </form>
                        </div>
                    </div>  
                </div> 
                <div class="row between-xs middle-xs copyright">
                    <p>Copyright © 2021 All Rights Reserved</p>
                    <p> by 
                        <a class="mdc-button" href="https://masela.co.ke/" target="_blank"> 
                            <span class="mdc-button__ripple"></span>
                            <span class="mdc-button__label">Masela Inc</span> 
                        </a>
                    </p>
                </div> 
            </div>
        </div>      
    </footer> 
    <div id="favorites-snackbar" class="mdc-snackbar">
        <div class="mdc-snackbar__surface">
            <div class="mdc-snackbar__label">The property has been added to favorites.</div>
            <div class="mdc-snackbar__actions">
                <button type="button" class="mdc-button mdc-snackbar__action">
                <div class="mdc-button__ripple"></div>
                <span class="mdc-button__label">
                    <i class="material-icons warn-color">close</i>
                </span>
                </button>
            </div>
        </div>
    </div> 
    <div id="back-to-top"><i class="material-icons">arrow_upward</i></div>
    <script src="{{ asset('js/libs/jquery.min.js')}}"></script> 
    <script src="{{ asset('js/libs/material-components-web.min.js')}}"></script> 
    <script src="{{ asset('js/libs/swiper.min.js')}}"></script>
    <script src="{{ asset('js/libs/dropzone.js')}}"></script> 
    <script src="{{ asset('js/scripts.js')}}"></script>  
     
     <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="{{ asset('js/masela.js')}}"></script>
 
    
 @yield('jscript')

</body>
</html>