<?= $this->extend('Layouts/mainbody') ?>
<?= $this->section('content') ?>
    <h1>Crear nueva categoria</h1>
    <form action="/dashboard/categorias/create" method="post">
    <?= view('categorias/_form',['op'=>'Crear']) ?>
    </form>
<?= $this->endSection() ?>