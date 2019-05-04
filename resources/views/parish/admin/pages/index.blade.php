@extends('layouts.dashboard.app')
@section('pageTitle', 'Pages')
@section('content')
    <div class="container-fluid mt--7">
        <div class="row mt-5 justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    @include('shared.notifications')
                    <div class="card-body">
                        <div class="table-responsive">
                            @if ($parish->pages->count())
                                <table class="table table-condensed">
                                    <thead class="d-none">
                                    <tr>
                                        <th>Prayer Requests</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pages as $page)
                                        <tr>
                                            <td>
                                                <div class="row">
                                                    @if($page->featured_image)
                                                        <div class="col-sm-2">
                                                            <img src="{{ asset($page->featured_image) }}" class="img-fluid mt-2" alt="">
                                                        </div>
                                                    @endif

                                                    <div class="col-sm-10">
                                                        <h3><a class="d-block" href="{{ route('parish.admin.pages.show', ['parish' => $parish, 'page' => $page]) }}">{{ $page->brief_title }}</a></h3>
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

        @include('layouts.dashboard.footers.auth')
    </div>
@endsection
