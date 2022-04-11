<?php require_once "../includes/conexion.php"; ?>
<?php
    if (isset($_POST)) {
        $item_a = !empty($_POST['item_a']) ? $_POST['item_a']: false;
        $item_i = !empty($_POST['item_i']) ? $_POST['item_i']: false;
        $id_p = !empty($_POST['id_p']) ? $_POST['id_p']: false;
        $cantidad = !empty($_POST['cantidad']) ? $_POST['cantidad']: false;

        //var_dump($item_a, $item_i, $cantidad, $peso, $sub_total );
        //die();

        $errores = array();

        if ($item_a) {
            $item_a_validado = true;
        }else {
            $item_a = false;
            $errores ['item_a'] = 'No ha seleccionado itém de la actividad.';
        }
        if ($item_i) {
            $item_i_validado = true;
        }else {
            $item_i = false;
            $errores ['item_i'] = 'No ha seleccionado itém de insumo.';
        }
        if ($id_p) {
            $id_p_validado = true;
        }else {
            $id_p = false;
            $errores ['id_p'] = 'No ha seleccionado presupuesto.';
        }

        if ($cantidad) {
            $cantidad_validado = true;
        }else {
            $cantidad = false;
            $errores ['cantidad'] = 'No ha ingresado cantidad.';
        }

        
        //var_dump($item, $descripcion, $unidad, $precio, $peso, $rubro );
        //die();
        $consulta = "SELECT * FROM insumos 
                WHERE item_i = '$item_i'";
                $resultado = mysqli_query ($conexion, $consulta) or die ('Error en la consulta de los usuarios'. $basedatos);
                while ($columna = mysqli_fetch_array( $resultado ))
                {
                    $peso= $columna['peso_i'];
                    $precio = $columna['precio_unidad_i'];
                }
                $peso_parcial = $peso * $cantidad;
                $sub_total = $precio * $cantidad;
                //var_dump($peso_parcial, $sub_total);
                //die();
        $guardar_usuario = false;

        if (count($errores) == 0) {
            $guardar_usuario = true;

            $inserta = "INSERT INTO insumos_actividades (actividad_ia, insumos_ia, presupuesto_ia, cantidad_ia, peso_parcial_ia, subtotal_ia)
            VALUES
            ('$item_a', '$item_i', '$id_p', '$cantidad', '$peso_parcial', '$sub_total')";
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
    header('location: consulta_insumos_actividades.php');

?>