<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Udomi.net</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.5.1/css/bulma.css">
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
  </head>
  <body>

      <div class="container">
        @include('partials.nav')
      </div>

      @yield('content')
      @include('partials.footer')

      <script src="{{ URL::asset('js/app.js') }}" charset="utf-8"></script>

  </body>
</html>
