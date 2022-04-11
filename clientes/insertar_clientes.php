<?php require_once '../includes/conexion.php';?>
<?php
    if (isset($_POST)) {
        $identificacion = !empty($_POST['documento_cliente']) ? $_POST['documento_cliente'] : false;
        $nombre = !empty($_POST['nombre_cliente']) ? $_POST['nombre_cliente'] : false;
        $telefono = !empty($_POST['telefono_cliente'] ) ? $_POST['telefono_cliente'] : false;
        $direccion = !empty($_POST['direccion_cliente']) ? $_POST['direccion_cliente'] : false;
        $email = !empty($_POST['correo_cliente']) ? $_POST['correo_cliente'] : false;
        $ciudad = !empty($_POST['id_ciudad']) ? $_POST['id_ciudad'] : false;
        $empresa = !empty($_POST['nombre_empresa']) ? $_POST['nombre_empresa'] : false;

        $errores=array();

        if ($identificacion && is_numeric($identificacion)) {
            $identificacion_validado = true;
        }else {
            $identificacion = false;
            $errores['documento_cliente'] = "Documento no valido, solo se permite valores numericos.";
        }

        if ($nombre && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
            $nombre_validado = true;
        }else {
            $nombre = false;
            $errores['nombre_cliente'] = "Nombre no valido, no se permite valores numericos.";
        }

        if ($telefono && is_numeric($telefono)) {
            $telefono_validado = true;
        }else {
            $telefono = false;
            $errores['telefono_cliente'] = "Teléfono no valido, solo se permite valores numericos.";
        }

        if ($direccion) {
            $direccion_validado = true;
        }else {
            $direccion = false;
            $errores['direccion_cliente'] = "No ingreso dirección.";
        }

        if ($email && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_validado = true;
        }else {
            $email = false;
            $errores['correo_cliente'] = "E-mail no valido, solo se permite valores numericos.";
        }

        if ($ciudad && is_numeric($ciudad)) {
            $ciudad_validado = true;
        }else {
            $ciudad = false;
            $errores['id_ciudad'] = "Ciudad de empleado no valido.";
        }

        if ($empresa) {
            $empresa_validado = true;
        }else {
            $empresa = false;
            $errores['nombre_empresa'] = "No ingreso la empresa.";
        }
            
        $guardar_usuario = false;

        if (count($errores) == 0) {
            $guardar_usuario = true;

            $inserta = "INSERT INTO clientes (documento_c, nombre_c, telefono_c, direccion_c, correo_c, ciudad_c, empresa_c)
            VALUES
            ('$identificacion', '$nombre', '$telefono', '$direccion', '$email', '$ciudad', '$empresa')";
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
    header('location: clientes.php');
?>