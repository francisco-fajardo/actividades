@extends('layouts.app')

@section('title', 'Añadir Usuario')

@section('content')
<div class="center">
    <h1>Añadir Usuario</h1>
</div>

<form action="{{ route('user.users.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="input-field col s8 offset-s2">
            <i class="material-icons prefix">person</i>
            <input id="first_name" name="first_name" type="text" class="validate" required autofocus value="{{ old('first_name') }}" />
            <label for="first_name">Nombre</label>
            @error('first_name')
            <span class="helper-text" data-error="{{ $message }}"></span>
            @enderror
        </div>

        <div class="input-field col s8 offset-s2">
            <i class="material-icons prefix">person</i>
            <input id="last_name" name="last_name" type="text" class="validate" required value="{{ old('last_name') }}" />
            <label for="last_name">Apellido</label>
            @error('last_name')
            <span class="helper-text" data-error="{{ $message }}"></span>
            @enderror
        </div>

        <div class="input-field col s8 offset-s2">
            <i class="material-icons prefix">email</i>
            <input id="email" name="email" type="email" class="validate" required autocomplete="email" value="{{ old('email') }}" />
            <label for="email">Correo</label>
            @error('email')
            <span class="helper-text" data-error="{{ $message }}"></span>
            @enderror
        </div>

        <div class="input-field col s8 offset-s2">
            <i class="material-icons prefix">meeting_room</i>
            <select name="department_id">
                <option value="" disabled selected>Selecciona un Departamento</option>
                @foreach ($departments as $department)
                <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
            <label>Departamento</label>
            @error('department_id')
            <span class="helper-text" data-error="{{ $message }}"></span>
            @enderror
        </div>

        <div class="input-field col s8 offset-s2">
            <i class="material-icons prefix">person</i>
            <input id="username" name="username" type="text" class="validate" required autocomplete="username" value="{{ old('username') }}" />
            <label for="username">Usuario</label>
            @error('username')
            <span class="helper-text" data-error="{{ $message }}"></span>
            @enderror
        </div>

        <div class="input-field col s8 offset-s2">
            <i class="material-icons prefix">vpn_key</i>
            <input id="password" name="password" type="password" class="validate" required autocomplete="current-password" />
            <label for="password">Contraseña</label>
            @error('password')
            <span class="helper-text" data-error="{{ $message }}"></span>
            @enderror
        </div>

        <div class="input-field col s8 offset-s2">
            <i class="material-icons prefix">vpn_key</i>
            <input id="password_confirmation" name="password_confirmation" type="password" class="validate" required autocomplete="current-password" />
            <label for="password_confirmation">Repetir Contraseña</label>
            @error('password_confirmation')
            <span class="helper-text" data-error="{{ $message }}"></span>
            @enderror
        </div>

        <div class="col s12 center">
            <label>
                <input type="checkbox" name="admin" class="filled-in" {{ old('admin') ? 'checked' : '' }} />
                <span>Administrador</span>
            </label>
        </div>

        <div class="col s12 m6 center">
            <button type="submit" class="waves-effect waves-light btn-large" style="width: 100%"><i class="material-icons left">save</i> Guardar</button>
        </div>

        <div class="col s12 m6 center">
            <button class="waves-effect waves-light btn-large" style="width: 100%"><i class="material-icons left">close</i> Eliminar</button>
        </div>
    </div>
</form>
@endsection
