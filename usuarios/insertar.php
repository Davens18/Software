<?php require_once '../includes/conexion.php';?>
<?php
    if (isset($_POST)) {
        $identificacion = !empty($_POST['documento_usuario']) ? $_POST['documento_usuario'] : false;
        $nombre = !empty($_POST['nombre_usuario']) ? $_POST['nombre_usuario'] : false;
        $rol = !empty($_POST['id_rol'] ) ? $_POST['id_rol'] : false;
        $clave = !empty($_POST['clave']) ? $_POST['clave'] : false;

        $errores=array();

        $id_sql = "SELECT * FROM usuarios WHERE documento_u = '$identificacion'";
        $link = mysqli_query($conexion, $id_sql);

        if (!$identificacion) {
            $identificacion = false;
            $errores['documento_usuario'] = "No ha ingresado documento de identidad de usuario.";
        }elseif (is_numeric($identificacion)) {
            $identificacion_validado = true;
            if ($link && mysqli_num_rows($link) == 1) {
                $identificacion = false;
                $errores ['documento_usuario'] = 'Usuario ya existe en la base de datos';
            }
        }else{
            $identificacion = false;
            $errores['documento_usuario'] = "Documento no valido, solo se permite valores numericos.";
        }

        if (!$nombre) {
            $nombre = false;
            $errores['nombre_usuario'] = "No ha ingresado nombre de usuario.";
        }elseif (!is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
            $nombre_validado = true;
        }else {
            $nombre = false;
            $errores['nombre_usuario'] = "Nombre no valido, no se permite valores numericos.";
        }

        if ($rol && is_numeric($rol)) {
            $rol_validado = true;
        }else {
            $rol = false;
            $errores['id_rol'] = "Seleccione rol de usuario.";
            }

        if ($clave) {
            $clave_validado = true;
        }else {
            $clave = false;
            $errores['clave'] = "Ingrese una contraseña.";
        }
        $guardar_usuario = false;

        if (count($errores) == 0) {
            $guardar_usuario = true;

            $password_segura = password_hash ( $clave, PASSWORD_BCRYPT, ['cost'=>4]);

            $inserta = "INSERT INTO usuarios (documento_u, nombre_usuario, id_rol, clave)
            VALUES
            ('$identificacion', '$nombre', '$rol', '$password_segura')";
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
        
    }else{
        echo("no ingreso ningún dato");
    }
    header('location: usuario.php');
?>