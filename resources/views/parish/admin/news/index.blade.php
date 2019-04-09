@extends('parish.layout.backend')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
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
                        @if ($parish->news->count())
                            <table class="table table-condensed table-borderless table-striped">
                                <tbody>
                                @foreach($news as $post)
                                    <tr>
                                        <td>
                                            <div class="row">

                                                <div class="col-sm-2">
                                                    @if($post->featured_image)
                                                        <img src="{{ asset($post->featured_image) }}" class="img-fluid mt-2">
                                                    @endif
                                                </div>

                                                <div class="col-sm-10">
                                                    <a class="d-block" href="{{ route('parish.admin.news.show', ['parish' => $parish, 'newsPost' => $post]) }}">{{ $post->brief_title }}</a>
                                                    <p>{{ $post->snippet }}</p>
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
@endsection
