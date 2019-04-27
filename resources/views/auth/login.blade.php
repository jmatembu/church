@extends('layouts.site')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6 mt-5">
                <h2 class="mb-4 mt-5 text-center">{{ __('Login to your Parish') }}</h2>
                <div class="card">
                    <div class="card-body">
                        @include('shared.errors')
                        <form class="mb-5" method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email">{{ __('E-Mail Address') }}</label>

                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

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
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>

                            <div class="form-group row mb-0 align-items-center">
                                <div class="col-md-6 text-right">
                                    <button type="submit" class="btn black-btn btn-block">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                                <div class="col-md-6 text-right">
                                    @if (Route::has('password.request'))
                                        <a class="text-secondary" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
