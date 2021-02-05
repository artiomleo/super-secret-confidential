@include('layouts.navbar')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <style>
        .container {
           margin:auto;
        }
    </style>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Manichiură-Pedichiură</title>

    
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Tangerine:bold,bolditalic|Inconsolata:italic|Droid+Sans"
          rel="stylesheet">

    <script src="/js/scripts/slideshow.js"></script>
</head>
<body class="antialiased">
<div class="container marketing my-5 py-5">
    <div class="row featurette">
    <div class="col-md-7 d-flex flex-column justify-content-center">
            <h2 class="featurette-heading">Manichiura perfectă chiar există!<span class="text-muted">O manichiură simplă, dar bine executată, îți va oferi accesoriul perfect în fiecare zi!</span></h2>
            <p class="lead">Te așteptăm cu cele mai noi tehnici de construcție a unghiilor cu gel, dar și cu o gamă variată de produse potrivite manichiurii clasice.</p>
            <p class="lead">De asemenea, vă așteptăm să încercați pedichiura medicinală, care oferă multe beneficii, atât persoanelor care se confruntă cu diverse afecțiuni la nivelul unghiei, cât și persoanelor care doresc să-și mențină sănătatea unghiei pe timp îndelungat. </p>
            <table id="customers">
                <tr>
                    <th>Serviciu</th>
                    <th>Preț</th>
                </tr>
                <tr>
                    <td>Manichiură clasică</td>
                    <td>60 de lei</td>
                </tr>
                <tr>
                    <td>Manichiură cu gel</td>
                    <td>120 de lei</td>
                </tr>
                <tr>
                    <td>Manichiură semipermanentă</td>
                    <td>80 de lei</td>
                </tr>
                <tr>
                    <td>Pedichiură clasică</td>
                    <td>50 de lei</td>
                </tr>
                <tr>
                    <td>Pedichiură medicinală</td>
                    <td>80 de lei</td>
                </tr>
                <tr>
                    <td>Pedichiură cu gel</td>
                    <td>90 de lei</td>
                </tr>
                <tr>
                    <td>Pedichiură semipermanentă</td>
                    <td>70 de lei</td>
                </tr>
            </table>
        </div>
        <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" alt="500x500" style="width: 500px; height: auto;" src="/img/unghiirosi.png">
        </div>
    </div>
</div>
@include('layouts.footer')
</body>
</html>
