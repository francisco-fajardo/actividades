@extends('layouts.app')

@section('title', 'Iniciar sesión')

@section('content')
    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div class="row">
            <h3 class="center">Iniciar sesión</h3>

            <div class="input-field col s12">
                <i class="material-icons prefix">person</i>
                <input id="username" class="validate @error('username') invalid @enderror" type="text" name="username" value="{{ old('username') }}" required autofocus autocomplete="username" />
                <label for="username">Usuario</label>

                @if ($errors->has('username'))
                    <span class="helper-text" data-error="{{ $errors->first('username') }}"></span>
                @endif
            </div>

            <div class="input-field col s12">
                <i class="material-icons prefix">vpn_key</i>
                <input id="password" class="validate @error('password') invalid @enderror" type="password" name="password" required autocomplete="current-password" />
                <label for="password">Contraseña</label>

                @if ($errors->has('password'))
                    <span class="helper-text" data-error="{{ $errors->first('password') }}"></span>
                @endif
            </div>

            <div class="col s12 center">
                <button class="waves-effect waves-light btn" type="submit">
                    <i class="material-icons left">send</i>
                    Entrar
                </button>
            </div>
        </div>
    </form>
@endsection
