<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-58530380-4"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-58530380-4');
    </script>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    @section('meta')
        <meta name="keywords" content=@yield('metaKeywords', "catholic parish")>
        <meta name="description" content=@yield('metaDescription', "My Catholic Parish is a forever free service that connects parishes to their communities. It aims at enabling each Catholic parish run its community online.")>
        <link rel="canonical" href="{{ route('home') }}">
    @show
    <title>@yield('title', 'Join your parish today at ' . config('app.name'))</title>
    @section('styles')
    <!--Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css">
    <!--OWL Carousel slider-->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}" type="text/css">
    <!--Custome Style -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
    <!--magnific Style -->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}" type="text/css">
    <!--FontAwesome Font Style -->
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
    @show
    <!-- Fav and touch icons -->
    @include('layouts.partials.favicon')
    <!-- Google-Font-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    {{--    <!--[if lt IE 9]>--}}
    {{--    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>--}}
    {{--    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>--}}
    {{--    <![endif]-->--}}
</head>
<body>

@include('layouts.partials.header')

@yield('content')

@include('layouts.partials.footer')

@section('scripts')
<!-- Scripts -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
@show
<!--Custome-JS-->
<script src="{{  asset('assets/js/interface.js') }}"></script>
</body>
</html>
