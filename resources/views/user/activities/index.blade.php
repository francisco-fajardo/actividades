@extends('layouts.app')

@section('title', 'Panel de Control (Actividades)')

@section('content')
<div class="center">
    <h1>Actividades</h1>
</div>

<div class="row">
    <div class="col s8 offset-s2 center">
        <a href="{{ route('user.activity.new') }}" class="waves-effect waves-light btn"><i class="material-icons left">add</i> Añadir</a>
    </div>
</div>

<table class="centered highlight">
    <thead>
        <th>Curso</th>
        <th>Asignatura</th>
    </thead>

    <tbody>
        @foreach ($activities as $activity)
        <tr data-href onclick="window.location='{{ route('user.activity.edit', $activity) }}'">
            <td>{{ $activity->course->full_name }}</td>
            <td>{{ $activity->subject }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
