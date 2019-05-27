@extends('master')

<?php
?>

@section('content')


@include('partials.navigation')
@include('partials.sidebar')

<div class="main-content">
    <section class="section">
    @yield('main-content')
    </section>
</div>

@include('partials.footer')


@endsection
