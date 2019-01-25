@extends('parish.layout.app')
@section('title', 'Projects of ' . $parish->name)
@section('parishName', $parish->name)
@section('content')
    @include('parish.layout.partials.page-header', ['pageTitle' => 'Our Projects'])
    <!-- Projects -->
    @if($parish->projects->count())
    <section class="section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="sa-section-title text-center">
                        <h2>Our Projects</h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some</p>
                    </div>
                </div>
            </div>

            @foreach($parish->projects as $project)
            <div class="events_wrap">
                <div class="event_img">
                    <a href="#"><img src="{{ asset('assets/images/projects/2.jpg') }}" alt="image"></a>
                </div>
                <div class="event_info">
                    <h4><a href="#">{{ title_case($project->title) }}</a></h4>
                    <p>{{ $project->description }}</p>
                    <ul>
                        <li><i class="fa fa-clock-o"></i> Due Date:  {{ $project->created_at->addMonths(5)->format('M Y') }}</li>
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

@endsection