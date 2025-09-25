<?= $this->extend('Layouts/web') ?>
<?= $this->section('content') ?>
<h1>Iniciar sesión</h1>
<form action="<?= route_to('usuario.login_post')?>" method="post">
<label for="email">Email/Usuario</label>
<input type="text" name="email" id="email">

<label for="contrasena">Contraseña</label>
<input type="password" name="contrasena" id="contrasena">

<button type="submit">Iniciar sesión</button>
</form>
<?= $this->endSection() ?>