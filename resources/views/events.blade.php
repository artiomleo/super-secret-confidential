@include('layouts.navbar')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Programări</title>

</head>
<body class="antialiased">
@include('fullcalender')
@include('layouts.footer')
</body>
</html>
