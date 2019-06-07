@extends('page')

@section('title', 'Profil')

@section('navbar')
@endsection

<?php
    use Carbon\Carbon;
    $dt = Carbon::now();
?>

@section('main-content')

<div class="section-body">
    <h2 class="section-title">Profil</h2>
</div>

@endsection
