@extends('layouts.dashboard.app')
@section('pageTitle', 'Events')
@section('content')
    <div class="container-fluid mt--7">
        <div class="row my-5 justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        @include('shared.notifications')
                        @include('shared.errors')
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h2 class="mb-sm-3">Events at the Parish</h2>
                            </div>
                            <div class="col-md-6 text-right">
                                <a class="btn btn-primary" href="{{ route('parish.admin.events.create', $parish) }}">
                                    <i class="fas fa-plus"></i>
                                    Add Event
                                </a>
                            </div>
                        </div>
                        @if ($events->count())
                            <div class="table-responsive">
                                <table class="table table-condensed table-borderless table-striped">
                                    <tbody>
                                    @foreach($events as $event)
                                        <tr>
                                            <td>
                                                <div class="row">

                                                    @if($event->featured_image)
                                                    <div class="col-sm-2">
                                                        <img src="{{ asset($event->featured_image_thumb) }}" class="img-fluid mt-2" alt="">
                                                    </div>
                                                    @endif

                                                    <div class="col-sm-10">
                                                        <h3>
                                                            <a class="d-block"
                                                               href="{{ route('parish.admin.events.show', ['parish' => $parish, 'eventsPost' => $event]) }}"
                                                               title="{{ $event->title }}">
                                                                {{ $event->title }}
                                                            </a>
                                                        </h3>
                                                        <p>{{ $event->snippet }}</p>
                                                        <div class="d-flex justify-content-between">
                                                            <small>Posted on: {{ $event->created_at->format('M d, Y') }}</small>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $events->links() }}
                        @else
                            <p>You have not posted any events. Start by clicking the Create New Event button above</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.dashboard.footers.nav')
    </div>
@endsection
