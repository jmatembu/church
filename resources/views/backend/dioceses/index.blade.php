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

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Country</th>
                                    <th>Bishop</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($dioceses as $diocese)
                                <tr>
                                    <td><a href="{{ route('admin.dioceses.show', $diocese) }}">{{ $diocese->name }}</a></td>
                                    <td>{{ $diocese->country }}</td>
                                    <td>{{ $diocese->bishop->user->full_name }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
