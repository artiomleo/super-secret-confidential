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

    <style>
        body {
            font-family: 'Nunito';
        }
    </style>

    <script src="/js/scripts/slideshow.js"></script>
</head>
<body class="antialiased">
<div class="container marketing my-5 py-5">
    <div class="row featurette">
        <div class="col-md-7 d-flex flex-column justify-content-center">
            <h2 class="featurette-heading">Oferim coafura. <span class="text-muted">O să vă placă.</span></h2>
            <p class="lead">Coafura noastra este cea mai buna.</p>
        </div>
        <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" alt="500x500" style="width: 500px; height: auto;" src="/img/aparattuns.jpg">
        </div>
    </div>

    <div class="row featurette py-5 my-5">
        <div class="col-md-7 order-md-2  d-flex flex-column justify-content-center text-center">
            <h2 class="featurette-heading">Vopsire păr. <span class="text-muted">Incearca o culoare nouă.</span></h2>
            <p class="lead">Vopsim părul folosind cele mai bune vopsele.</p>
        </div>
        <div class="col-md-5 order-md-1">
            <img class="featurette-image img-fluid mx-auto" alt="500x500" src="/img/balayage3.jpeg" style="width: 500px; height: auto;">
        </div>
    </div>

    <div class="row featurette py-5 my-5">
        <div class="col-md-7 d-flex flex-column justify-content-center text-center">
            <h2 class="featurette-heading">Cele mai bune cosmetice. <span class="text-muted">Doar la noi.</span></h2>
            <p class="lead">Oferim o gamă largă de cosmetice.</p>
        </div>
        <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" src="/img/pozalonda1.jpg" style="width: 500px; height: auto;">
        </div>
    </div>

    <div id="slideshow">
        <!-- [PUT YOUR SLIDES IN HERE] -->
        <div id="slides">
            <img src="/img/blo5.png" data-caption="Cele mai bune cosmetice"/>

            <img src="/img/blog3.png" data-caption="Cele mai bune coafuri"/>

            <img src="/img/img1.png" data-caption="Cele mai bune produse"/>

            <img src="/img/perii.jpg" data-caption="Cele mai bune ustensile"/>

        </div>

        <!-- [CONTROLS + CAPTION] -->
        <div id="slide-left">&lt;</div>
        <div id="slide-right">&gt;</div>
        <div id="slide-caption"></div>
    </div>
</div>
<?php echo View::make('layouts.footer') ?>
</body>
</html>
