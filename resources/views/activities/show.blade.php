@extends('layouts.app')

@section('title', 'Actividades')

@section('content')
<div class="center">
    <h1 class="valign-wrapper" style="display: inline-flex;"><i class="material-icons left" style="font-size: 3rem;">description</i> Actividades</h1>

    <h5>{{ $course->full_name }}</h5>
</div>

<div class="row" style="margin-top: 1.5rem; margin-bottom: 2rem;">
    <div class="col s12 center" style="display: flex; justify-content: center; gap: 10px; flex-wrap: wrap;">
        <a href="{{ route('home') }}" class="waves-effect waves-light btn grey lighten-1 grey-text text-darken-3 tooltipped" data-position="bottom" data-tooltip="Volver al inicio">
            <i class="material-icons left">arrow_back</i> Inicio
        </a>
    </div>
</div>

<table class="centered highlight datatable">
    <thead>
        <tr>
            <th>Asignatura</th>
            <th>Profesor</th>
            <th class="no-sort">Opciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($activities as $activity)
        <tr>
            <td>{{ $activity->subject }}</td>
            <td>{{ $activity->user->full_name }}</td>
            <td>
                <a class="waves-effect waves-light btn tooltipped" href="{{ route('activity.show', $activity) }}" data-position="bottom" data-tooltip="Ver"><i class="material-icons">visibility</i></a>
                <a class="waves-effect waves-light btn tooltipped" href="{{ route('activity.download', $activity) }}" data-position="bottom" data-tooltip="Descargar"><i class="material-icons">get_app</i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
