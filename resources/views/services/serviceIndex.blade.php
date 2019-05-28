@extends('page')

@section('title', 'Services')

@section('navbar')
@endsection

<?php
    use Carbon\Carbon;
    use App\Http\Controllers\ServiceController as SC;
    $dt = Carbon::now();
?>

@section('main-content')

<div class="section-body">
    <h2 class="section-title">Services</h2>
    <!-- card wrapper -->

    @foreach ($services as $service)

    <div class="card{{ SC::categoryClassList($service->getCategories()) }}">
        <div class="card-header">
            <h4>{{ $service->name }}</h4>
        </div>
        <div class="card-body">
            <table>
                <tr>
                    <th>Phone</th>
                    <td><a href="tel:{{ $service->phone }}">{{ $service->phone }}</a></td>
                </tr>
                <tr>
                    <th>Website</th>
                    <td><a href="http://{{ $service->website }}" target="_blank">{{ $service->website }}</a></td>
                </tr>
            </table>
        </div>
        <div class="card-footer text-secondary">
            <i class="fas fa-tags"></i> {!! SC::categoryList($service->getCategories()) !!}
        </div>
    </div>
    @endforeach


</div>

@endsection
