<?php require_once '../includes/conexion.php'; ?>
<?php require_once '../includes/cabecera.php'; ?>
<?php require_once '../includes/funciones.php'; ?>
<?php require_once '../usuario_administrador/navegacion.php'; ?>
<?php require_once '../includes/sesion.php'; ?> 

<nav aria-label="breadcrumb">
    <ol class="breadcrumb ms-4 mt-2">
        <li class="breadcrumb-item"><a href="usuario.php">Usuarios</a></li>
        <li class="breadcrumb-item active" aria-current="page">Consulta</li>
    </ol>
</nav>

<h3 class="text-center m-2">Usuarios</h3>
<?php
if (!empty($_POST['documento_usuario'])) {
    $documento = $_POST['documento_usuario'];
    $consulta = "SELECT * FROM usuarios u INNER JOIN rol r ON u.id_rol = r.id_rol  
                WHERE documento_u = ('$documento')";
    $resultado = mysqli_query($conexion, $consulta) or die('Error en la consulta de los usuarios' . $basedatos);

    echo "<div class='container mb-3'>";
    echo "<div class='text-white text-center'>";
    echo "<table class = 'table table-striped table-hover table-bordered shadow'>";
    echo "<tr>";
    echo "<th>Id</th>";
    echo "<th>Documento</th>";
    echo "<th>Nombre</th>";
    echo "<th>Rol</th>";
    echo "<th>Contraseña</th>";
    echo "<th>Fecha</th>";
    echo "<th>Editar</th>";
    echo "<th>Eliminar</th>";
    echo "</tr>";
?>

    <?php while ($columna = mysqli_fetch_array($resultado)) {
    ?>
        <tr>
            <td><?php echo $columna['id_u'] ?> </td>
            <td><?php echo $columna['documento_u'] ?> </td>
            <td><?php echo $columna['nombre_usuario'] ?> </td>
            <td><?php echo $columna['nombre_rol'] ?> </td>
            <td><?php echo $columna['clave'] ?> </td>
            <td><?php echo $columna['fecha_ia'] ?> </td>
            <td>
                <a class="fas fa-pencil-alt shadow" style="font-size:20px; color:black" href="editar.php?id=<?php echo $columna['documento_u'] ?>"> </a>
            </td>
            <td>
                <a class="fas fa-trash-alt shadow" style="font-size:20px; color:crimson" href="eliminar.php?id=<?php echo $columna['id_u'] ?>"> </a>
            </td>
        </tr>
    <?php } ?>
    </table>


<?php
} else {
    $consulta = "SELECT *
                FROM usuarios u
                INNER JOIN rol r ON u.id_rol = r.id_rol";
    $resultado = mysqli_query($conexion, $consulta) or die('Error en la consulta de los usuarios' . $basedatos);

    echo "<div class='container mb-3'>";
    echo "<div class='text-white text-center'>";
    echo "<table class = 'table table-striped table-hover table-bordered shadow'>";
    echo "<tr>";
    echo "<th>Id</th>";
    echo "<th>Documento</th>";
    echo "<th>Nombre</th>";
    echo "<th>Rol</th>";
    echo "<th>Contraseña</th>";
    echo "<th>Fecha</th>";
    echo "<th>Editar</th>";
    echo "<th>Eliminar</th>";
    echo "</tr>";
}
?>

<?php while ($columna = mysqli_fetch_array($resultado)) {
?>
    <tr>
        <td><?php echo $columna['id_u'] ?> </td>
        <td><?php echo $columna['documento_u'] ?> </td>
        <td><?php echo $columna['nombre_usuario'] ?> </td>
        <td><?php echo $columna['nombre_rol'] ?> </td>
        <td><?php echo $columna['clave'] ?> </td>
        <td><?php echo $columna['fecha_ia'] ?> </td>
        <td>
            <a class="fas fa-pencil-alt shadow" style="font-size:20px; color:black" href="editar.php?id=<?php echo $columna['documento_u'] ?>"> </a>
        </td>
        <td>
            <a class="fas fa-trash-alt shadow" style="font-size:20px; color:crimson" href="eliminar.php?id=<?php echo $columna['id_u'] ?>"> </a>
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