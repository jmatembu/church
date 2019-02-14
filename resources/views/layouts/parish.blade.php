<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>@yield('pageTitle') - {{ config('app.name') }}</title>
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
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <!-- Header -->
    <header id="header" class="nav-stacked sa-header" data-spy="affix" data-offset-top="1">
        <!-- Header-top -->
        <div class="header_top sa-header-top-two">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-3 col-12">
                        <div class="select_language">
                            <div class="select-language-area">
                                <img src="assets/images/icon/flag.png" alt="img">
                                <select>
                                    <option>English</option>
                                    <option>French</option>
                                    <option>German</option>
                                </select>
                            </div>
                        </div>
                        <p class="address">9000 Regency Parkway, Suite 400 Cary</p>
                    </div>
                    <div class="col-lg-6 col-md-9 col-12">
                        <div class="follow_us sa-follow-us">
                            <ul>
                                <li><a class="live" href="#"><i class="fa fa-circle"></i>Live</a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                                <li><a href="#"><i class="fa fa-search"></i></a></li>
                                <li><a class="user" href="#"><img src="assets/images/icon/user.png" alt="user"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <!-- /Header-top -->

        <!-- Navigation -->
        <nav id="navigation_bar" class="navbar navbar-default sa-navbar">
            <div class="container">
              <div class="navbar-header">
                <div class="logo">
                    <a href="index.html"><img src="assets/images/logo.png" alt="image"/></a>
                </div> <!-- /Logo -->
                <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
              </div>
                <div class="collapse navbar-collapse" id="navigation">
                    <ul class="nav navbar-nav">
                        <li class="dropdown"><a href="#">Home <span class="nav_arrow"></span></a>
                            <ul class="sub-menu">
                                <li><a href="home-1.html">Home 01</a></li>
                                <li><a href="home-2.html">Home 02</a></li>
                                <li><a href="home-3.html">Home 03</a></li>
                                <li><a href="home-4.html">Home 04</a></li>
                                <li><a href="home-5.html">Home 05</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#">Landing <span class="nav_arrow"></span></a>
                            <ul class="sub-menu">
                                <li><a href="landing-charity.html">landing charity</a></li>
                                <li><a href="landing-donation.html">landing donation</a></li>
                                <li><a href="landing-event.html">landing event</a></li>
                                <li><a href="landing-ngo.html">landing ngo</a></li>
                                <li><a href="landing-non-profit.html">landing nonprofit</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#">Pages <span class="nav_arrow"></span></a>
                            <ul class="sub-menu">
                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="about-the-pastor.html">about pastor</a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="blog-detail.html">Blog Detail</a></li>
                                <li><a href="events.html">Event</a></li>
                                <li><a href="event-detail.html">Event Detail</a></li>
                                <li><a href="event-extended.html">Event Extended</a></li>
                                <li><a href="shop.html">Shop</a></li>
                                <li><a href="shop-details.html">Shop details</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#">Others <span class="nav_arrow"></span></a>
                            <ul class="sub-menu">
                                <li><a href="event-shudule.html">Event Shudule</a></li>
                                <li><a href="history-slide.html">history slide</a></li>
                                <li><a href="homily.html">Homily</a></li>
                                <li><a href="homily-detail.html">Homily detail</a></li>
                                <li><a href="prayer-wall.html">Prayer wall</a></li>
                                <li><a href="donation.html">Donation</a></li>
                                <li><a href="donation-cause-page.html">donation cause</a></li>
                                <li><a href="contact-us.html">Contact</a></li>
                            </ul>
                        </li>
                        <li><a class="sa_count" href="shop-details.html"><i class="fa fa-heart"></i><span>5</span></a></li>
                        <li><a class="sa_count" href="shop-details.html"><i class="fa fa-shopping-cart"></i><span>3</span></a></li>
                        <li><a  class="btn dark-btn" href="donation.html">Donate</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Navigation end -->
    </header>
    <!-- /Header -->

    <!-- Banner -->
    <section class="main-banner-section">
        <div class="sa-main-banner owl-carousel">
            <div class="item section-padding">
                <div class="container">
                    <div class="intro_text white_text">
                        <h1>God Gives Us Power</h1>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some</p>
                        <a href="#" class="btn btn-lg dark-btn">Explore Events</a>
                    </div>
                </div>
            </div>
            <div class="item section-padding">
                <div class="container">
                    <div class="intro_text white_text">
                        <h1>God Gives Us Power</h1>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some</p>
                        <a href="#" class="btn btn-lg dark-btn">Explore Events</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /End Banner -->

    <!-- Next-Events-Homilies -->
    <section class="latest_event_homilies mg-top--50">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-6">
                	<div class="box_wrap next_event">
                    	<p class="subtitle">Next Event</p>
                    	<h4><a href="#">Which is the same as saying</a></h4>
                        <div class="event_info">
                        	<div class="event_date">
                                <span>20</span> Aug'18
                            </div>
                        	<ul>
                                <li><i class="fa fa-clock-o"></i> Sunday  (8:00 - 9:00 am)</li>
                                <li><i class="fa fa-map-marker"></i> 56 Thatcher Avenue River Forest Chicago, IL United States</li>
                            </ul>
                        </div>
                        <a href="#" class="btn">Join Now <i class="fa fa-caret-right"></i> </a>
                    </div>
                </div>
                <div class="col-md-6">
                	<div class="box_wrap next_homilies">
                    	<p class="subtitle">Latest Homilies</p>
                    	<h4><a href="#">We denounce with righteous</a></h4>
                        <ul class="homilies_meta">
                            <li><i class="fa fa-user"></i> Message from <a href="#">Frederick</a></li>
                            <li><i class="fa fa-calendar-check-o"></i> Aug 12, 2018</li>
                        </ul>
                        <div class="homilies_inside">
                            <ul>
                                <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                                <li><a href="#"><i class="fa fa-file-pdf-o"></i></a></li>
                                <li><a href="#"><i class="fa fa-share-alt"></i></a></li>
                            </ul>
                        </div>
                        <div class="audio-player">
                            <div id="play-btn">
                            	<i class="fa fa-play"> </i>
                                <i class="fa fa-pause"></i>
                            </div>
                            <div class="audio-wrapper" id="player-container">
                              <audio id="player" ontimeupdate="initProgressBar()">
                              	  <source src="http://www.lukeduncan.me/oslo.mp3" type="audio/mp3">
                              </audio>
                            </div>
                            <div class="player-controls scrubber">
                               <small class="end-time">5:44</small>
                               <span id="seekObjContainer"> <progress id="seekObj" value="0" max="1"></progress>  </span>
    						   <i class="fa fa-volume-up"></i>
                            </div>
                            <div class="next_prev">
                            	<i class="fa fa-angle-left"></i>
                                <i class="fa fa-angle-right"></i>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Next-Events-Homilies -->

    <!-- About -->
    <section class="about_intro section-padding">
    	<div class="container">
        	<div class="about_us">
            	<div class="section-header text-center">
                	<h2>We are a Church That Believes in <u>Jesus</u></h2>
                </div>
                <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).  If you are going to use a passage of Lorem Ipsum.</p>
                <p>You need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined. chunks as necessary.</p>
            </div>
            <div class="text-center">
                <a href="#" class="btn btn-lg dark-btn">Explore Events</a>
            </div>
    	</div>
    </section>
     <!-- /About -->

    <!-- Causes -->
    <section id="causes" class="section-padding gray_bg">
    	<div class="container">
            <div class="owl-carousel">
                <div class="item">
                    <div class="causes_info white_text">
                    	<div class="h__set">
    	                    <h6>Urgent CAUSES</h6>
                        </div>
                        <h2>The Five Points of Gospel Truth</h2>
                        <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for</p>
                        <div class="causes_chart">
                            <p>Raised: <strong>$15,000.00</strong></p>
                            <div class="chart"><img src="assets/images/chart.png" alt="image"></div>
                            <p>Goal: <strong>$25,000.00</strong></p>
                        </div>
                        <a href="#" class="btn btn-lg dark-btn">Donate Now</a>
                    </div>
                </div>
                <div class="item">
                    <div class="causes_info white_text">
                    	<div class="h__set">
    	                    <h6>Urgent CAUSES</h6>
                        </div>
                        <h2>The Five Points of Gospel Truth</h2>
                        <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for</p>
                        <div class="causes_chart">
                            <p>Raised: <strong>$15,000.00</strong></p>
                            <div class="chart"><img src="assets/images/chart.png" alt="image"></div>
                            <p>Goal: <strong>$25,000.00</strong></p>
                        </div>
                        <a href="#" class="btn btn-lg dark-btn">Donate Now</a>
                    </div>
                </div>
            </div>
    	</div>
    </section>
     <!-- /Causes -->

    <!-- Latest-Events-Homilies -->
    <section class="section-padding latest_event_homilies m-0">
    	<div class="container">
        	<div class="row">
    			<div class="col-md-6 col-lg-5">
                	<div class="heading">
        	        	<h3>Latest Events</h3>
    	                <a href="#" class="btn btn-sm pull-right">See All</a>
                    </div>
                    <div class="event_list">
                    	<ul>
                        	<li>
                            	<div class="event_info">
                                    <div class="event_date">
                                        <span>20</span> Aug'18
                                    </div>
                                    <h6><a href="#">Which is the same as saying</a></h6>
                                    <ul>
                                        <li><i class="fa fa-clock-o"></i> Sunday  (8:00 am -9:00 am)</li>
                                        <li><i class="fa fa-map-marker"></i> 56 Thatcher Avenue River Forest</li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                            	<div class="event_info">
                                    <div class="event_date">
                                        <span>16</span> Aug'18
                                    </div>
                                    <h6><a href="#">If you are going to use</a></h6>
                                    <ul>
                                        <li><i class="fa fa-clock-o"></i> Sunday  (8:00 am -9:00 am)</li>
                                        <li><i class="fa fa-map-marker"></i> 56 Thatcher Avenue River Forest</li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                            	<div class="event_info">
                                    <div class="event_date">
                                        <span>27</span> Aug'18
                                    </div>
                                    <h6><a href="#">Nor again is there anyone</a></h6>
                                    <ul>
                                        <li><i class="fa fa-clock-o"></i> Sunday  (8:00 am -9:00 am)</li>
                                        <li><i class="fa fa-map-marker"></i> 56 Thatcher Avenue River Forest</li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6 col-lg-5 offset-lg-2">
                	<div class="heading">
        	        	<h3>Latest Homilies</h3>
    	                <a href="#" class="btn btn-sm pull-right">See All</a>
                    </div>
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                          <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                              <h6 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  But I must explain to you how</a>
                              </h6>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in show" role="tabpanel" aria-labelledby="headingOne">
                              <div class="panel-body">
                                <ul class="homilies_meta">
                                    <li><i class="fa fa-user"></i> Message from <a href="#">Frederick</a></li>
                                    <li><i class="fa fa-calendar-check-o"></i> Aug 12, 2018</li>
                                </ul>
                                <div class="homilies_inside">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-music"></i></a></li>
                                        <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                                        <li><a href="#"><i class="fa fa-file-pdf-o"></i></a></li>
                                        <li><a href="#"><i class="fa fa-share-alt"></i></a></li>
                                    </ul>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                              <h6 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                   Who loves or pursues</a>
                              </h6>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                              <div class="panel-body">
                                <ul class="homilies_meta">
                                    <li><i class="fa fa-user"></i> Message from <a href="#">Frederick</a></li>
                                    <li><i class="fa fa-calendar-check-o"></i> Aug 12, 2018</li>
                                </ul>
                                <div class="homilies_inside">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-music"></i></a></li>
                                        <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                                        <li><a href="#"><i class="fa fa-file-pdf-o"></i></a></li>
                                        <li><a href="#"><i class="fa fa-share-alt"></i></a></li>
                                    </ul>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                              <h6 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">That pleasures have to be repudiated</a>
                              </h6>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                              <div class="panel-body">
                                <ul class="homilies_meta">
                                    <li><i class="fa fa-user"></i> Message from <a href="#">Frederick</a></li>
                                    <li><i class="fa fa-calendar-check-o"></i> Aug 12, 2018</li>
                                </ul>
                                <div class="homilies_inside">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-music"></i></a></li>
                                        <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                                        <li><a href="#"><i class="fa fa-file-pdf-o"></i></a></li>
                                        <li><a href="#"><i class="fa fa-share-alt"></i></a></li>
                                    </ul>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingFour">
                              <h6 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">To take a trivial example</a>
                              </h6>
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                              <div class="panel-body">
                                <ul class="homilies_meta">
                                    <li><i class="fa fa-user"></i> Message from <a href="#">Frederick</a></li>
                                    <li><i class="fa fa-calendar-check-o"></i> Aug 12, 2018</li>
                                </ul>
                                <div class="homilies_inside">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-music"></i></a></li>
                                        <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                                        <li><a href="#"><i class="fa fa-file-pdf-o"></i></a></li>
                                        <li><a href="#"><i class="fa fa-share-alt"></i></a></li>
                                    </ul>
                                </div>
                              </div>
                            </div>
                          </div>

    		            </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Latest-Events-Homilies -->

    <!-- Testimonials -->
    <section class="our_testimonials">
         <div class="container">
         	<div class="row">
                <div class="col-md-5">
                    <div class="about_company margin_60">
                        <h4>Our History</h4>
                        <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years</p>
                        <a href="#" class="btn-link"><u>Learn More <i class="fa fa-caret-right"></i></u></a>
                    </div>
                    <div class="about_company">
                        <h4>Mission</h4>
                        <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years</p>
                        <a href="#" class="btn-link"><u>Learn More <i class="fa fa-caret-right"></i></u></a>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="img_wrap">
                        <div class="video_icon">
                            <a class="popup-youtube" href="http://www.youtube.com/watch?v=0O2aH4XLbto"><i class="fa fa-play"></i></a>
                        </div>
                        <img src="assets/images/img1.png" alt="image">
                    </div>
                    <div id="testimonials">
                        <div class="owl-carousel">
                            <div class="item">
                                <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text. .
                                It uses a dictionary of over 200 Latin words, combined with.</p>
                                <h6>Bobby K. Parker</h6>
                            </div>
                            <div class="item">
                                <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text. .
                                It uses a dictionary of over 200 Latin words, combined with.</p>
                                <h6>Bobby K. Parker</h6>
                            </div>
                            <div class="item">
                                <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text. .
                                It uses a dictionary of over 200 Latin words, combined with.</p>
                                <h6>Bobby K. Parker</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </section>
    <!-- /Testimonials -->

    <!-- Latest-Blog -->
    <section class="latest_blog section-padding">
    	<div class="container">
        	<div class="blog">
            	<div class="section-header text-center">
                	<h2>Latest News</h2>
                </div>
                <div class="row">
                    <article class="col-md-6 col-12">
                        <div class="blog_wrap">
                            <div class="blog_img">
                                <a href="#"><img src="assets/images/post_1.jpg" alt="image"></a>
                            </div>
                            <div class="blog_info">
                                <div class="post_date"><a href="#">Aug 12, 2018</a></div>
                                <h5><a href="#">On the other hand</a></h5>
                                <p>You need to be sure there isn't anything embarrassing hidden in the middle of text.
                                All the Lorem Ipsum generators on the Internet tend to repeat predefined</p>
                                <a href="#" class="btn">Details <i class="fa fa-caret-right"></i> </a>
                            </div>
                        </div>
                    </article>

                    <article class="col-md-6 col-12">
                        <div class="blog_wrap">
                            <div class="blog_img">
                                <a href="#"><img src="assets/images/post_2.jpg" alt="image"></a>
                            </div>
                            <div class="blog_info">
                                <div class="post_date"><a href="#">Aug 12, 2018</a></div>
                                <h5><a href="#">On the other hand</a></h5>
                                <p>You need to be sure there isn't anything embarrassing hidden in the middle of text.
                                All the Lorem Ipsum generators on the Internet tend to repeat predefined</p>
                                <a href="#" class="btn">Details <i class="fa fa-caret-right"></i> </a>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest-Blog -->

    <!-- Footer -->
    <footer id="footer">
    	<!-- Footer-Top -->
    	<div class="footer_top secondary-bg">
        	<div class="container">
            	<div class="row">
                	<div class="col-md-4 top_widget">
                    	<div class="footer_logo">
                        	<a href="#"><img src="assets/images/logo.png" alt="image"></a>
                        </div>
                    </div>
                    <div class="col-md-4 top_widget">
                    	<div class="newsletter">
                        	<form>
                            	<div class="email_input">
    	                        	<input type="email" placeholder="Email address">
                                </div>
                                <button type="submit">Submit <i class="fa fa-caret-right"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4 top_widget">
                    	<div class="follow_us">
                        	<ul>
                            	<li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Footer-Top -->

        <!-- Footer-Widgets -->
        <div class="container">
        	<div class="row">
            	<div class="col-md-4 footer_widget">
                	<div class="widget_inner">
                    	<h5>Contact Us</h5>
                        <p>9000 Regency Parkway, Suite 400 Cary, NC 27518</p>
                        <p>E:  <a href="mailto:supportsaasapp@gmail.com">supportsaasapp@gmail.com</a></p>
                        <p>P:  +000 1456 6978 111</p>
                    </div>
                </div>
                <div class="col-md-4 footer_widget">
                	<div class="widget_inner">
                    	<div class="instagram_img">
                             <ul>
                                <li><a href="#"><img src="assets/images/feed/charity/01.jpg" alt="image"></a></li>
                                <li><a href="#"><img src="assets/images/feed/charity/02.jpg" alt="image"></a></li>
                                <li><a href="#"><img src="assets/images/feed/charity/03.jpg" alt="image"></a></li>
                                <li><a href="#"><img src="assets/images/feed/charity/04.jpg" alt="image"></a></li>
                                <li><a href="#"><img src="assets/images/feed/charity/05.jpg" alt="image"></a></li>
                                <li><a href="#"><img src="assets/images/feed/charity/06.jpg" alt="image"></a></li>
                                <li><a href="#"><img src="assets/images/feed/charity/07.jpg" alt="image"></a></li>
                                <li><a href="#"><img src="assets/images/feed/charity/08.jpg" alt="image"></a></li>
                            </ul>
                        	<a href="#" class="insta_url"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 footer_widget">
                	<div class="widget_inner">
                    	<h5>Useful Links</h5>
                        <div class="footer_nav">
                        	<ul>
                            	<li><a href="#">FAQ</a></li>
                                <li><a href="#">Account</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Cart</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Checkout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Footer-Widgets -->

        <!-- Footer-Bottom -->
        <div class="footer_bottom">
        	<div class="container">
            	<div class="row">
                	<div class="col-md-4">
                    	<p>&copy; 2018 Sacredia All Rights Reserved</p>
                    </div>
                    <div class="col-md-4">
                        <div id="back-top" class="back-top">
                            <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                    	<div class="footer_links">
                        	<a href="#">Home</a>
                            <a href="#">About Us</a>
                            <a href="#">Homily</a>
                            <a href="#">Events</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Footer-Bottom -->
    </footer>
    <!-- /Footer -->

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/audio_custome.js"></script>
    <script src="assets/js/jquery.countdown.min.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/masonry.pkgd.min.js"></script>
    <script src="https://npmcdn.com/imagesloaded@4/imagesloaded.pkgd.js"></script>

    <!--Custome-JS-->
    <script src="assets/js/interface.js"></script>
</body>
</html>