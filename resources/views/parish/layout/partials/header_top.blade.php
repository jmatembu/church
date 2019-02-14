<div class="header_top sa-header-top-two">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-12">
                <div class="select_language">
                    <div class="select-language-area">
                        <img src="{{ asset('assets/images/icon/flag.png') }}" alt="img">
                        <select>
                            <option>English</option>
                            <option>Luganda</option>
                        </select>
                    </div>
                </div>
                <p class="address">@yield('parishName')</p>
            </div>
            <div class="col-md-7 col-12">
                <div class="follow_us sa-follow-us">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-search"></i></a></li>

                        @auth
                        <li><a class="user" href="{{ route('users.account') }}"><img src="{{ asset('assets/images/icon/user.png') }}" alt="user"></a></li>
                        @endauth

                        @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>