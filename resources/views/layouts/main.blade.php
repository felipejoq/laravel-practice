<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- set defaul title or use the title section -->
    <title>@yield('title', 'Laravel')</title>
    @vite('resources/css/app.css')
    @stack('styles')
</head>
<body>
<header class="max-w-screen-lg mx-auto">
    <nav>
        <ul style="display: flex; gap: 30px; list-style: none;">
            <li style="padding:2px 5px; border:1px solid green;">
                <a href="/">Mi super blog</a>
            </li>
        </ul>
    </nav>
</header>
@yield('content')
</body>
</html>
