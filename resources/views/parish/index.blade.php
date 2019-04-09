@extends('parish.layout.app')
@section('title', $parish->name)
@section('parishName', $parish->name)
@section('content')
    <!-- Banner -->
    <section class="main-banner-section" style="background: url('{{ $parish->banner_background_image_path }}'); background-position: center; background-size: cover;">
        <div class="sa-main-banner owl-carousel">
            <div class="item section-padding">
                <div class="container">
                    <div class="intro_text white_text pb-sm-5">
                        <h1>{{ $parish->banner_headline }}</h1>
                        <p>{{ $parish->banner_description }}</p>
                        @if($parish->hasBannerButton())
                        <a href="{{ $parish->banner_button_link }}" class="btn btn-lg dark-btn">{{ $parish->banner_button_text }}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /End Banner -->

    <!-- Next-Events-Homilies -->
    @if(! empty($nextEvent) && ! empty($latestNews))
    <section class="latest_event_homilies">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="box_wrap next_event">
                        <p class="subtitle">Next Event</p>
                        <h4><a href="{{ route('parish.events.show', [$parish, $nextEvent]) }}">{{ title_case($nextEvent->title) }}</a></h4>
                        <div class="event_info">
                            <div class="event_date">
                                <span>{{ $nextEvent->starts_at->format('d') }}</span> {{ $nextEvent->starts_at->format('M y') }}
                            </div>
                            <ul>
                                <li><i class="fa fa-clock-o"></i> {{  $nextEvent->starts_at->diffForHumans() }}</li>
                                <li><i class="fa fa-paperclip"></i> {{ str_limit($nextEvent->description, 100) }}</li>
                            </ul>
                        </div>
                        <a href="{{ route('parish.events.show', [$parish, $nextEvent]) }}" class="btn">See Details <i class="fa fa-caret-right"></i> </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box_wrap next_homilies pb-3">
                        <p class="subtitle">Latest News</p>
                        <h4><a href="#">{{ $latestNews->brief_news_title }}</a></h4>
                        <ul class="homilies_meta">
                            <li><i class="fa fa-user"></i> Message from <a href="#">{{ optional($latestNews->author)->name }}</a></li>
                            <li><i class="fa fa-calendar-check-o"></i> {{ optional($latestNews->start_publishing_at)->diffForHumans() }}</li>
                        </ul>
                        <div class="homilies_inside">
                            <p class="mb-3">{{ $latestNews->brief_snippet }}</p>
                            <a href="{{ route('parish.news.show', [$parish, $latestNews]) }}" class="btn">See Details <i class="fa fa-caret-right"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- /Next-Events-Homilies -->

    <!-- About -->
    <section class="sa-about-us-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-8 order-lg-1 sa-about-us-bg">
                    <img src="assets/images/bg/2.png" alt="img">
                </div>
                <div class="col-lg-8 order-lg-12">
                    <div class="sa-about-us-details">
                        <h2>Welcome to {{ $parish->name }}</h2>
                        <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).  If you are going to use a passage of Lorem.</p>
                        <p>You need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined. chunks as necessary.</p>
                        @if($parish->about_page)
                            <a class="btn btn-lg dark-btn" href="{{ route('parish.about', $parish) }}">Read more...</a>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
     <!-- /About -->

    <!-- Latest-Events-News -->
    <section class="section-padding latest_event_homilies m-0">
        <div class="container">
            <div class="row">
                @if($latestEvents->count())
                    <div class="col-md-6 col-lg-5">
                    <div class="heading">
                        <h3>Latest Events</h3>
                        <a href="{{ route('parish.events.index', $parish) }}" class="btn btn-sm pull-right">See All</a>
                    </div>
                    <div class="event_list">
                        <ul>
                            @foreach($latestEvents as $event)
                            <li>
                                <div class="event_info">
                                    <div class="event_date">
                                        <span>{{ $event->starts_at->format('d') }}</span> {{ $event->starts_at->format('M y') }}
                                    </div>
                                    <h6><a href="#">{{ title_case($event->title) }}</a></h6>
                                    <ul>
                                        <li><i class="fa fa-clock-o"></i> {{ $event->starts_at->diffForHumans() }}</li>
                                        <li><i class="fa fa-paperclip"></i> {{ str_limit($event->description, 50) }}</li>
                                    </ul>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
                @if($news->count())
                    <div class="col-md-6 col-lg-5 offset-lg-2">
                        <div class="heading">
                            <h3>Latest News</h3>
                            <a href="{{ route('parish.news.index', $parish) }}" class="btn btn-sm pull-right">See All</a>
                        </div>
                        <div class="event_list">
                            <ul>
                                @foreach($news as $post)
                                    <li>
                                        <div class="event_info">
                                            <div class="event_date">
                                                <span>{{ $post->start_publishing_at->format('d') }}</span> {{ $post->start_publishing_at->format('M y') }}
                                            </div>
                                            <h6><a href="#">{{ $post->brief_news_title }}</a></h6>
                                            <ul>
                                                <li><i class="fa fa-sticky-note"></i> {{ $post->brief_news_snippet }}</li>
                                            </ul>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!-- /Latest-Events-Homilies -->

    <!-- Projects -->
    @if($projects->count())
    <section class="section-padding sa-schedules-wrap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="sa-section-title text-center">
                        <h2>Current Projects</h2>
                        <p>We have various projects running at the parish, here are the major ones.</p>
                    </div>
                </div>
            </div>

            @foreach($projects as $project)
            <div class="events_wrap">
                @if($project->featured_image)
                <div class="event_img">
                    <a href="{{ route('parish.projects.show', ['parish' => $parish, 'project' => $project]) }}"><img src="{{ asset($project->featured_image) }}" alt="{{ $project->title }}"></a>
                </div>
                @endif
                <div class="event_info">
                    <h4 class="mt-0"><a href="{{ route('parish.projects.show', ['parish' => $parish, 'project' => $project]) }}">{{ $project->title }}</a></h4>
                    <div class="mb-4">
                        {!! $project->brief_description !!}
                    </div>
                    <ul>
{{--                        <li><i class="fa fa-clock-o"></i> Due Date:  {{ $project->created_at->addMonths(5)->format('M Y') }}</li>--}}
                        <li><i class="fa fa-dollar"></i> Bugdet: {{ $project->budget }}</li>
                    </ul>
                    <a href="{{ route('parish.projects.show', ['parish' => $parish, 'project' => $project]) }}" class="btn">See Details <i class="fa fa-caret-right"></i> </a>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endif
    <!-- /Projects -->

    <!-- Services -->
    {{--<section class="sa-schedules-wrap pd-default">--}}
        {{--<div class="container">--}}
            {{--<div class="sa-schedules-section">--}}
                {{--<div class="row">--}}
                    {{--<div class="col-lg-5 col-12">--}}
                        {{--<div class="sa-schedule">--}}
                            {{--<div class="sa-schedules-heading">--}}
                                {{--<h2>Service Times &amp; Schedules</h2>--}}
                                {{--<p>Many desktop publishing packages and the web page editors now use lorem Ipsum as their default model text and a search fornt.</p>--}}
                            {{--</div>--}}

                            {{--<a class="btn dark-btn" href="#">Contact us</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-7 col-12">--}}
                        {{--<table class="table sa-schedules-table">--}}
                            {{--<thead class="thead-dark">--}}
                                {{--<tr>--}}
                                    {{--<th scope="col">Schedule Day</th>--}}
                                    {{--<th scope="col">Time</th>--}}
                                {{--</tr>--}}
                            {{--</thead>--}}
                            {{--<tbody class="table-body">--}}
                                {{--<tr>--}}
                                    {{--<th scope="row">Saturday</th>--}}
                                    {{--<td>2:00 PM - 5:45 PM</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<th scope="row">Sunday</th>--}}
                                    {{--<td>4:00 PM - 9:45 PM</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<th scope="row">Monday</th>--}}
                                    {{--<td>9:00 PM - 5:45 PM</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<th scope="row">Tuesday</th>--}}
                                    {{--<td>2:00 PM - 5:45 PM</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<th scope="row">Wednesday</th>--}}
                                    {{--<td>2:00 PM - 5:45 PM</td>--}}
                                {{--</tr>--}}
                            {{--</tbody>--}}
                        {{--</table>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
    <!-- /Services -->
@endsection
