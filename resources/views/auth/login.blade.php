@extends('layouts.auth')

@section('title', 'Gofest | Login')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="height: 88.8vh;">
        <div class="col-lg-8 col-10">
            <div class="card rounded-12 overflow-hidden"">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body pt-3 pb-4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label fw-bold  fw-bold text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col">
                                <input id="email" type="email" class="form-control py-2 px-3 rounded-12 py-2 px-3 rounded-12 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label fw-bold  text-md-right">{{ __('Password') }}</label>

                            <div class="col">
                                <input id="password" type="password" class="form-control py-2 px-3 rounded-12 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        <p>{{ __('Remember Me') }}</p>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-lg-8 col-10 offset-md-4">
                                <button type="submit" class="btn bgColor bgHover fw-bold text-white me-3 mb-sm-0 mb-2">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link p-0" href="{{ route('password.request') }}">
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
