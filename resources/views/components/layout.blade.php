<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>{{ $title ?? 'graduation project' }}</title>
    {{ $styles ?? '' }}
</head>

<body>
    @include('components.navbar')
    {{ $slot }}
</body>

</html>
