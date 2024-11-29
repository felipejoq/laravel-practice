<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- set defaul title or use the title section -->
    <title>@yield('title', 'Laravel')</title>
    <!-- @/vite('resources/css/app.css') -->
</head>
<body>
<header>
    <nav>
        <ul style="display: flex; gap: 30px; list-style: none;">
            <li style="padding:2px 5px; border:1px solid green;"><a href="/">Home</a></li>
            <li style="padding:2px 5px; border:1px solid blue;"><a href="/contact-1">Contact 1</a></li>
            <li style="padding:2px 5px; border:1px solid blue;"><a href="/contact-2">Contact 2</a></li>
        </ul>
    </nav>
</header>
@yield('content')

</body>
</html>
