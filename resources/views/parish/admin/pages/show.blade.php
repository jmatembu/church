@extends('parish.layout.backend')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="row mb-4">
                    <div class="col-md-12">
                        <h2 class="mb-sm-3">{{ $page->title }}</h2>
                    </div>
                    <div class="col-md-12 text-right">
                        <a class="btn btn-secondary" href="{{ route('parish.admin.pages.index', $parish) }}">< Back</a>
                        <a class="btn btn-warning" href="{{ route('parish.admin.pages.edit', ['parish' => $parish, 'page' => $page]) }}">! Edit</a>
                        @if(! $page->isAboutParish())
                        <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#deletePageModal">x Delete</button>
                        @endif
                    </div>
                </div>
                @if($page->featured_image)
                <div class="mb-4">
                    <img src="{{ asset($page->featured_image) }}" class="img-fluid">
                </div>
                @endif
                <div class="post-body">
                    {!! $page->body !!}
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    @if(! $page->isAboutParish())
    <div class="modal fade" id="deletePageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form class="d-inline-block" action="{{ route('parish.admin.pages.destroy', ['parish' => $parish, 'page' => $page]) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete this Page</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
