<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                
            <a class="nav-link" href="add_usuario.php">
                    Añadir usuario
                </a>

                <a class="nav-link" href="edit_usuario.php">
                    Editar usuario
                </a>

                <a class="nav-link" href="add_configuracion.php">
                    Añadir configuracion
                </a>

                <a class="nav-link" href="edit_configuracion.php">
                    Editar configuracion
                </a>

                <a class="nav-link" href="logout.php">
                    Logout
                </a>
            </div>
            <div class="bienvenida">
                <p>Bienvenido,</p>
                <p> <?php echo $_SESSION["nombre_usuario"]; ?></p>
            </div>
        </div>
    </nav>
</div>