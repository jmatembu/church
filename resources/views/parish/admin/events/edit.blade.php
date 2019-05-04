@extends('layouts.dashboard.app')
@section('pageTitle', 'Edit: ' . $event->title)
@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.css" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid mt--7">
        <div class="row my-5 justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        @include('shared.notifications')
                        @include('shared.errors')
                        <div class="row mb-4">
                            <div class="col-md-8">
                                <h2 class="mb-sm-3">Edit Event: {{ $event->title }}</h2>
                            </div>
                            <div class="col-md-4 text-right">
                                <a class="btn btn-secondary" href="{{ route('parish.admin.events.show', ['parish' => $parish, 'event' => $event]) }}">< Back</a>
                            </div>
                        </div>

                        <form
                            action="{{ route('parish.admin.events.update', ['parish' => $parish, 'event' => $event]) }}"
                            method="POST"
                            id="post-editor-form"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="news-title">Title</label>
                                <input type="text" class="form-control" name="title" id="news-title" value="{{ old('title', $event->title) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="post-editor">Body</label>
                                <textarea id="post-editor"
                                          class="p-3"
                                          name="description"
                                          rows="8"
                                          placeholder="So what's new at the parish?">{{ old('description', $event->description) }}</textarea>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="event-venue">Venue</label>
                                        <input type="text" class="form-control" name="venue" id="event-venue" value="{{ old('venue', $event->venue) }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="event-starts-at">Starts</label>
                                        <input type="text" class="form-control" name="starts_at" id="event-starts-at" value="{{ old('starts_at', $event->starts_at) }}" placeholder="e.g 2019-12-25 19:15:00" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="event-ends-at">Ends</label>
                                        <input type="text" class="form-control" name="ends_at" id="event-ends-at" value="{{ old('ends_at', $event->ends_at) }}" placeholder="e.g 2019-12-25 20:15:00" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="post-image">Featured Image</label>
                                <input type="file" class="form-control-file" name="featured_image" id="post-image">
                            </div>
                            <div class="form-group text-right">
                                <a href="{{ route('parish.admin.events.index', ['parish' => $parish, 'event' => $event]) }}" class="btn
                                        btn-secondary px-4">Cancel</a>
                                <button type="submit" class="btn btn-success px-4">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.js"></script>
    <script>
        $(document).ready(function() {
            $('#post-editor').summernote({
                height: 200,
                maxHeight: 500
            });

            $('#post-editor-form').submit(function () {
                var body = $('textarea');
                body.attr('name', 'description');
                body.html($('#post-editor').summernote('code'));
            });

        });
    </script>
@endpush
