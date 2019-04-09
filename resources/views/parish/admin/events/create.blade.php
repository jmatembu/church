@extends('parish.layout.backend')

@section('styles')
    @parent
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h2 class="mb-sm-3">Create Event</h2>
                    </div>
                    <div class="col-md-6 text-right">
                        <a class="btn btn-secondary" href="{{ route('parish.admin.events.index', $parish) }}">< Back</a>
                    </div>
                </div>


                <form
                    action="{{ route('parish.admin.events.store', $parish) }}"
                    method="POST"
                    id="project-editor-form"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="events-title">Title</label>
                        <input type="text" class="form-control" name="title" id="events-title" required>
                    </div>
                    <div class="form-group">
                        <label for="post-editor">Description</label>
                        <textarea id="post-editor"
                                  class="p-3"
                                  name="description"
                                  placeholder="So what's this event about?"></textarea>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="event-venue">Venue</label>
                                <input type="text" class="form-control" name="venue" id="event-venue" required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="event-starts-at">Starts</label>
                                <input type="text" class="form-control" name="starts_at" id="event-starts-at" placeholder="e.g 2019-12-25 19:15:00" required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="event-ends-at">Ends</label>
                                <input type="text" class="form-control" name="ends_at" id="event-ends-at" placeholder="e.g 2019-12-25 20:15:00" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="post-image">Featured Image</label>
                        <input type="file" class="form-control-file" name="featured_image" id="post-image">
                    </div>
                    <div class="form-group text-right">
                        <a href="{{ route('parish.admin.events.index', $parish) }}" class="btn
                                btn-secondary px-4">Cancel</a>
                        <button type="submit" class="btn btn-success px-4">Save Changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
@section('scripts')

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
                body.attr('name', 'body');
                body.html($('#post-editor').summernote('code'));
                //$(this).append($body);
            });

        });
    </script>
@endsection
