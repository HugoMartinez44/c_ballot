<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <!-- CSRF Token, and we already have CSRF for our forms thanks to Laravel Collective has well -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name', 'C_BALLOT')}}</title>

</head>
<body>
@include('inc.navbar')
<div class="container">
    @include('inc.messages')
    @yield('content')
</div>
</body>
</html>
