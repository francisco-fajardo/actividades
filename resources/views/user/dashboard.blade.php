@extends('layouts.app')

@section('title', 'Panel de Control')

@section('content')
<div class="center">
    <h4>Panel de Control</h4>

    <p>Bienvenido, <strong>{{ Auth::user()->full_name }}</strong></p>
</div>

<div class="row">
    <div class="col s12 m6 center">
        <a class="waves-effect waves-light btn-large" style="width: 100%" href="{{ route('user.activities.index') }}"><i class="material-icons left">description</i> Actividades</a>

        <p>Publicadas: <strong>{{ $activitiesCount }}</strong></p>
    </div>

    <div class="col s12 m6 center">
        <a class="waves-effect waves-light btn-large" style="width: 100%" href="#!" disabled><i class="material-icons left">books</i> Libros</a>

        <p>Publicados: <strong>0</strong></p>
    </div>

@if (Auth::user()->isAdmin())
    <div class="col s12 m6 center">
        <a class="waves-effect waves-light btn-large" style="width: 100%" href="{{ route('user.users.index') }}"><i class="material-icons left">person</i> Usuarios</a>

        <p>Usuarios: <strong>{{ $usersCount }}</strong></p>
    </div>

    <div class="col s12 m6 center">
        <a class="waves-effect waves-light btn-large" style="width: 100%" href="{{ route('user.courses.index') }}"><i class="material-icons left">meeting_room</i> Cursos</a>

        <p>Cursos: <strong>{{ $coursesCount }}</strong></p>
    </div>

    <div class="col s8 offset-s2 center">
        <a class="waves-effect waves-light btn-large" style="width: 100%" href="{{ route('user.departments.index') }}"><i class="material-icons left">meeting_room</i> Departamentos</a>

        <p>Departamentos: <strong>{{ $departmentsCount }}</strong></p>
    </div>
@endif
</div>
@endsection
