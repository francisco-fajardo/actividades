<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />

    <title>{{ $course->full_name }} - {{ $activity->subject }}</title>
</head>

<body>
    <div style="text-align: center">
        <h1>{{ $activity->subject }}</h1>
        <h3>{{ $user->full_name }}</h3>
        <h3>{{ $course->full_name }}</h3>
    </div>

    {!! $activity->activity !!}
</body>

</html>
