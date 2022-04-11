<?php require_once '../includes/conexion.php'; ?>
<?php require_once '../includes/cabecera.php'; ?>
<?php require_once '../includes/funciones.php'; ?>
<?php require_once '../usuario_administrador/navegacion.php'; ?>
<?php require_once '../includes/sesion.php'; ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb ms-4 mt-2">
        <li class="breadcrumb-item"><a href="clientes.php">Clientes</a></li>
        <li class="breadcrumb-item"><a href="consulta_clientes.php">Consulta</a></li>
        <li class="breadcrumb-item active" aria-current="page">Actualización</li>
    </ol>
</nav>

<?php
$insumos = $_GET['id'];
$sql = "SELECT * FROM insumos WHERE item_i = '$insumos'";
$resultado = mysqli_query($conexion, $sql);

while ($columna = mysqli_fetch_array($resultado)) {

?>
    <div class="container p-2">
        <div class="row">
            <div class="col-6 mb-4 shadow p-3 bg-light">
                <form action="actualizar_insumos.php" method="GET">
                    <legend class="text-center mb-3">Actualización Insumo código - <?php echo ($insumos); ?></legend>
                    <div>
                        <input type="hidden" name="item_i" value="<?php echo $columna['item_i'] ?>" placeholder="Código">
                        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'item_insumo') : ''; ?>
                    </div>
                    <div>
                        <label for="descripcion">Descripción</label>
                        <input type='text' class="form-control" name="descripcion_i" value="<?php echo $columna['descripcion_i'] ?>" placeholder="descripcion"></textarea>
                        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'descripcion') : ''; ?>
                    </div>
                    <div>
                        <label for="unidad">Unidad</label>
                        <input type="text" class="form-control" name="unidad_i" value="<?php echo $columna['unidad_i'] ?>" placeholder="unidad">
                        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'unidad') : ''; ?>
                    </div>
                    <div>
                        <label for="precio">Precio unidad</label>
                        <input type="text" class="form-control" name="precio_unidad_i" value="<?php echo $columna['precio_unidad_i'] ?>" placeholder="precio">
                        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'precio_unidad') : ''; ?>
                    </div>
                    <div>
                        <label for="peso">Peso</label>
                        <input type="text" class="form-control" name="peso_i" value="<?php echo $columna['peso_i'] ?>" placeholder="peso">
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