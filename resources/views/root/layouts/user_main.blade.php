<!DOCTYPE html>
<html lang="zxx">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" href="{{ url("Assets/images/logo/tab_logo.png") }}" type="image/x-icon"/>
    <meta name="description" content="Shayna Template" />
    <meta name="keywords" content="Shayna, unica, creative, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>SingleEcommerce | {{ $title }}</title>

    <style>
      .footer-bottom {
          display: flex;
          min-height: 100vh;
          flex-direction: column;
          justify-content: space-between;
      }
    </style>
    @include('root.includes.css')
  </head>

  <body>
    @include('root.includes.loader')
    <div class="footer-bottom">
      @include('root.includes.header')

      <div>
        @yield('content')
      </div>

      @stack('form')
      @stack('partner')
      @stack('footer')
    </div>
    @include('root.includes.js')
  </body>
</html>
