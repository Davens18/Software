<?php require_once '../includes/cabecera.php';?>

<?php if(isset($_SESSION['acceso'])) :?>
    <div class='bienvenida'>
        <h4>Bienvenido, <?=$_SESSION["acceso"]["nombre_usuario"]; ?></h4>
    </div>
<?php endif; ?>

<?php require_once '../includes/funciones.php'; ?>
<?php
    if (isset($_GET)) {
        $id_c = !empty($_GET['id_c']) ? $_GET['id_c'] : false;
        $documento_c = !empty($_GET['documento_c']) ? $_GET['documento_c'] : false;
        $nombre_c = !empty($_GET['nombre_c']) ? $_GET['nombre_c'] : false;
        $telefono_c = !empty($_GET['telefono_c']) ? $_GET['telefono_c'] : false;
        $direccion_c = !empty($_GET['direccion_c'] ) ? $_GET['direccion_c'] : false;
        $correo_c = !empty($_GET['correo_c']) ? $_GET['correo_c'] : false;
        $empresa_c = !empty($_GET['empresa_c']) ? $_GET['empresa_c'] : false;
        $ciudad_c = !empty($_GET['id_ciudad']) ? $_GET['id_ciudad'] : false;

        $errores=array();

        if ($documento_c && is_numeric($documento_c)) {
            $documento_c_validado = true;
        }else {
            $documento_c = false;
            $errores['documento_c'] = "Documento no valido, solo se permite valores numericos.";
        }

        if ($nombre_c && !is_numeric($nombre_c) && !preg_match("/[0-9]/", $nombre_c)) {
            $nombre_c_validado = true;
        }else {
            $nombre_c = false;
            $errores['nombre_c'] = "Nombre no valido, no se permite valores numericos.";
        }

        if ($telefono_c && is_numeric($telefono_c)) {
            $telefono_c_validado = true;
        }else {
            $telefono_c = false;
            $errores['telefono_c'] = "Teléfono no valido, solo se permite valores numericos.";
        }

        if ($direccion_c) {
            $direccion_c_validado = true;
        }else {
            $direccion_c = false;
            $errores['direccion_c'] = "No ingreso dirección.";
        }

        if ($correo_c && filter_var($correo_c, FILTER_VALIDATE_EMAIL)) {
            $correo_c_validado = true;
        }else {
            $correo_c = false;
            $errores['correo_c'] = "E-mail no valido, solo se permite valores numericos.";
        }

        if ($ciudad_c && is_numeric($ciudad_c)) {
            $ciudad_c_validado = true;
        }else {
            $ciudad_c = false;
            $errores['id_ciudad'] = "Ciudad de empleado no valido.";
        }

        if ($empresa_c) {
            $empresa_c_validado = true;
        }else {
            $empresa_c = false;
            $errores['empresa_c'] = "No ingreso la empresa.";
        }
        $guardar_usuario = false;

        if (count($errores) == 0) {
            $guardar_usuario = true;

            $actualiza = "UPDATE clientes SET 
            documento_c = '$documento_c', nombre_c = '$nombre_c', telefono_c = '$telefono_c', direccion_c = '$direccion_c',
            correo_c = '$correo_c', empresa_c = '$empresa_c', ciudad_c = '$ciudad_c' WHERE id_c = '$id_c'";

            $resultado = mysqli_query( $conexion, $actualiza ) or die ( "No se pudo insertar en la base de datos");
            if ($resultado) {
                $_SESSION['completado'] = "Los datos del clientes han sido actualizados";
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
    header('location:consulta_clientes.php');
?>