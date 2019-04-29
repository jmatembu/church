@extends('parish.layout.app')
@section('title', 'Events of ' . $parish->name)
@section('parishName', $parish->name)

@section('content')
    @include('parish.layout.partials.page-header', ['pageTitle' => 'Our Events'])
    <!-- Events -->
    @if($parish->events->count())
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @foreach($parish->events as $event)
                        <div class="events_wrap">
                            <div class="event_date">
                                <span>{{ $event->starts_at->format('d') }}</span> {{ $event->starts_at->format("M' Y") }}
                            </div>
                            @if($event->featured_image)
                                <div class="event_img">
                                    <a href="{{ route('parish.events.show', ['parish' => $parish, 'event' => $event]) }}"><img src="{{ asset('storage/' . $event->featured_image) }}" alt="image"></a>
                                </div>
                            @endif
                            <div class="event_info" @if(! $event->featured_image) style="width: 97.3%;" @endif>
                                <h4><a href="{{ route('parish.events.show', ['parish' => $parish, 'event' => $event]) }}">{{ title_case($event->title) }}</a></h4>
                                <p>{{ $event->description }}</p>
                                <ul>
                                    <li><i class="fa fa-clock-o"></i> Date:  {{ $event->starts_at->toDayDateTimeString() }}</li>
                                    <li><i class="fa fa-map-marker"></i> Venue: {{ $event->venue }}</li>
                                </ul>
                                <a href="{{ route('parish.events.show', ['parish' => $parish, 'event' => $event]) }}" class="btn">See Details <i class="fa fa-caret-right"></i> </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                @include('parish.layout.partials.aside')
            </div>

        </div>
    </section>
    @endif
    <!-- /Projects -->

@endsection
