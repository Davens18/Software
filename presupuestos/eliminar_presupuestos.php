<?php require_once '../includes/cabecera.php';?>
<?php
$eliminar = $_GET['id'];
$sql = "SELECT * FROM presupuestos WHERE id_p = '$eliminar'";
$resultado = mysqli_query($conexion, $sql) or die ('Error en la consulta de usuarios'. $basedatos);
    while ($columna = mysqli_fetch_array($resultado)) {

        $sql = "DELETE FROM presupuestos where '$eliminar' = id_p ";
        $resultado = mysqli_query($conexion, $sql);
        if ($resultado) {
            header ('location: consultar_presupuestos.php');
        }else {
            echo('No se puedo eliminar registro');
        }
    }
?>