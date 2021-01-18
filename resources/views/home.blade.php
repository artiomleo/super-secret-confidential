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
    <div class="row service-line">
    <div class="col-md-7 d-flex flex-column justify-content-center">
    <h2 class="service-line heading">Serviciile noastre</h2>

 <div class="row">
  <div class="column">
    <img src="/img/Coafor.jpg" alt="Coafor" style="width:100%">
  </div>
  <div class="column">
    <img src="/img/facial_treatment.jpg" alt="Cosmetica" style="width:100%">
  </div>
  <div class="column">
    <img src="/img/Manichiurafrench.jpg" alt="Manichiura" style="width:100%">
  </div>
  <div class="column">
    <img src="/img/pedichiura.jpg" alt="Pedichiura" style="width:100%">
  </div>
 </div>
<div class="col-lg-4 col-md-4 col-sm-4 service-block iconsalon1">
   <div style="display: inline-block;">
        
           <h4 class="pull-left">Cosmetică</h4>
          </div>
      </div>

      <br>
      <img width="45px" src="/img/cosmeticaicon.png">
    </br>
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
