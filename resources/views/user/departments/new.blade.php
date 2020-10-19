@extends('layouts.app')

@section('title', 'Añadir Departamento')

@section('content')
<div class="center">
    <h1>Añadir Departamento</h1>
</div>

<form action="{{ route('user.departments.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="input-field col s8 offset-s2">
            <i class="material-icons prefix">description</i>
            <input id="name" name="name" type="text" class="validate" required value="{{ old('name') }}" />
            <label for="name">Nombre</label>
            @if ($errors->has('name'))
            <span class="helper-text" data-error="{{ $errors->first('name') }}"></span>
            @endif
        </div>

        <div class="input-field col s8 offset-s2">
            <i class="material-icons prefix">receipt_long</i>
            <textarea id="description" name="description" type="text" class="materialize-textarea">{{ old('description') }}</textarea>
            <label for="description">Descripción</label>
        </div>

        <div class="col s12">
            <button class="waves-effect waves-light btn-large" type="submit" style="width: 100%"><i class="material-icons left">save</i> Guardar</button>
        </div>
    </div>
</form>
@endsection
