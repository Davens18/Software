<?php require_once '../includes/conexion.php'; ?>
<?php require_once '../includes/cabecera.php'; ?>
<?php require_once '../includes/funciones.php'; ?>
<?php require_once '../usuario_administrador/navegacion.php'; ?>
<?php require_once '../includes/sesion.php'; ?>

<?php
error_reporting(0);
$vacia = " ";
$presupuesto = $_POST['presupuesto'];
$actividad = $_POST['actividad'];
$insumo = $_POST['insumo'];
$limite = $_POST['registro'];
if (isset($_POST['buscar'])) {
    if (empty($_POST['actividad']) && empty($_POST['insumo']) && !empty($_POST['presupuesto'])) {
        $vacia = "where presupuesto_ia = '" . $presupuesto . "'";
    } elseif (empty($_POST['insumo']) && empty($_POST['presupuesto']) && !empty($_POST['actividad'])) {
        $vacia = "where actividad_ia ='" . $actividad . "'";
    } elseif (empty($_POST['actividad']) && empty($_POST['presupuesto']) && !empty($_POST['insumo'])) {
        $vacia = "where insumos_ia ='" . $insumo . "'";
    } elseif (!empty($_POST['actividad']) && !empty($_POST['insumo']) && !empty($_POST['presupuesto'])) {
        $vacia = "where actividad_ia ='" . $actividad . "' and insumos_ia ='" . $insumo . "' and presupuesto_ia ='" . $presupuesto . "'";
    } elseif (!empty($_POST['actividad']) && !empty($_POST['insumo'])) {
        $vacia = "where actividad_ia ='" . $actividad . "' and insumos_ia ='" . $insumo . "'";
    } elseif (!empty($_POST['insumo']) && !empty($_POST['presupuesto'])) {
        $vacia = "where insumos_ia ='" . $insumo . "' and presupuesto_ia ='" . $presupuesto . "'";
    } elseif (!empty($_POST['actividad']) && !empty($_POST['presupuesto'])) {
        $vacia = "where actividad_ia ='" . $actividad . "' and presupuesto_ia ='" . $presupuesto . "'";
    } else {
    }
}
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb ms-4 mt-2">
        <li class="breadcrumb-item"><a href="insumos_actividades.php">APU</a></li>
        <li class="breadcrumb-item active" aria-current="page">Consulta</li>
    </ol>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="col">
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Nuevo APU</button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Nuevo APU</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="insertar_insumos_actividades.php" method="POST">
                                    <legend>Gestión Actividades</legend>
                                    <div>
                                        <label for="id-p">Seleccione Presupuesto</label>
                                        <?php
                                        require_once '../includes/conexion.php';
                                        $query = "select id_p, nombre_proyecto_p from presupuestos";
                                        $resultado = mysqli_query($conexion, $query) or die("error en la consulta de programa");
                                        echo "<select name='id_p' class='form-select text-secondary mb-3' aria-label='.form-select-lg example'>";
                                        echo  "<option selected value=0> ---Seleccione Presupuesto --- </option>";
                                        while ($row = mysqli_fetch_array($resultado)) {
                                            echo  "<option value=$row[0]> $row[1] </option>";
                                        }
                                        echo "</select>";
                                        ?>
                                        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'id_p') : ''; ?>
                                    </div>
                                    <div>
                                        <label for="item_a">Seleccione Itém de actividad</label>
                                        <?php
                                        require_once '../includes/conexion.php';
                                        $query = "select item_a, descripcion_a from actividades";
                                        $resultado = mysqli_query($conexion, $query) or die("error en la consulta de programa");
                                        echo "<select name='item_a' class='form-select text-secondary mb-3' aria-label='.form-select-lg example'>";
                                        echo  "<option selected value=0> ---Seleccione Actividad --- </option>";
                                        while ($row = mysqli_fetch_array($resultado)) {
                                            echo  "<option value=$row[0]> $row[0] </option>";
                                        }
                                        echo "</select>";
                                        ?>
                                        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'item_a') : ''; ?>
                                    </div>
                                    <div>
                                        <label for="item_i">Seleccione insumo de actividad</label>
                                        <?php
                                        require_once '../includes/conexion.php';
                                        $query = "select item_i, descripcion_i from insumos";
                                        $resultado = mysqli_query($conexion, $query) or die("error en la consulta de programa");
                                        echo "<select name='item_i' class='form-select text-secondary mb-3' aria-label='.form-select-lg example'>";
                                        echo  "<option selected value=0> --Seleccione Insumos --- </option>";
                                        while ($row = mysqli_fetch_array($resultado)) {
                                            echo  "<option value=$row[0]> $row[0] </option>";
                                        }
                                        echo "</select>";
                                        ?>
                                        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'item_i') : ''; ?>
                                    </div>

                                    <div>
                                        <label for="cantidad">Cantidad</label>
                                        <input type="text" class="form-control" name="cantidad" placeholder="Cantidad">
                                        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'cantidad') : ''; ?>
                                    </div>
                                    <input type="submit" class="btn btn-outline-dark ms-1 mb-2 mt-3" value="Registrar">
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
                        <?php
                        require_once '../includes/conexion.php';
                        $query = "select id_p, nombre_proyecto_p from presupuestos";
                        $resultado = mysqli_query($conexion, $query) or die("error en la consulta de programa");
                        echo "<select name='presupuesto' class='form-select text-secondary' aria-label='.form-select-lg example'>";
                        echo  "<option selected value=0> Presupuesto </option>";
                        while ($row = mysqli_fetch_array($resultado)) {
                            echo  "<option value=$row[0]> $row[1] </option>";
                        }
                        echo "</select>";
                        ?>
                    </div>
                    <div class="col">
                        <?php
                        require_once '../includes/conexion.php';
                        $query = "select distinct actividad_ia from insumos_actividades";
                        $resultado = mysqli_query($conexion, $query) or die("error en la consulta de programa");
                        echo "<select name='actividad' class='form-select text-secondary' aria-label='.form-select-lg example'>";
                        echo  "<option selected value=0> Actividad </option>";
                        while ($row = mysqli_fetch_array($resultado)) {
                            echo  "<option value=$row[0]> $row[0] </option>";
                        }
                        echo "</select>";
                        ?>
                    </div>
                    <div class="col">
                        <?php
                        require_once '../includes/conexion.php';
                        $query = "select distinct insumos_ia from insumos_actividades";
                        $resultado = mysqli_query($conexion, $query) or die("error en la consulta de programa");
                        echo "<select name='insumo' class='form-select text-secondary' aria-label='.form-select-lg example'>";
                        echo  "<option selected value=0> insumos </option>";
                        while ($row = mysqli_fetch_array($resultado)) {
                            echo  "<option value=$row[0]> $row[0] </option>";
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
    <h3 class="text-center text-dark p-1 m-2 bg-light">Análisis de Precio Unitario</h3>
</div>

<?php

if (!empty($_POST['item_a'])) {
    $item_a = $_POST['item_a'];
    $consulta = "SELECT * FROM insumos_actividades i
                INNER JOIN insumos s ON i.insumos_ia = s.item_i
                INNER JOIN actividades a ON i.actividad_ia = a.item_a
                INNER JOIN presupuestos p ON i.presupuesto_ia = p.id_p
                WHERE insumos_ia = ('$item_i') ";
    $resultado = mysqli_query($conexion, $consulta) or die('Error en la consulta de los usuarios' . $basedatos);

    echo "<div class='container mb-3'>";
    echo "<div class='text-white text-center'>";
    echo "<table class = 'table table-striped table-hover table-bordered shadow'>";
    echo "<tr>";
    echo "<th>Presupuesto</th>";
    echo "<th>Ítem Actividad</th>";
    echo "<th>Ítem</th>";
    echo "<th>Insumo</th>";
    echo "<th>Cantidad</th>";
    echo "<th>Peso Parcial</th>";
    echo "<th>Subtotal</th>";
    echo "<th>Fecha</th>";
    echo "<th>Editar</th>";
    echo "<th>Eliminar</th>";
    echo "</tr>";
?>

    <?php while ($columna = mysqli_fetch_array($resultado)) {
    ?>
        <tr>
            <td><?php echo $columna['nombre_proyecto_p'] ?> </td>
            <td><?php echo $columna['item_a'] ?> </td>
            <td><?php echo $columna['item_i'] ?> </td>
            <td><?php echo $columna['descripcion_i'] ?> </td>
            <td><?php echo $columna['cantidad_ia'] ?> </td>
            <td><?php echo $columna['peso_parcial_ia'] ?> </td>
            <td><?php echo $columna['subtotal_ia'] ?> </td>
            <td><?php echo $columna['fecha_ia'] ?> </td>
            <td>
                <a class="fas fa-pencil-alt shadow" style="font-size:20px; color:black" href="editar_insumos_actividades.php?id=<?php echo $columna['id_ia'] ?>"> </a>
            </td>
            <td>
                <a class="fas fa-trash-alt shadow" style="font-size:20px; color:crimson" href="eliminar_insumos_actividades.php?id=<?php echo $columna['id_ia'] ?>"> </a>
            </td>
        </tr>
    <?php } ?>
    </table>

<?php
} else {
    $consulta = "SELECT * FROM insumos_actividades i 
                INNER JOIN insumos s ON i.insumos_ia = s.item_i
                INNER JOIN actividades a ON i.actividad_ia = a.item_a
                INNER JOIN presupuestos p ON i.presupuesto_ia = p.id_p
                $vacia $limite";
    $resultado = mysqli_query($conexion, $consulta) or die('Error en la consulta de los usuarios' . $basedatos);

    echo "<div class='container mb-3'>";
    echo "<div class='text-white text-center'>";
    echo "<table class = 'table table-striped table-hover table-bordered shadow'>";
    echo "<tr>";
    echo "<th>Presupuesto</th>";
    echo "<th>Ítem Actividad</th>";
    echo "<th>Ítem</th>";
    echo "<th>Insumo</th>";
    echo "<th>Cantidad</th>";
    echo "<th>Peso Parcial</th>";
    echo "<th>Subtotal</th>";
    echo "<th>Fecha</th>";
    echo "<th>Editar</th>";
    echo "<th>Eliminar</th>";
    echo "</tr>";
}

?>
<?php while ($columna = mysqli_fetch_array($resultado)) {
?>
    <tr>
        <td><?php echo $columna['nombre_proyecto_p'] ?> </td>
        <td><?php echo $columna['item_a'] ?> </td>
        <td><?php echo $columna['item_i'] ?> </td>
        <td><?php echo $columna['descripcion_i'] ?> </td>
        <td><?php echo $columna['cantidad_ia'] ?> </td>
        <td><?php echo $columna['peso_parcial_ia'] ?> </td>
        <td><?php echo $columna['subtotal_ia'] ?> </td>
        <td><?php echo $columna['fecha_ia'] ?> </td>
        <td>
            <a class="fas fa-pencil-alt shadow" style="font-size:20px; color:black" href="exampleModal1<?php echo $columna['id_ia']; ?>" data-bs-toggle="modal" data-bs-target="#exampleModal1<?php echo $columna['id_ia']; ?>" data-bs-whatever="@getbootstrap"> </a>
            <div class="modal fade" id="exampleModal1<?php echo $columna['id_ia']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">Actualizar APU</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="actualizar_insumos_actividades.php" method="POST">
                                <div>
                                    <label for="item_a" class="form-label">Seleccione Itém de actividad</label>
                                    <?php
                                    require_once '../includes/conexion.php';
                                    $query = "select item_a, descripcion_a from actividades";
                                    $resulact = mysqli_query($conexion, $query) or die("error en la consulta de programa");
                                    echo "<select name='item_a' class='form-select text-secondary mb-3' aria-label='.form-select-lg example'>";
                                    echo  "<option selected value=0> --- Seleccione Actividad --- </option>";
                                    while ($row = mysqli_fetch_array($resulact)) {
                                        echo  "<option value=$row[0]> $row[0] </option>";
                                    }
                                    echo "</select>";
                                    ?>
                                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'item_a') : ''; ?>
                                </div>
                                <div>
                                    <label for="item_i" class="form-label">Seleccione insumo de actividad</label>
                                    <?php
                                    require_once '../includes/conexion.php';
                                    $query = "select item_i, descripcion_i from insumos";
                                    $resulins = mysqli_query($conexion, $query) or die("error en la consulta de programa");
                                    echo "<select name='item_i' class='form-select text-secondary mb-3' aria-label='.form-select-lg example'>";
                                    echo  "<option selected value=0> --- Seleccione Insumo--- </option>";
                                    while ($row = mysqli_fetch_array($resulins)) {
                                        echo  "<option value=$row[0]> $row[0] </option>";
                                    }
                                    echo "</select>";
                                    ?>
                                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'item_i') : ''; ?>
                                </div>

                                <div>
                                    <label for="cantidad">Cantidad</label>
                                    <input type="text" class="form-control" name="cantidad_ia" value="<?php echo $columna['cantidad_ia'] ?>" placeholder="Cantidad">
                                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'cantidad') : ''; ?>
                                </div>
                                <div>
                                    <input type="hidden" name="id_ia" value="<?php echo $columna['id_ia'] ?>" placeholder="Cantidad">
                                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'id_ia') : ''; ?>
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
            <a class="fas fa-trash-alt shadow" style="font-size:20px; color:crimson" href="eliminar_insumos_actividades.php?id=<?php echo $columna['id_ia'] ?>"> </a>
        </td>
    </tr>
<?php } ?>
</table>
</div>
</div>

<?php require_once '../includes/footer.php'; ?>
<script type="text/javascript " src="../bootstrap/js/jquery.js "></script>
<script type="text/javascript " src="../bootstrap/js/bootstrap.min.js "></script>