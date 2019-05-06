@extends('parish.layout.app')
@section('title', $event->title . ' - ' . $parish->name)
@section('parishName', $parish->name)
@section('content')

@include('parish.layout.partials.page-header', ['pageTitle' => 'Event: ' . $event->title])
<section class="post_detail section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article>
                    @if($event->featured_image)
                    <div class="post_img">
                        <img src="{{ asset($event->featured_image) }}" alt="{{ $event->title }}">
                        <div class="event_timer">
                            <div class="date">
                                <span>{{ $event->starts_at->format('d') }}</span>
                                {{ $event->starts_at->format('M, Y') }}
                            </div>
                            <div class="timer">
                                <div id="countdown" data-start="{{ $event->starts_at->format('Y/m/d') }}"><span class="countdown-period"> <span>Days</span></span> <span class="countdown-period"> <span>Hours</span></span> <span class="countdown-period"> <span>Minutes</span></span> <span class="countdown-period"> <span>Seconds</span></span></div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <h2>{{ $event->title }}</h2>
                    <div class="post_meta">
                        <ul>
                            <li><i class="fa fa-user"></i> Post by: <a href="#">Parish Admin</a></li>
                            <li><i class="fa fa-calendar-check-o"></i>Date: {{ $event->starts_at->format('d M, Y') }}</li>
                            <li><i class="fa fa-location-arrow"></i>Venue: {{ $event->venue }}</li>
                        </ul>
                    </div>
                    <div class="post-body">
                        {!! $event->description !!}
                    </div>
                </article>
            </div>
            
            @include('parish.layout.partials.aside')
        </div>
    </div>
</section>
@endsection
