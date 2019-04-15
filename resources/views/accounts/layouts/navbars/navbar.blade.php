@auth()
    @include('accounts.layouts.navbars.navs.auth')
@endauth
    
@guest()
    @include('accounts.layouts.navbars.navs.guest')
@endguest
