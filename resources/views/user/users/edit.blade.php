@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')
<div class="center">
    <h1>Editar</h1>
</div>

<form action="{{ route('user.users.update', $user) }}" method="POST">
    @csrf

    <div class="row">
        <div class="input-field col s8 offset-s2">
            <i class="material-icons prefix">person</i>
            <input id="first_name" name="first_name" type="text" class="validate" value="{{ $user->first_name }}" required />
            <label for="first_name">Nombre</label>
            @if ($errors->has('first_name'))
            <span class="helper-text" data-error="{{ $errors->first('first_name') }}"></span>
            @endif
        </div>

        <div class="input-field col s8 offset-s2">
            <i class="material-icons prefix">person</i>
            <input id="last_name" name="last_name" type="text" class="validate" value="{{ $user->last_name }}" required />
            <label for="last_name">Apellido</label>
            @if ($errors->has('last_name'))
            <span class="helper-text" data-error="{{ $errors->first('last_name') }}"></span>
            @endif
        </div>

        <div class="input-field col s8 offset-s2">
            <i class="material-icons prefix">email</i>
            <input id="email" type="email" name="email" class="validate" value="{{ $user->email }}" required autocomplete="email" />
            <label for="email">Correo</label>
            @if ($errors->has('email'))
            <span class="helper-text" data-error="{{ $errors->first('email') }}"></span>
            @endif
        </div>

        <div class="input-field col s8 offset-s2">
            <i class="material-icons prefix">meeting_room</i>
            <select name="department_id">
                @foreach ($departments as $department)
                <option value="{{ $department->id }}"@if ($user->department_id === $department->id) selected @endif>{{ $department->name }}</option>
                @endforeach
            </select>
            <label>Departamento</label>
        </div>

        <div class="input-field col s8 offset-s2">
            <i class="material-icons prefix">person</i>
            <input id="username" type="text" name="username" class="validate" value="{{ $user->username }}" required autocomplete="username" />
            <label for="username">Usuario</label>
            @if ($errors->has('username'))
            <span class="helper-text" data-error="{{ $errors->first('username') }}"></span>
            @endif
        </div>

        <div class="col s12 center">
            <label>
                <input type="checkbox" name="admin" class="filled-in" @if ($user->isAdmin()) checked @endif />
                <span>Administrador</span>
            </label>
        </div>

        <div class="col s12 m6 center">
            <button type="submit" class="waves-effect waves-light btn-large" style="width: 100%"><i class="material-icons left">save</i> Guardar</button>
        </div>

        <div class="col s12 m6 center">
            <button class="waves-effect waves-light btn-large red darken-2" onclick="event.preventDefault(); document.getElementById('delete-form').submit()" style="width: 100%"><i class="material-icons left">close</i> Eliminar</button>
        </div>
    </div>
</form>

<form id="delete-form" action="{{ route('user.users.delete', $user) }}" method="POST">
    @csrf
</form>
@endsection
