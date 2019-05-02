@if (\Illuminate\Support\Str::contains(url()->current(), 'admin'))
    @include('layouts.dashboard.navbars.admin-sidebar')
@else
    @include('layouts.dashboard.navbars.user-sidebar')
@endif
