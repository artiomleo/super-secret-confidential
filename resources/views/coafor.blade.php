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

    <title>Coafor</title>

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
            <table id="customers">
                <tr>
                    <th>Serviciu</th>
                    <th>Pret</th>
                </tr>
                <tr>
                    <td>Tuns păr scurt</td>
                    <td>30 de lei</td>
                </tr>
                <tr>
                    <td>Tuns păr mediu</td>
                    <td>45 de lei</td>
                </tr>
                <tr>
                    <td>Tuns păr lung</td>
                    <td>50 de lei</td>
                </tr>
                <tr>
                    <td>Aranjat de zi</td>
                    <td>60 de lei</td>
                </tr>
                <tr>
                    <td>Aranjat de gală</td>
                    <td>100 de lei</td>
                </tr>
                <td>Aranjat de mireasă</td>
                    <td>250 de lei</td>
                </tr>
                <td>Spălat</td>
                    <td>25 de lei</td>
                </tr>
                <td>Tratament de hidratare</td>
                    <td>50 de lei</td>
                </tr>
                <td>Tratament de regenerare</td>
                    <td>50 de lei</td>
                </tr>
                <td>Tratament de anticădere</td>
                    <td>50 de lei</td>
                </tr>
                <td>Vopsit păr scurt</td>
                    <td>80 de lei</td>
                </tr>
                <td>Vopsit păr mediu</td>
                    <td>100 de lei</td>
                </tr>
                <td>Vopsit păr lung</td>
                    <td>150 de lei</td>
                </tr>
            </table>
        </div>
        <div class="col-md-5">
            <img class="featurette-image mx-auto" alt="500x500" style="width: 600px; height: auto;" src="/img/coaforr.png">
        </div>
    </div>
</div>



@include('layouts.footer')
</body>
</html>
