@include('layouts.navbar')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cosmetica</title>

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
            <p class="lead">Un machiaj armonios pune în evidență trăsăturile, nu le schimbă!Așadar, pentru un machiaj care să valorifice trăsăturile dumneavoastră, vă recomandăm și un tratament de hidratare sau antiîmbătrânire, pentru a pregăti tenul.</p>
        
            <table id="customers">
                <tr>
                    <th>Serviciu</th>
                    <th>Pret</th>
                </tr>
                <tr>
                    <td>Tratament de hidratare</td>
                    <td>100 de lei</td>
                </tr>
                <tr>
                    <td>Machiaj de zi</td>
                    <td>100 de lei</td>
                </tr>
                <tr>
                    <td>Machiaj de gală</td>
                    <td>200 de lei</td>
                </tr>
                <tr>
                    <td>Pensat</td>
                    <td>20 de lei</td>
                </tr>
            </table>
        </div>
        <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" alt="500x500" style="width: 1000px; height: auto;" src="/img/makeup.png">
        </div>
    </div>
</div>

@include('layouts.footer')
</body>
</html>
