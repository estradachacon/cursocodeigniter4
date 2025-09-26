<?= $this->extend('Layouts/web') ?>
<?= $this->section('content') ?>
<div style="width: 400px; justify-content: center; margin: auto; margin-top: 50px;">
    <h1 class="mb-4 text-center">Iniciar sesión</h1>

    <form action="<?= route_to('usuario.login_post') ?>" method="post" class="p-4 border rounded shadow-sm">

        <div class="mb-3">
            <label for="email" class="form-label">Email/Usuario</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Ingresa tu correo o usuario">
        </div>

        <div class="mb-3">
            <label for="contrasena" class="form-label">Contraseña</label>
            <input type="password" class="form-control" name="contrasena" id="contrasena" placeholder="Ingresa tu contraseña">
        </div>

        <button type="submit" class="btn btn-primary w-100">Iniciar sesión</button>
    </form>
</div>
<?= $this->endSection() ?>