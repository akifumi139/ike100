<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>IKE100ダッシュボード</title>

    @vite(['resources/css/reset.css','resources/css/app.css'])

</head>

<body>
    @yield('content')
</body>

</html>