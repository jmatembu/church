<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Argon Dashboard') }}</title>
        <!-- Favicon -->
        @include('layouts.partials.favicon')
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('user') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('user') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        @stack('css')
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('user') }}/css/argon.css?v=1.0.0" rel="stylesheet">
    </head>
    <body class="{{ $class ?? '' }}">
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @include('layouts.dashboard.navbars.sidebar')
        @endauth
        
        <div class="main-content">
            @include('layouts.dashboard.navbars.navbar')
            @yield('content')
        </div>
        @guest()
            @include('layouts.dashboard.footers.guest')
        @endguest

        <script src="{{ asset('user') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('user') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        
        @stack('js')
        
        <!-- Argon JS -->
        <script src="{{ asset('user') }}/js/argon.js?v=1.0.0"></script>
    </body>
</html>
