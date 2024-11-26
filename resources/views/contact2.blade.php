<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact 2</title>
</head>
<body>
<h1>Contact 2</h1>
<p>{{$name}}</p>
@if($name === "Jane Doe")
    <p>Hi Jane!</p>
@else
    <p>Hi Stranger!</p>
@endif
</body>
</html>
