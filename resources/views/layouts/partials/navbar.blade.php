<nav class="white z-depth-1">
@section('navbar')
    <div class="nav-wrapper container">
        <a href="{{ url('/') }}" class="brand-logo valign-wrapper tooltipped" data-position="bottom" data-tooltip="Actividades Fajardo" style="height: 100%">
            <img src="{{ asset('img/logo-franciscofajardo.png') }}" alt="E.T. Francisco Fajardo" style="height: 42px; width: auto; vertical-align: middle; margin-right: 8px;" />
            <span class="grey-text text-darken-3" style="font-size: 1.3rem; font-weight: 600;">Sistema AF</span>
        </a>

        <a href="#" data-target="sidenav-menu" class="sidenav-trigger grey-text text-darken-3"><i class="material-icons">menu</i></a>

        @guest
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li>
                <a href="{{ route('home') }}" class="tooltipped grey-text text-darken-3" data-position="bottom" data-tooltip="Inicio"><i class="material-icons">home</i></a>
            </li>
            <li>
                <a href="{{ route('login') }}" class="tooltipped grey-text text-darken-3" data-position="bottom" data-tooltip="Iniciar sesión"><i class="material-icons">login</i></a>
            </li>
        </ul>

        <ul class="sidenav" id="sidenav-menu">
            <li>
                <a href="{{ route('login') }}"><i class="material-icons left">login</i> Iniciar sesión</a>
            </li>
        </ul>
        @else
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li>
                <a href="{{ route('home') }}" class="tooltipped grey-text text-darken-3" data-position="bottom" data-tooltip="Inicio"><i class="material-icons">home</i></a>
            </li>
            <li>
                <a href="{{ route('user.dashboard') }}" class="tooltipped grey-text text-darken-3" data-position="bottom" data-tooltip="Panel de Control"><i class="material-icons">person</i></a>
            </li>
            <li>
                <a href="{{ route('logout') }}" class="tooltipped grey-text text-darken-3" data-position="bottom" data-tooltip="Cerrar sesión" onclick="event.preventDefault(); document.getElementById('logout-form').submit()"><i class="material-icons">login</i></a>
            </li>
        </ul>

        <ul class="sidenav" id="sidenav-menu">
            <li>
                <a href="{{ route('home') }}"><i class="material-icons left">home</i> Inicio</a>
            </li>
            <li>
                <a href="{{ route('user.dashboard') }}"><i class="material-icons left">person</i> Panel de Control</a>
            </li>
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()"><i class="material-icons left">login</i> Cerrar sesión</a>
            </li>
        </ul>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
            @csrf
        </form>
        @endguest
    </div>
@show
</nav>
