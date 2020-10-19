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
        </tr>
    </thead>

    <tbody>
@foreach ($departments as $department)
        <tr data-href onclick="window.location='{{ route('user.departments.edit', $department) }}'">
            <td>{{ $department->name }}</td>
            <td>{{ $department->description }}</td>
        </tr>
@endforeach
    </tbody>
</table>
@endsection
