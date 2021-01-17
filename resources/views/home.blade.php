@include('layouts.navbar')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Tangerine:bold,bolditalic|Inconsolata:italic|Droid+Sans"
          rel="stylesheet">
    <script src="//code.jquery.com/jquery-latest.min.js"></script>
    <script src="//unslider.com/unslider.js"></script>

    <style>
        body {
            font-family: 'Nunito';
        }
    </style>

    <link href="{{ asset('css/mystyle.scss') }}" rel="stylesheet">


</head>
<body class="antialiased">

<div class="slides">
    <ul>
        <li style="background-image: url("/img/pozalonda1.jpg"); background-size 100% 100%; width: 25%;>Departamentul nostru de coafor.</li>
        <li>Ritualul tău de înfrumusețare.</li>
        <li>Produsele noastre preferate.</li>
    </ul>
<script>$(function() {
    $('.slider').unslider();
});
</script>
</div>
<?php echo View::make('layouts.footer') ?>
</body>
</html>
