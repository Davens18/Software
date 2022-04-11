<?php require_once '../includes/conexion.php'; ?>

<?php
    if (isset($_POST)) {
        $item_i = !empty($_POST['item_i']) ? $_POST['item_i'] : false;
        $descripcion_i = !empty($_POST['descripcion_i']) ? $_POST['descripcion_i'] : false;
        $unidad_i = !empty($_POST['unidad_i']) ? $_POST['unidad_i'] : false;
        $precio_unidad_i = !empty($_POST['precio_unidad_i'] ) ? $_POST['precio_unidad_i'] : false;
        $peso_i = !empty($_POST['peso_i']) ? $_POST['peso_i'] : false;
        $id_rubro = !empty($_POST['id_rubro']) ? $_POST['id_rubro'] : false;

        $errores=array();

        if (!$descripcion_i) {
            $descripcion_i = false;
            $errores['descripcion_i'] = "No ha ingresado descripción.";
        }else{
            $descripcion_i_validado = true;
        }

        if (!$unidad_i) {
            $unidad_i = false;
            $errores['unidad_i'] = "No ha ingresado unidad.";
        }else {
            $unidad_i_validado = true;
        }

        if ($precio_unidad_i && is_numeric($precio_unidad_i)) {
            $precio_unidad_i_validado = true;
        }else {
            $precio_unidad_i = false;
            $errores['precio_unidad_i'] = "Solo se permite valores numericos.";
            }

        if ($peso_i) {
            $peso_i_validado = true;
        }else {
            $peso_i = false;
            $errores['peso_i'] = "No ha ingresado peso.";
        }
        if ($id_rubro && is_numeric($id_rubro)) {
            $id_rubro_validado = true;
        }else {
            $id_rubro = false;
            $errores['id_rubro'] = "No ha ingresado rubro perteneciente.";
        }
        $guardar_usuario = false;

        if (count($errores) == 0) {
            $guardar_usuario = true;

            $actualiza = "UPDATE insumos SET 
            descripcion_i = '$descripcion_i', unidad_i = '$unidad_i', precio_unidad_i = '$precio_unidad_i',
            peso_i = '$peso_i', rubro_i = '$id_rubro' WHERE item_i = '$item_i'";

            $resultado = mysqli_query( $conexion, $actualiza ) or die ( "No se pudo insertar en la base de datos");
            if ($resultado) {
                $_SESSION['completado'] = "El insumo ".$item_i. " ha sido actualizado con éxito";
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
    header('location:consulta_insumos.php');
?>