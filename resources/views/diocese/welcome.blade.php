@extends('layouts.site')
@section('meta')
    <meta name="keywords" content="{{ $diocese->name }}">
    <meta name="description" content="We are working on enabling {{ $diocese->name }} to report news, show its parishes, make announcements, showcase its projects among others. If there's a specific feature you wish to see, please use the feedback form.">
    <link rel="canonical" href="{{ route('dioceses.show', $diocese) }}">
@endsection
@section('title', $diocese->name)
@section('logo')
    {{ $diocese->name }}
@endsection
@section('content')
    <!-- Banner -->
    <section class="main-banner-section">
        <div class="sa-main-banner owl-carousel">
            <div class="item section-padding">
                <div class="container">
                    <div class="intro_text white_text pb-sm-5">
                        <h1>{{ $diocese->name }} Website Coming Soon</h1>
                        <p class="bg-dark py-5 px-4 rounded">We are working on enabling {{ $diocese->name }} to report news, show its parishes, make announcements, showcase its projects among others. If there's a specific feature you wish to see, please use the feedback form below.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /End Banner -->

    <section class="section-padding">
        <div class="container">
            <div class="about_us">
                <div class="sa-section-title text-center">
                    <h2>Why we are building <br><u>{{ config('app.name') }}</u></h2>
                </div>
                <p style="font-size: 1.125em">There is no doubt that information technology enhances delivery and consumption of services of any entity. The Catholic Church is no exception to this. {{ config('app.name') }} is a <strong>forever free service</strong> that is here to assist members of each parish community to have an even easier connection with their Parish, and in the same way assist the priests connect with their community. For example, members of a parish community shouldn't only get news updates when they attend mass. No! It would be great to have them have access to information and resources of the parish anytime and anywhere.</p>
                <p style="font-size: 1.125em">{{ config('app.name') }} also greatly cuts down the costs that would be required if each parish decided to build and manage its own online parish community. Well, {{ config('app.name') }} is an opt-in service. Therefore each Parish through its Parish Priest would need to request to be added to {{ config('app.name') }}.</p>
            </div>

        </div>
    </section>

    <section class="sa-contact-section pb-5" id="site-feedback">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 pb-5">
                    <h2 class="title mb-5 text-center" >We appreciate your feedback</h2>
                    <div class="sa-poster-con-info">
                        <p class="text-center">If you have any feedback about {{ config('app.name') }}, we would be more than happy to know about it. Use the contact form below to reach out to the administrators of {{ config('app.name') }}.</p>
                    </div>

                    <div class="sa-contact-area">
                        <form class="sa-contact-form pb-5" action="{{ route('feedback.store') }}" method="post" id="feedback-form">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input class="input-control" placeholder="Your real name" id="name" type="text" name="name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input class="input-control" id="feedback_email" placeholder="e.g john@example.com" type="email" name="email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea id="message" class="input-control" name="body" placeholder="Type your message here" rows="5" required></textarea>
                            </div>
                            <button type="submit" id="submit-feedback" class="btn black-btn">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
@endsection
