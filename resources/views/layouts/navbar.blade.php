<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<link href="{{ asset('css/mystyle.scss') }}" rel="stylesheet">

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
                    <a class="nav-link {{ \Route::current()->getName() === 'despreNoi' ? 'active' : '' }}"
                       href="/despre-noi">Despre noi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ \Route::current()->getName() == 'eventCreate' ? 'active' : '' }}"
                       href="/event-create">Programează-te</a>
                </li>
                @if(Illuminate\Support\Facades\Auth::check() && !Illuminate\Support\Facades\Auth::user()->isAdmin())
                    <li class="nav-item">
                        <a class="nav-link {{ \Route::current()->getName() == 'myEvents' ? 'active' : '' }}"
                           href="/my-events">Programările mele</a>
                    </li>
                    <li class="nav-item">
                        @elseif(Illuminate\Support\Facades\Auth::check() && Illuminate\Support\Facades\Auth::user()->isAdmin())
                            <a class="nav-link {{ \Route::current()->getName() === 'events' ? 'active' : '' }} "
                               href="/events">Programările clientilor</a>
                        @endif
                    </li>
            </ul>
        </nav>
        <div class="logo">
            <div class="logo"><img style="width: 150px; height: 150px;" src="img/logo.png"></div>
        </div>
        <div class="hero container">
            <div class="hero copy header-salon">
                <h1 style="font-size:300%; color:#FFF5EE;">Salon Vasilica</h1>
            </div>
        </div>
    </div>
</div>
