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

    <title>Cosmetica</title>

    
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Tangerine:bold,bolditalic|Inconsolata:italic|Droid+Sans"
          rel="stylesheet">

    <script src="/js/scripts/slideshow.js"></script>
</head>
<body class="antialiased">
<div class="container marketing my-5 py-5">
    <div class="row featurette">
        <div class="col-md-7 d-flex flex-column justify-content-center">
            <h2 class="featurette-heading">Machiaj.<span class="text-muted">Tratamente cosmetice profesionale.</span></h2>
            <p class="lead">Un machiaj care să valorifice trăsăturile dumneavoastră, necesită și un tratament de hidratare sau antiîmbătrânire în prealabil, pentru a pregăti tenul.</p>
            <p class="lead">Noi te ajutăm să le obții pe toate!De la tratamente de hidratare, până la cele de antiîmbătrânire.De la un machiaj de zi, la unul de seară sau de evenimente.</p>
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
                    <td>Tratament antiîmbătrânire</td>
                    <td>150 de lei</td>
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
            <img class="featurette-image img-fluid mx-auto" alt="500x500"style="width: 1000px; height: auto;" src="/img/makeup.png">
        </div>
    </div>
</div>

@include('layouts.footer')
</body>
</html>
