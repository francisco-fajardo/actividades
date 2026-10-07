@extends('layouts.app')

@section('title', 'Actividad')

@section('content')
<div class="center">
    <h1 class="valign-wrapper" style="display: inline-flex;"><i class="material-icons left" style="font-size: 3rem;">description</i> {{ $activity->subject }}</h1>
    <h5>{{ $user->full_name }}</h5>
    <h5>{{ $course->full_name }}</h5>
</div>

<div class="row" style="margin-top: 1.5rem; margin-bottom: 2rem;">
    <div class="col s12 center" style="display: flex; justify-content: center; gap: 10px; flex-wrap: wrap;">
        <a href="{{ route('activities.show', $course) }}" class="waves-effect waves-light btn grey lighten-1 grey-text text-darken-3 tooltipped" data-position="bottom" data-tooltip="Volver a las actividades">
            <i class="material-icons left">arrow_back</i> Actividades
        </a>
        <a href="{{ route('activity.download', $activity) }}" class="waves-effect waves-light btn tooltipped" data-position="bottom" data-tooltip="Descargar actividad">
            <i class="material-icons left">get_app</i> Descargar
        </a>
    </div>
</div>

<div class="browser-default">
    {!! $activity->activity !!}
</div>
@endsection
