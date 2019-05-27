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
    <h2 class="section-title">Institutes</h2>
</div>

@endsection
