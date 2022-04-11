<?php require_once '../includes/cabecera.php'; ?>

<body>
    <div class="row">
        <header class="col-md-12">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3 mt-4">
                <div class="container-fluid">

                    <a class="navbar-brand col-3" href="#"><span class="text-danger"> URBANA </span>Diseño & Construcción</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                            <li class="nav-item dropdown mx-2">
                                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Personas
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="../usuarios/usuario.php">Usuario</a></li>
                                    <li><a class="dropdown-item" href="../clientes/clientes.php">Clientes</a></li>
                                    <li><a class="dropdown-item" href="../proveedor/proveedor.php">Proveedores</a></li>
                                    <li><a class="dropdown-item" href="..//empleados/empleados.php">Empleados</a></li>

                                </ul>
                            </li>

                            <li class="nav-item mx-2">
                                <a class="nav-link text-white" href="../insumos/consulta_insumos.php">Insumos</a>
                            </li>

                            <li class="nav-item mx-2">
                                <a class="nav-link text-white" href="../insumos_actividades/insumos_actividades.php">APU</a>
                            </li>

                            <li class="nav-item mx-2">
                                <a class="nav-link text-white" href="../actividades/actividades.php">Actividades</a>
                            </li>

                            <li class="nav-item dropdown mx-2">
                                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Presupuestos
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="../presupuestos/presupuestos.php"> Crear Presupuestos</a></li>
                                    <li><a class="dropdown-item" href="../pia/pia.php">Gestión Presupuestos</a></li>
                                </ul>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link text-white" href="../includes/cerrar_sesion.php">Salir</a>
                            </li>
                        </ul>

                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-warning" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </nav>
        </header>
    </div>