@if (session('status'))
    <div class="alert alert-info" role="alert">
        {{ session('status') }}
    </div>
@elseif (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@elseif(session('error'))
    <div class="alert alert-error" role="alert">
        {{ session('error') }}
    </div>
@endif
