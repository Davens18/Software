<?php require_once '../includes/conexion.php'; ?>
<?php require_once '../includes/cabecera.php'; ?>
<?php require_once '../includes/funciones.php'; ?>
<?php require_once '../usuario_administrador/navegacion.php'; ?>
<?php require_once '../includes/sesion.php'; ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb ms-4 mt-2">
        <li class="breadcrumb-item"><a href="empleados.php">Empleados</a></li>
        <li class="breadcrumb-item active" aria-current="page">Consulta</li>
    </ol>
</nav>

<h3 class="text-center m-2">Empleados</h3>

<?php
if (!empty($_POST['documento_empleado'])) {
    $documento = $_POST['documento_empleado'];
    $consulta = "SELECT * FROM empleados e INNER JOIN eps s ON (s.id_eps = e.eps_e)
                INNER JOIN arl l ON (l.id_arl=e.arl_e)
                INNER JOIN ciudad c ON (c.id_ciudad=e.ciudad_e)
                INNER JOIN cargo o ON (o.id_cargo=e.cargo_e) 
                WHERE documento_e = ('$documento') ";
    $resultado = mysqli_query($conexion, $consulta) or die('Error en la consulta de los usuarios' . $basedatos);

    echo "<div class='container mb-3'>";
    echo "<div class='text-white text-center'>";
    echo "<table class = 'table table-striped table-hover table-bordered shadow'>";
    echo "<tr>";
    echo "<th>Identificación</th>";
    echo "<th>Nombres </th>";
    echo "<th>Teléfono</th>";
    echo "<th>Dirección</th>";
    echo "<th>E-mail</th>";
    echo "<th>EPS</th>";
    echo "<th>ARL</th>";
    echo "<th>Ciudad</th>";
    echo "<th>Cargo</th>";
    echo "<th>Editar</th>";
    echo "<th>Eliminar</th>";
    echo "</tr>";
?>

    <?php while ($columna = mysqli_fetch_array($resultado)) {
    ?>
        <tr>
            <td><?php echo $columna['documento_e'] ?> </td>
            <td><?php echo $columna['nombre_eo'] ?> </td>
            <td><?php echo $columna['telefono_e'] ?> </td>
            <td><?php echo $columna['direccion_e'] ?> </td>
            <td><?php echo $columna['correo_e'] ?> </td>
            <td><?php echo $columna['nombre_eps'] ?> </td>
            <td><?php echo $columna['nombre_arl'] ?> </td>
            <td><?php echo $columna['nombre_ciudad'] ?> </td>
            <td><?php echo $columna['nombre_cargo'] ?> </td>
            <td>
                <a class="fas fa-pencil-alt shadow" style="font-size:20px; color:black" href="editar_empleados.php?id=<?php echo $columna['documento_e'] ?>"> </a>
            </td>
            <td>
                <a class="fas fa-trash-alt shadow" style="font-size:20px; color:crimson" href="eliminar_empleados.php?id=<?php echo $columna['documento_e'] ?>"> </a>
            </td>
        </tr>
    <?php } ?>
    </table>

<?php
} else {
    $consulta = "SELECT * FROM empleados e INNER JOIN eps s ON (s.id_eps = e.eps_e)
                INNER JOIN arl l ON (l.id_arl=e.arl_e)
                INNER JOIN ciudad c ON (c.id_ciudad=e.ciudad_e)
                INNER JOIN cargo o ON (o.id_cargo=e.cargo_e)";
    $resultado = mysqli_query($conexion, $consulta) or die('Error en la consulta de los usuarios' . $basedatos);

    echo "<div class='container mb-3'>";
    echo "<div class='text-white text-center'>";
    echo "<table class = 'table table-striped table-hover table-bordered shadow'>";
    echo "<tr>";
    echo "<th>Identificación</th>";
    echo "<th>Nombres </th>";
    echo "<th>Teléfono</th>";
    echo "<th>Dirección</th>";
    echo "<th>E-mail</th>";
    echo "<th>EPS</th>";
    echo "<th>ARL</th>";
    echo "<th>Ciudad</th>";
    echo "<th>Cargo</th>";
    echo "<th>Editar</th>";
    echo "<th>Eliminar</th>";
    echo "</tr>";
}
?>
<?php while ($columna = mysqli_fetch_array($resultado)) {
?>
    <tr>
        <td><?php echo $columna['documento_e'] ?> </td>
        <td><?php echo $columna['nombre_eo'] ?> </td>
        <td><?php echo $columna['telefono_e'] ?> </td>
        <td><?php echo $columna['direccion_e'] ?> </td>
        <td><?php echo $columna['correo_e'] ?> </td>
        <td><?php echo $columna['nombre_eps'] ?> </td>
        <td><?php echo $columna['nombre_arl'] ?> </td>
        <td><?php echo $columna['nombre_ciudad'] ?> </td>
        <td><?php echo $columna['nombre_cargo'] ?> </td>
        <td>
            <a class="fas fa-pencil-alt shadow" style="font-size:20px; color:black" href="editar_empleados.php?id=<?php echo $columna['documento_e'] ?>"> </a>
        </td>
        <td>
            <a class="fas fa-trash-alt shadow" style="font-size:20px; color:crimson" href="eliminar_empleados.php?id=<?php echo $columna['documento_e'] ?>"> </a>
        </td>
    </tr>
<?php } ?>
</table>
</div>
</div>

<?php require_once '../includes/footer.php'; ?>
<script type="text/javascript " src="../bootstrap/js/jquery.js "></script>
<script type="text/javascript " src="../bootstrap/js/bootstrap.min.js "></script>
</body>

</html>