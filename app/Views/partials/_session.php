<?php if (session()->getFlashdata('mensaje')): ?>
    <script>
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: '<?= session()->getFlashdata('tipo') ?? 'info' ?>',
            title: '<?= session()->getFlashdata('mensaje') ?>',
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true
        });
    </script>
<?php endif; ?>
<?php if (session()->getFlashdata('validation')): ?>
    <script>
        let validationErrors = <?= json_encode(session()->getFlashdata('validation')->getErrors()) ?>;
        let errorMessage = '';

        for (const field in validationErrors) {
            if (validationErrors.hasOwnProperty(field)) {
                errorMessage += validationErrors[field] + '<br>';
            }
        }

        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'error',
            title: 'Errores de validación',
            html: errorMessage,
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true
        });
    </script>
<?php endif; ?>