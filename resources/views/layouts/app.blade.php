<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
</head>
<body style="background-image: url(../../../../images/bg.jpg);" > 
    <div>
        Spare Parts Monitoring System Logo Here
    </div>
    <div style="float: right;">
        User Name (area)
    </div>

    <div class="div_class"> 
        <div id="app">
            <div class="fluid">
                <app class="main-content"> </app>
            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>

        @yield('script')
    </div>
   
</body>
</html>
