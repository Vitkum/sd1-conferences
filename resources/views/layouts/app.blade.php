<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('ui.system_name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/">
                {{ __('ui.system_name') }}
            </a>

            <span class="text-white">Matas Vitkus</span>

            <button class="btn btn-outline-light" disabled>
                {{ __('ui.logout') }}
            </button>
        </div>
    </nav>

    <div class="container mt-5">
        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
