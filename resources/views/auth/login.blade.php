@extends('layouts.main')

@section('title', 'Log In')

@section('content')

    <div class="login-container">
        <div class="form-wrapper-guest row" style="min-height: 500px;">

            <div class="col-md-8">
             @include('auth.info-login')
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="page-subtitle">
                            LOG IN
                        </h4>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email">{{ __('Username') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                       value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password" required
                                       autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>

                            <div class="form-group form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                {{--<label class="form-check-label" for="remember">--}}
                                    {{--{{ __('Remember Me') }}--}}
                                {{--</label>--}}
                            </div>

                            <div class="form-group">
                                <button type="submit" class="col-sm-6 btn btn-primary">
                                    {{ __('Log In') }}
                                </button>

                                {{--@if (Route::has('password.request'))--}}
                                    {{--<a class="btn btn-link"--}}
                                       {{--href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>--}}
                                {{--@endif--}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
