<?php require_once '../includes/cabecera.php';?>

<?php if(isset($_SESSION['acceso'])) :?>
    <div class='bienvenida'>
        <h4>Bienvenido, <?=$_SESSION["acceso"]["nombre_usuario"]; ?></h4>
    </div>
<?php endif; ?>

<?php require_once '../includes/funciones.php'; ?>
<?php
    if (isset($_GET)) {
        $documento_e = !empty($_GET['documento_e']) ? $_GET['documento_e'] : false;
        $nombre_e = !empty($_GET['nombre_eo']) ? $_GET['nombre_eo'] : false;
        $telefono_e = !empty($_GET['telefono_e']) ? $_GET['telefono_e'] : false;
        $direccion_e = !empty($_GET['direccion_e'] ) ? $_GET['direccion_e'] : false;
        $correo_e = !empty($_GET['correo_e']) ? $_GET['correo_e'] : false;
        $eps_e = !empty($_GET['id_eps']) ? $_GET['id_eps'] : false;
        $arl_e = !empty($_GET['id_arl']) ? $_GET['id_arl'] : false;
        $ciudad_e = !empty($_GET['id_ciudad']) ? $_GET['id_ciudad'] : false;
        $cargo_e = !empty($_GET['id_cargo']) ? $_GET['id_cargo'] : false;
        
        $errores=array();

        if ($documento_e && is_numeric($documento_e)) {
            $documento_e_validado = true;
        }else {
            $documento_e = false;
            $errores['documento_e'] = "Documento no valido, solo se permite valores numericos.";
        }

        if ($nombre_e && !is_numeric($nombre_e) && !preg_match("/[0-9]/", $nombre_e)) {
            $nombre_e_validado = true;
        }else {
            $nombre_e = false;
            $errores['nombre_eo'] = "Nombre no valido, no se permite valores numericos.";
        }

        if ($telefono_e && is_numeric($telefono_e)) {
            $telefono_e_validado = true;
        }else {
            $telefono_e = false;
            $errores['telefono_e'] = "Teléfono no valido, solo se permite valores numericos.";
        }

        if ($direccion_e) {
            $direccion_e_validado = true;
        }else {
            $direccion_e = false;
            $errores['direccion_e'] = "Teléfono no valido, solo se permite valores numericos.";
        }

        if ($correo_e && filter_var($correo_e, FILTER_VALIDATE_EMAIL)) {
            $correo_e_validado = true;
        }else {
            $correo_e = false;
            $errores['correo_e'] = "Teléfono no valido, solo se permite valores numericos.";
        }

        if ($eps_e && is_numeric($eps_e)) {
            $eps_e_validado = true;
        }else {
            $eps_e = false;
            $errores['id_eps'] = "Eps de empleado no valido.";
            }

        if ($arl_e && is_numeric($arl_e)) {
            $arl_e_validado = true;
        }else {
            $arl_e = false;
            $errores['id_arl'] = "Arl de empleado no valido.";
            }

        if ($ciudad_e && is_numeric($ciudad_e)) {
            $ciudad_e_validado = true;
        }else {
            $ciudad_e = false;
            $errores['id_ciudad'] = "Ciudad de empleado no valido.";
            }

        if ($cargo_e && is_numeric($cargo_e)) {
            $cargo_e_validado = true;
        }else {
            $cargo_e = false;
            $errores['id_cargo'] = "Cargo de empleado no valido.";
            }

        $guardar_usuario = false;

        if (count($errores) == 0) {
            $guardar_usuario = true;

            $actualiza = "UPDATE empleados SET 
            documento_e = '$documento_e', nombre_eo = '$nombre_e', telefono_e = '$telefono_e', direccion_e = '$direccion_e',
            correo_e = '$correo_e', eps_e = '$eps_e', arl_e = '$arl_e', ciudad_e = '$ciudad_e', cargo_e = '$cargo_e'
            WHERE documento_e = '$documento_e'";

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
    header('location:consulta_empleados.php');
?>