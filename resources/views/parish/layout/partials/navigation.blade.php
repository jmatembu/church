<nav id="navigation_bar" class="navbar navbar-default sa-navbar">
    <div class="container">
      <div class="navbar-header">
        <div class="logo"> 
            <a href="{{ url('/') }}"><img src="{{ asset('assets/images/logo.png') }}" alt="image"/></a> 
        </div> <!-- /Logo -->
        <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
            <span class="icon-bar"></span> 
            <span class="icon-bar"></span> 
            <span class="icon-bar"></span> 
        </button>
      </div>
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('parish.index') }}">Home</a></li>
                <li><a href="#">News</a></li>
                <li><a href="{{ route('parish.events.index', $parish) }}">Events</a></li>
                <li><a href="{{ route('parish.projects.index', $parish) }}">Projects</a></li>
                <li><a href="#">Prayer Requests</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>