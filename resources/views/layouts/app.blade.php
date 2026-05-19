<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Synergy - @yield('title', 'Inicio')</title>

    @vite(['resources/css/global.css','resources/css/layouts/app.css'])

    @stack('styles')
</head>

<body>

    <main>
        @yield('content')
    </main>

    @stack('scripts')
</body>

</html>