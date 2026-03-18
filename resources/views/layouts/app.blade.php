<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema EmotionPlay')</title>
    <link rel="stylesheet" href="{{ asset('css/panel.css') }}">
</head>
<body>
    <div class="layout">
        @include('layouts.partials.sidebar')

        <main class="main">
            @include('layouts.partials.topbar')
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('js/panel.js') }}"></script>
</body>
</html>
