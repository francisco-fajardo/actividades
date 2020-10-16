@extends('layouts.app')

@section('title', 'Panel de Control (Cursos)')

@section('content')
<div class="center">
    <h1>Cursos</h1>
</div>

<div class="row">
    <div class="col s8 offset-s2 center">
        <a href="{{ route('user.courses.new') }}" class="waves-effect waves-light btn"><i class="material-icons left">add</i> Añadir</a>
    </div>
</div>

<table class="centered highlight">
    <thead>
        <tr>
            <th>Año</th>
            <th>Mención</th>
            <th>Sección</th>
        </tr>
    </thead>

    <tbody>
@foreach ($courses as $course)
        <tr data-href onclick="window.location='{{ route('user.courses.edit', $course) }}'">
            <td>{{ $course->year }}</td>
            <td>{{ $course->career }}</td>
            <td>{{ $course->section }}</td>
        </tr>
@endforeach
    </tbody>
</table>
@endsection
