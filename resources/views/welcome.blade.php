<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>{{ config('app.name') }}</title>
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
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('assets/images/favicon-icon/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('assets/images/favicon-icon/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('assets/images/favicon-icon/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('assets/images/favicon-icon/apple-touch-icon-57-precomposed.png') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon-icon/favicon.png') }}">
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
    @include('layout.partials.header')
    <section class="sa-page-title text-left" style="background-image: url({{ asset('assets/images/bg/1.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12" style="background-color: rgba(0,0,0,0.2);">
                    <div class="banner-details donation-banner-details mt-1 py-5 px-3">
                        <h1>Join your Parish Today</h1>
                        <p class="text-white" style="font-size: 120%;">Now, every catholic parish can have its own online community. Join your catholic parish community today.</p>
                        <a href="{{ route('register') }}" class="btn dark-btn">Register Now</a>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 login-wrapper">
                    <div class="sa-banner-coundown-wrap">
                        <div class="sa-banner-coundown">
                            <h4>Login to your account</h4>
                            <form method="post" action="{{ route('login') }}" id="login-form">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="**************************" required>
                                </div>
                            </form>

                            <button type="submit" class="btn black-btn btn-block mb-3" form="login-form">Login</button>
                            <p>Don't have an account? <a href="{{ route('register') }}" class="d-inline">Register here</a> instead.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-padding">
        <div class="container">
            <div class="about_us">
                <div class="sa-section-title text-center">
                    <h2>Why are we building <br><u>{{ config('app.name') }}</u>?</h2>
                </div>
                <p style="font-size: 1.125em">There is no doubt that information technology enhances delivery and consumption of services of any entity. The Catholic Church is no exception to this. {{ config('app.name') }} is a <strong>forever free service</strong> that is here to assist members of each parish community all over Uganda to have an even easier connection with their Parish, and in the same way assist the priests connect with their community. For example, members of a parish community shouldn't only get news updates when they attend mass. No! It would be great to have them have access to information and resources of the parish anytime and anywhere.</p>
                <p style="font-size: 1.125em">{{ config('app.name') }} also greatly cuts down the costs that would be required if each parish decided to build and manage its own online parish community. Well, {{ config('app.name') }} is an opt-in service. Therefore each Parish through its Parish Priest would need to request to be added to {{ config('app.name') }}.</p>
            </div>

        </div>
    </section>
    <section class="sa-intro-section sa-intro-section-3 bg-gray pd-default-3 pb-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-12">
                    <div class="sa-section-title text-center">
                        <h2 class="title">Key Features</h2>
                        <p>What you can do in your Catholic Parish Online Community.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="sa-intro-area text-color text-center">
                        <img src="assets/images/stories/1.png" alt="">
                        <h2>Prayer Requests</h2>
                        <p>Request community members to prayer for you.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="sa-intro-area text-color text-center">
                        <img src="assets/images/stories/5.png" alt="">
                        <h2>News & Updates</h2>
                        <p>Read news and updates about your parish.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="sa-intro-area text-color text-center">
                        <img src="assets/images/stories/3.png" alt="">
                        <h2>Reach Out</h2>
                        <p>Contact your parish office directly.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="sa-intro-area text-color text-center">
                        <img src="assets/images/stories/11.png" alt="">
                        <h2>Projects</h2>
                        <p>View parish projects that need your support.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-center">
                    <p>More features comming soon. See the Upcoming Features section.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="sa-intro-section sa-intro-section-3 bg-gray pd-default-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-12">
                    <div class="sa-section-title text-center">
                        <h2 class="title">Upcoming Features</h2>
                        <p>We are currently working on the following features.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="sa-intro-area text-color text-center">
                        <img src="assets/images/stories/1.png" alt="">
                        <h2>Resources</h2>
                        <p>Grow your faith with helpful links, articles.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="sa-intro-area text-color text-center">
                        <img src="assets/images/stories/5.png" alt="">
                        <h2>Sub Parish</h2>
                        <p>Identify yourself with a Sub Parish and Local Community</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="sa-intro-area text-color text-center">
                        <img src="assets/images/stories/3.png" alt="">
                        <h2>Local Language</h2>
                        <p>Access this website in a local language.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="sa-intro-area text-color text-center">
                        <img src="assets/images/stories/11.png" alt="">
                        <h2>Social Sharing</h2>
                        <p>Share content with friends on Social Media</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="sa-intro-area text-color text-center">
                        <img src="assets/images/stories/1.png" alt="">
                        <h2>Mass Intentions</h2>
                        <p>Request Holy Mass to be said for your intentions.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="sa-intro-area text-color text-center">
                        <img src="assets/images/stories/5.png" alt="">
                        <h2>Donations</h2>
                        <p>Donate directly to a specific project or cause.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="sa-intro-area text-color text-center">
                        <img src="assets/images/stories/3.png" alt="">
                        <h2>Sacraments</h2>
                        <p>Apply for all sacraments e.g Baptism, Holy Matrimony...</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="sa-intro-area text-color text-center">
                        <img src="assets/images/stories/11.png" alt="">
                        <h2>Pay Tithe</h2>
                        <p>Remit your Tithe obligations online.</p>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <section class="sa-contact-section pd-default-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h2 class="title mb-5">We appreciate your feedback</h2>
                    <div class="sa-poster-con-info">
                        <p>If you have any feedback for us about {{ config('app.name') }}, we would be more than happy to know about it. Use the contact form below to reach out to the developers of {{ config('app.name') }}.</p>
                    </div>

                    <div class="sa-contact-area">
                        <form class="sa-contact-form" action="{{ route('feedback.store') }}" method="post" id="feedback-form">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input class="input-control" placeholder="Your real name" id="name" type="text" name="name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input class="input-control" id="feedback_email" placeholder="e.g john@example.com" type="email" name="email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea id="message" class="input-control" name="body" placeholder="Type your message here" rows="5" required></textarea>
                            </div>
                            <button type="submit" id="submit-feedback" class="btn black-btn">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer id="footer">
        <!-- Footer-Top -->
        <div class="footer_top secondary-bg pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 pt-3 pb-0">
                        <p class="text-white text-center">&copy; {{ date('Y') }} {{ config('app.name') }}</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Footer-Top -->
    </footer>
    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
    <!--Custome-JS-->
    <script src="{{  asset('assets/js/interface.js') }}"></script>
</body>
</html>
