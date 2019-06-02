@extends('page')

@section('title', $institution->company )

@section('navbar')
@endsection

<?php
    use Carbon\Carbon;
    $dt = Carbon::now();
    $temp[] = $institution->toArray();
?>

@section('main-content')

<div class="section-body">
    <h2 class="section-title">
        {{$institution->company }}
    </h2>

    {{var_dump($institution->toArray())}}

    <div id="mapdiv"></div>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script>
    <script>
        $( document ).ready(function() {
            var institute = {!! json_encode($temp) !!};
            iM = new institutesMap ('mapdiv', institute);
            iM.initMap({{$institution->lat}}, {{$institution->lon}}, 11);
        });
    </script>

</div>

@endsection
