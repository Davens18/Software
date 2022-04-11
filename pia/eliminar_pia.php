<?php require_once '../includes/cabecera.php';?>
<?php
$eliminar = $_GET['id'];
$sql = "SELECT * FROM insumos_actividades WHERE id_ia = '$eliminar'";
$resultado = mysqli_query($conexion, $sql) or die ('Error en la consulta de usuarios'. $basedatos);
    while ($columna = mysqli_fetch_array($resultado)) {

        $sql = "DELETE FROM insumos_actividades where '$eliminar' = id_ia ";
        $resultado = mysqli_query($conexion, $sql);
        if ($resultado) {
            header ('location: consulta_insumos_actividades.php');
        }else {
            echo('No se puedo eliminar registro');
        }
    }
?>