<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Udomi.net</title>
  <link rel="stylesheet" href="{{ URL::asset('css/jquery.fileuploader.css') }}">
  <link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.5.1/css/bulma.css">
  <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ URL::asset('css/slick.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/slick-theme.css') }}">
</head>
<body>

  <div class="container">
    @include('partials.nav')
  </div>

  @yield('content')
  @include('partials.footer')

  <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>

  <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
  <script src="{{ URL::asset('js/jquery.fileuploader.js') }}" charset="utf-8"></script>
  <script src="{{ URL::asset('js/app.js') }}" charset="utf-8"></script>

</body>
</html>
