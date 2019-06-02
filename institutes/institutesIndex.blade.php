@extends('page')

@section('title', 'Institutes')

@section('navbar')
@endsection

<?php
    use Carbon\Carbon;
    $dt = Carbon::now();
?>

@section('main-content')

<div class="section-body">
    <h2 class="section-title">
        <div class="input-group float-right" style="max-width: 250px;">
            <input type="text" id="searchInstitution" class="form-control" placeholder="ex. Neuchâtel">
            <div class="input-group-append" id="searchInstitutionBtn">
                <div class="input-group-text form-control">
                    <i class="fas fa-search-location"></i>
                </div>
            </div>
        </div>
        Institutes
    </h2>

    <br>

    <div class="selectgroup w-100">
        <label class="selectgroup-item">
            <input type="radio" name="selectedInstitution" value="all" class="selectgroup-input" checked>
            <span class="selectgroup-button marker">{{ __('Tout')}}</span>
        </label>
        <label class="selectgroup-item">
            <input type="radio" name="selectedInstitution" value="hospital" class="selectgroup-input">
            <span class="selectgroup-button marker"><img src="{{ URL::asset("/img/markers/hospital.png") }}" width="20">{{ __('Hospital')}}</span>
        </label>
        <label class="selectgroup-item">
            <input type="radio" name="selectedInstitution" value="drugstore" class="selectgroup-input">
            <span class="selectgroup-button marker"><img src="{{ URL::asset("/img/markers/drugstore.png") }}" width="20">{{ __('Droguerie')}}</span>
        </label>
        <label class="selectgroup-item">
            <input type="radio" name="selectedInstitution" value="pharmacie" class="selectgroup-input">
            <span class="selectgroup-button marker"><img src="{{ URL::asset("/img/markers/pharmacy.png") }}" width="20">{{ __('Pharmacie')}}</span>
        </label>
        <label class="selectgroup-item">
            <input type="radio" name="selectedInstitution" value="ems" class="selectgroup-input">
            <span class="selectgroup-button marker"><img src="{{ URL::asset("/img/markers/ems.png") }}" width="20">{{ __('EMS')}}</span>
        </label>
    </div>

    <div id="mapdiv"></div>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script>
    <script>
        $( document ).ready(function() {
            var institutes = {!! $institutes !!};
            iM = new institutesMap ('mapdiv', institutes);
            iM.initMap(47.00704178216761, 6.772727966308595, 11);
        });
    </script>
</div>

@endsection
