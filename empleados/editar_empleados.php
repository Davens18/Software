<?php require_once '../includes/conexion.php'; ?>
<?php require_once '../includes/cabecera.php'; ?>
<?php require_once '../includes/funciones.php'; ?>
<?php require_once '../usuario_administrador/navegacion.php'; ?>
<?php require_once '../includes/sesion.php'; ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb ms-4 mt-2">
        <li class="breadcrumb-item"><a href="empleados.php">Empleados</a></li>
        <li class="breadcrumb-item"><a href="consulta_empleados.php">Consulta</a></li>
        <li class="breadcrumb-item active" aria-current="page">Actualización</li>
    </ol>
</nav>
<?php

$id_e = $_GET['id'];
$sql = "SELECT * FROM empleados WHERE documento_e = '$id_e'";
$resultado = mysqli_query($conexion, $sql);

while ($columna = mysqli_fetch_array($resultado)) {

?>
    <div class="container p-2">
        <div class="row">
            <div class="col-6 mb-4 shadow p-3 bg-light">
                <form action="actualizar_empleados.php" method="GET">
                    <legend>Actualizar datos</legend>
                    <div>
                        <label for="documento">Documento identidad </label>
                        <input type="text" class="form-control" name="documento_e" value="<?php echo $columna['documento_e'] ?>" placeholder="Identificación">
                        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'documento_cliente') : ''; ?>
                    </div>
                    <div>
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre_eo" value="<?php echo $columna['nombre_eo'] ?>" placeholder="Nombres">
                        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'nombre_cliente') : ''; ?>
                    </div>
                    <div>
                        <label for="telefono">Teléfono</label>
                        <input type="text" class="form-control" name="telefono_e" value="<?php echo $columna['telefono_e'] ?>" placeholder="Teléfono">
                        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'telefono_cliente') : ''; ?>
                    </div>
                    <div>
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" name="direccion_e" value="<?php echo $columna['direccion_e'] ?>" placeholder="Dirección">
                        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'direccion_cliente') : ''; ?>
                    </div>
                    <div>
                        <label for="correo">E-mail</label>
                        <input type="email" class="form-control" name="correo_e" value="<?php echo $columna['correo_e'] ?>" placeholder="Correo electrónico">
                        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'correo_cliente') : ''; ?>
                    </div>

                    <div>
                    <label for="eps">Eps</label>

                    <?php
                    require_once '../includes/conexion.php';
                    $query = "select id_eps, nombre_eps from eps";
                    $resultado = mysqli_query($conexion, $query) or die("error en la consulta de programa");
                    echo "<select name='id_eps' class='form-control'>";
                    echo  "<option selected value=0> --- Seleccione EPS --- </option>";
                    while ($row = mysqli_fetch_array($resultado)) {
                        echo  "<option value=$row[0]> $row[1] </option>";
                    }
                    echo "</select>";
                    ?>
                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'id_eps') : ''; ?>
                </div>

                    <div>
                    <label for="arl">ARL</label>

                    <?php
                    require_once '../includes/conexion.php';
                    $query = "select id_arl, nombre_arl from arl";
                    $resultado = mysqli_query($conexion, $query) or die("error en la consulta de programa");
                    echo "<select name='id_arl' class='form-control'>";
                    echo  "<option selected value=0> --- Seleccione ARL --- </option>";
                    while ($row = mysqli_fetch_array($resultado)) {
                        echo  "<option value=$row[0]> $row[1] </option>";
                    }
                    echo "</select>";
                    ?>
                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'id_arl') : ''; ?>
                </div>

                    <div>
                    <label for="ciudad">Ciudad</label>

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
                        <label for="cargo">Cargo</label>

                        <?php
                        require_once '../includes/conexion.php';
                        $query = "select id_cargo, nombre_cargo from cargo";
                        $resultado = mysqli_query($conexion, $query) or die("error en la consulta de programa");
                        echo "<select name='id_cargo' class='form-control'>";
                        echo  "<option selected value=0> --- Seleccione Cargo --- </option>";
                        while ($row = mysqli_fetch_array($resultado)) {
                            echo  "<option value=$row[0]> $row[1] </option>";
                        }
                        echo "</select>";
                        ?>
                        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'id_cargo') : ''; ?>
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