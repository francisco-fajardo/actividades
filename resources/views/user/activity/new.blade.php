@extends('layouts.app')

@section('title', 'Añadir Actividad')

@section('content')
<div class="center">
    <h1>Añadir Actividad</h1>
</div>

<form action="{{ route('user.activity.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="input-field col s12 m6">
            <i class="material-icons prefix">meeting_room</i>
            <select name="course_id" required>
                <option value="" disabled selected>Selecciona un Curso</option>
@foreach ($courses as $course)
                <option value="{{ $course->id }}">{{ $course->full_name }}</option>
@endforeach
            </select>
            <label>Curso</label>
        </div>

        <div class="input-field col s12 m6">
            <i class="material-icons prefix">description</i>
            <input id="subject" name="subject" type="text" class="validate" required>
            <label for="subject">Asignatura</label>
        </div>

        <div class="col s12">
            <textarea placeholder="Escriba aquí su actividad" name="activity" id="activity"></textarea>
        </div>
    </div>

    <div class="col s12">
        <button class="waves-effect waves-light btn-large" type="submit" style="width: 100%"><i class="material-icons left">save</i> Guardar</button>
    </div>
</form>
@endsection

@section('endbody')
<script src="https://cdn.ckeditor.com/4.15.0/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace('activity', {
        'language': 'es',
        'height': '300px'
    });
</script>
@endsection
