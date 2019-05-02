@auth()
    @include('layouts.dashboard.navbars.navs.auth')
@else
    @include('layouts.dashboard.navbars.navs.guest')
@endauth
