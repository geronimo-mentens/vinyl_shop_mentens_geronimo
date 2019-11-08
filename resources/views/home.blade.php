@extends('layouts.template')


<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/icons/favicon-16x16.png">
@section('title', 'Welcome to The Vinyl Shop')

    <!-- Fonts -->



    <!-- Styles -->
    <style>

    </style>
</head>
<body>
@section('main')
    <i class="fad fa-acorn"></i>


    <h1> The vinyl Shop</h1>
<p>Welcome to the website of the Vinyl Shop, a large online store with lots of (classic) vinyl records</p>

@endsection
</body>
</html>
