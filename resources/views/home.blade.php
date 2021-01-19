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
    <link href="{{ asset('css/mystyle.scss') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito';
        }
    </style>

    <link href="{{ asset('css/mystyle.scss') }}" rel="stylesheet">


</head>
<body class="antialiased">
<div class="container-services">
<div class="col-md-7 d-flex flex-column justify-content-center">
    <h2>Serviciile noastre</h2>
</div>
<div class="flex-container">
    <div class="flex-item">
    <a href="coafor"><img src="/img/Coafor.jpg" alt="Coafor" style="width:100%"></a>
    </div>
    <div class="flex-item">
        <img src="/img/facial_treatment.jpg" alt="Cosmetica" style="width:100%">
    </div>
    <div class="flex-item">
        <img src="/img/manichiurafrench.jpg" alt="Manichiura" style="width:100%">
    </div>
</div>
</div>

<div class="container marketing my-5 py-5">
    <div class="row featurette">
        <div class="col-md-7 d-flex flex-column justify-content-center">
            <h2 class="featurette-heading">Coafor</h2>
            <p class="lead">Lasă-ne pe noi să avem grijă de părul tău!</p>
        </div>
        <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" alt="500x500" style="width: 500px; height: auto;" src="/img/coaforr.png">
        </div>
    </div>
</div>

@if(request()->query('event') === 'success')
    <div class="event-notification">
        Te-ai programat cu succes!
    </div>
@endif

<?php echo View::make('layouts.footer') ?>
</body>
</html>
