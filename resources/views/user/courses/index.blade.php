@extends('layouts.app')

@section('title', 'Panel de Control (Cursos)')

@section('content')
<div class="center">
    <h1 class="valign-wrapper" style="display: inline-flex;"><i class="material-icons left" style="font-size: 3rem;">meeting_room</i> Cursos</h1>
</div>

<div class="row">
    <div class="col s12 center" style="display: flex; justify-content: center; gap: 10px; flex-wrap: wrap;">
        <a href="{{ route('user.dashboard') }}" class="waves-effect waves-light btn grey lighten-1 grey-text text-darken-3 tooltipped" data-position="bottom" data-tooltip="Volver al Panel de Control">
            <i class="material-icons left">dashboard</i> Panel
        </a>
        <a href="{{ route('user.courses.new') }}" class="waves-effect waves-light btn">
            <i class="material-icons left">add</i> Añadir
        </a>
    </div>
</div>

<table class="centered highlight datatable">
    <thead>
        <tr>
            <th>Año</th>
            <th>Mención</th>
            <th>Sección</th>
            <th class="no-sort">Opciones</th>
        </tr>
    </thead>

    <tbody>
@foreach ($courses as $course)
        <tr>
            <td>{{ $course->year }}</td>
            <td>{{ $course->career }}</td>
            <td>{{ $course->section }}</td>
            <td>
                <a class="waves-effect waves-light btn tooltipped" href="{{ route('user.courses.edit', $course) }}" data-position="bottom" data-tooltip="Editar">
                    <i class="material-icons">edit</i>
                </a>
                <form action="{{ route('user.courses.delete', $course) }}" method="POST" style="display: inline-block;">
                    @csrf
                    <button type="submit" class="waves-effect waves-light btn red darken-2 tooltipped" data-position="bottom" data-tooltip="Eliminar" onclick="return confirm('¿Está seguro de que desea eliminar este curso?')">
                        <i class="material-icons">delete</i>
                    </button>
                </form>
            </td>
        </tr>
@endforeach
    </tbody>
</table>
@endsection
