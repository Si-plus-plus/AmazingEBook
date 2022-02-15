<!DOCTYPE html>
<html lang="{{ (str_replace('_', '-', app()->getLocale()) == 'fa') || (str_replace('_', '-', app()->getLocale()) == 'ar') ? "dir=rtl" : "dir=ltr" }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <title>
            @section('title')
                {{ config('app.name', 'Laravel') }}
            @show
        </title>
    </head>

    <script src="{{ asset('js/jquery-3.4.1.slim.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" crossorigin="anonymous"></script>

    <body>
        @include('components.navbar')
        <div class="container">
            @include('components.notification-card')
        </div>
        @yield('content')

        @include('components.footer')
    </body>
</html>
