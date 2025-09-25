<?= $this->extend('Layouts/web') ?>
<?= $this->section('content') ?>
<h1>Iniciar sesión</h1>
<form action="<?= route_to('usuario.register')?>" method="post">

<label for="usuario">Usuario</label>
<input type="text" name="usuario" id="usuario">

<label for="email">Email</label>
<input type="text" name="email" id="email">

<label for="contrasena">Contraseña</label>
<input type="password" name="contrasena" id="contrasena">

<button type="submit">Registrarse</button>
</form>
<?= $this->endSection() ?>