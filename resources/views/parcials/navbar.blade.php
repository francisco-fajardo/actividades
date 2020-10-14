<nav class="indigo darken-2">
@section('navbar')
    <div class="nav-wrapper container">
        <a href="{{ url('/') }}" class="brand-logo">
            <img src="{{ asset('img/covid.png') }}" />
        </a>

        <a href="#" data-target="sidenav-menu" class="sidenav-trigger"><i class="material-icons">menu</i></a>

        @guest
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li>
                <a href="{{ route('home') }}" class="tooltipped" data-position="bottom" data-tooltip="Inicio"><i class="material-icons">home</i></a>
            </li>
            <li>
                <a href="{{ route('login') }}" class="tooltipped" data-position="bottom" data-tooltip="Iniciar sesión"><i class="material-icons">login</i></a>
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
                <a href="{{ route('home') }}" class="tooltipped" data-position="bottom" data-tooltip="Inicio"><i class="material-icons">home</i></a>
            </li>
            <li>
                <a href="{{ route('user.dashboard') }}" class="tooltipped" data-position="bottom" data-tooltip="Panel de Control"><i class="material-icons">person</i></a>
            </li>
            <li>
                <a href="{{ route('logout') }}" class="tooltipped" data-position="bottom" data-tooltip="Cerrar sesión" onclick="event.preventDefault(); document.getElementById('logout-form').submit()"><i class="material-icons">login</i></a>
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
