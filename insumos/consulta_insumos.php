<?php require_once '../includes/conexion.php'; ?>
<?php require_once '../includes/cabecera.php'; ?>
<?php require_once '../includes/funciones.php'; ?>
<?php require_once '../usuario_administrador/navegacion.php'; ?>
<?php require_once '../includes/sesion.php'; ?>

<?php
error_reporting(0);
$vacia = " ";
$insumo = $_POST['insumo'];
$rubro = $_POST['rubro'];
$item = $_POST['item'];
$limite = $_POST['registro'];
if (isset($_POST['buscar'])) {
    if (empty($_POST['rubro']) && empty($_POST['item'])) {
        $vacia = "where descripcion_i like '" . $insumo . "%'";
    } elseif (empty($_POST['insumo']) && empty($_POST['item'])) {
        $vacia = "where rubro_i ='" . $rubro . "'";
    } elseif (empty($_POST['rubro']) && empty($_POST['insumo'])) {
        $vacia = "where item_i ='" . $item . "'";
    } else {
        $vacia = "where descripcion_i like '" . $insumo . "%' and rubro_i = '" . $rubro . "' and item_i = '" . $item . "'";
    }
}
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb ms-4 mt-2">
        <li class="breadcrumb-item"><a href="../usuario_administrador/usuario_administrador.php">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page">Insumos</li>
    </ol>
</nav>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="col">
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Nuevo Insumo</button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Nuevo Insumo</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="insertar_insumos.php" method="POST">
                                    <div>
                                        <label for="item" class="form-label">Itém</label>
                                        <input type="text" class="form-control" name="item_insumo" placeholder="Código">
                                        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'item_insumo') : ''; ?>
                                    </div>
                                    <div>
                                        <label for="descripcion" class="form-label">Descripción</label>
                                        <textarea name="descripcion" class="form-control" placeholder="Descripción"></textarea>
                                        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'escripcion') : ''; ?>
                                    </div>
                                    <div>
                                        <label for="unidad" class="form-label">Unidad</label>
                                        <input type="text" class="form-control" name="unidad" placeholder="Unidad">
                                        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'unidad') : ''; ?>
                                    </div>
                                    <div>
                                        <label for="precio" class="form-label">Precio unidad</label>
                                        <input type="text" class="form-control" name="precio_unidad" placeholder="Precio">
                                        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'precio_unidad') : ''; ?>
                                    </div>
                                    <div>
                                        <label for="peso" class="form-label">Peso</label>
                                        <input type="text" class="form-control" name="peso" placeholder="Peso">
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
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <input type="submit" class="btn btn-primary" value="Registrar">
                                    </div>
                                </form>
                                <?php borrarErrores(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <form action="#" method="POST">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Ítem" name="item">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Descripción" name="insumo">
                    </div>
                    <div class="col">
                        <?php
                        require_once '../includes/conexion.php';
                        $query = "select id_rubro, nombre_rubro from rubros";
                        $resultado = mysqli_query($conexion, $query) or die("error en la consulta de programa");
                        echo "<select name='rubro' class='form-select text-secondary' aria-label='.form-select-lg example'>";
                        echo  "<option selected value=0> Rubro </option>";
                        while ($row = mysqli_fetch_array($resultado)) {
                            echo  "<option value=$row[0]> $row[1] </option>";
                        }
                        echo "</select>";
                        ?>
                    </div>
                    <div class="col">
                        <select name="registro" class='form-select text-secondary'>
                            <option value=""># de Registros</option>
                            <option value="limit 10">10</option>
                            <option value="limit 25">25</option>
                            <option value="limit 50">50</option>
                            <option value="limit 100">100</option>
                        </select>
                    </div>
                    <div class="col">
                        <button name="buscar" class="btn btn-outline-primary" type="submit">Filtrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container">
    <h4 class="text-center text-dark p-1 m-2 bg-light">Insumos</h4>
</div>
<?php
if (!empty($_POST['item'])) {
    $item_i = $_POST['item'];
    $consulta = "SELECT * FROM insumos i 
                INNER JOIN rubros r ON i.rubro_i = r.id_rubro
                WHERE item_i = ('$item_i') ";
    $resultado = mysqli_query($conexion, $consulta) or die('Error en la consulta de los usuarios' . $basedatos);

    echo "<div class='container my-3'>";
    echo "<div class='text-white text-center'>";
    echo "<table class = 'table table-striped table-hover table-bordered shadow'>";
    echo "<tr>";
    echo "<th>Itém</th>";
    echo "<th>Descripción </th>";
    echo "<th>Unidad</th>";
    echo "<th>Precio Unidad</th>";
    echo "<th>Peso</th>";
    echo "<th>Rubro</th>";
    echo "<th>Editar</th>";
    echo "<th>Eliminar</th>";
    echo "</tr>";
?>

    <?php while ($columna = mysqli_fetch_array($resultado)) {
    ?>
        <tr>
            <td style='color: red'><?php echo $columna['item_i'] ?> </td>
            <td style='color: black'><?php echo $columna['descripcion_i'] ?> </td>
            <td style='color: black'><?php echo $columna['unidad_i'] ?> </td>
            <td style='color: black'><?php echo $columna['precio_unidad_i'] ?> </td>
            <td style='color: black'><?php echo $columna['peso_i'] ?> </td>
            <td style='color: black'><?php echo $columna['nombre_rubro'] ?> </td>
            <td>
                <a class="fas fa-pencil-alt shadow" style="font-size:20px; color:black" href="exampleModal1<?php echo $columna['item_i']; ?>" data-bs-toggle="modal" data-bs-target="#exampleModal1<?php echo $columna['item_i']; ?>" data-bs-whatever="@getbootstrap"> </a>
                <div class="modal fade" id="exampleModal1<?php echo $columna['item_i']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Actualizar Insumo-<?php echo $columna['item_i'] ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="actualizar_insumos.php" method="POST">
                                    <div>
                                        <input type="hidden" name="item_i" value="<?php echo $columna['item_i'] ?>" placeholder="Código">
                                        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'item_insumo') : ''; ?>
                                    </div>
                                    <div>
                                        <label for="descripcion" class="form-label">Descripción</label>
                                        <input type='text' class="form-control" name="descripcion_i" value="<?php echo $columna['descripcion_i'] ?>" placeholder="descripcion">
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
                                        $final = mysqli_query($conexion, $query) or die("error en la consulta de programa");
                                        echo "<select name='id_rubro' class='form-select text-secondary mb-3' aria-label='.form-select-lg example'>";
                                        echo  "<option selected value=0> ---Seleccione Rubro --- </option>";
                                        while ($row = mysqli_fetch_array($final)) {
                                            echo  "<option value=$row[0]> $row[1] </option>";
                                        }
                                        echo "</select>";
                                        ?>
                                        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'id_rubro') : ''; ?>
                                    </div>
                                    <input type="submit" class="btn btn-outline-dark mt-3" value="Actualizar">
                                </form>
                                <?php borrarErrores(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
            <td>
                <a class="fas fa-trash-alt shadow" style="font-size:20px; color:crimson" href="eliminar_insumos.php?id=<?php echo $columna['item_i'] ?>"> </a>
            </td>
        </tr>
    <?php } ?>
    </table>
<?php
} else {
    $consulta = "SELECT * FROM insumos i
                INNER JOIN rubros r ON (i.rubro_i=r.id_rubro)
                $vacia $limite";
    $resultado = mysqli_query($conexion, $consulta) or die('Error en la consulta de los usuarios' . $basedatos);

    echo "<div class='container my-3'>";
    echo "<div class='text-white text-center'>";
    echo "<table class = 'table table-striped table-hover table-bordered shadow'>";
    echo "<tr>";
    echo "<th>Itém</th>";
    echo "<th>Descripción </th>";
    echo "<th>Unidad</th>";
    echo "<th>Precio Unidad</th>";
    echo "<th>Peso</th>";
    echo "<th>Rubro</th>";
    echo "<th>Editar</th>";
    echo "<th>Eliminar</th>";
    echo "</tr>";
}
?>

