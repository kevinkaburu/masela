<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    <meta name="description" content="SafariPlanner — Create and share beautiful travel plans in 3 minutes.">
    <meta name="keywords" content="Travel, Itinerary, travel planner, wetu, safaris, safari planner">
    <meta name="_token" content="{{ csrf_token() }}">

    <title>SafariPlanner — Create and share beautiful travel plans in 3 minutes.</title>

    <!-- Styles -->
    <link href="{{ asset('css/page.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">

    <!-- Favicons -->

<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon.png')}}">
  </head>

  <body class="layout-centered bg-img" style="background-image: url({{ asset('img/bg/auth-bg.jpg')}});">


    <!-- Main Content -->
    <main class="main-content">
         @yield('content')
    </main><!-- /.main-content -->
  


    <!-- Scripts -->
    <script src="{{ asset('js/page.min.js')}}"></script>
    <script src="{{ asset('js/script.js')}}"></script>

  </body>
</html>
