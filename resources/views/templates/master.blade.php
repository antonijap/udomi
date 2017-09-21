<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500&amp;subset=latin-ext" rel="stylesheet">

  <title>Udomi.net</title>
  <link rel="stylesheet" href="{{ URL::asset('css/jquery.fileuploader.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/owl.theme.default.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/chocolat.css') }}">

  <meta name="description" content="Udomi.net je oglasnik za udomljavanje životinja. Posebno napravljen za udruge.">
  <meta name="keywords" content="udomljavanje životinja, mačke na poklon, psi na poklon">

      <!-- Facebook Pixel Code -->
    <script>
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '536865779795627');
      fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=536865779795627&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->

@if (! empty($og))
{!! $og->renderTags() !!}
@else
  @php
  $og = new OpenGraph();
      $og->title('Udomi.net')
          ->type('website')
          ->image('/storage/share.jpg')
          ->description('Udomi.net je oglasnik za udomljavanje životinja. Posebno napravljen za udruge.')
          ->url('http://udomi.net');
  @endphp
  {!! $og->renderTags() !!}
@endif


</head>
<body>
  @include('partials.nav')
  @yield('content')

  @include('partials.footer')
  @include('partials.analytics')
  @include('partials.drift')

  <script src="{{ URL::asset('js/jquery-3.2.1.min.js') }}" charset="utf-8"></script>
  <script src="{{ URL::asset('js/jquery.fileuploader.js') }}" charset="utf-8"></script>
  <script src="{{ URL::asset('js/owl.carousel.js') }}" charset="utf-8"></script>
  <script src="{{ URL::asset('css/foundation-sites/dist/js/foundation.js') }}" charset="utf-8"></script>
  <script src="{{ URL::asset('js/jquery-text-counter/textcounter.min.js') }}" charset="utf-8"></script>
  <script src="{{ URL::asset('js/jquery-text-counter/textcounter.min.js') }}" charset="utf-8"></script>
  <script src="{{ URL::asset('js/jquery.chocolat.js') }}" charset="utf-8"></script>
  <script src="{{ URL::asset('js/app.js') }}" charset="utf-8"></script>

  <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=59be64077028e9001126048f&product=inline-share-buttons"></script>

</body>
</html>
