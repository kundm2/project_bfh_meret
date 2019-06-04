@extends('page')

@section('title', __('Settings'))

@section('navbar')
@endsection

<?php
    use Carbon\Carbon;
    $dt = Carbon::now();
?>

@section('main-content')

<div class="section-body">
    <h2 class="section-title">
        {{ __('Settings') }}
    </h2>

</div>

@endsection
