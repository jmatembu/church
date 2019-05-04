@extends('parish.layout.app')
@section('title', 'Projects of ' . $parish->name)
@section('parishName', $parish->name)
@section('content')
@include('parish.layout.partials.page-header', ['pageTitle' => $post->brief_news_title])
<section class="post_detail section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @if($post->featured_image)
                <div class="post_img">
                    <img src="{{ asset($post->featured_image) }}" alt="image">
                </div>
                @endif
                <h2>{{ $post->title }}</h2>
                <div class="post_meta">
                    <ul>
                        <li><i class="fa fa-user"></i> Post by: <a href="#">Parish Admin</a></li>
                        <li><i class="fa fa-calendar-check-o"></i> {{ $post->start_publishing_at->format('d M, Y') }}</li>
                    </ul>
                </div>
                {!! $post->body !!}
            </div>
            
            @include('parish.layout.partials.aside')
        </div>
    </div>
</section>
@endsection
