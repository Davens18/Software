<?php require_once '../includes/conexion.php'; ?>
<?php require_once '../includes/cabecera.php'; ?>
<?php require_once '../includes/funciones.php'; ?>
<?php require_once '../usuario_administrador/navegacion.php'; ?>
<?php require_once '../includes/sesion.php'; ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb ms-4 mt-2">
        <li class="breadcrumb-item"><a href="proveedor.php">Proveedores</a></li>
        <li class="breadcrumb-item"><a href="consulta_proveedor.php">Consulta</a></li>
        <li class="breadcrumb-item active" aria-current="page">Actualización</li>
    </ol>
</nav>
<?php

$id_p = $_GET['id'];
$sql = "SELECT * FROM proveedores WHERE id_p = '$id_p'";
$resultado = mysqli_query($conexion, $sql);

while ($columna = mysqli_fetch_array($resultado)) {

?>
    <div class="container p-2">
        <div class="row">
            <div class="col-6 mb-4 shadow p-3 bg-light">
                <form action="actualizar_proveedor.php" method="GET">
                    <legend class="text-center mb-3">Actualización Proveedores</legend>
                    <div>
                        <label for="documento">Documento identidad </label>
                        <input type="text" class="form-control" name="id_p" value="<?php echo $columna['id_p'] ?>" placeholder="Identificación">
                        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'documento_cliente') : ''; ?>
                    </div>
                    <div>
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre_p" value="<?php echo $columna['nombre_p'] ?>" placeholder="Nombres">
                        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'nombre_cliente') : ''; ?>
                    </div>
                    <div>
                        <label for="telefono">Teléfono</label>
                        <input type="text" class="form-control" name="telefono_p" value="<?php echo $columna['teléfono_p'] ?>" placeholder="Teléfono">
                        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'telefono_cliente') : ''; ?>
                    </div>
                    <div>
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" name="direccion_p" value="<?php echo $columna['dirección_p'] ?>" placeholder="Dirección">
                        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'direccion_cliente') : ''; ?>
                    </div>
                    <div>
                        <label for="correo">E-mail</label>
                        <input type="email" class="form-control" name="correo_p" value="<?php echo $columna['correo_p'] ?>" placeholder="Correo electrónico">
                        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'correo_cliente') : ''; ?>
                    </div>

                    <div>
                        <label for="ciudad" class="ms-1">Ciudad</label>

                        <?php
                        require_once '../includes/conexion.php';
                        $query = "select id_ciudad, nombre_ciudad from ciudad";
                        $resultado = mysqli_query($conexion, $query) or die("error en la consulta de programa");
                        echo "<select name='id_ciudad' class='form-control'>";
                        echo  "<option selected value=0> --- Seleccione Ciudad --- </option>";
                        while ($row = mysqli_fetch_array($resultado)) {
                            echo  "<option value=$row[0]> $row[1] </option>";
                        }
                        echo "</select>";
                        ?>
                        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'id_ciudad') : ''; ?>
                    </div>

                    <div>
                        <label for="empresa">Empresa</label>
                        <input type="text" class="form-control" name="empresa_p" value="<?php echo $columna['empresa_p'] ?>" placeholder="nombre empresa">
                        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'nombre_empresa') : ''; ?>
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