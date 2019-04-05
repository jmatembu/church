<div class="card">
    <div class="card-header">Menu</div>

    <div class="card-body">
        <div class="list-group">
            <a class="list-group-item" href="{{ route('parish.admin.dashboard', $parish) }}">Admin Dashboard</a>
            <a class="list-group-item" href="{{ route('parish.admin.pages.index', $parish) }}">Pages</a>
            <a class="list-group-item" href="{{ route('parish.admin.news.index', $parish) }}">News</a>
            <a class="list-group-item" href="{{ route('parish.admin.settings.index', $parish) }}">Settings</a>
            <a class="list-group-item" href="{{ route('users.account') }}">My Account</a>
        </div>
    </div>
</div>
