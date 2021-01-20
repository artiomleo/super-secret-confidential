<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyle.scss') }}" rel="stylesheet">
</head>

<div class="header">
    <div class="top-nav container">

        <nav class="navbar navbar-expand-sm bg-pink">
            <ul class="navbar-nav">
                <li class="nav-item">
                    @if(Illuminate\Support\Facades\Auth::check())
                        <a class="nav-link" href="logout">Log out</a>
                    @else
                        <a class="nav-link" href="login">Log in</a>
                    @endif
                </li>
                @if(!Illuminate\Support\Facades\Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="register">Register</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link {{ \Route::current()->getName() === 'home' ? 'active' : '' }}"
                       href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ \Route::current()->getName() === 'despreNoi' ? 'active' : '' }}"
                       href="/despreNoi">Despre noi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ \Route::current()->getName() == 'eventCreate' ? 'active' : '' }}"
                       href="/event-create">Programează-te</a>
                </li>
                @if(Illuminate\Support\Facades\Auth::check() && !Illuminate\Support\Facades\Auth::user()->isAdmin())
                    <li class="nav-item">
                        <a class="nav-link {{ \Route::current()->getName() == 'myEvents' ? 'active' : '' }}"
                           href="/myEvents">Programările mele</a>
                    </li>
                @elseif(Illuminate\Support\Facades\Auth::check() && Illuminate\Support\Facades\Auth::user()->isAdmin())
                    <li class="nav-item">
                        <a class="nav-link {{ \Route::current()->getName() === 'events' ? 'active' : '' }} "
                           href="/events">Programările clienților</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ \Route::current()->getName() === 'reviews' ? 'active' : '' }} "
                           href="/reviews">Recenziile clienților</a>
                    </li>
                @endif
            </ul>
        </nav>
        <div class="logo">
            <div class="logo"><img style="width: 150px; height: 150px;" src="img/logo.png"></div>
        </div>
        <div class="hero container">
            <div class="hero copy header-salon">
                <h1 style="font-size:70px !important; font-family: 'Tangerine', cursive, sans-serif; color:#FFF5EE;">Salon Vasilica</h1>
            </div>
        </div>
    </div>
</div>
