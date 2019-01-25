<!-- Footer --> 
<footer id="footer">
    <!-- Footer-Top -->
    <div class="footer_top secondary-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-4 top_widget">
                    <div class="footer_logo">
                        <a href="#"><img src="{{ asset('assets/images/logo.png') }}" alt="image"></a>
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
                    <h5>Contact Info</h5>
                    <p>{{ $contacts['address'] }}</p>
                <p>E:  <a href="mailto:{{ $contacts['email'] }}">{{ $contacts['email'] }}</a></p>
                    <p>P:  {{ $contacts['phone'][0] }}</p>
                </div>
            </div>
            <div class="col-md-4 footer_widget">
                <div class="widget_inner">
                    <div class="instagram_img">
                         <ul>
                            <li><a href="#"><img src="{{ asset('assets/images/feed/charity/01.jpg') }}" alt="image"></a></li>
                            <li><a href="#"><img src="{{ asset('assets/images/feed/charity/02.jpg') }}" alt="image"></a></li>
                            <li><a href="#"><img src="{{ asset('assets/images/feed/charity/03.jpg') }}" alt="image"></a></li>
                            <li><a href="#"><img src="{{ asset('assets/images/feed/charity/04.jpg') }}" alt="image"></a></li>
                            <li><a href="#"><img src="{{ asset('assets/images/feed/charity/05.jpg') }}" alt="image"></a></li>
                            <li><a href="#"><img src="{{ asset('assets/images/feed/charity/06.jpg') }}" alt="image"></a></li>
                            <li><a href="#"><img src="{{ asset('assets/images/feed/charity/07.jpg') }}" alt="image"></a></li>
                            <li><a href="#"><img src="{{ asset('assets/images/feed/charity/08.jpg') }}" alt="image"></a></li>
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
                    <p>&copy; {{ date('Y') }} @yield('parishName') All Rights Reserved</p>
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
                        <a href="#">Sermon</a>
                        <a href="#">Events</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Footer-Bottom -->
</footer>
<!-- /Footer --> 