<?= $this->extend('Layouts/mainbody') ?>
<?= $this->section('content') ?>
<h1>Listado de películas </h1>

    <a href='peliculas/new'><i class="fa-solid fa-pen-to-square">Crear nuevo</i></a>
    <a href='categorias'><i class="fa-solid fa-pen-to-square">Ver categorias</i></a>
    <table class="table table-striped table-hover table-bordered">
        <tr class='text-center'>
            <th class="col-sm">ID</th>
            <th>Titulo</th>
            <th>Comentarios</th>
            <th>Categoria</th>
            <th class="col-sm-3">Acciones</th>
        </tr>
    <?php foreach ($peliculas as $pelicula) : ?>
        <tr>
            <td class="text-center"><?= $pelicula->id?></td>
            <td><?= $pelicula->titles?></td>
            <td><?= $pelicula->description?></td>
            <td><?= $pelicula->categoryName?></td>
            <td>
                <a href='peliculas/show/<?= $pelicula->id ?>'><i class="fa-solid fa-pen-to-square">Ver pelicula</i></a>
                <a href='peliculas/edit/<?= $pelicula->id ?>'><i class="fa-solid fa-pen-to-square">Editar</i></a>
                <form action="/dashboard/peliculas/delete/<?= $pelicula->id ?>" method="post">
                    <button type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
    <?php endforeach ?>
    </table>
<?= $this->endSection() ?>