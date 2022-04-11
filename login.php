<?php require_once 'includes/conexion.php'; ?>
<?php require_once 'includes/funciones.php'; ?>

<?php
//Recoger datos de formulario
if (isset($_POST)) {
    $usuario = !empty($_POST['usuario']) ? $_POST['usuario'] : false;
    $contraseña = !empty($_POST['pass']) ? $_POST['pass'] : false;
    $refresh = !empty($_POST['refresh']) ? $_POST['refresh']: false;

    if ($refresh) {
        header('location: index.php');
        die();
    }

    $errores = array();

    if (!$usuario) {
        $errores['usuario'] = 'Por favor ingrese identificación.';
    } else {
        $usuario_validado = true;
    }

    if (!$contraseña) {
        $errores['pass'] = 'Por favor ingrese contraseña';
        
    } else {
        $contraseña_validado = true;
    }

    $ingresar_sistema = false;

    if (count($errores) == 0) {
        $ingresar_sistema = true;

        //consulta para comprobar rol del usuario
        $sql = "SELECT * FROM usuarios WHERE documento_u = '$usuario' AND id_rol = 1";
        $login = mysqli_query($conexion, $sql);

        if ($login && mysqli_num_rows($login) == 1) {
            $acceso = mysqli_fetch_assoc($login);

            //comprobar la contraseña
            $verificar = password_verify($contraseña, $acceso['clave']);
            if ($verificar) {
                $_SESSION['acceso'] = $acceso;
                header('location: ./usuario_administrador/usuario_administrador.php');

                if (isset($_SESSION['error_login'])) {
                    session_unset();
                }
            } else {
                $_SESSION['error_login'] = "Login incorrecto";
                //header("location: index.php");
            }
        } elseif ($login) {
            //consulta para comprobar las credenciales del usuario y rol consultor
            $sql = "SELECT * FROM usuarios WHERE documento_u = '$usuario' AND id_rol = 2";
            $login = mysqli_query($conexion, $sql);

            if ($login && mysqli_num_rows($login) == 1) {
                $acceso = mysqli_fetch_assoc($login);

                //comprobar la contraseña
                $verificar = password_verify($contraseña, $acceso['clave']);
                if ($verificar) {
                    $_SESSION['acceso'] = $acceso;

                    header('location: ./usuario_consultor/usuario_consultor.php');

                    if (isset($_SESSION['error_login'])) {
                        session_unset();
                    }
                } else {
                    $_SESSION['error_login'] = "Login incorrecto";
                    //header("location: index.php");
                }
            }
        } else {
            $_SESSION['error_login'] = "Login incorrecto";
            echo "<script> alert('Login incorrecto') </script>";
        }
    }else {
        $_SESSION['errores'] = $errores;
        header("location: index.php");
    }
} else {
    header("location: index.php");
}

?>
