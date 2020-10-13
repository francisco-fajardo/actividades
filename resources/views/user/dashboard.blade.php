@extends('layouts.app')

@section('title', 'Panel de Control')

@section('content')
<div class="center">
    <h4>Panel de Control</h4>
</div>

<div class="row">
    <div class="col s12 m6 center">
        <a class="waves-effect waves-light btn-large" href="{{ route('user.activities') }}"><i class="material-icons left"></i> Actividades</a>
    </div>
</div>

@if (Auth::user()->isAdmin())
<h1>You are admin!</h1>
@endif
@endsection
