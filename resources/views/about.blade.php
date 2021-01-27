@include('layouts.navbar')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Despre noi</title>

    <link href="https://fonts.googleapis.com/css?family=Tangerine:bold,bolditalic|Inconsolata:italic|Droid+Sans"
          rel="stylesheet">

    <script src="/js/scripts/slideshow.js"></script>
</head>
<body class="antialiased">
<div class="container marketing my-5 py-5">
    <div class="row featurette">
        <div class="col-md-7 d-flex flex-column justify-content-center">
            <h2 class="featurette-heading">Tunsoarea perfectă.<span class="text-muted">Servicii profesionale de frizerie.</span></h2>
            <p class="lead">Oferă-i părului tău tunsoarea de care are nevoie!</p>
        </div>
        <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" alt="500x500" style="width: 500px; height: auto;" src="/img/aparattuns.jpg">
        </div>
    </div>

    <div class="row featurette py-5 my-5">
        <div class="col-md-7 order-md-2  d-flex flex-column justify-content-center text-center">
            <h2 class="featurette-heading">Vopsire păr. <span class="text-muted">Încearcă o culoare nouă.</span></h2>
            <p class="lead">Vopsim părul folosind cele mai bune produse.</p>
        </div>
        <div class="col-md-5 order-md-1">
            <img class="featurette-image img-fluid mx-auto" alt="500x500" src="/img/balayage2.jpeg" style="width: 500px; height: auto;">
        </div>
    </div>

    <div class="row featurette py-5 my-5">
        <div class="col-md-7 d-flex flex-column justify-content-center text-center">
            <h2 class="featurette-heading">Tratamente profesionale de cosmetică.<span class="text-muted">Doar la noi.</span></h2>
            <p class="lead">Oferim o gamă largă de cosmetice.</p>
        </div>
        <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" src="/img/1salon.jpg" style="width: 500px; height: auto;">
        </div>
    </div>

    <div id="slideshow">
        <div id="slides">
            <img src="/img/fiole.jpg" data-caption="Cele mai bune cosmetice"/>
            <img src="/img/londaprod.jpg" data-caption="Produse profesionale de stilizare"/>
            <img src="/img/prodLonda.jpg" data-caption="Produse pentru toate tipurile de păr"/>
            <img src="/img/perii.jpg" data-caption="Cele mai bune ustensile"/>
        </div>

        <div id="slide-left">&lt;</div>
        <div id="slide-right">&gt;</div>
        <div id="slide-caption"></div>
    </div>
</div>
@include('layouts.footer')
</body>
</html>
