@extends('parish.layout.backend')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="row mb-4">
                    <div class="col-md-12">
                        <h2 class="mb-sm-3">Pages</h2>
                    </div>
{{--                    <div class="col-md-6 text-right">--}}
{{--                        <a class="btn btn-primary" href="{{ route('parish.admin.pages.create', $parish) }}">+--}}
{{--                            Create Page</a>--}}
{{--                    </div>--}}
                </div>

                <div class="card">
                    <div class="card-body">
                        @include('shared.notifications')
                        @if ($parish->pages->count())
                            <table class="table table-condensed table-borderless table-striped">
                                <tbody>
                                @foreach($pages as $page)
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    @if($page->hasFeaturedImage())
                                                        <img src="{{ asset($page->featured_image) }}" class="img-fluid mt-2">
                                                    @endif
                                                </div>

                                                <div class="col-sm-10">
                                                    <a class="d-block" href="{{ route('parish.admin.pages.show', ['parish' => $parish, 'page' => $page]) }}">{{ $page->brief_title }}</a>
                                                    <p>{{ $page->snippet }}</p>
                                                    <div class="d-flex justify-content-between">
                                                        <span>Posted on: {{ $page->created_at->format('M d, Y') }}</span>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $pages->links() }}
                        @else
                            <p>There are no pages. Create a page by clicking the Create Page button above.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
