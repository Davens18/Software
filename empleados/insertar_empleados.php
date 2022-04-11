<?php require_once '../includes/conexion.php';?>
<?php
    if (isset($_POST)) {
        $identificacion = !empty($_POST['documento_empleado']) ? $_POST['documento_empleado'] : false;
        $nombre = !empty($_POST['nombre_empleado']) ? $_POST['nombre_empleado'] : false;
        $telefono = !empty($_POST['telefono_empleado'] ) ? $_POST['telefono_empleado'] : false;
        $direccion = !empty($_POST['direccion_empleado']) ? $_POST['direccion_empleado'] : false;
        $email = !empty($_POST['correo_empleado']) ? $_POST['correo_empleado'] : false;
        $eps = !empty($_POST['id_eps']) ? $_POST['id_eps'] : false;
        $arl = !empty($_POST['id_arl']) ? $_POST['id_arl'] : false;
        $ciudad = !empty($_POST['id_ciudad']) ? $_POST['id_ciudad'] : false;
        $cargo = !empty($_POST['id_cargo']) ? $_POST['id_cargo'] : false;

        $errores=array();

        if ($identificacion && is_numeric($identificacion)) {
            $identificacion_validado = true;
        }else {
            $identificacion = false;
            $errores['documento_empleado'] = "Documento no valido, solo se permite valores numericos.";
        }

        if ($nombre && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
            $nombre_validado = true;
        }else {
            $nombre = false;
            $errores['nombre_empleado'] = "Nombre no valido, no se permite valores numericos.";
        }

        if ($telefono && is_numeric($telefono)) {
            $telefono_validado = true;
        }else {
            $telefono = false;
            $errores['telefono_empleado'] = "Teléfono no valido, solo se permite valores numericos.";
        }

        if ($direccion) {
            $direccion_validado = true;
        }else {
            $direccion = false;
            $errores['direccion_empleado'] = "Teléfono no valido, solo se permite valores numericos.";
        }

        if ($email && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_validado = true;
        }else {
            $email = false;
            $errores['correo_empleado'] = "Teléfono no valido, solo se permite valores numericos.";
        }

        if ($eps && is_numeric($eps)) {
            $eps_validado = true;
        }else {
            $eps = false;
            $errores['id_eps'] = "Eps de empleado no valido.";
            }

        if ($arl && is_numeric($arl)) {
            $arl_validado = true;
        }else {
            $arl = false;
            $errores['id_arl'] = "Arl de empleado no valido.";
            }

        if ($ciudad && is_numeric($ciudad)) {
            $ciudad_validado = true;
        }else {
            $ciudad = false;
            $errores['id_ciudad'] = "Ciudad de empleado no valido.";
            }

        if ($cargo && is_numeric($cargo)) {
            $cargo_validado = true;
        }else {
            $cargo = false;
            $errores['id_cargo'] = "Cargo de empleado no valido.";
            }
            
        $guardar_usuario = false;

        if (count($errores) == 0) {
            $guardar_usuario = true;

            $inserta = "INSERT INTO empleados (documento_e, nombre_eo, telefono_e, direccion_e, correo_e, eps_e, arl_e, ciudad_e, cargo_e)
            VALUES
            ('$identificacion', '$nombre', '$telefono', '$direccion', '$email', '$eps', '$arl', '$ciudad', '$cargo')";
            $resultado = mysqli_query( $conexion, $inserta ) or die ( "No se pudo insertar en la base de datos");
            if ($resultado) {
                $_SESSION['completado'] = "El registro se ha completado con éxito";
            }else {
                $_SESSION['errores'] ['general'] = "Error al guardar el usuario";
            }
            mysqli_close( $conexion);
        }else {
            $_SESSION['errores'] = $errores;
        }
        
        }else {
            echo "no ingreso ningún dato";
        }
            header('location: empleados.php');
?>