<?php require_once '../includes/conexion.php'; ?>
<?php require_once '../includes/cabecera.php'; ?>
<?php require_once '../includes/funciones.php'; ?>
<?php require_once 'navegacion.php'; ?>
<?php require_once '../includes/sesion.php'; ?>

<div class="container mt-3">
    <div class="col-md-12 p-3">
        <div id="slider" class="carousel slide mb-3" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#slider" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#slider" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#slider" data-bs-slide-to="2"></button>
            </div>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../img/1.png" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="../img/2.png" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="../img/3.png" class="d-block w-100">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>
<script type="text/javascript " src="../bootstrap/js/jquery.js "></script>
<script type="text/javascript " src="../bootstrap/js/bootstrap.min.js "></script>
</body>

</html>