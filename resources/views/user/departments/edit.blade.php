@extends('layouts.app')

@section('title', 'Editar Departamento')

@section('content')
<div class="center">
    <h1>Editar Departamento</h1>
</div>

<form action="{{ route('user.departments.update', $department) }}" method="POST">
    @csrf

    <div class="row">
        <div class="input-field col s8 offset-s2">
            <i class="material-icons prefix">description</i>
            <input id="name" name="name" type="text" class="validate" required value="{{ $department->name }}" />
            <label for="name">Nombre</label>
            @if ($errors->has('name'))
            <span class="helper-text" data-error="{{ $errors->first('name') }}"></span>
            @endif
        </div>

        <div class="input-field col s8 offset-s2">
            <i class="material-icons prefix">receipt_long</i>
            <textarea id="description" name="description" type="text" class="materialize-textarea">{{ $department->description }}</textarea>
            <label for="description">Descripción</label>
        </div>

        <div class="col s12 m6">
            <button class="waves-effect waves-light btn-large" type="submit" style="width: 100%"><i class="material-icons left">save</i> Guardar</button>
        </div>

        <div class="col s12 m6">
            <button class="waves-effect waves-light btn-large red darken-2" onclick="event.preventDefault(); document.getElementById('delete-form').submit()" style="width: 100%"><i class="material-icons left">close</i> Eliminar</button>
        </div>
    </div>
</form>

<form id="delete-form" action="{{ route('user.departments.delete', $department) }}" method="POST">
    @csrf
</form>
@endsection
