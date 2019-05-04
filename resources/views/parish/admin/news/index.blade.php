@extends('layouts.dashboard.app')
@section('pageTitle', 'News at the Parish')
@section('content')
    <div class="container-fluid mt--7">
        <div class="row my-5 justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        @include('shared.notifications')
                        @include('shared.errors')
                        <div class="row mb-4">
                            <div class="col-md-12 text-right">
                                <a class="btn btn-primary" href="{{ route('parish.admin.news.create', $parish) }}">
                                    <i class="fas fa-plus"></i>
                                    Add News</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            @if ($parish->news->count())
                                <table class="table table-condensed">
                                    <thead class="d-none">
                                        <tr>
                                            <td>News Post</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($news as $post)
                                        <tr>
                                            <td>
                                                <div class="row">
                                                    @if($post->featured_image)
                                                    <div class="col-sm-2">
                                                        <img src="{{ asset($post->featured_image) }}" class="img-fluid mt-2" alt="">
                                                    </div>
                                                    @endif

                                                    <div class="col-sm-10">
                                                        <h3><a class="d-block" href="{{ route('parish.admin.news.show', [$parish, 'news' => $post]) }}">{{ $post->brief_title }}</a></h3>
                                                        <p class="text-wrap">{{ $post->snippet }}</p>
                                                        <div class="d-flex justify-content-between">
                                                            <span>Posted on: {{ $post->created_at->format('M d, Y') }}</span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $news->links() }}
                            @else
                                <p>You have not posted any news. Start by clicking the Create News Post button above</p>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
