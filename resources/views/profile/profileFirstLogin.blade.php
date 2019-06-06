@extends('master')

@section('title', 'Profile')

@section('navbar')
@endsection

<?php
    use Carbon\Carbon;
    $dt = Carbon::now();

    $firstStepPassed = (Auth::user()->postcode > 999) ? true : false ;
?>

@section('content')


<div class="card-body">
    <div class="row mt-4">
        <div class="col-12 col-lg-6 offset-lg-3">
            <div class="wizard-steps">
                <div class="wizard-step wizard-step-active">
                    <div class="wizard-step-icon">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="wizard-step-label">{{ __("Profil proches aidants") }}</div>
                </div>
                <div class="wizard-step @if ($firstStepPassed) wizard-step-active @endif">
                    <div class="wizard-step-icon">
                        <i class="fas fa-crutch"></i>
                    </div>
                    <div class="wizard-step-label">{{ __("Profil récepteur de soin") }}</div>
                </div>
            </div>
        </div>
    </div>

    @if ($firstStepPassed)
        <form class="wizard-content mt-2" method="POST" action="{{ URL::to('firstlogin2') }}">
                {{ csrf_field() }}
        <div class="wizard-pane">
            <div class="form-group row align-items-center">
                <label for="name" class="col-md-4 text-md-right text-left">{{ __("Nom") }}</label>
                <div class="col-lg-4 col-md-6">
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" autofocus>
                    @error('name')
                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label for="first_name" class="col-md-4 text-md-right text-left">{{ __("Prénom") }}</label>
                <div class="col-lg-4 col-md-6">
                    <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{old('first_name')}}" autofocus>
                    @error('first_name')
                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label for="birthdate" class="col-md-4 text-md-right text-left">{{ __("Date de naissance") }}</label>
                <div class="col-lg-4 col-md-6">
                    <input type="text" class="form-control datepicker @error('birthdate') is-invalid @enderror" name="birthdate" id="birthdate">
                    @error('birthdate')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label for="pathology" class="col-md-4 text-md-right text-left">{{ __("Pathologie") }}</label>
                <div class="col-lg-4 col-md-6">
                    <select name="pathology" class="form-control">
                        @foreach ($pathologies as $pathology)
                            <option value="{{$pathology->id}}">{{$pathology->name}}</option>
                        @endforeach
                    </select>
                    @error('pathology')
                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4"></div>
                    <div class="col-lg-4 col-md-6 text-right">
                        <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right">
                            {{ __('Sauver') }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    @else
        <form class="wizard-content mt-2" method="POST" action="{{ URL::to('firstlogin') }}">
                {{ csrf_field() }}
        <div class="wizard-pane">
            <div class="form-group row align-items-center">
                <label for="name" class="col-md-4 text-md-right text-left">{{ __("Nom") }}</label>
                <div class="col-lg-4 col-md-6">
                    <input type="text" name="name" id="name" class="form-control" value="{{Auth::user()->name}}" disabled autofocus>
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label for="firstname" class="col-md-4 text-md-right text-left">{{ __("First Prénom") }}</label>
                <div class="col-lg-4 col-md-6">
                    <input type="text" name="firstname" id="firstname" class="form-control" value="{{Auth::user()->first_name}}" disabled>
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label for="email" class="col-md-4 text-md-right text-left">{{ __("Courriel") }}</label>
                <div class="col-lg-4 col-md-6">
                    <input type="email" name="email" id="email" class="form-control" value="{{Auth::user()->email}}" disabled>
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label for="searchPostcode" class="col-md-4 text-md-right text-left">{{ __("Code postal / Ville") }}</label>
                <div class="col-lg-4 col-md-6">
                    <input type="text" name="searchPostcode" id="searchPostcode" class="form-control @error('searchPostcode') is-invalid @enderror" value="{{old('searchPostcode')}}" style="display: inline-block; width: 39%;">
                    <input type="text" name="city" id="city" class="form-control" value="" disabled style="display: inline-block; width: 59%;">
                    @error('searchPostcode')
                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                    <script>
                        $( document ).ready(function() {
                            var cities = {!! $cities !!};
                            cap = new citiesAndPostcodes (cities);
                        });
                    </script>
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label for="birthdate" class="col-md-4 text-md-right text-left">{{ __("Date de naissance") }}</label>
                <div class="col-lg-4 col-md-6">
                    <input type="text" class="form-control datepicker" name="birthdate" id="birthdate">
                    @error('birthdate')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4"></div>
                    <div class="col-lg-4 col-md-6 text-right">
                        <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right">
                            {{ __('Prochain') }} <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    @endif



@endsection
