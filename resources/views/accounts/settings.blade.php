@extends('layouts.dashboard.app')
@section('pageTitle', 'Settings')
@section('content')
<div class="container-fluid mt--6">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Settings</div>

                <div class="card-body">
                    @include('shared.notifications')
                    @include('shared.errors')

                    <form action="{{ route('users.settings.update') }}" method="post">
                        @csrf
                        @method('put')
                        <fieldset>
                            <div class="form-group">
                                <label for="default_parish_selector">Default Parish</label>
                                <p class="text-muted">This is the parish where you usually pray from.</p>
                                <select class="search-select form-control" name="default_parish" id="default_parish_selector">
                                    <option>Select Parish</option>
                                    @foreach($parishesByDiocese as $diocese => $dioceseParishes)
                                    <optgroup label="{{ $diocese }}">
                                        @foreach($dioceseParishes as $parish)
                                        <option value="{{ $parish->id }}" {{ Auth::user()->isCurrentParish($parish) ? 'selected' : '' }}>{{ $parish->name }}</option>
                                        @endforeach
                                    </optgroup>
                                    @endforeach
                                </select>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-grop">
                                <button class="btn btn-primary" type="submit">Save Changes</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
