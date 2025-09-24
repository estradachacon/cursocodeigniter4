<?= $this->extend('Layouts/mainbody') ?>
<?= $this->section('content') ?>
    <h1>Listado de Categorias</h1>
    <a href='categorias/new'><i class="fa-solid fa-pen-to-square">Crear categoria</i></a>
    <table>
        <tr>
            <th>Titulo</th>
            <th>Acciones</th>
        </tr>
    <?php foreach ($categorias as $key => $value) : ?>
        <tr>
            <td><?= $value->categoryName?></td>
            <td>
                <a href='/dashboard/categorias/edit/<?= $value->id ?>'><i class="fa-solid fa-pen-to-square">Editar</i></a>
                <form action="/dashboard/categorias/delete/<?= $value->id ?>" method="post">
                    <button type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
    <?php endforeach ?>
    </table>
    <a href='/dashboard/peliculas'><i class="fa-solid fa-pen-to-square">Volver</i></a>
<?= $this->endSection() ?>