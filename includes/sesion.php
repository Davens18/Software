<?php if (isset($_SESSION['acceso'])) : ?>
    <div class="row bg-light">
        <div class="">
            <p class="h6 text-end mx-3 mb-3 text-dark">Bienvenido, <?= $_SESSION["acceso"]["nombre_usuario"]; ?></p>
        </div>
    </div>
<?php endif; ?>