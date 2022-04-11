<?php require_once '../includes/cabecera.php'; ?>
    <?php if(isset($_SESSION['acceso'])) :?>
        <div class='bienvenida'>
            <h4>Bienvenido, <?=$_SESSION["acceso"]["nombre_usuario"]; ?></h4>
        </div>
    <?php endif; ?>
<?php require_once 'navegacion_consultor.php'; ?>
<?php require_once '../includes/funciones.php'; ?>
            

            <section class='bloque-consultor'>
            <h2 class="titulo">Portafolio de servicios</h2>
            <div class='mod1'>
                <p>Gerencia de proyectos</p>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chart-donut-3" width="56" height="56" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M12 3v5m4 4h5" />
                    <path d="M8.929 14.582l-3.429 2.918" />
                    <circle cx="12" cy="12" r="4" />
                    <circle cx="12" cy="12" r="9" />
                </svg>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque perspiciatis earum harum repudiandae, praesentium impedit dolor qui! Accusantium delectus tempore perspiciatis, consequuntur quae maxime debitis aut, at ipsam officiis sed.
                </p>
            </div>
            <div class='mod2'>
                <p>Urbanismo y obras complementarias</p>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-backhoe" width="56" height="56" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <circle cx="4" cy="17" r="2" />
                    <circle cx="13" cy="17" r="2" />
                    <line x1="13" y1="19" x2="4" y2="19" />
                    <line x1="4" y1="15" x2="13" y2="15" />
                    <path d="M8 12v-5h2a3 3 0 0 1 3 3v5" />
                    <path d="M5 15v-2a1 1 0 0 1 1 -1h7" />
                    <path d="M21.12 9.88l-3.12 -4.88l-5 5" />
                    <path d="M21.12 9.88a3 3 0 0 1 -2.12 5.12a3 3 0 0 1 -2.12 -.88l4.24 -4.24z" />
                </svg>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque perspiciatis earum harum repudiandae, praesentium impedit dolor qui! Accusantium delectus tempore perspiciatis, consequuntur quae maxime debitis aut, at ipsam officiis sed.
                </p>
            </div>
            <div class='mod3'>
                <p>Diseño arquitectónico</p>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-community" width="56" height="56" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8" />
                    <line x1="13" y1="7" x2="13" y2="7.01" />
                    <line x1="17" y1="7" x2="17" y2="7.01" />
                    <line x1="17" y1="11" x2="17" y2="11.01" />
                    <line x1="17" y1="15" x2="17" y2="15.01" />
                </svg>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque perspiciatis earum harum repudiandae, praesentium impedit dolor qui! Accusantium delectus tempore perspiciatis, consequuntur quae maxime debitis aut, at ipsam officiis sed.
                </p>
            </div>
        </section>
        <?php require_once '../includes/footer.php'; ?>
    </body>
</html>