@extends('layouts.dashboard.app')

@section('content')
    @include('layouts.dashboard.headers.cards.user')
    
    <div class="container-fluid mt--7 mb-7">
        <div class="row mt-5">
            <div class="col-sm-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Latest Activity</h3>
                            </div>
                            <div class="col-12">
                                <p>Your activity will appear here.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.dashboard.footers.auth')
    </div>
@endsection
