@extends('page')

@section('title', 'Événements')

@section('navbar')
@endsection

<?php
    use Carbon\Carbon;
    $dt = Carbon::now();
?>

@section('main-content')

<div class="section-body">
    <h2 class="section-title">Événements</h2>
</div>

@endsection
