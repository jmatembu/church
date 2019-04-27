@extends('layouts.site')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6 mt-5">
            <h2 class="mb-4 mt-5 text-center">{{ __('Register') }}</h2>
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-11">
                            @include('shared.errors')
                            <form method="POST" action="{{ route('register') }}">

                                @csrf

                                <div class="form-group">
                                    <label for="first_name" class="">{{ __('FirstName') }}</label>
                                    <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                    @if ($errors->has('first_name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="last_name">{{ __('LastName') }}</label>
                                    <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus>

                                    @if ($errors->has('last_name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="email" class="">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="password" class="">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>

                                <div class="form-group">
                                    <label for="default_parish_selector">Parish <small class="text-secondary font-italic">This is
                                            the parish where you usually pray from. You can change this anytime.</small></label>

                                    <select class="search-select form-control" name="current_parish" id="default_parish_selector">
                                        <option>Select your current Parish</option>
                                        @foreach($parishesByDiocese as $diocese => $dioceseParishes)
                                            <optgroup label="{{ $diocese }}">
                                                @foreach($dioceseParishes as $parish)
                                                    <option value="{{ $parish->id }}">{{ $parish->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-0">
                                    <p class="text-darker">Your parish is not listed? You can still register and visit other parishes as you wait for your parish to be added.</p>
                                    <div class="text-right">
                                        <p class="text-muted">By registering, you agree to these <a href="{{ route('pages.terms') }}">Terms and Conditions</a></p>
                                        <button type="submit" class="btn black-btn btn-lg px-5">
                                            {{ __('Register') }}
                                        </button>

                                    </div>
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
