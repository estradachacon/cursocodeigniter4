<?= $this->extend('Layouts/mainbody') ?>
<?= $this->section('content') ?>
<h1>Listado de películas </h1>
    <a href='peliculas/new'><i class="fa-solid fa-pen-to-square">Crear nuevo</i></a>
    <a href='categorias'><i class="fa-solid fa-pen-to-square">Ver categorias</i></a>
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
                <a href='peliculas/show/<?= $value ['id'] ?>'><i class="fa-solid fa-pen-to-square">Ver pelicula</i></a>
                <a href='peliculas/edit/<?= $value ['id'] ?>'><i class="fa-solid fa-pen-to-square">Editar</i></a>
                <form action="/dashboard/peliculas/delete/<?= $value ['id'] ?>" method="post">
                    <button type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
    <?php endforeach ?>
    </table>
<?= $this->endSection() ?>