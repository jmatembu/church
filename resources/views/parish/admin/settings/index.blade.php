@extends('parish.layout.backend')

<!-- @@section('styles')
    @@parent
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@@endsection -->

@section('content')
<section class="section">
    <div class="row">
        <div class="col-md-8">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Settings</li>
            </ol>
        </div>

{{--        <div class="col-md-4 text-right">--}}
{{--            <a href="{{ route('members.index') }}" class="btn btn-light"><i class="fe fe-chevron-left"></i> All Members</a>--}}
{{--            <a href="{{ route('members.loans.create', $member) }}" class="btn btn-primary"><i class="fe fe-dollar-sign"></i> Add Loan</a>--}}
{{--        </div>--}}

    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="mb-3 h1">Settings</h2>
                    <hr class="divider my-4"></hr>
                    <h3>Home Page Banner</h3>
                    <p>The home page banner appears only on the parish home page.</p>
                    <form action="{{ route('parish.admin.settings.banner', $parish) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="banner_background_image_path">Background Image <small class="d-block">The image file to be used as the background of the banner. Recommended size: 1900x800</small></label>

                            <input type="file" class="form-control-file" name="banner_background_image_path" id="banner_background_image_path" value="{{ old('banner_background_image_path') }}" accept="image/jpeg, image/png">
                            <small class="text-secondary">This will replace the existing image.</small>
                        </div>
                        <div class="form-group">
                            <label for="banner_headline">Headline Text <small class="d-block">This is the big bold text. Keep it precise and concise (less than 40 characters).</small></label>
                            <input type="text" class="form-control" name="banner_headline" id="banner_headline"  value="{{ old('banner_headline', $parish->banner_headline) }}">
                        </div>
                        <div class="form-group">
                            <label for="banner_description">Headline Description <small class="d-block">The smaller text that appears below the headline. A good way to provide extra information to the headline.</small></label>
                            <input type="text" class="form-control" name="banner_description" id="banner_description" value="{{ old('banner_description', $parish->banner_description) }}">
                        </div>
                        <div class="form-group">
                            <label for="banner_button_text">Action Button Text <small class="d-block">The text of the button on the banner. Keep it as short as one to two words, OK at most three words.</small></label>
                            <input type="text" class="form-control" name="banner_button_text" id="banner_button_text" value="{{ old('banner_button_text', $parish->banner_button_text) }}">
                        </div>

                        <div class="form-group">
                            <label for="banner_button_link">Action Button Link <small class="d-block">The link to where users will be directed when they click on the button.</small></label>
                            <input type="url" class="form-control" name="banner_button_link" id="banner_button_link" value="{{ old('banner_button_link', $parish->banner_button_link) }}">
                        </div>

                        <div class="form-group text-right">
                            <button class="btn btn-outline-primary" type="submit">Save Changes</button>
                        </div>
                    </form>

                    <hr class="divider my-4"></hr>

                    <h3>Parish Details</h3>

                    <form action="{{ route('parish.admin.settings.parishUpdate', $parish) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        @if($parish->logo)
                            <p>Current logo</p>
                            <div class=" w-30">
                                <img class="img-fluid" src="{{ asset('storage/' . $parish->logo) }}" alt="{{ $parish->name }} logo">
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="parish-logo">Logo</label>
                            <input type="file" class="form-control-file" name="logo" id="parish-logo">
                        </div>
                        <div class="form-group">
                            <label for="parish-description">Parish Welcome Message. <small>This appears at the <strong>"Welcome to {{ $parish->name }}"</strong> section </small></label>
                            <textarea
                                class="form-control"
                                name="description"
                                id="parish-description"
                                rows="8"
                                placeholder="Write the welcome message here">{{ old('description', $parish->description) }}</textarea>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-outline-primary">Save Changes</button>
                        </div>
                    </form>
                    <hr class="divider my-4">
                    <h3>Quotes <small>(Up to 5)</small></h3>
                    <p>One of the quotes randomly appears in the footer section</p>
                    @if(!empty($parish->quotes))
                        <ul>
                            @foreach($parish->quotes as $quote)
                                <li>
                                    <p>{{ $quote['text'] }}... <span class="text-muted">{{ $quote['author'] }}</span> </p>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    @if (count($parish->quotes) <= 5)
                        <form action="{{ route('parish.admin.settings.quotes.update', $parish) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="quote-text">Quote Text</label>
                                <input type="text" class="form-control" name="quote_text" id="quote-text" required>
                            </div>
                            <div class="form-group">
                                <label for="quote-author">Quote Author</label>
                                <input type="text" class="form-control" name="quote_author" id="quote-author" required>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-outline-primary">Save Changes</button>
                            </div>
                        </form>
                        <hr class="divider my-4">
                    @endif

                    <h3>Contacts</h3>
                    <form action="{{ route('parish.admin.settings.contacts', $parish) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="contact_address">Address</label>

                            <input type="text" class="form-control" name="contact_address" id="contact_address"  value="{{ old('contact_address', $parish->main_address) }}">
                        </div>
                        <div class="form-group">
                            <label for="contact_email">Email</label>
                            <input type="email" class="form-control" name="contact_email" id="contact_email" value="{{ old('contact_email', $parish->main_email) }}">
                        </div>
                        <div class="form-group">
                            <label for="contact_phone">Phone Number</label>
                            <input type="tel" class="form-control" name="contact_phone" id="contact_phone" value="{{ old('contact_phone', $parish->main_phone) }}">
                        </div>
                        <div class="form-group">
                            <label for="contact_location">Map Location Url</label>
                            <input type="text" class="form-control" name="contact_location" id="contact_location" value="{{ old('contact_location', $parish->map_location) }}">
                        </div>

                        <div class="form-group text-right">
                            <button class="btn btn-outline-primary" type="submit">Save Changes</button>
                        </div>
                    </form>
                    <div class="divider"></div>

                    <h3>Mass Schedules</h3>
                    <form action="{{ route('parish.admin.settings.massSchedule', $parish) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="mass_schedule_notes">Mass Schedule Notes <small>- Will appear besides the mass schedule</small></label>
                            <textarea class="form-control" name="mass_schedule_notes" id="mass_schedule_notes" rows="5">{{ old('mass_schedule_notes', $parish->mass_schedule_notes) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="sunday_schedule">Sunday</label>
                            <input type="text" class="form-control" name="sunday" id="sunday_schedule"  value="{{ old('sunday', $parish->mass_on_sunday) }}">
                        </div>
                        <div class="form-group">
                            <label for="monday_schedule">Monday</label>
                            <input type="text" class="form-control" name="monday" id="monday_schedule"  value="{{ old('monday', $parish->mass_on_monday) }}">
                        </div>
                        <div class="form-group">
                            <label for="tuesday_schedule">Tuesday</label>
                            <input type="text" class="form-control" name="tuesday" id="tuesday_schedule"  value="{{ old('tuesday', $parish->mass_on_tuesday) }}">
                        </div>
                        <div class="form-group">
                            <label for="wednesday_schedule">Wednesday</label>
                            <input type="text" class="form-control" name="wednesday" id="wednesday_schedule"  value="{{ old('wednesday', $parish->mass_on_wednesday) }}">
                        </div>
                        <div class="form-group">
                            <label for="thursday_schedule">Thursday</label>
                            <input type="text" class="form-control" name="thursday" id="thursday_schedule"  value="{{ old('thursday', $parish->mass_on_thursday) }}">
                        </div>
                        <div class="form-group">
                            <label for="friday_schedule">Friday</label>
                            <input type="text" class="form-control" name="friday" id="friday_schedule"  value="{{ old('friday', $parish->mass_on_friday) }}">
                        </div>
                        <div class="form-group">
                            <label for="saturday_schedule">Saturday</label>
                            <input type="text" class="form-control" name="saturday" id="saturday_schedule"  value="{{ old('saturday', $parish->mass_on_saturday) }}">
                        </div>

                        <div class="form-group text-right">
                            <button class="btn btn-outline-primary" type="submit">Save Changes</button>
                        </div>
                    </form>
                    <div class="divider"></div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

<!-- @@section('scripts')
    @@parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.search-select').select2();
        });
    </script>
@@endsection -->
