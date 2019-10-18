

@extends('layouts.template')





<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

@section('title', 'Welcome to The Vinyl Shop')

<!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/icons/favicon-16x16.png">
    <!-- Styles -->
    <style>

    </style>
</head>
<body>
@section('main')
    <ul>

        <h1>Records</h1>
        <?php
        foreach ($records as $record){
            echo "<li> $record </li>";
            //echo '<li>' . $record . '</li>';
        }
        ?>
    </ul>
@endsection
</body>
</html>




