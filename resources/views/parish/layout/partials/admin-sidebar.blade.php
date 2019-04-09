<aside class="app-sidebar">
	<div class="app-sidebar__user">
		<div class="dropdown">
			<a class="nav-link pl-2 pr-2 leading-none d-flex" data-toggle="dropdown" href="#">
				<img alt="image" src="{{ asset('backend/assets/img/avatar/avatar-1.jpeg') }}" class=" avatar-md rounded-circle">
				<span class="ml-2 d-lg-block">
					<span class="text-white app-sidebar__user-name mt-5">{{ Auth::user()->full_name }}</span><br>
					<span class="text-muted app-sidebar__user-name text-sm"> {{ Auth::user()->category }}</span>
				</span>
			</a>
		</div>
	</div>
	<ul class="side-menu">
		<li>
			<a class="side-menu__item"  href="{{ route('parish.admin.dashboard', $parish) }}"><i class="side-menu__icon fe fe-globe"></i><span class="side-menu__label">Dashboard</span></a>
		</li>
        <li class="slide">
            <a class="side-menu__item" href="#" data-toggle="slide"><i class="side-menu__icon fe
            fe-activity"></i><span class="side-menu__label">Site Content</span> <i class="side-menu__icon fe
            fe-chevron-right"></i></a>
            <ul class="slide-menu">
                <li class="py-2">
                    <a href="{{ route('parish.admin.pages.index', $parish) }}" class="slide-item"><i class="fe fe-file-text
                    mr-2"></i> Pages</a>
                </li>
                <li class="py-2">
                    <a href="{{ route('parish.admin.news.index', $parish) }}" class="slide-item"><i class="fe fe-file-text
                    mr-2"></i> News</a>
                </li>
                <li class="py-2">
                    <a href="{{ route('parish.admin.projects.index', $parish) }}" class="slide-item"><i class="fe fe-file-text
                    mr-2"></i> Projects</a>
                </li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="#" data-toggle="slide"><i class="side-menu__icon fe fe-settings"></i><span class="side-menu__label">Settings</span> <i class="side-menu__icon fe
            fe-chevron-right"></i></a>
            <ul class="slide-menu">
                <li class="py-2">
                    <a href="{{ route('parish.admin.settings.index', $parish) }}" class="slide-item"><i class="fe fe-paperclip mr-2"></i> Home Page</a>
                </li>
                <li class="py-2">
                    <a href="{{ route('parish.admin.settings.index', $parish) }}" class="slide-item"><i class="fe fe-phone mr-2"></i> Contacts</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="side-menu__item" href="{{ route('users.account') }}"><i class="side-menu__icon fe fe-user"></i><span class="side-menu__label">My Account</span></a>
        </li>
	</ul>
</aside>
