<?php require_once '../includes/conexion.php'; ?>
<?php require_once '../includes/cabecera.php'; ?>
<?php require_once '../includes/funciones.php'; ?>
<?php require_once '../usuario_administrador/navegacion.php'; ?>
<?php require_once '../includes/sesion.php'; ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb ms-4 mt-2">
        <li class="breadcrumb-item"><a href="../usuario_administrador/usuario_administrador.php">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page">Empleados</li>
    </ol>
</nav>

<div class="container mt-3 shadow">
    <div class="row">
        <div class="col shadow me-3">
            <form action="insertar_empleados.php" method="POST">
                <legend class="text-center">Registro Empleados</legend>
                <div>
                    <label for="documento">Documento identidad </label>
                    <input type="text" class="form-control" name="documento_empleado" placeholder="Identificación usuario">
                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'documento_empleado') : ''; ?>
                </div>
                <div>
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre_empleado" placeholder="Nombres">
                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'nombre_empleado') : ''; ?>
                </div>
                <div>
                    <label for="telefono">Teléfono</label>
                    <input type="text" class="form-control" name="telefono_empleado" placeholder="Teléfono">
                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'telefono_empleado') : ''; ?>
                </div>
                <div>
                    <label for="direccion">Dirección</label>
                    <input type="text" class="form-control" name="direccion_empleado" placeholder="Dirección">
                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'direccion_empleado') : ''; ?>
                </div>
                <div>
                    <label for="correo">E-mail</label>
                    <input type="email" class="form-control" name="correo_empleado" placeholder="Correo electrónico">
                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'correo_empleado') : ''; ?>
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

                <input type="submit" class="btn btn-outline-dark ms-1 mb-2 mt-3" value="Registrar">
                </fieldset>
            </form>
            <?php borrarErrores(); ?>
        </div>

        <div class="col ms-3">
            <form action="consulta_empleados.php" class="bg-dark mx-0 p-2 rounded-2 shadow" method="POST">
                <legend class="text-center text-danger">Consulta Empleados</legend>
                <div class="row">
                    <div class="col-8">
                        <div>
                            <label for="documento_empleado" class=" text-light ms-1">Identificación</label>
                            <input type="text" class="form-control m-1" name="documento_empleado" placeholder="Ingrese identificación empleado">
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-outline-light ms-1 mb-2 mt-2" value="Consultar">
            </form>
        </div>
    </div>
    <?php require_once '../includes/footer.php'; ?>
    <script type="text/javascript " src="../bootstrap/js/jquery.js "></script>
    <script type="text/javascript " src="../bootstrap/js/bootstrap.min.js "></script>
    </body>

    </html>