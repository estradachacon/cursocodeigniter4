<?= $this->extend('Layouts/mainbody') ?>
<?= $this->section('content') ?>
    <h1>Actualizar registro de pelicula</h1>
    <form action="/dashboard/peliculas/update/<?= $id ?>" method="post">
    <?= view('peliculas/_form',['op'=>'Actualizar']) ?>
    </form>
<?= $this->endSection() ?>