<?= $this->extend('Layouts/mainbody') ?>
<?= $this->section('content') ?>
    <h1>Crear nueva pelicula</h1>
    <form action="create" method="post">
    <?= view('peliculas/_form',['op'=>'Crear']) ?>
    </form>
<?= $this->endSection() ?>