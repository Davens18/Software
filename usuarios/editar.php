<?php require_once '../includes/conexion.php'; ?>
<?php require_once '../includes/cabecera.php'; ?>
<?php require_once '../includes/funciones.php'; ?>
<?php require_once '../usuario_administrador/navegacion.php'; ?>
<?php require_once '../includes/sesion.php'; ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb ms-4 mt-2">
        <li class="breadcrumb-item"><a href="usuario.php">Usuarios</a></li>
        <li class="breadcrumb-item"><a href="consulta.php">Consulta</a></li>
        <li class="breadcrumb-item active" aria-current="page">Actualización</li>
    </ol>
</nav>


<?php
$item_a = $_GET['id'];
$sql = "SELECT * FROM usuarios WHERE documento_u = '$item_a'";
$resultado = mysqli_query($conexion, $sql);

while ($columna = mysqli_fetch_array($resultado)) {

?>
    <div class="container p-2">
        <div class="row">
            <div class="col-6 mb-4 shadow p-3 bg-light">
                <form action="actualizar.php" method="GET">
                    <legend class="text-center mb-3">Actualización Usuarios</legend>
                    <div>
                        <input type="hidden" name="id_usuario" value="<?php echo $columna['id_u'] ?>" placeholder="Identificación usuario">
                        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'documento_usuario') : ''; ?>
                    </div>

                    <div class="mb-3">
                        <label for="documento" class="form-label">Documento identidad </label>
                        <input type="text" class="form-control" name="documento_usuario" value="<?php echo $columna['documento_u'] ?>">
                        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'documento_usuario') : ''; ?>
                    </div>

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre_usuario" value="<?php echo $columna['nombre_usuario'] ?>">
                        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'nombre_usuario') : ''; ?>
                    </div>

                    <div class="mb-3">
                        <label for="rol">Rol</label>

                        <?php
                        require_once '../includes/conexion.php';
                        $query = "select id_rol, nombre_rol from rol";
                        $resultado = mysqli_query($conexion, $query) or die("error en la consulta de programa");

                        echo "<select name='id_rol' class='form-select text-secondary mb-3' id='rol' required>";
                        echo  "<option selected value=0 > --Seleccione rol-- </option>";
                        while ($row = mysqli_fetch_array($resultado)) {
                            echo  "<option value=$row[0]> $row[1] </option>";
                        }
                        echo "</select>";
                        ?>
                        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'id_rol') : ''; ?>
                    </div>

                    <div class="mb-3">
                        <label for="pass" class="form-label">Constraseña</label>
                        <input type="password" class="form-control" name="clave" value="<?php echo $columna['clave'] ?>">
                        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'clave') : ''; ?>
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