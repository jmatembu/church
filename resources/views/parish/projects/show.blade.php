@extends('parish.layout.app')
@section('title', 'Projects of ' . $parish->name)
@section('parishName', $parish->name)
@section('content')
@include('parish.layout.partials.page-header', ['pageTitle' => 'Project: ' . $project->title])
<section class="post_detail section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @if($project->featured_image)
                <div class="post_img">
                    <img src="{{ asset('storage/' . $project->featured_image) }}" alt="Image of {{ $project->title }}">
                </div>
                @endif
                <h2>{{ $project->title }}</h2>
                <div class="post_meta">
                    <ul>
{{--                        <li><i class="fa fa-user"></i> Posted by: <a href="#">Parish Admin</a></li>--}}
                        <li><i class="fa fa-calendar-check-o"></i>Posted {{ $project->created_at->format('M d, Y') }}</li>
                    </ul>
                </div>
                {!! $project->description !!}
            </div>
            
            @include('parish.layout.partials.aside')
        </div>
    </div>
</section>
@endsection
