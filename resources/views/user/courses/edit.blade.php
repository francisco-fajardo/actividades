@extends('layouts.app')

@section('title', 'Editar Curso')

@php
$years = ['1er', '2do', '3er', '4to', '5to', '6to'];
$sections = ['U', 'A', 'B'];
@endphp

@section('content')
<div class="center">
    <h1 class="valign-wrapper" style="display: inline-flex;"><i class="material-icons left" style="font-size: 3rem;">edit</i> Editar Curso</h1>
</div>

<form action="{{ route('user.courses.update', $course) }}" method="POST">
    @csrf

    <div class="row">
        <div class="input-field col s8 offset-s2">
            <i class="material-icons prefix">create</i>
            <select name="year" required>
            <option value="" disabled>Selecciona un Año</option>
            @foreach ($years as $year)
            <option value="{{ $year }}" @if ($course->year === $year) selected @endif>{{ $year }}</option>
            @endforeach
            </select>
            <label>Año</label>
        </div>

        <div class="input-field col s8 offset-s2">
            <i class="material-icons prefix">create</i>
            <input id="career" name="career" type="text" class="validate" required value="{{ $course->career }}" />
            <label for="career">Mención</label>
            @if ($errors->has('career'))
            <span class="helper-text" data-error="{{ $errors->first('career') }}"></span>
            @endif
        </div>

        <div class="input-field col s8 offset-s2">
            <i class="material-icons prefix">create</i>
            <select name="section">
                <option value="" disabled>Selecciona una Sección</option>
                @foreach ($sections as $section)
                <option value="{{ $section }}" @if ($course->section === $section) selected @endif>{{ $section }}</option>
                @endforeach
            </select>
            <label>Sección</label>
        </div>

        <div class="col s12 m6 center" style="padding-top: 1.5rem">
            <button class="waves-effect waves-light btn-large" type="submit" style="width: 100%"><i class="material-icons left">save</i> Guardar</button>
        </div>

        <div class="col s12 m6 center" style="padding-top: 1.5rem">
            <button class="waves-effect waves-light btn-large red darken-2" onclick="event.preventDefault(); if (confirm('¿Está seguro de que desea eliminar este curso?')) { document.getElementById('delete-form').submit(); }" style="width: 100%"><i class="material-icons left">close</i> Eliminar</button>
        </div>
    </div>
</form>

<form id="delete-form" action="{{ route('user.courses.delete', $course) }}" method="POST">
    @csrf
</form>
@endsection
