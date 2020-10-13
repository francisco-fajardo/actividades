@extends('layouts.app')

@section('title', 'Actividades')

@section('content')
<div class="center">
    <h4>{{ $course->full_name }}</h4>
</div>

<div class="row">
    <div class="col s12 m6 center">
        <a class="waves-effect waves-light btn-large" style="width: 100%" href="{{ route('activities.show', $course) }}"><i class="material-icons left">description</i> Actividades</a>

        <p>Publicadas: <strong>{{ $activitiesCount }}</strong></p>
    </div>

    <div class="col s12 m6 center">
        <a class="waves-effect waves-light btn-large" style="width: 100%" href="#!" disabled aria-disabled="true"><i class="material-icons left">book</i> Libros</a>

        <p>Publicados: <strong>0</strong></p>
    </div>
</div>
@endsection
