@include('layouts.navbar')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <style>
        .container {
            padding-bottom: 0 !important;
            padding-top: 0 !important;
            margin-top: 0 !important;
            margin-bottom: 0 !important;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Tangerine:bold,bolditalic|Inconsolata:italic|Droid+Sans"
          rel="stylesheet">

    <script src="/js/scripts/slideshow.js"></script>
</head>
<body class="antialiased">
<div class="container marketing my-5 py-5">
    <div class="row featurette">
        <div class="col-md-7 d-flex flex-column justify-content-center">
            <h2 class="featurette-heading"></h2>
            <p class="lead">Lasă-ne pe noi să avem grijă de părul tău!</p>
            <ul>
                <li>Coffee</li>
                <li>Tea</li>
                <li>Coca Cola</li>
            </ul>
        </div>
        <div class="col-md-5">
            <img class="featurette-image mx-auto" alt="500x500" style="width: 600px; height: auto;" src="/img/coaforr.png">
        </div>
    </div>
</div>



<?php echo View::make('layouts.footer') ?>
</body>
</html>
