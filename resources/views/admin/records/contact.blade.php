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
    <h1>Contact info</h1>

    <p>The Vinyl Shop</p>
    <p><a href="mailto:info@thevinylshop.com">info@thevinylshop.com</a></p>

@endsection
</body>
</html>
