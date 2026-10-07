@extends('layouts.app')

@section('title', 'Añadir Curso')

@section('content')
<div class="center">
    <h1 class="valign-wrapper" style="display: inline-flex;"><i class="material-icons left" style="font-size: 3rem;">add</i> Añadir Curso</h1>
</div>

<form action="{{ route('user.courses.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="input-field col s8 offset-s2">
            <i class="material-icons prefix">create</i>
            <select name="year" required>
                <option value="" disabled selected>Selecciona un Año</option>
                <option value="1er">1er</option>
                <option value="2do">2do</option>
                <option value="3er">3er</option>
                <option value="4to">4to</option>
                <option value="5to">5to</option>
                <option value="6to">6to</option>
            </select>
            <label>Año</label>
        </div>

        <div class="input-field col s8 offset-s2">
            <i class="material-icons prefix">create</i>
            <input id="career" name="career" type="text" class="validate" required value="{{ old('career') }}" />
            <label for="career">Mención</label>
            @if ($errors->has('career'))
            <span class="helper-text" data-error="{{ $errors->first('career') }}"></span>
            @endif
        </div>

        <div class="input-field col s8 offset-s2">
            <i class="material-icons prefix">create</i>
            <select name="section">
                <option value="" disabled>Selecciona una Sección</option>
                <option value="U" selected>U</option>
                <option value="A">A</option>
                <option value="B">B</option>
            </select>
            <label>Sección</label>
        </div>

        <div class="col s12 center" style="padding-top: 1.5rem">
            <button class="waves-effect waves-light btn-large" type="submit" style="width: 100%"><i class="material-icons left">save</i> Guardar</button>
        </div>
    </div>
</form>
@endsection
