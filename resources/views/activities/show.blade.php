@extends('layouts.app')

@section('title', 'Actividades')

@section('content')
<div class="center">
    <h1>Actividades</h1>

    <h5>{{ $course->full_name }}</h5>
</div>

<table class="centered highlight">
    <thead>
        <tr>
            <th>Asignatura</th>
            <th>Profesor</th>
            <th>Opciones</th>
        <tr>
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
