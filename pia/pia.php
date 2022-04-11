<?php require_once '../includes/conexion.php'; ?>
<?php require_once '../includes/cabecera.php'; ?>
<?php require_once '../includes/funciones.php'; ?>
<?php require_once '../usuario_administrador/navegacion.php'; ?>
<?php require_once '../includes/sesion.php'; ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb ms-4 mt-2">
        <li class="breadcrumb-item"><a href="../usuario_administrador/usuario_administrador.php">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page">APU</li>
    </ol>
</nav>
<div class="container mt-3 shadow">
    <div class="row">
        <div class="col shadow me-3">
            <form action="insertar_pia.php" method="POST">
                <legend>Gestión Actividades</legend>
                <div>
                    <label for="id-p">Seleccione Presupuesto</label>
                    <?php
                    require_once '../includes/conexion.php';
                    $query = "select id_p, nombre_proyecto_p from presupuestos";
                    $resultado = mysqli_query($conexion, $query) or die("error en la consulta de programa");
                    echo "<select name='id_p' class='form-select text-secondary mb-3' aria-label='.form-select-lg example'>";
                    echo  "<option selected value=0> ---Seleccione Presupuesto --- </option>";
                    while ($row = mysqli_fetch_array($resultado)) {
                        echo  "<option value=$row[0]> $row[1] </option>";
                    }
                    echo "</select>";
                    ?>
                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'id_p') : ''; ?>
                </div>
                <div>
                    <label for="id_ia">Seleccione Itém de actividad</label>
                    <?php
                    require_once '../includes/conexion.php';
                    $query = "select item_a from actividades";
                    $resultado = mysqli_query($conexion, $query) or die("error en la consulta de programa");
                    echo "<select name='id_ia' class='form-select text-secondary mb-3' aria-label='.form-select-lg example'>";
                    echo  "<option selected value=0> ---Seleccione Actividad --- </option>";
                    while ($row = mysqli_fetch_array($resultado)) {
                        echo  "<option value=$row[0]> $row[0] </option>";
                    }
                    echo "</select>";
                    ?>
                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'item_a') : ''; ?>
                </div>
                <div>
                    <label for="unidad_a">Unidad</label>
                    <input type="text" class="form-control" name="unidad_a" placeholder="Unidad">
                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'unidad_a') : ''; ?>
                </div>
                <div>
                    <label for="cantidad_bloque_1_a">Cantidad Bloque 1</label>
                    <input type="text" class="form-control" name="cantidad_bloque_1_a" placeholder="Cantidad">
                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'cantidad_bloque_1_a') : ''; ?>
                </div>
                <div>
                    <label for="cantidad_bloque_2_a">Cantidad Bloque 2</label>
                    <input type="text" class="form-control" name="cantidad_bloque_2_a" placeholder="Cantidad">
                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'cantidad_bloque_2_a') : ''; ?>
                </div>
                <div>
                    <label for="cantidad_bloque_3_a">Cantidad Bloque 3</label>
                    <input type="text" class="form-control" name="cantidad_bloque_3_a" placeholder="Cantidad">
                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'cantidad_bloque_3_a') : ''; ?>
                </div>
                <div>
                    <label for="valor_uni_transporte_a">Valor transporte</label>
                    <input type="text" class="form-control" name="valor_uni_transporte_a" placeholder="Valor transporte">
                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'valor_uni_transporte_a') : ''; ?>
                </div>
                <input type="submit" class="btn btn-outline-dark ms-1 mb-2 mt-3" value="Registrar">
            </form>
            <?php borrarErrores(); ?>
        </div>
        <div class="col ms-3">
            <form action="consulta_pia.php" method="POST" class="bg-dark mx-0 p-2 rounded-2 shadow">
                <legend class="text-center text-danger">Ingrese Itém Presupuesto</legend>
                <div class="row">
                    <div class="col-8">
                        <label for="item" class="text-light ms-1">Itém</label>
                        <input type="text" class="form-control m-1" name="item_a" placeholder="Ingrese itém del presupuesto">
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