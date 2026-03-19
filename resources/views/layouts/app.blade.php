<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'EmotionPlay')</title>
    <link rel="stylesheet" href="{{ asset('css/panel.css') }}">
</head>

<body>
    <div class="layout">
        @include('layouts.partials.sidebar')

        <main class="main">
            @include('layouts.partials.topbar')

            @if(session('success'))
            <div class="alert alert-success" style="margin-bottom: 20px;">
                {{ session('success') }}
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-error" style="margin-bottom: 20px;">
                {{ $errors->first() }}
            </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>

</html>