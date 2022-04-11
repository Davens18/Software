<?php require_once '../includes/conexion.php'; ?>
<?php require_once '../includes/cabecera.php'; ?>
<?php require_once '../includes/funciones.php'; ?>
<?php require_once '../usuario_administrador/navegacion.php'; ?>
<?php require_once '../includes/sesion.php'; ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb ms-4 mt-2">
        <li class="breadcrumb-item"><a href="insumos_actividades.php">APU</a></li>
        <li class="breadcrumb-item"><a href="consulta_insumos_actividades.php">Consulta</a></li>
        <li class="breadcrumb-item active" aria-current="page">Actualización</li>
    </ol>
</nav>

<?php
$insumos = $_GET['id'];
$sql = "SELECT * FROM insumos_actividades WHERE id_ia = '$insumos'";
$resultado = mysqli_query($conexion, $sql);

while ($columna = mysqli_fetch_array($resultado)) {

?>
    <div class="container p-2">
        <div class="row">
            <div class="col-6 mb-4 shadow p-3 bg-light">
                <form action="actualizar_insumos_actividades.php" method="GET">
                    <legend class="text-center mb-3">Actualización insumos y actividad</legend>
                    <div>
                        <label for="item_a" class="form-label">Seleccione Itém de actividad</label>
                        <?php
                        require_once '../includes/conexion.php';
                        $query = "select item_a, descripcion_a from actividades";
                        $resultado = mysqli_query($conexion, $query) or die("error en la consulta de programa");
                        echo "<select name='item_a' class='form-select text-secondary mb-3' aria-label='.form-select-lg example'>";
                        echo  "<option selected value=0> --- Seleccione Actividad --- </option>";
                        while ($row = mysqli_fetch_array($resultado)) {
                            echo  "<option value=$row[0]> $row[0] </option>";
                        }
                        echo "</select>";
                        ?>
                        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'item_a') : ''; ?>
                    </div>
                    <div>
                        <label for="item_i" class="form-label">Seleccione insumo de actividad</label>
                        <?php
                        require_once '../includes/conexion.php';
                        $query = "select item_i, descripcion_i from insumos";
                        $resultado = mysqli_query($conexion, $query) or die("error en la consulta de programa");
                        echo "<select name='item_i' class='form-select text-secondary mb-3' aria-label='.form-select-lg example'>";
                        echo  "<option selected value=0> --- Seleccione Insumo--- </option>";
                        while ($row = mysqli_fetch_array($resultado)) {
                            echo  "<option value=$row[0]> $row[0] </option>";
                        }
                        echo "</select>";
                        ?>
                        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'item_i') : ''; ?>
                    </div>

                    <div>
                        <label for="cantidad">Cantidad</label>
                        <input type="text" class="form-control" name="cantidad_ia" value="<?php echo $columna['cantidad_ia'] ?>" placeholder="Cantidad">
                        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'cantidad') : ''; ?>
                    </div>
                    <div>
                        <input type="hidden" name="id_ia" value="<?php echo $columna['id_ia'] ?>" placeholder="Cantidad">
                        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'id_ia') : ''; ?>
                    </div>

                    <input type="submit" class="btn btn-outline-dark mt-3" value="Actualizar">
                </form>
            </div>
        </div>
        <?php borrarErrores(); ?>
    </div>
<?php } ?>
<?php require_once '../includes/footer.php'; ?>
<script type="text/javascript " src="../bootstrap/js/jquery.js "></script>
<script type="text/javascript " src="../bootstrap/js/bootstrap.min.js "></script>