<div class="card">
    <div class="card-header">Menu</div>

    <div class="card-body">
        <div class="list-group">
            <a class="list-group-item" href="{{ route('users.account') }}">My Dashboard</a>
            @if (Auth::user()->parish)
            <a class="list-group-item" href="{{ route('parish.index') }}">
                Parish Home
                <small class="d-block text-muted">({{ Auth::user()->parish->name }})</small>
            </a>
            @endif
            <a class="list-group-item" href="{{ route('users.prayerRequests.index') }}">My Prayer Requests</a>
            <a class="list-group-item" href="{{ route('users.settings.index') }}">My Settings</a>
            @if(Auth::user()->isParishAdministrator())
                <a class="list-group-item" href="{{ route('parish.admin.dashboard', $parish) }}">Administrator Panel</a>
            @endif
        </div>
    </div>
</div>
