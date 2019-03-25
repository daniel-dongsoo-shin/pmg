<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
http://pmg.homestead/ex
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <h3>Vue Comp</h3>
        <p>
            <router-link to="/">Go to Home</router-link>
            <router-link to="/ex">Go to Ex</router-link>
        </p>
        <router-view></router-view>
        <p>End of LIne</p>
    </div>
</body>
</html>
