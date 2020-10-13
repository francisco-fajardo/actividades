@extends('layouts.app')

@section('title', 'Página no encontrada')

@section('content')
<div class="row">
    <div class="col s12 m12 l12">
        <div class="card center z-depth-2">
            <div class="card-content">
                <span class="card-title">Página no encontrada</span>

                <p>El recurso que deseas acceder no se encuentra.</p>
            </div>

            <div class="card-action">
                <a href="{{ route('home') }}"><i class="material-icons tiny">home</i> Inicio</a>
            </div>
        </div>
    </div>
</div>
@endsection
