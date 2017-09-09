<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Udomi.net</title>
  <link rel="stylesheet" href="{{ URL::asset('css/jquery.fileuploader.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/owl.theme.default.css') }}">
</head>
<body>

  @include('partials.nav')

  @yield('content')

  @include('partials.footer')

  <script src="{{ URL::asset('js/jquery-3.2.1.min.js') }}" charset="utf-8"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
  <script src="{{ URL::asset('js/jquery.fileuploader.js') }}" charset="utf-8"></script>
  <script src="{{ URL::asset('js/owl.carousel.js') }}" charset="utf-8"></script>
  <script src="{{ URL::asset('css/foundation-sites/dist/js/foundation.js') }}" charset="utf-8"></script>
  <script src="{{ URL::asset('js/jquery-text-counter/textcounter.min.js') }}" charset="utf-8"></script>
  <script src="{{ URL::asset('js/app.js') }}" charset="utf-8"></script>

</body>
</html>
