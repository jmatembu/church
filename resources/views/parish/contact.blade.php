@extends('parish.layout.app')
@section('title', 'Contact ' . $parish->name)
@section('parishName', $parish->name)
@section('content')
@include('parish.layout.partials.page-header', ['pageTitle' => 'Contact Us'])
<section class="section-padding">
    <div class="container">
        @if ($parish->map_location)
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="sa-section-title text-center">
                        <h2>Find {{ $parish->name }} on Google Maps</h2>
                    </div>
                </div>
            </div>

            <div class="map_wrap map_wrap-contact">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3554.859511213048!2d32.7171749430933!3d0.3700428231759754!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x15ae229fb8dff5c2!2sSt.+Augustine%2C+Seeta+Catholic+Church!5e0!3m2!1sen!2sus!4v1548420018006" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        @endif

        @if(! $parish->map_location)
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="sa-section-title text-center">
                        <p>You can reach us through the contacts below. Use the form to send an email the parish office.</p>
                    </div>
                </div>
            </div>
        @endif
        <div class="contact_wrap">
            <div class="row">
                <div class="col-md-5 secondary-bg">
                    <div class="contact_info">
                        <div class="box_heading">
                            <h4><span>We are here</span> Talk to Us</h4>
                        </div>
                        <p>{{ $parish->main_address }}</p>
                        <p>Call us: <span>{{ $parish->main_phone }}</span></p>
                        <p>Mail us: <span>{{ $parish->main_email }}</span></p>
                    </div>
                </div>
                <div class="col-md-7">
                    @include('shared.errors')
                    @include('shared.notifications');
                    <div class="form_wrap">
                        <form action="{{ route('parish.contact.send', $parish) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="contact_name">Name</label>
                                <input type="text" class="form-control" id="contact_name" name="name" placeholder="Type your name here" value="{{ old('name') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="contact_email">Email</label>
                                <input type="email" class="form-control" id="contact_email" name="email" placeholder="e.g tom@example.org" value="{{ old('email') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="contact_body">Your message</label>
                                <textarea name="body" id="contact_body" cols="45" rows="6" class="form-control" placeholder="Write your message here" required>{{ old('body') }}</textarea>
                            </div>
                            <div class="form-group">
                                <input class="btn dark-btn" value="Submit" type="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
