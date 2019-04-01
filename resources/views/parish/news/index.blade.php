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
                        <div class="blog_img">
                            <a href="{{ route('parish.news.show', ['parish' => $parish, 'newsItem' => $post]) }}"><img src="{{ $post->media['image'] }}" alt="image"></a>
                        </div>
                        <div class="blog_info">
                            <div class="post_date"><a href="{{ route('parish.news.show', ['parish' => $parish, 'newsItem' => $post]) }}">{{ $post->start_publishing_at->format('d M, Y') }}</a></div>
                            <h5><a href="{{ route('parish.news.show', ['parish' => $parish, 'newsItem' => $post]) }}">{{ str_limit($post->title, 50) }}</a></h5>
                            <p>{!! $post->snippet !!}</p>
                            <a href="{{ route('parish.news.show', ['parish' => $parish, 'newsItem' => $post]) }}" class="btn">Details <i class="fa fa-caret-right"></i> </a>
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
                    </div><div class="col-sm-6">
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
