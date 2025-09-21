<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculas</title>
</head>
<body>
    <h1>Listado de películas </h1>
    <a href='/peliculas/new'><i class="fa-solid fa-pen-to-square">Crear nuevo</i></a>
    <a href='/categorias'><i class="fa-solid fa-pen-to-square">Ver categorias</i></a>
    <table>
        <tr>
            <th>Titulo</th>
            <th>Comentarios</th>
        </tr>
    <?php foreach ($peliculas as $key => $value) : ?>
        <tr>
            <td><?= $value ['titles']?></td>
            <td><?= $value ['description']?></td>
            <td>
                <a href='/peliculas/show/<?= $value ['id'] ?>'><i class="fa-solid fa-pen-to-square">Ver pelicula</i></a>
                <a href='/peliculas/edit/<?= $value ['id'] ?>'><i class="fa-solid fa-pen-to-square">Editar</i></a>
                <form action="/peliculas/delete/<?= $value ['id'] ?>" method="post">
                    <button type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
    <?php endforeach ?>
</body>
</html>