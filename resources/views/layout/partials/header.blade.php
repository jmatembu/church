<!-- Header -->
<header id="header" class="nav-stacked sa-header" data-spy="affix" data-offset-top="1">
    <!-- Header-top -->
    <div class="header_top sa-header-top-two">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5 col-12">
                    <div class="h3 text-white">{{ config('app.name') }}</div>
                </div>
                <div class="col-md-7 col-12">
                    <div class="follow_us sa-follow-us">
                        <ul>
                            @auth
                                <li><a href="{{ route('parish.index') }}">Parish Home</a></li>
                                <li><a href="{{ route('users.account') }}">My Account</a></li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Header-top -->
      
    <!-- Navigation -->

    <!-- Navigation end --> 
</header>
<!-- /Header --> 
