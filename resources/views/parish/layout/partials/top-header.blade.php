<nav class="navbar navbar-expand-lg main-navbar">
	<a class="header-brand" href="{{ url('/') }}">
		{{ config('app.name') }}
	</a>
	<ul class="navbar-nav mr-3 mr-auto">
		<li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="ion ion-navicon-round"></i></a></li>
	</ul>
	<ul class="navbar-nav navbar-right">
		<li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg">
			<img src="{{ asset('backend/assets/img/avatar/avatar-1.jpeg') }}" alt="profile-user" class="rounded-circle w-32">
			<div class="d-sm-none d-lg-inline-block">{{ Auth::check() ? Auth::user()->full_name : 'User' }}</div></a>
			<div class="dropdown-menu dropdown-menu-right">
				<a href="#" class="dropdown-item has-icon">
					<i class="fe fe-user"></i> Profile Details
				</a>
                <a href="#" class="dropdown-item has-icon">
                    <i class="fe fe-lock"></i> Change Password
                </a>
				<a class="dropdown-item has-icon"
					href="{{ route('logout') }}"
					onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">
					<i class="fe fe-log-out"></i>  {{ __('Logout') }}
				</a>

				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
			</div>
		</li>
	</ul>
</nav>
