@extends('parish.layout.app')
@section('title', 'Latest News from ' . $parish->name)
@section('parishName', $parish->name)
@section('content')
    @include('parish.layout.partials.page-header', ['pageTitle' => 'Latest News'])
    <!-- News -->
    <section class="section-padding">
        <div class="container">
            @if($news->count())
            <div class="row">

                @foreach ($news as $post)
                <div class="col-md-6">
                    <div class="blog_wrap margin-btm-60">
                        @if($post->featured_image)
                        <div class="blog_img">
                            <a href="{{ route('parish.news.show', ['parish' => $parish, 'post' => $post]) }}">
                                <img src="{{ asset($post->featured_image) }}" alt="image">
                            </a>
                        </div>
                        @endif
                        <div class="blog_info">
                            <div class="post_date">{{ $post->start_publishing_at->format('d M, Y') }}</div>
                            <h5><a href="{{ route('parish.news.show', ['parish' => $parish, 'post' => $post]) }}">{{ $post->brief_title }}</a></h5>
                            <p>{!! $post->snippet !!}</p>
                            <a href="{{ route('parish.news.show', ['parish' => $parish, 'post' => $post]) }}" class="btn">Read This <i class="fa fa-caret-right"></i> </a>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
            
            <div class="divider pb-3 clearfix"></div>
            
                <!-- Pagination -->
            <div class="pagination_wrap">
                <div class="row">
                    <div class="col-sm-6">
                    <p>Page {{ $news->currentPage() }} of {{ $news->lastPage() }}</p>
                    </div>
                    <div class="col-sm-6">
                        {{ $news->links() }}
                    </div>
                </div>
            </div>
            <!-- /Pagination -->
            @else
            <p style="font-size: 2em;">Sorry we don't have any news at the moment.</p>
            @endif
        </div>
    </section>
    <!-- /Projects -->

@endsection
