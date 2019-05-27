@extends('master')

@section('title', __('Reset Password') )

<?php
    use Carbon\Carbon;
    $dt = Carbon::now();
?>

@section('content')

<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                    <div class="form-group">
                      <label for="email">{{ __('E-Mail') }}</label>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-lg btn-block">
                            {{ __('Send Password Reset Link') }}
                      </button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

