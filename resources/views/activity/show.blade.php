<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title>{{ $course->full_name }} - {{ $activity->subject }}</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" />
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
