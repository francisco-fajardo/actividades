@extends('layouts.app')

@section('title', 'Añadir Actividad')

@section('content')
<div class="center">
    <h1>Añadir Actividad</h1>
</div>

<form action={{ route('user.activity.store') }} method="POST">
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
            <input id="subject" type="text" class="validate" required>
            <label for="subject">Asignatura</label>
        </div>

        <div class="col s12">
            <textarea placeholder="Escriba aquí su actividad" name="activity" id="editor"></textarea>
        </div>
    </div>

    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
    <button class="waves-effect waves-light btn" type="submit" style="width: 100%"><i class="material-icons left">save</i> Guardar</button>
</form>
@endsection

@section('endbody')
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/translations/es.js"></script>
<script>
    ClassicEditor
        .create(document.getElementById('editor'), {
            'language': 'es'
        })
        .catch(function (err) {
            console.error(err);
        });
</script>
@endsection
