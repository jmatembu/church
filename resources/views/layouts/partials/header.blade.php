<!-- Header -->
<header id="header" class="nav-stacked sa-header" data-spy="affix" data-offset-top="1">
      
    <!-- Navigation -->
    <nav id="navigation_bar" class="navbar navbar-default sa-navbar">
        <div class="container">
            <div class="navbar-header d-flex justify-content-between align-items-center">
                <div class="logo" style="max-width: 300px; max-height: 60px;">
                    <h1 class="h4 text-white mb-0">
                        <span class="d-inline-block mr-2" style="width: 35px; height: 35px; vertical-align: middle; margin-top: -10px">
                            <svg viewBox="-7 0 497 497.888" xmlns="http://www.w3.org/2000/svg"><path d="m354.324219 209.886719h-224v-136l112-56 112 56zm0 0" fill="#d3dbe0"/><path d="m434.324219 497.886719h-384v-247.277344l192-104.722656 192 104.722656zm0 0" fill="#d3dbe0"/><path d="m130.324219 73.886719v53.664062l112-56 112 56v-53.664062l-112-56zm0 0" fill="#adb9c8"/><path d="m50.324219 250.609375v52.078125l192-102.398438 192 102.398438v-52.078125l-192-104.722656zm0 0" fill="#adb9c8"/><path d="m226.324219 65.886719h32v32h-32zm0 0" fill="#fff"/><path d="m290.324219 241.886719h-32v-32h-32v32h-32v32h32v64h32v-64h32zm0 0" fill="#57565c"/><path d="m290.324219 497.886719h-96v-80c0-26.507813 21.492187-48 48-48 26.511719 0 48 21.492187 48 48zm0 0" fill="#92a2b5"/><g fill="#fff"><path d="m114.324219 401.886719h32v32h-32zm0 0"/><path d="m114.324219 337.886719h32v32h-32zm0 0"/><path d="m338.324219 401.886719h32v32h-32zm0 0"/><path d="m338.324219 337.886719h32v32h-32zm0 0"/></g><path d="m380.855469 105.039062-138.53125-69.261718-138.527344 69.261718c-7.902344 3.957032-17.519531.753907-21.472656-7.152343-3.953125-7.902344-.753907-17.515625 7.152343-21.472657l152.847657-76.414062 152.851562 76.414062c7.902344 3.957032 11.105469 13.570313 7.148438 21.472657-3.953125 7.90625-13.566407 11.109375-21.46875 7.152343zm0 0" fill="#57565c"/><path d="m460.679688 280.480469-218.355469-116.449219-218.351563 116.449219c-7.796875 4.15625-17.488281 1.207031-21.648437-6.59375-4.15625-7.796875-1.207031-17.488281 6.59375-21.648438l233.40625-124.496093 233.410156 124.496093c7.796875 4.160157 10.75 13.851563 6.589844 21.648438-4.15625 7.800781-13.847657 10.75-21.644531 6.59375zm0 0" fill="#57565c"/></svg>
                        </span>
                        <span class="d-inline-block"><a class="text-white" href="{{ url('/') }}">{{ config('app.name') }}</a></span>
                    </h1>
                </div> <!-- /Logo -->
                <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navigation">
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ route('parishes.index') }}">Find a Parish</a></li>
                    @auth
                        <li><a href="{{ route('parish.index') }}">My Parish</a></li>
                        <li><a href="{{ route('users.account') }}">My Account</a></li>
                    @else
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navigation end --> 
</header>
<!-- /Header --> 
