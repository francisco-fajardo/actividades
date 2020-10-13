@extends('layouts.app')

@section('title', 'Actividades')

@section('content')
<div class="center">
    <h1>Actividades</h1>

    <h5>{{ $course->full_name }}</h5>
</div>

<table class="centered highlight">
    <thead>
        <th>Asignatura</th>
        <th>Profesor</th>
        <th>Opciones</th>
    </thead>

    <tbody>
        @foreach ($activities as $activity)
        <tr>
            <td>{{ $activity->subject }}</td>
            <td>{{ $activity->user->full_name }}</td>
            <td>
                <a class="waves-effect waves-light btn tooltipped" href="{{ route('activity.show', $activity) }}" data-position="bottom" data-tooltip="Ver"><i class="material-icons">visibility</i></a>
                <a class="waves-effect waves-light btn tooltipped" href="#!" data-position="bottom" data-tooltip="Descargar" disabled aria-disabled="true"><i class="material-icons">get_app</i></a>
                <a class="waves-effect waves-light btn tooltipped" href="#!" data-position="bottom" data-tooltip="Enviar por Correo" disabled aria-disabled="true"><i class="material-icons">email</i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
