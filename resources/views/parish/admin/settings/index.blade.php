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
