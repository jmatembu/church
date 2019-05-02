@extends('layouts.dashboard.app')
@section('pageTitle', 'Prayer Requests')
@section('content')
    <div class="container-fluid mt--7">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if(Auth::user()->current_parish)
                        <div class="row mb-4">
                            <div class="col-12 text-right">
                                <a class="btn btn-secondary" href="{{ route('users.prayerRequests.create') }}">
                                    <i class="fa fa-plus"></i>
                                    Add Prayer Request</a>
                            </div>
                        </div>
                        @endif
                        @include('shared.notifications')
                        @if ($prayerRequests->count())
                        <table class="table table-condensed">
                            <thead class="d-none">
                                <tr>
                                    <th>Prayer Requests</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($prayerRequests as $prayerRequest)
                                    <tr>
                                        <td>
                                            <h3>{{ $prayerRequest->title }}</h3>
                                            <p>{{ $prayerRequest->description }}</p>
                                            <small>Published: {{ $prayerRequest->publish_at->toDateString() }} ({{ $prayerRequest->publish_at->diffForHumans() }})</small>

                                            <div class="text-right">
                                                <a href="{{ route('users.prayerRequests.edit', $prayerRequest) }}" class="btn btn-sm btn-warning mr-2 px-3"><i class="fa fa-pen"></i> Edit</a>
                                                <button type="button" class="btn btn-sm btn-light modal-action-btn px-3" data-toggle="modal" data-target="#modalDanger" data-action-url="{{ route('users.prayerRequests.destroy', $prayerRequest) }}"><i class="fa fa-trash"></i> Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            <p>Your prayer requests will appear here.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.dashboard.footers.auth')
    </div>
    <div class="modal fade" id="modalDanger" tabindex="-1" role="dialog" aria-labelledby="modalDanger" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
            <div class="modal-content bg-gradient-danger">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="py-3 text-center">
                        <i class="ni ni-bell-55 ni-3x"></i>
                        <h4 class="heading mt-4">Are you sure about this?</h4>
                        <p>This action will delete this prayer request, and cannot be undone.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <form class="d-inline-block" action="" method="post" id="delete-prayer-request-form">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-white">Yes, Delete</button>
                    </form>
                    <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function (e) {
           var modalBtn = $('.modal-action-btn');
           modalBtn.click(function (e) {
               $('#delete-prayer-request-form').attr('action', modalBtn.attr('data-action-url'));
           });
        });
    </script>
@endpush
