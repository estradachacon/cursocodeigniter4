<?= $this->extend('Layouts/mainbody') ?>
<?= $this->section('content') ?>
    <h1><?= $peliculas->titles ?></h1>
    <p><?= $peliculas->description ?></p>
<?= $this->endSection() ?>