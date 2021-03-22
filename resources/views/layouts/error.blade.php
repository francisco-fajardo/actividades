@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col s12 m12 l12">
            <div class="card center z-depth-2">
                <div class="card-content">
                    <span class="card-title">@yield('title')</span>

                    <p>@yield('description')</p>
                </div>

                <div class="card-action">
                    <a href="{{ route('home') }}"><i class="material-icons tiny">home</i> Inicio</a>
                </div>
            </div>
        </div>
    </div>
@endsection
