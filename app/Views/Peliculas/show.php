<?= $this->extend('Layouts/mainbody') ?>
<?= $this->section('content') ?>
    <h1><?= $pelicula['titles'] ?></h1>
    <p><?= $pelicula['description'] ?></p>
<?= $this->endSection() ?>