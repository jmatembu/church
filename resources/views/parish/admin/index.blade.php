@extends('parish.layout.backend')

@section('content')

    <section class="section">
        <div class="row justify-content-center">
            <div class="col-sm-11">
                @include('shared.notifications')
                <h2 class="mb-3">Dashboard</h2>

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
    </section>
@endsection
