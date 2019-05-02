@extends('layouts.dashboard.app')
@section('pageTitle', 'Add Prayer Request')
@section('content')
    <div class="container-fluid mt--7">
        <div class="row mt-5 justify-content-center">
            <div class="col-md-9">

                <div class="card">
                    <div class="card-body">

                        @include('shared.notifications')
                        @include('shared.errors')
                        <div class="row justify-content-center">
                            <div class="col-md-11">
                                <p class="my-4">Members of your parish community who see this prayer request will join you in
                                    prayer.</p>
                                <form action="{{ route('users.prayerRequests.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="prayer-title">Prayer Title</label>
                                        <input type="text" class="form-control" name="title" id="prayer-title" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="prayer-title">Prayer Description <small class="text-muted">- Provide details of your prayer in the text area below</small></label>
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
                                        btn-secondary px-4"><i class="fa fa-chevron-left"></i> Cancel</a>
                                        <button type="submit" class="btn btn-primary px-4"><i class="fa fa-check"></i> Submit Prayer Request</button>
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
