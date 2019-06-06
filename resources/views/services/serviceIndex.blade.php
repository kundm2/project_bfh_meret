@extends('page')

@section('title', 'Services')
@section('body-class', 'services-overview')

@section('navbar')
@endsection

<?php
    use Carbon\Carbon;
    use App\Http\Controllers\ServiceController as SC;
    $dt = Carbon::now();
?>

@section('main-content')

<div class="section-body">
    <h2 class="section-title">
        <div class="input-group float-right">
            <select class="form-control" id="filterServiceSelect">
                <option value="-1">{{ __('Tout') }}</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <input type="text" id="searchService" class="form-control" placeholder="ex. Neuchâtel">
            <div class="input-group-append" id="searchServiceBtn">
                <div class="input-group-text form-control">
                    <i class="fas fa-search-location"></i>
                </div>
            </div>
        </div>
        Services
    </h2>

    <br /><br />

    <div class="services-cards">
    @foreach ($services as $service)

    <div class="card services-card{{ SC::categoryClassList($service->getCategories()) }} {{ "service-" . $service->id }}">
        <div class="card-header">
            <h4>{{ $service->name }}</h4>
        </div>
        <div class="card-body">
            <table>
                <tr>
                    <th>Téléphone</th>
                    <td><a href="tel:{{ $service->phone }}">{{ $service->phone }}</a></td>
                </tr>
                <tr>
                    <th>Site Internet</th>
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

</div>

@endsection
