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
                    <img src="{{ asset('assets/images/post_detail.jpg') }}" alt="image">
                </div>
                <h2>{{ $project->title }}</h2>
                <div class="post_meta">
                    <ul>
                        <li><i class="fa fa-user"></i> Post by: <a href="#">Parish Admin</a></li>
                        <li><i class="fa fa-calendar-check-o"></i> {{ $project->created_at->format('d M, Y') }}</li>
                    </ul>
                </div>
                <p>{{ $project->description }}</p>
                <blockquote>
                    <p>Curabitur porta quam sit amet est semper congue. The web design industry has been undergoing tremendous changes to meet the demand  But in certain circumstances and owing to the claims of duty</p>
                    <h6>- Frederick</h6>
                </blockquote>
                <ul>
                    <li><i class="fa fa-check-circle"></i> Internet tend to repeat predefined chunks. </li>
                    <li><i class="fa fa-check-circle"></i> Contrary to popular belief, Lorem Ipsum is not simply </li>
                    <li><i class="fa fa-check-circle"></i> On the other hand, we denounce with righteous </li>
                    <li><i class="fa fa-check-circle"></i> In a free hour, when our power of choice is untrammelled </li>
                    <li><i class="fa fa-check-circle"></i> But in certain circumstances and owing. </li>
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
            
            @include('parish.layout.partials.sidebar')
        </div>
    </div>
</section>
@endsection