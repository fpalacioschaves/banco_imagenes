<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <p class="menu">
    <a class="" href="admin.php">Imágenes</a> / <a class="" href="admin_videos.php">Videos</a>
    </p>
    <div class="titulo_empresa">
        <h3><?php echo $_SESSION["empresa"];?></h3>
    </div>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            <label for="filtro" class="label_filtro">Filtrar:</label>
            <input type="text" class="form-control" name="filtro" id="filtro" onkeyup="filtrar_imagenes();" placeholder="Título, descripción, tag o categoría">
            <button class="btn btn-primary boton_borrar" onclick="document.getElementById('filtro').value = ''; filtrar_imagenes();">Borrar</button>
        </div>
    </form>
    <!-- Navbar-->

</nav>