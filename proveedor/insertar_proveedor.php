<?php require_once '../includes/conexion.php';?>
<?php
    if (isset($_POST)) {
        $identificacion = !empty($_POST['documento_proveedor']) ? $_POST['documento_proveedor'] : false;
        $nombre = !empty($_POST['nombre_proveedor']) ? $_POST['nombre_proveedor'] : false;
        $telefono = !empty($_POST['telefono_proveedor'] ) ? $_POST['telefono_proveedor'] : false;
        $direccion = !empty($_POST['direccion_proveedor']) ? $_POST['direccion_proveedor'] : false;
        $email = !empty($_POST['correo_proveedor']) ? $_POST['correo_proveedor'] : false;
        $ciudad = !empty($_POST['id_ciudad']) ? $_POST['id_ciudad'] : false;
        $empresa = !empty($_POST['nombre_empresa']) ? $_POST['nombre_empresa'] : false;

        $errores=array();

        if ($identificacion && is_numeric($identificacion)) {
            $identificacion_validado = true;
        }else {
            $identificacion = false;
            $errores['documento_proveedor'] = "Documento no valido, solo se permite valores numericos.";
        }

        if ($nombre && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
            $nombre_validado = true;
        }else {
            $nombre = false;
            $errores['nombre_proveedor'] = "Nombre no valido, no se permite valores numericos.";
        }

        if ($telefono && is_numeric($telefono)) {
            $telefono_validado = true;
        }else {
            $telefono = false;
            $errores['telefono_proveedor'] = "Teléfono no valido, solo se permite valores numericos.";
        }

        if ($direccion) {
            $direccion_validado = true;
        }else {
            $direccion = false;
            $errores['direccion_proveedor'] = "No ingreso dirección.";
        }

        if ($email && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_validado = true;
        }else {
            $email = false;
            $errores['correo_proveedor'] = "E-mail no valido, solo se permite valores numericos.";
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
            $errores['empresa_proveedor'] = "No ingreso la empresa.";
        }
            
        $guardar_usuario = false;

        if (count($errores) == 0) {
            $guardar_usuario = true;

            $inserta = "INSERT INTO proveedores (id_p, nombre_p, teléfono_p, dirección_p, correo_p, ciudad_p, empresa_p)
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
    header('location: proveedor.php');
?>