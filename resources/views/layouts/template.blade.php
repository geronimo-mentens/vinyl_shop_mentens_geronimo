<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'The Vinyl Shop')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @yield('css_after')
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/icons/apple-touch-icon.png">
    <link rel=" icon" href="{{ asset('favicon.ico')}}" type="image/x-icon">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/icons/favicon-16x16.png">
    <link rel="manifest" href="/assets/icons/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

</head>
    <body>
    @include('shared.navigation')

    <main class="container mt-3">
    @yield('main', 'Page under construction ...')
    </main>
    @include('shared.footer')
    <script src="{{ mix('js/app.js') }}"></script>
    @yield('script_after')
    @if(env('APP_DEBUG'))
        <script>
            $('form').attr('novalidate', 'true');
        </script>
    @endif
   </body>
</html>