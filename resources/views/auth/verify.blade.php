@extends('auth.layouts.master')

@section('content')
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div
                    class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="login-brand">
                        <strong class="text-primary">OMAH SARAS</strong>
                    </div>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Verify Your Email Address</h4>
                        </div>

                        <div class="card-body">
                            @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                            @endif

                            {{ __('Before proceeding, please check your email for a verification link.') }}
                            {{ __('If you did not receive the email') }},
                            <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                        </div>
                    </div>
                    <div class="mt-5 text-muted text-center">
                        Want to try sign in again ? <a href="{{ url('login') }}">Click here</a>
                    </div>
                    <div class="mt-2 text-muted text-center">
                        <a href="{{ url('/') }}">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection