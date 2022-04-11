<?php require_once '../includes/cabecera.php';?>
<?php
$eliminar = $_GET['id'];
$sql = "SELECT * FROM clientes WHERE id_c = '$eliminar'";
$resultado = mysqli_query($conexion, $sql) or die ('Error en la consulta de usuarios'. $basedatos);
    while ($columna = mysqli_fetch_array($resultado)) {

        $sql = "DELETE FROM clientes where '$eliminar' = id_c ";
        $resultado = mysqli_query($conexion, $sql);
        if ($resultado) {
            header ('location: consulta_clientes.php');
        }else {
            echo('No se puedo eliminar registro');
        }
    }
?>