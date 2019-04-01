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
            <div class="col-md-6 footer_widget">
                <div class="widget_inner">
                    <h5>Contact Info</h5>
                    <p>{{ $parish->main_address }}</p>
                <p>E:  <a href="mailto:{{ $parish->main_email }}">{{ $parish->main_email }}</a></p>
                    <p>P:  {{ $parish->main_phone }}</p>
                </div>
            </div>
            <div class="col-md-6 footer_widget">
                <div class="widget_inner">
                    <h5>Useful Links</h5>
                    <div class="footer_nav">
                        <ul>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
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
