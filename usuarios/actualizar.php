<?php require_once '../includes/conexion.php'; ?>
<?php require_once '../includes/funciones.php'; ?>
<?php
    if (isset($_GET)) {
        $id_u = !empty($_GET['id_usuario']) ? $_GET['id_usuario'] : false;
        $documento_n = !empty($_GET['documento_usuario']) ? $_GET['documento_usuario'] : false;
        $nombre_n = !empty($_GET['nombre_usuario']) ? $_GET['nombre_usuario'] : false;
        $rol_n = !empty($_GET['id_rol'] ) ? $_GET['id_rol'] : false;
        $clave_n = !empty($_GET['clave']) ? $_GET['clave'] : false;
        
        $errores=array();

        if (!$documento_n) {
            $documento_n = false;
            $errores['documento_usuario'] = "No ha ingresado documento de identidad de usuario.";
        }elseif (is_numeric($documento_n)) {
            $documento_n_validado = true;
        }else{
            $documento_n = false;
            $errores['documento_usuario'] = "Documento no valido, solo se permite valores numericos.";
        }

        if (!$nombre_n) {
            $nombre_n = false;
            $errores['nombre_usuario'] = "No ha ingresado nombre de usuario.";
        }elseif (!is_numeric($nombre_n) && !preg_match("/[0-9]/", $nombre_n)) {
            $nombre_n_validado = true;
        }else {
            $nombre_n = false;
            $errores['nombre_usuario'] = "Nombre no valido, no se permite valores numericos.";
        }

        if ($rol_n && is_numeric($rol_n)) {
            $rol_n_validado = true;
        }else {
            $rol_n = false;
            $errores['id_rol'] = "Seleccione rol de usuario.";
            var_dump($rol_n);
            die();
            }

        if ($clave_n) {
            $clave_n_validado = true;
        }else {
            $clave_n = false;
            $errores['clave'] = "Ingrese una contraseña.";
        }
        $guardar_usuario = false;

        if (count($errores) == 0) {
            $guardar_usuario = true;

            $password_segura = password_hash ( $clave_n, PASSWORD_BCRYPT, ['cost'=>4]);

            $actualiza = "UPDATE usuarios SET 
            documento_u = '$documento_n', nombre_usuario = '$nombre_n', id_rol = '$rol_n', clave = '$password_segura'
            WHERE id_u = '$id_u'";
            $resultado = mysqli_query( $conexion, $actualiza ) or die ( "No se pudo insertar en la base de datos");
            if ($resultado) {
                $_SESSION['completado'] = "El registro se ha actualizado con éxito";
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