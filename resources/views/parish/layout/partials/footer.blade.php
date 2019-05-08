<!-- Footer -->
<footer id="footer">
    <!-- Footer-Top -->
    @if(! empty($parish->quotes))
    <div class="footer_top secondary-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 top_widget">
                    <blockquote class="bg-none text-white font-weight-bold" cite="{{ $parish->quote_author }}" style="font-size: 120%;">{{ $parish->quote_text }} <span class="text-muted">- {{ $parish->quote_author }}</span></blockquote>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- /Footer-Top -->

    <!-- Footer-Widgets -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 footer_widget">
                <div class="widget_inner" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                    <h5>Contact Info</h5>
                    <p itemprop="streetAddress">{{ $parish->main_address }}</p>
                <p>E:  <a href="mailto:{{ $parish->main_email }}" itemprop="email">{{ $parish->main_email }}</a></p>
                    <p>P:  {{ $parish->main_phone }}</p>
                </div>
            </div>
            <div class="col-md-6 footer_widget">
                <div class="widget_inner">
                    <h5>Useful Links</h5>
                    <div class="footer_nav">
                        <ul>
                            <li><a href="{{ route('users.account') }}">My Account</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="{{ route('pages.terms') }}">Terms and Conditions</a></li>
                            <li><a href="https://www.uecon.org" target="_blank">Uganda Episcopal Conference</a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Footer-Widgets -->

    <!-- Footer-Bottom -->
    <div class="footer_bottom bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-10 text-center">
                    <p class="text-secondary">&copy; {{ date('Y') }} <a href="{{ route('parish.index') }}">@yield('parishName')</a> All Rights Reserved.</p>
                </div>
                <div class="col-md-2">
                    <div id="back-top" class="back-top">
                        <a href="#top" class="bg-white"><i class="fa fa-angle-up" aria-hidden="true"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Footer-Bottom -->
</footer>
<!-- /Footer -->
