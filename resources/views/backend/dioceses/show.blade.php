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

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Parish Priest</th>
                                <th class="text-right">Community</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($diocese->parishes as $parish)
                                <tr>
                                    <td><a href="{{ route('admin.parishes.show', $parish) }}">{{ $parish->name }}</a></td>
                                    <td>{{ optional(optional($parish->parishPriest())->user)->full_name ?? 'None' }}</td>
                                    <td class="text-right">{{ $parish->laity->count() }}</td>
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
