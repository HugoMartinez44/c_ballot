<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <!-- CSRF Token, and we already have CSRF for our forms thanks to Laravel Collective has well -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>An Email</title>

</head>
<body>
<h1>You got Mail</h1>
<p>{{ $email_body }}</p>
</body>
</html>