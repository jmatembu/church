@extends('parish.layout.backend')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h2 class="mb-sm-3">Events at the Parish</h2>
                    </div>
                    <div class="col-md-6 text-right">
                        <a class="btn btn-primary" href="{{ route('parish.admin.events.create', $parish) }}">+
                            Create New Event</a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        @if ($events->count())
                            <table class="table table-condensed table-borderless table-striped">
                                <tbody>
                                @foreach($events as $event)
                                    <tr>
                                        <td>
                                            <div class="row">

                                                <div class="col-sm-2">
                                                    @if($event->featured_image)
                                                        <img src="{{ asset($event->featured_image) }}" class="img-fluid mt-2">
                                                    @endif
                                                </div>

                                                <div class="col-sm-10">
                                                    <a class="d-block" href="{{ route('parish.admin.events.show', ['parish' => $parish, 'eventsPost' => $event]) }}">{{ $event->title }}</a>
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
                            {{ $events->links() }}
                        @else
                            <p>You have not posted any events. Start by clicking the Create New Event button above</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
