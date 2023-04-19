<!DOCTYPE html>
<html lang="zxx">
  <head>
    <meta charset="UTF-8" />
    <meta name="description" content="Shayna Template" />
    <meta name="keywords" content="Shayna, unica, creative, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Fashi | {{ $title }}</title>

    @include('root.includes.css')
  </head>

  <body>
    @include('root.includes.loader')
    @include('root.includes.header')

    <div>
      @yield('content')
    </div>

    @stack('partner')
    @stack('footer')

    @include('root.includes.js')
  </body>
</html>
