<!doctype html>
<html lang="en" class="no-js">
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
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Safari Itineraries</title>
        <meta name="description" content="">
        <link href="{{ asset('css/style.css')}}" rel="stylesheet">
        <link href="{{ asset('css/main.css')}}" rel="stylesheet">
          <link href="{{ asset('css/page.min.css')}}" rel="stylesheet">


    <body>

        <!-- Navbar -->
        <nav class="bg-gray navbar navbar-expand-lg navbar-dark navbar-stick-dark">
            <div class="container">

                <div class="navbar-left mr-4">
                    <button class="navbar-toggler" type="button"><span class="navbar-toggler-icon"></span></button>
                    <?php
                    if (Auth::check()) {?>
   <a class="navbar-brand" href="{{ route('home') }}">
<?php

                    }else{?>
 <a class="navbar-brand" href="{{ route('welcome') }}">
       <?php
                    }
?>
                   
                        <img class="logo-dark" src="{{ asset('img/apple-touch-icon.png')}}" alt="logo">
                    </a>
                </div>

                <section class="navbar-mobile">
                    <nav class="nav nav-navbar mr-auto">
                        <a class="nav-link {{ (request()->is('itinerary/list*')) ? 'active' : '' }}" href="{{ route('itinerary.list') }}">Trips</a>
                        <a class="nav-link {{ (request()->is('itinerary/new*')) ? 'active' : '' }}" href="{{ route('itinerary.index') }}">Create Itinerary</a>
                        <a class="nav-link {{ (request()->is('blog*')) ? 'active' : '' }}" href="{{ route('blog.index') }}">Blog</a>

                    </nav>


                </section>

            </div>
        </nav><!-- /.navbar -->
        
        <!-- Header -->
    <header class="section-header">
      <div class="container">

        <div class="row">
          <div class="col-md-8 mx-auto">

            <h1>Travel || Planning </h1>
            <p class="lead-2 opacity-90 mt-6">Read about travel, planning and all the awesome stuff in-between.</p>

          </div>
        </div>

      </div>
    </header><!-- /.header -->


    <!-- Main Content -->

        <div class="container">
          <div class="row">


            <div class="col-md-8 col-xl-9">
              <div class="row gap-y">

                <div class="col-md-6">
                  <div class="card border hover-shadow-6 mb-6 d-block">
                    <a href="#"><img class="card-img-top" src="{{ asset('img/blog-1.jpg')}}" alt="Card image cap"></a>
                    <div class="p-6 text-center">
                      <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="#">Welcome</a></p>
                      <h5 class="mb-0"><a class="text-dark" href="#">Are you offering enough holiday tours?</a></h5>
                    </div>
                  </div>
                </div>


                <div class="col-md-6">
                  <div class="card border hover-shadow-6 mb-6 d-block">
                    <a href="#"><img class="card-img-top" src="{{ asset('img/blog-2.jpg')}}" alt="Card image cap"></a>
                    <div class="p-6 text-center">
                      <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="#">Travel</a></p>
                      <h5 class="mb-0"><a class="text-dark" href="#">Top 5 brilliant content marketing strategies</a></h5>
                    </div>
                  </div>
                </div>



              </div>

<!--
              <nav class="flexbox mt-30">
                <a class="btn btn-white disabled"><i class="ti-arrow-left fs-9 mr-4"></i> Newer</a>
                <a class="btn btn-white" href="#">Older <i class="ti-arrow-right fs-9 ml-4"></i></a>
              </nav>-->
            </div>



            <div class="col-md-4 col-xl-3">
              <div class="sidebar px-4 py-md-0">

                <h6 class="sidebar-title">Search</h6>
                <form class="input-group" target="#" method="GET">
                  <input type="text" class="form-control" name="s" placeholder="Search">
                  <div class="input-group-addon">
                    <span class="input-group-text"><i class="ti-search"></i></span>
                  </div>
                </form>

                <hr>

                <h6 class="sidebar-title">Categories</h6>
                <div class="row link-color-default fs-14 lh-24">
                  <div class="col-6"><a href="#">News</a></div>
                  <div class="col-6"><a href="#">Travel</a></div>
                  <div class="col-6"><a href="#">Destinations</a></div>
                  <div class="col-6"><a href="#">Marketing</a></div>
                  <div class="col-6"><a href="#">Howto</a></div>
                  <div class="col-6"><a href="#">Product</a></div>
                  <div class="col-6"><a href="#">Hiring</a></div>
                  <div class="col-6"><a href="#">Offers</a></div>
                </div>

                <hr>

                <h6 class="sidebar-title">Top posts</h6>
                <a class="media text-default align-items-center mb-5" href="blog-single.html">
                  <img class="rounded w-65px mr-4" src="{{ asset('img/blog-2.jpg')}}">
                  <p class="media-body small-2 lh-4 mb-0">Thank to Maryam for joining our team</p>
                </a>

                <a class="media text-default align-items-center mb-5" href="blog-single.html">
                  <img class="rounded w-65px mr-4" src="{{ asset('img/blog-1.jpg')}}">
                  <p class="media-body small-2 lh-4 mb-0">Best practices for minimalist design</p>
                </a>

               

                <hr>

                <h6 class="sidebar-title">Tags</h6>
                <div class="gap-multiline-items-1">
                  <a class="badge badge-secondary" href="#">Record</a>
                  <a class="badge badge-secondary" href="#">Progress</a>
                  <a class="badge badge-secondary" href="#">Customers</a>
                  <a class="badge badge-secondary" href="#">Freebie</a>
                  <a class="badge badge-secondary" href="#">Offer</a>
                  <a class="badge badge-secondary" href="#">Screenshot</a>
                  <a class="badge badge-secondary" href="#">Milestone</a>
                  <a class="badge badge-secondary" href="#">Version</a>
                  <a class="badge badge-secondary" href="#">Design</a>
                  <a class="badge badge-secondary" href="#">Customers</a>
                  <a class="badge badge-secondary" href="#">Job</a>
                </div>

                <hr>

                <h6 class="sidebar-title">About</h6>
                <p class="small-3">I'm a poor planner, and I prefer spontaneity actions, like jum</p>


              </div>
            </div>

          </div>
        </div>
    
     <nav class="mt-7">
            <ul class="pagination justify-content-center">
              <li class="page-item disabled">
                <a class="page-link" href="#">
                  <span class="fa fa-angle-left"></span>
                </a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="#">1</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">
                  <span class="fa fa-angle-right"></span>
                </a>
              </li>
            </ul>
          </nav>


        </div>
      </section>

    </main>
    </body>
</html>

