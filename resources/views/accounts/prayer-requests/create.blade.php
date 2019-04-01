@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                @include('parish.layout.partials.sidemenu')
            </div>
            <div class="col-md-9">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h2 class="mb-sm-3">Make Prayer Request</h2>

                    </div>
                    <div class="col-md-6 text-right">
                        <a class="btn btn-secondary" href="{{ route('users.prayerRequests.index') }}"><
                            Back</a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        @include('shared.notifications')
                        @include('shared.errors')
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <p class="my-4">Members of your parish community who see this prayer request will join you in
                                    prayer.</p>
                                <form action="{{ route('users.prayerRequests.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="parish_id" value="{{ Auth::user()->current_parish }}">
                                    <div class="form-group">
                                        <label for="prayer-title">Prayer Title</label>
                                        <input type="text" class="form-control" name="title" id="prayer-title" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="prayer-title">Prayer Description <small class="text-secondary">- Provide
                                                details of
                                                your prayer in the text area below</small></label>
                                        <textarea type="text"
                                                  class="form-control"
                                                  name="description"
                                                  id="prayer-title"
                                                  rows="6"
                                                  required
                                                  placeholder="The description of your prayer request"></textarea>
                                    </div>
                                    <div class="form-group text-right">
                                        <a href="{{ route('users.prayerRequests.index') }}" class="btn
                                        btn-secondary px-4">Cancel</a>
                                        <button type="submit" class="btn btn-success px-4">Submit Prayer
                                            Request</button>
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
