@extends('master')

@section('title', 'Login')

<?php
    use Carbon\Carbon;
    $dt = Carbon::now();
?>

@section('content')

<section class="section">
        <div class="container mt-5">
          <div class="row">
            <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
              <div class="login-brand">
                <img src="../assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
              </div>

              <div class="card card-primary">
                <div class="card-header"><h4>{{ __('Register') }}</h4></div>

                <div class="card-body">
                  <form method="POST">
                      @csrf
                    <div class="row">
                      <div class="form-group col-6">
                        <label for="frist_name">{{ __('First name') }}</label>
                        <input id="frist_name" type="text" class="form-control" name="frist_name" autofocus>
                      </div>
                      <div class="form-group col-6">
                        <label for="name">{{ __('Name') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="email">{{ __('E-Mail') }}</label>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>

                    <div class="row">
                      <div class="form-group col-6">
                        <label for="password" class="d-block">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div id="pwindicator" class="pwindicator">
                          <div class="bar"></div>
                          <div class="label"></div>
                        </div>
                      </div>
                      <div class="form-group col-6">
                        <label for="password-confirm" class="d-block">{{ __('Password Confirmation') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                      </div>
                    </div>

                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-lg btn-block">
                            {{ __('Register') }}
                      </button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="simple-footer">
                Copyright &copy; Stisla 2018
              </div>
            </div>
          </div>
        </div>
      </section>

@endsection
