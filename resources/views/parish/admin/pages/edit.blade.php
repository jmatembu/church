@extends('layouts.dashboard.app')
@section('pageTitle', 'Edit: ' . $page->title)
@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.css" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid mt--7">
        <div class="row my-5 justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-12 text-right">
                                <a class="btn btn-secondary" href="{{ route('parish.admin.pages.show', ['parish' => $parish, 'page' => $page]) }}"><i class="fas fa-chevron-left"></i> Back</a>
                            </div>
                        </div>

                        <form
                            action="{{ route('parish.admin.pages.update', ['parish' => $parish, 'pages' => $page]) }}"
                            method="POST"
                            id="post-editor-form"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            @if(! $page->isAboutParish())
                            <div class="form-group">
                                <label for="pages-title">Title</label>
                                <input type="text" class="form-control" name="title" id="pages-title" value="{{ old('title', $page->title) }}" required>
                            </div>
                            @endif
                            <div class="form-group">
                                <label for="post-editor">Body</label>
                                <textarea id="post-editor"
                                          class="p-3"
                                          name="body"
                                          placeholder="So what's new at the parish?">{{ old('body', $page->body) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="post-image">Featured Image</label>
                                <input type="file" class="form-control-file" name="post-image" id="post-image">
                            </div>
                            <div class="form-group text-right">
                                <a href="{{ route('parish.admin.pages.show', ['parish' => $parish, 'page' => $page]) }}" class="btn
                                        btn-secondary px-4"><i class="fas fa-chevron-left"></i> Cancel</a>
                                <button type="submit" class="btn btn-success px-4"><i class="fas fa-check"></i> Save Changes</button>
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
                body.attr('name', 'body');
                body.html($('#post-editor').summernote('code'));
                //$(this).append($body);
            });

        });
    </script>
@endpush
