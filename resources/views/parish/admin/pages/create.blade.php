@extends('layouts.dashboard.app')

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
                        <h2 class="mb-sm-3">Create Page</h2>
                    </div>
                    <div class="col-md-6 text-right">
                        <a class="btn btn-secondary" href="{{ route('parish.admin.news.index', $parish) }}">< Back</a>
                    </div>
                </div>


                <form
                    action="{{ route('parish.admin.news.store', $parish) }}"
                    method="POST"
                    id="post-editor-form"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="news-title">Title</label>
                        <input type="text" class="form-control" name="title" id="news-title" required>
                    </div>
                    <div class="form-group">
                        <label for="post-editor">Body</label>
                        <textarea id="post-editor"
                                  class="p-3"
                                  name="body"
                                  placeholder="So what's new at the parish?"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="post-image">Featured Image</label>
                        <input type="file" class="form-control-file" name="featured_image" id="post-image">
                    </div>
                    <div class="form-group text-right">
                        <a href="{{ route('parish.admin.news.index', $parish) }}" class="btn
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
