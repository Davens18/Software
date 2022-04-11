<?php require_once '../includes/cabecera.php';?>
<?php
$eliminar = $_GET['id'];
$sql = "SELECT * FROM usuarios WHERE id_u = '$eliminar'";
$resultado = mysqli_query($conexion, $sql) or die ('Error en la consulta de usuarios'. $basedatos);
    while ($columna = mysqli_fetch_array($resultado)) {

        $sql = "DELETE FROM usuarios where '$eliminar' = id_u ";
        $resultado = mysqli_query($conexion, $sql);
        if ($resultado) {
            header ('location: consulta.php');
        }else {
            echo('No se puedo eliminar registro');
        }
    }
?>