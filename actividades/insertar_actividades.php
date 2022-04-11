<?php require_once "../includes/conexion.php"; ?>
<?php
    if (isset($_POST)) {
        $item = !empty($_POST['item_actividad']) ? $_POST['item_actividad']: false;
        $descripcion = !empty($_POST['descripcion']) ? $_POST['descripcion']: false;
        $aso_actividad_d = !empty($_POST['item_ad']) ? $_POST['item_ad']: false;

        //var_dump($item, $descripcion, $unidad, $precio, $peso, $rubro );
        //die();
        $id_sql = "SELECT * FROM actividades WHERE item_a = '$item'";
        $link = mysqli_query($conexion, $id_sql);

        $errores = array();

        if (!$item) {
            $item = false;
            $errores['item_actividad'] = "No ha ingresado código de la actividad.";
        }elseif ($item) {
            $item_validado = true;
            if ($link && mysqli_num_rows($link) == 1) {
                $item = false;
                $errores ['item_actividad'] = 'Ya existe item en la base de datos';
            }
        }

        if ($descripcion) {
            $descripcion_validado = true;
        }else {
            $descripcion = false;
            $errores ['descripcion'] = 'No ha ingresado descripción de la actividad.';
        }

        if ($aso_actividad_d && is_numeric($aso_actividad_d)) {
            $aso_actividad_d_validado = true;
        }else {
            $aso_actividad_d = false;
            $errores ['item_ad'] = 'Ingrese actividad detalle ';
        }

        $guardar_usuario = false;

        if (count($errores) == 0) {
            $guardar_usuario = true;

            $inserta = "INSERT INTO insumos (item_a, descripcion_a, actividad_detalle_ad)
            VALUES
            ('$item', '$descripcion', '$aso_actividad_d')";
            $resultado = mysqli_query( $conexion, $inserta ) or die ( "No se pudo insertar en la base de datos");
            if ($resultado) {
                $_SESSION['completado'] = "El registro de actividades se ha completado con éxito";
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
    header('location: actividades.php');

?>