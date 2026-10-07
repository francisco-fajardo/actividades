@extends('layouts.app')

@section('title', 'Actividad')

@section('content')
<div class="center">
    <h1 class="valign-wrapper" style="display: inline-flex;"><i class="material-icons left" style="font-size: 3rem;">description</i> {{ $activity->subject }}</h1>
    <h5>{{ $user->full_name }}</h5>
    <h5>{{ $course->full_name }}</h5>
</div>

<div class="browser-default">
    {!! $activity->activity !!}
</div>
@endsection
