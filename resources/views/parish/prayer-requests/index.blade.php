@extends('parish.layout.app')
@section('title', 'Prayer Requests at ' . $parish->name)
@section('parishName', $parish->name)
@section('content')
    @include('parish.layout.partials.page-header', ['pageTitle' => 'Prayer Requests'])
    <!-- Prayer Requests -->

    <section class="post_detail section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @if($prayerRequests->count())
                        @foreach($prayerRequests as $prayerRequest)
                        <div class="sa-blog-post">
                            <div class="media">
                                {{--<img src="assets/images/author/3.png" alt="img">--}}
                                <div class="media-body">
                                    <h5 class="author-name">{{ $prayerRequest->title }}</h5>
                                    <p class="post-date">{{ $prayerRequest->user->full_name }} <span>posted on</span> {{
                                $prayerRequest->publish_at->format('M d, Y') }}</p>
                                </div>
                                {{--<div class="meta-share">--}}
                                {{--<span><i class="fa fa-heart"></i>75</span>--}}
                                {{--<span class="share"><i class="fa fa-share-alt"></i>40</span>--}}
                                {{--</div>--}}
                            </div>
                            <div>{!! $prayerRequest->description !!}</div>
                            {{--<a class="btn dark-btn" href="#"><i class="fa fa-heart-o"></i>I Prayed For This</a>--}}
                        </div>
                    @endforeach

                        <div class="row">
                        <div class="col-sm-12">
                            {{ $prayerRequests->links() }}
                        </div>
                    </div>
                    @else
                    <p style="font-size: 2em;">There are no prayer requests at the moment</p>
                    @endif
                </div>
                @include('parish.layout.partials.sidebar')
            </div>

        </div>
    </section>
    <!-- /Prayer Requests -->

@endsection
