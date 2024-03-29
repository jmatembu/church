<div class="header_top sa-header-top-two">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-12">
                <p class="address"><a href="{{ route('dioceses.show', $parish->diocese) }}">{{ $parish->diocese->name }}</a></p>
            </div>
            <div class="col-md-7 col-12">
                <div class="follow_us sa-follow-us">
                    <ul>
                        @auth
                            <li><a class="font-weight-bold text-white" href="{{ route('users.account') }}" style="font-size: 120%">My Account</a></li>
                            <a class="btn btn-sm dark-btn py-0 ml-3"
                               href="{{ route('logout') }}"
                               onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">
                                <i class="fe fe-log-out"></i>  {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
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
