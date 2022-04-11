<?php require_once 'includes/conexion.php'; ?>
<?php require_once 'includes/funciones.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Diseño & Construcción</title>
</head>

<body class="bg-dark">
    <div class="">
        <div class="container col-8">
            <div class="row align-items-center rounded-5">
                <div class="col mt-3">
                    <div class="mt-3 p-5 bg-dark text-white rounded-3">
                        <h2 class="text-center">Software Presupuestos</h2>
                        <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda beatae eveniet nisi explicabo et quo, debitis, eaque error neque accusamus atque est fugiat minus molestiae distinctio, iusto minima consequuntur reiciendis?</p>
                        <div class="d-flex justify-content-center mt-3">
                            <button class=" btn btn-outline-light" type="button">Registration</button>
                        </div>
                    </div>
                </div>

                <div class="col p-0">
                    <div class="bg-dark shadow-lg text-light p-5 my-5  rounded-3">
                        <header class="p-2">
                            <h3 class="text-center mb-2"><span class="text-danger ">URBANA </span></h3>
                            <h5 class=" text-center mb-5">Diseño y Construcción S.A.S</h5>
                        </header>

                        <form action="login.php" method="POST">
                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" name="usuario" placeholder="Usuario">
                                <label for="usuario" class="text-secondary">Identificación</label>
                                <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'usuario') : ''; ?>
                            </div>
                            <div class="form-floating mb-3 mt-4">
                                <input type="password" class="form-control" name="pass" placeholder="Constraseña">
                                <label for="pass class=" class="text-secondary" form-label"">Contraseña</label>
                                <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'pass') : ''; ?>
                            </div>
                            <div class="form-check mb-3 mt-4">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="remember"> Remember
                                </label>
                            </div>
                            <div class="row col-12">
                                <div class="d-flex justify-content-center mt-3 col-6">
                                    <input class="btn btn btn-outline-light" type="submit" value="Log In">
                                </div>
                                <div class="d-flex justify-content-center mt-3 col-6">
                                    <input class="btn btn btn-outline-danger" type="submit" value="Refresh" name="refresh">
                                </div>
                            </div>

                        </form>
                        <?php borrarErrores(); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="p-2 text-center">
        <?php require_once 'includes/footer.php'; ?>
    </div>

    <script type="text/javascript " src="bootstrap/js/jquery.js "></script>
    <script type="text/javascript " src="bootstrap/js/bootstrap.min.js "></script>
</body>

</html>