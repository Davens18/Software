<?php require_once "../includes/conexion.php"; ?>
<?php
if (isset($_POST)) {
    $id_p = !empty($_POST['id_p']) ? $_POST['id_p'] : false;
    $id_ia = !empty($_POST['id_ia']) ? $_POST['id_ia'] : false;
    $unidad_a = !empty($_POST['unidad_a']) ? $_POST['unidad_a'] : false;
    $cantidad_bloque_1_a = !empty($_POST['cantidad_bloque_1_a']) ? $_POST['cantidad_bloque_1_a'] : false;
    $cantidad_bloque_2_a = !empty($_POST['cantidad_bloque_2_a']) ? $_POST['cantidad_bloque_2_a'] : false;
    $cantidad_bloque_3_a = !empty($_POST['cantidad_bloque_3_a']) ? $_POST['cantidad_bloque_3_a'] : false;
    $valor_uni_transporte_a = !empty($_POST['valor_uni_transporte_a']) ? $_POST['valor_uni_transporte_a'] : false;

    $errores = array();

    if ($id_p) {
        $id_p_validado = true;
    } else {
        $id_p = false;
        $errores['id_p'] = 'No ha seleccionado presupuesto.';
    }
    if ($id_ia) {
        $id_ia_validado = true;
    } else {
        $id_ia = false;
        $errores['id_ia'] = 'No ha seleccionado Actividad.';
    }
    if ($unidad_a) {
        $unidad_a_validado = true;
    } else {
        $unidad_a = false;
        $errores['unidad_a'] = 'No ha Ingresado tipo de unidad.';
    }
    if ($valor_uni_transporte_a) {
        $valor_uni_transporte_a_validado = true;
    } else {
        $valor_uni_transporte_a = false;
        $errores['valor_uni_transporte_a'] = 'No ha Ingresado valor de transporte.';
    }
    if (empty($cantidad_bloque_1_a) && empty($cantidad_bloque_2_a) && empty($cantidad_bloque_3_a)) {
        $total_cantidad_a = 1;
    } elseif ($cantidad_bloque_1_a == 0 && $cantidad_bloque_2_a == 0 && $cantidad_bloque_3_a == 0) {
        $total_cantidad_a = 1;
    } else {
        $total_cantidad_a = $cantidad_bloque_1_a + $cantidad_bloque_2_a + $cantidad_bloque_3_a;
    }

    $valor_unitario_a = 0;

    $consulta = "SELECT * FROM insumos_actividades 
                WHERE actividad_ia = '$id_ia'
                AND presupuesto_ia = '$id_p'";
    $resultado = mysqli_query($conexion, $consulta) or die('Error en la consulta de los usuarios' . $basedatos);
    while ($columna = mysqli_fetch_array($resultado)) {
        $valor_unitario = $columna['subtotal_ia'];
        $valor_unitario_a = $valor_unitario_a + $valor_unitario;
    }

    $valor_parcial_a = $valor_unitario_a * $total_cantidad_a;

    //var_dump($valor_parcial_a);
    //die();

    $guardar_usuario = false;

    if (count($errores) == 0) {
        $guardar_usuario = true;

        $inserta = "INSERT INTO presupuesto_insumos_actividades (presupuesto_pia, insumos_actividades_pia,
            unidad_a, cantidad_bloque_1_a, cantidad_bloque_2_a, cantidad_bloque_3_a,
            total_cantidad_a, valor_unitario_a, valor_parcial_a, valor_uni_transporte_a) 
            VALUES
            ('$id_p', '$id_ia', '$unidad_a', '$cantidad_bloque_1_a', '$cantidad_bloque_2_a',
            '$cantidad_bloque_3_a', '$total_cantidad_a', '$valor_unitario_a', '$valor_parcial_a',
            '$valor_uni_transporte_a')";
        $resultado = mysqli_query($conexion, $inserta) or die("No se pudo insertar en la base de datos");
        if ($resultado) {
            $_SESSION['completado'] = "El registro de actividades se ha completado con éxito";
        } else {
            $_SESSION['errores']['general'] = "Error al guardar el usuario";
        }
        mysqli_close($conexion);
    } else {
        $_SESSION['errores'] = $errores;
    }
} else {
    echo ("no ingreso ningún dato");
}
header('location: pia.php');

?>