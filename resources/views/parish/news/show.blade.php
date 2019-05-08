@extends('parish.layout.app')
@section('title', 'Projects of ' . $parish->name)
@section('parishName', $parish->name)
@section('content')
@include('parish.layout.partials.page-header', ['pageTitle' => $post->brief_news_title])
<section class="post_detail section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article
                    itemid="{{ route('parish.news.show', ['parish' => $parish, 'post' => $post]) }}"
                    itemscope
                    itemtype="https://schema.org/BlogPosting">
                    @if($post->featured_image)
                    <div class="post_img">
                        <img src="{{ asset($post->featured_image) }}" alt="image">
                    </div>
                    @endif
                    <h2 itemprop="headline">{{ $post->title }}</h2>
                    <div class="post_meta">
                        <ul>
                            <li><i class="fa fa-user"></i> Post by: <a href="#" itemprop="author" itemscope itemtype="http://schema.org/Person"><span itemprop="name">{{ $post->author->full_name }}</span></a></li>
                            <li>
                                <i class="fa fa-calendar-check-o"></i>
                                {{ $post->start_publishing_at->format('d M, Y') }}
                                <meta itemprop="datePublished" content="{{ $post->created_at }}">
                                <meta itemprop="dateModified" content="{{ $post->updated_at }}">
                            </li>
                        </ul>
                    </div>
                    <div itemprop="articleBody">{!! $post->body !!}</div>
                </article>
            </div>
            
            @include('parish.layout.partials.aside')
        </div>
    </div>
</section>
@endsection
