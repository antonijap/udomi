<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500&amp;subset=latin-ext" rel="stylesheet">

  <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

  <meta name="keywords" content="udomljavanje životinja, mačke na poklon, psi na poklon">
  {!! SEO::generate() !!}

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



</head>
<body>
  @include('partials.nav')
  @yield('content')

  @include('partials.footer')
  @include('partials.analytics')
  @include('partials.drift')

  <script src="{{ URL::asset('js/app.js') }}" charset="utf-8"></script>

  <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=59be64077028e9001126048f&product=inline-share-buttons"></script>

</body>
</html>
