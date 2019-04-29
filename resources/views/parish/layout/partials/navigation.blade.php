<nav id="navigation_bar" class="navbar navbar-default sa-navbar">
    <div class="container">
      <div class="navbar-header">
        <div class="logo" style="max-width: 300px; max-height: 60px; overflow: hidden;">
            <a href="{{ route('parish.index') }}" class="text-white">
                @if ($parish->logo)
                    <img class="img-fluid" src="{{ asset('storage/' . $parish->logo) }}" alt="{{ $parish->name }} logo"/>
                @else
                    <span class="h5">{{ $parish->name }}</span>
                @endif
            </a>
        </div> <!-- /Logo -->
        <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
            <span class="icon-bar"></span> 
            <span class="icon-bar"></span> 
            <span class="icon-bar"></span> 
        </button>
      </div>
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="nav navbar-nav">

                @auth
                    <li><a href="{{ route('parish.index') }}">Home</a></li>
                @else
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('parish.show', $parish) }}">Parish Home</a></li>
                @endauth

                <li class="dropdown">
                    <a href="#">Updates <span class="nav_arrow"></span></a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('parish.news.index', $parish) }}">News</a></li>
                        <li><a href="{{ route('parish.events.index', $parish) }}">Events</a></li>
                        <li><a href="{{ route('parish.projects.index', $parish) }}">Projects</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#">Community <span class="nav_arrow"></span></a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('parish.prayerRequests.index', $parish) }}">Prayer Requests</a></li>
                    </ul>
                </li>
                {{--<li class="dropdown has-mega-menu clearfix">--}}
                    {{--<a href="#">Resources <span class="nav_arrow"></span></a>--}}
                    {{--<ul class="sub-menu">--}}
                        {{--<li><a href="#">Sacraments</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                <li class="dropdown">
                    <a href="#">The Parish <span class="nav_arrow"></span></a>
                    <ul class="sub-menu">
                        @if($parish->about_page)
                        <li><a href="{{ route('parish.about', $parish) }}">About The Parish</a></li>
                        @endif
                        <li><a href="{{ route('parish.contact.create', $parish) }}">Contact</a></li>
                    </ul>
                </li>



            </ul>
        </div>
    </div>
</nav>
