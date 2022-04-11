<?php require_once '../includes/cabecera.php';?>
<?php
$eliminar = $_GET['id'];
$sql = "SELECT * FROM empleados WHERE documento_e = '$eliminar'";
$resultado = mysqli_query($conexion, $sql) or die ('Error en la consulta de usuarios'. $basedatos);
    while ($columna = mysqli_fetch_array($resultado)) {

        $sql = "DELETE FROM empleados where '$eliminar' = documento_e";
        $resultado = mysqli_query($conexion, $sql);
        if ($resultado) {
            header ('location: consulta_empleados.php');
        }else {
            echo('No se puedo eliminar registro');
        }
    }
?>