<aside class="app-sidebar">
	<div class="app-sidebar__user">
		<div class="dropdown">
			<a class="nav-link pl-2 pr-2 leading-none d-flex" data-toggle="dropdown" href="#">
				<img alt="image" src="{{ asset('backend/assets/img/avatar/avatar-1.jpeg') }}" class=" avatar-md rounded-circle">
				@auth
				<span class="ml-2 d-lg-block">
					<span class="text-white app-sidebar__user-name mt-5">{{ Auth::user()->name }}</span><br>
					<span class="text-muted app-sidebar__user-name text-sm"> {{ Auth::user()->category }}</span>
				</span>
				@endauth
			</a>
		</div>
	</div>
	<ul class="side-menu">
		<li>
			<a class="side-menu__item"  href="#"><i class="side-menu__icon fe fe-globe"></i><span class="side-menu__label">Dashboard</span></a>
		</li>
		<li>
			<a class="side-menu__item" href="#"><i class="side-menu__icon fe fe-users"></i><span class="side-menu__label">Savings</span></a>
		</li>
        <li>
            <a class="side-menu__item" href="#"><i class="side-menu__icon fe
            fe-arrow-down"></i><span class="side-menu__label">Withdraw Requests</span></a>
        </li>
        <li>
            <a class="side-menu__item" href="#"><i class="side-menu__icon fe
            fe-users"></i><span class="side-menu__label">Loans</span></a>
        </li>
	</ul>
</aside>
