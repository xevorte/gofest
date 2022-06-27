@extends('layouts.auth')

@section('title', 'Gofest | Sign Up')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-10">
            <div class="card rounded-12 overflow-hidden"">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body pt-3 pb-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label fw-bold  text-md-right">{{ __('Name') }}</label>

                            <div class="col">
                                <input id="name" type="text" class="form-control py-2 px-3 rounded-12 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label fw-bold  text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col">
                                <input id="email" type="email" class="form-control py-2 px-3 rounded-12 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="job" class="col-md-4 col-form-label fw-bold  text-md-right">{{ __('Job') }}</label>

                            <div class="col">
                                <input id="job" type="text" class="form-control py-2 px-3 rounded-12 @error('job') is-invalid @enderror" name="job" value="{{ old('job') }}" required autocomplete="job" autofocus>

                                @error('job')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label fw-bold  text-md-right">{{ __('Password') }}</label>

                            <div class="col">
                                <input id="password" type="password" class="form-control py-2 px-3 rounded-12 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label fw-bold  text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col offset-md-4">
                                <button type="submit" class="btn bgColor bgHover fw-bold text-white">
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
@endsection
