<?php if (session()->getFlashdata('mensaje')): ?>
<script>
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: '<?= session()->getFlashdata('tipo') ?? 'info' ?>',
        title: '<?= session()->getFlashdata('mensaje') ?>',
        showConfirmButton: false,
        timer: 3000
    });
</script>
<?php endif; ?>