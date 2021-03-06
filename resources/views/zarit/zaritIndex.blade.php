@extends('page')

@section('title', __('ZARIT'))

@section('navbar')
@endsection

<?php
    use Carbon\Carbon;
    $dt = Carbon::now();
    $chartjs = true;
?>

@section('main-content')

<div class="section-body">
    <h2 class="section-title">
        {{__('ZARIT')}}
        <span class="float-right"><a href="{{ URL::to('/zarit/new') }}" class="btn btn-primary"><i class="fas fa-plus"></i> {{ __('Ajouter') }}</a></span>
    </h2>
    <!-- card wrapper -->
    <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <canvas id="myChart" width="auto" height="100"></canvas>
                        <script>
                        jQuery( document ).ready(function() {
                            var ctx = document.getElementById('myChart');
                            var myChart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: {{$graphData}},
                                    datasets: [{
                                    data: {{$graphData}},
                                    borderColor: '#6777ef',
                                    borderWidth: 2,
                                    pointBackgroundColor: '#ffffff',
                                    pointRadius: 5
                                    }]
                                },
                                options: {
                                    legend: { display: false },
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true,
                                                stepSize: 1
                                            }
                                        }],
                                        xAxes: [{
                                            ticks: { display: false },
                                            gridLines: { display: false }
                                        }]
                                    },
                                 }
                            });
                        });
                        </script>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>{{ __('Interprétation - Fardeau') }}</h4>
                </div>
                <div class="card-body">
                    <div id="zarit-scale"></div>
                    <div class="row">
                        <div class="col-6 rank-1">léger</div>
                        <div class="col-6 rank-7 text-right">sévère</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Votre ZARIT passé</h4>
                </div>
                @if (true)
                    <div class="card-body p-0 zarit-scores-tables">
                        <table class="table">
                        <tbody>
                            @foreach ($reports as $report)
                                <tr>
                                    <th class="rank-{{ floor($report->getScore()) }}">{{ $report->getScore() }}</th>
                                    <td class="rank-{{ floor($report->getScore()) }}">{{ $report->getRating() }}</td>
                                    <td>{{ Carbon::parse($report->created_at)->diffforhumans() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                @else
                    No Reports found
                @endif
            </div>
        </div>
    </div>

</div>

@endsection
