<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DahaTech</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('Assets/img/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('Assets/style.css') }}">
    <link rel="stylesheet" href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css') }}">
</head>

<body>
    @yield('content')

    <script src="{{ asset('Assets/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('Assets/script.js') }}"></script>
</body>

</html>