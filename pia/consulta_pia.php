<?php require_once '../includes/conexion.php'; ?>
<?php require_once '../includes/cabecera.php'; ?>
<?php require_once '../includes/funciones.php'; ?>
<?php require_once '../usuario_administrador/navegacion.php'; ?>
<?php require_once '../includes/sesion.php'; ?>


<nav aria-label="breadcrumb">
    <ol class="breadcrumb ms-4 mt-2">
        <li class="breadcrumb-item"><a href="pia.php">Presupuestos</a></li>
        <li class="breadcrumb-item active" aria-current="page">Consulta</li>
    </ol>
</nav>

<h3 class="text-center m-2">Presupuestos</h3>

<?php

if (!empty($_POST['item_a'])) {
    $item_a = $_POST['item_a'];
    $consulta = "SELECT * FROM presupuesto_insumos_actividades i
                INNER JOIN presupuestos s ON i.presupuesto_pia = s.id_p
                INNER JOIN actividades a ON i.insumos_actividades_pia = a.item_a
                WHERE id_pia = ('$item_a') ";
    $resultado = mysqli_query($conexion, $consulta) or die('Error en la consulta de los usuarios' . $basedatos);

    echo "<div class='container mb-3'>";
    echo "<div class='text-white text-center'>";
    echo "<table class = 'table table-striped table-hover table-bordered shadow'>";
    echo "<tr>";
    echo "<th>Presupuesto</th>";
    echo "<th>Ítem</th>";
    echo "<th>Actividad</th>";
    echo "<th>Fecha</th>";
    echo "<th>Unidad</th>";
    echo "<th>Bloque 1</th>";
    echo "<th>Bloque 2</th>";
    echo "<th>Bloque 3</th>";
    echo "<th>Total</th>";
    echo "<th>Valor Uni</th>";
    echo "<th>Valor Par</th>";
    echo "<th>Valor Trans</th>";
    echo "<th>Editar</th>";
    echo "<th>Eliminar</th>";
    echo "</tr>";
?>

    <?php while ($columna = mysqli_fetch_array($resultado)) {
    ?>
        <tr>
            <td><?php echo $columna['nombre_proyecto_p'] ?> </td>
            <td><?php echo $columna['item_a'] ?> </td>
            <td><?php echo $columna['descripcion_a'] ?> </td>
            <td><?php echo $columna['fecha_ia'] ?> </td>
            <td><?php echo $columna['unidad_a'] ?> </td>
            <td><?php echo $columna['cantidad_bloque_1_a'] ?> </td>
            <td><?php echo $columna['cantidad_bloque_2_a'] ?> </td>
            <td><?php echo $columna['cantidad_bloque_3_a'] ?> </td>
            <td><?php echo $columna['total_cantidad_a'] ?> </td>
            <td><?php echo $columna['valor_unitario_a'] ?> </td>
            <td><?php echo $columna['valor_parcial_a'] ?> </td>
            <td><?php echo $columna['valor_uni_transporte_a'] ?> </td>
            <td>
                <a class="fas fa-pencil-alt shadow" style="font-size:20px; color:black" href="editar_pia.php?id=<?php echo $columna['id_pia'] ?>"> </a>
            </td>
            <td>
                <a class="fas fa-trash-alt shadow" style="font-size:20px; color:crimson" href="eliminar_pia.php?id=<?php echo $columna['id_pia'] ?>"> </a>
            </td>
        </tr>
    <?php } ?>
    </table>

<?php
} else {
    $consulta = "SELECT * FROM presupuesto_insumos_actividades i
                INNER JOIN presupuestos s ON i.presupuesto_pia = s.id_p
                INNER JOIN actividades a ON i.insumos_actividades_pia = a.item_a";
    $resultado = mysqli_query($conexion, $consulta) or die('Error en la consulta de los usuarios' . $basedatos);

    echo "<div class='container mb-3'>";
    echo "<div class='text-white text-center'>";
    echo "<table class = 'table table-striped table-hover table-bordered shadow'>";
    echo "<tr>";
    echo "<th>Presupuesto</th>";
    echo "<th>Ítem</th>";
    echo "<th>Actividad</th>";
    echo "<th>Fecha</th>";
    echo "<th>Unidad</th>";
    echo "<th>Bloque 1</th>";
    echo "<th>Bloque 2</th>";
    echo "<th>Bloque 3</th>";
    echo "<th>Total</th>";
    echo "<th>Valor Uni</th>";
    echo "<th>Valor Par</th>";
    echo "<th>Valor Trans</th>";
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
        <td><?php echo $columna['descripcion_a'] ?> </td>
        <td><?php echo $columna['fecha_ia'] ?> </td>
        <td><?php echo $columna['unidad_a'] ?> </td>
        <td><?php echo $columna['cantidad_bloque_1_a'] ?> </td>
        <td><?php echo $columna['cantidad_bloque_2_a'] ?> </td>
        <td><?php echo $columna['cantidad_bloque_3_a'] ?> </td>
        <td><?php echo $columna['total_cantidad_a'] ?> </td>
        <td><?php echo $columna['valor_unitario_a'] ?> </td>
        <td><?php echo $columna['valor_parcial_a'] ?> </td>
        <td><?php echo $columna['valor_uni_transporte_a'] ?> </td>
        <td>
            <a class="fas fa-pencil-alt shadow" style="font-size:20px; color:black" href="editar_pia.php?id=<?php echo $columna['id_pia'] ?>"> </a>
        </td>
        <td>
            <a class="fas fa-trash-alt shadow" style="font-size:20px; color:crimson" href="eliminar_pia.php?id=<?php echo $columna['id_pia'] ?>"> </a>
        </td>
    </tr>
<?php } ?>
</table>
</div>
</div>

<?php require_once '../includes/footer.php'; ?>
<script type="text/javascript " src="../bootstrap/js/jquery.js "></script>
<script type="text/javascript " src="../bootstrap/js/bootstrap.min.js "></script>