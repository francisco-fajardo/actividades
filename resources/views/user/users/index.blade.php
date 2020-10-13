@extends('layouts.app')

@section('title', 'Panel de Control (Usuarios)')

@section('content')
<div class="center">
    <h1>Usuarios</h1>
</div>

<table class="centered highlight">
    <thead>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Departamento</th>
        <th>Usuario</th>
        <th>Administrador</th>
    </thead>

    <tbody>
        @foreach ($users as $user)
        @if (Auth::user()->id !== $user->id)
        <tr data-href onclick="window.location='{{ route('user.users.show', $user) }}'">
            <td>{{ $user->full_name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->department->name }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->isAdmin() ? 'Sí' : 'No' }}</td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>
@endsection
