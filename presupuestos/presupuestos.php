<?php require_once '../includes/conexion.php'; ?>
<?php require_once '../includes/cabecera.php'; ?>
<?php require_once '../includes/funciones.php'; ?>
<?php require_once '../usuario_administrador/navegacion.php'; ?>
<?php require_once '../includes/sesion.php'; ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb ms-4 mt-2">
        <li class="breadcrumb-item"><a href="../usuario_administrador/usuario_administrador.php">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page">Presupuestos</li>
    </ol>
</nav>

<div class="container mt-3 shadow">
    <div class="row">
        <div class="col shadow me-3">
            <form action="insertar_presupuestos.php" method="POST">
                <legend class="text-center">Ingrese Presupuesto</legend>
                <div class="mb-3">
                    <label for="presupuesto" class="form-label">Nombre Presupuesto</label>
                    <input type="text" class="form-control" name="nombre_presupuesto" placeholder="Nombre presupuesto">
                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'nombre_presupuesto') : ''; ?>
                </div>
                <div>
                    <label for="ciudad">Ciudad</label>

                    <?php
                    require_once '../includes/conexion.php';
                    $query = "select id_ciudad, nombre_ciudad from ciudad";
                    $resultado = mysqli_query($conexion, $query) or die("error en la consulta de programa");
                    echo "<select name='id_ciudad' class='form-select text-secondary mb-3' aria-label='.form-select-lg example'>";
                    echo  "<option selected value=0> --- Seleccione Ciudad --- </option>";
                    while ($row = mysqli_fetch_array($resultado)) {
                        echo  "<option value=$row[0]> $row[1] </option>";
                    }
                    echo "</select>";
                    ?>
                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'id_ciudad') : ''; ?>
                </div>
                <input type="submit" class="btn btn-outline-dark ms-1 mb-2 mt-3" value="Registrar">
            </form>
            <?php borrarErrores(); ?>
        </div>
        <div class="col ms-3">
            <form action="consultar_presupuestos.php" method="POST" class="bg-dark mx-0 p-2 rounded-2 shadow">
                <legend class="text-center text-danger">Consulta de presupuestos</legend>
                <div class="row">
                    <div class="col-8">
                        <label for="proyecto">Código</label>
                        <input type="text" class="form-control m-1" name="proyecto" placeholder="Ingrese id del proyecto">
                    </div>
                </div>
                <input type="submit" class="btn btn-outline-light ms-1 mb-2 mt-2" value="Consultar">
            </form>
        </div>
    </div>
</div>
<?php require_once '../includes/footer.php'; ?>
<script type="text/javascript " src="../bootstrap/js/jquery.js "></script>
<script type="text/javascript " src="../bootstrap/js/bootstrap.min.js "></script>
</body>
</html>