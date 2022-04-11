<?php require_once "../includes/conexion.php"; ?>
<?php
    if (isset($_POST)) {
        $nombre_presupuesto = !empty($_POST['nombre_presupuesto']) ? $_POST['nombre_presupuesto']: false;
        $ciudad = !empty($_POST['id_ciudad']) ? $_POST['id_ciudad']: false;
        
        $errores = array();
    
        if ($nombre_presupuesto) {
            $nombre_presupuesto_validado = true;
        }else {
            $nombre_presupuesto = false;
            $errores ['nombre_presupuesto'] = 'No ha ingresado nombre del presupuesto .';
        }

        if ($ciudad) {
            $ciudad_validado = true;
        }else {
            $ciudad = false;
            $errores ['id_ciudad'] = 'No ha ingresado ciudad.';
        }


        $guardar_usuario = false;

        if (count($errores) == 0) {
            $guardar_usuario = true;

            $inserta = "INSERT INTO presupuestos (nombre_proyecto_p, ciudad_p)
            VALUES
            ('$nombre_presupuesto', '$ciudad')";
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
    header('location: presupuestos.php');

?>