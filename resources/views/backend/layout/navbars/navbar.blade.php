<!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('home') }}">@yield('pageTitle', 'Dashboard')</a>

        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <div class="media-body ml-2 d-none d-lg-block">
                            <span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->fullName }}</span>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    {{--                    <a href="#" class="dropdown-item">--}}
                    {{--                        <i class="ni ni-single-02"></i>--}}
                    {{--                        <span>{{ __('My profile') }}</span>--}}
                    {{--                    </a>--}}
                    <a href="{{ route('users.settings.index') }}" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>{{ __('Settings') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>{{ __('Profile') }}</span>
                    </a>
{{--                    <a href="#" class="dropdown-item">--}}
{{--                        <i class="ni ni-support-16"></i>--}}
{{--                        <span>{{ __('Support') }}</span>--}}
{{--                    </a>--}}
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>

@if(! Route::is('admin.dashboard'))
    <div class="header bg-gradient-primary pb-8 pt-3 pt-md-6">
        <div class="container-fluid">
            <div class="header-body">
            </div>
        </div>
    </div>
@endif
