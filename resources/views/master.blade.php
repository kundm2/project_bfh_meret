<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>

    @include('partials.header')
</head>
<body class="@yield('body-class')">
    <div id="app">
        <div class="main-wrapper">

    @yield('content')

        </div>
    </div>


    @include('partials.scripts')
</body>

</html>






