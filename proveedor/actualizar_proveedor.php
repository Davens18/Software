<?php require_once '../includes/cabecera.php';?>

<?php if(isset($_SESSION['acceso'])) :?>
    <div class='bienvenida'>
        <h4>Bienvenido, <?=$_SESSION["acceso"]["nombre_usuario"]; ?></h4>
    </div>
<?php endif; ?>

<?php require_once '../includes/funciones.php'; ?>
<?php
    if (isset($_GET)) {
        $documento_p = !empty($_GET['id_p']) ? $_GET['id_p'] : false;
        $nombre_p = !empty($_GET['nombre_p']) ? $_GET['nombre_p'] : false;
        $telefono_p = !empty($_GET['telefono_p']) ? $_GET['telefono_p'] : false;
        $direccion_p = !empty($_GET['direccion_p'] ) ? $_GET['direccion_p'] : false;
        $correo_p = !empty($_GET['correo_p']) ? $_GET['correo_p'] : false;
        $empresa_p = !empty($_GET['empresa_p']) ? $_GET['empresa_p'] : false;
        $ciudad_p = !empty($_GET['id_ciudad']) ? $_GET['id_ciudad'] : false;

        $errores=array();

        if ($documento_p && is_numeric($documento_p)) {
            $documento_p_validado = true;
        }else {
            $documento_p = false;
            $errores['documento_p'] = "Documento no valido, solo se permite valores numericos.";
        }

        if ($nombre_p && !is_numeric($nombre_p) && !preg_match("/[0-9]/", $nombre_p)) {
            $nombre_p_validado = true;
        }else {
            $nombre_p = false;
            $errores['nombre_p'] = "Nombre no valido, no se permite valores numericos.";
        }

        if ($telefono_p && is_numeric($telefono_p)) {
            $telefono_p_validado = true;
        }else {
            $telefono_p = false;
            $errores['teléfono_p'] = "Teléfono no valido, solo se permite valores numericos.";
        }

        if ($direccion_p) {
            $direccion_p_validado = true;
        }else {
            $direccion_p = false;
            $errores['dirección_p'] = "No ingreso dirección.";
        }

        if ($correo_p && filter_var($correo_p, FILTER_VALIDATE_EMAIL)) {
            $correo_p_validado = true;
        }else {
            $correo_p = false;
            $errores['correo_p'] = "E-mail no valido, solo se permite valores numericos.";
        }

        if ($ciudad_p && is_numeric($ciudad_p)) {
            $ciudad_p_validado = true;
        }else {
            $ciudad_p = false;
            $errores['id_ciudad'] = "Ciudad de empleado no valido.";
        }

        if ($empresa_p) {
            $empresa_p_validado = true;
        }else {
            $empresa_p = false;
            $errores['empresa_p'] = "No ingreso la empresa.";
        }
        $guardar_usuario = false;

        if (count($errores) == 0) {
            $guardar_usuario = true;

            $actualiza = "UPDATE proveedores SET 
            id_p = '$documento_p', nombre_p = '$nombre_p', teléfono_p = '$telefono_p', dirección_p = '$direccion_p',
            correo_p = '$correo_p', empresa_p = '$empresa_p', ciudad_p = '$ciudad_p' WHERE id_p = '$documento_p'";

            $resultado = mysqli_query( $conexion, $actualiza ) or die ( "No se pudo insertar en la base de datos");
            if ($resultado) {
                $_SESSION['completado'] = "Los datos del proveedor han sido actualizados";
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
    header('location:consulta_proveedor.php');
?>