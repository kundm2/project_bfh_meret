@extends('page')

@section('title', 'Profile')

@section('navbar')
@endsection

<?php
    use Carbon\Carbon;
    $dt = Carbon::now();
?>

@section('main-content')

<div class="section-body">
    <h2 class="section-title">Profile</h2>
</div>

@endsection
