<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear registro</title>
</head>
<body>
    <h1>Crear nueva pelicula</h1>
    <form action="/dashboard/categorias/create" method="post">
    <?= view('categorias/_form',['op'=>'Crear']) ?>
    </form>
</body>
</html>