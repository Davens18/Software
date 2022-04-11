<?php require_once '../includes/cabecera.php'; ?>
<?php require_once '../usuario_administrador/navegacion.php';?>
<?php require_once '../includes/funciones.php'; ?>
<?php
    $item_n = $_GET['item_actividad'];
    $descripcion_n = $_GET['descripcion'];
    $actividad_n = $_GET['item_ad'];
    if ($descripcion_n != NULL || $actividad_n != NUll) {
        $sql2 = "UPDATE actividades SET 
        item_a = '$item_n', descripcion_a = '$descripcion_n', actividad_detalle_ad = '$actividad_n'
        WHERE item_a = '$item_n'";
        $resultado2 = mysqli_query($conexion, $sql2);
        header('location: consulta_actividades.php');
    }
?>