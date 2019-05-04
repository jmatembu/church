@extends('layouts.dashboard.app')

@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.css" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid mt--7">
        <div class="row my-5 justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        @include('shared.notifications')
                        @include('shared.errors')
                        <div class="row mb-4">
                            <div class="col-md-8">
                                <h2 class="mb-sm-3">Edit Project: {{ $project->title }}</h2>
                            </div>
                            <div class="col-md-4 text-right">
                                <a class="btn btn-secondary" href="{{ route('parish.admin.projects.show', ['parish' => $parish, 'project' => $project]) }}">< Back</a>
                            </div>
                        </div>


                        <form
                            action="{{ route('parish.admin.projects.update', ['parish' => $parish, 'project' => $project]) }}"
                            method="POST"
                            id="post-editor-form"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="news-title">Title</label>
                                <input type="text" class="form-control" name="title" id="news-title" value="{{ old('title', $project->title) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="post-editor">Body</label>
                                <textarea id="post-editor"
                                          class="p-3"
                                          name="description"
                                          placeholder="So what's new at the parish?">{{ old('description', $project->description) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="post-image">Featured Image</label>
                                <input type="file" class="form-control-file" name="featured_image" id="post-image">
                            </div>
                            <div class="form-group">
                                <label for="project-budget">Estimated Cost</label>
                                <input type="number" class="form-control" name="budget" id="project-budget" value="{{ old('budget', $project->budget) }}" required>
                            </div>
                            <div class="form-group text-right">
                                <a href="{{ route('parish.admin.projects.index', ['parish' => $parish, 'project' => $project]) }}" class="btn
                                        btn-secondary px-4">Cancel</a>
                                <button type="submit" class="btn btn-success px-4">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.dashboard.footers.nav')
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
