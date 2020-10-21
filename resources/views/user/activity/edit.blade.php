@extends('layouts.app')

@section('title', 'Editar Actividad')

@section('content')
<div class="center">
    <h1>Editar Actividad</h1>
</div>

<form method="POST" action="{{ route('user.activity.update', $activity) }}">
    @csrf

    <div class="row">
        <div class="input-field col s12 m6">
            <i class="material-icons prefix">meeting_room</i>
            <select name="course_id" required>
@foreach ($courses as $course)
                <option value="{{ $course->id }}" @if ($course->id === $activity->course_id) selected @endif>{{ $course->full_name }}</option>
@endforeach
            </select>
            <label>Curso</label>
        </div>

        <div class="input-field col s12 m6">
            <i class="material-icons prefix">description</i>
            <input id="subject" name="subject" type="text" class="validate" required value="{{ $activity->subject }}" />
            <label for="subject">Asignatura</label>
            @if ($errors->has('subject'))
            <span class="helper-text" data-error="{{ $errors->first('subject') }}"></span>
            @endif
        </div>

        <div class="col s12">
            <textarea placeholder="Escriba aquí su actividad" name="activity" id="activity">{!! $activity->activity !!}</textarea>
        </div>

        <div class="col s12 m6 center">
            <button class="waves-effect waves-light btn-large" type="submit" style="width: 100%"><i class="material-icons left">save</i> Guardar</button>
        </div>

        <div class="col s12 m6 center">
            <button class="waves-effect waves-light btn-large red darken-2" onclick="event.preventDefault(); document.getElementById('delete-form').submit()" style="width: 100%"><i class="material-icons left">close</i> Eliminar</button>
        </div>
    </div>
</form>

<form id="delete-form" action="{{ route('user.activity.delete', $activity) }}" method="POST">
    @csrf
</form>
@endsection

@section('endbody')
<script src="{{ asset('js/vendor/ckeditor/ckeditor.js') }}"></script>
<script>
    ClassicEditor
        .create(document.getElementById('activity'), {
            'toolbar': {
                'items': [
                    'heading',
                    '|',
                    'fontFamily',
                    'fontSize',
                    'bold',
                    'italic',
                    'alignment',
                    'removeFormat',
                    '|',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'indent',
                    'outdent',
                    '|',
                    'insertTable',
                    'fontBackgroundColor',
                    'fontColor',
                    'undo',
                    'redo',
                    'imageInsert',
                    'link',
                    'mediaEmbed',
                    'codeBlock',
                    'blockQuote',
                    'horizontalLine'
                ]
            },
            'language': 'es',
            'image': {
                'toolbar': [
                    'imageTextAlternative',
                    'imageStyle:full',
                    'imageStyle:side'
                ]
            },
            'table': {
                'contentToolbar': [
                    'tableColumn',
                    'tableRow',
                    'mergeTableCells'
                ]
            },
            'link': {
                'addTargetToExternalLinks': true,
                'defaultProtocol': 'http://'
            },
            'licenseKey': ''
        })
        .then(function (editor) {
            window.editor = editor;
        })
        .catch(function (err) {
            console.error(err);
        });
</script>
@endsection
