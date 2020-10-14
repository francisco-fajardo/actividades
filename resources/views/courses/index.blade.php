@extends('layouts.app')

@section('title', 'Cursos')

@section('content')
<div class="center">
    <h1>Cursos</h1>
</div>

<table class="centered highlight">
    <thead>
        <tr>
            <th>Año</th>
            <th>Mención</th>
            <th>Sección</th>
            <th>Actividades Publicadas</th>
        </tr>
    </thead>

    <tbody>
@foreach ($courses as $course)
        <tr data-href onclick="window.location='{{ route('activities.show', $course) }}'">
            <td>{{ $course->year }}</td>
            <td>{{ $course->career }}</td>
            <td>{{ $course->section }}</td>
            <td><strong>{{ $course->activity_count }}</strong></td>
        </tr>
@endforeach
    </tbody>
</table>
@endsection
