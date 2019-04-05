@extends('parish.layout.app')
@section('title', 'Projects of ' . $parish->name)
@section('parishName', $parish->name)
@section('content')
@include('parish.layout.partials.page-header', ['pageTitle' => 'Project: ' . $project->title])
<section class="post_detail section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="post_img">
                    <img src="https://lorempixel.com/900/480/?21647" alt="image">
                </div>
                <h2>{{ $project->title }}</h2>
                <div class="post_meta">
                    <ul>
                        <li><i class="fa fa-user"></i> Post by: <a href="#">Parish Admin</a></li>
                        <li><i class="fa fa-calendar-check-o"></i> {{ $project->created_at->format('d M, Y') }}</li>
                    </ul>
                </div>
                {!! $project->description !!}
            </div>
            
            @include('parish.layout.partials.sidebar-bk')
        </div>
    </div>
</section>
@endsection
