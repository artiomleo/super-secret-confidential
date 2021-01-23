@include('layouts.navbar')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Salon Vasilica</title>

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
            <p class="lead">Un machiaj armonios îți pune în evidență trăsăturile, nu le schimbă!</p>
            <table id="customers">
                <tr>
                    <th>Serviciu</th>
                    <th>Pret</th>
                </tr>
                <tr>
                    <td>Alfreds Futterkiste</td>
                    <td>Maria Anders</td>
                </tr>
                <tr>
                    <td>Alfreds Futterkiste</td>
                    <td>Maria Anders</td>
                </tr>
            </table>
        </div>
        <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" alt="500x500" style="width: 500px; height: auto;" src="/img/imaginemachiaj.png">
        </div>
    </div>
</div>

<?php echo View::make('layouts.footer') ?>
</body>
</html>
