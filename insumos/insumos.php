<?php require_once '../includes/conexion.php'; ?>
<?php require_once '../includes/cabecera.php'; ?>
<?php require_once '../includes/funciones.php'; ?>
<?php require_once '../usuario_administrador/navegacion.php'; ?>
<?php require_once '../includes/sesion.php'; ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb ms-4 mt-2">
        <li class="breadcrumb-item"><a href="../usuario_administrador/usuario_administrador.php">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page">Insumos</li>
    </ol>
</nav>

<div class="container mt-3 shadow">
    <div class="row">
        <div class="col shadow me-3">
            <form action="insertar_insumos.php" method="POST">
                <legend class="text-center">Registro Insumos</legend>
                <div>
                    <label for="item" class="form-label">Itém</label>
                    <input type="text" class="form-control" name="item_insumo" placeholder="Código">
                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'item_insumo') : ''; ?>
                </div>
                <div>
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea name="descripcion" class="form-control" placeholder="Descripción"></textarea>
                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'escripcion') : ''; ?>
                </div>
                <div>
                    <label for="unidad" class="form-label">Unidad</label>
                    <input type="text" class="form-control" name="unidad" placeholder="Unidad">
                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'unidad') : ''; ?>
                </div>
                <div>
                    <label for="precio" class="form-label">Precio unidad</label>
                    <input type="text" class="form-control" name="precio_unidad" placeholder="Precio">
                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'precio_unidad') : ''; ?>
                </div>
                <div>
                    <label for="peso" class="form-label">Peso</label>
                    <input type="text" class="form-control" name="peso" placeholder="Peso">
                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'peso') : ''; ?>
                </div>
                <div class="mb-3">
                    <label for="rubro" class="form-label">Rubro</label>

                    <?php
                    require_once '../includes/conexion.php';
                    $query = "select id_rubro, nombre_rubro from rubros";
                    $resultado = mysqli_query($conexion, $query) or die("error en la consulta de programa");
                    echo "<select name='id_rubro' class='form-select text-secondary mb-3' aria-label='.form-select-lg example'>";
                    echo  "<option selected value=0> ---Seleccione Rubro --- </option>";
                    while ($row = mysqli_fetch_array($resultado)) {
                        echo  "<option value=$row[0]> $row[1] </option>";
                    }
                    echo "</select>";
                    ?>
                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'id_rubro') : ''; ?>
                </div>
                <input type="submit" class="btn btn-outline-dark ms-1 mb-2 mt-3" value="Registrar">
            </form>
            <?php borrarErrores(); ?>
        </div>
        <div class="col ms-3">
            <form action="consulta_insumos.php" method="POST" class="bg-dark mx-0 p-2 rounded-2 shadow">
                <legend class="text-center text-danger">Consulta Insumos</legend>
                <div class="row">
                    <div class="col-8">
                        <label for="item" class="text-light ms-1">Código Ítem</label>
                        <input type="text" class="form-control m-1" name="item" placeholder="Ingrese itém de insumo">
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