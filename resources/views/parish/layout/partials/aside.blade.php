<!-- Sidebar -->
<aside class="col-md-4">
{{--    <div class="sa-sidebar sa-responsive">--}}
{{--        <div class="widget sa-widget-search">--}}
{{--            <h4 class="widget-title">Get Parish Updates</h4>--}}
{{--            <div class="search">--}}
{{--                <form>--}}
{{--                    <input type="text" class="form-control" placeholder="Email address...">--}}
{{--                    <small>We don't spam your inbox</small>--}}
{{--                    <a class="btn dark-btn" href="#">Subscribe</a>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div><!-- /. widget-search -->--}}
{{--    </div>--}}
    <div class="sidebar_wrap">
{{--        <div class="sidebar_widgets">--}}
{{--            <div class="search">--}}
{{--                <form>--}}
{{--                    <input type="text" class="form-control" placeholder="Enter Keyword">--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
        
        <div class="sidebar_widgets">
            @if($parish->latestAsideNews->count())
            <div class="widget_title">
                <h6>Recent News</h6>
            </div>
            <div class="recent_post">
                <ul>
                    @foreach($parish->latestAsideNews as $post)
                    <li @if(! $post->featured_image) style="padding-left: 0;" @endif>
                        @if($post->featured_image)
                        <div class="post_thumb" style="height:  auto;">
                            <a href="{{ route('parish.news.show', ['parish' => $parish, 'news' => $post]) }}"><img src="{{ asset('storage/' . $post->featured_image) }}" alt="image"></a>
                        </div>
                        @endif
                        <h6 class="mt-0"><a href="#">{{ $post->brief_news_title }}</a></h6>
                        <p>{{ $post->published_at }}</p>
                    </li>
                    @endforeach
                </ul>

                <a href="{{ route('parish.news.index', $parish) }}">Read Rest of the News</a>
            </div>
            @endif
        </div>
    </div>
</aside>
<!-- /Sidebar -->
