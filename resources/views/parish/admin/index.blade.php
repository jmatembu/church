@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                @include('parish.layout.partials.admin-sidemenu')
            </div>
            <div class="col-md-9">
                <h2 class="mb-3">Dashboard</h2>

                <div class="card bg-none border-0 shadow">
                    <div class="card-body">
                        @include('shared.notifications')

                        <div class="card-deck">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h3>{{ $parish->laity->count() }}</h3>
                                    <p>Parishioners</p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body text-center">
                                    <h3>{{ $parish->prayerRequests->count() }}</h3>
                                    <p>Prayer Requests</p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body text-center">
                                    <h3>{{ $parish->projects->count() }}</h3>
                                    <p>Projects</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
