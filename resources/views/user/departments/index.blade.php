@extends('layouts.app')

@section('title', 'Panel de Control (Departamentos)')

@section('content')
<div class="center">
    <h1>Departamentos</h1>
</div>

<div class="row">
    <div class="col s8 offset-s2 center">
        <a href="{{ route('user.departments.new') }}" class="waves-effect waves-light btn"><i class="material-icons left">add</i> Añadir</a>
    </div>
</div>

<table class="centered highlight">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Opciones</th>
        </tr>
    </thead>

    <tbody>
@foreach ($departments as $department)
        <tr>
            <td>{{ $department->name }}</td>
            <td>{{ $department->description }}</td>
            <td>
                <a class="waves-effect waves-light btn tooltipped" href="{{ route('user.departments.edit', $department) }}" data-position="bottom" data-tooltip="Editar">
                    <i class="material-icons">edit</i>
                </a>
                <form action="{{ route('user.departments.delete', $department) }}" method="POST" style="display: inline-block;">
                    @csrf
                    <button type="submit" class="waves-effect waves-light btn red darken-2 tooltipped" data-position="bottom" data-tooltip="Eliminar" onclick="return confirm('¿Está seguro de que desea eliminar este departamento?')">
                        <i class="material-icons">delete</i>
                    </button>
                </form>
            </td>
        </tr>
@endforeach
    </tbody>
</table>
@endsection
