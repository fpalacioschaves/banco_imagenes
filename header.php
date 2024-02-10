<header>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <p class="navbar-brand d-flex align-items-center">
                        <strong><a href="admin.php">Banco de Imágenes</a></strong>
                    </p>
                </div>

                <div class="col-md-4">
                    <a href="add_imagen.php" class="btn btn-primary">Añadir imagen</a>
                    <a href="add_categoria.php" class="btn btn-primary">Añadir categoría</a>
                </div>

                <div class="col-md-4">
                    <div class="informacion">
                        <strong> Bienvenido, <?php echo $_SESSION["usuario"]; ?> </strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="filter-controls">
        <div class="filtro col-lg-12 col-md-12 mx-auto">
            <label for="filtro" class="label_filtro">Filtrar:</label>
            <input type="text" name="filtro" id="filtro" onkeyup="filtrar_imagenes();" placeholder="Puede buscar por título, descripción, tag o categoría">
            <button class="btn btn-primary" onclick="document.getElementById('filtro').value = ''; filtrar_imagenes();">Borrar</button>
        </div>
    </div>
</header>