@extends('layouts.app')

@section('title', 'Panel de Control (Usuarios)')

@section('content')
<div class="center">
    <h1 class="valign-wrapper" style="display: inline-flex;"><i class="material-icons left" style="font-size: 3rem;">person</i> Usuarios</h1>
</div>

<div class="row">
    <div class="col s8 offset-s2 center">
        <a href="{{ route('user.users.new') }}" class="waves-effect waves-light btn"><i class="material-icons left">add</i> Añadir</a>
    </div>
</div>

<table class="centered highlight datatable">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Departamento</th>
            <th>Usuario</th>
            <th>Administrador</th>
            <th class="no-sort">Opciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($users as $user)
        @if (Auth::user()->id !== $user->id)
        <tr>
            <td>{{ $user->full_name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->department->name }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->isAdmin() ? 'Sí' : 'No' }}</td>
            <td>
                <a class="waves-effect waves-light btn tooltipped" href="{{ route('user.users.edit', $user) }}" data-position="bottom" data-tooltip="Editar">
                    <i class="material-icons">edit</i>
                </a>
                <form action="{{ route('user.users.delete', $user) }}" method="POST" style="display: inline-block;">
                    @csrf
                    <button type="submit" class="waves-effect waves-light btn red darken-2 tooltipped" data-position="bottom" data-tooltip="Eliminar" onclick="return confirm('¿Está seguro de que desea eliminar este usuario?')">
                        <i class="material-icons">delete</i>
                    </button>
                </form>
            </td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>
@endsection
