<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>

    <!--favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"/>

@section('styles')
    <!--Bootstrap.min css-->
        <link rel="stylesheet" href="{{ asset('backend/assets/plugins/bootstrap/css/bootstrap.min.css') }}">

        <!--Icons css-->
        <link rel="stylesheet" href="{{ asset('backend/assets/css/icons.css') }}">

        <!--Style css-->
        <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">

        <!--mCustomScrollbar css-->
        <link rel="stylesheet" href="{{ asset('backend/assets/plugins/scroll-bar/jquery.mCustomScrollbar.css') }}">

        <!--Sidemenu css-->
        <link rel="stylesheet" href="{{ asset('backend/assets/plugins/toggle-menu/sidemenu.css') }}">
    @show

</head>

<body class="app ">
<div id="app">
    <div class="main-wrapper" >
        @include('parish/layout.partials.top-header')

        @if (Auth::user()->isParishAdministrator())
            @include('parish.layout.partials.admin-sidebar')
        @else
            @include('parish.layout.partials.parishioner-sidebar')
        @endif

        <div class="app-content">
            @include('shared.notifications')
            @include('shared.errors')
            @yield('content')
        </div>

        <footer class="main-footer">
            <div class="row">
                <div class="col-md-12 text-center">
                    Copyright &copy; {{ config('app.name') }} {{ date('Y') }}
                </div>
            </div>

        </footer>

    </div>
</div>
@section('scripts')
    <!--Jquery.min js-->
    <script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>

    <!--popper js-->
    <script src="{{ asset('backend/assets/js/popper.js') }}"></script>

    <!--Bootstrap.min js-->
    <script src="{{ asset('backend/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!--Jquery.nicescroll.min js-->
    <script src="{{ asset('backend/assets/plugins/nicescroll/jquery.nicescroll.min.js') }}"></script>

    <!--Scroll-up-bar.min js-->
    <script src="{{ asset('backend/assets/plugins/scroll-up-bar/dist/scroll-up-bar.min.js') }}"></script>

    <!--Sidemenu js-->
    <script src="{{ asset('backend/assets/plugins/toggle-menu/sidemenu.js') }}"></script>

    <!--mCustomScrollbar js-->
    <script src="{{ asset('backend/assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
@show
<!--App Scripts js-->
<script src="{{ asset('backend/assets/js/scripts.js') }}"></script>

</body>
</html>
