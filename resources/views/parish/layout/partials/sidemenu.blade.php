<div class="card">
    <div class="card-header">Menu</div>

    <div class="card-body">
        <div class="list-group">
            <a class="list-group-item" href="{{ route('users.account') }}">My Dashboard</a>
            <a class="list-group-item" href="{{ route('parish.index') }}">
                Parish Home
                <small class="d-block text-muted">({{ Auth::user()->parish->name }})</small>
            </a>
            <a class="list-group-item" href="{{ route('users.settings.index') }}">My Settings</a>
        </div>
    </div>
</div>