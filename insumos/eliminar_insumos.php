<?php require_once '../includes/cabecera.php';?>
<?php
$eliminar = $_GET['id'];
$sql = "SELECT * FROM insumos WHERE item_i = '$eliminar'";
$resultado = mysqli_query($conexion, $sql) or die ('Error en la consulta de usuarios'. $basedatos);
    while ($columna = mysqli_fetch_array($resultado)) {

        $sql = "DELETE FROM insumos where '$eliminar' = item_i ";
        $resultado = mysqli_query($conexion, $sql);
        if ($resultado) {
            header ('location: consulta_insumos.php');
        }else {
            echo('No se puedo eliminar registro');
        }
    }
?>