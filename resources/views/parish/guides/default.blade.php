@extends('layouts.dashboard.app')
@section('pageTitle', 'User Guide')
@section('content')
    <div class="container-fluid mt--6">
        <div class="row mb-5 justify-content-center">
            <div class="col-sm-12 col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2 class="h1">Welcome to the User Guide</h2>
                    </div>

                    <div class="card-body">
                        <p>This document is a guide on how to use {{ config('app.name') }}. By getting to this page, it is likely that you are already a member.</p>
                        @include('parish.guides.user')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
