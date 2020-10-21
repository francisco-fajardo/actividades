@extends('layouts.app')

@section('title', "{{ $course->full_name }} - {{ $activity->subject }}")

@section('content')
<div class="center">
    <h1>{{ $activity->subject }}</h1>
    <h5>{{ $user->full_name }}</h5>
    <h5>{{ $course->full_name }}</h5>
</div>

<div class="browser-default">
    {!! $activity->activity !!}
</div>
@endsection
