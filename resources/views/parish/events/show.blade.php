@extends('parish.layout.app')
@section('title', $event->title . ' - ' . $parish->name)
@section('parishName', $parish->name)
@section('content')

@include('parish.layout.partials.page-header', ['pageTitle' => 'Event: ' . $event->title])
<section class="post_detail section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="post_img">
                    <img src="https://lorempixel.com/900/480/?21647" alt="image">
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
                <h2>{{ $event->title }}</h2>
                <div class="post_meta">
                    <ul>
                        <li><i class="fa fa-user"></i> Post by: <a href="#">Parish Admin</a></li>
                        <li><i class="fa fa-calendar-check-o"></i> {{ $event->starts_at->format('d M, Y') }}</li>
                    </ul>
                </div>
                <p>{{ $event->description }}</p>
                <blockquote>
                    <p>Curabitur porta quam sit amet est semper congue. The web design industry has been undergoing tremendous changes to meet the demand  But in certain circumstances and owing to the claims of duty</p>
                    <h6>- Frederick</h6>
                </blockquote>
                <ul>
                    <li><i class="fa fa-check-circle"></i> Internet tend to repeat predefined chunks. </li>
                    <li><i class="fa fa-check-circle"></i> Contrary to popular belief, Lorem Ipsum is not simply </li>
                </ul>
                
                <!-- Tags-Share -->
                <div class="tags_share">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="psot_share">
                                <span><strong>Share:</strong></span>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            @include('parish.layout.partials.sidebar-bk')
        </div>
    </div>
</section>
@endsection
