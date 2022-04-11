<?php require_once '../includes/conexion.php'; ?>
<?php require_once '../includes/cabecera.php'; ?>
<?php require_once '../includes/funciones.php'; ?>
<?php require_once '../usuario_administrador/navegacion.php'; ?>
<?php require_once '../includes/sesion.php'; ?>


<nav aria-label="breadcrumb">
    <ol class="breadcrumb ms-4 mt-2">
        <li class="breadcrumb-item"><a href="actividades.php">Actividades</a></li>
        <li class="breadcrumb-item active" aria-current="page">Consulta</li>
    </ol>
</nav>

<h3 class="text-center m-2">Actividades</h3>

<?php

if (!empty($_POST['item'])) {
    $item_a = $_POST['item'];
    $consulta = "SELECT * FROM actividades a
                INNER JOIN actividad_detalle d ON a.actividad_detalle_ad = d.item_ad
                INNER JOIN actividad_general l ON d.actividad_general_ag=l.item_ag
                WHERE item_a = ('$item_a') ";
    $resultado = mysqli_query($conexion, $consulta) or die('Error en la consulta de los usuarios' . $basedatos);

    echo "<div class='container mb-3'>";
    echo "<div class='text-white text-center'>";
    echo "<table class = 'table table-striped table-hover table-bordered shadow'>";
    echo "<tr>";
    echo "<th>Itém</th>";
    echo "<th>Descripción </th>";
    echo "<th>Actividad detalle</th>";
    echo "<th>Actividad general</th>";
    echo "<th>Editar</th>";
    echo "<th>Eliminar</th>";
    echo "</tr>";

?>

    <?php while ($columna = mysqli_fetch_array($resultado)) {
    ?>
        <tr>
            <td><?php echo $columna['item_a'] ?> </td>
            <td><?php echo $columna['descripcion_a'] ?> </td>
            <td><?php echo $columna['descripcion_ad'] ?> </td>
            <td><?php echo $columna['descripcion_ag'] ?> </td>
            <td>
                <a class="fas fa-pencil-alt shadow" style="font-size:20px; color:black" href="editar_actividad.php?id=<?php echo $columna['item_a'] ?>"></a>
            </td>
            <td>
                <a class="fas fa-trash-alt shadow" style="font-size:20px; color:crimson" href="eliminar_actividad.php?id=<?php echo $columna['item_a'] ?>"></a>
            </td>
        </tr>
    <?php } ?>
    </table>
<?php
} else {
    $consulta = "SELECT * FROM actividades a 
                INNER JOIN actividad_detalle d ON a.actividad_detalle_ad=d.item_ad
                INNER JOIN actividad_general l ON d.actividad_general_ag=l.item_ag";
    $resultado = mysqli_query($conexion, $consulta) or die('Error en la consulta de los usuarios' . $basedatos);

    echo "<div class='container mb-3'>";
    echo "<div class='text-white text-center'>";
    echo "<table class = 'table table-striped table-hover table-bordered shadow'>";
    echo "<tr>";
    echo "<th>Itém</th>";
    echo "<th>Descripción </th>";
    echo "<th>Actividad detalle</th>";
    echo "<th>Actividad general</th>";
    echo "<th>Editar</th>";
    echo "<th>Eliminar</th>";
    echo "</tr>";
}

?>
<?php while ($columna = mysqli_fetch_array($resultado)) {
?>
    <tr>
        <td><?php echo $columna['item_a'] ?> </td>
        <td><?php echo $columna['descripcion_a'] ?> </td>
        <td><?php echo $columna['descripcion_ad'] ?> </td>
        <td><?php echo $columna['descripcion_ag'] ?> </td>
        <td>
            <a class="fas fa-pencil-alt shadow" style="font-size:20px; color:black" href="editar_actividad.php?id=<?php echo $columna['item_a'] ?>"></a>
        </td>
        <td>
            <a class="fas fa-trash-alt shadow" style="font-size:20px; color:crimson" href="eliminar_actividad.php?id=<?php echo $columna['item_a'] ?>"></a>
        </td>
        </tr>
<?php } ?>
</table>
</div>
</div>

<?php require_once '../includes/footer.php'; ?>
<script type="text/javascript " src="../bootstrap/js/jquery.js "></script>
<script type="text/javascript " src="../bootstrap/js/bootstrap.min.js "></script>