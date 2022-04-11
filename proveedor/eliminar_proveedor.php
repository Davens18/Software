<?php require_once '../includes/cabecera.php';?>
<?php
$eliminar = $_GET['id'];
$sql = "SELECT * FROM proveedores WHERE id_p = '$eliminar'";
$resultado = mysqli_query($conexion, $sql) or die ('Error en la consulta de usuarios'. $basedatos);
    while ($columna = mysqli_fetch_array($resultado)) {

        $sql = "DELETE FROM proveedores where '$eliminar' = id_p ";
        $resultado = mysqli_query($conexion, $sql);
        if ($resultado) {
            header ('location: consulta_proveedor.php');
        }else {
            echo('No se puedo eliminar registro');
        }
    }
?>