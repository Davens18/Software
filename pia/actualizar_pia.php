<?php require_once '../includes/cabecera.php';?>

<?php if(isset($_SESSION['acceso'])) :?>
    <div class='bienvenida'>
        <h4>Bienvenido, <?=$_SESSION["acceso"]["nombre_usuario"]; ?></h4>
    </div>
<?php endif; ?>

<?php if (isset($_SESSION["acceso"]["id_rol"]) == 1) {
        require_once '../usuario_administrador/navegacion.php';
    }elseif (isset($_SESSION["acceso"]["id_rol"]) == 2) {
        require_once '../usuario_consultor/navegacion_consultor.php';
    }else{
        header('location: ../index.php');
}?>

<?php require_once '../includes/funciones.php'; ?>
<?php
    if (isset($_GET)) {
        $id_ia = !empty($_GET['id_ia']) ? $_GET['id_ia'] : false;
        $item_a = !empty($_GET['item_a']) ? $_GET['item_a'] : false;
        $item_i = !empty($_GET['item_i']) ? $_GET['item_i'] : false;
        $cantidad_ia = !empty($_GET['cantidad_ia']) ? $_GET['cantidad_ia'] : false;

        $errores=array();

        if ($item_a) {
            $item_a_validado = true;
        }else {
            $item_a = false;
            $errores['item_a'] = "No ha ingresado actividad.";
            }
        if ($item_i) {
            $item_i_validado = true;
        }else {
            $item_i = false;
            $errores['item_i'] = "No ha ingresado insumo.";
            }
        if ($cantidad_ia && is_numeric($cantidad_ia)) {
            $cantidad_ia_validado = true;
        }else {
            $cantidad_ia = false;
            $errores['cantidad_ia'] = "Solo se permite valores numericos.";
        }

        $consulta = "SELECT * FROM insumos 
        WHERE item_i = '$item_i'";
        $resultado = mysqli_query ($conexion, $consulta) or die ('Error en la consulta de los usuarios'. $basedatos);
        while ($columna = mysqli_fetch_array( $resultado ))
        {
            $peso= $columna['peso_i'];
            $precio = $columna['precio_unidad_i'];
        }
        $peso_parcial = $peso * $cantidad_ia;
        $sub_total = $precio * $cantidad_ia;

        $guardar_usuario = false;

        if (count($errores) == 0) {
            $guardar_usuario = true;

            $actualiza = "UPDATE insumos_actividades SET 
            insumos_ia = '$item_i', actividad_ia = '$item_a', cantidad_ia = '$cantidad_ia',
            peso_parcial_ia = '$peso_parcial', subtotal_ia = '$sub_total'
            WHERE id_ia = '$id_ia'";

            $resultado = mysqli_query( $conexion, $actualiza ) or die ( "No se pudo insertar en la base de datos");
            if ($resultado) {
                $_SESSION['completado'] = "La actividad ha sido actualizado con éxito";
            }else {
                $_SESSION['errores'] ['general'] = "Error al guardar el usuario";
            }
            mysqli_close( $conexion);
        }else {
            $_SESSION['errores'] = $errores;
        }
        
    }else{
        echo("no ingreso ningún dato");
    }
    header('location:consulta_insumos_actividades.php');
?>