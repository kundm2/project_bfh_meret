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


    <div class="card">
        <div class="card-header">
            <h4>{{ __('Référentiel des prestations destinées aux proches aidants') }}</h4>
        </div>
        <div class="card-body p-0 table-responsive">
            <table class="table table-bordered table-sm services-overview">
                <tr>
                    <th colspan="3"></th>
                    @foreach ($categories as $category)
                        <th {{ (SC::getChildCount($category->id) > 0 ) ? 'colspan=' . SC::getChildCount($category->id) . '' : 'rowspan=2' }}>{{$category->name}}</th>
                    @endforeach
                </tr>
                <tr>
                    <th class="service-name">{{ __('Institutions services') }}</th>
                    <th class="service-phone">{{ __('Numéro de téléphone') }}</th>
                    <th class="service-website">{{ __('Site Internet') }}</th>
                        @foreach ($categories as $category)
                            @if ( SC::getChildCount($category->id) > 0 )
                                @foreach (SC::getChilds($category->id) as $sub_category)
                                    <th>{{$sub_category->name}}</th>
                                @endforeach
                            @endif
                        @endforeach
                </tr>
                @foreach ($services as $service)
                    <tr>
                        <th>{{$service->name}}</th>
                        <td><a href="tel:{{ $service->phone }}">{{ $service->phone }}</a></td>
                        <td><a href="http://{{ $service->website }}" target="_blank">{{ $service->website }}</a></td>

                        @foreach ($usedCategories as $category)
                            <td class="c">{!! ($service->hasCategory($category->id)) ? '<i class="fas fa-check"></i>' : '' !!}</td>
                        @endforeach
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

</div>

@endsection
