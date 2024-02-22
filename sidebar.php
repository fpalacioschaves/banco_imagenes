<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="add_imagen.php">
                    Añadir imagen
                </a>

                <a class="nav-link" href="add_categoria.php">
                    Añadir categoria
                </a>

                <a class="nav-link" href="edit_categorias.php">
                    Editar categorias
                </a>


                <a class="nav-link" href="logout.php">
                    Logout
                </a>
            </div>

            <div class="bienvenida">
                <p>Bienvenido,</p><p> <?php echo $_SESSION["nombre_usuario"]; ?></p>
            </div>
        </div>
    </nav>
</div>