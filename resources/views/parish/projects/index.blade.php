@extends('parish.layout.app')
@section('metaDescription', config('app.name') . ' is currently involved in a number of projects. See their details below.')
@section('metaKeywords', $parish->name . ' projects, ' . config('app.name') . ', ' . 'projects, church projects')
@section('title', 'Projects of ' . $parish->name)
@section('parishName', $parish->name)
@section('content')
    @include('parish.layout.partials.page-header', ['pageTitle' => 'Our Projects'])
    <!-- Projects -->
    @if($parish->projects->count())
    <section class="section-padding">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    @foreach($parish->projects as $project)
                        <div class="events_wrap">
                            @if($project->featured_image)
                                <div class="event_img">
                                    <a href="{{ route('parish.projects.show', ['parish' => $parish, 'project' => $project]) }}">
                                        <img src="{{ asset($project->featured_image) }}" alt="image"></a>
                                </div>
                            @endif
                            <div class="event_info" @if(! $project->featured_image) style="width: 97.3%;" @endif>
                                <h4><a href="{{ route('parish.projects.show', ['parish' => $parish, 'project' => $project]) }}">{{ title_case($project->title) }}</a></h4>
                                <div class="post-body mb-4">
                                    {!! $project->brief_description !!}
                                </div>
                                <ul>
                                    <li><i class="fa fa-dollar"></i> Bugdet: {{ $project->formatted_budget }}</li>
                                </ul>
                                <a href="{{ route('parish.projects.show', ['parish' => $parish, 'project' => $project]) }}" class="btn">See Details <i class="fa fa-caret-right"></i> </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>
    @endif
    <!-- /Projects -->

@endsection
