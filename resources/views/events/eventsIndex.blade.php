@extends('page')

@section('title', 'Events')

@section('navbar')
@endsection

<?php
    use Carbon\Carbon;
    $dt = Carbon::now();
?>

@section('main-content')

<div class="section-body">
    <h2 class="section-title">Events</h2>
</div>

@endsection
