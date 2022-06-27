@extends('layouts.auth')

@section('title', 'Gofest | Verify Account')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-10">
            <div class="card rounded-12 overflow-hidden"">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body pt-3 pb-4">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn bgColor bgHover fw-bold text-white align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
