<?php require_once "../includes/conexion.php"; ?>
<?php
    if (isset($_POST)) {
        $item = !empty($_POST['item_insumo']) ? $_POST['item_insumo']: false;
        $descripcion = !empty($_POST['descripcion']) ? $_POST['descripcion']: false;
        $unidad = !empty($_POST['unidad']) ? $_POST['unidad']: false;
        $precio = !empty($_POST['precio_unidad']) ? $_POST['precio_unidad']: false;
        $peso = !empty($_POST['peso']) ? $_POST['peso']: false;
        $rubro = !empty($_POST['id_rubro']) ? $_POST['id_rubro']: false;

        //var_dump($item, $descripcion, $unidad, $precio, $peso, $rubro );
        //die();

        $errores = array();

        $item_sql = "SELECT * FROM insumos WHERE item_i = '$item'";
        $link = mysqli_query($conexion, $item_sql);

        if (!$item) {
            $item = false;
            $errores['item_insumo'] = "No ha ingresado código del insumo.";
        }elseif ($item) {
            $item_validado = true;
            if ($link && mysqli_num_rows($link) == 1) {
                $item = false;
                $errores ['item_insumo'] = 'Ya existe item en la base de datos';
            }
        }

        if ($descripcion) {
            $descripcion_validado = true;
        }else {
            $descripcion = false;
            $errores ['descripcion'] = 'No ha ingresado descripción del insumo.';
        }

        if ($unidad) {
            $unidad_validado = true;
        }else {
            $unidad = false;
            $errores ['unidad'] = 'No ha ingresado unidad del insumo.';
        }

        if (!$precio) {
            $precio = false;
            $errores ['precio_unidad'] = 'No ha ingresado precio del insumo.';
        }elseif (is_numeric($precio)) {
            $precio_validado = true;
        }else {
            $precio = false;
            $errores ['precio_unidad'] = 'Solo se permite valores numericos';
        }

        if (!$peso) {
            $peso = false;
            $errores ['peso'] = 'No ha ingresado peso del insumo.';
        }elseif (is_numeric($peso)) {
            $peso_validado = true;
        }else {
            $peso = false;
            $errores ['peso'] = 'Solo se permite valores numericos';
        }

        if ($rubro && is_numeric($rubro)) {
            $rubro_validado = true;
        }else {
            $rubro = false;
            $errores ['id_rubro'] = 'Ingrese un tipo de rubro';
        }

        //var_dump($item, $descripcion, $unidad, $precio, $peso, $rubro );
        //die();

        $guardar_usuario = false;

        if (count($errores) == 0) {
            $guardar_usuario = true;

            $inserta = "INSERT INTO insumos (item_i, descripcion_i, unidad_i, precio_unidad_i, peso_i, rubro_i)
            VALUES
            ('$item', '$descripcion', '$unidad', '$precio', '$peso', '$rubro')";
            $resultado = mysqli_query( $conexion, $inserta ) or die ( "No se pudo insertar en la base de datos");
            if ($resultado) {
                $_SESSION['completado'] = "El registro de insumos se ha completado con éxito";
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
    header('location: consulta_insumos.php');

?>