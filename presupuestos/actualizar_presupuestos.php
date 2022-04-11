<?php require_once '../includes/cabecera.php';?>

<?php if(isset($_SESSION['acceso'])) :?>
    <div class='bienvenida'>
        <h4>Bienvenido, <?=$_SESSION["acceso"]["nombre_usuario"]; ?></h4>
    </div>
<?php endif; ?>

<?php require_once '../includes/funciones.php'; ?>
<?php
    if (isset($_GET)) {
        $id_p = !empty($_GET['id_p']) ? $_GET['id_p'] : false;
        $nombre_pp = !empty($_GET['nombre_proyecto_p']) ? $_GET['nombre_proyecto_p'] : false;
        $ciudad_p = !empty($_GET['id_ciudad']) ? $_GET['id_ciudad'] : false;

        $errores=array();

        if ($nombre_pp) {
            $nombre_pp_validado = true;
        }else {
            $nombre_pp = false;
            $errores ['nombre_proyecto_p'] = 'No ha ingresado nombre del presupuesto .';
        }

        if ($ciudad_p) {
            $ciudad_p_validado = true;
        }else {
            $ciudad_p = false;
            $errores ['id_ciudad'] = 'No ha ingresado ciudad.';
        }

        $guardar_usuario = false;

        if (count($errores) == 0) {
            $guardar_usuario = true;

            $actualiza = "UPDATE presupuestos SET 
            nombre_proyecto_p = '$nombre_pp', ciudad_p = '$ciudad_p' WHERE id_p = '$id_p'";

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
    header('location:consultar_presupuestos.php');
?>