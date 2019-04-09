@extends('parish.layout.backend')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="row mb-4">
                    <div class="col-md-12">
                        <h2 class="mb-sm-3">{{ $event->title }}</h2>
                    </div>
                    <div class="col-md-12 text-right mb-4">
                        <a class="btn btn-secondary" href="{{ route('parish.admin.events.index', $parish) }}">< Back</a>
                        <a class="btn btn-warning" href="{{ route('parish.admin.events.edit', ['parish' => $parish, 'events' => $event]) }}">! Edit</a>
                        <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#deleteNewsModal">x Delete</button>
                    </div>
                    <div class="col-md-12 d-flex justify-content-between mb-4">
                        <span class="h5"><strong>Venue:</strong> {{ $event->venue }}</span>
                        <span class="h5"><strong>Starts:</strong> {{ $event->starts_at }}</span>
                        <span class="h5"><strong>Ends:</strong> {{ $event->ends_at }}</span>
                    </div>
                </div>
                @if($event->featured_image)
                <div class="mb-4">
                    <img src="{{ asset($event->featured_image) }}" class="img-fluid">
                </div>
                @endif
                <div class="post-body">
                    {!! $event->description !!}
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="deleteNewsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>You are about to delete this event. This action cannot be undone. Do you want to continue?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form class="d-inline-block" action="{{ route('parish.admin.events.destroy', ['parish' => $parish, 'project' => $event]) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete Event</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
