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
        .footer {
            position: absolute !important;
        }
    </style>

    <link href="{{ asset('css/mystyle.scss') }}" rel="stylesheet">


</head>
<body class="antialiased">
@if(request()->query('event') === 'success')
    <div class="event-notification">
        Te-ai programat cu succes!
    </div>
@endif
<div class="d-flex justify-content-lg-around">
    @foreach(App\Models\Event::query()->where([
                'user_id' => \Illuminate\Support\Facades\Auth::id()
            ])->get() as $event)
        <div>
            Programare numarul: {{$event->id}}
            <p>{{ $event->name }}</p>
            <p>{{ $event->email }}</p>
            <p>{{ $event->phone_number }}</p>
            <p>{{ $event->start_time }}</p>
            {{App\Models\Service::query()->where('id', $event->service_id)->first()->name}}
        </div>
    @endforeach
</div>
<?php echo View::make('layouts.footer') ?>
</body>
</html>
