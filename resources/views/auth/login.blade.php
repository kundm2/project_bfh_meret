@extends('master')

@section('title', 'Login')

<?php
    use Carbon\Carbon;
    $dt = Carbon::now();
?>

@section('content')


<section class="section">
        <div class="d-flex flex-wrap align-items-stretch">
          <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
            <div class="p-4 m-3">
              <img src="../assets/img/stisla-fill.svg" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2">
              <h4 class="text-dark font-weight-normal">Welcome to <span class="font-weight-bold">Meret</span></h4>
              <p class="text-muted">Before you get started, you must login or register if you don't already have an account.</p>

              <form method="POST" class="needs-validation" action="{{ route('login') }}">
                    @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                  <div class="d-block">
                    <label for="password" class="control-label">Password</label>
                  </div>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="custom-control-label" for="remember-me">{{ __('Remember Me') }}</label>
                  </div>
                </div>

                <div class="form-group text-right">
                    @if (Route::has('password.request'))
                    <a class="float-left mt-3" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                  <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                        {{ __('Login') }}
                  </button>
                </div>

                <div class="mt-5 text-center">
                  Don't have an account? <a href="{{ URL::to('/register') }}">Create new one</a>
                </div>
              </form>

            </div>
          </div>
          <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="../assets/img/unsplash/login-bg.jpg">
            <div class="absolute-bottom-left index-2">
              <div class="text-light p-5 pb-2">
                <div class="mb-5 pb-3">
                  <h1 class="mb-2 display-4 font-weight-bold">Good Mornig</h1>
                  <h5 class="font-weight-normal text-muted-transparent">Neuchâtel</h5>
                </div>
                Photo by <a class="text-light bb" target="_blank" href="https://unsplash.com/photos/a8lTjWJJgLA">Justin Kauffman</a> on <a class="text-light bb" target="_blank" href="https://unsplash.com">Unsplash</a>
              </div>
            </div>
          </div>
        </div>
      </section>

@endsection
