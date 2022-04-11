<?php require_once '../includes/cabecera.php';?>
<?php
$eliminar = $_GET['id'];
$sql = "SELECT * FROM actividades WHERE item_a = '$eliminar'";
$resultado = mysqli_query($conexion, $sql) or die ('Error en la consulta de usuarios'. $basedatos);
    while ($columna = mysqli_fetch_array($resultado)) {

        $sql = "DELETE FROM actividades where '$eliminar' = item_a ";
        $resultado = mysqli_query($conexion, $sql);
        if ($resultado) {
            header ('location: consulta_actividades.php');
        }else {
            echo('No se puedo eliminar registro');
        }
    }
?>