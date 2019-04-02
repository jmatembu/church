@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                @include('parish.layout.partials.admin-sidemenu')
            </div>
            <div class="col-md-9">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h2 class="mb-sm-3">News at the Parish</h2>
                    </div>
                    <div class="col-md-6 text-right">
                        <a class="btn btn-primary" href="{{ route('parish.admin.news.create', $parish) }}">+
                            Create News Post</a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        @include('shared.notifications')
                        @if ($parish->news->count())
                            <table class="table table-condensed table-borderless table-striped">
                                <tbody>
                                @foreach($news as $post)
                                    <tr>
                                        <td>
                                            <a class="d-block" href="{{ route('parish.admin.news.show', ['parish' => $parish, 'newsPost' => $post]) }}">{{ $post->brief_title }}</a>
                                            <p class="text-secondary">{{ $post->snippet }}</p>
                                            <div class="d-flex justify-content-between">
                                                <span class="text-secondary">Posted on: {{ $post->created_at->format('M d, Y') }}</span>

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
@endsection
