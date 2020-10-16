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
            @error('first_name')
            <span class="helper-text" data-error="{{ $message }}"></span>
            @enderror
        </div>

        <div class="input-field col s8 offset-s2">
            <i class="material-icons prefix">person</i>
            <input id="last_name" name="last_name" type="text" class="validate" value="{{ $user->last_name }}" required />
            <label for="last_name">Apellido</label>
            @error('last_name')
            <span class="helper-text" data-error="{{ $message }}"></span>
            @enderror
        </div>

        <div class="input-field col s8 offset-s2">
            <i class="material-icons prefix">email</i>
            <input id="email" type="email" name="email" class="validate" value="{{ $user->email }}" required autocomplete="email" />
            <label for="email">Correo</label>
            @error('email')
            <span class="helper-text" data-error="{{ $message }}"></span>
            @enderror
        </div>

        <div class="input-field col s8 offset-s2">
            <i class="material-icons prefix">meeting_room</i>
            <select name="department_id">
                @foreach ($departments as $department)
                <option value="{{ $department->id }}"@if ($user->department_id === $department->id) selected @endif>{{ $department->name }}</option>
                @endforeach
            </select>
            <label>Departamento</label>
            @error('department_id')
            <span class="helper-text" data-error="{{ $message }}"></span>
            @enderror
        </div>

        <div class="input-field col s8 offset-s2">
            <i class="material-icons prefix">person</i>
            <input id="username" type="text" name="username" class="validate" value="{{ $user->username }}" required autocomplete="username" />
            <label for="username">Usuario</label>
            @error('username')
            <span class="helper-text" data-error="{{ $message }}"></span>
            @enderror
        </div>

        <div class="col s12 center">
            <label>
                <input type="checkbox" name="admin" class="filled-in"@if ($user->isAdmin()) checked="true" @endif />
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
