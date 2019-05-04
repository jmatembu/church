@extends('layouts.dashboard.app')
@section('pageTitle', $news->title)
@section('content')
    <div class="container-fluid mt--7">
        <div class="row my-5 justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="col-md-12">
                                <h2>{{ $news->title }}</h2>
                            </div>
                            <div class="col-md-12 text-right">
                                <a class="btn btn-light" href="{{ route('parish.admin.news.index', $parish) }}"><i class="fas fa-chevron-left"></i> Back</a>
                                <a class="btn btn-warning" href="{{ route('parish.admin.news.edit', ['parish' => $parish, 'news' => $news]) }}"><i class="fas fa-edit"></i> Edit</a>
                                <button class="btn btn-secondary" type="button" data-toggle="modal" data-target="#deleteNewsModal"><i class="fas fa-trash"></i> Delete</button>
                            </div>
                        </div>
                        @if($news->featured_image)
                            <div class="mb-4">
                                <img src="{{ asset($news->featured_image) }}" class="img-fluid">
                            </div>
                        @endif
                        <div class="post-body">
                            {!! $news->body !!}
                        </div>
                    </div>
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
                    <p>You are about to delete this post. This action cannot be undone. Do you want to continue?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form class="d-inline-block" action="{{ route('parish.admin.news.destroy', ['parish' => $parish, 'news' => $news]) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete this Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