<?php while ($columna = mysqli_fetch_array($resultado)) {
?>
    <tr>
        <td style='color: red'><?php echo $columna['item_i'] ?> </td>
        <td style='color: black'><?php echo $columna['descripcion_i'] ?> </td>
        <td style='color: black'><?php echo $columna['unidad_i'] ?> </td>
        <td style='color: black'><?php echo $columna['precio_unidad_i'] ?> </td>
        <td style='color: black'><?php echo $columna['peso_i'] ?> </td>
        <td style='color: black'><?php echo $columna['nombre_rubro'] ?> </td>
        <td>
            <a class="fas fa-pencil-alt shadow" style="font-size:20px; color:black" href="exampleModal1<?php echo $columna['item_i']; ?>" data-bs-toggle="modal" data-bs-target="#exampleModal1<?php echo $columna['item_i']; ?>" data-bs-whatever="@getbootstrap"> </a>
            <div class="modal fade" id="exampleModal1<?php echo $columna['item_i']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">Actualizar Insumo-<?php echo $columna['item_i'] ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="actualizar_insumos.php" method="POST">
                                <div>
                                    <input type="hidden" name="item_i" value="<?php echo $columna['item_i'] ?>" placeholder="Código">
                                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'item_insumo') : ''; ?>
                                </div>
                                <div>
                                    <label for="descripcion" class="form-label">Descripción</label>
                                    <input type='text' class="form-control" name="descripcion_i" value="<?php echo $columna['descripcion_i'] ?>" placeholder="descripcion">
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
                                    $final = mysqli_query($conexion, $query) or die("error en la consulta de programa");
                                    echo "<select name='id_rubro' class='form-select text-secondary mb-3' aria-label='.form-select-lg example'>";
                                    echo  "<option selected value=0> ---Seleccione Rubro --- </option>";
                                    while ($row = mysqli_fetch_array($final)) {
                                        echo  "<option value=$row[0]> $row[1] </option>";
                                    }
                                    echo "</select>";
                                    ?>
                                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'id_rubro') : ''; ?>
                                </div>
                                <input type="submit" class="btn btn-outline-dark mt-3" value="Actualizar">
                            </form>
                            <?php borrarErrores(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </td>
        <td>
            <a class="fas fa-trash-alt shadow" style="font-size:20px; color:crimson" href="eliminar_insumos.php?id=<?php echo $columna['item_i'] ?>"> </a>
        </td>
    </tr>
<?php } ?>
</table>
</div>
</div>
<?php
if ($columna = mysqli_num_rows($resultado) == 0) {
    echo "<div class='container bg-danger p-0'>";
    echo "<h5 class='text-dark text-center'>No hay resultados en los criterios de búsqueda...</h5>";
    echo "</div>";
}
?>
<?php require_once '../includes/footer.php'; ?>
<script type="text/javascript " src="../bootstrap/js/jquery.js "></script>
<script type="text/javascript " src="../bootstrap/js/bootstrap.min.js "></script>