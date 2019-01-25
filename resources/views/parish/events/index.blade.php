@extends('parish.layout.app')
@section('title', 'Events of ' . $parish->name)
@section('parishName', $parish->name)

@section('content')
    @include('parish.layout.partials.page-header', ['pageTitle' => 'Our Events'])
    <!-- Events -->
    @if($parish->events->count())
    <section class="section-padding">
        <div class="container">
            @foreach($parish->events as $event)
            <div class="events_wrap">
                <div class="event_date">
                    <span>{{ $event->starts_at->format('d') }}</span> {{ $event->starts_at->format("M' Y") }}
                </div>
                <div class="event_img">
                    <a href="#"><img src="{{ asset('assets/images/projects/2.jpg') }}" alt="image"></a>
                </div>
                <div class="event_info">
                    <h4><a href="#">{{ title_case($event->title) }}</a></h4>
                    <p>{{ $event->description }}</p>
                    <ul>
                        <li><i class="fa fa-clock-o"></i> Date:  {{ $event->starts_at->toDayDateTimeString() }}</li>
                        <li><i class="fa fa-map-marker"></i> Venue: {{ $event->budget }}</li>
                    </ul>
                    <a href="{{ route('parish.events.show', ['parish' => $parish, 'event' => $event]) }}" class="btn">See Details <i class="fa fa-caret-right"></i> </a>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endif
    <!-- /Projects -->

@endsection