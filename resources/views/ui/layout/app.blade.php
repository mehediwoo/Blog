<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- Link Start --}}
    @include('ui.layout.link')
    {{-- Link End --}}
  </head>
  <body>

  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    {{-- Menu Start  --}}
    @include('ui.layout.menu')
    {{-- Menu Start  --}}


    {{-- Main Content --}}
    @yield('content')
    {{-- End Main Content --}}




    {{-- NewsLatter Start --}}
    @include('ui.layout.newslatter')
    {{-- Newslatter End --}}


    {{-- Footer Start --}}
    @include('ui.layout.footer')
    {{-- Footer End --}}

  </div>

  {{-- js start --}}
  @include('ui.layout.js')
  {{-- js end --}}

  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async="" src="../../gtag/js.js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

  </body>
</html>
