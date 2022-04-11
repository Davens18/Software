<?php require_once '../includes/conexion.php'; ?>
<?php require_once '../includes/cabecera.php'; ?>
<?php require_once '../includes/funciones.php'; ?>
<?php require_once '../usuario_administrador/navegacion.php'; ?>
<?php require_once '../includes/sesion.php'; ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb ms-4 mt-2">
        <li class="breadcrumb-item"><a href="../usuario_administrador/usuario_administrador.php">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page">Clientes</li>
    </ol>
</nav>

<div class="container mt-3 shadow">
    <div class="row">
        <div class="col shadow me-3">
            <form action="insertar_clientes.php" method="POST">
                <legend class="text-center">Registro de clientes</legend>
                <div>
                    <label for="documento">Identificación</label>
                    <input type="text" class="form-control" name="documento_cliente" placeholder="Número de Identificación">
                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'documento_cliente') : ''; ?>
                </div>
                <div>
                    <label for="nombre">Nombres</label>
                    <input type="text" class="form-control" name="nombre_cliente" placeholder="Nombres y Apellidos">
                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'nombre_cliente') : ''; ?>
                </div>
                <div>
                    <label for="telefono">Teléfono</label>
                    <input type="text" class="form-control" name="telefono_cliente" placeholder="Teléfono">
                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'telefono_cliente') : ''; ?>
                </div>
                <div>
                    <label for="direccion">Dirección</label>
                    <input type="text" class="form-control" name="direccion_cliente" placeholder="Dirección Residencia">
                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'direccion_cliente') : ''; ?>
                </div>
                <div>
                    <label for="correo">Correo</label>
                    <input type="email" class="form-control" name="correo_cliente" placeholder="E-mail">
                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'correo_cliente') : ''; ?>
                </div>
                <div>
                    <label for="ciudad" class="ms-1">Ciudad</label>

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
                <div>
                    <label for="empresa">Empresa</label>
                    <input type="text" class="form-control" name="nombre_empresa" placeholder="Nombre Empresa">
                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'nombre_empresa') : ''; ?>
                </div>
                <input type="submit" class="btn btn-outline-dark ms-1 mb-2 mt-3" value="Registrar">
            </form>
            <?php borrarErrores(); ?>
        </div>
        <div class="col ms-3">
            <form action="consulta_clientes.php" class="bg-dark mx-0 p-2 rounded-2 shadow" method="POST">
                <legend class="text-center text-danger">Consulta de clientes</legend>
                <div class="row">
                    <div class="col-8">
                        <div>
                            <label for="documento_cliente" class="text-light ms-1">Identificación</label>
                            <input type="text" class="form-control m-1" name="documento_cliente" placeholder="Ingrese identificación cliente">
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