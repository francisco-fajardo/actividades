@extends('layouts.app')

@section('title', 'Panel de Control')

@section('content')
<div class="center">
    <h4>Panel de Control</h4>
</div>

<div class="row">
    <div class="col s12 m6 center">
        <a class="waves-effect waves-light btn-large" style="width: 100%" href="{{ route('user.activities.index') }}"><i class="material-icons left">description</i> Actividades</a>

        <p>Publicadas: <strong>0</strong></p>
    </div>

    <div class="col s12 m6 center">
        <a class="waves-effect waves-light btn-large" style="width: 100%" href="#!" disabled><i class="material-icons left">books</i> Libros</a>

        <p>Publicados: <strong>{{ $activitiesCount }}</strong></p>
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
@endif
</div>
@endsection
