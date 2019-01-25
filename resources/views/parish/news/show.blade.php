@extends('parish.layout.app')
@section('title', 'Projects of ' . $parish->name)
@section('parishName', $parish->name)
@section('content')
@include('parish.layout.partials.page-header', ['pageTitle' => $post->title])
<section class="post_detail section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="post_img">
                    <img src="https://lorempixel.com/900/480/?21647" alt="image">
                </div>
                <h2>{{ $post->title }}</h2>
                <div class="post_meta">
                    <ul>
                        <li><i class="fa fa-user"></i> Post by: <a href="#">Parish Admin</a></li>
                        <li><i class="fa fa-calendar-check-o"></i> {{ $post->start_publishing_at->format('d M, Y') }}</li>
                    </ul>
                </div>
                {!! $post->body !!}
                
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
            
            @include('parish.layout.partials.sidebar')
        </div>
    </div>
</section>
@endsection