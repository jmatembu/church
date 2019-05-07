@extends('backend.layout.app')
@section('pageTitle', 'Dioceses')
@section('content')
<div class="container-fluid mt--6">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    @include('shared.notifications')
                    @include('shared.errors')

                    <h2 class="h1">{{ $diocese->name }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
