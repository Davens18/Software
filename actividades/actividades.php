<?php require_once '../includes/conexion.php'; ?>
<?php require_once '../includes/cabecera.php'; ?>
<?php require_once '../includes/funciones.php'; ?>
<?php require_once '../usuario_administrador/navegacion.php'; ?>
<?php require_once '../includes/sesion.php'; ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb ms-4 mt-2">
        <li class="breadcrumb-item"><a href="../usuario_administrador/usuario_administrador.php">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page">Actividades</li>
    </ol>
</nav>
<div class="container my-3 shadow">
    <div class="row">
        <div class="col shadow me-3">
            <form action="insertar_actividades.php" method="POST">
                <legend class="text-center">Registro Actividades</legend>
                <div>
                    <label for="item" class="form-label">Itém</label>
                    <input type="text" class="form-control" name="item_actividad" placeholder="Código">
                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'item_actividad') : ''; ?>
                </div>

                <div>
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea name="descripcion" class="form-control" placeholder="descripcion"></textarea>
                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'descripcion') : ''; ?>
                </div>

                <div>
                    <label for="actividad">Actividades detalle</label>

                    <?php
                    require_once '../includes/conexion.php';
                    $query = "select item_ad, descripcion_ad from actividad_detalle";
                    $resultado = mysqli_query($conexion, $query) or die("error en la consulta de programa");
                    echo "<select name='item_ad' class='form-select text-secondary mb-3' aria-label='.form-select-lg example'>";
                    echo  "<option selected value=0> --- Seleccione Actividad --- </option>";
                    while ($row = mysqli_fetch_array($resultado)) {
                        echo  "<option value=$row[0]> $row[1] </option>";
                    }
                    echo "</select>";
                    ?>
                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'item_ad') : ''; ?>
                </div>
                <input type="submit" class="btn btn-outline-dark ms-1 mb-2 mt-3" value="Registrar">
            </form>
            <?php borrarErrores(); ?>
        </div>
        <div class="col ms-3">
            <form action="consulta_actividades.php" method="POST" class="bg-dark mx-0 p-2 rounded-2 shadow">
                <legend class="text-center text-danger">Consulta Actividades</legend>
                <div class="row">
                    <div class="col-8">
                        <label for="item" class="text-light ms-1">Itém</label>
                        <input type="text" class="form-control m-1" name="item" placeholder="Ingrese itém de actividad">
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