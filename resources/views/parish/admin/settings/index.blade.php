@extends('layouts.app')

<!-- @@section('styles')
    @@parent
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@@endsection -->

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            @include('parish.layout.partials.admin-sidemenu')
        </div>
        <div class="col-md-9">
            <h2 class="mb-3">Settings</h2>
            <div class="card">


                <div class="card-body">
                    @include('shared.notifications')
                    <div class="row justify-content-center">
                        <div class="col-md-8">
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
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
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
