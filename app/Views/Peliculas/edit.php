<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar registro</title>
</head>
<body>
    <h1>Actualizar registro de pelicula</h1>
    <form action="/peliculas/update/<?= $id ?>" method="post">
    <?= view('/peliculas/_form',['op'=>'Actualizar']) ?>
    </form>
</body>
</html>