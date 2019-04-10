@extends('parish.layout.app')
@section('title', 'About ' . $parish->name)
@section('parishName', $parish->name)
@section('content')
    <section class="sa-page-title text-left" style="background-image: url('{{ asset('storage/' . $page->featured_image) }}')">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>About the Parish</h1>
                </div>
                <div class="col-md-12">
                    <nav class="breadcrumb">
                        <ul>
                            <li class="breadcrumb-item"><a href="{{ route('parish.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">About the Parish</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding">
        <div class="container">
            <div class="about_us">
                <div class="section-header text-center">
                    <h2><u>{{ $parish->name }}</u></h2>
                </div>
                <div class="text-left">
                    {!! $page->body !!}
                </div>

            </div>
        </div>

        <div class="container">
            @if($parish->clergies->count())
            <!-- Team -->
            <div class="our_team">
                <div class="section-header text-center">
                    <h2>Our Priests</h2>
                    <p>Here are a few details about our parish priests.</p>
                </div>

                <div class="row justify-content-center">
                    @foreach($parish->clergies as $clergy)
                    <div class="col-md-4 col-sm-6">
                        <div class="box_wrap">
                            <div class="team_img">
                                <img src="assets/images/member_1.jpg" alt="image">
                                <div class="team_url"><a href="#"><i class="fa fa-plus"></i></a></div>
                            </div>
                            <div class="icon"><img src="assets/images/icon.png" alt="image"></div>
                            <h6>David Dahan</h6>
                            <p>Lead Pastor</p>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
            <!-- /Team -->
            @endif
            <div class="text-center margin-top-10">
                <a href="{{ route('parish.projects.index', $parish) }}" class="btn btn-lg dark-btn">Explore Projects</a>
            </div>
        </div>
    </section>
@endsection
