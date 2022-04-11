<?php require_once '../includes/conexion.php'; ?>
<?php require_once '../includes/cabecera.php'; ?>
<?php require_once '../includes/funciones.php'; ?>
<?php require_once '../usuario_administrador/navegacion.php'; ?>
<?php require_once '../includes/sesion.php'; ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb ms-4 mt-2">
        <li class="breadcrumb-item"><a href="../usuario_administrador/usuario_administrador.php">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
    </ol>
</nav>

<div class="container mt-3 shadow">
    <div class="row">
        <div class="col shadow me-3">
            <form action="insertar.php" method="POST">
                <legend class="text-center">Registro de Usuario</legend>
                <div class="mb-3">
                    <label for="documento" class="form-label">Documento identidad </label>
                    <input type="text" class="form-control" name="documento_usuario" placeholder="Identificación usuario">
                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'documento_usuario') : ''; ?>
                </div>

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre_usuario" placeholder="Nombres">
                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'nombre_usuario') : ''; ?>
                </div>

                <div class="mb-3">
                    <label for="rol">Rol</label>

                    <?php
                    require_once '../includes/conexion.php';
                    $query = "select id_rol, nombre_rol from rol";
                    $resultado = mysqli_query($conexion, $query) or die("error en la consulta de programa");

                    echo "<select name='id_rol' class='form-select text-secondary mb-3' aria-label='.form-select-lg example'>";
                    echo  "<option selected value=0 > ---Seleccione rol --- </option>";
                    while ($row = mysqli_fetch_array($resultado)) {
                        echo  "<option value=$row[0]> $row[1] </option>";
                    }
                    echo "</select>";
                    ?>
                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'id_rol') : ''; ?>
                </div>

                <div class="mb-3">
                    <label for="pass" class="form-label">Constraseña</label>
                    <input type="password" class="form-control" name="clave" placeholder="Constraseña">
                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'clave') : ''; ?>
                </div>
                <input type="submit" class="btn btn-outline-dark ms-1 mb-2 mt-3" value="Registrar">
            </form>
            <?php borrarErrores(); ?>
        </div>
        <div class="col ms-3">
            <form action="consulta.php" method="POST" class="bg-dark mx-0 p-2 rounded-2 shadow">
                <legend class="text-center text-danger">Consulta de Usuarios</legend>
                <div class="row">
                    <div class="col-8">
                        <label for="documento_usuario" class=" text-light ms-1">Identificación</label>
                        <input type="text" class="form-control m-1" name="documento_usuario" placeholder="Ingrese identificación usuario">
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