<!DOCTYPE html>
<html lang="en">

<head>
  @include('partials.head')
</head>

<body>

  @include('partials.header')
  @yield('hero')
  
  <main id="main">
    @yield('content')
  </main><!-- End #main -->

  @include('partials.footer')

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
  </a>

  @include('partials.script')
  @yield('script')

</body>

</html>