<?php require_once '../includes/conexion.php'; ?>
<?php require_once '../includes/cabecera.php'; ?>
<?php require_once '../includes/funciones.php'; ?>
<?php require_once '../usuario_administrador/navegacion.php'; ?>
<?php require_once '../includes/sesion.php'; ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb ms-4 mt-2">
        <li class="breadcrumb-item"><a href="proveedor.php">Proveedores</a></li>
        <li class="breadcrumb-item active" aria-current="page">Consulta</li>
    </ol>
</nav>

<h3 class="text-center m-2">Proveedores</h3>

<?php
if (!empty($_POST['documento_proveedor'])) {
    $documento = $_POST['documento_proveedor'];
    $consulta = "SELECT * FROM proveedores p 
                INNER JOIN ciudad c ON (c.id_ciudad=p.ciudad_p) 
                WHERE id_p = ('$documento') ";
    $resultado = mysqli_query($conexion, $consulta) or die('Error en la consulta de los usuarios' . $basedatos);

    echo "<div class='container mb-3'>";
    echo "<div class='text-white text-center'>";
    echo "<table class = 'table table-striped table-hover table-bordered shadow'>";
    echo "<tr>";
    echo "<th>id proveedor</th>";
    echo "<th>Nombres </th>";
    echo "<th>Teléfono</th>";
    echo "<th>Dirección</th>";
    echo "<th>E-mail</th>";
    echo "<th>Ciudad</th>";
    echo "<th>Empresa</th>";
    echo "<th>Editar</th>";
    echo "<th>Eliminar</th>";
    echo "</tr>";
?>

    <?php while ($columna = mysqli_fetch_array($resultado)) {
    ?>
        <tr>
            <td><?php echo $columna['id_p'] ?> </td>
            <td><?php echo $columna['nombre_p'] ?> </td>
            <td><?php echo $columna['teléfono_p'] ?> </td>
            <td><?php echo $columna['dirección_p'] ?> </td>
            <td><?php echo $columna['correo_p'] ?> </td>
            <td><?php echo $columna['nombre_ciudad'] ?> </td>
            <td><?php echo $columna['empresa_p'] ?> </td>
            <td>
                <a class="fas fa-pencil-alt shadow" style="font-size:20px; color:black" href="editar_proveedor.php?id=<?php echo $columna['id_p'] ?>"></a>
            </td>
            <td>
                <a class="fas fa-trash-alt shadow" style="font-size:20px; color:crimson" href="eliminar_proveedor.php?id=<?php echo $columna['id_p'] ?>"> </a>
            </td>
        </tr>
    <?php } ?>
    </table>

<?php
} else {
    $consulta = "SELECT * FROM proveedores p 
                INNER JOIN ciudad c ON (c.id_ciudad=p.ciudad_p) ";
    $resultado = mysqli_query($conexion, $consulta) or die('Error en la consulta de los usuarios' . $basedatos);

    echo "<div class='container mb-3'>";
    echo "<div class='text-white text-center'>";
    echo "<table class = 'table table-striped table-hover table-bordered shadow'>";
    echo "<tr>";
    echo "<th>id proveedor</th>";
    echo "<th>Nombres </th>";
    echo "<th>Teléfono</th>";
    echo "<th>Dirección</th>";
    echo "<th>E-mail</th>";
    echo "<th>Ciudad</th>";
    echo "<th>Empresa</th>";
    echo "<th>Editar</th>";
    echo "<th>Eliminar</th>";
    echo "</tr>";
}
?>

<?php while ($columna = mysqli_fetch_array($resultado)) {
?>
    <tr>
        <td><?php echo $columna['id_p'] ?> </td>
        <td><?php echo $columna['nombre_p'] ?> </td>
        <td><?php echo $columna['teléfono_p'] ?> </td>
        <td><?php echo $columna['dirección_p'] ?> </td>
        <td><?php echo $columna['correo_p'] ?> </td>
        <td><?php echo $columna['nombre_ciudad'] ?> </td>
        <td><?php echo $columna['empresa_p'] ?> </td>
        <td>
            <a class="fas fa-pencil-alt shadow" style="font-size:20px; color:black" href="editar_proveedor.php?id=<?php echo $columna['id_p'] ?>"></a>
        </td>
        <td>
            <a class="fas fa-trash-alt shadow" style="font-size:20px; color:crimson" href="eliminar_proveedor.php?id=<?php echo $columna['id_p'] ?>"> </a>
        </td>
    </tr>
<?php } ?>
</table>

<?php require_once '../includes/footer.php'; ?>
<script type="text/javascript " src="../bootstrap/js/jquery.js "></script>
<script type="text/javascript " src="../bootstrap/js/bootstrap.min.js "></script>
</body>

</html>