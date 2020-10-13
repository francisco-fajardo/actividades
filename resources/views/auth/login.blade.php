@extends('layouts.app')

@section('title', 'Iniciar sesión')

@section('content')
<form action="{{ route('login') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col s12 center">
            <h3>Iniciar sesión</h3>
        </div>

        <div class="col s12 center">
            <div class="input-field col s8 offset-s2">
                <i class="material-icons prefix">person</i>
                <input id="username" class="validate" type="text" name="username" value="{{ old('username') }}" required autofocus autocomplete="username" />
                <label for="username">Usuario</label>
            </div>

            <div class="input-field col s8 offset-s2">
                <i class="material-icons prefix">vpn_key</i>
                <input id="password" class="validate" type="password" name="password" required autocomplete="current-password" />
                <label for="password">Contraseña</label>
            </div>

            <div class="col s12 center">
                <label>
                    <input type="checkbox" class="filled-in" />
                    <span>Recuerdame</span>
                </label>
            </div>

            <div class="col s12 center">
                <button class="waves-effect waves-light btn" type="submit"><i class="material-icons left">send</i> Entrar</button>
            </div>
        </div>
    </div>
</form>
@endsection
