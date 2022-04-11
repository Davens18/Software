<?php require_once '../includes/conexion.php'; ?>
<?php require_once '../includes/cabecera.php'; ?>
<?php require_once '../includes/funciones.php'; ?>
<?php require_once '../usuario_administrador/navegacion.php'; ?>
<?php require_once '../includes/sesion.php'; ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb ms-4 mt-2">
        <li class="breadcrumb-item"><a href="actividades.php">Actividades</a></li>
        <li class="breadcrumb-item"><a href="consulta_actividades.php">Consulta</a></li>
        <li class="breadcrumb-item active" aria-current="page">Actualización</li>
    </ol>
</nav>

<?php
$item_a = $_GET['id'];
$sql = "SELECT * FROM actividades WHERE item_a = '$item_a'";
$resultado = mysqli_query($conexion, $sql);

while ($columna = mysqli_fetch_array($resultado)) {

?>
    <div class="container p-2">
        <div class="row">
            <div class="col-6 mb-4 shadow p-3 bg-light">
                <form action="actualizar_actividad.php" method="GET">
                    <legend class="text-center">Modificar actividad</legend>
                    <div>
                        <label for="item" class="form-label">Itém</label>
                        <input type="hidden" class="form-control" name="item_actividad" value="<?php echo $columna['item_a'] ?>" placeholder="Código">
                        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'item_actividad') : ''; ?>
                    </div>

                    <div>
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input type="text" class="form-control" name="descripcion" value="<?php echo $columna['descripcion_a'] ?>" placeholder="descripcion"></textarea>
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