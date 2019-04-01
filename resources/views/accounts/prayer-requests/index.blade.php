@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                @include('parish.layout.partials.sidemenu')
            </div>
            <div class="col-md-9">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h2 class="mb-sm-3">Prayer Requests</h2>
                    </div>
                    <div class="col-md-6 text-right">
                        <a class="btn btn-primary" href="{{ route('users.prayerRequests.create') }}">+
                            Make Prayer Request</a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        @include('shared.notifications')
                        @if ($prayerRequests->count())
                        <table class="table table-condensed table-borderless table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Publish Date</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($prayerRequests as $prayerRequest)
                                    <tr>
                                        <td><a href="#">{{ $prayerRequest->title }}</a></td>
                                        <td>{{ $prayerRequest->publish_at }}</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-sm btn-info mr-2">! Edit</a>
                                            <a href="#" class="btn btn-sm btn-danger">x Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            <p>You have not made any prayer requests. Consider adding on above.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
