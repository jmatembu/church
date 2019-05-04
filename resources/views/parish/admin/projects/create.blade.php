@extends('layouts.dashboard.app')

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
                            <div class="col-md-6">
                                <h2 class="mb-sm-3">Create Project</h2>
                            </div>
                            <div class="col-md-6 text-right">
                                <a class="btn btn-secondary" href="{{ route('parish.admin.projects.index', $parish) }}">< Back</a>
                            </div>
                        </div>


                        <form
                            action="{{ route('parish.admin.projects.store', $parish) }}"
                            method="POST"
                            id="project-editor-form"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="projects-title">Title</label>
                                <input type="text" class="form-control" name="title" id="projects-title" required>
                            </div>
                            <div class="form-group">
                                <label for="post-editor">Description</label>
                                <textarea id="post-editor"
                                          class="p-3"
                                          name="description"
                                          placeholder="So what's this project about?"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="post-image">Featured Image</label>
                                <input type="file" class="form-control-file" name="featured_image" id="post-image">
                            </div>
                            <div class="form-group">
                                <label for="project-budget">Estimated Cost</label>
                                <input type="number" class="form-control" name="budget" id="project-budget" required>
                            </div>
                            <div class="form-group text-right">
                                <a href="{{ route('parish.admin.projects.index', $parish) }}" class="btn
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
