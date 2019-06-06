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

    <div class="row">
        <div class="col-12 col-md-12 col-lg-6">
            <div class="card">
                <div class="card-body p-0">
                    <table class="table">
                        <tr>
                            <th >{{__('Adresse')}}</th>
                            <td>
                                {{ $institution->address }} <br />
                                {{ $institution->postcode}} {{ $institution->city}}
                            </td>
                        </tr>
                        @if (isset($institution->phone))
                            <tr>
                                <th >{{__('Téléphone')}}</th>
                                <td>
                                    <a href="tel:{{ $institution->phone }}">{{ $institution->phone }}</a>
                                </td>
                            </tr>
                        @endif
                        @if (isset($institution->website))
                            <tr>
                                <th >{{__('Site Internet')}}</th>
                                <td>
                                    <a href="{{ $institution->website }}">{{ $institution->website }}</a>
                                </td>
                            </tr>
                        @endif
                        @if (isset($institution->type))
                            <tr>
                                <th >{{__('Type')}}</th>
                                <td>
                                    {{ $institution->type }}
                                </td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-6">
            <div id="mapdiv"></div>
                <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" />
                <script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script>
                <script>
                    $( document ).ready(function() {
                        var institute = {!! json_encode($temp) !!};
                        iM = new institutesMap ('mapdiv', institute, {{$institution->lat}}, {{$institution->lon}}, 11);
                    });
                </script>
            </div>
        </div>
    </div>
</div>

@endsection
