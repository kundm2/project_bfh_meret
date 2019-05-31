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
            <input type="text" class="form-control" placeholder="ex. Neuchâtel">
            <div class="input-group-append">
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
            <input type="radio" name="value" value="50" class="selectgroup-input">
            <span class="selectgroup-button marker"><img src="https://cdn.mapmarker.io/api/v1/pin?size=60&background=%23D33115&text=H&color=%23FFFFFF&voffset=5&hoffset=1" width="20">{{ __('Hospital')}}</span>
        </label>
        <label class="selectgroup-item">
            <input type="radio" name="value" value="100" class="selectgroup-input">
            <span class="selectgroup-button marker"><img src="https://cdn.mapmarker.io/api/v1/pin?size=60&background=%2368CCCA&icon=fa-medkit&color=%23FFFFFF&voffset=-3&hoffset=0" width="20">{{ __('Drugerie')}}</span>
        </label>
        <label class="selectgroup-item">
            <input type="radio" name="value" value="150" class="selectgroup-input">
            <span class="selectgroup-button marker"><img src="https://cdn.mapmarker.io/api/v1/pin?size=120&background=%23FFFFFF&icon=fa-plus&color=%2368BC00&voffset=0&hoffset=0" width="20">{{ __('Pharmacie')}}</span>
        </label>
    </div>

    <div id="mapdiv" style="height: 600px; width: 100%;"></div>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script>
    <script>
        $( document ).ready(function() {
            var map = L.map('mapdiv').setView([46.990926, 6.928065], 15);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            var hospitalIcon = new L.icon({
                iconUrl: "https://cdn.mapmarker.io/api/v1/pin?size=60&background=%23D33115&text=H&color=%23FFFFFF&voffset=5&hoffset=1", iconSize: [47, 44], iconAnchor: [24, 45], popupAnchor:  [0, -40]
            });
            var drugIcon = new L.icon({
                iconUrl: "https://cdn.mapmarker.io/api/v1/pin?size=60&background=%2368CCCA&icon=fa-medkit&color=%23FFFFFF&voffset=-3&hoffset=0", iconSize: [47, 44], iconAnchor: [24, 45], popupAnchor:  [0, -40]
            });
            var pharmacieIcon = new L.icon({
                iconUrl: "https://cdn.mapmarker.io/api/v1/pin?size=120&background=%23FFFFFF&icon=fa-plus&color=%2368BC00&voffset=0&hoffset=0", iconSize: [47, 44], iconAnchor: [24, 45], popupAnchor:  [0, -40]
            });

            var institutes = {!! $institutes !!};

            institutes.forEach(institute => {
                switch (institute.type) {
                    case "Hôpitaux":
                        L.marker([institute.lat, institute.lon], {icon: hospitalIcon}).addTo(map).bindPopup('<b>' + institute.company + '</b><br>');
                        break;
                    case "Droguerie":
                        L.marker([institute.lat, institute.lon], {icon: drugIcon}).addTo(map).bindPopup('<b>' + institute.company + '</b><br>');
                        break;
                    case "Pharmacie":
                        L.marker([institute.lat, institute.lon], {icon: pharmacieIcon}).addTo(map).bindPopup('<b>' + institute.company + '</b><br>');
                        break;


                    default:
                        L.marker([institute.lat, institute.lon]).addTo(map).bindPopup('<b>' + institute.company + '</b><br>');
                        break;
                }
            });
        });
    </script>
</div>

@endsection
