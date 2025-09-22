<?= $this->extend('Layouts/mainbody') ?>
<?= $this->section('content') ?>
    <h1>Actualizar registro de categoria</h1>
    <form action="/dashboard/categorias/update/<?= $id ?>" method="post">
    <?= view('categorias/_form',['op'=>'Actualizar']) ?>
    </form>
<?= $this->endSection() ?>