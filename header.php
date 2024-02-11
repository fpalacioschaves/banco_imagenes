<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="admin.php">Banco de Imágenes</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <label for="filtro" class="label_filtro">Filtrar:</label>
                    <input type="text" class="form-control" name="filtro" id="filtro" onkeyup="filtrar_imagenes();" placeholder="Puede buscar por título, descripción, tag o categoría">
                    <button class="btn btn-primary boton_borrar" onclick="document.getElementById('filtro').value = ''; filtrar_imagenes();">Borrar</button>
                </div>
            </form>
            <!-- Navbar-->
        
        </nav>