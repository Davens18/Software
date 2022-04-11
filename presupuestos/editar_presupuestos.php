<?php require_once '../includes/conexion.php'; ?>
<?php require_once '../includes/cabecera.php'; ?>
<?php require_once '../includes/funciones.php'; ?>
<?php require_once '../usuario_administrador/navegacion.php'; ?>
<?php require_once '../includes/sesion.php'; ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb ms-4 mt-2">
        <li class="breadcrumb-item"><a href="presupuestos.php">Presupuestos</a></li>
        <li class="breadcrumb-item"><a href="consultar_presupuestos.php">Consulta</a></li>
        <li class="breadcrumb-item active" aria-current="page">Actualización</li>
    </ol>
</nav>

<?php

$id_p = $_GET['id'];
$sql = "SELECT * FROM presupuestos WHERE id_p = '$id_p'";
$resultado = mysqli_query($conexion, $sql);

while ($columna = mysqli_fetch_array($resultado)) {

?>
    <div class="container p-2">
        <div class="row">
            <div class="col-6 mb-4 shadow p-3 bg-light">
                <form action="actualizar_presupuestos.php" method="GET">
                    <legend class="text-center mb-3">Actualizar datos</legend>
                    <div>
                        <input type="hidden" name="id_p" value="<?php echo $columna['id_p'] ?>">
                        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'documento_cliente') : ''; ?>
                    </div>
                    <div>
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre_proyecto_p" value="<?php echo $columna['nombre_proyecto_p'] ?>" placeholder="Nombres">
                        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'nombre_cliente') : ''; ?>
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